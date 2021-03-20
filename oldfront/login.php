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
  <div id="hidemodal" class="container position-relative p-0 mt-90" style="max-width: 700px;">
    <h3 class="bg-theme-colored1 p-15 mb-0 text-white">Login Form</h3>
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
						<span toggle="#u_pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					</div>
				  </div>
					
				</div>
				<div class="col-sm-2"></div>
              <div class="col-sm-12">
                <div class="form-group mb-0 mt-0">
                  <button type="submit" class="btn btn-theme-colored1 btn-round" data-loading-text="Please wait...">Login</button>
					<a href="#" onClick="clodelogmodal()" class="btn float-right" data-toggle="modal" data-target="#exampleModal">Forgot Password</a>
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
			  
			  (function($) {
              $("#forgot_popup").validate({
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
	<style>
	.theme--light.v-application {
    background: none;
    color: rgba(0,0,0,.87);
	height: 30px;
/*		margin-top: 5px;*/
}		
/*
		.v-card--loading{
			width: 100%;
		}
*/
		.v-application--wrap{
			margin-top: -21px;
		}
		.v-progress-linear {
			height: 20%;
			background: black;
		}
/*
		.v-sheet--shaped{
   			 max-width: 100%;
		}
*/
	</style>
	<!--Modal For Forgot Password-->
	
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				  <div id="app" style="display: none">
						<v-app>
						  <v-main>
						  <template>
						  <v-card
							:loading="loading"
							class="mx-auto my-12"
							max-width="374"
							loading
						  outlined
						  shaped
						  >
							<v-divider class="mx-4"></v-divider>
						  </v-card>
						</template>	  
					  </v-main>
					</v-app>
				  </div>
				<div class="modal-content">
				  <div class="modal-header" style="background-color: #fc6a20 !important">
					<h5 style="color: white; font-size: 30px;" id="exampleModalLabel">Forgot Password</h5>
					<button onClick="showmodal()" type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
										
				  <div class="modal-body">
					<form id="forgot_popup" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12">
							  <div class="col-sm-12">
								<div class="form-group mb-30">
									<label class="col-form-label">Email</label>
									&nbsp;&nbsp;&nbsp;<i class="fa fa-question-circle" aria-hidden="true" title="Provide your Email where we will send a password recovry link"></i>
								  <input placeholder="Email" id="f_email" type="email" name="fo_email" class="form-control required">
								</div>
							  </div>
							</div>
						  <div class="col-sm-12">
							<div class="form-group mb-0 mt-0">
							  <button onClick="progres()" id="mailsendbtn" type="submit" class="btn btn-theme-colored1 btn-round" data-loading-text="Please wait...">Send</button>
							</div>
						  </div>
						</div>
					  </form>
				  </div>
					
<!--
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Send message</button>
				  </div>
-->
				</div>
			  </div>
			</div>
</section>

<!-- Footer Scripts -->

<script>
  //reload date and time picker
  THEMEMASCOT.initialize.TM_datePicker();
</script>
<script src="ajax-load/register_ajax.js"></script>


<!--modal for forgot pssword-->
<script>
	$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>

<!--for hide and show login modal-->
<script>
function clodelogmodal(){
	$("#hidemodal").hide();
}
function showmodal(){
	$("#hidemodal").show();
}
</script>

<!--for vuetify-->
<script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
    })
  </script>
<script>
//  export default {}
	
	function chalo(){
			$('#app').show();
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