<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
{{--<title> @yield('title', env('APP_NAME')) </title>--}}
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/colors/blue.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>


</style>
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth">

	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png')}}" alt=""></a>
				</div>
{{--                Search Freelancers Browse Projects My Works Add Project Auth::user()->type--}}
				<!-- Main Navigation -->
                @if(!auth()->check())
                    <nav id="navigation">
                        <ul id="responsive">

                            <li><a href="{{ route('home') }}" class="current">Home</a></li>
                            <li><a href="{{ route('all_project') }}" class="current">Browse Projects</a></li>
                            <li><a href="{{ route('all_freelancer') }}" class="current">Search Freelancers</a></li>

                        </ul>
                    </nav>
                @endif
                @if(auth()->check())
                    @auth('user')
                        @if(Auth::user()->type == 'customer')
                            <nav id="navigation">
                                <ul id="responsive">

                                    <li><a href="{{ route('home') }}" class="current">Home</a></li>
                                    <li><a href="{{ route('projects.create') }}" class="current">Add Project</a></li>
                                    <li><a href="{{ route('all_freelancer') }}" class="current">Search Freelancers</a></li>

                                </ul>
                            </nav>

                        @endif
                        @if(Auth::user()->type == 'freelancer')
                            <nav id="navigation">
                                <ul id="responsive">

                                    <li><a href="{{ route('home') }}" class="current">Home</a></li>
                                    <li><a href="{{ route('all_project') }}" class="current">Browse Projects</a></li>
                                    <li><a href="{{ route('works.create') }}" class="current">Add Work</a></li>

                                </ul>
                            </nav>
                        @endif
                    @endauth
                    @auth('admin')
                        <nav id="navigation">
                            <ul id="responsive">

                                <li><a href="{{ route('home') }}" class="current">Home</a></li>
                                <li><a href="{{ route('all_project') }}" class="current">Browse Projects</a></li>
                                <li><a href="{{ route('all_freelancer') }}" class="current">Search Freelancers</a></li>

                            </ul>
                        </nav>
                    @endauth

                @endif




				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->

			@if(!auth()->check())
            <div class="right-side">

				<div class="header-login">
					<a style="color: white;" href="{{ route('register','user') }}" class="button ripple-effect">Register</a>
					<a style="color: white;" href="{{ route('login','user') }}" class="button ripple-effect">Login</a>
				</div>
				<!-- {{url('admin/login')}} -->
			</div>
			@endif
			@if(auth()->check())
			<div class="right-side">

				<!--  User Notifications -->
				<div class="header-widget hide-on-mobile">
                    <x-notification-menu count="5"/>

					<!-- Messages -->
					<div class="header-notifications">
						<div class="header-notifications-trigger">
							<a href="#"><i class="icon-feather-mail"></i><span>3</span></a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<div class="header-notifications-headline">
								<h4>Messages</h4>
								<button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
									<i class="icon-feather-check-square"></i>
								</button>
							</div>

							<div class="header-notifications-content">
								<div class="header-notifications-scroll" data-simplebar>
									<ul>
										<!-- Notification -->
										<li class="notifications-not-read">
											<a href="">
												<span class="notification-avatar status-online"><img src="" alt=""></span>
												<div class="notification-text">
													<strong>David Peterson</strong>
													<p class="notification-msg-text">Thanks for reaching out. I'm quite busy right now on many...</p>
													<span class="color">4 hours ago</span>
												</div>
											</a>
										</li>

									</ul>
								</div>
							</div>

							<a href="" class="header-notifications-button ripple-effect button-sliding-icon">View All Messages<i class="icon-material-outline-arrow-right-alt"></i></a>
						</div>
					</div>

				</div>
				<!--  User Notifications / End -->

				<!-- User Menu -->
				<div class="header-widget">

					<!-- Messages -->
					<div class="header-notifications user-menu">
						<div class="header-notifications-trigger">
							@auth('user')
							<a href="#"><div class="user-avatar status-online"><img src="{{ Auth::user()->image_url }}" alt=""></div></a>
							@endauth
							@auth('admin')
							<a href="#"><div class="user-avatar status-online"><img src="{{ Auth::user()->image_url }}" alt=""></div></a>
							@endauth
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<!-- User Status -->
							<div class="user-status">

								<!-- User Name / Avatar -->
								<div class="user-details">

									@auth('user')
									<a href="#"><div class="user-avatar status-online"><img src="{{ Auth::user()->image_url }}" alt=""></div></a>
									<div class="user-name">
										{{ Auth::user()->fname }}{{ Auth::user()->lname }}<span>{{ Auth::user()->type }}</span></div>
									@endauth
									@auth('admin')
									<a href="#"><div class="user-avatar status-online"><img src="{{ Auth::user()->image_url }}" alt=""></div></a>
									<div class="user-name">
										{{ Auth::user()->name }}<span>Admin</span></div>
									@endauth


								</div>


						</div>

						<ul class="user-menu-small-nav">
                            @auth('admin')	<li><a href="{{route('dashboard')}}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li> @endauth
                            @auth('user')	<li><a href="{{route('account')}}"><i class="icon-material-outline-account-circle"></i> My Account </a></li> @endauth
							<li><a href="{{route('logout')}}"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
						</ul>

						</div>
					</div>

				</div>
				<!-- User Menu / End -->

				<!-- Mobile Navigation Button -->
				<span class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</span>

			</div>
			@endif



		</div>
	</div>
	<!-- Header / End -->

