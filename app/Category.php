<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $hidden = array('updated_at', 'deleted_at');
    
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_category');
    }
    
}
