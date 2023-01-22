@extends('master')
@section('title','Create Profile | '.env('APP_NAME'))

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
				<h3>Create Profile</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Create Profile</li>
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
                                            <input name="title" id="title" type="text" class="with-border"  placeholder="Job Title">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Location</h5>
                                            <div class="input-with-icon">
                                                <div id="autocomplete-container">
                                                    <input id="location" class="with-border" type="text" placeholder="Anywhere">
                                                </div>
                                                <i class="icon-material-outline-location-on"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>Introduction</h5>
                                            <textarea name="description" id="description" cols="30" rows="5" class="with-border"></textarea>

                                            <h5 class="margin-top-20">Attachments</h5>
                                            <div class="uploadButton">
                                                <input name="image" class="uploadButton-input" type="file"  accept="image/*, application/pdf" id="image" multiple="">
                                                <label class="uploadButton-button ripple-effect" for="image">Upload Files</label>
                                                <span class="uploadButton-file-name">Images or documents that might be helpful in describing your Profile</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="sidebar-widget">
                                        <h3>Skills</h3>

                                        <h4 class="tags-container">
                                            @forelse($skills as $skill)
                                                <div class="tag">

                                                    <input type="checkbox" id="{{$skill->id}}" value="{{$skill->id}}" class="removeLater" name="ids[]">

                                                    <label for="{{$skill->id}}"> {{$skill->name}}</label>
                                                </div>

                                            @empty
                                                <h4> No Data Found </h4>
                                        @endforelse
                                    </div>

                                    <div class="clearfix"></div>

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

</div>
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
        formData.append('location', document.getElementById('location').value)
        formData.append('image', document.getElementById('image').files[0])
        formData.append('description', document.getElementById('description').value)
        formData.append('ids', checkboxValues)
        let config = {
            headers: {
                "Content-Type": "multipart/form-data"
            }
        }
        axios.post('/profiles', formData , config)
        .then(function (response) {
            //2xx
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/profiles';

        })
        .catch(function (error) {
            //4xx - 5xx
            console.log(error.response.data.message);
            toastr.error(error.response.data.message);
        });
    }
</script>
@endsection
