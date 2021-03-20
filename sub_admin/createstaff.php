<?php
include_once('../database/db.php');

?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php
	include_once('header.php');
	?>

<body class="nk-body bg-lighter npc-default has-sidebar ">
<style>
.field-icon {
  float: right;
	    margin-right: 11px;
  margin-left: -25px;
  margin-top: -33px;
  position: relative;
  z-index: 1;
}
</style>
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
										<h2 class="nk-block-title fw-normal">Create Staff</h2>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                       <div class="card p-5">
										   <form method="post" id="staffadd" enctype="multipart/form-data">
											<div class="row gy-4">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="fname">First Name</label>
<!--														<input type="text" value="" id="cid" hidden="true" name="id">-->
														<input type="text" class="form-control form-control-lg" id="fname" value="" placeholder="Enter Full name" name="staff_name"autocomplete="off" required  >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="sname">Sure Name</label>
														<input type="text" class="form-control form-control-lg" id="sname" value="" placeholder="Enter display name" name="staff_sname"autocomplete="off" required  >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="email">Email</label>
														<input type="email" class="form-control form-control-lg" id="email" value="" placeholder="e.g: yourname@domain.com" name="staff_email"  autocomplete="off" required >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="pno">Phone Number</label>
														<input type="number" class="form-control form-control-lg" id="pno" value="" placeholder="Phone Number" name="staff_contact" autocomplete="off" required >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="depart">Department</label>
														<input type="text" class="form-control form-control-lg" id="depart" value="" placeholder="Department" name="staff_depart" autocomplete="off" required >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="dob">Your Birth</label>
														<input type="text" class="form-control form-control-lg datepicker" id="dob" value="" placeholder="Date of Birth" name="staff_dob"  required >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="ad1">Address Line 1</label>
														<input type="text" class="form-control form-control-lg" id="ad1" value="" placeholder="Date of Birth" name="address1" autocomplete="off" required >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="ad2">Address Line 2</label>
														<input type="text" class="form-control form-control-lg" id="ad2" value="" placeholder="Date of Birth" name="address2" autocomplete="off" required >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="ad3">Address Line 3</label>
														<input type="text" class="form-control form-control-lg" id="ad3" value="" placeholder="Date of Birth" name="address3" autocomplete="off" required  >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="post">Post Code</label>
														<input type="text" class="form-control form-control-lg" id="post" value="" placeholder="Date of Birth" name="postcode" autocomplete="off" required > 
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="mpass">Password</label>
														<input type="text" class="form-control form-control-lg" id="pass" value="" placeholder="Password" name="staff_pass" autocomplete="off" required >
														<span toggle="#pass" class="ni ni-eye toggle-password field-icon"></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="cpass">Confirm Password</label>
														<input type="text" class="form-control form-control-lg" id="cpass" value="" placeholder="Confirm Password" name="staff_cpass" autocomplete="off" required > 
														<span toggle="#cpass" class="ni ni-eye toggle-password field-icon"></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="rno">Role</label>
														<select onChange="managerhie(this.value)" name="staff_role" id="role" class="form-control form-control-lg">
															<option value="">-Select-</option>
															<?php 
															$role = mysqli_query($con, "SELECT * FROM `staff_role`");
															while($datarole = mysqli_fetch_assoc($role)){
															?>
															<option value="<?=$datarole['role_id']?>"><?=$datarole['role_name']?></option>
															<?php
															}
															?>
														</select>
													</div>
												</div>
												<div class="col-md-6" id="regishide">
													<div class="form-group">
														<label class="col-form-label" for="rno">Registration No</label>
														<input type="text" class="form-control form-control-lg" id="rno" value="" placeholder="Registration Number" name="staff_regi" autocomplete="off" required >
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
												<div class="col-md-12" >
													<div class="form-group">
														<input class="btn btn-lg btn-primary" type="submit" value="Save" id="btnstaffdis">
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
//	function fetchadmindata()
//	{
//		 $.ajax({    
//        type: "POST",
//        url: "phpcode.php", 
//		data:{adminfetch:"btn"},	            
//        success: function(response){                    
//            $("#adata").html(response); 
//            //alert(response);
//        }
//
//    });
//	}
//	$(document).ready(function(){
//		fetchadmindata();
//	});
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
//	$("#aupdate").on('submit', function(e){
//		
//        	e.preventDefault();
//		var formdata = new FormData(this);
//		formdata.append("updatehadmin","btn");
//        $.ajax({
//            type: 'POST',
//            url: 'phpcode.php',
//            data: formdata,
//            contentType: false,
//            processData:false,
//            beforeSend: function(){
//                $('#adminupdate').attr("disabled","disabled");
//                $('#aupdate').css("opacity",".5");
//            },
//            success: function(data){
//      
//                if(data == 'Error'){
//                   toastr.clear(); 
//               NioApp.Toast("<h5>Admin didn't update Successfully</h5>", 'error',{position:'top-right'});
//                }
//				else if(data == 'Success'){
//					$('#aupdate')[0].reset();
//					toastr.clear();
//               NioApp.Toast("<h5>Admin Updated Successfully</h5>", 'success',{position:'top-right'});
//					fetchadmindata();
//					$('#modalForm2').modal('hide');
//					
//                }
//			
//                $('#aupdate').css("opacity","");
//                $("#adminupdate").removeAttr("disabled");
//            }
//			
//        });
//
//    });
$('.datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy"
    });
	$(".toggle-password").click(function() {

$(this).toggleClass("ni-eye-off");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
	</script>
</html>
<script>
	function managerhie(manager){
		if(manager == "1"){
			$('#regishide').hide();
	}else {
		$('#regishide').show();
	}
}
</script>
<?php
include_once('staffajax/ajax.php');
?>