@extends('backend.layouts.master')
@section('content')
<br><br>
<div class="container">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-2">
			<form method="post" action="{{ route('user.update',$admin->id) }}">
				{{csrf_field()}}
				{{method_field('PUT')}}
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="{{$admin->name}}">
				</div>
				<div class="form-group">
					<label>E-Mail Address</label>
					<input type="text" name="email" class="form-control" value="{{$admin->email}}">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="text" name="phone" class="form-control" value="{{$admin->phone}}">
				</div>
				<p><strong>Staus</strong></p>
				<div class="checkbox">
					<label><input type="checkbox" name="status"@if ($admin->status == 1 )
                        	{{'checked'}}
                        @endif value="1">Active</label>
				</div>
				<p><strong>Assign Role</strong></p>
				@foreach($edit_roles as $role)
				<div class="checkbox">
					<label><input type="checkbox" name="assign_role[]" value="{{$role->id}}" @foreach ($admin->roles as $admin_role)
						@if ($admin_role->id == $role->id)
							{{'checked'}}
						@endif
					@endforeach >{{$role->name}}</label>
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