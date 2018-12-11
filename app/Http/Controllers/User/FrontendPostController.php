<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\comment;
use App\post;
use Illuminate\Http\Request;

class FrontendPostController extends Controller
{
    public function show(post $slug)
    {
    	$comments = comment::where('publication_status',1)
    	                    ->where('post_id',$slug->id)
    	                    ->paginate(3);

    	$post = post::where('id',$slug->id)->first();
    	$view = $post->views + 1;
    	$post->views=$view;
        $post->save();
        
        $popular_posts = post::where('publication_status',1)
                       ->orderBy('views','desc')
                       ->limit(4)
                       ->get();

        $comment_posts = post::where('publication_status',1)
                       ->orderBy('comments','desc')
                       ->limit(4)
                       ->get();

        return view('frontend.pages.post',compact('slug','comments','comment_posts','popular_posts'));
    }
}
