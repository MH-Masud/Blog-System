<?php
use App\category;
use App\tag;
$categories = category::all();
$tags = tag::all();
?>

<!--fotter-->
<div class="fotter">
	 <div class="container">
		 <div class="col-md-4 fotter-info">
			 <h3>Tag</h3>
			 <p>
			 	@foreach($tags as $tag)
		           <a href="{{ route('tag',$tag->slug) }}">{{$tag->name}}</a>
			    @endforeach
			 </p>
			 
		 </div>
		 <div class="col-md-4 fotter-list">
			 <h3>Category</h3>
			 <ul>
			 @foreach($categories as $category)
			 <li><a href="{{ route('category',$category->slug) }}">{{$category->name}}</a></li>
			 @endforeach
			 </ul>
		 </div>
		 <div class="col-md-4 fotter-media">
				<h3>FOLLOW US ON....</h3>
				 <div class="social-icons">
				 <a href="#"><span class="fb"> </span></a>
				 <a href="#"><span class="twt"> </span></a>
				 <a href="#"><span class="in"> </span></a>				 			 
			    </div>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<!---fotter/-->
<div class="copywrite">
	 <div class="container">
	 <p>Copyrights &copy; 2015 Blogging All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
</div>
</div>
<!---->