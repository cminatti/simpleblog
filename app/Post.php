<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'post_category');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function getExcerpt() {
        return Str::words($this->body,10);
    }
    
    protected $hidden = array('updated_at', 'deleted_at');
    
}
