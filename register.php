<?php
include_once('database/db.php');

?>

<!DOCTYPE html>
<html lang="zxx">
<?php
	include_once('header.php');
	?>
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
<body>

	<!-- START PRELOADER -->
	<div id="page-preloader">
		<div class="preloader-wrench"></div>
	</div>
	<!-- END PRELOADER --> 
	
	<!-- START HEADER SECTION -->
    <?php
	include_once('headernav.php');
	?>
	<!-- END HEADER SECTION -->
	
	<!-- START PAGE BANNER AND BREADCRUMBS -->
	<section class="single-page-title-area" data-background="assets/img/bg/heading.png">
		<div class="auto-container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-12">
					<div class="single-page-title">
						<h2>Register</h2>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="#"><span class="lnr lnr-home"></span></a></li>
					  <li class="breadcrumb-item">Pages</li>
					  <li class="breadcrumb-item active">Register</li>
					</ol>
				</div>
			</div>
			<!-- end row-->
		</div>
	</section>
	<!-- END PAGE BANNER AND BREADCRUMBS -->
	
	
	<!-- START APPOINTMENT SECTION -->
     <section id="appointment" class="section-padding">
        <div class="auto-container">
            <div class="row">
				<div class="col-lg-8 text-center mx-auto">
                    <div class="section-title">
                        <h3>Get Register <span>Your Self</span></h3>
                        <span class="line"></span>
                    </div>
				</div>
				<!-- end section title -->
			</div>
			
            <div class="row mt-5">
				<div class="col-lg-8 mx-auto">
                    <div class="appointment-form-ma">
                        <form id="reg_form">
                            <div class="row" id="form1">
							    <div class="form-group col-lg-6 mt-2">
								 <input type="text" class="form-control" id="conname" placeholder="First Name" name="form_fname" autocomplete="off">
							  </div>
							  <div class="form-group col-lg-6 mt-2">
								 <input type="text" class="form-control" id="consname" placeholder="Sur Name" name="form_sname" autocomplete="off">
							  </div>
							  <div class="form-group col-lg-6 mt-2">
								 <input type="email" class="form-control" id="conemail" placeholder="Email" name="form_email" autocomplete="off">
							  </div>
							  <div class="form-group col-lg-6 mt-2">
								 <input type="password" class="form-control" id="conpass" placeholder="Password" name="form_pass" autocomplete="off">
								 <span toggle="#conpass" class="far fa-eye-slash  toggle-password field-icon"></span>

							  </div>
							  <div class="form-group col-lg-6">
							    <label>Role</label>
								<select class="form-control select" id="conrole" name="role" autocomplete="off">
								  <option>Select</option>
								 <?php 
									$q5 = mysqli_query($con,"SELECT * FROM `tbl_role` ");
									while($ef = mysqli_fetch_array($q5))
									{
									?>
									<option value="<?=$ef['ro_id']?>"><?=$ef['ro_role']?></option>
									<?php
									}
									?>
								</select>
							  </div>
							</div>
							<div class="row" id="form2" style="display: none;">
							<div class="form-group col-lg-6 mt-2">
							    <select id="title" class="form-control select" name="title"  aria-placeholder="Title" autocomplete="off" >
										<option>--Select Title--</option>
									
										<option value="Mr">Mr</option>
												<option value="Mrs">Mrs</option>
												<option value="Ms">Ms</option>
												<option value="Dr">Dr</option>
												<option value="Prof">Prof</option>
									</select>
							  </div>
								<div class="form-group col-lg-6 mt-2">
									<select id="orgtype" class="form-control select" name="orgtype" onchange="alsk(this.value)" aria-placeholder="Organisation Type" >
										<option>--Select Organisation Type--</option>
										<?php 
										$q1s=mysqli_query($con,"SELECT * FROM `orginzation`");
										while($ds=mysqli_fetch_array($q1s)){
										?>
										<option value="<?=$ds["orid"]?>"><?=$ds["or_type"]?></option>
										<?php }?>
									</select>
							  </div>
								<div class="form-group col-lg-6 mt-2">
								 <input type="text" class="form-control" id="orgname" readonly placeholder="Organisation Name" name="orgname" autocomplete="off">
							  </div>
								<div class="form-group col-lg-6 mt-2">
								 <input type="text" class="form-control" id="orgphno" readonly placeholder="Organisation Phone No" name="orgphno" autocomplete="off">
							  </div>
								<div class="form-group col-lg-6 mt-2">
								 <input type="text" class="form-control" id="orgaddress" readonly placeholder="Organisation Address" name="orgaddress" autocomplete="off">
							  </div>
							
							  <div class="form-group col-lg-6 mt-2">
								 <input type="text" class="form-control" id="proregno" placeholder="Professional Registration No" name="proregno" autocomplete="off">
							  </div>
							  <div class="form-group col-lg-6 mt-2">
								 <input type="text" class="form-control" id="orgcode" readonly placeholder="Organisation Code" name="orgcode" autocomplete="off">
							  </div>
							  <div class="form-group col-lg-6 mt-2">
								 <input type="text" class="form-control" id="1staddress" readonly placeholder="1st Line Address" name="address" autocomplete="off">
							  </div>
							  <div class="form-group col-lg-6 mt-2">
								 <input type="text" class="form-control" id="city" readonly placeholder="City" name="city" autocomplete="off">
								</div>
							 <div class="form-group col-lg-6 mt-2">
								 <input type="text" class="form-control" id="postcode" readonly placeholder="Post Code" name="postcode" autocomplete="off">
							  </div>
							</div>
						<div class="row">
							  <div class="form-group col-lg-6">
								 <button type="button" class="btn btn-apfm" id="next">Next <i class="icofont icofont-thin-right"></i></button>
								  
							  </div>
							  
							  </div>
							<div class="row">
								<div class="form-check col-lg-4" style="display: none;" id="privicy">
			  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="flexCheckDefault" required style="position: relative;left: 20px;">
			  <label href="#" class="form-check-label" for="flexCheckDefault">
				Accept our <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalScrollable" onClick="clodelogmodal()">Privacy Policy</a>
			  </label>
			</div>
								<div class="form-group col-lg-4">
								<button type="button" class="btn btn-apfm" id="previous" style="display: none;"><i class="icofont icofont-thin-left"></i>Previous </button>
								  
							  </div>
								<div class="form-group col-lg-4">
								<button type="submit" class="btn btn-apfm" id="submit" style="display: none;">Submit <i class="icofont icofont-thin-right"></i></button>
								  
							  </div>
							  
								</div>
								 <!-- <div class="row">
								 <div class="form-group col-lg-6" >
								 <a href="reg_organization.php" type="button" class="btn btn-apfm" id="organization" style="color: white;padding: 15px;">register as a organization <i class="icofont icofont-thin-right"></i></a>
								  
							  </div>
								 </div> -->
                      
                        </form>
                    </div>
                </div>
                <!-- end col -->
			</div>
        </div>
        <!--- END CONTAINER -->
    </section>
    <!-- END APPOINTMENT SECTION -->
	  <?php
			$query = mysqli_query($con,"SELECT * FROM privacy_policy");
			$fetch = mysqli_fetch_array($query);
			?>
 <!-- Modal -->
              <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" id="exampleModalScrollableTitle">Privacy Policy</h3>
                      <button type="button" class="close" onClick="showmodal()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body pre-scrollable">
                      <h4><?=$fetch['ptitle']?></h4>
                      <p><?=$fetch['pdescription']?></p>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger btn-round btn-sm" data-dismiss="modal" onClick="showmodal()">Close</button>
                      <button type="button" class="btn btn-primary btn-round btn-sm" onClick="showmodal()">I have Read</button>
                    </div>
                  </div>
                </div>
              </div>
	
	
    <!-- START FOOTER -->
    <?php
	include_once('footer.php');
	?>
    <!-- END FOOTER -->
	
	
	
	
