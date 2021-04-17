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
														<input type="text" value="<?php echo $few['ur_fname']?>" id="rid" hidden="true" name="rid">
														<input type="text" value="<?php echo $fe['ur_hid']?>" id="hid" hidden="true" name="hid">			
<!--														<input type="text" class="form-control form-control-lg"  placeholder="Enter Title" name="ptitle" required>-->
														<select name="ptitle" id="" class="form-control form-control-lg">
															<option>- Select -</option>
														<option value="Mr">Mr</option>
												<option value="Mrs">Mrs</option>
												<option value="Ms">Ms</option>
														</select>
													</div>
												</div>
											<?php
												if(isset($_GET['fname']))
												{
												    $fname = $_GET['fname'];
												    $sname = $_GET['sname'];
												    ?>
												    <div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="sname">Patient Firstname</label>
														<input type="text" class="form-control form-control-lg" id="" value="<?php echo $fname?>" placeholder="Enter First name" name="pfirstname" autocomplete="off" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="email">Patient Surname</label>
														<input type="text" class="form-control form-control-lg" id="" value="<?php echo $sname?>" placeholder="Enter Surname" name="psurname" autocomplete="off" required>
													</div>
												</div>
												   <?php 
												}
												else{
												?>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="sname">Patient Firstname</label>
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="Enter First name" name="pfirstname" autocomplete="off" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="email">Patient Surname</label>
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="Enter Surname" name="psurname" autocomplete="off" required>
													</div>
												</div>
												<?php
												}
												?>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="pno">Patient Date of Birth</label>
														<input type="date" class="form-control form-control-lg" value="<?php if(isset($_GET["dob"])){
														$da=date_create($_GET["dob"]);
														echo date_format($da,"Y-m-d");
														}else{
														echo "";
														}?>" placeholder="Date of Birth" name="pdob" id="pdob" required autocomplete="off" onchange="fnCalculateAge()">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="age">Age</label>
														<input type="text" class="form-control form-control-lg"  placeholder="Age" name="age" required autocomplete="off" id="age" readonly>
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
														value="<?=isset($_GET["nhs"])? $_GET["nhs"]:""?>" name="nhsno" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
												   maxlength="10" autocomplete="off" onchange="checknhs(this.value)">
												       <small id="valid-nhs"></small>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="dob">House No/Name</label>
														<input type="text" class="form-control form-control-lg"  placeholder="House no" name="houseno" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="mpass">Street Name</label>
														<input type="text" class="form-control form-control-lg"  placeholder="Street Name" name="streetname" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="cpass">City</label>
														<input type="text" class="form-control form-control-lg"  placeholder="City" name="city" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">POST Code</label>
														<input type="text" class="form-control form-control-lg"  placeholder="Postal Code" name="postalcode" required autocomplete="off">
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
														<input type="number" class="form-control form-control-lg"  placeholder="Enter Telephone no" name="telephoneno" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">Mobile Number</label>
														<input type="number" class="form-control form-control-lg"  placeholder="Enter Mobile no" name="mobileno" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">Email</label>
														<input type="email" class="form-control form-control-lg"  onchange="checkemail(this.value)" placeholder="Enter Email" name="email" required autocomplete="off"> 
												        <small id="valid-email"></small>
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
$(document).ready(function(){
    
    setTimeout(fnCalculateAge,3000); 
})
 function fnCalculateAge(){

     var userDateinput = document.getElementById("pdob").value;  
	 console.log(userDateinput);
	 
     // convert user input value into date object
	 var birthDate = new Date(userDateinput);
	  console.log(" birthDate"+ birthDate);
	 
	 // get difference from current date;
	 var difference=Date.now() - birthDate.getTime(); 
	 	 
	 var  ageDate = new Date(difference); 
	 var calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);
	 $('#age').val(calculatedAge);
}

	$(function () {

    // INITIALIZE DATEPICKER PLUGIN
    $('.datepicker').datepicker({
        clearBtn: true,
        format: "dd-mm-yyyy"
    });


    // FOR DEMO PURPOSE
    // $('#reservationDate').on('change', function () {
    //     var pickedDate = $('input').val();
    //     $('#pickedDate').html(pickedDate);
    // });
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
	function checkemail(email){
	


		$.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: {email:email,checkemail:"btn"  },
            success: function(data){
                 console.log(data);
     if(data == 'exists'){
				$("#valid-email").html("Email is already exists").removeClass("text-success").addClass("text-danger");
						 toastr.clear();
    NioApp.Toast("<h5>Email is already exists</h5>", 'warning',{position:'top-right'});
				// fetchadmindata();
					}
			if(data == 'not exists'){
			    
			    	$("#valid-email").html("Email is available for use").removeClass("text-danger").addClass("text-success");
			
			    
             toastr.clear();
    NioApp.Toast("<h5>Email is available for use</h5>", 'success',{position:'top-right'});
				// fetchadmindata();
					
					}
                }
			
          
            });
        };
        	function checknhs(nhs){
	


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
        };

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

<?php
													
													$em = $_SESSION['gprefferer'];
													$qww = mysqli_query($con,"SELECT * FROM tbl_ruser WHERE ur_email = '$em'");
													$few = mysqli_fetch_array($qww);
											
													?>
	$("#patientadd").on('submit', function(e){
		
        	e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("addpatient","btn");
		formdata.append("orgid",<?=$few['ur_orgtype']?>);
		
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
            //   alert(data);
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
                setTimeout(function(){
                    
                    window.location.href="<?php  if(isset($_GET["nhs"])) {echo $_GET["redirect"]."?nhs=".$_GET["nhs"]; }elseif(isset($_GET["fname"])){ echo $_GET["redirect"]."?fname=".$_GET["fname"]."&sname=".$_GET["sname"]."&dob=".$_GET["dob"];}?>";
                },3000);
            }
			
        });

    });
	</script>
</html>
<script>
	
</script>
