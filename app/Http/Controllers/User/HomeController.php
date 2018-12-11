<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\category;
use App\comment;
use App\post;
use App\tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = post::where('publication_status',1)
                      ->orderBy('id','desc')
    	              ->paginate(5);

        $popular_posts = post::where('publication_status',1)
                       ->orderBy('views','desc')
                       ->limit(4)
                       ->get();

        $comment_posts = post::where('publication_status',1)
                       ->orderBy('comments','desc')
                       ->limit(4)
                       ->get();
                       
    	return view('frontend.pages.home',compact('posts','popular_posts','comment_posts'));
    }

    public function tag(tag $slug)
    {
        $popular_posts = post::where('publication_status',1)
                       ->orderBy('views','desc')
                       ->limit(4)
                       ->get();

        $comment_posts = post::where('publication_status',1)
                       ->orderBy('comments','desc')
                       ->limit(4)
                       ->get();

    	$posts = $slug->posts();
    	return view('frontend.pages.home',compact('posts','popular_posts','comment_posts'));
    }
    public function category(category $slug)
    {
        $popular_posts = post::where('publication_status',1)
                       ->orderBy('views','desc')
                       ->limit(4)
                       ->get();

        $comment_posts = post::where('publication_status',1)
                       ->orderBy('comments','desc')
                       ->limit(4)
                       ->get();

        $posts = $slug->posts();
        return view('frontend.pages.home',compact('posts','comment_posts','popular_posts'));
    }

    public function comment (Request $request,$id)
    {
        $comment = new comment();
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->comment = $request->comment;
        $comment->save();

        $post = post::find($request->post_id);
        $comment_count = $post->comments + 1 ;
        $post->comments = $comment_count;
        $post->save();

        Toastr::success('Comment SuccessFull','message');
        return redirect()->route('show',$comment->post->slug);
    }
}
