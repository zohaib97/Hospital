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
						<h2 class="nk-block-title fw-normal">E-Referral Service</h2>

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
								    <div class="col-md-12" style="display:none;" id="createpatient">
                                                        <a href="createpatient.php" type="button"
                                                            class="btn btn-primary float-right" id="createpatienthref">Create New Patient</a>

                                                    </div>
								    <input type="hidden" id="servicegender">
								    <input type="hidden" id="patientgender">
								     <input type="hidden"   id="servage2">
		<input type="hidden"   id="servage">
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
									         <div class="col-md-3 pb-3">
											<input style="border-color: #000000;" class="form-control" type="date"  placeholder="Date Of Birth"  id="dob"
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
												   maxlength="3" required onkeyup="moveOnMax(this,'nhs3')" >
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
							<br>
								<div class="mb-4 text-center" id="tabItem6" style="color:red;">
							
							
								</div>
								
								<div class="mt-5" id="tabItem7">
									
								</div>
								<div class="mt-5" id="tabItem8">
									<form method="post" id="attach" style="display: none;">
								 <div class="row">
								     <?php
								      $em = $_SESSION['gprefferer'];
										  $q1 = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$em'");
										  $fetchorg = mysqli_fetch_array($q1);
										  $orgid = $fetchorg['ur_orgtype'];
								     
								     ?>
								     <input type="text" name="organisation" id="organisation1" value="<?=$orgid?>" hidden="true">
								 <!--<div class="col-md-4">-->
									<!-- <input type="text" name="rid" id="refferelid" hidden="true" value="">-->
									<!-- <label for="consultant">Organisation</label>-->
									<!--  <select class="form-control" name="organisation" id="organisation" onchange="fetchconsultant()">-->
									<!--  <option>Select</option>-->
										  <?php
									 $q = mysqli_query($con,"SELECT * FROM `orginzation`");
									 if(mysqli_num_rows($q)>0)
									 {
										 while($fe = mysqli_fetch_array($q))
										 {
									 ?>
								 <!--<option value="<?=$fe['orid']?>"><?=$fe['or_name']?></option>-->
										  <?php
										 }
									 }
										  ?>
								 <!--</select>-->
									<!-- </div>-->
								 <div class="col-md-4">
									 <!--<input type="text" name="rid" id="refferelid" hidden="true" value="">-->
									 <label for="consultant">Consultant</label>
									  <select class="form-control" name="consultant" id="consultant" onchange="showproceed()">
									  <option>Select</option>
										 
								 </select>
									 </div>
									 
									 
									 <div class="col-md-4" style="display:none;" id="proceed">
									
									 <input type="submit" class="btn btn-primary mt-5" name="rsubmit" value="Continue With Selected Service" id="rsubmit">
									 
									 </div>
									 <div class="col-md-2" id="draft">
									 <input type="submit" class="btn btn-info mt-5" name="savedraft" value="Save As Draft" id="savedraft">
								 </div>
								 <div class="col-md-2" id="cancel">
									 <input type="button" class="btn btn-info mt-5" name="cancelref" value="Cancel" id="cancelref">
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
               
                <!-- footer @e -->
            </div>
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
       <div class="modal fade" tabindex="-1" id="modalForm2">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Patient Update</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
              	   <form method="post" id="patientupdate" enctype="multipart/form-data">
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
															<input type="hidden"  id="pid"  name="pid">	
