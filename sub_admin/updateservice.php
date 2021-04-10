<?php
include_once('../database/db.php');
?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php
include_once('header.php');
?>
<body class="nk-body bg-lighter npc-default has-sidebar">
<div class="nk-app-root">
<!-- main @s -->
<div class="nk-main ">
<!-- sidebar @s -->
<?php
include_once('sidebar.php');
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
<h2 class="nk-block-title fw-normal">Create Services</h2>
</div>
<div class="nk-block nk-block-lg">

<div class="card">
	<div class="card-inner">
<?php
$id = $_GET['sid'];
$query = mysqli_query($con,"SELECT * FROM services  JOIN ser_specialty_add ON services.service_speciality=ser_specialty_add.spec_id JOIN app_type ON services.service_a_type=app_type.app_id JOIN service_cliniciant ON services.ser_cl_type=service_cliniciant.cl_id JOIN service_name ON services.service_name=service_name.s_id JOIN ser_contact ON ser_contact.sertbl_id = services.m_id JOIN slot_management ON slot_management.sm_ser_id = services.m_id WHERE m_id = '$id'");
$fetch = mysqli_fetch_array($query);
?>
		<form method="post" id="servicedef" enctype="multipart/form-data">
			<div class="row g-4">
				<div class="col-lg-12">
					<div class="form-group">
					<input type="text" value="<?=$id?>" hidden id="serviceid">
                    <input type="text" value="<?=$fetch['s_name']?>" hidden id="snameid">
						<label class="form-label" for="full-name-1">
						<sup class="text-danger">* </sup>Service Name</label>
						<span class="nk-menu-icon ml-2"><a href="javascript:void(0)" onClick="openmodalname()"><em class="icon ni ni-plus"></em></a></span>
						<div class="form-control-wrap">
							<select name="ser_name" id="ser_name" class="form-control">
								<!-- phpcode.php  -->
                               
							</select>
						</div>
					</div>
				</div>
				
				<div class="col-lg-12">
					<div class="form-group">
						<label class="form-label" for="full-name-1">Request Type Support</label>
						<div class="form-control-wrap">
							<div class="row mt-2">
							    
                            <?php
                            $a= explode(",",$fetch['service_r_t_support']);
                            if(in_array("Appointment Request",$a))
                            {
                            ?>
								<div class="col-lg-4 col-4">
									<span class="ml-5"><input type="checkbox" class="requesttype" name="ser_reqt[]" id="reqt1" value="Appointment Request" checked> Appointment Request</span>
								</div>
                                <?php
                            }
                            else{
                                ?>
                                <div class="col-lg-4 col-4">
									<span class="ml-5"><input type="checkbox" class="requesttype" name="ser_reqt[]" id="reqt1" value="Appointment Request"> Appointment Request</span>
								</div>
                                <?php
                            }
                            if(in_array("Advice Request",$a))
                            {
                                ?>
								<div class="col-lg-4 col-4">
									<span><input type="checkbox" class="requesttype" name="ser_reqt[]" id="reqt2" value="Advice Request" checked> Advice Request</span>
								</div>
                                <?php
                            }else{
                                ?>
                                <div class="col-lg-4 col-4">
									<span><input type="checkbox" class="requesttype" name="ser_reqt[]" id="reqt2" value="Advice Request"> Advice Request</span>
								</div>
                                <?php
                            }
                            if(in_array("Triage Request",$a))
                            {
                                ?>
								<div class="col-lg-4 col-4">	
									<span><input type="checkbox" class="requesttype2" name="ser_reqt[]" id="reqt3" value="Triage Request" checked> Triage Request</span>
								</div>
                                <?php
                                }
                                else
                                {
                                ?>
                                <div class="col-lg-4 col-4">	
									<span><input type="checkbox" class="requesttype2" name="ser_reqt[]" id="reqt3" value="Triage Request"> Triage Request</span>
								</div>
                                <?php
                                }
                                ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label class="form-label" for="full-name-1">Service Comments</label>
						<div class="form-control-wrap">
							<textarea class="form-control form-control-sm" id="ser_cmnts" placeholder="Write your message" name="ser_cmnts" autocomplete="off"><?=$fetch['service_cmnts']?></textarea>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
                    
						<label class="form-label" for="full-name-1">Refer Alert</label>
						<div class="row">
                        <?php
                    if($fetch['service_refer'] !=null)
                    {
                    ?>
								<div class="col-lg-2 col-2 mt-5">
									<span class="ml-5"><input type="checkbox" id="ser_refer" name="ser_refer" checked> Show</span>
								</div>
                                <div class="col-lg-10 col-10">
									<span><textarea class="form-control form-control-sm" id="ser_show" placeholder="Write your message" name="ser_show" autocomplete="off"><?=$fetch['service_refer']?></textarea></span>
								</div>
                                <?php
                    }else{
                                ?>
                                <div class="col-lg-2 col-2 mt-5">
									<span class="ml-5"><input type="checkbox" id="ser_refer" name="ser_refer"> Show</span>
								</div>
                                <div class="col-lg-10 col-10">
									<span><textarea class="form-control form-control-sm" id="ser_show" readonly placeholder="Write your message" name="ser_show" autocomplete="off"></textarea></span>
								</div>
                                <?php
                    }
                                ?>
								
							</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label class="form-label" for="full-name-1"><sup class="text-danger">* </sup>Service Location</label>
						<!-- <span class="nk-menu-icon ml-2"><a href="javascript:void(0)" onClick="openloc()"><em class="icon ni ni-plus"></em></a></span> -->
						<div class="form-control-wrap">
							<input name="ser_location" id="ser_location" class="form-control" value="<?=$fetch['service_location']?>" readonly>
								
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
                    <input type="text" value="<?=$fetch['spec_name']?>" hidden id="specid">
						<label class="form-label" for="full-name-1"><sup class="text-danger">* </sup>Specialty</label>
						<!-- <span class="nk-menu-icon ml-2"><a href="javascript:void(0)" onClick="openmodalspec()"><em class="icon ni ni-plus"></em></a></span> -->
						<div class="form-control-wrap">
							<select name="ser_speciality" id="ser_speciality" class="form-control">
								<!--phpcode.php-->
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
                        <input type="text" value="<?=$fetch['app_type']?>" hidden id="apptypeid">
						<label class="form-label" for="full-name-1">Appointment Type</label>
						<span class="nk-menu-icon ml-2"><a href="javascript:void(0)" onClick="openmodal1()"><em class="icon ni ni-plus"></em></a></span>
						<div class="form-control-wrap">
							<select name="ser_apptype" id="ser_apptype" class="form-control">
								<!-- phpcode.php -->
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label class="form-label" for="full-name-1">Gender Treated</label>
						<div class="form-control-wrap">
							<select name="ser_gen" class="form-control" id="ser_gen">
                            <option value="">- Select -</option>
                            <?php
                            if($fetch['service_gender'] == "Male")
                            {
                            ?>
								
								<option value="Male" selected>Male</option>
                                <?php
                            }
                            else{
                                ?>
                                <option value="Male">Male</option>
                                <?php
                                }
                                if($fetch['service_gender'] == "Female")
                                {
                                    ?>
								<option value="Female" selected>Female</option>
                                <?php
                                }
                                else{
                                ?>
                                <option value="Female" >Female</option>
                                <?php
                                }
                                if($fetch['service_gender'] == "Male & Female")
                                {
                                ?>
								<option value="Male & Female" selected>Male & Female</option>
                                <?php 
                                }
                                else
                                {
                                ?>
                                <option value="Male & Female" >Male & Female</option>
                                <?php }?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label class="form-label" for="full-name-1">Directly Bookable</label>
						<div class="form-control-wrap">
							<select name="ser_direct" class="form-control" id="ser_direct">
								<option value="">- Select -</option>
                                <?php
                            if($fetch['sender_bookable'] == "Yes")
                            {
                            ?>
								<option value="Yes" selected>Yes</option>
                                <?php
                            }else{
                                ?>
                                <option value="Yes">Yes</option>
                                <?php
                            }
                            if($fetch['sender_bookable'] == "No")
                            {
                                ?>
								<option value="No" selected>No</option>
                                <?php
                            }else{
                                ?>
                                <option value="No" >No</option>
                                <?php
                            }
                                ?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-1 mt-4"><center>From</center></div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="form-label" for="full-name-1"><sup class="text-danger">* </sup>Service Effective Date Range</label>
						<div class="form-control-wrap">
							<input type="text" class="form-control datepicker" id="ser_effect" name="ser_effect" autocomplete="off" value="<?=$fetch['service_e_date']?>">
						</div>
					</div>
				</div>
			<div class="col-lg-2 mt-4"><center>To</center></div>
				<div class="col-lg-4">
					<div class="form-group">
					<label class="form-label" for="full-name-1"><sup class="text-danger">* </sup>Service Effective Date Range</label>
						<div class="form-control-wrap">
							<input type="text" class="form-control datepicker" id="ser_effect2" name="ser_effect2" autocomplete="off" value="<?=$fetch['service_e_date2']?>">
						</div>
					</div>
				</div>
				<div class="col-lg-1 mt-4"><center></center></div>
				<!-- <div class="col-lg-12">
					<div class="form-group">
						<label class="form-label" for="full-name-1">Service Transition Date</label>
						<div class="form-control-wrap">
							<input type="text" class="form-control date-picker" id="ser_tdate" name="ser_tdate" autocomplete="off">
						</div>
					</div>
				</div> -->
				<div class="col-lg-1 mt-4">Form</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="form-label" for="full-name-1">Age Range Treated</label>
						<div class="form-control-wrap">
							<input type="text" class="form-control" id="ser_ager" name="ser_ager" autocomplete="off" value="<?=$fetch['service_age']?>">
						</div>
					</div>
				</div>
				<div class="col-lg-2 mt-4"><center>To</center></div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="form-label" for="full-name-1">Age Range Treated</label>
						<div class="form-control-wrap">
							<input type="text" class="form-control" id="ser_ager2" name="ser_ager2" autocomplete="off" value="<?=$fetch['service_age2']?>" >
						</div>
					</div>
				</div>
				<div class="col-lg-1 mt-4"><center></center></div>
				<div class="col-lg-12">
					<div class="form-group">
						<label class="form-label" for="full-name-1">Publish</label>
						<div class="form-control-wrap">
                        <?php
                        if($fetch["service_publish"] != null)
                        {
                        ?>
							<input type="checkbox" class="ml-4" id="ser_pub" name="ser_pub" value="Publish" checked>
                            <?php
                        }else{
                            ?>
                            <input type="checkbox" class="ml-4" id="ser_pub" name="ser_pub" value="Publish">
                            <?php
                        }
                            ?>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label class="form-label" for="full-name-1">Include Service on Secondary Care Menu</label>
						<div class="form-control-wrap">
							<select class="form-control" name="ser_carem" id="ser_carem">
								<option value="">- Select -</option>
                                <?php
                                if($fetch['service_caremenu'] =="Include on Secondary Care Menu")
                                {
                                ?>
								<option value="Include on Secondary Care Menu" selected>Include on Secondary Care Menu</option>
                                <?php
                                }
                                else{
                                ?>
                                <option value="Include on Secondary Care Menu">Include on Secondary Care Menu</option>
                                <?php
                                }
                                if($fetch['service_caremenu'] =="Do Not Include on Secondary Care Menu")
                                {
                                ?>
								<option value="Do Not Include on Secondary Care Menu" selected>Do Not Include on Secondary Care Menu</option>
                                <?php
                                }
                                else
                                {
                                ?>
                                <option value="Do Not Include on Secondary Care Menu">Do Not Include on Secondary Care Menu</option>
                                <?php
                                }
                                ?>
							</select>
						</div>
					</div>
				</div>

				<!-- <div class="col-lg-12">
					<div class="form-group">
						<label class="form-label" for="full-name-1">Clinical Types</label>
						<span class="nk-menu-icon ml-2"><a href="javascript:void(0)" onClick="sermodalcltype()"><em class="icon ni ni-plus"></em></a></span>
					</div>
				</div> -->
				<br>

				<div class="col-lg-12 col-md-12 col-12">

					<div id="accordion">

					  <div class="card">
						<div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="cursor: pointer;">
						  <h5 class="mb-0">
						  <i class="fas fa-plus pull-right"></i>
							<a class="btn p-0 m-0 ml-3 pull-left collapsed">
							  Clinician Type
							</a>
						  </h5>
						</div>
						<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
						  <div class="card-body">
							<div class="col-lg-12">
								<div class="form-group">
                                <input type="text" value="<?=$fetch['cl_type']?>" hidden id="cltypeid">
									<label class="form-label" for="full-name-1">Clinician Type</label>
									<div class="form-control-wrap">
										<select name="ser_cltype" class="form-control" id="ser_cltype">
											<!-- phpcode.php -->
										</select>
									</div>
								</div>
							</div>
						  </div>
						</div>
					  </div>

					   <div class="card">
							<div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="cursor: pointer;"> 
							  <h5 class="mb-0">
							  <i class="fas fa-plus pull-right"></i>
							<a class="btn p-0 m-0 ml-3 pull-left collapsed">
								  Service Restricted
								</a>
							  </h5>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
							  <div class="card-body">
							 <div class="col-lg-12">
								<div class="form-group">
									<div class="row">
