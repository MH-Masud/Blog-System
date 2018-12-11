@extends('backend.layouts.master')
@section('content')
<br><br>
<div class="container">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-2">
			<form method="post" action="{{ route('tag.store') }}">
				{{csrf_field()}}
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label>Slug</label>
					<input type="text" name="slug" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary btn-block" value="Save Tag">
				</div>
			</form>
			<a href="{{ route('tag.index') }}" class="btn btn-success btn-block">Back</a>
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