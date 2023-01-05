@extends('master')
@section('title','Register | '.env('APP_NAME'))

@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Register</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Register</li>
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
					<h3 style="font-size: 26px;">Let's create your account!</h3>
					<span>Already have an account? <a href="pages-login.html">Log In!</a></span>
				</div>

				
					
				<!-- Form -->
				<form>
				@csrf
				@if($guard == 'user')
						<!-- Account Type -->
					<div class="account-type">
						<div>
							<input type="radio" value="freelancer" name="type" id="freelancer-radio" class="account-type-radio" />
							<label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Freelancer</label>
						</div>

						<div>
							<input type="radio" value="customer" name="type" id="type" class="account-type-radio"/>
							<label for="type" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Employer</label>
						</div>
					</div>
					<input type="hidden" name="guard" id="guard" value="user" />
					<div class="input-with-icon-left">
						<i class="icon-material-outline-person-pin"></i>
						<input type="text" class="input-text with-border" name="fname" id="fname" placeholder="First Name" />
					</div>
					<div class="input-with-icon-left">
						<i class="icon-material-outline-person-pin"></i>
						<input type="text" class="input-text with-border" name="lname" id="lname" placeholder="Last Name" />
					</div>
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="email" class="input-text with-border" name="email" id="email" placeholder="Email Address" />
					</div>
					<div class="input-with-icon-left">
						<i class="icon-line-awesome-mobile"></i>
						<input type="text" class="input-text with-border" name="phone" id="phone" placeholder="Phone Number" />
					</div>

					<div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation" required/>
					</div>
					@elseif($guard == 'admin')
					<input type="hidden" name="guard" id="guard" value="admin" />
					<div class="input-with-icon-left">
						<i class="icon-material-outline-person-pin"></i>
						<input type="text" class="input-text with-border" name="name" id="name" placeholder="Admin Name" />
					</div>
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="email" class="input-text with-border" name="email" id="email" placeholder="Email Address" />
					</div>
					<div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation" required/>
					</div>
					</div>
					@endif
					<!-- Button -->
				<button onclick="register()" class="button full-width button-sliding-icon ripple-effect margin-top-10" type="button">
					Register <i class="icon-material-outline-arrow-right-alt"></i></button>
				</form>
				
				
				
				<!-- Social Login -->
				<div class="social-login-separator"><span>or</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Register via Facebook</button>
					<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Register via Google+</button>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- fname
lname
email
phone
type
password -->
<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->
@endsection
@section('scripts')
    <script>

		$guard = document.getElementById('guard').value;
		
        function register() {
			
			if($guard == 'user'){
				console.log('user');
				axios.post('/{{$guard}}/register', {
                fname: document.getElementById('fname').value,
                lname: document.getElementById('lname').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                type: document.querySelector('input[name="type"]:checked').value,
                password: document.getElementById('password').value,
                password_confirmation: document.getElementById('password_confirmation').value,
                guard: '{{$guard}}',
                
            })
                .then(function (response) {
                    toastr.success(response.data.message);
                    console.log(response);
                    window.location.href = '/';
                })
                .catch(function (error) {
                    toastr.error(error.response.data.message);
                    console.log(error.response.data.message);
                });
			}else{
				console.log('admin');
				axios.post('/{{$guard}}/register', {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                password_confirmation: document.getElementById('password_confirmation').value,
                guard: '{{$guard}}',
                
            })
                .then(function (response) {
                    toastr.success(response.data.message);
                    console.log(response);
                    window.location.href = '/';
                })
                .catch(function (error) {
                    toastr.error(error.response.data.message);
                    console.log(error.response.data.message);
                });

			}
            
        }
    </script>
@endsection