</header>
<!-- <div class="clearfix"></div> -->
<!-- Header Container / End -->



@yield('content')

<!-- Footer
================================================== -->
<div id="footer">

	<!-- Footer Top Section -->
	<div class="footer-top-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">

					<!-- Footer Rows Container -->
					<div class="footer-rows-container">

						<!-- Left Side -->
						<div class="footer-rows-left">
							<div class="footer-row">
								<div class="footer-row-inner footer-logo">
									<img src="{{ asset('assets/images/logo2.png') }}" alt="">
								</div>
							</div>
						</div>

						<!-- Right Side -->
						<div class="footer-rows-right">

							<!-- Social Icons -->
							<div class="footer-row">
								<div class="footer-row-inner">
									<ul class="footer-social-links">
										<li>
											<a href="#" title="Facebook" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-facebook-f"></i>
											</a>
										</li>
										<li>
											<a href="#" title="Twitter" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-twitter"></i>
											</a>
										</li>
										<li>
											<a href="#" title="Google Plus" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-google-plus-g"></i>
											</a>
										</li>
										<li>
											<a href="#" title="LinkedIn" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-linkedin-in"></i>
											</a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>

							<!-- Language Switcher -->
							<div class="footer-row">
								<div class="footer-row-inner">
									<select class="selectpicker language-switcher" data-selected-text-format="count" data-size="5">
										<option selected>English</option>
										<option>Français</option>
										<option>Español</option>
										<option>Deutsch</option>
									</select>
								</div>
							</div>
						</div>

					</div>
					<!-- Footer Rows Container / End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Top Section / End -->

	<!-- Footer Middle Section -->
	<div class="footer-middle-section">
		<div class="container">
			<div class="row">

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>For Candidates</h3>
						<ul>
							<li><a href="#"><span>Browse Jobs</span></a></li>
							<li><a href="#"><span>Add Resume</span></a></li>
							<li><a href="#"><span>Job Alerts</span></a></li>
							<li><a href="#"><span>My Bookmarks</span></a></li>
						</ul>
					</div>
				</div>

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>For Employers</h3>
						<ul>
							<li><a href="#"><span>Browse Candidates</span></a></li>
							<li><a href="#"><span>Post a Job</span></a></li>
							<li><a href="#"><span>Post a Task</span></a></li>
							<li><a href="#"><span>Plans & Pricing</span></a></li>
						</ul>
					</div>
				</div>

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>Helpful Links</h3>
						<ul>
							<li><a href="#"><span>Contact</span></a></li>
							<li><a href="#"><span>Privacy Policy</span></a></li>
							<li><a href="#"><span>Terms of Use</span></a></li>
						</ul>
					</div>
				</div>

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>Account</h3>
						<ul>
							<li><a href="#"><span>Log In</span></a></li>
							<li><a href="#"><span>My Account</span></a></li>
						</ul>
					</div>
				</div>

				<!-- Newsletter -->
				<div class="col-xl-4 col-lg-4 col-md-12">
					<h3><i class="icon-feather-mail"></i> Sign Up For a Newsletter</h3>
					<p>Weekly breaking news, analysis and cutting edge advices on job searching.</p>
					<form action="#" method="get" class="newsletter">
						<input type="text" name="fname" placeholder="Enter your email address">
						<button type="submit"><i class="icon-feather-arrow-right"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Middle Section / End -->

	<!-- Footer Copyrights -->
	<div class="footer-bottom-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					© 2018 <strong>Hireo</strong>. All Rights Reserved.
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Copyrights / End -->

</div>
<!-- Footer / End -->

</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-migrate-3.0.0.min.js') }}"></script>
<script src="{{ asset('assets/js/mmenu.min.js') }}"></script>
<script src="{{ asset('assets/js/tippy.all.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/js/snackbar.js') }}"></script>
<script src="{{ asset('assets/js/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/js/counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/messages.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@yield('scripts')
<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
// Snackbar for user status switcher
$('#snackbar-user-status label').click(function() {
	Snackbar.show({
		text: 'Your status has been changed!',
		pos: 'bottom-center',
		showAction: false,
		actionText: "Dismiss",
		duration: 3000,
		textColor: '#fff',
		backgroundColor: '#383838'
	});
});
</script>


<!-- Google Autocomplete -->
<script>
	function initAutocomplete() {
		 var options = {
		  types: ['(cities)'],
		  // componentRestrictions: {country: "us"}
		 };

		 var input = document.getElementById('autocomplete-input');
		 var autocomplete = new google.maps.places.Autocomplete(input, options);
	}

	// Autocomplete adjustment for homepage
	if ($('.intro-banner-search-form')[0]) {
	    setTimeout(function(){
	        $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
	    }, 300);
	}

</script>

<!-- Google API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g&libraries=places&callback=initAutocomplete"></script>

</body>
</html>
