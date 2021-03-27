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
										<h2 class="nk-block-title fw-normal">Create Role</h2>
									</div>
									<div class="nk-block nk-block-lg">
										<div class="card p-5">
											<form method="post" id="createrolestaff" enctype="multipart/form-data">
												<div class="row gy-4">
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-form-label" for="fname">Title</label>
															<select id="title" class="form-control form-control-lg" name="title" aria-placeholder="Title" autocomplete="off">
																<option>--Select Title--</option>

																<option value="Mr">Mr</option>
																<option value="Miss">Miss</option>
																<option value="Mrs">Mrs</option>
																<option value="Ms">Ms</option>
																<option value="Dr">Dr</option>
																<option value="Prof">Prof</option>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-form-label" for="fname">First Name</label>
															<!--														<input type="text" value="" id="cid" hidden="true" name="id">-->
															<input type="text" class="form-control form-control-lg" id="fname" value="" placeholder="Enter Full name" autocomplete="off" name="staff_name">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-form-label" for="sname">Sur Name</label>
															<input type="text" class="form-control form-control-lg" id="sname" value="" placeholder="Enter display name" autocomplete="off" name="staff_sname">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-form-label" for="email">Email</label>
															<input type="email" class="form-control form-control-lg" id="email" value="" placeholder="e.g: yourname@domain.com" autocomplete="off" name="staff_email">
														</div>
													</div>
													
													<div class="form-group col-lg-6">
														<label class="col-form-label" for="pno">Organisation Type</label>

														<input id="orgtype" class="form-control form-control-lg"  aria-placeholder="Organisation Type" value="<?=$fetchsa["or_type"]?>" readonly>
														
														<input type="hidden" name="orgtype" value="<?=$org?>">
													</div>
													<div class="form-group col-lg-6 ">
														<label class="col-form-label" for="pno">Organisation Name</label>
														<input type="text" class="form-control form-control-lg" id="orgname" readonly placeholder="Organisation Name" name="orgname" autocomplete="off" value="<?=$fetchsa["or_name"]?>">
													</div>
													<div class="form-group col-lg-6">
													<label class="col-form-label" for="pno">Organisation Contact</label>
														<input type="text" class="form-control form-control-lg" id="orgphno" readonly placeholder="Organisation Phone No" name="orgphno" autocomplete="off" value="<?=$fetchsa["or_phone"]?>">
													</div>
													<div class="form-group col-lg-6">
														<label class="col-form-label" for="pno">Organisation Address</label>
														<input type="text" class="form-control form-control-lg" id="orgaddress" readonly placeholder="Organisation Address" name="orgaddress" autocomplete="off" value="<?=$fetchsa["or_address"]?>">
													</div>

													<div class="form-group col-lg-6">
														<label class="col-form-label" for="pno">Registration No</label>
														<input type="text" class="form-control form-control-lg" id="proregno" placeholder="Professional Registration No" name="proregno" autocomplete="off">
													</div>
													<div class="form-group col-lg-6">
														<label class="col-form-label" for="pno">Code</label>
														<input type="text" class="form-control form-control-lg" id="orgcode" readonly placeholder="Organisation Code" name="orgcode" autocomplete="off" value="<?=$fetchsa["or_code"]?>">
													</div>
													<div class="form-group col-lg-6">
														<label class="col-form-label" for="pno">First line Address</label>
														<input type="text" class="form-control form-control-lg" id="1staddress" readonly placeholder="1st Line Address" name="address" autocomplete="off" 
														value="<?=$fetchsa["or_firstaddress"]?>">
													</div>
													<div class="form-group col-lg-6">
														<label class="col-form-label" for="pno">Organisation City</label>
														<input type="text" class="form-control form-control-lg" id="city" readonly placeholder="City" name="city" autocomplete="off" value="<?=$fetchsa["or_city"]?>">
													</div>
													<div class="form-group col-lg-6">
														<label class="col-form-label" for="pno">Post Code</label>
														<input type="text" class="form-control form-control-lg" id="postcode" readonly placeholder="Post Code" name="postcode" autocomplete="off" value="<?=$fetchsa["or_postcode"]?>">
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-form-label" for="mpass">Password</label>
															<input type="password" class="form-control form-control-lg" id="pass" value="" placeholder="Password" autocomplete="off" name="staff_pass">
															<span toggle="#pass" class="ni ni-eye toggle-password field-icon"></span>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="col-form-label" for="rno">Role</label>
															<select name="staff_role" id="role" class="form-control form-control-lg">
																<option value="">-Select-</option>
																<?php
																$role = mysqli_query($con, "SELECT * FROM `tbl_role`");
																while ($datarole = mysqli_fetch_assoc($role)) {
																?>
																	<option value="<?= $datarole['ro_id'] ?>"><?= $datarole['ro_role'] ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</div>
												
													<div class="col-md-12" id="regishide">
														<div class="form-group">
															<input class="btn btn-lg btn-primary" type="submit" value="Save" id="btnstaffdis">
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
	function alsk(id) {
		$.ajax({
			url: "../php/phpcode.php",
			type: "POST",
			data: {
				id: id,
				fetchorgdata: "btn"
			},
			dataType: "JSON",
			success: function(res) {
				$("#orgname").val(res.or_name);
				$("#orgphno").val(res.or_phone);
				$("#orgaddress").val(res.or_address);
				$("#orgcode").val(res.or_code);
				$("#1staddress").val(res.or_firstaddress);
				$("#postcode").val(res.or_postcode);
				$("#city").val(res.or_city);
			}
		})
	}
	//	function fetchadmindata()
	//	{
	//		 $.ajax({    
	//        type: "POST",
	//        url: "phpcode.php", 
	//		data:{adminfetch:"btn"},	            
	//        success: function(response){                    
	//            $("#adata").html(response); 
	//            //alert(response);
	//        }
	//
	//    });
	//	}
	//	$(document).ready(function(){
	//		fetchadmindata();
	//	});
	//	function confirm(id)
	//	{
	//		 Swal.fire({
	//      title: 'Are you sure?',
	//      text: "You won't be able to revert this!",
	//      icon: 'warning',
	//      showCancelButton: true,
	//      confirmButtonText: 'Yes, delete it!'
	//    }).then(function (result) {
	//      if (result.value) {
	//        Swal.fire('Deleted!', 'Admin has been deleted.', 'success');
	//		  deleteadmin(id);
	//      }
	//    });
	//	}
	//	function aprovenotaprove(id,status,email){
	//	
	//	
	//	var name  = status;
	//		var ide = id;
	//		var em = email;
	//
	//		$.ajax({
	//            type: 'POST',
	//            url: 'phpcode.php',
	//            data: {method:name,
	//				   id:ide,
	//				  em:em,
	//				  },
	//			
	//            success: function(data){
	//      
	//                if(data == 'Error'){
	//                   toastr.clear();
	//    NioApp.Toast("<h5>Admin didn't Updated</h5>", 'error',{position:'top-right'});
	//            
	//                }
	//				else if(data == 'Success'){
	//				if(name == 'aapprove') 
	//					{
	//					
	//						 toastr.clear();
	//    NioApp.Toast("<h5>Admin Approval Rejected</h5>", 'error',{position:'top-right'});
	//				fetchadmindata();
	//					}
	//					else{
	//              toastr.clear();
	//    NioApp.Toast("<h5>Admin Approved Successfully</h5>", 'success',{position:'top-right'});
	//				fetchadmindata();
	//					
	//					}
	//                }
	//			
	//           
	//            }
	//        });
	//	};
	//	function deleteadmin(id){
	//		
	//		var vid = id;
	//		$.ajax({
	//            type: 'POST',
	//            url: 'phpcode.php',
	//            data: {vid:vid,deladmin:"btn"},
	//          
	//    
	//         
	//            success: function(data){
	//      
	//                if(data == 'Error'){
	//                    
	//              toastr.clear();
	//    NioApp.Toast("<h5>Admin Didn't Delete</h5>", 'error',{position:'top-right'});
	//                }
	//				else if(data == 'Success'){
	//				
	//          toastr.clear();
	//    NioApp.Toast("<h5>Admin Delete Successfully</h5>", 'error',{position:'top-right'});
	//					fetchadmindata();
	//                }
	//			
	//           
	//            }
	//        });
	//	};
	//	  function openmodal1(id,name,email,address,password,contact) {
	//        $('#id').val(id);
	//        $('#full-name').val(name);
	//        $('#email').val(email);
	//        $('#address').val(address);
	//        $('#password').val(password);
	//        $('#contact').val(contact);
	//  
	//		
	//        $('#modalForm2').modal('show');
	//    };
	//	$("#aupdate").on('submit', function(e){
	//		
	//        	e.preventDefault();
	//		var formdata = new FormData(this);
	//		formdata.append("updatehadmin","btn");
	//        $.ajax({
	//            type: 'POST',
	//            url: 'phpcode.php',
	//            data: formdata,
	//            contentType: false,
	//            processData:false,
	//            beforeSend: function(){
	//                $('#adminupdate').attr("disabled","disabled");
	//                $('#aupdate').css("opacity",".5");
	//            },
	//            success: function(data){
	//      
	//                if(data == 'Error'){
	//                   toastr.clear(); 
	//               NioApp.Toast("<h5>Admin didn't update Successfully</h5>", 'error',{position:'top-right'});
	//                }
	//				else if(data == 'Success'){
	//					$('#aupdate')[0].reset();
	//					toastr.clear();
	//               NioApp.Toast("<h5>Admin Updated Successfully</h5>", 'success',{position:'top-right'});
	//					fetchadmindata();
	//					$('#modalForm2').modal('hide');
	//					
	//                }
	//			
	//                $('#aupdate').css("opacity","");
	//                $("#adminupdate").removeAttr("disabled");
	//            }
	//			
	//        });
	//
	//    });
</script>

</html>
<script>
	$(".toggle-password").click(function() {

$(this).toggleClass("ni-eye-off");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
	//	function managerhie(manager){
	//		if(manager == "2"){
	//			$('#regishide').hide();
	//	}else {
	//		$('#regishide').show();
	//	}
	//}
</script>
<?php
include_once('staffajax/ajax.php');
?>