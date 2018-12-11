<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\admin;
use App\category;
use App\post;
use App\tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:admin');
    }
	
    public function home()
    {
        $post = post::all();
        $category = category::all();
        $admin = admin::all();
        $user = User::all();

    	return view('backend.pages.home.home',compact('post','category','admin','user'));
    }
}
