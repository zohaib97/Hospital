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
							
			
                                    <div class="nk-block nk-block-lg" id="">
                                    <div class="card card-preview">
                                            <div class="card-inner">
                                                <form method="post" id="appinsert">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5>Appointment Request Details</h5>
                                                    </div>
                                                    
                                                </div>
                                                <hr>
                                                    <?php
                                                    $appid = $_GET['c_id'];
                                                    $sql = mysqli_query($con,"SELECT * FROM tbl_serviceappointment join `services` ON tbl_serviceappointment.sp_serviceid = services.service_id WHERE sp_id = '$appid'");
                                                    if(mysqli_num_rows($sql)>0)
                                                    {
                                                        $fe = mysqli_fetch_array($sql);
                                                        $spid = $fe['service_speciality'];
                                                        $clid = $fe['ser_cl_type'];
                                              
                                                        $sql1 = mysqli_query($con,"SELECT * FROM ser_specialty_add WHERE spec_id = '$spid'");
                                                        $fe1 = mysqli_fetch_array($sql1);
                                                        $sql2 = mysqli_query($con,"SELECT * FROM service_cliniciant WHERE cl_id = '$clid'");
                                                        $fe2 = mysqli_fetch_array($sql2);
                                                    }
                                                   
                                                    ?>
                                                <div class="tab-content">
                                                    <div class="row">
                                                       
                                                        <div class=" col-md-6 pb-2">
                                            <span>UBRN Created Date : </span><span><?=$fe['sp_createdate']?></span>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-md-6 res">
                                                        <span>UBRN : </span><span><?=$fe['sp_ubrn']?></span>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-md-6 res" id="btn2">
                                                        <span>Speciality : </span><span><?=$fe1['spec_name']?></span>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-md-6 res" id="btn2">
                                                        <span>Clinic Type : </span><span><?=$fe2['cl_type']?></span>
                                                        </div>
                                                        </div>
                                                  
                                                    <br>
                                                    

                                                </div>
                                                <div class="mb-4" id="tabItem6">
                                                <table class="nowrap nk-tb-list is-separate table-bordered" data-auto-responsive="false" id="myTable">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
					<!-- <th class="nk-tb-col nk-tb-col-check">
						<div class="custom-control custom-control-sm custom-checkbox notext">
							<input type="checkbox" class="custom-control-input" id="puid">
							<label class="custom-control-label" for="puid"></label>
						</div>
					</th> -->
					<th class="nk-tb-col tb-col-sm"><span>Location</span></th>
				
					<th class="nk-tb-col"><span>Refferer Alert</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>Organisation Type</span></th>
					<th class="nk-tb-col"><span>Indicative Wait time</span></th>
					
					
					
				</tr><!-- .nk-tb-item -->
			</thead>
            <tbody id="">
            <?php
            $q = mysqli_query($con,"SELECT * FROM tbl_serviceappointment join services ON tbl_serviceappointment.sp_serviceid = services.service_id WHERE sp_id = '$appid'");
            $f = mysqli_fetch_array($q);
            $sname =$f['service_name'];
            $q1 = mysqli_query($con,"SELECT * FROM `service_name` WHERE s_id = '$sname'");
            $f1 = mysqli_fetch_array($q1);
            ?>
            <tr class="nk-tb-item">
	<!-- <td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input gg" name="check[]" value="'.$id.'" id="check'.$id.'" checked="">
			<label class="custom-control-label" for="check'.$id.'" onclick=""></label>
		</div>
	</td> -->
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title"><?=$f['service_location']?></span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead"><?=$f['service_refer']?></span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead"><?=$f1['s_name']?></span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead"></span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead"><?=$f['sp_iwt']?></span>
	</td>

            </tr>
            </tbody>
                                                </table>

                                                </div>
                                                <div class="mb-4" id="tabItem7">
                                                

                                                </div>
                                                <div class="mb-4" id="tabItem8">
                                                <div class=" col-md-3 pb-2">
                                                          
                                                        </div>

                                                </div>

                                                <a href="clinical-ref-info.php?c_id=<?=$appid?>" class="btn btn-info">Next</a>
                                                </form>
                                            </div>
                                        </div>
                             
                                    </div>
									<!-- <form method="post" id="attach" style="display: none;">
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
								
										</form> -->
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
	function fetchrefferels()
	{
		 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{refferelfetch:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
	}
	$(document).ready(function(){
		fetchrefferels();
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
//	
//	function aprovenotaprove(id,status,email)
//	{
//	
//		var name  = status;
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
//	
//	function deleteadmin(id)
//	{
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
//	
//	  function openmodal1(id,name,email,address,password,contact)
//	{
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
//	
//	
	$("#attach").on('submit', function(e)
					 {
        	e.preventDefault();
		
		
		

		
		var formdata = new FormData(this);
		formdata.append("consultantdata","btn");
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
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
	
	<script>
	// for worklist
	
	$("#worklist").on("change", function(){
		document.getElementById('btnshow').style.display = "block";
	});
	function workbltdata(){
				
		var work = $("#worklist").val();
		
													
		if(work == "Referrer Sent"){
		    	 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{apprefferelfetch :"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				
		}
	
		
		if(work == "Referrer Accepted"){
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{apprefferelfetch1:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
		}
	if(work == "Referrer  Rejected"){
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{apprefferelfetch2:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
		}
			if(work == "Appointment booked"){
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{apprefferelfetch3:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
		}
		if(work == "Appointment Attended"){
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{apprefferelfetch4:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
		}
		if(work == "Appointment  Outcome"){
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{apprefferelfetch5:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
		}if(work == "Appointment DNA"){
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{apprefferelfetch6:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
		}if(work == "Appointment Cancelled"){
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{apprefferelfetch7:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
		}
		
	};
	
	
		
	function fetchrefferels()
	{
		 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{serrefferelfetch:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
	}

	$(document).ready(function(){
		fetchrefferels();
	});

	</script>
</html>
