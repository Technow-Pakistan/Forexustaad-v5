<!-- Toast Start -->

<audio id ="NotificationSound" src="{{URL::to('public/assets/Sounds/notification.mp3')}}" loop="" style="display:none"></audio>

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

    // ChatDialogboxApprear
    $(".header-user-list .userlist-box, .userlist-box1").on("click", function() {
      var liveStatus = $(this).find(".live-status");
      var id = $(this).attr("data-id");
      $(".h-send-chat").attr("userId",id);
      var url = "{{URL::to('ustaad/clientDataMessage')}}/" + id;
      console.log(url);
			$.ajax({
				type: "Post",
				url: url,
				success: function(response){
					var json = $.parseJSON(response);
            var userId = json[0].id;
            var chatName = json[0].name;
            var chatImg = json[0].image;
            if (chatImg == null) {
              var chatImgSrc = "https://bootdey.com/img/Content/avatar/avatar7.png";
            }else{
              var chatImgSrc = "{{URL::to('storage/app')}}" + "/" + chatImg;
            }
              var chatImgSrc1 = "{{URL::to('public/assets/assets/img/favicon.png')}}";
            json.shift();
            $(".clientDataMessagesUser").html("");
            $(".clientDataMessagesUser").html(chatName);
            $(".clientDataMessagesUser").attr('userId',userId);
            $(".main-friend-chat").html("");
              var chatMessages = [];
              var chatStartCount = 0; 
              var AllAtOneClientMessageData = "";
            for (let index = 0; index < json[0].length; index++) {
              if (json[0][index].userType == 2 && chatStartCount == 1){
                  for (let index1 = 0; index1 < chatMessages.length; index1++){
                    AllAtOneClientMessageData = AllAtOneClientMessageData + chatMessages[index1];
                  }
                  ChatClientMessageThrough(chatImgSrc,AllAtOneClientMessageData)
              }
              if (json[0][index].userType == 1 && chatStartCount == 2){
                  for (let index1 = 0; index1 < chatMessages.length; index1++){
                    AllAtOneClientMessageData = AllAtOneClientMessageData + chatMessages[index1];
                  }
                  AdminClientMessageThrough(chatImgSrc1,AllAtOneClientMessageData)
              }
              if (json[0][index].userType == 1){
                if (chatStartCount == 2) {
                  console.log("a2");
                  chatMessages = [];
                  AllAtOneClientMessageData = "";
                }
                var chatOneMessage = "<p class='chat-cont mr-1'>"+json[0][index].message+"</p></br>"
                chatMessages.push(chatOneMessage); 
                chatStartCount = 1;
              }
              if (json[0][index].userType == 2){
                if (chatStartCount == 1) {
                  console.log("a1");
                  chatMessages = [];
                  AllAtOneClientMessageData = "";
                }
                var chatOneMessage = "<p class='chat-cont mr-1'>"+json[0][index].message+"</p></br>"
                chatMessages.push(chatOneMessage); 
                chatStartCount = 2;
                  console.log("c");
              }
              if (index+1 == json[0].length) {
                  for (let index1 = 0; index1 < chatMessages.length; index1++){
                    AllAtOneClientMessageData = AllAtOneClientMessageData + chatMessages[index1];
                  }
                  if (json[0][index].userType == 2){
                    AdminClientMessageThrough(chatImgSrc1,AllAtOneClientMessageData);
                  }else{
                    ChatClientMessageThrough(chatImgSrc,AllAtOneClientMessageData);
                  }
                }
            }
            $(".header-chat").addClass("open");
            $(".header-user-list").toggleClass("msg-open");
            var liveChatIconHeader = liveStatus.html();
            var liveChatIconHeaderCount1 = $(".ChatMessageCount").html();
            var liveChatIconHeaderCount = liveChatIconHeaderCount1 - liveChatIconHeader;
            if(liveChatIconHeaderCount < 0){
              liveChatIconHeaderCount = 0;
            }
            // Chat Box Scroll Bottom
            var objDiv = document.getElementById("main-chat-cont ");
            objDiv.scrollTop = objDiv.scrollHeight;
            $(".ChatMessageCount").html(liveChatIconHeaderCount);
            liveStatus.html(0);
            console.log("ads2");
            console.log("ads1");
				},
				error: function(data) {
					console.log("fail");
				}
      });
    });

    function ChatClientMessageThrough(chatImgSrc,AllAtOneClientMessageData){
      $(".main-friend-chat").append("<div class='media chat-messages'><a class='media-left photo-table' href='#!'><img class='media-object img-radius img-radius m-t-5' src='"+chatImgSrc+"' alt='Generic placeholder image'/></a><div class='media-body chat-menu-content'><div class=''>"+AllAtOneClientMessageData+"</div></div></div>")
    }
    function AdminClientMessageThrough(chatImgSrc1,AllAtOneClientMessageData){
      $(".main-friend-chat").append("<div class='media chat-messages'><div class='media-body chat-menu-reply'><div class=''>"+AllAtOneClientMessageData+"</div></div><a class='media-left photo-table' href='#!'><img class='media-object img-radius img-radius m-t-5' src='"+chatImgSrc1+"' alt='Generic placeholder image'/></a></div>")
    }


    function b(g) {
        $(".header-chat .main-friend-chat").append('<div class="media chat-messages"><div class="media-body chat-menu-reply"><div class=""><p class="chat-cont">' + $(".h-send-chat").val() + '</p></br></div></div><a class="media-right photo-table" href="#!"><img class="media-object img-radius img-radius m-t-5" src="https:forexustaad.com/public/assets/assets/img/favicon.png" alt="Generic placeholder image"></a></div>');
        var chatMessageSave = $(".h-send-chat").val();
        $(".h-send-chat").val(null);
        var idToGet =  $(".h-send-chat").attr("userId");
        var urlPost = "{{URL::to('ustaad/clientMessageSend')}}/" +  idToGet;
        console.log(urlPost);
        $.ajax({
          type: "Post",
          data : {
            data1: chatMessageSave
          },
          url: urlPost,
          success: function(response){
            console.log(response);
          },
          error: function(data) {
            console.log("fail");
          }
        });
        var findedIndex = ".userId" + idToGet;
          var countAdd = $(".main-friend-listRecent").find(findedIndex);
          var add = countAdd.html();
          if(countAdd[0] == null){
            var urlPost1 = "{{URL::to('ustaad/GetClientInfo')}}/" +  idToGet;
            $.ajax({
              type: "Post",
              url: urlPost1,
              success: function(response){
                var json1 = $.parseJSON(response);
                $(".main-friend-listRecent").prepend("<div class='media userlist-box' data-id='"+json1.id+"' data-status='online' data-username='"+json1.name+"'><a class='media-left' href='#!'><img class='media-object img-radius' src='"+json1.image+"' alt='Generic placeholder image'/><div class='live-status userId"+json1.id+"'>0</div></a><div class='media-body'><h6 class='chat-header'>"+json1.name+"</h6></div></div>");
              },
              error: function(data) {
                console.log("fail");
              }
            });
          }
    }
