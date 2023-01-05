@extends('master')
@section('title','Category | '.env('APP_NAME'))

@section('content')
<!-- Dashboard Container -->
<div class="dashboard-container">

@include('sidebar')

	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>All Category</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Category</li>
					</ul>
				</nav>
			</div>
	
            <!-- Fun Facts Container -->
            <div class="fun-facts-container">
            
                <table class="basic-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Icon Category</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td data-label="Column 1">{{ $loop->iteration }}</td>
                        <td data-label="Column 2"><i class="{{ $category->icon_name }}"></i></td>
                        <td data-label="Column 3">{{ $category->name }}</td>
                        <td data-label="Column 3">{{ $category->description }}</td>
                        <td data-label="Column 1">
                            
                            <a href="{{route('categories.edit',$category)}}" style="background-color: blue; color: white;padding: 5px 10px; border-radius: 2px; margin: 5px;"><i  class="icon-line-awesome-edit"></i></a>
                                                           
                            <a href="#" onclick="confirmDelete('{{$category->id}}',this)" style="background-color: red; color: white;padding: 5px 10px; border-radius: 2px; margin: 5px;"><i class="icon-line-awesome-trash"></i></a>
                             
                        </td>
                        
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5">No Data</td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
                {{ $categories->links() }}
            </div>
            
		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id,reference) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    performDelete(id,reference);
                }
            });
        }
        function performDelete(id,reference) {
            axios.delete('/categories/'+id)
                .then(function (response) {
                    //2xx
                    console.log(response);
                    toastr.success(response.data.message);
                    reference.closest('tr').remove();
                })
                .catch(function (error) {
                    //4xx - 5xx
                    console.log(error.response.data.message);
                    toastr.error(error.response.data.message);
                });
        }
    </script>
@endsection