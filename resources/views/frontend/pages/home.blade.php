@extends('frontend.layouts.master')
@section('content')
<div class="content">
	 <div class="container">
		 <div class="content-grids">
			 <div class="col-md-8 content-main">
				 <div class="content-grid">
				 	@foreach($posts as $post)
					 <div class="content-grid-head">
						 <h4>{{$post->created_at}}</h4>
						 <div class="pull-left">
						 	Posted by: <a href="#">{{$post->posted_by}}</a>
						 </div>
						 <div class="clearfix"></div>
					 </div>
					 <div class="content-grid-info">
						 <h3><a href="{{ route('show',$post->slug)}}">{{$post->title}}</a></h3>
						 <img src="{{asset($post->image)}}" alt="{{$post->title}}" style="height: 300px; width: 550px;" />
						 <p>{!!$post->short_description!!}</p>
						 <a class="bttn" href="{{ route('show',$post->slug)}}">MORE</a>
					</div>
					@endforeach
				 </div>
				 {{ $posts->links() }}			 
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
@endsection