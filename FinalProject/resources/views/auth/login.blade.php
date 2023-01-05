@extends('master')
@section('title','Login | '.env('APP_NAME'))

@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Log In</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Log In</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-xl-5 offset-xl-3">


			<div class="login-register-page">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>We're glad to see you again!</h3>
					<span>Don't have an account? <a href="pages-register.html">Sign Up!</a></span>
				</div>
				<input type="hidden" name="guard" id="guard" value="{{ $guard }}" />
					
				<!-- Form -->
				<form>
					
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="email" class="input-text with-border" name="email" id="email" placeholder="Email Address" required/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required/>
					</div>
					<div class="checkbox">
						<input type="checkbox" id="remember">
						<label for="remember"><span class="checkbox-icon"></span> Remember Me</label>
					</div>
					<br>
					<a href="#" class="forgot-password">Forgot Password?</a>

					<!-- Button -->
				<button onclick="login()" class="button full-width button-sliding-icon ripple-effect margin-top-10" type="button" >Log In <i class="icon-material-outline-arrow-right-alt"></i></button>

				</form>
				
				
				
				<!-- Social Login -->
				<div class="social-login-separator"><span>or</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Log In via Facebook</button>
					<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Log In via Google+</button>
				</div>
			</div>

		</div>
	</div>
</div>


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->

@endsection
@section('scripts')

<script>
	$guard = document.getElementById('guard').value;
	
    function login() {
		if($guard == 'user'){
			axios.post('/login', {
				email: document.getElementById('email').value,
				password: document.getElementById('password').value,
				remember: document.getElementById('remember').checked,
				guard:'{{$guard}}',
			})
			.then(function(response) {
				toastr.success(response.data.message);
				console.log(response);
				window.location.href ='/';
			})
			.catch(function(error) {
				
				toastr.error(error.response.data.message);
				console.log(error.response.data.message);
			});
		}else{
			axios.post('/login', {
				email: document.getElementById('email').value,
				password: document.getElementById('password').value,
				remember: document.getElementById('remember').checked,
				guard:'{{$guard}}',
			})
			.then(function(response) {
				toastr.success(response.data.message);
				console.log(response);
				window.location.href ='/dashboard';
			})
			.catch(function(error) {
				
				toastr.error(error.response.data.message);
				console.log(error.response.data.message);
			});
		}

   }
</script>
@endsection
