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
										 <h2 class="nk-block-title fw-normal">Hospitals list</h2>
                                       
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                       
                                        <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
                                            <thead>
                                                <tr class="nk-tb-item nk-tb-head">
                                                    <th class="nk-tb-col nk-tb-col-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                                            <input type="checkbox" class="custom-control-input" id="puid">
                                                            <label class="custom-control-label" for="puid"></label>
                                                        </div>
                                                    </th>
                                                    <th class="nk-tb-col tb-col-sm"><span>Name</span></th>
                                                    <th class="nk-tb-col"><span>Admin name</span></th>
                                                    <th class="nk-tb-col"><span>Status</span></th>
                                                  
                                               
                                                    <th class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-1 my-n1">
                                                            <li class="mr-n1">
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </th>
                                                </tr><!-- .nk-tb-item -->
                                            </thead>
                                            <tbody id="hdata">
												
                                            </tbody>
										
                                        </table><!-- .nk-tb-list -->
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
    <div class="modal fade" tabindex="-1" id="modalForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hospital Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form class="form-validate is-alter" id="hupdate" method="post">
                        <div class="form-group">
                            <label class="form-label" for="full-name">Full Name</label>
                            <div class="form-control-wrap">
								<input type="text" value="" id="id" hidden="true" name="id">
                                <input type="text" class="form-control" id="full-name" name="name" required>
                            </div>
                        </div>
						
                      
                       
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-lg btn-primary" id="hospitalsubmit" value="Save Informations">
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">Hospital Update</span>
                </div>
            </div>
        </div>
    </div>
    <!-- app-root @e -->
  <script src="assets/js/example-toastr.js?ver=2.2.0"></script>
</body>
<script>
	function fetchhospitalsdata()
	{
		 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{hospitalfetch:"btn"},	            
        success: function(response){                    
            $("#hdata").html(response); 
            //alert(response);
        }

    });
	}
	$(document).ready(function(){
		fetchhospitalsdata();
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
        Swal.fire('Deleted!', 'Hospital has been deleted.', 'success');
		  deletehospital(id);
      }
    });
	}
	
	function deletehospital(id){
		
		var vid = id;
		$.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: {vid:vid,delhos:"btn"},
          
    
         
            success: function(data){
      
                if(data == 'Error'){
                    
              toastr.clear();
    NioApp.Toast("<h5>Hospital Didn't Delete</h5>", 'error',{position:'top-right'});
                }
				else if(data == 'Success'){
				
          toastr.clear();
    NioApp.Toast("<h5>Hospital Delete Successfully</h5>", 'success',{position:'top-right'});
					fetchhospitalsdata();
                }
			
           
            }
        });
	};
	function aprovenotaprove(id,status){
	
	
	var name  = status;
		var ide = id;
	

		$.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: {method:name,
				   id:ide,
				
				  },
			
            success: function(data){
 
                if(data == 'Error'){
                   toastr.clear();
    NioApp.Toast("<h5>Hospital didn't Updated</h5>", 'error',{position:'top-right'});
            
                }
				else if(data == 'Success'){
				if(name == 'hactive') 
					{
					
						 toastr.clear();
    NioApp.Toast("<h5>Hospital De-Activated</h5>", 'error',{position:'top-right'});
				fetchhospitalsdata();
					}
					else{
              toastr.clear();
    NioApp.Toast("<h5>Hospital Activated Successfully</h5>", 'success',{position:'top-right'});
				fetchhospitalsdata();
					
					}
                }
			
           
            }
        });
	};
	 function openmodal(id,name) {
        $('#id').val(id);
        $('#full-name').val(name);
  
		
        $('#modalForm').modal('show');
    };
	$("#hupdate").on('submit', function(e){
		
        	e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("updatehospital","btn");
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: formdata,
            contentType: false,
            processData:false,
            beforeSend: function(){
                $('#hospitalsubmit').attr("disabled","disabled");
                $('#hupdate').css("opacity",".5");
            },
            success: function(data){
      
                if(data == 'Error'){
                   toastr.clear(); 
               NioApp.Toast("<h5>Hospital didn't update Successfully</h5>", 'error',{position:'top-right'});
                }
				else if(data == 'Success'){
					$('#hupdate')[0].reset();
					toastr.clear();
               NioApp.Toast("<h5>Hospital Updated Successfully</h5>", 'success',{position:'top-right'});
					fetchhospitalsdata();
					$('#modalForm').modal('hide');
					
                }
			
                $('#hupdate').css("opacity","");
                $("#hospitalsubmit").removeAttr("disabled");
            }
			
        });

    });
	</script>
</html>