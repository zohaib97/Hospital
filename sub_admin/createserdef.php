<?php

include_once('../database/db.php');

?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php
	include_once('header.php');
	?>

<body class="nk-body bg-lighter npc-default has-sidebar ">
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
										<h2 class="nk-block-title fw-normal">Create Service Definer</h2>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                       <div class="card p-5">
										   <form method="post" id="servicedef" enctype="multipart/form-data">
											<div class="row gy-4">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="rno">Name</label>
														<input type="text" class="form-control form-control-lg" id="sername" placeholder="Name" name="sername" autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="rno">Email</label>
														<input type="email" class="form-control form-control-lg" id="seremail" placeholder="e.g: yourname@domain.com" name="seremail" autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="rno">Password</label>
														<input type="password" class="form-control form-control-lg" id="serpass" placeholder="Password" name="serpass" autocomplete="off">
														<span toggle="#serpass" class="ni ni-eye toggle-password field-icon"></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="rno">Confirm Password</label>
														<input type="password" class="form-control form-control-lg" id="sercpass" placeholder="Confirm Password" name="sercpass" autocomplete="off">
														<span toggle="#sercpass" class="ni ni-eye toggle-password field-icon"></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="rno">Contact</label>
														<input type="number" class="form-control form-control-lg" id="sercontact" placeholder="Contact" name="sercontact" autocomplete="off">
													</div>
												</div>
												
												<div class="col-md-12" id="regishide">
													<div class="form-group">
														<input class="btn btn-lg btn-primary" type="submit" value="Save" id="addrefferel">
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
	
	$("#servicedef").on('submit', function(e){
        	e.preventDefault();
		
		var sdname = $('#sername').val();
		var sdemail = $('#seremail').val();
		var sdpass = $('#serpass').val();
		var sdcpass = $('#sercpass').val();
		var sdcont = $('#sercontact').val();
		
		if(sdname != '' && sdemail != '' && sdpass != '' && sdcpass != '' && sdcont != ''){
			
			if(sdpass == sdcpass){
				
				var serdefform = new FormData(this);
				serdefform.append("serdefbtn","btn");
				
				$.ajax({
					type: 'POST',
					url: 'phpcode.php',
					data: serdefform,
					contentType: false,
					processData: false,
					success: function(data){
						if(data == "emalready"){
							toastr.clear();
					NioApp.Toast("<h5>E-mail Already Exist</h5>", 'error',{position:'top-right'});
							document.getElementById('seremail').style.borderColor = "red";
						}else if(data == "serero"){
							toastr.clear();
					NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
						}else {
							toastr.clear();
					NioApp.Toast("<h5>Service Definer Added Successfully!</h5>", 'success',{position:'top-right'});
						document.getElementById('sername').style.borderColor = "#28a745";
						document.getElementById('seremail').style.borderColor = "#28a745";
						document.getElementById('serpass').style.borderColor = "#28a745";
						document.getElementById('sercpass').style.borderColor = "#28a745";
						document.getElementById('sercontact').style.borderColor = "#28a745";
							$('#servicedef').trigger('reset');
							setInterval(function(){ window.location.href="consultant.php?role=ServiceDefiner"; }, 3000);
						}
					}
				});
				
			}else {
				toastr.clear();
		NioApp.Toast("<h5>Both password are not match!</h5>", 'error',{position:'top-right'});
			document.getElementById('serpass').style.borderColor = "red";
			document.getElementById('sercpass').style.borderColor = "red";
			}
			
		}else {
			toastr.clear();
		NioApp.Toast("<h5>All Fields are required</h5>", 'error',{position:'top-right'});
			document.getElementById('sername').style.borderColor = "red";
			document.getElementById('seremail').style.borderColor = "red";
			document.getElementById('serpass').style.borderColor = "red";
			document.getElementById('sercpass').style.borderColor = "red";
			document.getElementById('sercontact').style.borderColor = "red";
		}
		
    });
	$(".toggle-password").click(function() {

  $(this).toggleClass("ni-eye-off");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
	</script>
</html>
<script>
	
</script>
