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
	<link rel="icon" href="{{URL::to('/public/assets/assets/img/favicon.png')}}" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{URL::to('/public/assets/assets/css/adminstyle.css')}}">
	
  		<!-- font-awesome -->
		  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
		<style>
			.fa{
				font-family: "Font Awesome 5 Free", Open Sans;
				font-weight:501;
			}
			.fa{
				font-family: 'Font Awesome 5 Pro', 'Font Awesome 5 Free','Font Awesome 5 Solids', 'Font Awesome 5 Brands' !important;
			}
		</style>
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<img src="{{URL::to('/public/assets/assets/img/logo.png')}}" alt="" class="img-fluid mb-4">
						<h4 class="mb-3 f-w-400">Signin</h4>
						@isset($message)
							<div class="alert alert-danger">{{$message}}</div>
						@endisset
						<form action="" method="post">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="far fa-envelope"></i></span>
								</div>
								<input type="text" name="username" class="form-control" placeholder="Username or Email">
							</div>
							<div class="input-group mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-lock"></i></span>
								</div>
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
							<button type="submit" class="btn btn-block btn-primary mb-4">Signin</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
		<script src="{{URL::to('/public/assets/assets/js/vendor-all.min.js')}}"></script>
		<script defer src="{{URL::to('/public/assets/node_modules/bootstrap/dist/js/bootstrap.js')}}"></script> 

</body>
</html>