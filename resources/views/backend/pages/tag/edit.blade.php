@extends('backend.layouts.master')
@section('content')
<br><br>
<div class="container">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-2">
			<form method="post" action="{{ route('tag.update',$edit_tag->id) }}">
				{{csrf_field()}}
				{{method_field('PUT')}}
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="{{$edit_tag->name}}">
				</div>
				<div class="form-group">
					<label>Slug</label>
					<input type="text" name="slug" class="form-control" value="{{$edit_tag->slug}}">
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary btn-block" value="Update Tag">
				</div>
			</form>
		</div>
	</div>
</div>
@endsection