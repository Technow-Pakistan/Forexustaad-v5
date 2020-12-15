<!DOCTYPE html>
<html lang="en">



<head>

	<title>Forexustaad Admin Panel</title>
	
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	
	<!-- Favicon icon -->
	<link rel="icon" href="{{URL::to('/public/AdminAssets/assets/images/favicon.png')}}" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{URL::to('/public/AdminAssets/assets/css/style.css')}}">
	
	


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<img src="{{URL::to('/public/AdminAssets/assets/images/logo.png')}}" alt="" class="img-fluid mb-4">
						<h4 class="mb-3 f-w-400">Signin</h4>
						@isset($message)
							<div class="alert alert-danger">{{$message}}</div>
						@endisset
						<form action="" method="post">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-mail"></i></span>
								</div>
								<input type="text" name="username" class="form-control" placeholder="Username">
							</div>
							<div class="input-group mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-lock"></i></span>
								</div>
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
							<!-- <div class="form-group text-left mt-2">
								<div class="checkbox checkbox-primary d-inline">
									<input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
									<label for="checkbox-fill-a1" class="cr"> Save credentials</label>
								</div>
							</div> -->
							<button type="submit" class="btn btn-block btn-primary mb-4">Signin</button>
						</form>
						<!-- <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p>
						<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{URL::to('/public/AdminAssets/assets/js/vendor-all.min.js')}}"></script>
<script src="{{URL::to('/public/AdminAssets/assets/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{URL::to('/public/AdminAssets/assets/js/waves.min.js')}}"></script>



</body>


</html>
