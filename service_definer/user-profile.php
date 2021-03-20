<?php
session_start();
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
								
                                <div class="nk-block">
                                    <div class="card" id="profile">
								<!-- .card-aside-wrap -->
                                    </div><!-- .card -->
                                </div>
								<!-- .nk-block -->
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
    <!-- @@ Profile Edit Modal @e -->

    <div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Update Profile</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#personal">Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#address">Appointment</a>
                        </li>
                    </ul><!-- .nav-tabs -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
							<form method="post" id="updateform">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Full Name</label>
										<input type="text" value="" id="cid" hidden="true" name="id">
                                        <input type="text" class="form-control form-control-lg" id="full-name" value="" placeholder="Enter Full name" name="name" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="display-name">Display Name</label>
                                        <input type="text" class="form-control form-control-lg" id="semail" value="" placeholder="Enter display name" autocomplete="off">
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no">Password</label>
                                        <input type="text" class="form-control form-control-lg" id="spass" value="" placeholder="Phone Number" name="contact" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no">Phone Number</label>
                                        <input type="number" class="form-control form-control-lg" id="phone-no" value="" placeholder="Phone Number" name="contact" autocomplete="off">
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
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                             <input id="profilesubmit" type="submit" class="btn btn-lg btn-primary" value="Update profile">
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
								</form>
                        </div>
							<!-- .tab-pane -->
						
                        <div class="tab-pane" id="address">
							<form method="post" id="updateaddress">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-l1">Hospital</label>
										<input type="text" value="" id="aid" hidden="true" name="aid">
                                        <input type="text" class="form-control form-control-lg" id="shosp" value="" name="address" autocomplete="off">
                                    </div>
                                </div>
                                
                                
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <input id="addresssubmit" type="submit" class="btn btn-lg btn-primary" value="Update Address">
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
								</form>
                        </div>
							<!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->

</body>

</html>
<script>
	function fetchadmindata()
	{
		 $.ajax({    
        type: "POST",
        url: "phpcode.php",
		data:{adminfetchupdate:"btn"},
        success: function(response){
            $("#profile").html(response);
            //alert(response);
        }

    });
	}
	$(document).ready(function(){
		fetchadmindata();
	});
$("#updateform").on("submit", function(e){
        	e.preventDefault();
	
		var updname = $('#full-name').val();
		var updphn = $('#phone-no').val();
	
		if(updname != '' && updphn != ''){
				
		var formdata = new FormData(this);
		formdata.append("updateadmin","btn");
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            processData:false,
            beforeSend: function(){
                $('#profilesubmit').attr("disabled","disabled");
                $('#updateform').css("opacity",".5");
            },
            success: function(data){
      
                if(data == 'Error'){
                     toastr.clear();
    NioApp.Toast("<h5>Admin didn't Updated</h5>", 'error',{position:'top-right'});
           
                }
				else if(data == 'Success'){
					$('#updateform')[0].reset();
					 toastr.clear();
    NioApp.Toast("<h5>Admin Updated Successfully</h5>", 'success',{position:'top-right'});
           
				fetchadmindata();
					$('#profile-edit').modal('hide');
					
                }
			
                $('#updateform').css("opacity","");
                $("#profilesubmit").removeAttr("disabled");
            }
			
        });
	}else {
		toastr.clear();
               NioApp.Toast("<h5>All Fields are required</h5>", 'error',{position:'top-right'});
	}
    });
	
	$("#updateaddress").on('submit', function(e){
        	e.preventDefault();
		var updadd = $('#address-l1').val();
		
		if(updadd != ''){
					
		var formdata = new FormData(this);
		formdata.append("updateadminaddress","btn");
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            processData:false,
            beforeSend: function(){
                $('#addresssubmit').attr("disabled","disabled");
                $('#updateaddress').css("opacity",".5");
            },
            success: function(data){
      
                if(data == 'Error'){
                     toastr.clear();
    NioApp.Toast("<h5>Admin didnot Update</h5>", 'error',{position:'top-right'});
             
                }
				else if(data == 'Success'){
					$('#updateaddress')[0].reset();
              toastr.clear();
    NioApp.Toast("<h5>Admin Updated Successfully</h5>", 'success',{position:'top-right'});
	fetchadmindata();
					$('#profile-edit').modal('hide');
					
                }
			
                $('#updateaddress').css("opacity","");
                $("#addresssubmit").removeAttr("disabled");
            }
			
        });
	}else {
		toastr.clear();
               NioApp.Toast("<h5>All Fields are required</h5>", 'error',{position:'top-right'});
	}
	});
	
	function cupdmodal(sid, sname, semail, spass, scont, shosp) {
		
        $('#cid').val(sid);
        $('#aid').val(sid);
        $('#full-name').val(sname);
        $('#semail').val(semail);
        $('#spass').val(spass);
        $('#phone-no').val(scont);
		$('#shosp').val(shosp);
		
		
        $('#profile-edit').modal('show');
    };
</script>