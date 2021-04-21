<?php
include_once('connect.php');

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
										<h2 class="nk-block-title fw-normal">Create Organisation Admin</h2>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                       <div class="card p-5">
										   <form method="post" id="saadd" enctype="multipart/form-data">
											<div class="row gy-4">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="saname">Admin Name</label>
														
														<input type="text" class="form-control form-control-lg" id="saname" value="" placeholder="Enter First Name" name="saname">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="saname">Last Name</label>
														
														<input type="text" class="form-control form-control-lg" id="ssname" value="" placeholder="Enter Last Name" name="ssname">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="saemail">Email</label>
														<input type="email" class="form-control form-control-lg" id="saemail" value="" placeholder="Enter Email" name="saemail" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="sapass">Password</label>
													     <input type="password" class="form-control form-control-lg " id="sapass"  name="sapass" required autocomplete="off">
														 <span toggle="#sapass" class="far fa-eye-slash  toggle-password field-icon"></span>

														</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="sacontact">Contact</label>
														<input type="number" class="form-control form-control-lg" id="sacontact" name="sacontact" required autocomplete="off" onchange="stringlength(this.value)">
													<small id="valid-nhs"></small>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="saorganization">Organisation</label>
														<select id="saorganization" name="saorganization" class="form-control form-control-lg">
														<option>Select</option>
															<?php
															$sql = mysqli_query($con,"SELECT * FROM `orginzation` where status='Approved'");
															while($fe = mysqli_fetch_array($sql))
															{
																
															
															?>
															<option value="<?=$fe['orid']?>"><?=$fe['or_name']?></option>
															
															<?php
															}
															?>
														</select>
													</div>
												</div>
												<!-- <div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="saaddress">Address</label>
														<input type="text" class="form-control form-control-lg" id="saaddress" name="saaddress" required autocomplete="off">
													</div>
												</div> -->
<!--
												<div class="col-12">
													<div class="custom-control custom-switch">
														<input type="checkbox" class="custom-control-input" id="latest-sale">
														<label class="custom-control-label" for="latest-sale">Use full name to display </label>
													</div>
												</div>
-->
												<div class="col-md-12" id="regishide">
													<div class="form-group">
														<input class="btn btn-lg btn-primary" type="submit" value="Save" id="btnsubadmin">
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

	function stringlength(num)
{ 
 
var no = num;
var mnlen = 5;
var mxlen = 15;
if(no.length<mnlen || no.length> mxlen)
{ 
    
$("#valid-nhs").html("Please enter between 5 to 15 numbers").removeClass("text-success").addClass("text-danger");
$("#valid-nhs").show();
$('#sacontact').val('');
}
else
{
    $("#valid-nhs").hide();
}
}

	$("#saadd").on('submit', function(e){
		
        	e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("addsubadmin","btn");
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            processData:false,
            beforeSend: function(){
                $('#btnsubadmin').attr("disabled","disabled");
                $('#saadd').css("opacity",".5");
            },
            success: function(data){
      
                if(data == 'Error'){
                   toastr.clear(); 
               NioApp.Toast("<h5>Admin Didn't Add Successfully</h5>", 'error',{position:'top-right'});
                }
				else if (data == "alreadynhs"){
					toastr.clear();
               NioApp.Toast("<h5>Already Admin Created</h5>", 'error',{position:'top-right'});
				}
				else{
					$('#saadd')[0].reset();
					toastr.clear();
               NioApp.Toast("<h5>Admin Added Successfully</h5>", 'success',{position:'top-right'});
			setTimeout(function(){window.location.href="adminlist.php";}, 1000);

                }
			
                $('#saadd').css("opacity","");
                $("#btnsubadmin").removeAttr("disabled");
            }
			
        });

    });
	</script>
</html>
<script>
	function managerhie(manager){
		if(manager == "2"){
			$('#regishide').hide();
	}else {
		$('#regishide').show();
	}
}
	
	$(".toggle-password").click(function() {

  $(this).toggleClass("fas fa-eye");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<?php
// include_once('staffajax/ajax.php');
?>