<!--
										<div class="col-lg-2 col-2 mr-5">
											<span class="ml-5 d-flex"><input type="checkbox" id="re_sh" name="re_sh"> Restricted</span>
										</div>
-->
									<div class="col-lg-12">
										<div class="form-group">
											<label class="form-label" for="full-name-1">Reason For Restriction</label>
											<div class="form-control-wrap">
												<input type="text" class="form-control" id="re_reason" name="re_reason" autocomplete="off" value="<?=$fetch['ser_res_reas']?>">
											</div>
										</div>
									  </div>
										<div class="col-lg-10 col-10">
											<label class="form-label" for="full-name-1">Restriction Comments</label>
											<span><textarea class="form-control form-control-sm" id="re_cmnt" placeholder="Write your message" name="re_cmnt"><?=$fetch['ser_res_cmnt']?></textarea></span>
										</div>
									</div>
									</div>
								</div>
							  </div>
							</div>
						  </div>

						<div class="card">
						<div class="card-header" id="serpriority"  data-toggle="collapse" data-target="#serprioritysho" aria-expanded="true" aria-controls="serprioritysho" style="cursor: pointer;">
						  <h5 class="mb-0">
						  <i class="fas fa-plus pull-right"></i>
							<a class="btn p-0 m-0 ml-3 pull-left collapsed">
							  Service Priority, Slot Protection and Indicative Wait Time Calculation
							</a>
						  </h5>
						</div>
						<div id="serprioritysho" class="collapse" aria-labelledby="serpriority" data-parent="#accordion">
						  <div class="card-body">
							<div class="col-lg-12">

								<div class="form-group">
									<label class="form-label" for="full-name-1">Priority Supported</label>
									<br>
									<br>
									<strong><label class="col-form-control" for="">Routine</label></strong>
									<div class="form-control-wrap ml-5">
									<?php
									if($fetch['ser_priority_rout'] != null)
									{
									?>
										<input type="checkbox" name="shpwpriority" id="shpwpriority" checked>
										<span>Priority Supported</span>
										<br>
										<br>
										<div class="form-group col-6" id="priodiv" style="display: none">
											<label class="form-label">Slot Protection</label>
											<input type="text" class="form-control" id="ser_routin" name="ser_routin" value="<?=$fetch['ser_priority_rout']?>"><span>Day(s)</span>
										</div>
										<?php
									}
									else{
										?>
										<input type="checkbox" name="shpwpriority" id="shpwpriority">
										<span>Priority Supported</span>
										<div class="form-group col-6" id="priodiv" style="display: none">
											<label class="form-label">Slot Protection</label>
											<input type="text" class="form-control" id="ser_routin" name="ser_routin"><span>Day(s)</span>
										</div>
										<?php
									}
										?>
										
									</div>
									<hr>

									<strong><label class="col-form-control" for="">Urgent</label></strong>
									<div class="form-control-wrap ml-5">
									<?php
									if($fetch['ser_priority_urg'] !=null)
									{
									?>
										<input type="checkbox" name="urshow" id="urshow" checked>
										<span>Priority Supported</span>
										<br>
										<br>
										<div class="form-group col-6" id="urgentdiv" style="display: none">
											<label class="form-label">Slot Protection</label>
											<input type="text" class="form-control" id="ser_urgent" name="ser_urgent" value="<?=$fetch['ser_priority_urg']?>"><span>Day(s)</span>
										</div>
										<?php
									}
									else{
										?>
										<input type="checkbox" name="urshow" id="urshow">
										<span>Priority Supported</span>
										<br>
										<br>
										<div class="form-group col-6" id="urgentdiv" style="display: none">
											<label class="form-label">Slot Protection</label>
											<input type="text" class="form-control" id="ser_urgent" name="ser_urgent"><span>Day(s)</span>
										</div>
										<?php
									}
										?>
										
									</div>
									<hr>

									<strong><label class="col-form-control" for="">2 Week Wait</label></strong>
									<div class="form-control-wrap ml-5">
									<?php
									if($fetch['ser_priority_2week'] != null)
									{
									?>
										<input type="checkbox" name="2weekwait" id="2weekwait" checked>
										<span>Priority Supported</span>
										<br>
										<br>
										<div class="form-group col-6" id="prioweek" style="display: none">
											<label class="form-label">Slot Protection</label>
											<input type="text" class="form-control" id="ser_towweek" name="ser_towweek" value="<?=$fetch['ser_priority_2week']?>"><span>Day(s)</span>
										</div>
										<?php
									}else
									{
										?>
										<input type="checkbox" name="2weekwait" id="2weekwait">
										<span>Priority Supported</span>
										<br>
										<br>
										<div class="form-group col-6" id="prioweek" style="display: none">
											<label class="form-label">Slot Protection</label>
											<input type="text" class="form-control" id="ser_towweek" name="ser_towweek"><span>Day(s)</span>
										</div>
										<?php
									}
										?>
										
									</div>

									<div style="display: none" id="showweekdiv">
										<hr>
									<strong><label class="col-form-control" for="">Weekend Exclusion (For all priorities)</label></strong>
									<div class="form-control-wrap ml-5">
									<?php
									if($fetch['ser_priority_wekex'] != null)
									{
									?>
										<input type="radio" value="Exclude Saturday and Sunday" name="ser_weekend" checked>&nbsp;&nbsp;
										<span>Exclude Saturday & Sunday</span>
										<?php
									}else{
										?>
										<input type="radio" value="Exclude Saturday and Sunday" name="ser_weekend" checked>&nbsp;&nbsp;
										<span>Exclude Saturday & Sunday</span>
										<?php
									}
										?>
										<!-- <br>
										<br>
										<input type="radio" value="Exclude Sunday" name="ser_weekend">&nbsp;&nbsp;
										<span>Exclude Sunday</span> -->
									</div>
									</div>

								</div>
							</div>
						  </div>
						</div>
					  </div>

					  <div class="card">
						<div class="card-header" id="headingThree"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="cursor: pointer;"> 
						<h5 class="mb-0">
						  <i class="fas fa-plus pull-right"></i>
							<a class="btn p-0 m-0 ml-3 pull-left collapsed">
							Contact Information
							</a>
						  </h5>
						 
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
						  <div class="card-body">
						
								 <div class="col-lg-12">
									<div class="form-group">
										<label class="col-form-label" for="full-name-1">Service Contact Name</label>
										<div class="form-control-wrap">
											<input type="text" class="form-control" id="ser_conname" name="ser_conname" autocomplete="off" value="<?=$fetch['scon_name']?>">
										</div>
									</div>
								</div>
								  <div class="col-lg-12">
									<div class="form-group">
										<label class="col-form-label" for="full-name-1">Address</label>
										<div class="form-control-wrap">
											<textarea class="form-control form-control-sm" id="ser_conadd" placeholder="Write your message" name="ser_conadd" readonly><?=$fetchsa["or_firstaddress"]?></textarea>
										</div>
									 </div>
								 </div>
							  <div class="row">
								<div class="col-lg-6">
								<div class="form-group">
									<label class="col-form-label" for="full-name-1">Country</label>
									<div class="form-control-wrap">
										<input type="text" class="form-control" readonly value="United Kingdom" id="ser_concount" name="ser_concount" autocomplete="off">
									</div>
								</div>
							 </div>
							   <div class="col-lg-6">
								<div class="form-group">
									<label class="col-form-label" for="full-name-1">Post Code</label>
									<div class="form-control-wrap">
										<input type="text" class="form-control" id="ser_conpost" name="ser_conpost" readonly value="<?=$fetchsa["or_code"]?>" autocomplete="off">
									</div>
								</div>
							 </div>
								  <!-- <div class="col-lg-6">
								<div class="form-group">
									<label class="col-form-label" for="full-name-1">Town</label>
									<div class="form-control-wrap">
										<input type="text" class="form-control" id="ser_sontown" name="ser_sontown" autocomplete="off">
									</div>
								</div>
							  </div> -->
							  </div>

							  <hr>
							  <strong><label for="" >Health Professionals</label></strong>

							 <div class="row">
							  <div class="col-lg-6">
								<div class="form-group">
									<label class="col-form-label" for="full-name-1">Contact Telephone Number</label>
									<div class="form-control-wrap">
										<input type="number" class="form-control" id="hp_con" name="hp_con" autocomplete="off" value="<?=$fetch["hp_ctel"]?>">
									</div>
								</div>
							  </div>
							  <div class="col-lg-6">
								<div class="form-group">
									<label class="col-form-label" for="full-name-1">Fax Number</label>
									<div class="form-control-wrap">
										<input type="number" class="form-control" id="hp_fax" name="hp_fax" autocomplete="off" value="<?=$fetch["hp_faxn"]?>">
									</div>
								</div>
							  </div>
							 </div>
							  <div class="row">
							  <div class="col-lg-6">
								<div class="form-group">
									<label class="col-form-label" for="full-name-1">Text Telephone Number</label>
									<div class="form-control-wrap">
										<input type="number" class="form-control" id="hp_text" name="hp_text" autocomplete="off" value="<?=$fetch["hp_texttel"]?>">
									</div>
								</div>
							  </div>
							  <div class="col-lg-6">
								<div class="form-group">
									<label class="col-form-label" for="full-name-1">E-mail Address</label>
									<div class="form-control-wrap">
										<input type="email" class="form-control" id="hp_email" name="hp_email" autocomplete="off" value="<?=$fetch["hp_pemail"]?>">
									</div>
								</div>
							  </div>
							 </div>

							  <hr>
							  <strong><label for="">Patients</label></strong>

							 <div class="row">
							  <div class="col-lg-6">
								<div class="form-group">
									<label class="col-form-label" for="full-name-1">Patient Telephone</label>
									<div class="form-control-wrap">
										<input type="number" class="form-control" id="pa_tel" name="pa_tel" autocomplete="off" value="<?=$fetch["pa_tel"]?>">
									</div>
								</div>
							  </div>
							  <div class="col-lg-6">
								<div class="form-group">
									<label class="col-form-label" for="full-name-1">Hours of Operation</label>
									<div class="form-control-wrap">
										<input type="text" class="form-control" id="pa_hop" name="pa_hop" autocomplete="off" value="<?=$fetch["pa_hop"]?>">
									</div>
								</div>
							  </div>
							 </div>

						  </div>
						</div>
					  </div>

					<div class="card">
						<div class="card-header" id="intructions" data-toggle="collapse" data-target="#intructionsss" aria-expanded="true" aria-controls="intructionsss" style="cursor: pointer;">
						<h5 class="mb-0">
						  <i class="fas fa-plus pull-right"></i>
							<a class="btn p-0 m-0 ml-3 pull-left collapsed">
							Instructions
							</a>
						  </h5>
						
						</div>
						<div id="intructionsss" class="collapse" aria-labelledby="intructions" data-parent="#accordion">
						  <div class="card-body">
							<div class="col-lg-12">
								<div class="form-group">
									<label class="form-label" for="full-name-1">Instructions</label>
									<div class="form-control-wrap">
										<textarea class="form-control form-control-sm" id="ser_ins" placeholder="Write your message" name="ser_ins"><?=$fetch['ser_instruct']?></textarea>
									</div>
								</div>
							</div>
						  </div>
						</div>
					  </div>

					 <div class="card">
						<div class="card-header" id="headiu" data-toggle="collapse" data-target="#collapsehead" aria-expanded="false" aria-controls="collapsehead" style="cursor: pointer;"> 
						  <h5 class="mb-0">
						  <i class="fas fa-plus pull-right"></i>
							<a class="btn p-0 m-0 ml-3 pull-left collapsed">
							  Slot Management
							</a>
						  </h5>
						</div>
						<div id="collapsehead" class="collapse" aria-labelledby="headiu" data-parent="#accordion">
						  <div class="card-body">
							  
							<div class="row">
							  <div class="col-lg-12">
								 <strong><label for="" class="mb-5">Polling Range</label></strong>
								  <div class="form-group">
									<label class="col-form-label" for="full-name-1">Until End Day</label>
									<div class="form-control-wrap">
										<input type="number" class="form-control" id="po_end" name="po_end" autocomplete="off" value="<?=$fetch['sm_untilend']?>">
									</div>
								</div> 		
							  </div>
							</div>
							  <hr>
							<div class="row">
							  <div class="col-lg-6">
								 <strong><label for="" class="mb-5">Polling Frequency</label></strong>
								  <div class="form-group">
									<label class="col-form-label" for="full-name-1">Recure Ever</label>
									<div class="form-control-wrap">
										<input type="number" class="form-control" id="po_rec" name="po_rec" autocomplete="off" value="<?=$fetch['sm_recever']?>">
									</div>
									</div> 		
							  </div>
								<div class="col-lg-6 mt-5">
								  <div class="form-group">
									<div class="form-group mt-4">
										<label class="col-form-label" for="full-name-1">Days</label>
										<input type="number" class="form-control " name="po_day" id="po_day" value="<?=$fetch['sm_days']?>">
									
									</div>
								</div>
							  </div>
								<div class="col-lg-6">
								  <div class="form-group">
									  <label class="col-form-label" for="full-name-1">Approximate Polling Time</label>
									<div class="form-control-wrap">
										<input class="form-control" name="po_aptime" id="po_aptime" type="time" value="<?=$fetch['sm_approxi']?>" >
										
									</div>
								</div> 		
							  </div>
							</div>
								<hr>
							<div class="row">
							  <div class="col-lg-12">
								 <strong><label for="" >Slot Reservation</label></strong>
								  <div class="form-group">
									<label class="col-form-label" for="full-name-1">Reservation Period (Days)</label>
									<div class="form-control-wrap">
									    <input type="text" class="form-control" name="po_resp" id="po_resp" value="<?=$fetch['sm_reserperiod']?>">
									
									</div>
								</div> 		
							  </div>
							</div>  

							  <hr>
							<div class="row">
							  <div class="col-lg-8">
								 <strong><label for="" >Provider System</label></strong>
								  <div class="form-group">
									<label class="col-form-label" for="full-name-1">Provider System</label>
									<div class="form-control-wrap">
										<input class="form-control" name="po_prosys" id="po_prosys" value="<?=$fetch['sm_providesys']?>">
										
									</div>
								</div> 		
							  </div>
								<div class="col-lg-4" style="margin-top: 110px !important;">
							  </div>
							</div>  

						  </div>
						</div>
					  </div>																
					</div>
				</div>

				<br>
				<div class="col-12">
					<div class="form-group">
						<button type="submit" class="btn btn-lg btn-primary" id="privacysubmit">Save Informations</button>
					</div>
				</div>
			</div>
		</form>

	</div>
