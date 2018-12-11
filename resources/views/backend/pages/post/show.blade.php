@extends('backend.layouts.master')
@section('content')
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-3">
			@can('posts.create',Auth::user())
			<a href="{{ route('post.create') }}" class="btn btn-info btn-block">Add New Post</a>
			@endcan
		</div><br><br><br><br>
		<div class="row">
			<div class="col-lg-10">
				<table class="table table-hover table-bordered" id="post_table">
					<thead>
						<tr>
							<th>Title</th>
							<th>Categories</th>
							<th>Views</th>
							<th>Comments</th>
							<th>Poulication Status</th>
							<th>Action</th>
						</tr>
					</thead>
					@foreach($posts as $post)
					<tbody>
						<tr>
							<td>{{$post->title}}</td>
							<td>
								@foreach($post->categories as $category)
								{{$category->name}},
								@endforeach
							</td>
							<td>{{$post->views}}</td>
							<td>{!!$post->comments!!}</td>
							<td>{{$post->publication_status == 1 ?'Published':'Unpublished'}}</td>
							<td>
								<a href="{{ route('post.show',$post->id) }}" title="view" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span> View</a>
								@can('posts.update',Auth::user())
								<a href="{{ route('post.edit',$post->id) }}" title="edit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a>
								@endcan
								@can('posts.delete',Auth::user())
								<button class="btn btn-danger btn-sm" title="delete" onclick="deletetag({{$post->id}})"><span class="glyphicon glyphicon-trash"></span> Delete</button>
								@endcan
								<form id="delete-form-{{$post->id}}" method="post" action="{{ route('post.destroy',$post->id) }}" style="display: none;">
									{{csrf_field()}}
									{{method_field('DELETE')}}
								</form>
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

<script type="text/javascript">
	function deletetag(id){

		const swalWithBootstrapButtons = Swal.mixin({
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger',
			buttonsStyling: false,
		})

		swalWithBootstrapButtons({
			title: 'Are you sure?',
			text: "You want to delete this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'No, cancel!',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				event.preventDefault();
				document.getElementById('delete-form-'+id).submit();
			} else if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.cancel
    ) {
				swalWithBootstrapButtons(
					'Cancelled',
					'Your imaginary file is safe :)',
					'error'
					)
			}
		})
	}
</script>
<script>
	$(document).ready( function () {
    $('#post_table').DataTable();
} );
</script>
@endsection
