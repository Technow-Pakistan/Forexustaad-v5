@include('admin.include.header')
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5>User card</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/member/userList')}}">All Users</a></li>
							<li class="breadcrumb-item"><a href="#!">User card</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
        @php
            $value =Session::get('admin');
        @endphp
		<div class="row">
			<div class="col-md-12">
				<div class="card">
                    <form class="pt-5 ml-5 mr-5 ChangeForm" action="" method="post">
                        <div class="form-group">
                            <label for="user_login">Username<span class="text-danger">*</span></label>
                            <input type="text" name="disabled" value="{{$value['username']}}" disabled class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="user_login">Old Password<span class="text-danger">*</span></label>
                            <input type="password" name="oldPassword" class="form-control oldPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="user_login">New Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control password" required>
                        </div>
                        <div class="form-group">
                            <label for="user_login">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" name="confirmPassword" class="form-control confirmPassword" required>
                        </div>
                        <input type="hidden" name="username" value="{{$value['username']}}">
                        <p class="submit">
                            <input type="submit" id="submit" class="btn btn-outline-primary" value="Change"> <span class="spinner"></span>
                        </p>
						<p class="errorConfirmation text-danger"></p>
                    </form>
                </div>
			</div>
		</div>
		<!-- [ Main Content ] end -->
	</div>
</div>
<!-- [ Main Content ] end -->

@include('admin.include.footer')

		@php 
          $value =Session::get('admin');
        @endphp
<script>
	$(".ChangeForm").on("submit",function(e){
        var password1 = "{{$value->password}}";
        var password2 = $(".oldPassword").val();
		var password3 = $(".password").val();
		var password4 = $(".confirmPassword").val();
        if (password1 != password2 ) {
          e.preventDefault()
          $(".errorConfirmation").html("Your Old password is wrong.")
        }
        if (password3 != password4 ) {
          e.preventDefault()
          $(".errorConfirmation").html("Your password does not match.")
        }
    });
</script>
