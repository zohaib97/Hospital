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
												if(isset($_GET['nhsno'])){
													$nhsno = $_GET['nhsno'];
													$qref = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` JOIN `tbl_patients` ON c_rfid = tbl_patients.pt_id JOIN `services` ON c_serid = services.service_id JOIN `tbl_ruser` ON tbl_ruser.ur_id = tbl_consultantrefferels.c_gpid WHERE c_nhsno = '$nhsno'");
													$dref = mysqli_fetch_assoc($qref);
												}
											?>
                                            <nav class="p-2 bg-light mb-3 col-form-label font-weight-bold">Advice
                                                Request Details - <span class="text-info"><?=$dref['c_nhsno']?></span>
                                            </nav>
                                        </li>
                                    </ul>

                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <span class="col-form-label font-weight-bold"
                                                style="font-size: 15px; color: black">Summary Information</span>
                                            <hr>
                                            <div class="card p-3">
                                                <ul>


                                                    <li>
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
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <span class="font-weight-bold">Service Name</span>
                                                        <br>
                                                        <?php
														$sername = $dref['service_name'];
														$snq = mysqli_query($con, "SELECT * FROM `service_name` WHERE `s_id` = '$sername'");
															$serndata = mysqli_fetch_assoc($snq);
														?>
                                                        <span><?=$serndata['s_name'];?></span>
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <span class="font-weight-bold">Speciality</span>
                                                        <br>
                                                        <?php
														$serspec = $dref['service_speciality'];
														$sspecq = mysqli_query($con, "SELECT * FROM `ser_specialty_add` WHERE `spec_id` = '$serspec'");
															$serspecdata = mysqli_fetch_assoc($sspecq);
														?>
                                                        <span><?=$serspecdata['spec_name']?></span>
                                                    </li>
                                                    <br>
                                                    <?php
													if(isset($_GET['nhsno'])){
													$nhsno = $_GET['nhsno'];
													$qref = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` JOIN `tbl_patients` ON c_rfid = tbl_patients.pt_id JOIN `services` ON c_serid = services.service_id JOIN `tbl_ruser` ON tbl_ruser.ur_id = tbl_consultantrefferels.c_gpid WHERE c_nhsno = '$nhsno'");
													$dref = mysqli_fetch_assoc($qref);
														$refid = $dref['c_id'];
														echo"Refer ID : ".$refid;
													}
													?>
													<input type="text" name="rfno" id="rfno" value="<?=$refid?>" hidden>
                                                    <li>
                                                        <span class="font-weight-bold">Referred By</span>
                                                        <br>
                                                        <span><?=$dref["ur_fname"]." ".$dref['ur_sname']?></span>
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <span class="font-weight-bold">Registered Practice</span>
                                                        <br>
                                                        <span>Karachi
                                                            Sindh
                                                            Pakistan</span>
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <span class="font-weight-bold">Telephone: </span>
                                                        <span><?=$dref['pt_telno']?></span>
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
												<span class="text-dark">
												Name: <?=$fetch2['pt_name']." ".$fetch2["pt_surname"]?></span>
												
												<br>
												
												<span class="text-dark">
												Email: <?=$fetch2['pt_email']?>
												</span>
												<br>
                                                <div class="nk-block-head nk-block-head-lg wide-sm">
                                                    <h5 class="nk-block-title fw-normal col-form-label font-weight-bold"
                                                        style="font-size: 20px">Advice Conversation</h5>
                                                    <label for="" class="col-form-label">Comments</label>
                                                  
                                                   
                                                 
                                                 
                                                    <div id="fetchreply" style="height: 400px;overflow-y: scroll;">
                                                        <!-- phpcode.php -->
                                                    </div>
                                                    <br>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span
                                                        class="float-right p-2 bg-light w-100 col-form-label font-weight-bold ml-0">Advice
                                                        Status - <span class="text-info">Provider Response
                                                            Required</span></span>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <form id="reply" enctype="multipart/form-data">
                                                        <div class="row bg-light p-1 ml-0">
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
                                                                    hidden="true" value="<?=$refid?>">
                                                                <span><input class="form-control" type="text"
                                                                        name="weblink"></span>
                                                            </div>
                                                            <div class="col-12 mt-1">
                                                                <textarea
                                                                    placeholder="Enter advice response detail here"
                                                                    class="form-control" name="cmntad" id="" cols="30"
                                                                    rows="3"></textarea>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-sm btn-info my-3 ml-3">Send</button>
                                                        </div>
                                                    </form>
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
                                    <!-- nk-block -->
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
    <!-- Modal Form -->

    <!-- app-root @e -->
    <script src="assets/js/example-toastr.js?ver=2.2.0"></script>
</body>
<script>
function showpat()
{
	$('#modalname').modal('show');
}
// for fetch data reply
function fetchreplydata() {
	var rfno = $('#rfno').val();
    $.ajax({
        url: 'phpcode.php',
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

// for worklist

$("#worklist").on("change", function() {
    document.getElementById('btnshow').style.display = "block";
});

function workbltdata() {

    var work = $("#worklist").val();

    if (work == "Advice and Guidance Request") {
        document.getElementById('rdata').style.display = "block";
        document.getElementById('hideno').style.display = "none";
    }
    if (work !== 'Advice and Guidance Request')
        document.getElementById('rdata').style.display = "none";

};

function fetchrefferels() {
    $.ajax({
        type: "POST",
        url: "phpcode.php",
        data: {
            serrefferelfetch: "btn"
        },
        success: function(response) {
            $("#rdata").html(response);
            //alert(response);
        }

    });
}
$(document).ready(function() {
    fetchrefferels();
});

function show(id) {

    if ($('#' + id).prop("checked") == true) {
        var group = "input:checkbox[name='check']";
        $(group).prop("checked", false);
        $('#' + id).prop("checked", true);
        $('#attach').show();
        $('#refferelid').val(id);
    } else {
        $('#attach').hide();
    }
}

$("#attach").on('submit', function(e) {
    e.preventDefault();

    var formdata = new FormData(this);
    formdata.append("consultantdata", "btn");
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
                NioApp.Toast("<h5>Refferel didn't Send Successfully</h5>", 'error', {
                    position: 'top-right'
                });
            } else if (data == 'Success') {
                $('#attach')[0].reset();
                toastr.clear();
                NioApp.Toast("<h5>Refferel Sent Successfully</h5>", 'success', {
                    position: 'top-right'
                });


            }

            $('#attach').css("opacity", "");
            $("#rsubmit").removeAttr("disabled");
        }

    });

});

$("#reply").on('submit', function(e) {
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

                    toastr.clear();
                    NioApp.Toast("<h5>Message Sent</h5>", 'success', {
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