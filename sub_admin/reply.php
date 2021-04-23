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
                                    <ul class="nk-menu">
                                        <li class="nk-menu-item">
                                            <?php 
												if(isset($_GET['rfno'])){
													$rfno = $_GET['rfno'];
													$qref = mysqli_query($con, "SELECT * FROM `tbl_refferelattachment` WHERE ra_refferelid = '$rfno' and reply = '1'");
													$dref = mysqli_fetch_assoc($qref);
												}
											?>
											 
                                            <input type="text" hidden value="<?=$rfno?>" id="refno">
                                            <?php
				    $q = $_GET["c_id"];

						$qref = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` WHERE c_id = '$q'");
						$dref = mysqli_fetch_assoc($qref);
						if($dref['request_type'] == "Advice request")
						{
						    
						
				    ?>
                                            <nav class="p-2 bg-light mb-3 col-form-label font-weight-bold">Advice
                                                Request Details - <span class="text-info"><?=$dref['ra_refferelid']?></span>
                                            </nav>
                                             <?php
						}
						elseif($dref['request_type'] == "Appointment Request")
						{
						    
						
				     ?>
				     <nav class="p-2 bg-light mb-3 col-form-label font-weight-bold">Appointment
                                                Request Details - <span class="text-info"><?=$dref['ra_refferelid']?></span>
                                            </nav>
                                            <?php
						}
				     ?>
                                        </li>
                                    </ul>

                                    <div class="row">
                                        <div class="col-md-9 mx-auto bg-white py-1 px-1 mb-2" style="border-radius:8px">
                                             	<?php
											$pid = $_GET['pid'];
											$sql2 = mysqli_query($con,"SELECT * FROM tbl_patients WHERE pt_id = '$pid'");
											$fetch2 = mysqli_fetch_array($sql2);

											?>
                                            <div class="nk-block-head nk-block-head-lg wide-sm">
												<span class="float-right w-100 col-form-label font-weight-bold">Patient Info - </span>
												<button type="button" class="btn btn-info btn-sm float-right mt-1" onclick="showpat()">More Info</button>
											<div class="row">
													<span class="text-dark col-md-4">
												<b>Full Details:</b><br> <?=$fetch2['pt_name']." ".$fetch2["pt_surname"]?>(<?=$fetch2['pt_title']?>) <br> <small>[<?=$fetch2['pt_email']?>]</small></span>
												
												<span class="text-dark col-md-4">
												<b>NHS no:</b>br> <?=$fetch2['pt_nhsno']?></span>
												<span class="text-dark col-md-4">
												<b>Date of Birth:</b> <br><?php
												$da=date_create($fetch2['pt_dob']);
												echo date_format($da,"m-d-Y");
												
												
												?></span>
											
												<span class="text-dark col-md-4">
												<b>Street Name:</b> <br><?=$fetch2['pt_streetname']?>
												</span>
												<span class="text-dark col-md-4">
												<b>Telephone no:</b> <br><?=$fetch2['pt_telno']?>
												</span>
												
											</div>
												
                                        </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <span class="col-form-label font-weight-bold"
                                                style="font-size: 15px; color: black">Summary Information</span>
                                            <hr>
                                            <div class="card p-3">
                                                <div class="row">


                                                    <div class="col-md-6 mb-2"> 
                                                        <?php 
															if(isset($_GET['nhsno'])){
													$nhsno = $_GET['nhsno'];
													
													$qref = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` JOIN `tbl_patients` ON c_rfid = tbl_patients.pt_id JOIN `services` ON c_serid = services.service_id JOIN `tbl_ruser` ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid WHERE c_nhsno = '$nhsno'");
													$dref = mysqli_fetch_assoc($qref);
												}
														?>
                                                        <span class="font-weight-bold">Named Clinician</span>
                                                        <br>
                                                        <span><?=$dref["ur_fname"]." ".$dref['ur_sname']?></span>
                                                    </div> 
                                                    
                                                    <div class="col-md-6 mb-2"> 
                                                        <span class="font-weight-bold">Service Name</span>
                                                        <br>
                                                        <?php
														$sername = $dref['service_name'];
														$snq = mysqli_query($con, "SELECT * FROM `service_name` WHERE `s_id` = '$sername'");
															$serndata = mysqli_fetch_assoc($snq);
														?>
                                                        <span><?=$serndata['s_name'];?></span>
                                                    </div> 
                                                    
                                                    <div class="col-md-12 mb-2"> 
                                                         <span class="font-weight-bold">Priority: </span>
                                                         <br>
                                                        <?php
                                                         if($dref['ser_priority_rout'] != 0)
                                                         {
                                                        ?>
                                                        
                                                        <span>Routine</span>
                                                        
                                                        <?php
                                                         }
                                                         elseif($dref['ser_priority_urg'] != 0)
                                                         {
                                                             
                                                         
                                                        ?>
                                                         <span>Urgent</span>
                                                         <?php
                                                         }
                                                         
                                                       
                                                         elseif($dref['ser_priority_2week'] != 0)
                                                         {
                                                             
                                                         
                                                        ?>
                                                         <span>2 Weeks</span>
                                                         <?php
                                                         }
                                                         ?>
                                                    </div> 
                                                    
                                                    <div class="col-md-6 mb-2"> 
                                                        <span class="font-weight-bold">Speciality</span>
                                                        <br>
                                                        <?php
														$serspec = $dref['service_speciality'];
														$sspecq = mysqli_query($con, "SELECT * FROM `ser_specialty_add` WHERE `spec_id` = '$serspec'");
															$serspecdata = mysqli_fetch_assoc($sspecq);
														?>
                                                        <span><?=$serspecdata['spec_name']?></span>
                                                    </div> 
                                                   
                                                    <?php
													if(isset($_GET['nhsno'])){
													$nhsno = $_GET['nhsno'];
													$qref = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` JOIN `tbl_patients` ON c_rfid = tbl_patients.pt_id JOIN `services` ON c_serid = services.service_id JOIN `tbl_ruser` ON tbl_ruser.ur_id = tbl_consultantrefferels.c_gpid WHERE c_nhsno = '$nhsno'");
													$dref = mysqli_fetch_assoc($qref);
														$refid = $dref['c_id'];
														
													}
													?>
													 <div class="col-md-6 mb-2"> 
                                                        <span class="font-weight-bold">Refer ID </span>
                                                        <br>
                                                        <span><?=$refid?></span>
                                                    </div>
													<input type="text" name="rfno" id="rfno" value="<?=$refid?>" hidden>
                                                    <div class="col-md-6 mb-2"> 
                                                        <span class="font-weight-bold">Referred By</span>
                                                        <br>
                                                        <span><?=$dref["ur_fname"]." ".$dref['ur_sname']?></span>
                                                    </div> 
                                                 <div class="col-md-6 mb-2"> 
                                                        <span class="font-weight-bold">Telephone: </span><br>
                                                        <span><?=$dref['pt_telno']?></span>
                                                    </div> 

                                                    <div class="col-md-12 mb-2"> 
                                                        <span class="font-weight-bold">Registered Practice</span>
                                                        <br>
                                                        <span><?=$dref["ur_address"]?></span>
                                                    </div> 
                                                 
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-12">
                                            <div>
                                                     
												 <div class="nk-block-head nk-block-head-lg wide-sm pb-0">
                                                    <?php
				    $q = $_GET["c_id"];

						$qref = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` WHERE c_id = '$q'");
						$dref = mysqli_fetch_assoc($qref);
						if($dref['request_type'] == "Advice request")
						{
						    
						
				    ?>
                                                    <h5 class="nk-block-title fw-normal col-form-label font-weight-bold"
                                                        style="font-size: 20px">Advice Conversation</h5>
                                                        <hr>
                                               
                                                        <?php
						}
						elseif($dref['request_type'] == "Appointment Request")
						{
						    
						
				     ?>
				     <h5 class="nk-block-title fw-normal col-form-label font-weight-bold"
                                                        style="font-size: 20px">Appointment Conversation</h5>
				     
				     <?php
						}
				     ?>
				     </div>
                                                  <div  class="py-2 bg-white px-1" style="border-radius:8px" >
                                                        <!-- phpcode.php -->
                                                    
                                                    <div id="fetchreply" class="px-3" style="height: 320px;overflow: hidden auto;">
                                                        <!-- phpcode.php -->
                                                    </div>
                                                    </div>
                                                    <br>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                  
                           
                                </div>
                          
                                
                                <div>
                                    
                                      <div class="float-left p-4 bg-light col-form-label font-weight-bold ml-0 mb-3 col-md-12 rounded">
                                          <p>Advice Status - <span class="text-info">Provider Response
                                                            Required</span>
                                                            </p></div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <form id="reply" enctype="multipart/form-data" class="col-md-12 ml-0 float-left w-100">
                                                    
                                                        <div class="row bg-light p-1 ml-0 w-100">
                                                            <div class="col-6">
                                                                <label class="col-form-label" for="">Add
                                                                    Attachement</label>
                                                                <span><input class="form-control" type="file"
                                                                        name="attachment"></span>
                                                            </div>
                                                            <div class="col-6">
                                                                <label class="col-form-label" for="">Add Web
                                                                    Link</label>
                                                                <input class="form-control" type="text" name="rid"
                                                                    hidden="true" value="<?=$rfno?>">
                                                                    <input class="form-control" type="text" name="coid"
                                                                    hidden="true" value="<?=$_GET["coid"]?>">
                                                                <span><input class="form-control" type="text"
                                                                        name="weblink"></span>
                                                            </div>
                                                            <div class="col-12 mt-1">
                                                                <textarea
                                                                    placeholder="Enter advice response detail here"
                                                                    class="form-control" name="cmntad" id="" cols="30"
                                                                    rows="3" required></textarea>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-sm btn-info my-3 ml-3">Send</button>
                                                        </div>
                                                    </form>
                                </div>
                                <!-- .components-preview -->
                            </div>
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
			include_once('footer.php');
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
$(document).ready(function(){
    updatecmntstatus();
})
function updatecmntstatus()
{
    var rfno = <?=$rfno?>;
    $.ajax({
        url: 'gpphpcode.php',
        type: 'post',
        data: {
            rfno:rfno,
            updatestatus: "btn"
        },
        success: function(response) {
          console.log(response);
        }
    });
}
function showpat()
{
	$('#modalname').modal('show');
}
// for fetch data reply
function fetchreplydata() {
    var rfno = $('#refno').val();
    $.ajax({
        url: 'gpphpcode.php',
        type: 'post',
        data: {
            rfno:rfno,
            fetchreplybtn: "btn"
        },
        success: function(response) {
            $('#fetchreply').html(response);
        }
    });
};
$(document).ready(function() {
    fetchreplydata();
});

$("#reply").on('submit', function(e) {
    e.preventDefault();

    var cmnt = $('#cmntad').val();

    if (cmnt != '') {

        var formdata = new FormData(this);
        formdata.append("cmntdatabtn", "btn");
        $.ajax({
            type: 'POST',
            url: 'gpphpcode.php',
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

                    toastr.clear();
                    NioApp.Toast("<h5>Request has been sent to the provider</h5>", 'success', {
                        position: 'top-right'
                    });
                    $('#reply').trigger('reset');
                    fetchreplydata();
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
</script>

</html>