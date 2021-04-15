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
										<h2 class="nk-block-title fw-normal">Create Appointment Type</h2>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                       <div class="card p-5">
										   <form method="post" id="apptype" enctype="multipart/form-data">
											<div class="row gy-4">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="saname">Appointment Type</label>
														
														<input type="text" class="form-control form-control-lg" id="appname" value="" placeholder="Enter Appointment Type" name="appname">
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
														<input class="btn btn-lg btn-primary" type="submit" value="Save" id="btnsubmit">
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
	$("#apptype").on('submit', function(e){
		
        	e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("ser_app2","btn");
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            processData:false,
            beforeSend: function(){
                $('#btnsubmit').attr("disabled","disabled");
                $('#orgtypeadd').css("opacity",".5");
            },
            success: function(data){
      
                if(data == 'sererror'){
                   toastr.clear(); 
               NioApp.Toast("<h5>Appointment Type Didn't Add Successfully</h5>", 'error',{position:'top-right'});
                }
				else if (data == "already"){
					toastr.clear();
               NioApp.Toast("<h5>Appointment Type Already Created</h5>", 'error',{position:'top-right'});
				}
				else{
					$('#apptype')[0].reset();
					toastr.clear();
               NioApp.Toast("<h5>Appointment Type Added Successfully</h5>", 'success',{position:'top-right'});
		

                }
			
                $('#apptype').css("opacity","");
                $("#btnsubmit").removeAttr("disabled");
            }
			
        });

    });
	</script>
</html>
<script>

	

</script>
<?php
// include_once('staffajax/ajax.php');
?>