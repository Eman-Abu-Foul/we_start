@extends('master')
@section('title','Edit Account | '.env('APP_NAME'))

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
                    <h3>Account</h3>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Edit Account</li>
                        </ul>
                    </nav>
                </div>
                <div class="fun-facts-container">
                    <form style="width: calc(100% + 30px);" enctype="multipart/form-data" method="post">

                    @csrf
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
                            </div>

                            <div class="content with-padding padding-bottom-0">
                                <div class="row">

                                    <div class="col-auto">
                                        <div class="avatar-wrapper" data-tippy-placement="bottom" data-tippy="" data-original-title="Change Avatar">
                                            <img class="profile-pic" src="{{ Auth::user()->image_url }}">
                                            <div class="upload-button"></div>
                                            <input class="file-upload" type="file" accept="image/*" name="image" id="image">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>First Name</h5>
                                                    <input type="text" name="fname" id="fname" class="with-border" value="{{ Auth::user()->fname }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Last Name</h5>
                                                    <input type="text" name="lname" id="lname" class="with-border" value="{{ Auth::user()->lname }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Email</h5>
                                                    <input type="email" class="with-border" disabled value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Phone Number</h5>
                                                    <input type="text" name="phone" id="phone" class="with-border"  value="{{ Auth::user()->phone }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <a href=""><span> <i class="icon-material-outline-lock"></i> Edit Password </span></a>
                                                </div>

                                            </div>


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

    </div>
    <!-- Dashboard Container / End -->

@endsection
@section('scripts')
    <script>

        function performStore() {

            let formData = new FormData();
            formData.append('image', document.getElementById('image').files[0])
            formData.append('fname', document.getElementById('fname').value)
            formData.append('lname', document.getElementById('lname').value)
            formData.append('phone', document.getElementById('phone').value)
            formData.append('_method', 'put')
            let config = {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            }
            axios.post('/account/update', formData , config)
                .then(function (response) {
                    //2xx
                    console.log(response);
                    toastr.success(response.data.message);
                    // window.location.href = '/account';

                })
                .catch(function (error) {
                    //4xx - 5xx
                    console.log(error.response.data.message);
                    toastr.error(error.response.data.message);
                });
        }
    </script>
@endsection
