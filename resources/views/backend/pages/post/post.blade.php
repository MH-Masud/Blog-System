@extends('backend.layouts.master')
@section('content')
<br>
<div class="container">
	<form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
		{{csrf_field()}}
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="checkbox">
				<label><input name="publication_status" type="checkbox" value="1"> Pubished</label>
			</div>
			<div class="form-group">
				<label>Slug</label>
				<input type="text" name="slug" class="form-control">
			</div>
			<div class="form-group">
				<label>Category</label>
				<select name="categories[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Category" style="width: 100%;" tabindex="-1" aria-hidden="true">
					@foreach($categories as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Tag</label>
				<select name="tags[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Tag" style="width: 100%;" tabindex="-1" aria-hidden="true">
					@foreach($tags as $tag)
					<option value="{{$tag->id}}">{{$tag->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Image</label>
				<input type="file" name="image">
			</div>
			<div class="form-group">
				<label>Author Name</label>
				<input type="text" name="posted_by" class="form-control">
			</div>
		</div>
		<div class="col-lg-5">
			<div class="form-group">
				<label>Short Description</label>
				<textarea class="form-control" rows="5" cols="5" name="short_description"></textarea>
			</div>
			<div class="form-group">
				<label>Long Description</label>
				<textarea class="form-control" name="long_description" rows="8" cols="8"></textarea>
			</div>
			
		</div>
	</div>
	<div class="col-lg-4 col-lg-offset-3">
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-primary btn-block" value="Save Post">
		</div>
		</form>
		<a href="{{ route('post.index') }}" class="btn btn-success btn-block">Back</a>
	</div>
</div>
<br><br>
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

<script>
	$(document).ready(function(){
		$('.select2').select2();
	});
</script>
@endsection