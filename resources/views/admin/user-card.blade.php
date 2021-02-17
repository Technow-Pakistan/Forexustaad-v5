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
		<div class="row">
			<div class="col-md-12">
				<div class="card">
                    <form class="pt-5 ml-5 mr-5" action="" method="post">
                        <div class="row">
                            @php
                                $count=0;
                                $selected=0;
                                if(isset($member)){
                                    $count=1;
                                    $selected=$member->memberId;
                                }
                            @endphp
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for="user_login">Username<span class="text-danger">*</span></label>
                                <input type="text" name="username" value="{{$count != 0 ? $member->username : '' }}" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for="user_login">Email<span class="text-danger">*</span></label>
                                <input type="text" name="email" value="{{$count != 0 ? $member->email : '' }}" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for="user_login">First Name<span class="text-danger">*</span></label>
                                <input type="text" name="firstName" value="{{$count != 0 ? $memberDetail->firstName : '' }}" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for="user_login">Last Name<span class="text-danger">*</span></label>
                                <input type="text" name="lastName" value="{{$count != 0 ? $memberDetail->lastName : '' }}" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for="user_login">Website</label>
                                <input type="text" name="website" value="{{$count != 0 ? $memberDetail->website : '' }}" class="form-control">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for="user_login">Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for="user_login">Phone Number<span class="text-danger">*</span></label>
                                <input type="text" name="mobile" value="{{$count != 0 ? $memberDetail->mobile : '' }}" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for="user_login">Role<span class="text-danger">*</span></label>
                                <select class="form-control" name="memberId">
                                    @foreach($memberData as $member)
                                        @if($member->member != "Admin")
                                            <option value="{{$member->id}}"{{$selected == $member->id ? 'selected' : '' }}>{{$member->member}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <label for="user_login">Address<span class="text-danger">*</span></label>
                                <input type="text" name="address" value="{{$count != 0 ? $memberDetail->address : '' }}" class="form-control" required>
                            </div>
                        </div><br>
                        <p class="submit">
                            <input type="submit" name="submit" id="submit" class="btn btn-outline-primary" value="save"> <span class="spinner"></span>
                            <!-- <input type="reset" name="reset" id="reset" class="btn btn-outline-danger" value="reset"> <span class="spinner"></span> -->
                        </p>
                    </form>
                </div>
			</div>
		</div>
		<!-- [ Main Content ] end -->
	</div>
</div>
<!-- [ Main Content ] end -->

@include('admin.include.footer')
