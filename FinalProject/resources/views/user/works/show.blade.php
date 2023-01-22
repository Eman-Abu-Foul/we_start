@extends('master')
@section('title','My Work | '.env('APP_NAME'))

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
				<h3>{{ $work->title }}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>My Work</li>
					</ul>
				</nav>
			</div>

            <!-- Fun Facts Container -->
            <div class="fun-facts-container margin-bottom-40">

                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-0">

                        <!-- Headline -->
                        <div class="headline">
                            <div class="row">
                                <div class="col-xl-10">
                                    <h3>Work details</h3>
                                </div>
                                <div class="col-xl-2">
                                    <a href="{{ route('works.edit',$work) }}" class="button"><i class="icon-feather-edit"></i> Edit Work</a>
                                </div>
                            </div>
                        </div>

                        <div class="content with-padding padding-bottom-10">
                            <div class="row">

                                <div class="col-xl-12">
                                    <div>
                                        <img src="{{ asset($work->image->path) }}">
                                    </div>
                                </div>
                                <div class="col-xl-12 margin-top-15">
                                    <h3 class="margin-bottom-15">Description</h3>
                                    <p> {{ $work->description }}</p>

                                </div>
                                <div class="sidebar-widget">
                                    <h3>Skills</h3>
                                    <div class="task-tags">
                                        @foreach($work->tag as $tag)
                                            <span> {{ $tag->skill->name }} </span>
                                        @endforeach

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
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
            axios.delete('/skills/'+id)
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
