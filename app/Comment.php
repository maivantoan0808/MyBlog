<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * [post description]
     * @return [type] [description]
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    /**
     * [user description]
     * @return [type] [description]
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
