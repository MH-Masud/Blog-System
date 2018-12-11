@extends('frontend.layouts.master')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-lg-offset-4">
            <h3 class="text-center">Login Here</h3><br>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Login" name="submit" class="btn btn-primary btn-lg">
                    <a href="{{ route('password.request') }}"> Forgot Your Password?</a>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
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
