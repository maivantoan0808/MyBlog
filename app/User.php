<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * [role description]
     * @return [type] [description]
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * [posts description]
     * @return [type] [description]
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * [favorite_posts description]
     * @return [type] [description]
     */
    public function favorite_posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }

    /**
     * [comments description]
     * @return [type] [description]
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * [scopeAuthors description]
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopeAuthors($query)
    {
        return $query->where('role_id', 2);
    }
}
