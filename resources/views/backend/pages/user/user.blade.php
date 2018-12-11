@extends('backend.layouts.master')
@section('content')
<br><br>
<div class="container">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-2">
			<form method="post" action="{{ route('user.store') }}">
				{{csrf_field()}}
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="{{old('name')}}">
				</div>
				<div class="form-group">
					<label>E-Mail Address</label>
					<input type="text" name="email" class="form-control" value="{{old('email')}}">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="text" name="phone" class="form-control" value="{{old('phone')}}">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" value="{{old('password')}}">
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" name="password_confirmation" class="form-control">
				</div>
				<p><strong>Staus</strong></p>
				<div class="checkbox">
					<label><input type="checkbox" name="status"@if (old('status') == 1 )
                        	{{'checked'}}
                        @endif value="1">Active</label>
				</div>
				<p><strong>Assign Role</strong></p>
				@foreach($roles as $role)
				<div class="checkbox">
					<label><input type="checkbox" name="assign_role[]" value="{{$role->id}}">{{$role->name}}</label>
				</div>
				@endforeach
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary btn-block" value="Save Author">
				</div>
			</form>
			<div>
				<a href="{{ route('user.index') }}" class="btn btn-success btn-block">Back</a>
			</div>
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