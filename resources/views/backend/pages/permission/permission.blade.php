@extends('backend.layouts.master')
@section('content')
<br><br>
<div class="container">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-2">
			<form method="post" action="{{ route('permission.store') }}">
				{{csrf_field()}}
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label>Permission For</label>
					<select name="permission_for" class="form-control">
						<option value="">Select Permission For</option>
						<option value="post">Post</option>
						<option value="user">User</option>
						<option value="other">Other</option>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary btn-block" value="Save permission">
				</div>
			</form>
			<div>
				<a href="{{ route('permission.index') }}" class="btn btn-success btn-block">Back</a>
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