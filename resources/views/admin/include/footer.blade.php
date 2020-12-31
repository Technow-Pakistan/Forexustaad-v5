<!-- The Modal -->
 <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Are you sure you want to Delete?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form action="" method="get" class="addActionForm">
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Enter your Password</label><br>
                    <input type="password" class="form-control passwordModal" required>
                    <p class="modalError text-danger"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
          <!-- Modal footer -->
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Submit">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>


	<!-- style modal -->
	<style>
	

.awd-ok{
	background: #FF5370 !important;
}
.awd-cancel{
	background: #2196F3 !important;
	color: black !important;
}

.awd-cancel{
	background: transparent;
	color: #678994;
}

.awd-cancel:hover{
	background: #ddd;
	color: #0079ff;
}

.awsm-dialog{
	display: none;
	position: fixed;
	top: calc(50% - 80px);
	left: calc(50% - 200px);
	width: 400px;
	background: #eee;
	box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
	padding: 40px 0;
}

.awd-content{
	width: 100%;
	height: 100%;
	text-align: center;
}

.awd-message{
	font-size: 20px;
	font-weight: 300;
	margin: 0;
	margin-bottom: 30px
}
	
	</style>
		
		


	<!-- form -->

	<div class="awsm-dialog animated bounceIn">
			<div class="awd-content">
				<p class="awd-message">Are you sure?</p>
				<a href="#" class="btn awd-ok">Yes</a>
				<button class="btn awd-cancel">No</button>
			</div>
		</div>

<script>


  var awsmDialog = (function(){
    function $(selector){
      return document.querySelector(selector);
    }

    function create(tag, cl, txt){
      var el = document.createElement('div');
      el.className = cl;
      if(txt){
        var newContent = document.createTextNode(txt);
        el.appendChild(newContent);
      }
      return el;
    }
    
   var dialog = $('.awsm-dialog'),
      okCallback = null,
      cancelCallback = null;

    function init(){
      if(dialog) return;

      dialog = create('div', 'awsm-dialog');

      var divContent = create('div', 'awd-content');

      dialog.appendChild(divContent);

      var pMessage = create('p', 'awd-message', 'Are you sure?');

      divContent.appendChild(pMessage);

      var btnOk = create('button', 'btn awd-ok', 'Yes');

      divContent.appendChild(btnOk);

      var btnCancel = create('button', 'btn awd-cancel', 'No');

      divContent.appendChild(btnCancel);

      document.querySelector('body').append(dialog);
    }
    
   function open(message){
      init();
      okCallback = null;
      cancelCallback = null;
     $('.awd-message').innerText = message;
      show();
      return this;
    }
    
    function show(){
     dialog.style.display = 'block';
      ok();
      cancel();
    }
    
    function ok(callback){

      okCallback = callback;

     $('.awd-ok').onclick = function(ev){

        hide();

        if(okCallback){

          okCallback();

        }
     };

     return this;
    }

    function cancel(callback){

      cancelCallback = callback;

      $('.awd-cancel').onclick = function(ev){

        hide();
        
        if(cancelCallback){

          cancelCallback();

        }
      }
    }
    
    function hide(){
      dialog.className = 'awsm-dialog animated bounceOutDown';
       
      setTimeout(function(){
        dialog.style.display = 'none';
        dialog.className = 'awsm-dialog animated bounceIn';
      }, 1000);
    }
    
    return {
      open,
      ok,
      cancel
    };
    
  })();

  var btn = document.querySelector('.btn-dialog');

  btn.addEventListener('click', function(ev){
    ev.preventDefault();
    
    awsmDialog.open('Are you sure you want to Delete this?');
  })


  // for creating preview screenshot

  var btnOk = document.querySelector('.awd-ok');

  function demo(){


    setInterval(function(){
      btn.click()
    }, 1000);
    
    setInterval(function(){
        btnOk.click();
      }, 3000);
  }

  if (document.location.pathname.indexOf('fullcpgrid')>-1){
    demo();
  }

</script>
		<!-- Required Js -->
		
		<script>
			CKEDITOR.replace('editor1',{
                height: 300,
                filebrowserUploadUrl:'{{URL::to('/uploader/upload.php')}}',
            });
			CKEDITOR.replace('editor2');
			CKEDITOR.replace('editor3');
			
		</script>
		<script src="{{URL::to('/public/assets/assets/js/vendor-all.min.js')}}"></script>
		<script defer src="{{URL::to('/public/assets/node_modules/bootstrap/dist/js/bootstrap.js')}}"></script> 
		<script src="{{URL::to('/public/assets/assets/js/pcoded.min.js')}}"></script>
		<script src="{{URL::to('/public/assets/assets/js/menu-setting.min.js')}}"></script>
				<!-- Select2  -->

				<script src="{{URL::to('/public/assets/assets/js/select2.full.min.js')}}"></script>
				<script src="{{URL::to('/public/assets/assets/js/form-select-custom.js')}}"></script>
		<!-- Apex Chart -->
		<script src="{{URL::to('/public/assets/assets/js/apexcharts.min.js')}}"></script>

		<!-- custom-chart js -->
		<script src="{{URL::to('/public/assets/assets/js/dashboard-main.js')}}"></script>
		<script src="https://cdn.tiny.cloud/1/hkemh60vfhq4w7kvvdv59h4ml0yn66nigaxbgv7xbj0ttyk8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		
        @php 
          $value =Session::get('admin');
        @endphp
    <script>
      $(".addActionForm").on("submit",function(e){
        var password1 = "{{$value->password}}";
        var password2 = $(".passwordModal").val();
        if (password1 != password2 ) {
          e.preventDefault()
          $(".modalError").html("Your password does not match.")
        }
      });


      $(".addAction").on("click",function(){
        var href = $(this).attr("href");
        $(".addActionForm").attr("action",href);
      })
		</script>
	</body>
</html>

	