<?php
include_once('../database/db.php');

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
										 <h2 class="nk-block-title fw-normal">Service Search Criteria</h2>
                                    </div>
									
									<br>
                                    <div class="nk-block nk-block-lg" id="rdata">
										
                             
                                    </div>
									<form method="post" id="attach" style="display: none;">
								 <div class="row">
								 <div class="col-md-4">
									 <input type="text" name="rid" id="refferelid" hidden="true" value="">
									 <label for="consultant">Consultant</label>
									  <select class="form-control" name="consultant" id="consultant">
										  <?php
									 $q = mysqli_query($con,"SELECT * FROM `tbl_user` WHERE tbl_role = '3'");
									 if(mysqli_num_rows($q)>0)
									 {
										 $fe = mysqli_fetch_array($q);
									 ?>
								 <option value="<?=$fe['staff_id']?>"><?=$fe['staff_sname']?></option>
										  <?php
									 }
										  ?>
								 </select>
									 </div>
									 <div class="col-md-4">
										 <label for="file">Attach File</label>
									 <input class="form-control" type="file" name="file" id="file">
									 </div>
									 <div class="col-md-4">
									
									 <input type="submit" class="btn btn-primary mt-5" name="rsubmit" value="Submit" id="rsubmit">
									 </div>
								 </div>
								
										</form>
									<!-- nk-block -->
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
	    <!-- Modal Form -->
    
    <!-- app-root @e -->
  <script src="assets/js/example-toastr.js?ver=2.2.0"></script>
</body>
<script>
	
	function fetchreferadvice()
	{
		 $.ajax({    
        type: "POST",
        url: "gpphpcode.php", 
		data:{referadbtn:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
	}
	$(document).ready(function(){
		fetchreferadvice();
	});
	
	
	
	function show(id){
	
		if($('#'+id).prop("checked")==true)
			{
		var group = "input:checkbox[name='check']";
		$(group).prop("checked", false);
		$('#'+id).prop("checked",true);
		$('#attach').show();
		$('#refferelid').val(id);
			}
		else{
			$('#attach').hide();
		}
	}
	
	$("#attach").on('submit', function(e)
					 {
        	e.preventDefault();
		
		var formdata = new FormData(this);
		formdata.append("consultantdata","btn");
        $.ajax({
            type: 'POST',
            url: 'gpphpcode.php',
            data: formdata,
            contentType: false,
            processData:false,
            beforeSend: function(){
                $('#rsubmit').attr("disabled","disabled");
                $('#attach').css("opacity",".5");
            },
            success: function(data){
      			 if(data == 'Error'){
                   toastr.clear(); 
               NioApp.Toast("<h5>Refferel didn't Send Successfully</h5>", 'error',{position:'top-right'});
                }
				else if(data == 'Success'){
					$('#attach')[0].reset();
					toastr.clear();
               NioApp.Toast("<h5>Refferel Sent Successfully</h5>", 'success',{position:'top-right'});
		
				
                }
			
                $('#attach').css("opacity","");
                $("#rsubmit").removeAttr("disabled");
            }
			
        });
		
    });
	</script>
</html>
