<?php
include_once('connect.php');
?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php
	include_once('header.php');
	?>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?php
			include_once('sidebar.php');
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
                                       <h2 class="nk-block-title fw-normal">Privacy Policy</h2>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                        
                                        <div class="card">
                                            <div class="card-inner">
                                                
                                                <form method="post" id="privacyadd">
                                                    <div class="row g-4">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">Heading</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="title" name="title">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-lg-12">
                                                                <label class="form-label" for="cf-default-textarea">Description</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control form-control-sm" id="cf-default-textarea" placeholder="Write your message" name="desc"></textarea>
                                                                </div>
                                                            </div>
                                                      
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary" id="privacysubmit">Save Informations</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
 
</body>

</html>
<script>
$("#privacyadd").on('submit', function(e){
		
        e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("addprivacy","btn");

        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
          
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('#privacysubmit').attr("disabled","disabled");
                $('#privacyadd').css("opacity",".5");
            },
            success: function(data){
      
                if(data == 'Error'){
             toastr.clear();
    NioApp.Toast("<h5>Privacy didn't Insert</h5>", 'error',{position:'top-right'});
                }
				else if(data == 'Success'){
					$('#privacyadd')[0].reset();
              toastr.clear();
    NioApp.Toast("<h5>Privacy Inserted Successfully</h5>", 'success',{position:'top-right'});
                }
			
                $('#privacyadd').css("opacity","");
                $("#privacysubmit").removeAttr("disabled");
            }
        });
	
    });
</script>