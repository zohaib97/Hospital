<?php 

include_once('database/db.php');
?>

<section class="">
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
  <div id="regmodal" class="container position-relative p-0 mt-90" style="max-width: 700px;" >
    <h3 class="bg-theme-colored1 p-15 mb-0 text-white">Registration Form</h3>
    <div class="section-content bg-white p-30">
      <div class="row">
        <div class="col-md-12">
          <!-- Reservation Form Start-->
			
          <form id="register_popup" name="appointment_form" class="appointment-form" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group mb-30">
                  <input placeholder="Enter First Name" id="u_fname" type="text" name="form_fname" class="form-control required">
                </div>
              </div>
			  <div class="col-sm-6">
                <div class="form-group mb-30">
                  <input placeholder="Enter Last Name" id="u_sname" type="text" name="form_sname" class="form-control required">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group mb-30">
                  <input placeholder="Email" type="email" id="u_email" name="form_email" class="form-control required">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group mb-30">
                  <input placeholder="Phone" type="number" id="u_phn" name="form_phone" class="form-control required">
                </div>
              </div>
			  <div class="col-sm-6">
                <div class="form-group mb-30">
<!--                  <input name="form_org" class="form-control required" id="u_org" type="text" placeholder="Organization">-->
					<select name="form_org" id="u_org" class="form-control required">
						<option>- Select Organization -</option>
						<?php 
						$hq = mysqli_query($con, "SELECT * FROM `hospitals`");
						while($hdata = mysqli_fetch_assoc($hq)){
						?>
							<option value="<?=$hdata['hid']?>"><?=$hdata['h_name']?></option>
						<?php
						}
						?>
					</select>
                </div>
              </div>
			  <div class="col-sm-6">
                <div class="form-group mb-30">
                  <input name="form_work" class="form-control required" id="u_work" type="text" placeholder="Work">
                </div>
              </div>
			  <div class="col-sm-6">
                <div class="form-group mb-30">
                  <input name="form_pass" class="form-control required" id="u_pass" type="password" placeholder="Password">
					<span toggle="#u_pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
              </div>					
			  <div class="col-sm-6">
                <div class="form-group mb-30">
                  <input name="form_cpass" class="form-control required" id="u_cpass" type="password" placeholder="Confirm Password">
					<span toggle="#u_cpass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
              </div>
			  <div class="col-sm-6">
                <div class="form-group mb-30">
					<div class="input-group">
						<input name="form_facility" id="u_faci" class="form-control" type="text" list="browser" placeholder="Search Facility" autocomplete="off">
						<datalist id="browser">
							<option value="Dummy Text">
							<option value="Dummy Text">
							<option value="Dummy Text">
							<option value="Dummy Text">
							<option value="Dummy Text">
							<option value="Dummy Text">
						</datalist>
					</div>
                </div>
              </div>
				<div class="col-sm-6">
                <div class="form-group mb-30">
						<select id="role" name="role" class="form-control required">
							<option>- Select Your Role -</option>
								<?php
									$roleq = mysqli_query($con, "SELECT * FROM `tbl_role`");
								while($datarole = mysqli_fetch_assoc($roleq)){
									?>
							<option value="<?=$datarole['ro_id']?>"><?=$datarole['ro_role']?></option>
								<?php
								}
								?>
						</select>
                </div>
              </div>
				<div class="col-sm-6">
                <div class="form-group mb-30">
                  <input placeholder="Enter NHS Number" id="nhs_num" type="text" name="nhs_num" class="form-control required">
                </div>
              </div>
				
				<div class="col-sm-6"></div>
		<div class="col-md-12">
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="flexCheckDefault">
			  <label href="#" class="form-check-label" for="flexCheckDefault">
				Accept our <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalScrollable" onClick="clodelogmodal()">Privacy Policy</a>
			  </label>
			</div>
		</div>
				
<!--
			  <div class="col-sm-6">
                <div class="form-group mb-30">
                  <input name="form_pass" class="form-control required" id="u_pass" type="password" placeholder="Password">
                </div>
              </div>
-->
				<br><br>
              <div class="col-sm-12">
                <div class="form-group mb-0 mt-0">
                  <button type="submit" class="btn btn-theme-colored1 btn-round" name="form_btn" id="regis" data-loading-text="Please wait...">Register Now</button>
                </div>
              </div>
            </div>
          </form>
			<!-- Modal -->
			
          <!-- Reservation Form End-->

          <!-- Reservation Form Validation Start-->
          <script>
            (function($) {
              $("#register_popup").validate({
                submitHandler: function(form) {
                  var form_btn = $(form).find('button[type="submit"]');
                  var form_result_div = '#form-result';
                  $(form_result_div).remove();
                  form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                  var form_btn_old_msg = form_btn.html();
                  $(form).ajaxSubmit({
                    dataType:  'json',
                    success: function(data) {
                      if( data.status == 'true' ) {
                        $(form).find('.form-control').val('');
                      }form_btn.prop('disabled', false).html(form_btn_old_msg);
                      $(form_result_div).html(data.message).fadeIn('slow');
						setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
						}
                  });
                }
              });
				})(jQuery);
          </script>
          <!-- Reservation Form Validation Start -->
        </div>
      </div>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close mt-10">×</button>
  </div>
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
                      <button type="button" class="btn btn-secondary btn-round btn-sm" data-dismiss="modal" onClick="showmodal()">Close</button>
                      <button type="button" class="btn btn-theme-colored1 btn-round btn-sm" onClick="showmodal()">I have Read</button>
                    </div>
                  </div>
                </div>
              </div>
</section>

<!-- Footer Scripts -->
<script>
  //reload date and time picker
  THEMEMASCOT.initialize.TM_datePicker();
	function clodelogmodal(){
	$("#regmodal").hide();
}
function showmodal(){
	$("#regmodal").show();
	$("#exampleModalScrollable").modal('hide');
}	
	$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<script src="ajax-load/register_ajax.js"></script>
