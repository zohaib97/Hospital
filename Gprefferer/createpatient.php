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
										<h2 class="nk-block-title fw-normal">Create Patient</h2>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                       <div class="card p-5">
										   <form method="post" id="patientadd" enctype="multipart/form-data">
											<div class="row gy-4">
												<div class="col-md-6">
													<?php
													
													$em = $_SESSION['gprefferer'];
													$qww = mysqli_query($con,"SELECT * FROM tbl_ruser WHERE ur_email = '$em'");
													$few = mysqli_fetch_array($qww);
													
													?>
													<div class="form-group">
														<label class="col-form-label" for="fname">Patient Title</label>
														<input type="text" value="<?=$few['ur_id']?>" id="rid" hidden="true" name="rid">										<input type="text" value="<?=$fe['ur_hid']?>" id="hid" hidden="true" name="hid">			
<!--														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="Enter Title" name="ptitle" required>-->
														<select name="ptitle" id="" class="form-control form-control-lg">
															<option>- Select -</option>
														<option value="Mr">Mr</option>
												<option value="Mrs">Mrs</option>
												<option value="Ms">Ms</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="sname">Patient Firstname</label>
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="Enter First name" name="pfirstname" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="email">Patient Surname</label>
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="Enter Surname" name="psurname" required autocomplete="off"> 
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="pno">Patient Date of Birth</label>
														<input type="text" class="form-control form-control-lg datepicker" id="" value="" placeholder="Date of Birth" name="pdob" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<?php 
														$em = $_SESSION['gprefferer'];
														$q = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$em'");
														$fe = mysqli_fetch_array($q);
														?>
														<label class="col-form-label" for="depart">NHS No</label>
														<input type="number" class="form-control form-control-lg" id="nhs" 
														value="" name="nhsno" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
												   maxlength="10" autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="dob">House No/Name</label>
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="House no" name="houseno" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="mpass">Street Name</label>
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="Street Name" name="streetname" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="cpass">City</label>
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="City" name="city" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">POST Code</label>
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="Postal Code" name="postalcode" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="rno">Country</label>
														<input type="text" class="form-control form-control-lg" id="" value="England" readonly placeholder="Country" name="country" required autocomplete="off">
													</div>
												</div>
												
												
												
												
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">Home Telephone Number</label>
														<input type="number" class="form-control form-control-lg" id="" value="" placeholder="Enter Telephone no" name="telephoneno" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">Mobile Number</label>
														<input type="number" class="form-control form-control-lg" id="" value="" placeholder="Enter Mobile no" name="mobileno" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">Email</label>
														<input type="email" class="form-control form-control-lg" id="" value="" placeholder="Enter Email" name="email" required autocomplete="off"> 
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
														<input class="btn btn-lg btn-primary" type="submit" value="Save" id="addpatient">
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
	$("#patientadd").on('submit', function(e){
		
        	e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("addpatient","btn");
		var nhs = $('#nhs').val();
	
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            processData:false,
            beforeSend: function(){
                $('#addpatient').attr("disabled","disabled");
                $('#patientadd').css("opacity",".5");
            },
            success: function(data){
      
                if(data == 'Error'){
                   toastr.clear(); 
               NioApp.Toast("<h5>patient didn't add Successfully</h5>", 'error',{position:'top-right'});
                }
				else if(data == 'Success'){
					$('#patientadd')[0].reset();
					toastr.clear();
               NioApp.Toast("<h5>Patient Added Successfully</h5>", 'success',{position:'top-right'});
				
					
					
                }
			
                $('#patientadd').css("opacity","");
                $("#addpatient").removeAttr("disabled");
            }
			
        });

    });
	</script>
</html>
<script>
	
</script>
