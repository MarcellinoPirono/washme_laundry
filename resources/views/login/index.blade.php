<!DOCTYPE html>
<html lang="en">

<head>
	<title>Washme Laundry | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('assets/image/washing_machine1600.png') }}" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
	<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-notif">
				@if(session()->has('loginError'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					{{ session('loginError') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
				<div class="wrap-login100">
					<form class="login100-form validate-form" action="/login" method="post">
						@csrf
						<span class="login100-form-title p-b-48">
							<img src="assets/image/Asset 7.png" width="200" height="72.28" alt="..." />
						</span>

						<div class="wrap-input100 validate-input" data-validate="Enter username">
							<input class="input100 @error('username') is-invalid @enderror" type="text" name="username" id="username" autofocus required value="{{ old('username') }}">
							<span class="focus-input100" data-placeholder="Username">
							</span>
						</div>
						@error('username')
						<div class="d-flex alert alert-danger">
							{{ $message }}
							<a href="/login" class="alert-danger mt-auto mb-auto">
								<i class="fa fa-times" aria-hidden="true"></i>
							</a>
						</div>
						@enderror

						<div class="wrap-input100 validate-input" data-validate="Enter password">
							<span class="btn-show-pass">
								<i class="zmdi zmdi-eye"></i>
							</span>
							<input class="input100" type="password" name="password" id="password" required>
							<span class="focus-input100" data-placeholder="Password"></span>
						</div>

						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn">
									Login
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>