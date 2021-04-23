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
													
													$em = $_SESSION['a_id'];
													$q = mysqli_query($con,"SELECT * FROM admin WHERE id = '$em'");
													$fe = mysqli_fetch_array($q);
											
													?>
													<div class="form-group">
														<label class="col-form-label" for="fname">Patient Title</label>
														<input type="text" value="<?php echo $fe['name']?>" id="rid" hidden="true" name="rid">									
														<input type="text" value="<?=$fe['ur_hid']?>" id="hid" hidden="true" name="hid">			
<!--														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="Enter Title" name="ptitle" required>-->
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
														<label class="col-form-label" for="email">Patient Lastname</label>
														<input type="text" class="form-control form-control-lg" id="" value="<?php echo $sname?>" placeholder="Enter Last name" name="psurname" autocomplete="off" required>
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
														<input type="date" class="form-control form-control-lg" id="pdob" value="<?php 
														
														if(isset($_GET["dob"])){ $d=date_create($_GET["dob"]); echo date_format($d,"Y-m-d"); }else{ echo "";}
												// 		echo date('Y-m-d',strtotime($_GET["dob"]));
														?>" placeholder="Date of Birth" name="pdob"  onchange="fnCalculateAge()" required>
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
														$em = $_SESSION['a_id'];
														$q = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$em'");
														$fe = mysqli_fetch_array($q);
														?>
														<label class="col-form-label" for="depart">NHS No</label>
														<input type="number" class="form-control form-control-lg"  id="nhsno" 
														value="<?=isset($_GET["nhs"])?$_GET["nhs"] :""?>" name="nhsno" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
												   maxlength="10" minlength="10" onchange="stringlength(this.value)">
												   <small id="valid-nhs"></small>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="dob">House No/Name</label>
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="House no" name="houseno" autocomplete="off" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="mpass">Street Name</label>
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="Street Name" name="streetname" autocomplete="off" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="cpass">City</label>
														<input type="text" class="form-control form-control-lg" id="" value="" placeholder="City" name="city" autocomplete="off" required>
													</div>
												</div>
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">POST Code</label>
														<input type="text" class="form-control form-control-lg" id="post" value="" placeholder="Postal Code" name="postalcode" autocomplete="off" required onchange="stringlength1(this.value)">
														<small id="valid-nhs1"></small>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="rno">Country</label>
														<input type="text" class="form-control form-control-lg" id="" value="United Kingdom" placeholder="Country" name="country" autocomplete="off" readonly>
													</div>
												</div>
												
												
												
												
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">Home Telephone Number</label>
														<input type="number" class="form-control form-control-lg" id="htelno" value="" placeholder="Enter Telephone no" name="telephoneno" autocomplete="off" required onchange="stringlength2(this.value)">
													<small id="valid-nhs2"></small>
													</div>
												</div>
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">Mobile Number</label>
														<input type="number" class="form-control form-control-lg" id="" value="" placeholder="Enter Mobile no" name="mobileno" autocomplete="off" required onchange="stringlength3(this.value)">
													<small id="valid-nhs3"></small>
													</div>
												</div>
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">Email</label>
														<input type="email" class="form-control form-control-lg" id="" value="" onchange="checkemail(this.value)" placeholder="Enter Email" name="email" autocomplete="off" required>
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

function stringlength1(num)
{ 
 
var no = num;
var mnlen = 3;
var mxlen = 8;
if(no.length<mnlen || no.length> mxlen)
{ 
    
$("#valid-nhs1").html("Please enter between 3 to 8 number/alphabets").removeClass("text-success").addClass("text-danger");
$("#valid-nhs1").show();
$('#post').val('');
}
else
{
    $("#valid-nhs1").hide();
}
}

function stringlength2(num)
{ 
 
var no = num;
var mnlen = 5;
var mxlen = 15;
if(no.length<mnlen || no.length> mxlen)
{ 
    
$("#valid-nhs2").html("Please enter between 5 to 15 numbers").removeClass("text-success").addClass("text-danger");
$("#valid-nhs2").show();
$('#htelno').val('');
}
else
{
    $("#valid-nhs2").hide();
}
}

function stringlength3(num)
{ 
 
var no = num;
var mnlen = 5;
var mxlen = 15;
if(no.length<mnlen || no.length> mxlen)
{ 
    
$("#valid-nhs3").html("Please enter between 5 to 15 numbers").removeClass("text-success").addClass("text-danger");
$("#valid-nhs3").show();
$('#htelno').val('');
}
else
{
    $("#valid-nhs3").hide();
}
}

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
        $(document).ready(function(){
            setInterval(fnCalculateAge, 3000);
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
<?php
$id = $_SESSION['a_id'];
								$sql = mysqli_query($con,"SELECT * FROM admin WHERE id = '$id'");
								$fetch = mysqli_fetch_array($sql);
								$orgid = $fetch['organization'];
								

?>
	$("#patientadd").on('submit', function(e){
		
        	e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("addpatient","btn");
		formdata.append("orgid",<?=$orgid?>);
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
               setTimeout(function(){
                   window.location.href="<?php  if(isset($_GET["nhs"])) {echo $_GET["redirect"]."?nhs=".$_GET["nhs"]; }elseif(isset($_GET["fname"])){ echo $_GET["redirect"]."?fname=".$_GET["fname"]."&sname=".$_GET["sname"]."&dob=".$_GET["dob"];}?>";
               }, 2000);

					
					
                }
				else if(data == 'nhs'){
				
					toastr.clear();
               NioApp.Toast("<h5>NHS No Already Exist</h5>", 'error',{position:'top-right'});
                }
                else if(data == 'emailexist'){
				
					toastr.clear();
               NioApp.Toast("<h5>Email Already Exist</h5>", 'error',{position:'top-right'});
                }
			
                $('#patientadd').css("opacity","");
                $("#addpatient").removeAttr("disabled");
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
