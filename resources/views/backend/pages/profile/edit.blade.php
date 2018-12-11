@extends('backend.layouts.master')
@section('content')
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-2">
			<form method="POST" action="{{ route('profile.store') }}">
				{{csrf_field()}}
				<div class="form-group">
					<label>Old Password</label>
					<input type="password" name="old_password" class="form-control">
					<input type="hidden" name="admin_id" value="{{$admin->id}}">
				</div>
				<div class="form-group">
					<label>New Password</label>
					<input type="password" name="new_password" class="form-control">
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" name="confirm_password" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Change" class="btn btn-info btn-block">
				</div>
			</form>
			<a href="{{ route('admin.home') }}" class="btn btn-success btn-block">Back</a>
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