@extends('master')
@section('title','Edit Project | '.env('APP_NAME'))

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
                    <h3>Edit Project</h3>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Edit Project</li>
                        </ul>
                    </nav>
                </div>
                <form style="width: calc(100% + 30px);" enctype="multipart/form-data" method="post">
                    @csrf


                    <div class="row">

                        <!-- Dashboard Box -->
                        <div class="col-xl-12">
                            <div class="dashboard-box margin-top-0">

                                <div class="content with-padding padding-bottom-10">
                                    <div class="row">


                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Job Title</h5>
                                                <input name="title" value="{{ $project->title }}" id="title" type="text" class="with-border">
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Job Category</h5>
                                                <div class="btn-group bootstrap-select with-border">
                                                    <select id="category_id" class="selectpicker with-border" data-size="7" title="Select Category" tabindex="-98">

                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" @if($category->id == $project->category_id) selected @endif>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Salary</h5>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="input-with-icon">
                                                            <input class="with-border" name="min" value="{{ $project->min }}"  id="min" type="number" placeholder="Min">
                                                            <i class="currency">USD</i>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="input-with-icon">
                                                            <input class="with-border" name="max" value="{{ $project->max }}" id="max" type="number" placeholder="Max">
                                                            <i class="currency">USD</i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>execution time</h5>
                                                <input name="date" id="date" value="{{ $project->date }}"class="with-border" type="text">

                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="submit-field">
                                                <h5>Job Description</h5>
                                                <textarea cols="30" id="description" rows="5" class="with-border">{{ $project->description }}</textarea>
                                                <h5>Attachments</h5>
                                                <div class="uploadButton margin-top-20">
                                                    <input name="image" class="uploadButton-input" type="file"  accept="image/*, application/pdf" id="image" multiple="">
                                                    <label class="uploadButton-button ripple-effect" for="image">Upload Image</label>
                                                    <span class="uploadButton-file-name"><br></span>
                                                    <img width="80px" src="{{ asset($project->image->path)?? "" }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sidebar-widget">
                                            <h3>Skills</h3>

                                            <h4 class="tags-container">
                                                @forelse($skills as $skill)
                                                    <div class="tag">

                                                            <?php $checked = false;?>
                                                        @foreach($project->tag as $tag)
                                                            @if($skill->id == $tag->skill->id )
                                                                    <?php $checked= true ;?>
                                                            @endif
                                                        @endforeach
                                                        <input type="checkbox" id="{{$skill->id}}" value="{{$skill->id}}" {{$checked ? 'checked':''}}  class="removeLater" name="ids[]">

                                                        <label for="{{$skill->id}}"> {{$skill->name}}</label>
                                                    </div>

                                                @empty
                                                    <h4> No Data Found </h4>
                                            @endforelse
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <button type="button" onclick="performStore()"   class="test button ripple-effect button-sliding-icon big margin-top-30 margin-bottom-30 " style="width: 155.375px;">Save <i class="icon-feather-check"></i></button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- Dashboard Content / End -->


    <!-- Dashboard Container / End -->

@endsection
@section('scripts')
    <script>

        function performStore() {
            var checkboxValues = [];
            $('input.removeLater:checked').map(function() {
                checkboxValues.push($(this).val());
            });
            console.log(checkboxValues);
            let formData = new FormData();
            formData.append('title', document.getElementById('title').value)
            formData.append('category_id', document.getElementById('category_id').value)
            formData.append('min', document.getElementById('min').value)
            formData.append('max', document.getElementById('max').value)
            formData.append('date', document.getElementById('date').value)
            formData.append('image', document.getElementById('image').files[0])
            formData.append('description', document.getElementById('description').value)
            formData.append('ids', checkboxValues)
            formData.append('_method', 'put')
            let config = {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            }
            axios.post('/projects/{{$project->id}}', formData , config)
                .then(function (response) {
                    //2xx
                    console.log(response);
                    toastr.success(response.data.message);
                    window.location.href = '/projects';

                })
                .catch(function (error) {
                    //4xx - 5xx
                    console.log(error.response.data.message);
                    toastr.error(error.response.data.message);
                });
        }
    </script>
@endsection
