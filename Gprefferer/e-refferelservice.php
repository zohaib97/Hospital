<?php
include_once('../database/db.php');

?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php
	include_once('header.php');
	?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<body class="nk-body bg-lighter npc-default has-sidebar ">
	<style>
	@media screen and (min-width: 220px) and (max-width: 768px) {
  .res {
	width: 50%;
  }
}
.datepicker
{
	min-width: 0px !important;
}
	.select2-selection{
	padding-bottom: 40px;
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
					<div class="nk-block-head-content">
						<div class="nk-block-head-sub"><a class="back-to" href="index.php"><em class="icon ni ni-arrow-left"></em><span>Dashboard</span></a></div>
						<h2 class="nk-block-title fw-normal">E-Refferel Service</h2>

					</div>
				</div>

				<div class="nk-block nk-block-lg" >

					<div class="card card-preview">
						<div class="card-inner">
							<ul class="nav nav-tabs mt-n3">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#tabItem5"><em class="icon ni ni-user"></em><span>Patient</span></a>
								</li>
<!--
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#tabItem6"><em class="icon ni ni-lock-alt"></em><span>Security</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#tabItem7"><em class="icon ni ni-bell"></em><span>Notifications</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#tabItem8"><em class="icon ni ni-link"></em><span>Connect</span></a>
								</li>
-->
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tabItem5">
								    <input type="hidden" id="servicegender">
								    <input type="hidden" id="patientgender">
								  <span>Search By :</span>
									<form>
									<div class="row">
										<div class="col-md-4">
											<input type="radio" name="searchby" id="nhs" onClick="nhsshow()">
									<label for="nhs">NHS Number</label>
										</div>
									<!--	<div class="col-md-3">-->
									<!--		<input type="radio" name="searchby" id="ubrn" onClick="nhsshow()">-->
									<!--<label for="ubrn">UBRN</label>-->
									<!--	</div>-->
										<div class="col-md-4">
										<input type="radio" name="searchby" id="demographics" onClick="nhsshow()">
									<label for="demographics">Demographics</label>
										</div>
										</div>
										<div class="row" id="demo" style="display: none;">
										<div class="col-md-2">
											<span>Demographics :</span>
											</div>
											
											<div class="col-md-2 pb-3">
											<input style="border-color: #000000" class="form-control" type="text" placeholder="Name"  length id="nm"
											 required autocomplete="off">
									            </div>
											<div class="col-md-2 pb-3">
											<input style="border-color: #000000" class="form-control" type="text" placeholder="Surname" id="em"
											  required autocomplete="off">
											</div>
									         <div class="col-md-2 pb-3">
											<input style="border-color: #000000;" class="form-control datepicker" type="text"  placeholder="Date Of Birth"  id="dob"
												   required  autocomplete="off">
											</div>
											<div class="col-md-2 res" id="btn3">

                                              </div>
											<div class="col-md-2 res" id="btn4">

											</div>
										
										</div>

										<div class="row" id="ubr" style="display: none;">
										<!-- <div class="col-md-2">
											<span>UBRN :</span>
											</div>
											
											<div class="col-md-2">
											<input style="border-color: #000000" class="form-control" type="number" max="3" length id="nhs1"
											oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
												   maxlength="4" required>
									</div>
											<div class="col-md-2">
											<input style="border-color: #000000" class="form-control" type="number" id="nhs2"
											 oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
												   maxlength="3" required
												   >
											</div>
									<div class="col-md-2">
											<input style="border-color: #000000" class="form-control" type="number" max="3" id="nhs3"
												   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
												   maxlength="3" required onChange="showsearch()">
											</div>
											
											<div class="col-md-2" id="btn2">

											</div>
											<div class="col-md-2" id="btn">

											</div> -->
										</div>




										<div class="row" id="nhsno" style="display: none;">
										<div class="col-md-2">
											<span>NHS Number :</span>
											</div>
											
											<div class="col-md-2">
											<input style="border-color: #000000" class="form-control" type="number" max="3" length id="nhs1"
											oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
												   maxlength="4" required onkeyup="moveOnMax(this,'nhs2')">
									</div>
											<div class="col-md-2">
											<input style="border-color: #000000" class="form-control" type="number" id="nhs2"
											 oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
												   maxlength="3" required onkeyup="moveOnMax(this,'nhs3')">
											</div>
									<div class="col-md-2">
											<input style="border-color: #000000" class="form-control" type="number" max="3" id="nhs3"
												   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
												   maxlength="3" required onchange="showsearch()">
											</div>
											
											<div class="col-md-2" id="btn2">

											</div>
											<div class="col-md-2" id="btn">

											</div>
										</div>
									</form>
									


								</div>
							
								<div class="mb-4" id="tabItem6">
							
							
								</div>
								
								<div class="mt-5" id="tabItem7">
									
								</div>
								<div class="mt-5" id="tabItem8">
									<form method="post" id="attach" style="display: none;">
								 <div class="row">
								 <div class="col-md-4">
									 <input type="text" name="rid" id="refferelid" hidden="true" value="">
									 <label for="consultant">Organisation</label>
									  <select class="form-control" name="organisation" id="organisation" onchange="fetchconsultant()">
									  <option>Select</option>
										  <?php
									 $q = mysqli_query($con,"SELECT * FROM `orginzation`");
									 if(mysqli_num_rows($q)>0)
									 {
										 while($fe = mysqli_fetch_array($q))
										 {
									 ?>
								 <option value="<?=$fe['orid']?>"><?=$fe['or_name']?></option>
										  <?php
										 }
									 }
										  ?>
								 </select>
									 </div>
								 <div class="col-md-4">
									 <!--<input type="text" name="rid" id="refferelid" hidden="true" value="">-->
									 <label for="consultant">Consultant</label>
									  <select class="form-control" name="consultant" id="consultant" disabled onchange="showproceed()">
									  <option>Select</option>
										  
								 </select>
									 </div>
									 
									 
									 <div class="col-md-4" style="display:none;" id="proceed">
									
									 <input type="submit" class="btn btn-primary mt-5" name="rsubmit" value="Continue With Selected Service" id="rsubmit">
									 </div>
								 </div>
								
										</form>
								</div>
							</div>
						</div>
					</div>
			
					<!-- .code-block -->
				</div>

			</div>
		</div>
	</div>
</div>
</div>
				
				<!-- For Refer -->
   <div class="modal fade" tabindex="-1" id="modalname">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Search By</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form class="form-validate is-alter" id="refadfrom" method="post">
						<div class="row">
							<div class="form-group col-md-6 mb-4">
								<span><sup class="text-danger">*</sup></span><label class="form-label" for="full-name">Request Type</label>
								<div class="form-control-wrap">
									<select class="form-control" name="ref_reqt" id="ref_reqt" onchange="getrefspec(this.value)" required>
										<option value="">- Select -</option>
										
										<option value="Appointment Request">Appointment Request</option>
										<option value="Advice request">Advice request</option>
										<option value="Triage Request">Triage Request</option>
									</select>
								</div>
							</div>
							<div class="form-group col-md-6 mb-4">
								<span><sup class="text-danger">*</sup></span><label class="form-label" for="full-name">Priority</label>
								<div class="form-control-wrap">
									<select class="form-control" name="ref_priority" id="ref_priority" required>
										<option value="">- Select -</option>
										<option value="Routine">Routine</option>
										<option value="Urgent">Urgent</option>
										<option value="2 Week Wait">2 Week Wait</option>
									</select>
								</div>
							</div>
						</div>
						<!--<div class="row">-->
						<!--	<div class="form-group col-md-12 mb-4">-->
						<!--		<span><sup class="text-danger">*</sup></span><label class="form-label" for="full-name">Clinical Terms</label>-->
						<!--		<div class="form-control-wrap">-->
						<!--			<input type="text" class="form-control" id="ref_clterm" name="ref_clterm" required autocomplete="off">-->
						<!--		</div>-->
						<!--	</div>-->
						<!--</div>-->
						<div class="row">
							<div class="form-group col-md-6 mb-4">
								<span><sup class="text-danger">*</sup></span><label class="form-label" for="full-name">Specialty</label>
								<div class="form-control-wrap">
									<select class="form-control" name="ref_spec" id="ref_spec" onchange="getclint(this.value)" required>
										<option value="">- Select -</option>
										<?php
								$query = mysqli_query($con,"SELECT * FROM `ser_specialty_add`");
								$num = mysqli_num_rows($query);
								if($num>0)
								{
									while($fe = mysqli_fetch_array($query))
									{
								?>
										<option value="<?=$fe['spec_id']?>"><?=$fe['spec_name']?></option>
											<?php
											}
								}
										?>
									</select>
								</div>
							</div>
							<div class="form-group col-md-6 mb-4">
								<span><sup class="text-danger">*</sup></span><label class="form-label" for="full-name">Clinic Type</label>
								<div class="form-control-wrap">
									<select class="form-control" name="ref_cltype" id="ref_cltype" required>
										<option value="">- Select -</option>
										<?php  $query = mysqli_query($con,"SELECT * FROM `service_cliniciant`");
								$num = mysqli_num_rows($query);
								if($num>0)
								{
									while($fe = mysqli_fetch_array($query))
									{
								?>
										<option value="<?=$fe['cl_id']?>"><?=$fe['cl_type']?></option>
										<?php
											}
								}?>
									</select>
								</div>
							</div>
						</div>
						
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary" id="refbtn">Search</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                </div>
            </div>
        </div>
    </div>
				
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2020 <a href="https://Deevloopers.com" target="_blank">Deevloopers</a>
                            </div>
                            <div class="nk-footer-links">
                                <ul class="nav nav-sm">
                                    <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=2.2.0"></script>
    <script src="./assets/js/scripts.js?ver=2.2.0"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="assets/js/example-toastr.js?ver=2.2.0"></script>
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Patient Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Title</h6>
                            <p id="title"></p>
                        </div>

                        <div class="col-md-6">
                            <h6>Name</h6>
                            <p id="name"></p>
                        </div>

                        <div class="col-md-6">
                            <h6>Email</h6>
                            <p id="email"></p>
                        </div>

                        <div class="col-md-6">
                            <h6>NHs No</h6>
                            <p id="nhsnoo"></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Date Of Birth</h6>
                            <p id="dobbb"></p>
                        </div>
                        <div class="col-md-6">
                            <h6>House No</h6>
                            <p id="hnoas"></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Street Name</h6>
                            <p id="street"></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Country</h6>
                            <p id="country"></p>
                        </div>
                        <div class="col-md-6">
                            <h6>City</h6>
                            <p id="city"></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Postal Code</h6>
                            <p id="postss"></p>
                        </div>
                        <div class="col-md-6">
                            <h6>TelePhone Number</h6>
                            <p id="tele"></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Mobile Number</h6>
                            <p id="mob"></p>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
   function fetchpatientdetails(title, name, email, nhsno, dob, hno, street, country, city, post, tele, mob) {
        $("#title").html(title);
        $("#name").html(name);
        $("#email").html(email);
        $("#nhsnoo").html(nhsno);
        $("#dobbb").html(dob);
        $("#hnoas").html(hno);
        $("#street").html(street);
        $("#country").html(country);
        $("#city").html(city);
        $("#postss").html(post);
        $("#tele").html(tele);
        $("#mob").html(mob);
        $("#exampleModalCenter").modal("show");
    }
function showproceed()
{
    $('#proceed').show();
}
function moveOnMax(field,nextFieldID){
  if(field.value.length >= field.maxLength){
    document.getElementById(nextFieldID).focus();
  }
}

$('#organisation').change(function(){
	
	$('#consultant').attr("disabled",false);
})

function getrefspec(vals){
    $.ajax({
        url:"phpcode.php",
        type:"POST",
        data:{val:vals,fetchspelly:"btn"},
        success:function(res){
            
            $("#ref_spec").html(res);
             $('#ref_spec').select2();
        }
    })
}
function getclint(vals){
    $.ajax({
        url:"phpcode.php",
        type:"POST",
        data:{val:vals,fetchclims:"btn"},
        success:function(res){
            
            $("#ref_cltype").html(res);
             $('#ref_cltype').select2();
        }
    })
}
	$(document).ready(function() {
    $('#ref_namecl').select2();
    $('#ref_spec').select2();
    $('#ref_cltype').select2();
    $('#ref_priority').select2();
    $('#consultant').select2();
    $('#organisation').select2();


	
});
	function showss(id,gender){
	
		if($(id).prop("checked")==true)
			{
		if($(".gg").prop("checked")==true){
 
				$('#attach').show();
				$("#servicegender").val(gender);
					}
				else{
				$('#attach').hide();
		}
			}
		else{
			$('#attach').hide();
		}
	}
	function showsearch() {	
		var nhs1 = $('#nhs1').val();
		var nhs2 = $('#nhs2').val();
		if(nhs1 == '' || nhs2 == '')
			{
				toastr.clear();
               NioApp.Toast("<h5>All fields Required</h5>", 'error',{position:'top-right'});
				 $('#nhs3').val('');
			}
		else{
			$('#nhs1').prop('readonly', true);
			$('#nhs2').prop('readonly', true);
			$('#nhs3').prop('readonly', true);
		var nhs3 = $('#nhs3').val();
		var total = nhs1+nhs2+nhs3;
	
		var btn = document.getElementById('btn').innerHTML='<a href="javascript:void(0)" class="btn btn-info float-left" id="searchpatient" onClick="showpatient(\'' + total + '\')">Search</a>';
			document.getElementById('btn2').innerHTML='<a href="javascript:void(0)" class="btn btn-primary" id="searchpatient" onClick="reset()">Reset</a>';
		}
        
    };
	function showmyref() {		
        $('#modalname').modal('show');
    };
	function reset() {		
       $('#nhs1').val('');
	$('#nhs2').val('');
	$('#nhs3').val('');
		$('#nhs1').prop('readonly', false);
			$('#nhs2').prop('readonly', false);
			$('#nhs3').prop('readonly', false);
    };
	function showpatient(nhs) {		
      $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{nhs:nhs,patientfetch:"btn"},	            
        success: function(response){ 
			if(response == 'No Data Found')
				{
					 toastr.clear();
               NioApp.Toast("<h5>No Data found</h5>", 'error',{position:'top-right'});
				}
	document.getElementById('tabItem6').innerHTML=response;
			
//            $("#tabItem6").html(response); 
            //alert(response);
        }
		  

    });
    };
	
	// insert refer
	$("#refadfrom").on('submit', function(e){
		e.preventDefault();
		
		
	
			
			var refform = new FormData(this);
			refform.append("searchservice","btn");
			
			$.ajax({
				url: 'phpcode.php',
				type: 'post',
				data: refform,
				contentType: false,
				processData: false,
				success: function(data){
					if(data == "Data Not Found")
						{
							toastr.clear();
               NioApp.Toast("<h5>No Data found</h5>", 'error',{position:'top-right'});
               
                	document.getElementById('tabItem7').innerHTML=data;
						$("#modalname").modal("hide");
						}else{
						    
                	document.getElementById('tabItem7').innerHTML=data;
						$("#modalname").modal("hide");
		if($(".dd").prop("checked")==true)
			{
					if($(".gg").prop("checked")==true){
 
				$('#attach').toggle();
					}
				else{
				$('#attach').hide();
		}
			}
		else{
			$('#attach').hide();
		}
						}
					
				
//			
					}
				});
				
			});
			function kk(gender){
			    $("#patientgender").val(gender);
			}
		
		$("#attach").on('submit', function(e){
		e.preventDefault();
		if(  $("#patientgender").val()== "Mr" && $("#servicegender").val() == "Female"){
		    NioApp.Toast("<h5>This Service Only Available For Female</h5>", 'warning',{position:'top-right'});
		}
		if(($("#patientgender").val()== "Ms" && $("#servicegender").val()== "Male") || ($("#patientgender").val()== "Mrs" && $("#servicegender").val()== "Male")){
		     NioApp.Toast("<h5>This Service Only Available For Male</h5>", 'warning',{position:'top-right'});
		    
		}
		var ptage =$('#ptage').val();
	var servage2 = $('#servage2').val();
	var servage =$('#servage').val();
	
		if(ptage > servage2 || ptage < servage)
					{
						NioApp.Toast("<h5>Your Age doesn't match to service age range</h5>", 'warning',{position:'top-right'});
					}
		else{
		    	if(  $("#patientgender").val()== "Mr" && $("#servicegender").val() == "Male"){
					
		var reqtype = $('#ref_reqt').val();
		var coid = $('#consultant').val();
		var pid = $("input:radio[name='check']:checked").val();
			var refform = new FormData(this);
			refform.append("check",$("input:radio[name='check']:checked").val());
			refform.append("checkw",$("input:radio[name='checkw']:checked").val());
			refform.append("addservicerefferel","btn");
			refform.append("reqtype",reqtype);
			
			$.ajax({
				url: 'phpcode.php',
				type: 'post',
				data: refform,
				contentType: false,
				processData: false,
				dataType:"JSON",
				success: function(data){
					console.log(data);
//	document.getElementById('tabItem7').innerHTML=data;
//						

				if(data["res"] == "success")
					{
						toastr.clear();
               NioApp.Toast("<h5>Data Added Successfully</h5>", 'success',{position:'top-right'});
						window.location.href = "adcmnt.php?c_id="+data["c_id"]+"&coid="+coid+"&pid="+pid+"";
					}
					else if(data["res"] == "Error")
						{
							toastr.clear();
               NioApp.Toast("<h5>Data Didn't Add Successfully</h5>", 'error',{position:'top-right'});
						}
						else if(data["res"] == "Already")
						{
							toastr.clear();
               NioApp.Toast("<h5>Refferel Already Created</h5>", 'warning',{position:'top-right'});
						}
//			
					}
				});
			
		    	}
		    	if(($("#patientgender").val()== "Ms" && $("#servicegender").val()== "Female") || ($("#patientgender").val()== "Mrs" && $("#servicegender").val()== "Female")){
		    		var reqtype = $('#ref_reqt').val();
		var coid = $('#consultant').val();
		var pid = $("input:radio[name='check']:checked").val();
			var refform = new FormData(this);
			refform.append("check",$("input:radio[name='check']:checked").val());
			refform.append("checkw",$("input:radio[name='checkw']:checked").val());
			refform.append("addservicerefferel","btn");
			refform.append("reqtype",reqtype);
			
			$.ajax({
				url: 'phpcode.php',
				type: 'post',
				data: refform,
				contentType: false,
				processData: false,
				dataType:"JSON",
				success: function(data){
					console.log(data);
//	document.getElementById('tabItem7').innerHTML=data;
//						

				if(data["res"] == "success")
					{
						toastr.clear();
               NioApp.Toast("<h5>Data Added Successfully</h5>", 'success',{position:'top-right'});
						window.location.href = "adcmnt.php?c_id="+data["c_id"]+"&coid="+coid+"&pid="+pid+"";
					}
					else if(data["res"] == "Error")
						{
							toastr.clear();
               NioApp.Toast("<h5>Data Didn't Add Successfully</h5>", 'error',{position:'top-right'});
						}
						else if(data["res"] == "Already")
						{
							toastr.clear();
               NioApp.Toast("<h5>Refferel Already Created</h5>", 'warning',{position:'top-right'});
						}
//			
					}
				});
		    	    
		    	}
		}
			});

	
	
