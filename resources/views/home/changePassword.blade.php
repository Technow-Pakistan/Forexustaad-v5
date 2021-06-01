@include ('inc/header')
    <!-- /.End of tricker -->
    <section class="after_banner_content_area">
        <div class="container">
          <div class="row justify-content-center">
            @php
              if(Session::has('error')){
                $error =Session::get('error');
              }
            @endphp
              @isset($error)
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="alert alert-danger">{{$error}}</div>
                  @php Session::pull('error') @endphp
                </div>
              @endisset
              <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
                  @include ('inc/home-left-sidebar')
              </div>
              <div class="col-lg-6 col-md-12 order-1 order-lg-2">

                  <div id="signin">
                      <h1>Change Password</h1>

                      <!-- <div class="error">
                        Oh no, an error occured!
                      </div> -->
                      @php
                          $value =Session::get('client');
                      @endphp
                        <form class="ChangeForm" action="" method="post">
                        <label for="" class="text-left forgetLabel">Your Email:</label>
                          <input type="text" value="{{$value->email}}" disabled/>
                          <input type="hidden" name="email" value="{{$value->email}}"/>
                        <label for="" class="text-left forgetLabel">Old Password:</label>
                          <input type="password" class="oldPassword1" name="oldPassword" placeholder="Password" required/>
                        <label for="" class="text-left forgetLabel">Password:</label>
                          <input type="password" class="password1" name="password" placeholder="Password" required/>
                        <label for="" class="text-left forgetLabel">Confirm Password:</label>
                          <input type="password" class="confirmPassword1" placeholder="Confirm Password" required/>

                          <button type="submit">Change Password</button><br>
                          <div class="error6 text-danger"></div>
                      </form>
                    </div>
                    <style>
                      .forgetLabel{
                        display: block;
                        font-weight:900;
                      }
                    </style>

              </div>
              <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                  @include ('inc/home-right-sidebar')
              </div>
          </div>
        </div>
    </section>
</div>

@include ('inc/footer')

<script>
                        $(".ChangeForm").on("submit",function(e){
                          var password1 = $(".password1").val();
                          var confirmPassword1 = $(".confirmPassword1").val();
                          if(password1 != confirmPassword1) {
                            var error = "Your Password and Comfirmed Password is not matched.";
                            $(".error6").html(error);
                            e.preventDefault();
                          }
                        })
                      </script>
<style>

#signin {
  padding: 1em;
  margin: 1em;
  border-radius: 1em;
  text-align: center;
  background: white;
  color: rgba(0, 0, 0, 0.75);
}
#signin h1, #signin button {
  font-weight: 300;
  text-transform: uppercase;
}
#signin .error {
  background: rgba(255, 0, 0, 0.4);
  color: white;
  text-shadow: 0 1px 0 rgba(255, 100, 100, 0.75);
  margin-left: -1em;
  margin-right: -1em;
  margin-bottom: 1ex;
  padding: 1ex;
  border-top: 1px solid rgba(255, 100, 100, 0.75);
  border-bottom: 1px solid rgba(255, 100, 100, 0.75);
}
#signin input, #signin button {
  display: block;
  width: 100%;
  text-align: center;
  font-size: 1.1em;
  padding: 1ex;
  border: 2px solid #ECF0F1;
  transition: border ease 500ms;
  border-radius: 1ex;
  font-family: "Open Sans";
  background: #ECF0F1;
  color: #181818;
}
#signin input:focus, #signin button:focus {
  outline: none;
  border: 2px solid #3498DB;
}
#signin input:not(:last-child), #signin button:not(:last-child) {
  margin-bottom: 1ex;
}
#signin button {
  color: white;
  border: 2px solid #3498DB;
  background: #3498DB;
}
</style>
