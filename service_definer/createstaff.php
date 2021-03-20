<?php
include_once('connect.php');
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
                                       <h2 class="nk-block-title fw-normal">Service Definer</h2>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                        
                                        <div class="card">
                                            <div class="card-inner">
                                                
                                                <form method="post" id="servicedef" enctype="multipart/form-data">
                                                    <div class="row g-4">
														<div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">
																<sup class="text-danger">* </sup>Service Name</label>
																<span class="nk-menu-icon ml-2"><a href="javascript:void(0)" onClick="openmodalname()"><em class="icon ni ni-plus"></em></a></span>
                                                                <div class="form-control-wrap">
																	<select name="ser_name" id="ser_name" class="form-control">
																		<option value="">-Select-</option>
																			<?php 
																			$role = mysqli_query($con, "SELECT * FROM `service_name`");
																			while($datarole = mysqli_fetch_assoc($role)){
																			?>
																			<option value="<?=$datarole['s_name']?>"><?=$datarole['s_name']?></option>
																			<?php
																			}
																			?>
																	</select>
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">
																<sup class="text-danger">* </sup>Email</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control" id="ser_email" name="ser_email">
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">Request Type Support</label>
                                                                <div class="form-control-wrap">
																	<div class="row mt-2">
																		<div class="col-lg-4 col-4">
																			<span class="ml-5"><input type="radio" class="requesttype" id="ser_reqt" name="ser_reqt" value="Appointment Request, "> Appointment Request</span>
																		</div>
																		<div class="col-lg-4 col-4">
																			<span><input type="radio" class="requesttype" id="ser_reqt" name="ser_reqt" value="Advice Request, "> Advice Request</span>
																		</div>
																		<div class="col-lg-4 col-4">
																			<span><input type="radio" class="requesttype" id="ser_reqt" name="ser_reqt" value="Triage Request"> Triage Request</span>
																		</div>
																	</div>
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">Service Comments</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control form-control-sm" id="ser_cmnts" placeholder="Write your message" name="ser_cmnts"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">Refer Alert</label>
																<div class="row">
																		<div class="col-lg-2 col-2 mt-5">
																			<span class="ml-5"><input type="checkbox" id="ser_refer" name="ser_refer"> Show</span>
																		</div>
																		<div class="col-lg-10 col-10">
																			<span><textarea class="form-control form-control-sm" id="ser_show" readonly placeholder="Write your message" name="ser_show"></textarea></span>
																		</div>
																	</div>
                                                            </div>
                                                        </div>
														<div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1"><sup class="text-danger">* </sup>Service Location</label>
																<span class="nk-menu-icon ml-2"><a href="javascript:void(0)" onClick="openloc()"><em class="icon ni ni-plus"></em></a></span>
                                                                <div class="form-control-wrap">
<!--                                                                    <input type="text" class="form-control" id="ser_location" name="ser_location">-->
																	<select name="ser_location" id="ser_location" class="form-control">
																		<option value="">-Select-</option>
																			<?php 
																			$role = mysqli_query($con, "SELECT * FROM `service_location`");
																			while($datarole = mysqli_fetch_assoc($role)){
																			?>
																			<option value="<?=$datarole['lo_location']?>"><?=$datarole['lo_location']?></option>
																			<?php
																			}
																			?>
																	</select>
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1"><sup class="text-danger">* </sup>Specialty</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="ser_specialty" name="ser_specialty">
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">Appointment Type</label>
																<span class="nk-menu-icon ml-2"><a href="javascript:void(0)" onClick="openmodal1()"><em class="icon ni ni-plus"></em></a></span>
                                                                <div class="form-control-wrap">
																	<select name="ser_apptype" id="ser_apptype" class="form-control">
																		<option value="Dummy Text">- Select -</option>
																		<?php 
																			$role = mysqli_query($con, "SELECT * FROM `app_type`");
																			while($datarole = mysqli_fetch_assoc($role)){
																			?>
																			<option value="<?=$datarole['app_type']?>"><?=$datarole['app_type']?></option>
																			<?php
																			}
																			?>
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
																		<option value="Male">Male</option>
																		<option value="Female">Female</option>
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
																		<option value="Dummy Text">Dummy Text</option>
																		<option value="Dummy Text">Dummy Text</option>
																	</select>
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1"><sup class="text-danger">* </sup>Service Effective Date Range</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control date-picker" id="ser_effect" name="ser_effect" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-lg-4"></div>
														<div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label class="form-label mt-3" for="full-name-1"></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control date-picker" id="ser_effect2" name="ser_effect2" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">Service Transition Date</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control date-picker" id="ser_tdate" name="ser_tdate" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">Age Range Treated</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="ser_ager" name="ser_ager" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-lg-2 mt-4"><center>to</center></div>
														<div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">Age Range Treated</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="ser_ager2" name="ser_ager2" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-lg-2 mt-4"><center>Inclusive</center></div>
														<div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">Publish</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="checkbox" class="ml-4" id="ser_pub" name="ser_pub">
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">Include Service on Secondary Care Menu</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control date-picker" id="ser_carem" name="ser_carem" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">Password</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="ser_pass" name="ser_pass" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
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
                            <button type="submit" class="btn btn-lg btn-primary" id="adminupdate">Save</button>
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
                            <button type="submit" class="btn btn-lg btn-primary" id="adminupdate">Save</button>
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
                            <button type="submit" class="btn btn-lg btn-primary" id="adminupdate">Save</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                </div>
            </div>
        </div>
    </div>
	
	
