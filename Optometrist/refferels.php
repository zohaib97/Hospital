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
									
									<br>
                                    <div class="nk-block nk-block-lg" id="rdata">
										
                                    </div>
								
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
</html>
