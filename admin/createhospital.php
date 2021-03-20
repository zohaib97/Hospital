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
										<h2 class="nk-block-title fw-normal">Create Hospital Admin</h2>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                       <div class="card p-5">
										   <form method="post" id="hadd" enctype="multipart/form-data">
											<div class="row gy-4">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="fname">Hospital Name</label>
														<?php
														$em = $_SESSION['superadmin'];
														$query = mysqli_query($con,"SELECT * FROM `admin` WHERE email = '$em' and super_admin = '1'");
														$fe = mysqli_fetch_array($query);
														?>
														<input type="text" value="<?=$fe['id']?>" id="cid" hidden="true" name="cid">
														<input type="text" class="form-control form-control-lg" id="hname" value="" placeholder="Enter Hospital Name" name="hname">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="fname">NHS Number</label>
														<input type="text" readonly class="form-control form-control-lg" id="nhs_no" value="<?="NH-".rand(100000,999999);?>" placeholder="Enter NHS Number" name="nhs_no" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="start_date">Start Date</label>
														<input type="text" class="form-control form-control-lg date-picker" id="start_date" placeholder="Enter Start Date" name="start_date" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="end_date">End Date</label>
														<input type="text" class="form-control form-control-lg date-picker" id="end_date" placeholder="Enter End Date" name="end_date" required autocomplete="off">
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
														<input class="btn btn-lg btn-primary" type="submit" value="Save" id="btnhospital">
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
	$("#hadd").on('submit', function(e){
		
        	e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("addhospital","btn");
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            processData:false,
            beforeSend: function(){
                $('#btnhospital').attr("disabled","disabled");
                $('#hadd').css("opacity",".5");
            },
            success: function(data){
      
                if(data == 'Error'){
                   toastr.clear(); 
               NioApp.Toast("<h5>Hospital Didn't Add Successfully</h5>", 'error',{position:'top-right'});
                }else if (data == "alreadynhs"){
					toastr.clear();
               NioApp.Toast("<h5>Already Hospital Created</h5>", 'error',{position:'top-right'});
				}
				else{
					$('#hadd')[0].reset();
					toastr.clear();
               NioApp.Toast("<h5>Hospital Added Successfully</h5>", 'success',{position:'top-right'});
					window.location.href = "hospitalslist.php";
                }
			
                $('#hadd').css("opacity","");
                $("#btnhospital").removeAttr("disabled");
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
// include_once('staffajax/ajax.php');
?>