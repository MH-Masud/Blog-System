<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function tags()
    {
    	return $this->belongsToMany('App\tag','post_tags')->withTimestamps();
    }
    public function categories()
    {
    	return $this->belongsToMany('App\category','category_posts')->withTimestamps();
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function allcomments()
    {
        return $this->hasMany('App\comment','post_id');
    }
}
