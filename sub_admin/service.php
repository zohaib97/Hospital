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
                                       
										 <h2 class="nk-block-title fw-normal">Services</h2>
                                      
                                         <a href="servicedefiner.php" class="btn btn-primary float-right ml-5" >Create Services</a>
                                 
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
        <div class="modal fade" tabindex="-1" id="modalForm2">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Service name</h5>
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<em class="icon ni ni-cross"></em>
</a>
</div>
<div class="modal-body">
<form class="form-validate is-alter" id="nameupdate" method="post">
<div class="row">
<div class="form-group col-md-12 mb-4">
<label class="form-label" for="sname">Name</label>
<div class="form-control-wrap">
<input type="text" class="form-control" id="id" name="id" hidden>
<input type="text" class="form-control" id="sname" name="sname" required>
</div>
</div>
</div>
<div class="form-group">
<button type="submit" class="btn btn-lg btn-primary" id="sernameupdate">Save</button>
</div>
</form>
</div>
<div class="modal-footer bg-light">
</div>
</div>
</div>
</div>
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
          data: {readRecord:readRecord},
         
          success: function (data) {
           
            $('#rdata').html(data);
            
          }
        }); 

   }
   function openmodal3(id,name) {	
 $('#sname').val(name);
 $('#id').val(id);
$('#modalForm2').modal('show');
};	
   
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

    $("#nameupdate").on('submit', function(e){
e.preventDefault();

var formapp = new FormData(this);
formapp.append("sername","btn");

$.ajax({
type: 'POST',
url: 'phpcode.php',
data: formapp,
contentType: false,
processData:false,
success: function(data){
if(data){
$('#nameupdate')[0].reset();
toastr.clear();
NioApp.Toast("<h5>Successfully Updated</h5>", 'success',{position:'top-right'});
readRecord();
$('#modalForm2').modal('hide');

}
else {
toastr.clear(); 
NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
}
}

});
    });

	</script>
</html>