<!--														<input type="text" class="form-control form-control-lg"  placeholder="Enter Title" name="ptitle" required>-->
														<select name="ptitle" id="ptitle" class="form-control form-control-lg">
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
														<input type="text" class="form-control form-control-lg" id="pfirstname" value="" placeholder="Enter First name" name="pfirstname" autocomplete="off" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="email">Patient Surname</label>
														<input type="text" class="form-control form-control-lg" id="psurname" value="" placeholder="Enter Surname" name="psurname" autocomplete="off" required>
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
														<input type="number" class="form-control form-control-lg" id="nhsnon" 
														value="<?=isset($_GET["nhs"])? $_GET["nhs"]:""?>" name="nhsno" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
												   maxlength="10" autocomplete="off" onchange="checknhs(this.value)">
												       <small id="valid-nhs"></small>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="dob">House No/Name</label>
														<input type="text" class="form-control form-control-lg"  placeholder="House no" name="houseno" id="houseno" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="mpass">Street Name</label>
														<input type="text" class="form-control form-control-lg"  placeholder="Street Name" name="streetname" id="streetname" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="cpass">City</label>
														<input type="text" class="form-control form-control-lg"  placeholder="City" name="city" id="Pcity" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">POST Code</label>
														<input type="text" class="form-control form-control-lg"  placeholder="Postal Code" name="postalcode" id="postalcode" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="rno">Country</label>
														<input type="text" class="form-control form-control-lg" id="" value="England" readonly placeholder="Country" name="country" id="country" required autocomplete="off">
													</div>
												</div>
												
												
												
												
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">Home Telephone Number</label>
														<input type="number" class="form-control form-control-lg"  placeholder="Enter Telephone no" name="telephoneno" id="telephoneno" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">Mobile Number</label>
														<input type="number" class="form-control form-control-lg"  placeholder="Enter Mobile no" name="mobileno" id="mobileno" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6" id="">
													<div class="form-group">
														<label class="col-form-label" for="rno">Email</label>
														<input type="email" class="form-control form-control-lg"  onchange="checkemail(this.value)" placeholder="Enter Email" name="email" id="pemail" required autocomplete="off"> 
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
                <div class="modal-footer bg-light">
                    <span class="sub-text">Patient Update</span>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
if(isset($_GET["nhs"])){ 
$nhs1=substr($_GET["nhs"],0,4);
$nhs2=substr($_GET["nhs"],4,3);
$nhs3=substr($_GET["nhs"],7,10);
?>	
<script>
   $(document).ready(function(){
      $('#nhs1').val('<?=$nhs1?>');
			$('#nhs2').val('<?=$nhs2?>');
			$('#nhs3').val('<?=$nhs3?>');
			$('#nhs1').prop('readonly', false);
			$('#nhs2').prop('readonly', false);
			$('#nhs3').prop('readonly', false);
			$("#nhsno").show();
			$("#nhs").attr("checked",true);
			showsearch();
				var total = "<?=$_GET["nhs"]?>";
			setTimeout(function(){
			    showpatient(total);
			    
			},3000);
			
			
   });
</script>
<?php }
elseif(isset($_GET["fname"])){ ?>
<script>
    	 $('#nm').val('<?=$_GET["fname"]?>');
			$('#em').val('<?=$_GET["sname"]?>');
			$('#dob').val('<?=$_GET["dob"]?>');
			$('#nm').prop('readonly', false);
			$('#em').prop('readonly', false);
			$('#dob').prop('readonly', false);
			$("#demographics").attr("checked",true);
// 			nhsshow();
			$("#demo").show();
				var nm = $('#nm').val();
		var em = $('#em').val();
		if(nm == '' || em == '')
			{
				toastr.clear();
               NioApp.Toast("<h5>All fields Required</h5>", 'error',{position:'top-right'});
				 $('#dob').val('');
			}
		else{
		

          

		var dob = $('#dob').val();
	
	
		var btn = document.getElementById('btn3').innerHTML='<a href="javascript:void(0)" class="btn btn-info " id="searchpatient" onClick="showpatienta(\'' + dob + '\')">Search</a>';
			document.getElementById('btn4').innerHTML='<a href="javascript:void(0)" class="btn btn-primary" id="searchpatient" onClick="reset()">Reset</a>';
			var total = "<?=$_GET["dob"]?>";
			setTimeout(function(){
			    showpatienta(total);
			    
			},3000);
		    
		}
</script>
<?php }?>
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
    function fetchpatientedit(id,title,fname,sname,email,nhsno,dob,hno,street,country,city,post,tele,mob){
        $("#pid").val(id);
    $("#ptitle").val(title); 
    $("#pfirstname").val(fname);
      $("#psurname").val(sname);
    $("#pemail").val(email);
    $("#nhsnon").val(nhsno);
    $("#pdob").val(dob);
    $("#houseno").val(hno);
    $("#streetname").val(street);
    $("#country").val(country);
    $("#Pcity").val(city);
    $("#postalcode").val(post);
    $("#telephoneno").val(tele);
    $("#mobileno").val(mob);
     fnCalculateAge();
$("#modalForm2").modal("show");
    }
    	$("#patientupdate").on('submit', function(e){
		
        	e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("updatepatient","btn");
		var nhs = $('#nhs').val();
	
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            processData:false,
            beforeSend: function(){
                $('#addpatient').attr("disabled","disabled");
                $('#patientupdate').css("opacity",".5");
            },
            success: function(data){
            //   alert(data);
                if(data == 'Error'){
                   toastr.clear(); 
               NioApp.Toast("<h5>patient didn't Update Successfully</h5>", 'error',{position:'top-right'});
                }
				else if(data == 'Success'){
					$('#patientupdate')[0].reset();
					toastr.clear();
               NioApp.Toast("<h5>Patient Update Successfully</h5>", 'success',{position:'top-right'});
				
					  setTimeout(function(){
                    
                    window.location.href="e-refferelservice.php";
                },3000);
					
                }
			
                $('#patientadd').css("opacity","");
                $("#addpatient").removeAttr("disabled");
              
            }
			
        });

    });
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
				var org=$(id).data("org");
				fetchconsultant(org);
				var serv2=$(id).data("servage2");
				$('#servage2').val(serv2);
				var serv=$(id).data("servage");
