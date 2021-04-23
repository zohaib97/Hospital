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
				    <?php
				    $q = $_GET["c_id"];

						$qref = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` WHERE c_id = '$q'");
						$dref = mysqli_fetch_assoc($qref);
						if($dref['request_type'] == "Advice Request")
						{
						    
						
				    ?>
				     <h2>Advice Request</h2>
				     <?php
						}
						elseif($dref['request_type'] == "Appointment Request")
						{
						    
						
				     ?>
				     <h2>Appointment Request</h2>
				     <?php
						}
				     ?>
				     <br>
					<div class="container-fluid">
					     
						<div class="nk-content-inner">
							<div class="nk-content-body">
								<div class="components-preview wide-md mx-auto">
								  
									<div class="row">
										<div class="col-lg-4 col-md-4 col-12">
											<span class="col-form-label font-weight-bold" style="font-size: 15px; color: black">Summary Information</span>
											<hr>
											<div class="card p-3">
												<ul>
													<li>
														<?php

														$q = $_GET["c_id"];

														$qref = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` JOIN `tbl_patients` ON c_rfid = tbl_patients.pt_id JOIN `services` ON c_serid = services.service_id JOIN `tbl_ruser` ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid WHERE c_id = '$q'");
														$dref = mysqli_fetch_assoc($qref);
														?>
														<span class="font-weight-bold">Named Clinician</span>
														<br>
														<span><?= $dref['ur_fname'] ?> <?= $dref['ur_sname'] ?></span>
													</li>
													<br>
													<li>
														<span class="font-weight-bold">Service Name</span>
														<br>
														<?php
														$s_id =	$dref['service_name'];
														$sername = mysqli_query($con, "SELECT * FROM service_name WHERE s_id = '$s_id'");
														$s_name = mysqli_fetch_array($sername);
														?>
														<span><?= $s_name['s_name'] ?></span>
													</li>
													<br>
													<li>
														<span class="font-weight-bold">Speciality</span>
														<br>
														<?php
														$s_id1 =	$dref['service_speciality'];
														$sername1 = mysqli_query($con, "SELECT * FROM ser_specialty_add WHERE spec_id = '$s_id1'");
														$s_name1 = mysqli_fetch_array($sername1);
														?>
														<span><?= $s_name1['spec_name'] ?></span>
													</li>
													<br>
													<?php
													$qref = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` JOIN `tbl_patients` ON c_rfid = tbl_patients.pt_id JOIN `services` ON c_serid = services.service_id JOIN `tbl_ruser` ON tbl_ruser.ur_id = tbl_consultantrefferels.c_gpid WHERE c_id = '$q'");
													$dref = mysqli_fetch_assoc($qref);
													?>
													<li>
														<span class="font-weight-bold">Referred By</span>
														<br>
														<span><?= $dref['ur_fname'] ?> <?= $dref['ur_sname'] ?></span>
													</li>
													<br>
													<li>
														<span class="font-weight-bold">Registered Practice</span>
														<br>
														<span><?=$dref["ur_address"]?></span>
													</li>
													<br>
													<li>
														<span class="font-weight-bold">Telephone: </span>
														<span><?= $dref['pt_telno'] ?></span>
													</li>

												</ul>



											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-12">
											<div>
											<?php
											$pid = $_GET['pid'];
											$sql2 = mysqli_query($con,"SELECT * FROM tbl_patients WHERE pt_id = '$pid'");
											$fetch2 = mysqli_fetch_array($sql2);

											?>
												<div class="nk-block-head nk-block-head-lg wide-sm">
												<span class="float-right p-2 bg-light w-100 col-form-label font-weight-bold">Patient Info - </span>
												<button type="button" class="btn btn-info btn-sm float-right mt-1" onclick="showpat()">More Info</button>
												<div class="row">
													<span class="text-dark col-md-3">
												<b>Name:</b> <?=$fetch2['pt_name']." ".$fetch2["pt_surname"]?>(<?=$fetch2['pt_title']?>)</span>
												
												<br>
												<span class="text-dark col-md-3">
												<b>NHS no:</b> <?=$fetch2['pt_nhsno']?></span>
												<br>
												<span class="text-dark col-md-3">
												<b>Date of Birth:</b> <?php
												$da=date_create($fetch2['pt_dob']);
												echo date_format($da,"m-d-Y");
												
												
												?></span>
												<br>
												<span class="text-dark col-md-3">
												<b>Email:</b> <?=$fetch2['pt_email']?>
												</span>
												<br>
													</div>
													<br>
													<div class="row">
												<span class="text-dark col-md-3 ml-2">
												<b>Street Name:</b><?=$fetch2['pt_streetname']?>
												</span>
												<br>
												<span class="text-dark col-md-3">
												<b>Telephone no:</b> <?=$fetch2['pt_telno']?>
												</span>
												<br>
											</div>
												<hr>
													<span class="float-right p-2 bg-light w-100 col-form-label font-weight-bold">
													    
													       <?php
				    $q = $_GET["c_id"];

						$qref = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` WHERE c_id = '$q'");
						$dref = mysqli_fetch_assoc($qref);
						if($dref['request_type'] == "Advice Request")
						{
						    
						
				    ?>
				 Advice Status
				     <?php
						}
						elseif($dref['request_type'] == "Appointment Request")
						{
						    
						
				     ?>
				     Referr Status
				     <?php
						}
				     ?>- <span class="text-info">Not Submitted</span></span>
													<br>
													<br>
													<br>
													<form action="" id="cmntform" enctype="multipart/form-data">
														<div class="row bg-light p-1">
															<div class="col-6">
																<label class="col-form-label" for="">Add Attachement</label>
																<span><input class="form-control" type="file" name="attachment"></span>
															</div>
															<div class="col-6">
																<label class="col-form-label" for="">Add Web Link</label>
																<input class="form-control" value="<?php echo $_GET["c_id"] ?>" type="text" name="rid" hidden="true">
																<?php
																$coid = $_GET['coid'];
																$sql = mysqli_query($con,"SELECT * FROM tbl_ruser WHERE ur_id = '$coid'");
																$fetch1 = mysqli_fetch_array($sql);
																?>
																<input class="form-control" value="<?=$_GET['coid']?>" type="hidden" name="coid">
																<span><input class="form-control" type="text" name="weblink"></span>
															</div>
															<div class="col-12 mt-1">
																<textarea placeholder="Enter advice response detail here" class="form-control" name="cmntad" id="cmntad" cols="30" rows="3"></textarea>
															</div>
															<button type="submit" class="btn btn-sm btn-info my-3 ml-3">Send</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>

									<!--