</div>

</div>
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

<!-- For Service Name -->
<div class="modal fade" tabindex="-1" id="modalname">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Service Name</h5>
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<em class="icon ni ni-cross"></em>
</a>
</div>
<div class="modal-body">
<form class="form-validate is-alter" id="sername" method="post">
<div class="row">
<div class="form-group col-md-12 mb-4">
<label class="form-label" for="full-name">Service Name</label>
<div class="form-control-wrap">
<input type="text" class="form-control" id="ser_nameq" name="ser_nameq" required autocomplete="off">
</div>
</div>
</div>
<div class="form-group">
<button type="submit" class="btn btn-lg btn-primary">Save</button>
</div>
</form>
</div>
<div class="modal-footer bg-light">
</div>
</div>
</div>
</div>

<!-- For Service Location -->
<div class="modal fade" tabindex="-1" id="serloc">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Service Location</h5>
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<em class="icon ni ni-cross"></em>
</a>
</div>
<div class="modal-body">
<form class="form-validate is-alter" id="ser_fromloc" method="post">
<div class="row">
<!--
<div class="form-group col-md-12 mb-4">
<label class="form-label" for="full-name">Branch ID</label>
<div class="form-control-wrap">
<input readonly type="text" class="form-control" id="ser_loc" name="ser_loc" required>
</div>
</div>
-->
<div class="form-group col-md-12 mb-4">
<label class="form-label" for="full-name">Branch Name</label>
<div class="form-control-wrap">
<input type="text" class="form-control" id="ser_bname" name="ser_bnameq" required>
</div>
</div>
<div class="form-group col-md-12 mb-4">
<label class="form-label" for="full-name">Branch City</label>
<div class="form-control-wrap">
<input type="text" class="form-control" id="ser_bcity" name="ser_bcityq" required>
</div>
</div>
<div class="form-group col-md-12 mb-4">
<label class="form-label" for="full-name">Service Location</label>
<div class="form-control-wrap">
<input type="text" class="form-control" id="ser_bloc" name="ser_blocq" required>
</div>
</div>
</div>
<div class="form-group">
<button type="submit" class="btn btn-lg btn-primary">Save</button>
</div>
</form>
</div>
<div class="modal-footer bg-light">
</div>
</div>
</div>
</div>

