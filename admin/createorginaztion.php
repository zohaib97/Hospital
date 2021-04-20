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
										<h2 class="nk-block-title fw-normal">Create Organisation</h2>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                       <div class="card p-5">
										   <form method="post" id="oradd" enctype="multipart/form-data">
											<div class="row gy-4">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="oname">Organisation Name</label>
													
														<input type="text" class="form-control form-control-lg" id="oname" value="" placeholder="Enter Name" name="oname">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="otype">Organisation Type</label>
														<select  class="form-control form-control-lg js-example-tags" id="otype" name="otype" required>
                                                        <?php
                                                        $sql = mysqli_query($con,"SELECT * FROM organisation_type");
                                                    if(mysqli_num_rows($sql)>0)
                                                    {

                                                    
                                                        while($fetc = mysqli_fetch_array($sql))
                                                        {
                                                        ?>
                                                        <option value="<?=$fetc['ort_name']?>"><?=$fetc['ort_name']?></option>
                                                        <?php
                                                        }
                                                    }
                                                        ?>
                                                        </select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="ocontact">Organisation Phone no</label>
														<input type="number" class="form-control form-control-lg " id="ocontact" placeholder="Enter Contact" name="ocontact" required autocomplete="off">
													</div>
												</div>
												
                                                <div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="ocode">Organisation Code</label>
														<input type="text" class="form-control form-control-lg " id="ocode" placeholder="Enter Code" name="ocode" required autocomplete="off">
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="ofaddress">Organisation First Line Address</label>
														<input type="text" class="form-control form-control-lg " id="ofaddress" placeholder="Enter First Line Address" name="ofaddress" required autocomplete="off">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="oaddress">Organisation Second Line Address</label>
														<input type="text" class="form-control form-control-lg " id="oaddress" placeholder="Enter Second Line Address" name="oaddress" required autocomplete="off">
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="ocity">Organisation City</label>
														<input type="text" class="form-control form-control-lg " id="ocity" placeholder="Enter City" name="ocity" required autocomplete="off">
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="form-group">
														<label class="col-form-label" for="opost">Organisation Post code</label>
														<input type="text" class="form-control form-control-lg " id="opost" placeholder="Enter Post Code" name="opost" required autocomplete="off">
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
	$("#oradd").on('submit', function(e){
		
        	e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("addorginaztion","btn");
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            processData:false,
            beforeSend: function(){
                $('#btnhospital').attr("disabled","disabled");
                $('#oradd').css("opacity",".5");
            },
            success: function(data){
     
                if(data == 'Error'){
                   toastr.clear(); 
               NioApp.Toast("<h5>Organisation Didn't Add Successfully</h5>", 'error',{position:'top-right'});
                }else if (data == "alreadynhs"){
					toastr.clear();
               NioApp.Toast("<h5>Already Organisation Created</h5>", 'error',{position:'top-right'});
				}
				else if(data == "sss")
					{
					$('#oradd')[0].reset();
					toastr.clear();
					
               NioApp.Toast("<h5>Organisation Added Successfully</h5>", 'success',{position:'top-right'});
					setTimeout(function(){window.location.href="organizationlist.php";}, 2000);
                }
                else if(data == "postcodealready")
                {
                     NioApp.Toast("<h5>Postcode Already Registered</h5>", 'warning',{position:'top-right'});
                }
                else if(data == "orcodealready")
                {
                     NioApp.Toast("<h5>Organisation Code Already Registered</h5>", 'warning',{position:'top-right'});
                }
			
                $('#oradd').css("opacity","");
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