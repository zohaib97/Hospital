<?php
	include_once('database/db.php');
	?>

<!DOCTYPE html>
<html lang="zxx">
<?php
	include_once('header.php');
	?>
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
<body>

	<!-- START PRELOADER -->
	<div id="page-preloader">
		<div class="preloader-wrench"></div>
	</div>
	<!-- END PRELOADER --> 
	
	<!-- START HEADER SECTION -->
    <?php
	include_once('headernav.php');
	?>
	<!-- END HEADER SECTION -->
	
	<!-- START PAGE BANNER AND BREADCRUMBS -->
	<section class="single-page-title-area" data-background="assets/img/bg/heading.png">
		<div class="auto-container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-12">
					<div class="single-page-title">
						<h2>Login</h2>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="#"><span class="lnr lnr-home"></span></a></li>
					  <li class="breadcrumb-item">Pages</li>
					  <li class="breadcrumb-item active">Login</li>
					</ol>
				</div>
			</div>
			<!-- end row-->
		</div>
	</section>
	<!-- END PAGE BANNER AND BREADCRUMBS -->
	
	
	<!-- START APPOINTMENT SECTION -->
    <section id="appointment" class="mt-5 pt-5">
        <div class="auto-container">
    <!--        <div class="row">-->
				<!--<div class="col-lg-8 text-center mx-auto">-->
    <!--                <div class="section-title">-->
    <!--                    <h3>Login <span>Here</span></h3>-->
    <!--                    <span class="line"></span>-->
    <!--                </div>-->
				<!--</div>-->
				 <!--end section title -->
			<!--</div>-->
			
            <div class="row mt-5">
				<div class="col-lg-8 mx-auto">
                    <div class="appointment-form-ma">
                        <form method="post" id="login_popup">
                            <div class="row">
							  
							  
							 
							
							
							  <div class="form-group col-lg-6 mt-2">
								 <input type="email" class="form-control" id="u_em" placeholder="Your Email" name="log_email" autocomplete="off">
							  </div>
							  <div class="form-group col-lg-6 mt-2">
								 <input type="password" class="form-control" id="u_pass" placeholder="Password" name="log_password" autocomplete="off"> 
								 <span toggle="#u_pass" class="far fa-eye-slash  toggle-password field-icon"></span>

							  </div>
							  <a href="#" onClick="clodelogmodal()" class="btn float-right" data-toggle="modal" data-target="#exampleModal">Forgot Password</a>
							  <div class="form-group col-lg-12">
								 <button type="submit" class="btn btn-apfm">Login <i class="icofont icofont-thin-right"></i></button>
							  </div>
                            </div>
                        </form>
                    </div>
                </div>
                 <!--end col -->
			</div>
        </div>
        <!--- END CONTAINER -->
    </section>
    <!-- END APPOINTMENT SECTION -->
	
	
	<!-- START APPOINTMENT INFO -->
    <section class="appointment-section section-padding bg-gray">
        <div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 d-lg-block d-md-block d-sm-none d-none">
					<div class="appointment-image">
						<img src="assets/img/bg/single-doc3.png" alt="">
					</div>
				</div>
				<!-- end col -->
				<div class="col-lg-9 col-md-9 col-sm-12 col-12">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 pr-5">
							<h4>Lorem ipsum dolor</h4>
							<p>Pellentesque habitant morbi tristique senectus et netus et.</p>
							<div class="single-quote">
								<i class="icofont icofont-xray"></i>
								<h5>INTERNATIONAL PATIENTS</h5>
								<p>Lorem ipsum dolor consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
							</div>
							<div class="single-quote">
								<i class="icofont icofont-ui-network"></i>
								<h5>VIRTUAL TOUR</h5>
								<p>Lorem ipsum dolor consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
							</div>
						</div>
						<!-- end col -->
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 pr-5">
							<h4>Lorem ipsum dolor</h4>
							<p>Pellentesque habitant morbi tristique senectus et netus et.</p>
							<div class="single-quote">
								<i class="icofont icofont-laboratory"></i>
								<h5>ACCESS LABREPORTS</h5>
								<p>Lorem ipsum dolor consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
							</div>
							<div class="single-quote">
								<i class="icofont icofont-briefcase-alt-2"></i>
								<h5>BOASTER PACKAGE</h5>
								<p>Lorem ipsum dolor consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
							</div>
						</div>
						<!-- end col -->		
					</div>
				</div>
				<!-- end col -->	
			</div>
        </div>
        <!--- END CONTAINER -->
    </section>
    <!-- END APPOINTMENT INFO -->
	<!--Modal For Forgot Password-->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header" style="background-color: #034ea2 !important">
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
							  <button id="mailsendbtn" type="submit" class="btn btn-theme-colored1 btn-round btn-apfm" data-loading-text="Please wait...">Send</button>
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
	
    <!-- START FOOTER -->
    <?php
	include_once('footer.php');
	?>
    <!-- END FOOTER -->
	
	
  
	
	
