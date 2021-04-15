<?php
include_once('connect.php');

?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php
	include_once('header.php');
	?>
<style>
@media screen and (min-device-width: 280px) and (max-device-width: 768px) { 
#adata{
    overflow: auto;
}
}
</style>
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
										 <h2 class="nk-block-title fw-normal">Admins list</h2>
                                      
                                    </div>
                                     <a href="createsubadmin.php" class="btn btn-primary float-right mb-2">Create Admin</a><br>
                                     <br><br>
                                    <div class="nk-block nk-block-lg" id="adata" style="overflow: auto;">
                             
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
	    <!-- Modal Form -->
    <div class="modal fade" tabindex="-1" id="modalForm2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hospital Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form class="form-validate is-alter" id="aupdate" method="post">
						<div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="full-name">Full Name</label>
                            <div class="form-control-wrap">
								<input type="text" value="" id="id" hidden="true" name="id">
                                <input type="text" class="form-control" id="full-name" name="name" required>
                            </div>
                        </div>
						 <div class="form-group col-md-6">
                            <label class="form-label" for="email">Email</label>
                            <div class="form-control-wrap">
							
                                <input type="email" class="form-control" id="email" required name="email">
                            </div>
                        </div>
							</div>
						<div class="form-group">
                            <label class="form-label" for="address">Organisation</label>
                            <div class="form-control-wrap">
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
						<div class="row">
						<div class="form-group col-md-6">
                            <label class="form-label" for="contact">Contact</label>
                            <div class="form-control-wrap">
							
                                <input type="text" class="form-control" id="contact" required name="contact">
                            </div>
                        </div>
                       <div class="form-group col-md-6">
                            <label class="form-label" for="password">Password</label>
                            <div class="form-control-wrap">
						
                                <input type="text" class="form-control" id="password" required name="password">
                            </div>
                        </div>
						</div>
                      
                       
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary" id="adminupdate">Save Informations</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">Admin Update</span>
                </div>
            </div>
        </div>
    </div> 
    <!-- app-root @e -->
  <script src="assets/js/example-toastr.js?ver=2.2.0"></script>
</body>
<script>
	function fetchadmindata()
	{
		 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{adminfetch:"btn"},	            
        success: function(response){                    
            $("#adata").html(response); 
            //alert(response);
        }

    });
	}
	$(document).ready(function(){
		fetchadmindata();
	});
	
	function confirm(id)
	{
		 Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!'
    }).then(function (result) {
      if (result.value) {
        Swal.fire('Deleted!', 'Admin has been deleted.', 'success');
		  deleteadmin(id);
      }
    });
	}
	function aprovenotaprove(id,status,email){
	
		var name  = status;
		var ide = id;
		var em = email;

		$.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: {method:name,
				   id:ide,
				  em:em,
				  },
			
            success: function(data){
      
                if(data == 'Error'){
                   toastr.clear();
    NioApp.Toast("<h5>Admin didn't Updated</h5>", 'error',{position:'top-right'});
            
                }
				else if(data == 'Success'){
				if(name == 'aapprove') 
					{
					
						 toastr.clear();
    NioApp.Toast("<h5>Admin Approval Rejected</h5>", 'error',{position:'top-right'});
				fetchadmindata();
					}
					else{
              toastr.clear();
    NioApp.Toast("<h5>Admin Approved Successfully</h5>", 'success',{position:'top-right'});
				fetchadmindata();
					
					}
                }
			
           
            }
        });
	};
	function deleteadmin(id){
		
		var vid = id;
		$.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: {vid:vid,deladmin:"btn"},
          
    
         
            success: function(data){
      
                if(data == 'Error'){
                    
              toastr.clear();
    NioApp.Toast("<h5>Admin Didn't Delete</h5>", 'error',{position:'top-right'});
                }
				else if(data == 'Success'){
				
          toastr.clear();
    NioApp.Toast("<h5>Admin Delete Successfully</h5>", 'error',{position:'top-right'});
					fetchadmindata();
                }
			
           
            }
        });
	};
	  function openmodal1(id,name,email,address,password,contact,organization) {
        $('#id').val(id);
        $('#full-name').val(name);
        $('#email').val(email);
        $('#address').val(address);
        $('#password').val(password);
        $('#contact').val(contact);
        $("#saorganization").val(organization);
		
        $('#modalForm2').modal('show');
    };
	
	$("#aupdate").on('submit', function(e){
        	e.preventDefault();
		
		var adname = $('#full-name').val();
		var ademail = $('#email').val();
		var adadd = $('#saorganization').val();
		var adcont = $('#contact').val();
		var adpass = $('#password').val();
		
		if(adname != '' && ademail != '' && adadd != '' && adcont != '' && adpass != ''){
		
		var formdata = new FormData(this);
		formdata.append("updatehadmin","btn");
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            processData:false,
            beforeSend: function(){
                $('#adminupdate').attr("disabled","disabled");
                $('#aupdate').css("opacity",".5");
            },
            success: function(data){
      			if(data == "staffemailalready"){
					toastr.clear(); 
               NioApp.Toast("<h5>Email Already Exist</h5>", 'error',{position:'top-right'});
				}
                else if(data == 'Error'){
                   toastr.clear(); 
               NioApp.Toast("<h5>Admin didn't update Successfully</h5>", 'error',{position:'top-right'});
                }
				else if(data == 'Success'){
					$('#aupdate')[0].reset();
					toastr.clear();
               NioApp.Toast("<h5>Admin Updated Successfully</h5>", 'success',{position:'top-right'});
					fetchadmindata();
					$('#modalForm2').modal('hide');
                }
			
                $('#aupdate').css("opacity","");
                $("#adminupdate").removeAttr("disabled");
            }
			
        });
		}else {
			toastr.clear();
			NioApp.Toast("<h5>All Fields are required</h5>", 'error',{position:'top-right'});
		}
    });
	</script>
</html>