<!-- For Service Appointment -->
<div class="modal fade" tabindex="-1" id="modalForm2">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Appointment Type</h5>
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<em class="icon ni ni-cross"></em>
</a>
</div>
<div class="modal-body">
<form class="form-validate is-alter" id="aupdate" method="post">
<div class="row">
<div class="form-group col-md-12 mb-4">
<label class="form-label" for="full-name">Appointment Type</label>
<div class="form-control-wrap">
<input type="text" class="form-control" id="ser_appt" name="ser_appt" required>
</div>
</div>
</div>
<div class="form-group">
<button type="submit" class="btn btn-lg btn-primary">Save</button>
</div>
</form>
</div>
<div class="modal-footer bg-light">
</div>
</div>
</div>
</div>

<!-- for service clinician add -->
<!-- <div class="modal fade" tabindex="-1" id="modalcltype">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Clinician Type</h5>
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<em class="icon ni ni-cross"></em>
</a>
</div>
<div class="modal-body">
<form class="form-validate is-alter" id="claddtype" method="post">
<div class="row">
<div class="form-group col-md-12 mb-4">
<label class="form-label" for="full-name">Clinician Type</label>
<div class="form-control-wrap">
<input type="text" class="form-control" id="cltype" name="cltype" required>
</div>
</div>
</div>
<div class="form-group">
<button type="submit" class="btn btn-lg btn-primary" id="adminupdate">Save</button>
</div>
</form>
</div>
<div class="modal-footer bg-light">
</div>
</div>
</div>
</div> -->

