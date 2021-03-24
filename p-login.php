<?php
	include_once('database/db.php');
	?>

<!DOCTYPE html>
<html lang="zxx">
<?php
	include_once('header.php');
	?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" />

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
    <section id="appointment" class="section-padding">
        <div class="auto-container">
            <div class="row">
				<div class="col-lg-8 text-center mx-auto">
                    <div class="section-title">
                        <h3>Login <span>Here</span></h3>
                        <span class="line"></span>
                    </div>
				</div>
				<!-- end section title -->
			</div>
			
            <div class="row mt-5">
				<div class="col-lg-8 mx-auto">
                    <div class="appointment-form-ma">
                        <form method="post" id="login_popup">
                            <div class="row">
							  
							  
							 
							
							
							  <div class="form-group col-lg-6 mt-2">
								 <input type="number" class="form-control" id="u_em" placeholder="Your NHS no" name="nhsno" autocomplete="off" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"maxlength="10">
							  </div>
							  <div class="form-group  col-lg-6 mt-2" >
								 <input type="text"  class="form-control " onfocus="(this.type='date')" id="u_pass" placeholder="Date of Birth" name="dob" autocomplete="off"> 
							

							  </div>
							  
							  <div class="form-group col-lg-12">
								 <button type="submit" class="btn btn-apfm">Login <i class="icofont icofont-thin-right"></i></button>
							  </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end col -->
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
	
	
    <!-- START FOOTER -->
    <?php
	include_once('footer.php');
	?>
    <!-- END FOOTER -->
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	
</body>
<script>
  $( function() {
$('.datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy"
    });
  } );
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
		
		loginform.append("loginpage1","btn");
		
		$.ajax({ 
			
			url: 'php/phpcode.php',
			type: 'post',
			data: loginform,
			contentType: false,
			processData: false,
			success: function(data){
		
				if(data == "error"){
//					alert("Email Password Wrong!");
					toastr.error("Email Password Wrong!");
				}
				
				else if (data == "pati"){
//					alert("Welcome");
					window.location.href = "Patient/index.php";
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

</html>
