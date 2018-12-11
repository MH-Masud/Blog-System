@extends('backend.layouts.master')
@section('content')
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-10">
			<table id="comment_table" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Post Title</th>
						<th>User Name</th>
						<th>Comment</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				@foreach($comments as $comment)
				<tbody>
					<tr>
						<td>{{$comment->post->title}}</td>
						<td>{{$comment->user->name}}</td>
						<td>{{$comment->comment}}</td>
						<td>{{$comment->publication_status == 1 ? 'Published':'Unpublished'}}</td>
						<td>
							<?php if ($comment->publication_status == 1) { ?>
							<a title="Unpublished" href="{{ route('comment.show',$comment->id) }}" class="btn btn-info btn-sm">
								<span class="fa fa-thumbs-up"></span>
							</a>
							<?php } else { ?>
							<a title="Published" href="{{ route('comment.edit',$comment->id) }}" class="btn btn-info btn-sm">
								<span class="fa fa-thumbs-down"></span>
							</a>
							<?php } ?>
							<button type="button" class="btn btn-danger btn-sm" onclick="getDelete({{$comment->id}})"><span class="glyphicon glyphicon-trash"></span> Delete</button>
							<form id="delete-form-{{$comment->id}}" method="post" action="{{ route('comment.destroy',$comment->id) }}">
								{{csrf_field()}}
								{{method_field('PUT')}}
							</form>
						</td>
					</tr>
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</div>
<script>
	function getDelete(id){

		const swalWithBootstrapButtons = Swal.mixin({
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger',
			buttonsStyling: false,
		})

		swalWithBootstrapButtons({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'No, cancel!',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
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
@endsection