<!-- for service specialty add -->
<!-- <div class="modal fade" tabindex="-1" id="modalspecial">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Add Specialty</h5>
<a href="#" class="close" data-dismiss="modal" aria-label="Close">
<em class="icon ni ni-cross"></em>
</a>
</div>
<div class="modal-body">
<form class="form-validate is-alter" id="specform" method="post">
<div class="row">
<div class="form-group col-md-12 mb-4">
<label class="form-label" for="full-name">Specialty</label>
<div class="form-control-wrap">
<input type="text" class="form-control" id="specialadd" name="specialadd" required>
</div>
</div>
</div>
<div class="form-group">
<button type="submit" class="btn btn-lg btn-primary" id="spec">Save</button>
</div>
</form>
</div>
<div class="modal-footer bg-light">
</div>
</div>
</div>
</div> -->

</body>

</html>
<script>
// for fetch data from clinical type
function fetchdataclin(){
  

$.ajax({
url: 'phpcode.php',
type: 'post',
data: {fetchclinbtn:"btn"},
success: function(response){
$('#ser_cltype').html(response);
}
});
};
$(document).ready(function(){
fetchdataclin();
});

// for fetch data from service appointment
function fetchdataserapp(){
var apptypeid= $('#apptypeid').val();
$.ajax({
url: 'phpcode.php',
type: 'post',
data: {fetchappbtn:"btn",apptypeid:apptypeid},
success: function(response){
$('#ser_apptype').html(response);
}
});
};
$(document).ready(function(){
fetchdataserapp();
});