<br>
<hr>
<br>
-->
									<!--									<center><span id="hideno">No Result loaded</span></center>-->
									<!--
<div class="nk-block nk-block-lg" id="rdata">

</div>
-->

									<!-- nk-block -->
								</div><!-- .components-preview -->
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" tabindex="-1" id="modalname">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pateint Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
				<?php
											$pid = $_GET['pid'];
											$sql4 = mysqli_query($con,"SELECT * FROM tbl_patients WHERE pt_id = '$pid'");
											$fetch4 = mysqli_fetch_array($sql4);

											?>
				<div class="row">
				<div class="col-md-6">
                    <h6>Name: </h6>
					<p class="mb-1"><?=$fetch4['pt_name']." ".$fetch4["pt_surname"]?></p>
					</div>
					<div class="col-md-6">
					<h6>Email:</h6>
					<p class="mb-1"><?=$fetch4['pt_email']?></p>
					</div>
					<br>
					<div class="col-md-6">
					<h6>NHS no:</h6>
					<p class="mb-1"><?=$fetch4['pt_nhsno']?></p>
					</div>
					<div class="col-md-6">
					<h6>City:</h6>
					<p class="mb-1"><?=$fetch4['pt_city']?></p>
					</div>
					<br>
					<div class="col-md-6">
					<h6>Country:</h6>
					<p class="mb-1"><?=$fetch4['pt_country']?></p>
					</div>
						<div class="col-md-6">
					<h6>House No/Name:</h6>
					<p class="mb-1"><?=$fetch4['pt_houseno']?></p>
					</div>
						<div class="col-md-6">
					<h6>Street Name:</h6>
					<p class="mb-1"><?=$fetch4['pt_streetname']?></p>
					</div>
						<div class="col-md-6">
					<h6>Post Code:</h6>
					<p class="mb-1"><?=$fetch4['pt_postcode']?></p>
					</div>
						<div class="col-md-6">
					<h6>TelePhone Number:</h6>
					<p class="mb-1"><?=$fetch4['pt_telno']?></p>
					</div>
						<div class="col-md-6">
					<h6>Mobile Number:</h6>
					<p class="mb-1"><?=$fetch4['pt_mobno']?></p>
					</div>
					
					</div>
                </div>
                <div class="modal-footer bg-light">
                </div>
            </div>
        </div>
    </div>
				<!-- content @e -->
				<!-- footer @s -->
				<?php
				include_once('../Consultant/footer.php');
				?>
				<!-- footer @e -->
			</div>
			<!-- wrap @e -->
		</div>

		<!-- main @e -->
	</div>
	<!-- Modal Form -->

	<!-- app-root @e -->
	<script src="assets/js/example-toastr.js?ver=2.2.0"></script>
