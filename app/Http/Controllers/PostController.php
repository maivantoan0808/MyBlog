<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        $posts = Post::latest()->approved()->published()->paginate(6);
        return view('posts',compact('posts'));
    }

    /**
     * [details description]
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public function details($slug)
    {
        $post = Post::where('slug', $slug)->approved()->published()->first();
        $blogKey = 'blog_' . $post->id;

        if(!Session::has($blogKey)) {
            $post->increment('view_count');
            Session::put($blogKey, 1);
        }

        $randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
        return view('post', compact('post', 'randomposts'));
    }

    /**
     * [postByCategory description]
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public function postByCategory($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts()->approved()->published()->get();
        return view('category',compact('category','posts'));
    }
    
    /**
     * [postByTag description]
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public function postByTag($slug)
    {
        $tag = Tag::where('slug',$slug)->first();
        $posts = $tag->posts()->approved()->published()->get();
        return view('tag',compact('tag','posts'));
    }
}