</body>
<script>
	toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};
	function clodelogmodal(){
	$("#regmodal").hide();
}
	function showmodal(){
	$("#regmodal").show();
	$("#exampleModalScrollable").modal('hide');
}	
$('#next').on('click',function(){
	$('#form1').hide(600);
	$('#form2').show(600);
	$('#next').hide();
	$('#previous').show();
	$('#submit').show();
	$("#privicy").show();
	
	
});
	$('#previous').on('click',function(){
	$('#form1').show(600);
	$('#form2').hide(600);
	$('#next').show();
	$('#previous').hide();
	$('#submit').hide();
	$("#privicy").hide();
	
	
});
//for new register
$("#reg_form").on("submit", function(e)
	{
		e.preventDefault();
		
		var fname = $('#conname').val();
		var sname = $('#consname').val();
		var email = $('#conemail').val();
		var pass = $('#conpass').val();
		var orgtype = $('#orgtype').val();
		var title = $('#title').val();
		var orgname = $('#orgname').val();
		var orgphno = $('#orgphno').val();
		var orgaddress = $('#orgaddress').val();
		var proregno = $('#proregno').val();
		var orgcode = $('#orgcode').val();
		var address = $('#1staddress').val();
		var city = $('#city').val();
		var postcode = $('#postcode').val();
		var role = $('#conrole').val();
		
		if(fname != '' && sname != '' && email != '' && pass != '' && role != '' && proregno !=''){
			
			

					if($('#flexCheckDefault').prop('checked') == true){

						var reform = new FormData(this);
					reform.append("registeruser","btn");

				$.ajax({
					url: 'php/phpcode.php',
					type: 'post',
					data: reform,
					processData: false,
					contentType: false,
					success: function(data)
					{
					
						if(data == "alemail"){
							toastr.error("Email Already Exist!");
							document.getElementById("conemail").style.borderColor = "red";
						}else if(data == "success")
						{

							toastr.success("You have been registered succesfully. Wait for admin approvel!");
							$("#regis").attr("disabled","disabled");
							$("#reg_form")[0].reset();
							$("#register_popup")[0].reset();
							document.getElementById("u_name").style.borderColor = "#28a745";
							document.getElementById("conemail").style.borderColor = "#28a745";
							document.getElementById("u_phn").style.borderColor = "#28a745";
							document.getElementById("u_org").style.borderColor = "#28a745";
							document.getElementById("u_work").style.borderColor = "#28a745";
							document.getElementById("u_pass").style.borderColor = "#28a745";
							document.getElementById("u_cpass").style.borderColor = "#28a745";
							document.getElementById("u_faci").style.borderColor = "#28a745";
							document.getElementById("nhs_num").style.borderColor = "#28a745";
							document.getElementById("role").style.borderColor = "#28a745";


						}else if(data == "nhserror"){
								 toastr.error("Wrong NHS Number");
						}
						else if(data == "Error"){
							toastr.error("Did not Register Successfully");
						}
					}

				
				});	

					}else {
						toastr.error("Make Sure! You Have Read Privacy Policy!");
					}

			
		}else {
			toastr.error("Please fill all fields!");
		}
		
	});
function alsk(id){
	$.ajax({
		url:"php/phpcode.php",
		type:"POST",
		data:{id:id,fetchorgdata:"btn"},
		dataType:"JSON",
		success:function(res){
		    console.log(res);
		$("#orgname").val(res.or_name);
		$("#orgphno").val(res.or_phone);
		$("#orgaddress").val(res.or_address);
		$("#orgcode").val(res.or_code);
		$("#1staddress").val(res.or_firstaddress);
		$("#postcode").val(res.or_postcode);
		$("#city").val(res.or_city);
		}
	})
}
//  password hide show
$(".toggle-password").click(function() {

$(this).toggleClass("fas fa-eye"); 
var input = $($(this).attr("toggle"));
if (input.attr("type") == "text") {
  input.attr("type", "password");
} else {
  input.attr("type", "text");
}
});
	</script>


</html>