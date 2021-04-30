<?php

include_once('../database/db.php');
//if(!isset($_SESSION['superadmin']))
//{
//	header('location:auth-login.php');
//}
if(!isset($_SESSION['a_id'])){
	header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php
include_once('header.php');
	
	?>

<body class="nk-body bg-lighter npc-default has-sidebar">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
         <?php
			include_once('sidebar.php');
			?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
               <?php
				include_once('headernav.php');
				?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Rooms</h3>
                                            
                                        </div><!-- .nk-block-head-content -->
                                        <div class="col-md-4 text-center">
                                       
                                        <button type="button" class="btn btn-primary mr-5 text-center btn-lg " onclick="openmodal()">
                                        Create Room</button>
                                        </div>
                                        <div class="nk-block-head-content">
                                        
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                
<!--
                                                    <ul class="nk-block-tools g-3">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Last 30 Days</span></a></li>
                                                                        <li><a href="#"><span>Last 6 Months</span></a></li>
                                                                        <li><a href="#"><span>Last 1 Years</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                                    </ul>
-->
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                 <div class="nk-block">
                                    <div class="row g-gs text-center" id="rdata">
                      
                               
                        
                                     
                               
                                           
                                       
                                    
                                   
                                      
                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
                                <div class="modal fade" tabindex="-1" id="modalForm2">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Room name</h5>
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<em class="icon ni ni-cross"></em>
</a>
</div>
<div class="modal-body">
<form class="form-validate is-alter" id="roomdata" method="post">
<div class="row">
<div class="form-group col-md-12 mb-4">
<label class="form-label" for="rname">Name</label>
<div class="form-control-wrap">

<input type="text" class="form-control" id="rname" name="rname" required>
</div>
</div>
</div>
<div class="form-group">
<button type="submit" class="btn btn-lg btn-primary" id="roomsave">Save</button>

</div>
</form>
</div>
<div class="modal-footer bg-light">

        <button type="button" class="btn btn-danger" data-dismiss="modal" id="mclose">Close</button>
     
</div>
</div>
</div>
</div>  
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
             <?php
				include_once('footer.php');
				if(isset($_SESSION['status']))
				{
					echo(" <script>
					toastr.clear();
   				 NioApp.Toast('<h5>Login Successfully</h5><p>Your profile has been created successfully.</p>', 'success',{position:'top-right'});</script>");
					unset($_SESSION['status']);
				}
				?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <script>
    function openmodal()
    {
        $('#modalForm2').modal('show');
    }
   
    function RoomRecord(){
        var readRecord = "roomRecord" ;
        $.ajax({
          type: "post",
          url: "phpcode.php",
          data: {RoomRecord:readRecord},
         
          success: function (data) {
           
           if(data == "no rooms")
           {
            // $('#rdata').html("There is No Rooms Available");
            // // $('#rdata').attr('class','')
           }
           else{
            $('#rdata').html(data);
           }
          }
        }); 

   }
   $(document).ready(function(){
        RoomRecord();
    });

    $("#roomdata").on('submit', function(e){
e.preventDefault();

var formapp = new FormData(this);
formapp.append("roomdata","btn");

$.ajax({
type: 'POST',
url: 'phpcode.php',
data: formapp,
contentType: false,
processData:false,
success: function(data){
if(data == "Success"){
$('#roomdata')[0].reset();
$('#modalForm2 .close').click();
toastr.clear();
NioApp.Toast("<h5>Successfully Added Room</h5>", 'success',{position:'top-right'});
RoomRecord();



}
else {
toastr.clear(); 
NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
}

}

});
    });


    function activenotactive(id,status) {
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: {
                eid:id,
                rabtn: "btn",
                status: status
            },

            success: function(data) {
            console.log(data);
               if (data == 'Success') {

                    toastr.clear();
                    NioApp.Toast("<h5>Room Active Successfully</h5>", 'success', {
                        position: 'top-right'
                    });
                    $('#icon').addClass('fa-door-open');
                    $('#icon').removeClass('fa-door-closed');
                    RoomRecord();
                }if (data == 'Successs') {

                    toastr.clear();
                    NioApp.Toast("<h5>Room De-Activate Successfully</h5>", 'success', {
                        position: 'top-right'
                    });
                    $('#icon').removeClass('fa-door-open');
                    $('#icon').addClass('fa-door-closed');
                    RoomRecord();
                }


            }
        });
    }

    </script>
    <!-- app-root @e -->
<script src="assets/js/example-toastr.js?ver=2.2.0"></script>
</body>

</html>