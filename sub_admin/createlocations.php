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
                                    <div class="nk-block-head nk-block-head-lg wide-sm">
										<h2 class="nk-block-title fw-normal">Create Location</h2>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                       <div class="card p-5">
										   <form method="post" id="locationadd" enctype="multipart/form-data">
											<div class="row gy-4">
												<div class="col-md-6">
													<?php
													
													$em = $_SESSION['a_id'];
													$q = mysqli_query($con,"SELECT * FROM tbl_ruser WHERE ur_email = '$em'");
													$fe = mysqli_fetch_array($q);
													
													?>
													<div class="form-group">
														<label class="col-form-label" for="fname">Enter First Line Address</label>
																
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="Enter First Line Address" name="locname" required>
														
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="sname">Second Line Address</label>
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="Enter Second Line Address" name="locaddress" autocomplete="off" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="email">Location Postcode</label>
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="Enter Postcode" name="locpost" autocomplete="off" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="email">Location City</label>
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="Enter City" name="loccity" autocomplete="off" required>
													</div>
												</div>
<!--
												<div class="col-12">
													<div class="custom-control custom-switch">
														<input type="checkbox" class="custom-control-input" id="latest-sale">
														<label class="custom-control-label" for="latest-sale">Use full name to display </label>
													</div>
												</div>
-->
												<div class="col-md-12" id="regishide">
													<div class="form-group">
														<input class="btn btn-lg btn-primary" type="submit" value="Save" id="addlocation">
													</div>
												</div>
											</div>
										  </form>
									   </div>
                                    </div> <!-- nk-block -->
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

    <!-- app-root @e -->
  <script src="assets/js/example-toastr.js?ver=2.2.0"></script>
</body>
<script>
	
//	function confirm(id)
//	{
//		 Swal.fire({
//      title: 'Are you sure?',
//      text: "You won't be able to revert this!",
//      icon: 'warning',
//      showCancelButton: true,
//      confirmButtonText: 'Yes, delete it!'
//    }).then(function (result) {
//      if (result.value) {
//        Swal.fire('Deleted!', 'Admin has been deleted.', 'success');
//		  deleteadmin(id);
//      }
//    });
//	}
//	function aprovenotaprove(id,status,email){
//	
//	
//	var name  = status;
//		var ide = id;
//		var em = email;
//
//		$.ajax({
//            type: 'POST',
//            url: 'phpcode.php',
//            data: {method:name,
//				   id:ide,
//				  em:em,
//				  },
//			
//            success: function(data){
//      
//                if(data == 'Error'){
//                   toastr.clear();
//    NioApp.Toast("<h5>Admin didn't Updated</h5>", 'error',{position:'top-right'});
//            
//                }
//				else if(data == 'Success'){
//				if(name == 'aapprove') 
//					{
//					
//						 toastr.clear();
//    NioApp.Toast("<h5>Admin Approval Rejected</h5>", 'error',{position:'top-right'});
//				fetchadmindata();
//					}
//					else{
//              toastr.clear();
//    NioApp.Toast("<h5>Admin Approved Successfully</h5>", 'success',{position:'top-right'});
//				fetchadmindata();
//					
//					}
//                }
//			
//           
//            }
//        });
//	};
//	function deleteadmin(id){
//		
//		var vid = id;
//		$.ajax({
//            type: 'POST',
//            url: 'phpcode.php',
//            data: {vid:vid,deladmin:"btn"},
//          
//    
//         
//            success: function(data){
//      
//                if(data == 'Error'){
//                    
//              toastr.clear();
//    NioApp.Toast("<h5>Admin Didn't Delete</h5>", 'error',{position:'top-right'});
//                }
//				else if(data == 'Success'){
//				
//          toastr.clear();
//    NioApp.Toast("<h5>Admin Delete Successfully</h5>", 'error',{position:'top-right'});
//					fetchadmindata();
//                }
//			
//           
//            }
//        });
//	};
//	  function openmodal1(id,name,email,address,password,contact) {
//        $('#id').val(id);
//        $('#full-name').val(name);
//        $('#email').val(email);
//        $('#address').val(address);
//        $('#password').val(password);
//        $('#contact').val(contact);
//  
//		
//        $('#modalForm2').modal('show');
//    };
	$("#locationadd").on('submit', function(e){
		
        	e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("addlocation","btn");
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            processData:false,
            beforeSend: function(){
                $('#addlocation').attr("disabled","disabled");
                $('#locationadd').css("opacity",".5");
            },
            success: function(data){
      
                if(data == 'Error'){
                   toastr.clear(); 
               NioApp.Toast("<h5>Location didn't add Successfully</h5>", 'error',{position:'top-right'});
                }
				else if(data == 'Success'){
					$('#locationadd')[0].reset();
					toastr.clear();
               NioApp.Toast("<h5>Location Added Successfully</h5>", 'success',{position:'top-right'});
               setTimeout(function(){window.location.href="locations.php";}, 1000);

					
					
                }
				else if(data == 'already'){
				
					toastr.clear();
               NioApp.Toast("<h5>Location Already Exist</h5>", 'error',{position:'top-right'});	
                }
                else if(data == 'alreadypost'){
				
					toastr.clear();
               NioApp.Toast("<h5>Location Postcode Exist</h5>", 'error',{position:'top-right'});	
                }
			
                $('#locationadd').css("opacity","");
                $("#addlocation").removeAttr("disabled");
            }
			
        });

    });
    	$(function () {

    // INITIALIZE DATEPICKER PLUGIN
    $('.datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy"
    });


    // FOR DEMO PURPOSE
    $('#reservationDate').on('change', function () {
        var pickedDate = $('input').val();
        $('#pickedDate').html(pickedDate);
    });
});
function stringlength(nhs)
{ 
var field = $('#nhsno').val(); 
var mnlen = 10;
var mxlen = 10;
if(field.length<mnlen || field.length> mxlen)
{ 

toastr.clear();
               NioApp.Toast("<h5>Please input the NHS no IN " +mxlen+ " characters</h5>", 'warning',{position:'top-right'});
$('#nhsno').val('');
return false;
}
$.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: {nhs:nhs,checknhs:"btn"},
			
            success: function(data){
                console.log(data);
     if(data == 'exists'){
				$("#valid-nhs").html("NHS No is already exists").removeClass("text-success").addClass("text-danger");
						 toastr.clear();
    NioApp.Toast("<h5>NHS No is already exists</h5>", 'warning',{position:'top-right'});
				// fetchadmindata();
					}
			if(data == 'not exists'){
			    			$("#valid-nhs").html("NHS No is available for use").removeClass("text-danger").addClass("text-success");
             toastr.clear();
    NioApp.Toast("<h5>NHS No is available for use</h5>", 'success',{position:'top-right'});
				// fetchadmindata();
					
					}
                }
			
          
            });

}
	</script>
</html>
<script>
	
</script>
