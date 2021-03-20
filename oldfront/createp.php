<?php
include_once('headerlink.php');
include_once('headernav.php');
?>
<div class="main-content-area">
	
    <!-- Section: page title -->
    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg1.jpg">
      <div class="container pt-50 pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Manage Profile</h2>
              <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                <div class="breadcrumbs">
                  <span><a href="#" rel="home">Home</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span><a href="#">Pages</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">Page Title</span>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="border-1px p-25">
				
				<div class="row">
					<div class="col-4">
<!--					for Manager	-->
					<div class="form-group tm-sc-button mb-0 mt-20">
						<button onClick="hidemanger()" type="submit" class="btn btn-theme-colored1 btn-sm" data-loading-text="Please wait...">Manger</button>
					</div>
					</div>
					<div class="col-4">
<!--					for Clinician-->
					<div class="form-group tm-sc-button mb-0 mt-20">
						<button onClick="hidecli()" type="submit" class="btn btn-theme-colored1 btn-sm" data-loading-text="Please wait...">Clinician</button>
					</div>
					</div>
				</div>
				<br>
<!--				for Clinician-->
				<div id="clinicianshow"  style="display: none">
				<h4 class="text-theme-colored1 text-uppercase m-0">Clinician</h4>
              <div class="line-bottom mb-30"></div>
              <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
              <form id="form_clinician" name="appointment_form" class="mt-30" method="post">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input name="c_name" id="c_name" class="form-control required" type="text" placeholder="Enter Name" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input name="c_email" id="c_email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input name="c_phn" id="c_phn" class="form-control required" type="text" placeholder="Enter Phone" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input name="c_date" id="c_date" class="form-control required date-picker" type="text" placeholder="Appoinment Date" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input name="c_time" id="c_time" class="form-control required time-picker" type="text" placeholder="Appoinment Time" aria-required="true">
                    </div>
                  </div>
                </div>
                <div class="form-group mb-10">
                  <textarea name="c_add" id="c_add" class="form-control required"  placeholder="Enter Message" rows="5" aria-required="true"></textarea>
                </div>
                <div class="form-group tm-sc-button mb-0 mt-20">
<!--                  <input name="form_botcheck" class="form-control" type="hidden" value="">-->
                <button type="submit" class="btn btn-theme-colored1 btn-sm" data-loading-text="Please wait..."> Submit </button>
                </div>
              </form>
			  </div>
				
				<!-- Appointment Form Validation-->
              <script>
                (function($) {
                  $("#form_clinician").validate({
                    submitHandler: function(form) {
                      var form_btn = $(form).find('button[type="submit"]');
                      var form_result_div = '#form-result';
                      $(form_result_div).remove();
                      form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                      var form_btn_old_msg = form_btn.html();
                      form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                      $(form).ajaxSubmit({
                        dataType:  'json',
                        success: function(data) {
                          if( data.status === 'true' ) {
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
				
<!--			for Manager-->
              <div id="managershow">
				<h4 class="text-theme-colored1 text-uppercase m-0">Manager</h4>
              <div class="line-bottom mb-30"></div>
              <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
              <form id="form_manager" name="appointment_form" class="mt-30" method="post">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input name="form_name" class="form-control" type="text" placeholder="Enter Name" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input name="form_email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input name="form_phone" class="form-control required" type="text" placeholder="Enter Phone" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input name="form_appontment_date" class="form-control required date-picker" type="text" placeholder="Appoinment Date" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input name="form_appontment_time" class="form-control required time-picker" type="text" placeholder="Appoinment Time" aria-required="true">
                    </div>
                  </div>
					<div class="col-sm-12">
                    <div class="form-group mb-10">
<!--                      <input name="c_hosp" id="c_hosp" class="form-control required" type="text" placeholder="Appoinment Time" aria-required="true">-->
						<select name="c_hosp" id="c_hosp" class="form-control required">
							<option value="">--Select Hospital--</option>
							<option value="Agha Khan">Agha Khan</option>
							<option value="Jinnah">Jinnah</option>
							<option value="Indus">Indus</option>
							<option value="Liaqat Ali Khan">Liaqat Ali Khan</option>
						</select>
                    </div>
                  </div>
                </div>
                <div class="form-group mb-10">
                  <textarea name="form_message" class="form-control required"  placeholder="Enter Message" rows="5" aria-required="true"></textarea>
                </div>
                <div class="form-group tm-sc-button mb-0 mt-20">
<!--                  <input name="form_botcheck" class="form-control" type="hidden" value="">-->
                <button type="submit" class="btn btn-theme-colored1 btn-sm"> Submit </button>
                </div>
              </form>
			  </div>
				
              <!-- Appointment Form Validation-->
              <script>
                (function($) {
                  $("#form_manager").validate({
                    submitHandler: function(form) {
                      var form_btn = $(form).find('button[type="submit"]');
                      var form_result_div = '#form-result';
                      $(form_result_div).remove();
                      form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                      var form_btn_old_msg = form_btn.html();
                      form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                      $(form).ajaxSubmit({
                        dataType:  'json',
                        success: function(data) {
                          if( data.status === 'true' ) {
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
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php 
include_once('footer.php');
?>

<script>

	function hidemanger(){
		$('#clinicianshow').hide(500);
		$('#managershow').show(700);
	}
	function hidecli(){
		$('#managershow').hide(500);
		$('#clinicianshow').show(700);
	}

</script>
<script src="ajax-load/register_ajax.js"></script>