
<?php //echo $apps_api ;exit;?>

<div class="p-3 p-lg-4 border-bottom">
            <div class="row align-items-center">
              <div class="col-sm-4 col-8">
                <div class="media align-items-center">
                  <div class="d-block d-lg-none mr-2">
                    <a href="javascript: void(0);" class="user-chat-remove text-muted font-size-16 p-2"><i class="ri-arrow-left-s-line"></i></a>
                  </div>
                  <div class="mr-3">
                    <img src="/themes/assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="">
                  </div>
                  <div class="media-body overflow-hidden">
                    <h5 class="font-size-16 mb-0 text-truncate"><a href="#" class="text-reset user-profile-show"><?=$name?></a> <i class="ri-record-circle-fill font-size-10 text-success d-inline-block ml-1"></i></h5>
                  </div>
                </div>
              </div>
              <div class="col-sm-8 col-4">
                <ul class="list-inline user-chat-nav text-right mb-0">



                  <li class="list-inline-item">
                    <div class="dropdown">
                      <button class="btn nav-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ri-more-fill"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item d-block d-lg-none user-profile-show" href="#">View profile <i class="ri-user-2-line float-right text-muted"></i></a>
                        <a class="dropdown-item d-block d-lg-none" href="#" data-toggle="modal" data-target="#audiocallModal">Audio <i class="ri-phone-line float-right text-muted"></i></a>
                        <a class="dropdown-item d-block d-lg-none" href="#">Video <i class="ri-vidicon-line float-right text-muted"></i></a>
                        <a class="dropdown-item" href="#">Archive <i class="ri-archive-line float-right text-muted"></i></a>
                        <a class="dropdown-item" href="#">Muted <i class="ri-volume-mute-line float-right text-muted"></i></a>
                        <a class="dropdown-item" href="#">Delete <i class="ri-delete-bin-line float-right text-muted"></i></a>
                      </div>
                    </div>
                  </li>

                </ul>


              </div>
            </div>
          </div>
          <!-- end chat user head -->

          <!-- start chat conversation -->
          <div class="chat-conversation p-3 p-lg-4" data-simplebar="init" id="chatlist">
            <ul class="list-unstyled mb-0">
    <?php $i=0; foreach ($chatdata as $data) {
            $i++;
            if ($i==1){
                $lastid=$data['id'];
            }
        ?>

                <?php if ($data['status'] != "FAILED") {?>
        <?php if ($data['from_me'] == "true") {?>
              <li class="right">
                <div class="conversation-list">
                  <div class="chat-avatar">
                    <img src="/themes/assets/images/users/avatar-1.jpg" alt="">
                  </div>

                  <div class="user-chat-content">
                    <div class="ctext-wrap">
                      <div class="ctext-wrap-content">
                        <p class="mb-0">
                        <div>
                        <?php if ($data['media_url'] != null) {?>

                            <?php if ($data['type'] == "image") {?>
                                <a href="http://45.77.168.214:3333<?=$data['media_url']?>" target="_blank">     <img src="http://45.77.168.214:3333/media/4/3EB095A60572C9CEB3BF.jpeg" width="50px;"></a>
                            <?php }?>

                            <?php if ($data['type'] == "document") {?>
                               <a href="<?=$apps_api . $data['media_url']?>" target="_blank">Document</a>
                            <?php }?>
                        <?php }?>
                        </div>
                          <?=$data['message']?>
                        </p>
                        <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i> <span class="align-middle"><?=$data['created_at']?></span></p>
                      </div>

                      <div class="dropdown align-self-start">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="ri-more-2-fill"></i>
                        </a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Copy <i class="ri-file-copy-line float-right text-muted"></i></a>
                          <a class="dropdown-item" href="#">Save <i class="ri-save-line float-right text-muted"></i></a>
                          <a class="dropdown-item" href="#">Forward <i class="ri-chat-forward-line float-right text-muted"></i></a>
                          <a class="dropdown-item" href="#">Delete <i class="ri-delete-bin-line float-right text-muted"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="conversation-name">Me</div>
                  </div>
                </div>
              </li>

            <?php } else {?>
                <li>
                <div class="conversation-list">
                  <div class="chat-avatar">
                    <img src="/themes/assets/images/users/avatar-4.jpg" alt="">
                  </div>

                  <div class="user-chat-content">
                    <div class="ctext-wrap">
                      <div class="ctext-wrap-content">
                        <p class="mb-0">
                        <?=$data['message']?>
                        </p>
                        <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i> <span class="align-middle"><?=$data['created_at']?></span></p>
                      </div>
                      <div class="dropdown align-self-start">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="ri-more-2-fill"></i>
                        </a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Copy <i class="ri-file-copy-line float-right text-muted"></i></a>
                          <a class="dropdown-item" href="#">Save <i class="ri-save-line float-right text-muted"></i></a>
                          <a class="dropdown-item" href="#">Forward <i class="ri-chat-forward-line float-right text-muted"></i></a>
                          <a class="dropdown-item" href="#">Delete <i class="ri-delete-bin-line float-right text-muted"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="conversation-name"><?=$name?></div>
                  </div>
                </div>
              </li>
            <?php }?>
            <?php }?>
            <?php }?>
            <li> <div id="lastchat"></div></li>
            </ul>

          </div>
          <!-- end chat conversation end -->

          <!-- start chat input section -->
          <div class="chat-input-section p-3 p-lg-4 border-top mb-0">
            <div class="row no-gutters">

              <div class="col">
                <div>
                  <input type="text" class="form-control form-control-lg bg-light border-light" placeholder="Enter Message..." id="messageinput">
                </div>
              </div>
              <div class="col-auto">
                <div class="chat-input-links ml-md-2">
                  <ul class="list-inline mb-0">

                    <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Attached File">

             <form id="imageUploadForm" >
                    <input type="file" accept="image/x-png,image/gif,image/jpeg,application/pdf,application/vnd.ms-excel" id="file" hidden>
                    </form>

                      <button type="button" class="btn btn-link text-decoration-none font-size-16 btn-lg waves-effect" onclick="selectfile()">
                        <i class="ri-attachment-line"></i>
                      </button>
                    </li>
                    <li class="list-inline-item">
                      <button type="button" class="btn btn-primary font-size-16 btn-lg chat-send waves-effect waves-light" onclick="sendmessage()">
                        <i class="ri-send-plane-2-fill"></i>
                      </button>
                    </li>
                  </ul>
                </div>

              </div>
            </div>
          </div>
    <!-- audiocall Modal -->
    <div class="modal fade" id="audiocallModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <div class="text-center p-4">

             <div class ="row">

             <div class="col-12" style="text-align:center;">
             <!-- <form id="imageUploadForm"></form>
             <input type="file" accept="image/x-png,image/gif,image/jpeg" id="ImageBrowse"> -->
             </div>
             </div>
             <!-- <div class ="row">
             <div class="col">
                <div>
                  <input type="text" class="form-control form-control-lg bg-light border-light" placeholder="Enter Message..." id="messageinput">
                </div>
              </div>
              <div class="col-auto">
                <div class="chat-input-links ml-md-2">
                  <ul class="list-inline mb-0">


                    <li class="list-inline-item">
                      <button type="button" class="btn btn-primary font-size-16 btn-lg chat-send waves-effect waves-light" onclick="sendmessageimage()">
                        <i class="ri-send-plane-2-fill"></i>
                      </button>
                    </li>
                  </ul>
                </div>
             </div> -->


              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
    <!-- audiocall Modal -->
  <script src="/themes/assets/libs/jquery/jquery.min.js"></script>
          <!-- end chat input section -->
          <script>

              var interval = setInterval(function() {
                  checkchat();
              }, 5000);


        //   $(document).scrollTop($(document).height());