</script>

              <!-- Pusher Start -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = false;

      var pusher = new Pusher("{{env('PUSHER_APP_KEY')}}", {
        cluster: "{{env('PUSHER_APP_CLUSTER')}}"
      });

      
      var channel = pusher.subscribe("AdminChatPush");
        channel.bind("firstEvent", function(data) {
          var findedIndex = ".userId" + data.message.userId;
          var countAdd = $(".main-friend-listRecent").find(findedIndex);
          var add = countAdd.html();
          if(countAdd[0] == null){
            var urlPost1 = "{{URL::to('ustaad/GetClientInfo')}}/" +  data.message.userId;
            $.ajax({
              type: "Post",
              url: urlPost1,
              success: function(response){
                var json1 = $.parseJSON(response);
                $(".main-friend-listRecent").prepend("<div class='media userlist-box' data-id='"+json1.id+"' data-status='online' data-username='"+json1.name+"'><a class='media-left' href='#!'><img class='media-object img-radius' src='"+json1.image+"' alt='Generic placeholder image'/><div class='live-status userId"+json1.id+"'>1</div></a><div class='media-body'><h6 class='chat-header'>"+json1.name+"</h6></div></div>");
              },
              error: function(data) {
                console.log("fail");
              }
            });
          }else{
            countAdd.html(++add);
            var ChatMessageCount = $(".ChatMessageCount").html();
            var hideDivChat = countAdd.parent().parent();
            var PrependDivChat = countAdd.parent().parent().parent();
            $(PrependDivChat).prepend(hideDivChat);
            console.log(hideDivChat);
          }
          var userId1 = $(".clientDataMessagesUser").attr("userId");
          var ChatMessageCount = $(".ChatMessageCount").html();
          var hideDivChat = countAdd.parent().parent();
          console.log(hideDivChat);
          if (data.message.userId == userId1) {
            countAdd.html(--add);
            var userIdSrc = ".userId" + data.message.userId;
            var userIdSrc12 = $(userIdSrc).parent().children();
            var userIdSrc13 = $(userIdSrc12).attr('src')
            console.log(userIdSrc13);
            var userIdSrcMessage = "<p class='chat-cont mr-1'>"+data.message.message+"</p></br>";
            ChatClientMessageThrough(userIdSrc13,userIdSrcMessage);
          }else{
            $(".ChatMessageCount").html(++ChatMessageCount);
          }
          $("#NotificationSound")[0].play();
          setTimeout(function(){ $("#NotificationSound")[0].pause(); }, 4000);
          console.log(data.message.userId);
          console.log("sad");
        });

    </script>