$('#servage').val(serv);
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
			
		var nhs3 = $('#nhs3').val();
		var total = nhs1+nhs2+nhs3;
	
		var btn = document.getElementById('btn').innerHTML='<a href="javascript:void(0)" class="btn btn-info float-left" id="searchpatient" onClick="showpatient(\'' + total + '\')">Search</a>';
			document.getElementById('btn2').innerHTML='<a href="javascript:void(0)" class="btn btn-primary" id="searchpatient" onClick="reset()">Reset</a>';
		}
        
    };
	function showmyref() {		
        $('#modalname').modal('show');
    };

	function showpatient(nhs) {		
      $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{nhs:nhs,patientfetch:"btn"},	            
        success: function(response){ 
      
			if(response == 'There is no patient matching criteria')
				{
				     $('#createpatient').show();
                 $('#createpatienthref').attr("href","createpatient.php?nhs="+nhs+"&redirect=e-refferelservice.php");
					 toastr.clear();
               NioApp.Toast("<h5>There is no patient matching criteria</h5>", 'error',{position:'top-right'});
				}

	document.getElementById('tabItem6').innerHTML=response;
			
//            $("#tabItem6").html(response); 
            //alert(response);
        }
		  

    });
	$.ajax({    
        type: "POST",
        url: "phpcode.php", 
		dataType: 'JSON',
		data:{nhs:nhs,patientfetchgeb:"btn"},	            
        success: function(response){ 
		
				kk(response['title']);
		}
	});
    };
	
	// insert refer
	$("#refadfrom").on('submit', function(e){
		e.preventDefault();
		
		
	
			var ptage = $('#pt_age').val();
			var pttitle = $('#pt_title').val();
			var refform = new FormData(this);
		
			refform.append("searchservice","btn");
			refform.append("ptage",ptage);
			refform.append("pttitle",pttitle);
		
	
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
						}
					else if(data == '')
						{
						
               document.getElementById('tabItem7').innerHTML='';
                
						$("#modalname").modal("hide");
						}
					
						else{
						    
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
		
		$("#rsubmit").on('click', function()
		{

	$('#attach').submit(function(e){
		e.preventDefault();
	
	
		if(  $("#patientgender").val()== "Mr" && $("#servicegender").val() == "Female"){
		    NioApp.Toast("<h5>This Service Only Available For Female</h5>", 'warning',{position:'top-right'});
		    document.getElementById('tabItem6').innerHTML ="";
		    document.getElementById('tabItem7').innerHTML ="";
		     $('#attach').hide();
		}
		if(($("#patientgender").val()== "Ms" && $("#servicegender").val()== "Male") || ($("#patientgender").val()== "Mrs" && $("#servicegender").val()== "Male")){
		     NioApp.Toast("<h5>This Service Only Available For Male</h5>", 'warning',{position:'top-right'});
		    document.getElementById('tabItem6').innerHTML ="";
		    document.getElementById('tabItem7').innerHTML ="";
		     $('#attach').hide();
		}
		var ptage = parseInt($('#ptage').val());
	var servage2 = parseInt($('#servage2').val());
	var servage = parseInt($('#servage').val());
       
        if(servage !="" && servage2 == ""){
		if(ptage < servage)
					{
				
						NioApp.Toast("<h5>Your Age doesn't match to service age range</h5>", 'warning',{position:'top-right'});
						document.getElementById('tabItem6').innerHTML ='';
						 document.getElementById('tabItem7').innerHTML ="";
						 $('#attach').hide();
					}
		else{
		    	if(  $("#patientgender").val()== "Mr" && $("#servicegender").val() == "Male"){
		    	    
		var reqtype = $('#ref_reqt').val();
		var coid = $('#consultant').val();
		var pid = $("input:radio[name='check']:checked").val();
			var refform = new FormData($('#attach').this);
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
              NioApp.Toast("<h5>Referral Already Created</h5>", 'warning',{position:'top-right'});
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
              NioApp.Toast("<h5>Referral Already Created</h5>", 'warning',{position:'top-right'});
						}
//			
					}
				});
		    	    
		    	}
	if(  $("#servicegender").val() == "Male & Female"){
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
              NioApp.Toast("<h5>Referral Already Created</h5>", 'warning',{position:'top-right'});
						}
//			
					}
				});
		    	}
		}
}
        if(servage !="" && servage2 != ""){
           
		
				if(ptage > servage2)
					{
					   
						NioApp.Toast("<h5>Your Age doesn't match to service age range</h5>", 'warning',{position:'top-right'});
							document.getElementById('tabItem6').innerHTML ="";
							document.getElementById('tabItem7').innerHTML ="";
							$('#attach').hide();
					}
				else if(ptage < servage)
					{
					 
						NioApp.Toast("<h5>Your Age doesn't match to service age range</h5>", 'warning',{position:'top-right'});
							document.getElementById('tabItem6').innerHTML ="";
							document.getElementById('tabItem7').innerHTML ="";
							$('#attach').hide();
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
              NioApp.Toast("<h5>Referral Already Created</h5>", 'warning',{position:'top-right'});
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
              NioApp.Toast("<h5>Referral Already Created</h5>", 'warning',{position:'top-right'});
						}
//			
					}
				});
		    	    
		    	}
	if(  $("#servicegender").val() == "Male & Female"){
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
              NioApp.Toast("<h5>Referral Already Created</h5>", 'warning',{position:'top-right'});
						}