</body>
<script src="ajax-load/register_ajax.js"></script>
<script>
//     (function($) {
//               $("#forgot_popup").validate({
//                 submitHandler: function(form) {
//                   var form_btn = $(form).find('button[type="submit"]');
//                   var form_result_div = '#form-result';
//                   $(form_result_div).remove();
//                   form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
//                   var form_btn_old_msg = form_btn.html();
// //                  form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
//                   $(form).ajaxSubmit({
//                     dataType:  'json',
//                     success: function(data) {
//                       if( data.status == 'true' ) {
//                         $(form).find('.form-control').val('');
//                       }
//                       form_btn.prop('disabled', false).html(form_btn_old_msg);
//                       $(form_result_div).html(data.message).fadeIn('slow');
//                       setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
//                     }
//                   });
//                 }
//               });
//             })(jQuery);
</script>
<script>
		toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};
	$("#login_popup").on("submit", function(e)
					 {
	e.preventDefault();
	
	var logemail = $('#u_em').val();
	var logpass = $('#u_pass').val();
	
	if(logemail != '' && logpass != ''){
		
		var loginform = new FormData(this);
		
		loginform.append("loginpage","btn");
		
		$.ajax({ 
			
			url: 'php/phpcode.php',
			type: 'post',
			data: loginform,
			contentType: false,
			processData: false,
			success: function(data){
			
				if(data =="not approve"){
					swal("Alert!", "Unable to validate details, awaiting admin approval", "warning");
				}
				if(data == "empasserr"){
					swal("Error!", "Email and Password Wrong", "error");
				}
				else if(data == "apperror"){
					swal("Alert!", "Unable to validate details, awaiting admin approval", "warning");
				}
				else if (data == "subadmin"){
					window.location.href = "sub_admin/index.php";
				}else if(data == "servicead"){
					window.location.href = "service_definer/index.php";
				}
				else if(data == "gprefferer"){
					window.location.href = "Gprefferer/index.php";
				}
				else if(data == "Optometrist"){
				    	window.location.href = "Optometrist/index.php";
				}
				else if(data == "consultant"){
					window.location.href = "Consultant/index.php";
				}else if(data == "dentist"){
				
					window.location.href = "Dentist/index.php";
				}
				else if(data == "gpractional"){
				
					window.location.href = "General_Practitional/index.php";
				}
				else if(data == "cnurse"){
				
					window.location.href = "Community_nurse/index.php";
				}else if(data == "gptuser"){
					window.location.href = "Gprefferer/index.php";
				}
			    else if(data == "notsubmit"){
						// alert("Please fill all fields!");
		swal("Wrong", "Username or Password not recognised. Please try again or contact IT.", "warning");
	
				}

				
			}

		});

	}else{
		// alert("Please fill all fields!");
		toastr.error("Please fill all fields!");
		document.getElementById("u_em").style.borderColor = "red";
		document.getElementById("u_pass").style.borderColor = "red";

	} 
	
}); 


//  password hide show
$(".toggle-password").click(function() {

$(this).toggleClass("fas fa-eye"); 
var input = $($(this).attr("toggle"));
if (input.attr("type") == "text") {
  input.attr("type", "password");
} else {
  input.attr("type", "text");
}
});
	</script>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
