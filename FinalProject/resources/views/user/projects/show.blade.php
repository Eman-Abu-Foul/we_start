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
                <h3>Manage Bidders</h3>
                <span class="margin-top-7">Bids for <a href="#">{{ $project->title }}</a></span>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>Manage Bidders</li>
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
                            <h3><i class="icon-material-outline-supervisor-account"></i> 3 Bidders</h3>
                        </div>

                        <div class="content">
                            <ul class="dashboard-box-list">
                                @forelse($proposals as $proposal)


                                <li>
                                    <!-- Overview -->
                                    <div class="freelancer-overview manage-candidates">
                                        <div class="freelancer-overview-inner">
                                            @if($proposal->user->image != null)
                                                <div class="freelancer-avatar">
                                                    <a href="#"><img src="{{asset($proposal->user->image->path)}}" alt=""></a>
                                                </div>
                                            @endif

                                            <!-- Avatar -->


                                            <!-- Name -->
                                            <div class="freelancer-name">
                                                <h4><a href="#">{{ $proposal->user->fname }}{{ $proposal->user->lname }}</a></h4>

                                                <!-- Details -->
                                                <span class="freelancer-detail-item"><a href="#"><i class="icon-feather-mail"></i> {{ $proposal->user->email }}</a></span>
                                                <span class="freelancer-detail-item"><i class="icon-feather-phone"></i>{{ $proposal->user->phone }}</span>


                                                <!-- Rating -->
                                                <br>

                                                <!-- Bid Details -->
                                                <ul class="dashboard-task-info bid-info">
                                                    <li><strong>${{ $proposal->price }}</strong><span>Fixed Price</span></li>
                                                    <li><strong>{{ $proposal->date }}</strong><span>Delivery Time</span></li>
                                                </ul>

                                                <!-- Buttons -->
                                                <div class="buttons-to-right always-visible margin-top-25 margin-bottom-0">
                                                    @if($proposal->contract->exists)
                                                        <a class="button" style="background-color: #454d55 ; color: white"> <i class="icon-material-outline-check"></i>Accepted </a>
                                                        <a href="#small-dialog-2" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a>

                                                    @else
                                                        <input type="hidden" value="{{ $project->id }}" id="project_id" name="project_id">
                                                        <input type="hidden" value="{{ $proposal->id }}" id="proposal_id" name="proposal_id">
                                                        <a onclick="performStore()" class="popup-with-zoom-anim button ripple-effect"><i class="icon-material-outline-check"></i> Accept Offer
                                                        </a>

                                                        <a onclick="confirmDelete('{{$proposal->id}}',this)" class="button gray ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Remove Bid"><i class="icon-feather-trash-2"></i></a>

                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                    <li>
                                        <div>No Proposal Added</div>
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
<!-- Send Direct Message Popup
================================================== -->
<div id="small-dialog-2" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

    <!--Tabs -->
    <div class="sign-in-form">

        <ul class="popup-tabs-nav">
            <li><a href="#tab2">Send Message</a></li>
        </ul>

        <div class="popup-tabs-container">

            <!-- Tab -->
            <div class="popup-tab-content" id="tab2">

                <!-- Welcome Text -->
                <div class="welcome-text">
                    <h3>Direct Message To David</h3>
                </div>

                <!-- Form -->
                <form method="post" id="send-pm">
                    <textarea name="textarea" cols="10" placeholder="Message" class="with-border" required></textarea>
                </form>

                <!-- Button -->
                <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">Send <i class="icon-material-outline-arrow-right-alt"></i></button>

            </div>

        </div>
    </div>
</div>
<!-- Send Direct Message Popup / End -->


@endsection

@section('scripts')


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function performStore() {
            $project_id = document.getElementById('project_id').value,

                axios.post('/contracts', {
                    proposal_id: document.getElementById('proposal_id').value,
            })
                .then(function (response) {
                    //2xx
                    console.log(response);
                    toastr.success(response.data.message);
                    window.location.href = '/projects/'+$project_id;

                })
                .catch(function (error) {
                    //4xx - 5xx
                    console.log(error.response.data.message);
                    toastr.error(error.response.data.message);
                });
        }
    </script>

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
            axios.delete('/contracts/'+id)
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
