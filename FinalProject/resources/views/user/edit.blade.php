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
                <form>
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
                                            <img class="profile-pic" src="https://ui-avatars.com/api/?background=random&name={{ auth()->user()->fname }}" alt="">
                                            <div class="upload-button"></div>
                                            <input class="file-upload" type="file" accept="image/*">
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
                    <div class="col-xl-12" style="margin-bottom: 20px;">
                        <button onclick="performUpdate()" class="button ripple-effect big margin-top-30">Save Changes</button>
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
        function performUpdate() {
            axios.put('/account/update', {
            fname: document.getElementById('fname').value,
            lname: document.getElementById('lname').value,
            phone: document.getElementById('phone').value,
        })
            .then(function (response) {
                toastr.success(response.data.message);
                console.log(response);
                window.location.href = '/account';
            })
            .catch(function (error) {
                toastr.error(error.response.data.message);
                console.log(error.response.data.message);
            });
        
            
        }
    </script>
@endsection