// for fetch data from service location
// function fetchdataserloc(){
	
// $.ajax({
// url: 'phpcode.php',
// type: 'post',
// data: {fetchserlocbtn:"btn"},
// success: function(response){
// $('#ser_location').html(response);
// }
// });
// };
// $(document).ready(function(){
// fetchdataserloc();
// });

// for fetch data from service specialty
function fetchspeciality(){
    var specid= $('#specid').val();
$.ajax({
url: 'phpcode.php',
type: 'post',
data: {fetchspecbtn:"btn",specid:specid},
success: function(response){
$('#ser_speciality').html(response);
}
});
};	
$(document).ready(function(){
fetchspeciality();
setTimeout(function(){
    var clinical  = $('#ser_speciality').val();
  var cltypeid =$('#cltypeid').val();
   if (clinical) {
    $.ajax({
    	url :"phpcode.php",
	type:"POST",
	cache:false,
	data:{clinical:clinical,cltypeid:cltypeid},
	success:function(data){
	    $("#ser_cltype").html(data);
	}
    });
   }else{
	$('#ser_cltype').html('<option value="">Select</option>');
       
   }
},3000);
});

// for fetch data from service name
function fetcserdatadrop(){
   var snameid= $('#snameid').val();
$.ajax({
url: 'phpcode.php',
type: 'post',
data:{fetchserbtndata:"btn",snameid:snameid},
success: function(response){
$('#ser_name').html(response);
}
});
};
$(document).ready(function(){
fetcserdatadrop();
});

// for specialty modal
// function openmodalspec() {		
// $('#modalspecial').modal('show');
// };