//	// insert refer
//	$("#refadfrom").on('submit', function(e){
//		e.preventDefault();
//		
//		var ref_reqtv = $('#ref_reqt').val();
//		var ref_priorityv = $('#ref_priority').val();
//		var ref_cltermv = $('#ref_clterm').val();
//		var ref_specv = $('#ref_spec').val();
//		var ref_cltypev = $('#ref_cltype').val();
//		var ref_nameclv = $('#ref_namecl').val();
//		
//		if(ref_reqtv != '' && ref_priorityv != '' && ref_cltermv != '' && ref_specv != '' && ref_cltypev != '' && ref_nameclv != ''){
//			
//			var refform = new FormData(this);
//			refform.append("refinsertbtn","btn");
//			
//			$.ajax({
//				url: 'phpcode.php',
//				type: 'post',
//				data: refform,
//				contentType: false,
//				processData: false,
//				success: function(data){
//					if(data == "refererror"){
//						toastr.clear();
//    		NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
//					}else{
//						$('#refadfrom')[0].reset();
////					$('#servicedef').trigger('reset');
//					toastr.clear();
//    				NioApp.Toast("<h5>Service Definer Added</h5>", 'success',{position:'top-right'});
//						
//						document.getElementById('ref_reqt').style.borderColor = "#28a745";
//						document.getElementById('ref_priority').style.borderColor = "#28a745";
//						document.getElementById('ref_clterm').style.borderColor = "#28a745";
//						document.getElementById('ref_spec').style.borderColor = "#28a745";
//						document.getElementById('ref_cltype').style.borderColor = "#28a745";
//						document.getElementById('ref_namecl').style.borderColor = "#28a745";
////						$('#modalname').modal('hide');
//						window.location.href = "sercriteria.php";
//					}
//				}
//				
//			});
//			
//		}else {
//			toastr.clear();
//    		NioApp.Toast("<h5>All Fields Required</h5>", 'error',{position:'top-right'});
//			document.getElementById('ref_reqt').style.borderColor = "red";
//			document.getElementById('ref_priority').style.borderColor = "red";
//			document.getElementById('ref_clterm').style.borderColor = "red";
//			document.getElementById('ref_spec').style.borderColor = "red";
//			document.getElementById('ref_cltype').style.borderColor = "red";
//			document.getElementById('ref_namecl').style.borderColor = "red";
//		}
//		
//	});
	

	
	function nhsshow(){
		if ($('#nhs').prop("checked") == true) {
            $('#nhsno').show();
      }
		else
			{
				$('#nhsno').hide();
			}
			if($('#demographics').prop("checked") == true)
			{
				$('#demo').show();
			}
			else
			{
				$('#demo').hide();
			}

			if($('#ubrn').prop("checked") == true)
			{
				$('#ubr').show();
			}
			else
			{
				$('#ubr').hide();
			}

		

	};


