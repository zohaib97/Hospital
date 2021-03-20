<?php 
include_once('database/db.php');
	include_once('headerlink.php');
	include_once('headernav.php');
?>
  <!-- Start main-content -->
  <div class="main-content-area">
    <!-- Section: page title -->
    <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg1.jpg">
      <div class="container pt-50 pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Register</h2>
              <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                <div class="breadcrumbs">
                  <span><a href="#" rel="home">Home</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span><a href="#">Register</a></span>
                  <span><i class="fa fa-angle-right"></i></span>
                  <span class="active">Register</span>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Have Any Question -->
    

    <!-- Divider: Contact -->
    <section class="divider bg-white-f7">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="mt-0 mb-0">Dont Have An Account?</h2>
            <p class="font-size-20">Register Here!</p>
            <!-- Contact Form -->
            <form id="reg_form" name="contact_form" class="" method="post">
				<div id="1stfrom">
              <div class="form-row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>First Name</label>
                    <input name="contact_name" id="conname" class="form-control required" type="text" placeholder="Enter Name">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Sur Name</label>
                    <input name="contact_email" id="consname" class="form-control required email" type="email" placeholder="Enter Email">
                  </div>
                </div>
            
             
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Email</label>
                    <input name="contact_subject" id="conemail" class="form-control required" type="text" placeholder="Enter Subject">
                  </div>
                </div>
				    </div>
				 <div class="form-row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Password</label>
                    <input name="contact_phone" id="conpass" class="form-control required" type="text" placeholder="Enter Phone">
                  </div>
					</div>
					  <div class="col-sm-6">
					 <div class="form-group">
                <label>Role</label>
            <select class="form-control" name="role" id="conrole">
						 <option>Select</option>
						 <?php
						$quer = mysqli_query($con,"SELECT * FROM tbl_role");
			if($quer)
			{
				while($fe = mysqli_fetch_array($quer))
				{
					
			
				
				
				?>
				<option value="<?=$fe['ro_id']?>"><?=$fe['ro_role']?></option>
				<?php
					}
			}
				?>
						 </select>
              </div>
                </div>
              </div>

             </div>
				<div id="2ndform" style="display: none;">
				<div class="form-row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Title</label>
                    <input name="contact_name" id="title" class="form-control required" type="text" placeholder="Enter Name">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Organization Type</label>
                    <input name="contact_email" id="orgtype" class="form-control required email" type="email" placeholder="Enter Email">
                  </div>
                </div>
            
             
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Organization Name</label>
                    <input name="contact_subject" id="orgname" class="form-control required" type="text" placeholder="Enter Subject">
                  </div>
                </div>
					<div class="col-sm-4">
                  <div class="form-group">
                    <label>Organization Phone No</label>
                    <input name="contact_subject" id="orgphno" class="form-control required" type="text" placeholder="Enter Subject">
                  </div>
                </div>
					<div class="col-sm-4">
                  <div class="form-group">
                    <label>Organization Address</label>
                    <input name="contact_subject" id="orgaddress" class="form-control required" type="text" placeholder="Enter Subject">
                  </div>
                </div>
					<div class="col-sm-4">
                  <div class="form-group">
                    <label>Professional Registration No</label>
                    <input name="contact_subject" id="proregno" class="form-control required" type="text" placeholder="Enter Subject">
                  </div>
                </div>
					<div class="col-sm-4">
                  <div class="form-group">
                    <label>Organization Code</label>
                    <input name="contact_subject" id="orgcode" class="form-control required" type="text" placeholder="Enter Subject">
                  </div>
                </div>
					<div class="col-sm-4">
                  <div class="form-group">
                    <label>1st Line Address</label>
                    <input name="contact_subject" id="1staddress" class="form-control required" type="text" placeholder="Enter Subject">
                  </div>
                </div>
					<div class="col-sm-4">
                  <div class="form-group">
                    <label>City</label>
                    <input name="contact_subject" id="city" class="form-control required" type="text" placeholder="Enter Subject">
                  </div>
                </div>
					<div class="col-sm-4">
                  <div class="form-group">
                    <label>Post Code</label>
                    <input name="contact_subject" id="postcode" class="form-control required" type="text" placeholder="Enter Subject">
                  </div>
                </div>
				    </div>
				</div>
              <div class="form-group">
                <input name="form_botcheck" class="form-control" type="hidden" value="" />
                <button id="next" type="button" class="btn btn-flat btn-theme-colored1 text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px" data-loading-text="Please wait...">Next</button>
				  <button id="previous" type="button" class="btn btn-flat btn-theme-colored1 text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px" data-loading-text="Please wait..." style="display: none;">Previous</button>
				  <button id="submit" type="submit" class="btn btn-flat btn-theme-colored1 text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px" data-loading-text="Please wait..." style="display: none;">Submit</button>
             
              </div>
					
            </form>

            <!-- Contact Form Validation-->
            <script>
              (function($) {
                $("#contact_form").validate({
                  submitHandler: function(form) {
                    var form_btn = $(form).find('button[type="submit"]');
                    var form_result_div = '#form-result';
                    $(form_result_div).remove();
                    form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                    var form_btn_old_msg = form_btn.html();
//                    form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
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
          </div>
          
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->

  <!-- Footer -->
<?php
include_once('footer.php');
?>
<script src="ajax-load/register_ajax.js"></script>
<script>
$('#next').on('click',function(){
	$('#1stfrom').hide(700);
	$('#2ndform').show(700);
	$('#next').hide();
	$('#previous').show();
	$('#submit').show();
	
	
});
	$('#previous').on('click',function(){
	$('#1stfrom').show(700);
	$('#2ndform').hide(700);
	$('#next').show();
	$('#previous').hide();
	$('#submit').hide();
	
	
});


</script>