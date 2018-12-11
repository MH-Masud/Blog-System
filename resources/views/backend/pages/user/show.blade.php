@extends('backend.layouts.master')
@section('content')
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-3">
			<a href="{{ route('user.create') }}" class="btn btn-info btn-block">Add Author</a>
		</div><br><br><br><br>
		<div class="row">
			<div class="col-lg-8">
				<table id="category_table" class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Role</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					@foreach($admins as $admin)
					<tbody>
						<tr>
							<td>{{$admin->id}}</td>
							<td>{{$admin->name}}</td>
							<td>{{$admin->email}}</td>
							<td>{{$admin->phone}}</td>
							<td>
								@foreach($admin->roles as $admin_role)
								{{$admin_role->name}}, 
								@endforeach
							</td>
							<td>
								{{$admin->status == 1 ? 'Active':'Inactive'}}
							</td>
							<td>
								<a href="{{ route('user.edit',$admin->id) }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a>
								<button class="btn btn-danger btn-sm" onclick="deleteCategory()"><span class="glyphicon glyphicon-trash"></span> Delete</button>
								
								<form id="delete-form-" method="post" action="" style="display: none;">
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
	function deleteCategory(id){

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
	$(document).ready(function(){
		$('#category_table').DataTable();
	});
</script>
@endsection