// for service clinician type modal
// function sermodalcltype(){
// $('#modalcltype').modal('show');
// };
// for service location modal
function openloc() {		
$('#serloc').modal('show');
};
// for service name modal
function openmodalname() {		
$('#modalname').modal('show');
};
// for appointment modal
function openmodal1() {		
$('#modalForm2').modal('show');
};	

// for service location add
$("#ser_fromloc").on('submit', function(e){
e.preventDefault();

var serbname = $('#ser_bname').val();
var serbcity = $('#ser_bcity').val();
var serloc = $('#ser_loc').val();

if(serbname != '' && serbcity != '' && serloc != ''){

var formapp = new FormData(this);
formapp.append("ser_blocbtn","btn");
$.ajax({
type: 'POST',
url: 'phpcode.php',
data: formapp,
contentType: false,
processData:false,
success: function(data){
//				alert(data);
if(data){
$('#ser_fromloc')[0].reset();
toastr.clear();
NioApp.Toast("<h5>Successfully</h5>", 'success',{position:'top-right'});
$('#serloc').modal('hide');
fetchdataserloc();
}
else {
toastr.clear(); 
NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
}
}

});
}else {
toastr.clear();
NioApp.Toast("<h5>All Fields are required</h5>", 'error',{position:'top-right'});
}
});

// for service name add
$("#sername").on('submit', function(e){
e.preventDefault();

var seranme = $('#ser_nameq').val();

if(seranme != ''){

var formapp = new FormData(this);
formapp.append("ser_namebtnq","btn");
$.ajax({
type: 'POST',
url: 'phpcode.php',
data: formapp,
contentType: false,
processData:false,
success: function(data){
if(data){
$('#sername')[0].reset();
toastr.clear();
NioApp.Toast("<h5>Successfully</h5>", 'success',{position:'top-right'});
$('#modalname').modal('hide');
fetcserdatadrop();
}
else {
toastr.clear(); 
NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
}
}

});
}else {
toastr.clear();
NioApp.Toast("<h5>All Fields are required</h5>", 'error',{position:'top-right'});
}
});

// for appointment add
$("#aupdate").on('submit', function(e){
e.preventDefault();

var appanme = $('#ser_appt').val();

if(appanme != ''){

var formapp = new FormData(this);
formapp.append("ser_app","btn");
$.ajax({
type: 'POST',
url: 'phpcode.php',
data: formapp,
contentType: false,
processData:false,
success: function(data){
if(data){
$('#aupdate')[0].reset();
toastr.clear();
NioApp.Toast("<h5>Successfully</h5>", 'success',{position:'top-right'});
$('#modalForm2').modal('hide');
fetchdataserapp();
}
else {
toastr.clear(); 
NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
}
}

});
}else {
toastr.clear();
NioApp.Toast("<h5>All Fields are required</h5>", 'error',{position:'top-right'});
}
});

// for clinician type add
$("#claddtype").on('submit', function(e){
e.preventDefault();

var cltypeadd = $('#cltype').val();

if(cltypeadd != ''){

var formapp = new FormData(this);
formapp.append("ser_cltypebtn","btn");
$.ajax({
type: 'POST',
url: 'phpcode.php',
data: formapp,
contentType: false,
processData:false,
success: function(data){
if(data){
$('#sername')[0].reset();
toastr.clear();
NioApp.Toast("<h5>Successfully</h5>", 'success',{position:'top-right'});
// $('#modalcltype').modal('hide');
fetchdataclin();
}
else {
toastr.clear(); 
NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
}
}

});
}else {
toastr.clear();
NioApp.Toast("<h5>Please Fill Clician Field</h5>", 'error',{position:'top-right'});
}
});	

// for specialty add
$('#specform').on("submit", function(e){
	e.preventDefault();
	
	var serspec = $('#specialadd').val();
	
	if(serspec != ''){
		
		var specformdata = new FormData(this);
		specformdata.append("inserdataspecbtn","btn");
		
		$.ajax({
			type: 'post',
			data: specformdata,
			url: 'phpcode.php',
			contentType: false,
			processData:false,
			success: function(data){
				if(data == "errorspec"){
					toastr.clear();
				NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
				}else {
					toastr.clear();
				NioApp.Toast("<h5>Service Specialty Added Successfully</h5>", 'success',{position:'top-right'});
					// $('#modalspecial').modal('hide');
					$('#specform').trigger('reset');
					fetchspeciality();
				}
			}
		});
	}else {
		toastr.clear();
	NioApp.Toast("<h5>Please Fill proper</h5>", 'error',{position:'top-right'});
	}
});
	


//			$("#ser_refer").each(function(){
//			if($(this).is(":checked")){
//				alert("hello");
//			}
//		});
$("input:checkbox[name='ser_refer']").on('change',function(){
$("input:checkbox[name='ser_refer']:checked").each(function(){
if($("#ser_refer").prop('checked') == true){
$('#ser_show').attr("readonly",false);
}
});
});

$("input:checkbox[name='shpwpriority']").on('change', function(){
$("input:checkbox[name='shpwpriority']:checked").each(function(){
if($("#shpwpriority").prop('checked') == true){
document.getElementById('priodiv').style.display = "block";
document.getElementById('showweekdiv').style.display = "block";
}
});
});

$("input:checkbox[name='urshow']").on('change', function(){
$("input:checkbox[name='urshow']:checked").each(function(){
if($("#urshow").prop('checked') == true){
document.getElementById('urgentdiv').style.display = "block";
}
});
});

$("input:checkbox[name='2weekwait']").on('change', function(){
$("input:checkbox[name='2weekwait']:checked").each(function(){
if($("#2weekwait").prop('checked') == true){
document.getElementById('prioweek').style.display = "block";
}
});
});
	
$("input:checkbox[name='ser_reqt[]']").on('change', function(){
	$("input:checkbox[name='ser_reqt[]']:checked").each(function(){
		if($('#reqt3').prop('checked') == true){
			$('#reqt1').prop('checked', false);
			$('#reqt2').prop('checked', false);
		}
	});
});


