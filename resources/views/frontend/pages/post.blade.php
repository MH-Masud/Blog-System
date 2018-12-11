@extends('frontend.layouts.master')
@section('content')
<div class="content">
	 <div class="container">
		 <div class="content-grids">
			 <div class="col-md-8 content-main">
				 <div class="content-grid">
					 <div class="content-grid-head">
						 <h4>{{$slug->created_at}},Posted by: <a href="#">{{$slug->sluged_by}}</a></h4>

						 @foreach($slug->categories as $category)
						 	<small class="pull-left" style="margin-right: 20px;">
						 		<a href="{{ route('category',$category->slug) }}">{{$category->name}}</a>
						 	</small>
						 @endforeach
						 
						 <div class="clearfix"></div>
					 </div>
					 <div class="content-grid-single">
						 <h3>{{$slug->title}}</h3>
						 <img class="single-pic" src="{{asset($slug->image)}}" alt="{{$slug->title}}" style="height: 350px; width: 680px;" />
						 <span>{!!$slug->short_description!!}</span>
						 <p>{!!$slug->long_description!!}</p>
						 <h3>Tags</h3>
                         @foreach($slug->tags as $tag)
						 <a href="{{ route('tag',$tag->slug) }}"><small class="pull-left" style="margin-right: 20px;border-radius: 5px;border: 1px solid gray; padding: 5px;">
						 		{{$tag->name}}
						 </small></a>
						 @endforeach
						 <br>
                         
						 <div class="content-form">
						 	@guest
						 	<a href="{{ route('login') }}"><h3>Leave a comment</h3></a>
							 @else
							 <form method="POST" action="{{ route('comment',$slug->id) }}">
							 	{{csrf_field()}}
							 <input type="hidden" name="post_id" value="{{$slug->id}}">
							 <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
							 <textarea name="comment" placeholder="Message"></textarea>
							 <input type="submit" value="Comment" name="submit" />
							 </form>
							 @endif
						 </div>
						 <div class="comments">
							 <h3>Comments</h3>
							 
							 <div class="comment-grid">
								 @foreach($comments as $comment)
								 <div class="comment-info">
								 <h4>{{$comment->user->name}}</h4>
								 <p>{{$comment->comment}}</p>
								 <h5>On {{$comment->created_at}}</h5>
								 
								 </div>
								 @endforeach
								 <div class="clearfix"></div>
							 </div>	
							 
						</div>
					  </div>
					 
				 </div>			 			 
			 </div>
			 
			 <div class="col-md-4 content-main-right">
				 <div class="search">
						 <h3>SEARCH HERE</h3>
						<form>
							<input type="text" value="" onfocus="this.value=''" onblur="this.value=''">
							<input type="submit" value="">
						</form>
				 </div>
				 <div class="categories">
					 <h3>CATEGORIES</h3>
					 @foreach($categories as $category)
					 <li class=""><a href="{{ route('category',$category->slug) }}">{{$category->name}}</a></li>
					 @endforeach
				 </div>
				 <div class="categories">
					 <h3>Popular</h3>
					 @foreach($popular_posts as $popular_post)
					 <li><a href="{{ route('show',$popular_post->slug) }}">{{$popular_post->title}}</a></li>
					 @endforeach
				 </div>
				 <div class="categories">
					 <h3>Recent Comment</h3>
					 @foreach($comment_posts as $comment_post)
					 <li class=""><a href="{{ route('show',$comment_post->slug) }}">{{$comment_post->title}}</a></li>
					 @endforeach
				 </div>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
      @if(count($errors)>0)
      @foreach($errors->all() as $error)
      toastr.error('{{$error}}', 'Error', {
              closeButton: true,
              progressBar: true,
         });
      @endforeach
      @endif
</script>
@endsection