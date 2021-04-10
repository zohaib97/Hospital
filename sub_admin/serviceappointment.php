<?php
include_once('../database/db.php');

?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php
	include_once('header.php');
	?>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
           <?php
			include_once('sidebar.php')
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
                                <div class="components-preview wide-md mx-auto">
                                    <div class="nk-block-head nk-block-head-lg wide-sm" style="max-width: 900px !important;">
                                       
										 <h2 class="nk-block-title fw-normal">Service Appointment</h2>
                                      
                                         <!--<a href="servicedefiner.php" class="btn btn-primary float-right ml-5" >Create Services</a>-->
                                 
                                        </div>
                                   
									<br>
                                   
                                    <div class="nk-block nk-block-lg" id="rdata" style="overflow: auto;">
                                    
                             
                                    </div>
									
									<!-- nk-block -->
                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <?php
				include_once('footer.php');
				?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
	    <!-- Modal Form -->
    
    <!-- app-root @e -->
  <script src="assets/js/example-toastr.js?ver=2.2.0"></script>
</body>
<script>
$(document).ready(function(){
  readRecord();
})
// select qurey for ajax
   function readRecord(){
        var readRecord = "readRecord" ;
        $.ajax({
          type: "post",
          url: "phpcode.php",
          data: {readRecordbtnd:"btn"},
         
          success: function (data) {
            
            $('#rdata').html(data);
            
          }
        }); 

   }
   
   
   function deleteadmin(id) {

        var vid = id;
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: {
                vid: vid,
                delservice: "btn"
            },

            success: function(data) {

                if (data == 'Error') {

                    toastr.clear();
                    NioApp.Toast("<h5>Service Didn't Delete</h5>", 'error', {
                        position: 'top-right'
                    });
                } else if (data == 'Success') {

                    toastr.clear();
                    NioApp.Toast("<h5>Service Deleted Successfully</h5>", 'success', {
                        position: 'top-right'
                    });
                    readRecord();
                }
               


            }
        });
    };
    
    function confirm(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result) {
            if (result.value) {
                // Swal.fire('Deleted!', 'Manager has been deleted.', 'success');
                deleteadmin(id);
            }
        });
    }
     function eaprovenotaprove(id,status) {
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: {
                eid:id,
                obtn: "btn",
                status: status
            },

            success: function(data) {
            console.log(data);
               if (data == 'Success') {

                    toastr.clear();
                    NioApp.Toast("<h5>Services Active Successfully</h5>", 'success', {
                        position: 'top-right'
                    });
                    readRecord();
                }if (data == 'Successs') {

                    toastr.clear();
                    NioApp.Toast("<h5>Services  Not Active Successfully</h5>", 'success', {
                        position: 'top-right'
                    });
                    readRecord();
                }


            }
        });
    }
	</script>
</html>
