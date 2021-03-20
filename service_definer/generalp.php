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
										 <h2 class="nk-block-title fw-normal">General pratictional list</h2>
                                       
                                    </div>
                                    <div class="nk-block nk-block-lg" id="adata">
                             
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
                    <h5 class="modal-title">General pratictional Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form class="form-validate is-alter" id="aupdate" method="post">
						<div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="first_name">First Name</label>
                            <div class="form-control-wrap">
								<input type="text" value="" id="mid" hidden="true" name="mid">
								<input type="text" value="" id="roleid" hidden="true" name="roleid">
                                <input type="text" class="form-control" id="first_name" name="fname" required>
                            </div>
                        </div>
						<div class="form-group col-md-6">
                            <label class="form-label" for="sure_name">Sure Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="sure_name" name="sname" required>
                            </div>
                        </div>
						</div>
						<div class="row">
						 <div class="form-group col-md-6">
                            <label class="form-label" for="memail">Email</label>
                            <div class="form-control-wrap">
                                <input type="email" class="form-control" id="memail" required name="memail">
                            </div>
                        </div>
							
						<div class="form-group col-md-6">
                            <label class="form-label" for="mpass">Password</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="mpass" required name="mpassword">
                            </div>
                        </div>
						</div>
						<div class="row">
						<div class="form-group col-md-6">
                            <label class="form-label" for="contact">Contact</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="mcontact" required name="mcontact">
                            </div>
                        </div>
                       <div class="form-group col-md-6">
                            <label class="form-label" for="password">Department</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="mdepart" required name="mdepart">
                            </div>
                        </div>
						</div>
						<div class="row">
						<div class="form-group col-md-6">
                            <label class="form-label" for="password">Date of Birth</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="mdob" required name="mdob">
                            </div>
                        </div>
						</div>
						<br>
                         <div class="row">
						<div class="form-group col-md-6">
                            <button type="submit" class="btn btn-lg btn-primary" id="adminupdate">Save Informations</button>
                        </div>
						</div>                     
                        
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">General pratictional Update</span>
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
		data:{genralpbtn:"btn"},	            
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
        Swal.fire('Deleted!', 'Nurse has been deleted.', 'success');
		  deleteadmin(id);
      }
    });
	}
	function deleteadmin(id){
		
		var vid = id;
		$.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: {vid:vid,deladmin:"btn"},
                   
            success: function(data){
      
                if(data == 'Error'){
                    
              toastr.clear();
    NioApp.Toast("<h5>Nurse Didn't Delete</h5>", 'error',{position:'top-right'});
                }
				else if(data == 'Success'){
				
          toastr.clear();
    NioApp.Toast("<h5>Nurse Delete Successfully</h5>", 'success',{position:'top-right'});
					fetchadmindata();
                }
			
           
            }
        });
	};
	  function openmodal1(id,fname,sname,email,pass,contact,depart,dob,roleid) {
        $('#mid').val(id);
		$('#roleid').val(roleid);
        $('#first_name').val(fname);
        $('#sure_name').val(sname);
        $('#memail').val(email);
        $('#mpass').val(pass);
        $('#mcontact').val(contact);
		$('#mdepart').val(depart);
	 	$('#mdob').val(dob);  
		
        $('#modalForm2').modal('show');
    };
	$("#aupdate").on('submit', function(e){
        	e.preventDefault();
		
		var updfname = $('#first_name').val();
		var updsname = $('#sure_name').val();
		var updemail = $('#memail').val();
		var updpass = $('#mpass').val();
		var updcontact = $('#mcontact').val();
		var upddepart = $('#mdepart').val();
		var upddob = $('#mdob').val();
		
		if(updfname != '' && updsname != '' && updemail != '' && updpass != '' && updcontact != '' && upddepart != '' && upddob != ''){
		
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
//				alert(data);
				if(data == "staffemailalready"){
					toastr.clear();
               NioApp.Toast("<h5>Email Already Exist</h5>", 'error',{position:'top-right'});
					document.getElementById("memail").style.borderColor = "red";
				}
                else if(data == 'Error'){
                   toastr.clear();
               NioApp.Toast("<h5>Nurse didn't update Successfully</h5>", 'error',{position:'top-right'});
                }
				else if(data == 'Success'){
					$('#aupdate')[0].reset();
					toastr.clear();
               NioApp.Toast("<h5>Nurse Updated Successfully</h5>", 'success',{position:'top-right'});
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
//					document.getElementById("memail").style.borderColor = "red";
		}

    });
	</script>
</html>
