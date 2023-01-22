@extends('master')
@section('title','Project | '.env('APP_NAME'))

@section('content')
<!-- Dashboard Container -->
<div class="dashboard-container">

@include('sidebar')
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner" >


            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3>Manage Projects</h3>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>Manage Projects</li>
                    </ul>
                </nav>
            </div>

            <!-- Row -->
            <div class="row">

                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-0">

                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-material-outline-business-center"></i> My Project Listings</h3>
                        </div>

                        <div class="content">
                            <ul class="dashboard-box-list">
                                @forelse ($projects as $project)

                                <li>
                                    <!-- Job Listing -->
                                    <div class="job-listing">

                                        <!-- Job Listing Details -->
                                        <div class="job-listing-details">
                                            <!-- Details -->
                                            <div class="job-listing-description">
                                                <h3 class="job-listing-title"><a href="#"> {{ $project->title }} </a> <span class="dashboard-status-button green"> {{ $project->status }} </span></h3>

                                                <!-- Job Listing Footer -->
                                                <div class="job-listing-footer">
                                                    <ul>
                                                        <li><i class="icon-material-outline-date-range"></i> Posted on {{ $project->created_at->diffForHumans() }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="dashboard-task-info">
                                        <li><strong>3</strong><span>Bids</span></li>
                                        <li><strong>$22</strong><span>Avg. Bid</span></li>
                                        <li><strong>${{ $project->min }} - ${{ $project->max }}</strong><span>Salary</span></li>
                                    </ul>

                                    <!-- Buttons -->
                                    <div class="buttons-to-right always-visible">
                                        <a href="{{ route('projects.show',$project->id) }}" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Bidders <span class="button-info">3</span> </a>
                                        <a href="{{ route('projects.edit',$project) }}" class="button gray ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Edit"><i class="icon-feather-edit"></i></a>
                                        <a onclick="confirmDelete('{{$project->id}}',this)"  class="button gray ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Remove"><i class="icon-feather-trash-2"></i></a>
                                    </div>
                                </li>
                                @empty
                                    <li>
                                        <div>No Data</div>
                                    </li>
                                @endforelse

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Row / End -->

            <!-- Footer -->
            <div class="dashboard-footer-spacer" style="padding-top: 123.8px;"></div>

        </div>
    </div>
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
            axios.delete('/projects/'+id)
                .then(function (response) {
                    //2xx
                    console.log(response);
                    toastr.success(response.data.message);
                    reference.closest('li').remove();
                })
                .catch(function (error) {
                    //4xx - 5xx
                    console.log(error.response.data.message);
                    toastr.error(error.response.data.message);
                });
        }
    </script>
@endsection
