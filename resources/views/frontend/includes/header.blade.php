<!---strat-banner---->
<div class="banner">				
	 <div class="header">  
		  <div class="container">
			  <div class="logo">
					<a href="{{ route('user.home') }}"> <img src="{{asset('public/frontend/images/logo.png')}}" title="soup" /></a>
			 </div>
			 <div class="clearfix"></div>
					<script>
					$("span.menu").click(function(){
					$(".top-menu ul").slideToggle("slow" , function(){
					});
					});
					</script>
				<!---//End-top-nav---->					
		 </div>
	 </div>
	 <div class="container">
		 <div class="banner-head">
			 <h1>Blog System</h1>
			 <h2>blogsite.com</h2>
		 </div>
		 <div class="banner-links">
			 <ul>
				 <li><a href="{{ route('user.home') }}">HOME</a></li>
				 <li><a href="#">CONTACT</a></li>
				 <li><a href="#">TERMS</a></li>
                 @guest
                 <li><a href="{{ route('login') }}">SignIn</a></li>
				 <li><a href="{{ route('register') }}">SingnUp</a></li>
				 @else
				 <li>
				 	<a href="{{ route('logout') }}"onclick="event.preventDefault();
				 	    document.getElementById('logout-form').submit();">
                     Logout
                 </a>
				 </li>
				 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				 	@csrf
				 </form>
				 @endif 
				 <div class="clearfix"></div>
			 </ul>
		 </div>
	 </div>
</div>
<!---//End-banner---->