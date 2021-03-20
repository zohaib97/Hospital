<section class="">
  <div class="container position-relative p-0 mt-90" style="max-width: 700px;">
    <h3 class="bg-theme-colored1 p-15 mb-0 text-white">Forgot Password</h3>
    <div class="section-content bg-white p-30">
      <div class="row">
        <div class="col-md-12">
          <!-- Reservation Form Start-->
			
          <form id="login_popup" name="appointment_form" class="appointment-form" method="post" enctype="multipart/form-data">
            <div class="row">
				<div class="col-sm-2"></div>
             	<div class="col-sm-8">
					
				  <div class="col-sm-12">
					<div class="form-group mb-30">
						<label class="col-form-label">Email</label>
					  <input placeholder="Email" id="u_em" type="text" name="log_email" class="form-control required">
					</div>
				  </div>
				  <div class="col-sm-12">
					<div class="form-group mb-30">
						<label class="col-form-label">Password</label>
					  <input placeholder="Password" id="u_pass" type="password" name="log_password" class="form-control required">
					</div>
				  </div>
					
				</div>
				<div class="col-sm-2"></div>
              <div class="col-sm-12">
                <div class="form-group mb-0 mt-0">
                  <button type="submit" class="btn btn-theme-colored1 btn-round" data-loading-text="Please wait...">Login</button>
										
                </div>
              </div>
            </div>
          </form>
			
          <!-- Reservation Form End-->

          <!-- Reservation Form Validation Start-->
          <script>
            (function($) {
              $("#login_popup").validate({
                submitHandler: function(form) {
                  var form_btn = $(form).find('button[type="submit"]');
                  var form_result_div = '#form-result';
                  $(form_result_div).remove();
                  form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                  var form_btn_old_msg = form_btn.html();
//                  form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                  $(form).ajaxSubmit({
                    dataType:  'json',
                    success: function(data) {
                      if( data.status == 'true' ) {
                        $(form).find('.form-control').val('');
                      }
                      form_btn.prop('disabled', false).html(form_btn_old_msg);
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
</section>

<!-- Footer Scripts -->
<script>
  //reload date and time picker
  THEMEMASCOT.initialize.TM_datePicker();
</script>
<script src="ajax-load/register_ajax.js"></script>