</body>
<script>
function showpat()
{
	$('#modalname').modal('show');
}
	$("#cmntform").on('submit', function(e) {
		e.preventDefault();

		var cmnt = $('#cmntad').val();

		if (cmnt != '') {

			var formdata = new FormData(this);
			formdata.append("cmntdatabtn", "btn");
			$.ajax({
				type: 'POST',
				url: 'phpcode.php',
				data: formdata,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$('#rsubmit').attr("disabled", "disabled");
					$('#attach').css("opacity", ".5");
				},
				success: function(data) {

					if (data == 'Error') {
						toastr.clear();
						NioApp.Toast("<h5>Something Went Wrong</h5>", 'error', {
							position: 'top-right'
						});
					} else if (data == 'Success') {
						$('#cmntform')[0].reset();
						toastr.clear();
						NioApp.Toast("<h5>Request has been sent to the provider</h5>", 'success', {
							position: 'top-right'
						});
						window.setTimeout(function(){

// Move to a new location or you can do something else
window.location.href = "e-refferelservice.php";

}, 3000);
					}

					$('#attach').css("opacity", "");
					$("#rsubmit").removeAttr("disabled");
				}

			});

		} else {
			toastr.clear();
			NioApp.Toast("<h5>Please Fill Proper</h5>", 'error', {
				position: 'top-right'
			});
			document.getElementById('cmntad').style.borderColor = "red";
		}

	});


	//	// for worklist
	//	
	//	$("#worklist").on("change", function(){
	//		document.getElementById('btnshow').style.display = "block";
	//	});
	//	
	//	function workbltdata(){
	//				
	//		var work = $("#worklist").val();
	//		
	//		if(work == "Advice and Guidance Request"){
	//			document.getElementById('rdata').style.display = "block";
	//			document.getElementById('hideno').style.display = "none";
	//		}
	//		if(work !== 'Advice and Guidance Request')
	//				document.getElementById('rdata').style.display = "none";
	//		
	//	};
	//		
	//	function fetchrefferels()
	//	{
	//		 $.ajax({    
	//        type: "POST",
	//        url: "phpcode.php", 
	//		data:{serrefferelfetch:"btn"},	            
	//        success: function(response){                    
	//            $("#rdata").html(response); 
	//            //alert(response);
	//        }
	//
	//    });
	//	}
	//	$(document).ready(function(){
	//		fetchrefferels();
	//	});
	//	function show(id){
	//	
	//		if($('#'+id).prop("checked")==true)
	//			{
	//				var group = "input:checkbox[name='check']";
	//				$(group).prop("checked", false);
	//				$('#'+id).prop("checked",true);
	//		$('#attach').show();
	//		$('#refferelid').val(id);
	//			}
	//		else{
	//			$('#attach').hide();
	//		}
	//	}
</script>

</html>