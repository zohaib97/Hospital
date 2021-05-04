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
										<h2 class="nk-block-title fw-normal">Create GP Referrer</h2>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                       <div class="card p-5">
										   <form method="post" id="gpadd" enctype="multipart/form-data">
											<div class="row gy-4">
												<div class="col-md-6">
													<div class="form-group">
														<?php
														$em = $_SESSION['superadmin'];
														$qu = mysqli_query($con,"SELECT * FROM admin WHERE email = '$em'");
														$fe = mysqli_fetch_array($qu);
														
														?>
														<label class="col-form-label" for="fname">First Name</label>
														<input type="text" value="<?=$fe['id']?>" id="cid" hidden="true" name="id">
														<input type="text" class="form-control form-control-lg" id="fname" value="" placeholder="Enter Full name"  name="fname" autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="sname">Sur Name</label>
														<input type="text" class="form-control form-control-lg" id="sname" value="" placeholder="Enter Sur Name" name="sname" autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="email">Email</label>
														<input type="email" class="form-control form-control-lg" id="email" value="" placeholder="e.g: yourname@domain.com" name="email" autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="pass">Password</label>
														<input type="password" class="form-control form-control-lg" id="pass" value="" placeholder="Enter Your Password" name="pass" autocomplete="off">
														<span toggle="#pass" class="ni ni-eye toggle-password field-icon"></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="pno">Title</label>
														<select name="title" class="form-control" id="title">
															<option value="Mr">Mr</option>
															<option value="Ms">Ms</option>
															<option value="Mrs">Mrs</option>
														</select>
													</div>
												</div>
											
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
														<input class="btn btn-lg btn-primary" type="submit" value="Save" id="btngpadd">
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
	
	$("#gpadd").on('submit', function(e){
		
        	e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("addgprefferer","btn");
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            processData:false,
            beforeSend: function(){
                $('#btngpadd').attr("disabled","disabled");
                $('#gpadd').css("opacity",".5");
            },
            success: function(data){

                if(data == 'gpalready'){
                   toastr.clear(); 
               NioApp.Toast("<h5>Email Already Exist</h5>", 'error',{position:'top-right'});
                }
				else if(data == 'gpdone'){
					$('#gpadd')[0].reset();
					toastr.clear();
               NioApp.Toast("<h5>G-P Referrer Added Successfully</h5>", 'success',{position:'top-right'});
									
                }else {
					toastr.clear();
               NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
				}
			
                $('#gpadd').css("opacity","");
                $("#btngpadd").removeAttr("disabled");
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

  $(this).toggleClass("ni-eye-off");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<?php
include_once('staffajax/ajax.php');
?>