<!-- Toast Start -->

<div id="snackbar"></div>
    <div id="snackbar1"></div>
<script>
  function snackbar() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }
  function snackbar1() {
    var x = document.getElementById("snackbar1");
    x.className = "show bg-success";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }
</script>
                    @if(Session::has('error'))
                      @php
                        $error =Session::get('error');
                      @endphp
                      <script>
                        var data = "{{$error}}";
                        var x = document.getElementById("snackbar");
                          x.innerHTML = "<i class='fa fa-exclamation-triangle'></i> &nbsp; " + data;
                          snackbar();
                      </script>
                      @php Session::pull('error') @endphp
                    @endif

                    @if(Session::has('success'))
                      @php
                        $success =Session::get('success');
                      @endphp
                      <script>
                          var data1 = "{{$success}}";
                          var x = document.getElementById("snackbar1");
                            x.innerHTML = "<i class='fa fa-check'></i> &nbsp; " + data1;
                            snackbar1();
                      </script>
                        @php Session::pull('success') @endphp
                    @endif
<!-- Toast End -->

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
	 /* star Checkbox */
	.hiddenCheckBox{
		display:none;
	}
	.yellowStar{
		color:yellow;
	}
	</style>




		<!-- Required Js -->

		<script src="{{URL::to('/public/assets/assets/js/vendor-all.min.js')}}"></script>
		<script defer src="{{URL::to('/public/assets/node_modules/bootstrap/dist/js/bootstrap.js')}}"></script>
		<script src="{{URL::to('/public/assets/assets/js/pcoded.min.js')}}"></script>
		<script src="{{URL::to('/public/assets/assets/js/menu-setting.min.js')}}"></script>
				<!-- Select2  -->

				<script src="{{URL::to('/public/assets/assets/js/select2.full.min.js')}}"></script>
				<script src="{{URL::to('/public/assets/assets/js/form-select-custom.js')}}"></script>
		<!-- Apex Chart -->
		<script src="{{URL::to('/public/assets/assets/js/apexcharts.min.js')}}"></script>
		<script src="{{URL::to('/public/assets/assets/js/jquery.peity.min.js')}}"></script>

		<!-- custom-chart js -->
		<script src="{{URL::to('/public/assets/assets/js/dashboard-main.js')}}"></script>
		<!-- <script src="https://cdn.tiny.cloud/1/hkemh60vfhq4w7kvvdv59h4ml0yn66nigaxbgv7xbj0ttyk8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

<!-- datatable Js -->


  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

		<script>
			CKEDITOR.replace('editor1',{
                height: 300,
                filebrowserUploadUrl:'{{URL::to('/uploader/upload.php')}}',
            });
		</script>
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

<script>
	$('#user-list-table').DataTable();
	// $('#user-list-table1').DataTable({
  //       responsive: true
  //   });
	// new $.fn.dataTable.FixedHeader( table );
</script>
	</body>
</html>

<!-- drag & drop rows -->
<script>

	let shadow
	function dragit(event){
	  shadow=event.target;
	}
	function dragover(e){
    let children=Array.from(e.target.parentNode.parentNode.children);
    if(children.indexOf(e.target.parentNode)>children.indexOf(shadow))
    e.target.parentNode.after(shadow);
    else e.target.parentNode.before(shadow);
	}

</script>

<!-- star checkbox -->
<script>
	$(".AllowBroker").on('change',function() {
		var data = $(this).parent().parent();
		data.submit();
	})
</script>
<script>
	$(".selectedAllNotification").on('click',function() {
		$('[id=checkedNotification]').prop('checked',true);
	});
</script>
<script>
  $(function() {
        $("span.pie_1").peity("pie", {
            fill: ["#4099ff", "#eff3f6"]
        });
        $("span.pie_2").peity("pie", {
            fill: ["#eff3f6", "#4099ff"]
        });
        $("span.pie_3").peity("pie", {
            fill: ["#eff3f6", "#4099ff"]
        });
        $(".data-attributes").peity("donut");
    });
</script>