</body>

</html>
<script>
	// for service location
	function openloc() {		
        $('#serloc').modal('show');
    };
	// for service name
	function openmodalname() {		
        $('#modalname').modal('show');
    };
	// for appointment
	 function openmodal1() {		
        $('#modalForm2').modal('show');
    };
	
	// for service location
	
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
	
	// for service name
	
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
	
	// for appointment
	
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
	
	
$("#servicedef").on('submit', function(e){
        e.preventDefault();
	
		var ser_name = $('#ser_name').val();
		var ser_em =$('#ser_email').val();
		var ser_cmnt = $('#ser_cmnts').val();
		var ser_loc = $('#ser_location').val();
		var ser_spec = $('#ser_specialty').val();
		var ser_app = $('#ser_apptype').val();
		var ser_gen = $('#ser_gen').val();
		var ser_dir = $('#ser_direct').val();
		var ser_eff = $('#ser_effect').val();
		var ser_eff2 = $('#ser_effect2').val();
		var ser_tdate = $('#ser_tdate').val();
		var ser_ager = $('#ser_ager').val();
		var ser_ager2 = $('#ser_ager2').val();
		var ser_care = $('#ser_carem').val();
		var ser_pass = $('#ser_pass').val();
		var reqtype = [];
	
		// for request type
//		$(".requesttype").each(function(){
//			if($(this).is(":checked")){
//				reqtype.push($(this).val());
//			}
//		});
//			reqtype = reqtype.toString();		
		
	if(ser_name != '' && ser_em != '' && ser_cmnt != '' && ser_loc != '' && ser_spec != '' && ser_app != '' && ser_gen != '' && ser_dir != '' && ser_eff != '' && ser_eff2 != '' && ser_tdate != '' && ser_ager != '' && ser_ager2 != '' && ser_care != ''){
		
		var formdata = new FormData(this);
		formdata.append("servicadd","btn");

        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            cache: false,
            processData:false,
//            beforeSend: function(){
//                $('#privacysubmit').attr("disabled","disabled");
//                $('#privacyadd').css("opacity",".5");
//            },
            success: function(data){
      
                if(data == 'Erroryu'){
             toastr.clear();
    		NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
                }
				else if(data == 'Successapps'){
					$('#servicedef')[0].reset();
//					$('#servicedef').trigger('reset');
					toastr.clear();
    				NioApp.Toast("<h5>Service Definer Added</h5>", 'success',{position:'top-right'});
					document.getElementById('ser_name').style.borderColor = "#28a745";
					document.getElementById('ser_email').style.borderColor = "#28a745";
					document.getElementById('ser_cmnts').style.borderColor = "#28a745";
					document.getElementById('ser_location').style.borderColor = "#28a745";
					document.getElementById('ser_specialty').style.borderColor = "#28a745";
					document.getElementById('ser_apptype').style.borderColor = "#28a745";
					document.getElementById('ser_direct').style.borderColor = "#28a745";
					document.getElementById('ser_effect').style.borderColor = "#28a745";
					document.getElementById('ser_effect2').style.borderColor = "#28a745";
					document.getElementById('ser_tdate').style.borderColor = "#28a745";
					document.getElementById('ser_ager').style.borderColor = "#28a745";
					document.getElementById('ser_ager2').style.borderColor = "#28a745";
					document.getElementById('ser_carem').style.borderColor = "#28a745";
					document.getElementById('ser_pass').style.borderColor = "#28a745";
					document.getElementById('ser_gen').style.borderColor = "#28a745";
                }
			
//                $('#privacyadd').css("opacity","");
//                $("#privacysubmit").removeAttr("disabled");
            }
        });
	}else {
		toastr.clear();
		NioApp.Toast("<h5>All Fields are required</h5>", 'error',{position:'top-right'});
			document.getElementById('ser_name').style.borderColor = "red";
			document.getElementById('ser_email').style.borderColor = "red";
			document.getElementById('ser_cmnts').style.borderColor = "red";
			document.getElementById('ser_location').style.borderColor = "red";
			document.getElementById('ser_specialty').style.borderColor = "red";
			document.getElementById('ser_apptype').style.borderColor = "red";
			document.getElementById('ser_direct').style.borderColor = "red";
			document.getElementById('ser_effect').style.borderColor = "red";
			document.getElementById('ser_effect2').style.borderColor = "red";
			document.getElementById('ser_tdate').style.borderColor = "red";
			document.getElementById('ser_ager').style.borderColor = "red";
			document.getElementById('ser_ager2').style.borderColor = "red";
			document.getElementById('ser_carem').style.borderColor = "red";
			document.getElementById('ser_pass').style.borderColor = "red";
			document.getElementById('ser_gen').style.borderColor = "red";			
	}
    });
		
//			$("#ser_refer").each(function(){
//			if($(this).is(":checked")){
//				alert("hello");
//			}
//		});
	$("input:checkbox[name='ser_refer']").on('change',function(){
	$("input:checkbox[name='ser_refer']:checked").each(function(){
//		alert("hello");
		if($("#ser_refer").prop('checked') == false){
			$('#ser_show').attr("readonly",true);
		}
		else{
			$('#ser_show').attr("readonly",false);
		}
		});
	});
</script>