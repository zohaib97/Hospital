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
										 <h2 class="nk-block-title fw-normal">Refferels list</h2>
                                       
                                    </div>
                                    <div>
										<ul class="nk-menu">
											<li class="nk-menu-item">
												<span class="col-form-label font-weight-bold" style="font-size: 15px; color: black">Worklist Type</span>&nbsp;&nbsp;
												<span class="nk-menu-text col-6"> 
													<select name="worklist" id="worklist" class="form-control">
														<option value="">-- Select --</option>
													
														<option value="Advice Sent">Advice Sent</option>
														<option value="Advice Accepted">Advice Accepted</option>
														<option value="Advice Rejected">Advice Rejected</option>
															<option value="Referrer Sent">Referrer Sent</option>
														<option value="Referrer Accepted">Referrer Accepted</option>
														<option value="Referrer  Rejected">Referrer  Rejected</option>
													
													</select>
												</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<button id="btnshow" style="display: none;" class="btn btn-sm btn-info mt-1 float-right" onClick="workbltdata()">Load Result</button>
											</li>
										</ul>
										
									</div>
									 <br>
									<hr>
									<br>
									<center><span id="hideno">No Result loaded</span></center>
									<br>
                                    <div class="nk-block nk-block-lg" id="rdata" style="display: none;overflow: auto;">
										
                             
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
		data:{refferelfetch :"btn"},	            
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
		data:{refferelfetch1:"btn"},	            
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
		data:{refferelfetch2:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
		}
			if(work == "Advice Sent"){
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{refferelfetch3:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
		}
		if(work == "Advice Accepted"){
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{refferelfetch4:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
		}
		if(work == "Advice Rejected"){
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{refferelfetch5:"btn"},	            
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
