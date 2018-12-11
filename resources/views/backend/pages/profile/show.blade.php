@extends('backend.layouts.master')
@section('content')
<br><br>
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-lg-offset-1">
			<form method="post" action="{{ route('profile.update',$admin->id) }}">
				{{csrf_field()}}
				{{method_field('PUT')}}
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="{{$admin->name}}">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" value="{{$admin->email}}">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="text" name="phone" class="form-control" value="{{$admin->phone}}">
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Update" class="btn btn-primary btn-block">
				</div>
			</form>
			<a href="{{ route('admin.home') }}" class="btn btn-success btn-block">Back</a>
		</div>
	</div>
</div>
@endsection