var input = document.getElementById("messageinput");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    sendmessage();
  }
});

        function selectfile(){
            $("#file").click();
        }


  function checkchat(){
      var messageinput = $('#messageinput').val();
      var varurl = window.location.protocol + "//" + location.hostname + "/cs/rest_checkchat";
      $.ajax({
          type: 'post',
          url: varurl,
          data: {"id":"<?=$id?>","lastid":"<?=$lastid?>"},
          success: function (response) {

              if(response=="true"){
                  console.log(response);
                  loadchatframe("<?=$id?>","<?=$name?>");
              }
            // console.log(response);
          },
          error: function () {
              // alert("response failed !!");
          }
      });
  }
  function sendmessage(){
            var messageinput = $('#messageinput').val();
      var varurl = window.location.protocol + "//" + location.hostname + "/cs/rest_sendchat";
  $.ajax({
    type: 'post',
    url: varurl,
    data: {"message":messageinput,"id":"<?=$id?>"},
    success: function (response) {
        loadchatframe("<?=$id?>","<?=$name?>");
    },
    error: function () {
      // alert("response failed !!");
    }
  });
    }

    $('#imageUploadForm').on('submit',(function(e) {
        var formData = new FormData(this);
        // var formData = $(this).serialize();
        var messageinput = $('#messageinput').val();
  var files = $('#file')[0].files[0];
  formData.append('file', files);
formData.append('message', messageinput);
formData.append('id', "<?=$id?>");
        // alert(formData);
      var varurl = window.location.protocol + "//" + location.hostname + "/cs/rest_sendchatfile";
  $.ajax({
    url: varurl,
    data: formData,
    type: 'POST',
    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
    processData: false,
    success: function (response) {
        // alert(response);
        loadchatframe("<?=$id?>","<?=$name?>");
    },
    error: function () {
    }
  });
    }));

    $("#file").on("change", function() {
        $("#imageUploadForm").submit();
    });
             // alert( $('.simplebar-content-wrapper:visible').css('height'));

              // $('.simplebar-content-wrapper').addEventListener("overflow", function( event ) {
              //     console.log( event );
              //     console.log("this is scroll bottom of div");
              //
              // }, false);

              //
              // $( ".simplebar-content-wrapper:hidden" ).scroll(function() {
              //     $( "#log" ).append( "<div>Handler for .scroll() called.</div>" );
              // });


          </script>
<script>
    function loadchatframe(id,name){

        var varurl = window.location.protocol + "//" + location.hostname + "/cs/chatframe";
        $.ajax({
            type: 'post',
            url: varurl,
            data: {"id":id,"name":name},
            success: function (response) {
                $("#framechat").html(response);

            },
            error: function () {
            }
        });
    }

</script>