//	$("input:checkbox[name='shpwpriority']").on('change', function(){
//		$("input:checkbox[name='shpwpriority']:checked").each(function(){
////			alert("hello");
//			if($("#shpwpriority").prop('checked') == false){
//				$('#ser_priosup').attr("readonly",true);
//			}else {
//				$('#ser_priosup').attr("readonly",false);
//			}
//		});
//	});

// for restricted
//	$("input:checkbox[name='re_sh']").on('change',function(){
//	$("input:checkbox[name='re_sh']:checked").each(function(){
////		alert("hello");
//		if($("#re_sh").prop('checked') == false){
//			$('#re_reason').attr("readonly",true);
//			$('#re_cmnt').attr("readonly",true);
//		}
//		else{
//			$('#ser_show').attr("readonly",false);
//		}
//		});
//	});



$(function() 
{
   $('#ser_ager2').change(function () 
    {
      var quantityI =  parseInt($('#ser_ager').val());
      var quantity = parseInt($('#ser_ager2').val());
     if( quantityI > quantity)
      {
		swal("warning!", "Invalid Age Range", "warning");
		$('#ser_ager2').val('');
      }
      if( quantityI == quantity)
      {
		swal("warning!", "Invalid Age Range", "warning");
		$('#ser_ager2').val('');
      }
     
    });
	
	$('#ser_effect2').change(function () 
    {
      var quantityI =  $('#ser_effect').val();
      var quantity = $('#ser_effect2').val();
     if( quantityI > quantity)
      {
		swal("warning!", "Invalid Date Range", "warning");
		$('#ser_effect2').val('');
      }
     if( quantityI == quantity)
      {
		swal("warning!", "Invalid Date Range", "warning");
		$('#ser_effect2').val('');
      }
    });
 }); 









   // Country dependent ajax
   $("#ser_speciality").on("change",function(){
   var clinical  = $(this).val();
   if (clinical) {
    $.ajax({
    	url :"phpcode.php",
	type:"POST",
	cache:false,
	data:{clinical:clinical},
	success:function(data){
	    $("#ser_cltype").html(data);
	}
    });
   }else{
	$('#ser_cltype').html('<option value="">Select</option>');
       
   }
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

$("#servicedef").on('submit', function(e){
e.preventDefault();

var ser_name = $('#ser_name').val();
var ser_publish = $('#ser_pub').val();

var ser_cmnts = $('#ser_cmnts').val();
var ser_loc = $('#ser_location').val();
var ser_spec = $('#ser_speciality').val();
var ser_app = $('#ser_apptype').val();
var ser_gen = $('#ser_gen').val();
var ser_dir = $('#ser_direct').val();
var ser_eff = $('#ser_effect').val();
var ser_eff2 = $('#ser_effect2').val();
// var ser_tdate = $('#ser_tdate').val();
var ser_ager = $('#ser_ager').val();
var ser_ager2 = $('#ser_ager2').val();
var ser_care = $('#ser_carem').val();
var ser_clt = $('#ser_cltype').val();
var ser_res = $('#re_reason').val();
var ser_cmnt = $('#re_cmnt').val();
var ser_conna = $('#ser_conname').val();
var ser_conad = $('#ser_conadd').val();
var ser_concoun = $('#ser_concount').val();
var ser_conpos = $('#ser_conpost').val();
// var ser_sontow = $('#ser_sontown').val();
var ser_hpcon = $('#hp_con').val();
var ser_hpfax = $('#hp_fax').val();
var ser_hptext = $('#hp_text').val();
var ser_hpem = $('#hp_email').val();
var ser_patel = $('#pa_tel').val();
var ser_patel = $('#pa_hop').val();
var ser_poend = $('#po_end').val();
var ser_porec = $('#po_rec').val();
var ser_podya = $('#po_day').val();
var ser_poapt = $('#po_aptime').val();
var ser_pores = $('#po_resp').val();
var ser_popro = $('#po_prosys').val();
var ser_instr = $('#ser_ins').val();

// for request type
//		$(".requesttype").each(function(){
//			if($(this).is(":checked")){
//				reqtype.push($(this).val());
//			}
//		});
//			reqtype = reqtype.toString();		
//		
if(ser_name != '' && ser_loc != '' && ser_spec != '' && ser_app != '' && ser_gen != '' && ser_dir != '' && ser_eff != ''  && ser_ager != '' && ser_care != '' && ser_clt != '' && ser_conna != '' && ser_conad != '' && ser_concoun != '' && ser_conpos != '' && ser_hpem != '' && ser_patel != ''){

var formdata = new FormData(this);
formdata.append("servicupdate","btn");
//formdata.append('ser_reqt',$('input:radio[name="ser_reqt"]:checked').val());
formdata.append('ser_weekend',$('input:radio[name="ser_weekend"]:checked').val());
var serviceid = $('#serviceid').val();
formdata.append("serviceid",serviceid);
$.ajax({
type: 'POST',
url: 'phpcode.php',
data: formdata,
contentType: false,
processData:false,
//            beforeSend: function(){
//                $('#privacysubmit').attr("disabled","disabled");
//                $('#privacyadd').css("opacity",".5");
//            },
success: function(data){
if(data == 'errorinslotm'){
toastr.clear();
NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
}
else if(data == 'Successapps'){
$('#servicedef')[0].reset();
//					$('#servicedef').trigger('reset');
toastr.clear();
NioApp.Toast("<h5>Service Updated</h5>", 'success',{position:'top-right'});
			window.location.href="service.php";

}

//                $('#privacyadd').css("opacity","");
//                $("#privacysubmit").removeAttr("disabled");
}
});
}else {
toastr.clear();
NioApp.Toast("<h5>All Fields are required</h5>", 'error',{position:'top-right'});
}
});



</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>