$('#dob').change(function(){	

		var nm = $('#nm').val();
		var em = $('#em').val();
		if(nm == '' || em == '')
			{
				toastr.clear();
               NioApp.Toast("<h5>All fields Required</h5>", 'error',{position:'top-right'});
				 $('#dob').val('');
			}
		else{
			$('#nm').prop('readonly', true);
			$('#em').prop('readonly', true);
			$('#dob').prop('readonly', true);

          

		var dob = $('#dob').val();
	
	
		var btn = document.getElementById('btn3').innerHTML='<a href="javascript:void(0)" class="btn btn-info " id="searchpatient" onClick="showpatienta(\'' + dob + '\')">Search</a>';
			document.getElementById('btn4').innerHTML='<a href="javascript:void(0)" class="btn btn-primary" id="searchpatient" onClick="reset()">Reset</a>';
		}
        
});
	
	function reset() {		

      		 $('#nm').val('');
			$('#em').val('');
			$('#dob').val('');
			$('#nm').prop('readonly', false);
			$('#em').prop('readonly', false);
			$('#dob').prop('readonly', false);

			$('#nhs1').val('');
			$('#nhs2').val('');
			$('#nhs3').val('');
			$('#nhs1').prop('readonly', false);
			$('#nhs2').prop('readonly', false);
			$('#nhs3').prop('readonly', false);
    };

    

	function showpatienta(dob) {
        var nm = $('#nm').val();
  		var em = $('#em').val();
		//   var dob = $('#dob').val();
        
      $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{dob:dob,em:em,nm:nm,searchpatienta:"btn"},	            
        success: function(response){ 
            
			if(response == 'No Data Found')
				{
					 toastr.clear();
               NioApp.Toast("<h5>No Data found</h5>", 'error',{position:'top-right'});
				}
			document.getElementById('tabItem6').innerHTML=response;
			
			//         	   $("#tabItem6").html(response); 
            	//alert(response);
        	}
		  

    	});
    };

function fetchconsultant()
{
	var org = $('#organisation').val();
	$.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{org:org,fetchconsultant:"btn"},	             
        success: function(response){ 
			if(response == 'No Data Found')
				{
					 toastr.clear();
               NioApp.Toast("<h5>No Data found</h5>", 'error',{position:'top-right'});
				}
		
	document.getElementById('consultant').innerHTML=response;
			
//            $("#tabItem6").html(response); 
            //alert(response);
        }
		  

    }); 
}

$(function () {

// INITIALIZE DATEPICKER PLUGIN
$('.datepicker').datepicker({
	clearBtn: true,
	format: "mm/dd/yyyy"
});


// FOR DEMO PURPOSE
$('#reservationDate').on('change', function () {
	var pickedDate = $('input').val();
	$('#pickedDate').html(pickedDate);
});
});


	</script>
	

</html>