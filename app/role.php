<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public function permissions(){

    	return $this->belongsToMany('App\Permission','permission_roles');
    }
    public function admins(){

        return $this->belongsToMany('App\admin','admin_roles');
    }
}
