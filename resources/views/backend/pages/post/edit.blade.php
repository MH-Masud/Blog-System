@extends('backend.layouts.master')
@section('content')
<br>
<div class="container">
	<form method="post" action="{{ route('post.update',$edit_post->id) }}" enctype="multipart/form-data">
		{{csrf_field()}}
		{{method_field('PUT')}}
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<label>Title</label>
				<input type="text" value="{{$edit_post->title}}" name="title" class="form-control">
			</div>
			<div class="checkbox">
				<label><input name="publication_status" type="checkbox" value="1" @if ($edit_post->publication_status == 1)
					{{'checked'}}
				@endif> Pubished</label>
			</div>
			<div class="form-group">
				<label>Slug</label>
				<input type="text" value="{{$edit_post->slug}}" name="slug" class="form-control">
			</div>
			<div class="form-group">
				<label>Category</label>
				<select name="categories[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Category" style="width: 100%;" tabindex="-1" aria-hidden="true">
					@foreach($categories as $category)
					<option value="{{$category->id}}"
                        @foreach ($edit_post->categories as $postCategory)
                        	@if ($postCategory->id == $category->id)
                        		{{'selected'}}
                        	@endif
                        @endforeach
						>{{$category->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Tag</label>
				<select name="tags[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Tag" style="width: 100%;" tabindex="-1" aria-hidden="true">
					@foreach($tags as $tag)
					<option value="{{$tag->id}}"
                        @foreach ($edit_post->tags as $postTag)
                        	@if ($postTag->id == $tag->id)
                        		{{'selected'}}
                        	@endif
                        @endforeach
						>{{$tag->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Post Image</label><br>
				<img src="{{asset($edit_post->image)}}" style="height: 200px; width: 300px;">
			</div>
			<div class="form-group">
				<label>Select New Image</label>
				<input type="file" name="new_image"><br>
			</div>
			<div class="form-group">
				<label>Author Name</label>
				<input type="text" name="posted_by" class="form-control">
			</div>
		</div>
		<div class="col-lg-5">
			<div class="form-group">
				<label>Short Description</label>
				<textarea class="form-control" rows="5" cols="5" name="short_description">{!!$edit_post->short_description!!}</textarea>
			</div>
			<div class="form-group">
				<label>Long Description</label>
				<textarea class="form-control" name="long_description" rows="8" cols="8">{!!$edit_post->long_description!!}</textarea>
			</div>
			
		</div>
	</div>
	<div class="col-lg-4 col-lg-offset-3">
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-primary btn-block" value="Update Post Information">
		</div>
		</form>
		<a href="{{ route('post.index') }}" class="btn btn-success btn-block">Back</a>
	</div>
</div>
<br><br>
<script>
	$(document).ready(function(){
		$('.select2').select2();
	});
</script>
@endsection