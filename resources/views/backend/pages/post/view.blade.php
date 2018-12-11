@extends('backend.layouts.master')
@section('content')
<br>
<h3 class="text-success text-center">Post Details Information</h3>
<div class="container">
	<div class="row">
		<div class="col-lg-10">
			<table class="table-bordered table table-hover">
				<tr>
					<td>ID</td>
					<td>{{$show_post->id}}</td>
				</tr>
				<tr>
					<td>Title</td>
					<td>{{$show_post->title}}</td>
				</tr>
				<tr>
					<td>Slug</td>
					<td>{{$show_post->slug}}</td>
				</tr>
				<tr>
					<td>Short Description</td>
					<td>{!!$show_post->short_description!!}</td>
				</tr>
				<tr>
					<td>Long Description</td>
					<td>{!!$show_post->long_description!!}</td>
				</tr>
				<tr>
					<td>Image</td>
					<td><img src="{{asset($show_post->image)}}" style="height: 200px; width: 300px;"></td>
				</tr>
				<tr>
					<td>Publication Status</td>
					<td>{{$show_post->publication_status == 1 ?'Published':'Unpublished'}}</td>
				</tr>
				<tr>
					<td>Categories</td>
					<td>
						@foreach($show_post->categories as $category)
						{{$category->name}},
						@endforeach
					</td>
				</tr>
				<tr>
					<td>Tags</td>
					<td>
						@foreach($show_post->tags as $tag)
						{{$tag->name}},
						@endforeach
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-lg-offset-3">
			<a href="{{ route('post.index') }}" class="btn btn-primary  btn-block">Back</a>
		</div>
	</div>
</div>
<br><br>
@endsection