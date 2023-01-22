@extends('master')
@section('title','All Project | '.env('APP_NAME'))

@section('content')
    <div class="single-page-header" data-background-image="{{ asset('assets/images/single-job.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-page-header-inner">
                        <div class="left-side">
                            <div class="header-details">
                                <h3>{{ $project->title }}</h3>
                                <h5>{{ $project->category_id }}</h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <!-- Content -->
            <div class="col-xl-8 col-lg-8 content-right-offset">

                <div class="single-page-section">
                    <h3 class="margin-bottom-25">Project Description</h3>
                    <p> {{ $project->description }} </p>

                </div>

                <div class="single-page-section">
                    <h3 class="margin-bottom-10">Skills</h3>
                    <div class="task-tags">
                        @foreach($project->tag as $tag)
                            <span> {{ $tag->skill->name }} </span>
                        @endforeach

                    </div>
                </div>
                @if($proposal == 'true')
                    <div class="countdown green margin-bottom-35">You have submitted your offer</div>
                    <a href="{{ route('all_project') }}" class="apply-now-button">Apply Now</a>

                    {{--                    <h4> You have submitted your offer </h4>--}}
                     @else

                    <form style="width: calc(100% + 30px);" enctype="multipart/form-data" method="post">

                        @csrf
                        <div class="col-xl-12">
                            <div class="dashboard-box">

                                <!-- Headline -->
                                <div class="headline">
                                    <h3><i class="icon-feather-folder-plus"></i>Add Your Offer Now</h3>
                                </div>
                                <input type="hidden" id="project_id" value="{{$project->id}}" name="project_id">

                                <div class="content with-padding padding-bottom-10">
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Delivery Duration</h5>
                                                <input type="text" id="date" name="date" class="with-border">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Offer Value</h5>
                                                <input type="text" id="price" name="price" class="with-border">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="submit-field">
                                                <h5>Description</h5>
                                                <textarea cols="30" rows="5" id="description" name="description" class="with-border"></textarea>

                                                <div class="uploadButton margin-top-30">
                                                    <input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="image" name="image" multiple="">
                                                    <label class="uploadButton-button ripple-effect" for="image">Upload Files</label>
                                                    <span class="uploadButton-file-name">Images or documents that might be helpful in describing your Project</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" onclick="performStore()" class="button ripple-effect margin-bottom-20">Apply Now </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
            </div>


            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-4">
                <div class="sidebar-container">


                    <!-- Sidebar Widget -->
                    <div class="sidebar-widget">
                        <div class="job-overview">
                            <div class="job-overview-headline">Project Summary</div>
                            <div class="job-overview-inner">
                                <ul>
                                    <li>
                                        <i class="icon-material-outline-business"></i>
                                        <span>Status</span>
                                        <h5>{{$project->status}}</h5>
                                    </li>
                                    <li>
                                        <i class="icon-material-outline-business-center"></i>
                                        <span>Date Posted</span>
                                        <h5>{{$project->created_at}}</h5>
                                    </li>
                                    <li>
                                        <i class="icon-material-outline-local-atm"></i>
                                        <span>Salary</span>
                                        <h5>${{$project->min}} - ${{$project->max}}</h5>
                                    </li>
                                    <li>
                                        <i class="icon-material-outline-date-range"></i>
                                        <span>Implementation period</span>
                                        <h5>{{$project->date}}</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @if($project->image != null)
                    <!-- Sidebar Widget -->
                    <div class="sidebar-widget">
                        <h3>Attachments</h3>
                        <div class="attachments-container">


                            <a href="{{ asset($project->image->path) }}" class="attachment-box ripple-effect"><span>Image</span><i>JPG</i></a>

                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div class="margin-top-50"></div>

@endsection


@section('scripts')
    <script>

        function performStore() {

            let formData = new FormData();
            formData.append('date', document.getElementById('date').value)
            formData.append('price', document.getElementById('price').value)
            formData.append('project_id', document.getElementById('project_id').value)
            formData.append('image', document.getElementById('image').files[0])
            formData.append('description', document.getElementById('description').value)

            let config = {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            }
            axios.post('/proposals', formData , config)
                .then(function (response) {
                    //2xx
                    console.log(response);
                    toastr.success(response.data.message);
                    window.location.href = '/show/{{$project->id}}';


                })
                .catch(function (error) {
                    //4xx - 5xx
                    console.log(error.response.data.message);
                    toastr.error(error.response.data.message);
                });
        }
    </script>
@endsection