//			
					}
				});
		    	}
		}
}
		})
			});

	
			$("#savedraft").on('click', function()
	{

					$('#attach').submit(function(e){
						e.preventDefault();
					
					
						if(  $("#patientgender").val()== "Mr" && $("#servicegender").val() == "Female"){
							NioApp.Toast("<h5>This Service Only Available For Female</h5>", 'warning',{position:'top-right'});
							document.getElementById('tabItem6').innerHTML ="";
							document.getElementById('tabItem7').innerHTML ="";
							$('#attach').hide();
						}
						if(($("#patientgender").val()== "Ms" && $("#servicegender").val()== "Male") || ($("#patientgender").val()== "Mrs" && $("#servicegender").val()== "Male")){
							NioApp.Toast("<h5>This Service Only Available For Male</h5>", 'warning',{position:'top-right'});
							document.getElementById('tabItem6').innerHTML ="";
							document.getElementById('tabItem7').innerHTML ="";
							$('#attach').hide();
						}
						var ptage = parseInt($('#ptage').val());
					var servage2 = parseInt($('#servage2').val());
					var servage = parseInt($('#servage').val());
					
						if(servage !="" && servage2 == ""){
						if(ptage < servage)
									{
								
										NioApp.Toast("<h5>Your Age doesn't match to service age range</h5>", 'warning',{position:'top-right'});
										document.getElementById('tabItem6').innerHTML ='';
										document.getElementById('tabItem7').innerHTML ="";
										$('#attach').hide();
									}
						else{
								if(  $("#patientgender").val()== "Mr" && $("#servicegender").val() == "Male"){
									
						var reqtype = $('#ref_reqt').val();
						var coid = $('#consultant').val();
						var pid = $("input:radio[name='check']:checked").val();
							var refform = new FormData($('#attach').this);
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
							NioApp.Toast("<h5>Data Added to Draft Successfully</h5>", 'success',{position:'top-right'});
								
									}
									else if(data["res"] == "Error")
										{
											toastr.clear();
							NioApp.Toast("<h5>Data Didn't Add to Draft Successfully</h5>", 'error',{position:'top-right'});
										}
										else if(data["res"] == "Already")
										{
											toastr.clear();
							NioApp.Toast("<h5>Referral Already Created</h5>", 'warning',{position:'top-right'});
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
										NioApp.Toast("<h5>Data Added to Draft Successfully</h5>", 'success',{position:'top-right'});
										
									}
									else if(data["res"] == "Error")
										{
											toastr.clear();
							NioApp.Toast("<h5>Data Didn't Add to Draft Successfully</h5>", 'error',{position:'top-right'});
										}
										else if(data["res"] == "Already")
										{
											toastr.clear();
							NioApp.Toast("<h5>Referral Already Created</h5>", 'warning',{position:'top-right'});
										}
				//			
									}
								});
									
								}
					if(  $("#servicegender").val() == "Male & Female"){
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
										NioApp.Toast("<h5>Data Added to Draft Successfully</h5>", 'success',{position:'top-right'});
										
									}
									else if(data["res"] == "Error")
										{
											toastr.clear();
							NioApp.Toast("<h5>Data Didn't Add to Draft Successfully</h5>", 'error',{position:'top-right'});
										}
										else if(data["res"] == "Already")
										{
											toastr.clear();
							NioApp.Toast("<h5>Referral Already Created</h5>", 'warning',{position:'top-right'});
										}
				//			
									}
								});
								}
						}
				}
						if(servage !="" && servage2 != ""){
						
						
								if(ptage > servage2)
									{
									
										NioApp.Toast("<h5>Your Age doesn't match to service age range</h5>", 'warning',{position:'top-right'});
											document.getElementById('tabItem6').innerHTML ="";
											document.getElementById('tabItem7').innerHTML ="";
											$('#attach').hide();
									}
								else if(ptage < servage)
									{
									
										NioApp.Toast("<h5>Your Age doesn't match to service age range</h5>", 'warning',{position:'top-right'});
											document.getElementById('tabItem6').innerHTML ="";
											document.getElementById('tabItem7').innerHTML ="";
											$('#attach').hide();
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
										NioApp.Toast("<h5>Data Added to Draft Successfully</h5>", 'success',{position:'top-right'});
										
									}
									else if(data["res"] == "Error")
										{
											toastr.clear();
							NioApp.Toast("<h5>Data Didn't Add to Draft Successfully</h5>", 'error',{position:'top-right'});
										}
										else if(data["res"] == "Already")
										{
											toastr.clear();
							NioApp.Toast("<h5>Referral Already Created</h5>", 'warning',{position:'top-right'});
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
										NioApp.Toast("<h5>Data Added to Draft Successfully</h5>", 'success',{position:'top-right'});
										
									}
									else if(data["res"] == "Error")
										{
											toastr.clear();
							NioApp.Toast("<h5>Data Didn't Add to Draft Successfully</h5>", 'error',{position:'top-right'});
										}
										else if(data["res"] == "Already")
										{
											toastr.clear();
							NioApp.Toast("<h5>Referral Already Created</h5>", 'warning',{position:'top-right'});
										}
				//			
									}
								});
									
								}
					if(  $("#servicegender").val() == "Male & Female"){
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
										NioApp.Toast("<h5>Data Added to Draft Successfully</h5>", 'success',{position:'top-right'});
										
									}
									else if(data["res"] == "Error")
										{
											toastr.clear();
							NioApp.Toast("<h5>Data Didn't Add to Draft Successfully</h5>", 'error',{position:'top-right'});
										}
										else if(data["res"] == "Already")
										{
											toastr.clear();
							 NioApp.Toast("<h5>This patient has already had a "+data["spec"]+" referral, do you want to refer the patient again?</h5>", 'warning',{position:'top-right'});
										}
				//			
									}
								});
								}
						}
				}
						})
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
			document.getElementById('tabItem7').innerHTML='';
			document.getElementById('tabItem6').innerHTML='';
			  $('#createpatient').hide();
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
            
			if(response == 'There is no patient matching criteria')
				{
				    $('#createpatient').show();
                 $('#createpatienthref').attr("href","createpatient.php?fname="+nm+"&sname="+em+"&dob="+dob+"&redirect=e-refferelservice.php");
					 toastr.clear();
               NioApp.Toast("<h5>There is no patient matching criteria</h5>", 'error',{position:'top-right'});
				}
			document.getElementById('tabItem6').innerHTML=response;
			
			//         	   $("#tabItem6").html(response); 
            	//alert(response);
        	}
		  

    	});
    };

function fetchconsultant(org)
{
// 	var org = $('#organisation').val();
var servid = $('#serv_id').val();
	$.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{org:org,servid:servid,fetchconsultant:"btn"},	             
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
        format: 'dd-mm-yyyy'
    });


// FOR DEMO PURPOSE
$('#reservationDate').on('change', function () {
	var pickedDate = $('input').val();
	$('#pickedDate').html(pickedDate);
});
});

$('#cancelref').on('click',function(){
    
    
        Swal.fire({
            title: 'Are you sure you want to Cancel This Referral?',
            text: "The details will not be saved?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result) {
            if (result.value) {
                // Swal.fire('Deleted!', 'Manager has been deleted.', 'success');
            
				window.location.href="index.php";
            }
        });
    
})

	</script>
	

</html>