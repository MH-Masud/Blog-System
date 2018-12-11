@extends('backend.layouts.master')
@section('content')
<br><br>
<div class="container">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-2">
			<form method="post" action="{{ route('role.update',$role_by_id->id) }}">
				{{csrf_field()}}
				{{method_field('PUT')}}
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="{{$role_by_id->name}}">
				</div>
				<p><strong>Permission</strong></p>
				@foreach($permissions as $permission)
				<div class="checkbox">
					<label><input name="permission[]" type="checkbox" value="{{$permission->id}}"
                        @foreach ($role_by_id->permissions as $role_permite)
                        	@if ($role_permite->id == $permission->id)
                        		{{'checked'}}
                        	@endif
                        @endforeach
						>{{$permission->name}}</label>
				</div>
				@endforeach
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary btn-block" value="Update role">
				</div>
			</form>
			<a href="{{ route('role.index') }}" class="btn btn-success btn-block">Back</a>
		</div>
	</div>
</div>
@endsection