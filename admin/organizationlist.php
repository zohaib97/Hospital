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
#hdata{
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
										 <h2 class="nk-block-title fw-normal">Organisation list</h2>
                                  
                                  
                                  <div class="mx-auto col-md-6">
                                      <label class="">Select Organisation Type</label>
                                      <?php
                                      if(isset($_GET['status']))
                                      {
                                          $status = $_GET['status'];
                                      }
                                      ?>
                                      <input type="text" name="orgstatus" id="orgstatus" value="" hidden>
                                       <select onchange="fetchhospitalsdata(this.value)" class="form-control mx-auto">
                                                <option value="">--Select--</option>
                                               <option value="Approved">Approved</option>
                                               <option value="Not approved"> Not Approved</option>
                                           </select>
                                     
                                       </div>
                                    </div>
                                     <a href="createorginaztion.php" class="btn btn-primary float-right mb-2">Create Organisation</a><br>
                                     <br><br>
                                    <div class="nk-block nk-block-lg" id="hdata" style="overflow:auto;">
                                       
                                       <!-- .nk-tb-list -->
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
                    <h5 class="modal-title">Organisation Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form class="form-validate is-alter" id="orupdate" method="post">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="full-name">Organisation Name</label>
                            <div class="form-control-wrap">
								<input type="text" value="" id="id" hidden="true" name="id">
                                <input type="text" class="form-control" id="full-name" name="name" required>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-form-label" for="otype">Organisation Type</label>
                            <select  class="form-control form-control-lg js-example-tags" id="otype" name="otype" required>
                            <?php
                            $sql = mysqli_query($con,"SELECT * FROM organisation_type");
                        if(mysqli_num_rows($sql)>0)
                        {

                        
                            while($fetc = mysqli_fetch_array($sql))
                            {
                            ?>
                            <option value="<?=$fetc['ort_name']?>"><?=$fetc['ort_name']?></option>
                            <?php
                            }
                        }
                            ?>
                            </select>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        
                        <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-form-label" for="ocontact">Organisation Phone no</label>
                            <input type="number" class="form-control form-control-lg " id="ocontact" placeholder="Enter Contact" name="ocontact" required autocomplete="off" onchange="stringlength(this.value)">
                        <small id="valid-nhs"></small>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-form-label" for="ocode">Organisation Code</label>
                            <input type="text" class="form-control form-control-lg " id="ocode" placeholder="Enter Code" name="ocode" required autocomplete="off" onchange="stringlength1(this.value)">
                        <small id="valid-nhs1"></small>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        
                        <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-form-label" for="ofaddress">First Line Address</label>
                        <input type="text" class="form-control form-control-lg " id="ofaddress" placeholder="Enter First Line Address" name="ofaddress" required autocomplete="off">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-form-label" for="oaddress">Second Line Address</label>
                        <input type="text" class="form-control form-control-lg " id="oaddress" placeholder="Enter Second Line Address" name="oaddress" required autocomplete="off">
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        
                        <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-form-label" for="ocity">Organisation City</label>
                        <input type="text" class="form-control form-control-lg mt-3" id="ocity" placeholder="Enter City" name="ocity" required autocomplete="off">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-form-label" for="opost">Organisation Post code</label>
                        <input type="text" class="form-control form-control-lg " id="opost" placeholder="Enter Post Code" name="opost" required autocomplete="off" onchange="stringlength2(this.value)">
                    <small id="valid-nhs2"></small>
                        </div>
                        </div>
                        </div>
						<div class="form-group mt-2">
                            <input type="submit" class="btn btn-lg btn-primary" id="organisationsubmit" value="Save Informations">
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

	function fetchhospitalsdata(status)
	{
		 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{status:status,orginaztionfetch:"btn"},	            
        success: function(response){                    
            $("#hdata").html(response); 
            //alert(response);
        }

    });
	}

<?php
                                      if(isset($_GET['status']))
                                      {
                                          $status = $_GET['status'];
                                          if($status == "Not approved")
                                          {
                                              
                                        
                                      ?>
                                     
		$(document).ready(function(){
	    var status="Not approved";
		fetchhospitalsdata(status);
	});
	<?php
                }
            
                    }
                    else{
	?>
	     	$(document).ready(function(){
	    var status="Approved";
		fetchhospitalsdata(status);
	});
	<?php
                    }
	?>
	
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
            data: {vid:vid,delorg:"btn"},
          
    
         
            success: function(data){
      
                if(data == 'Error'){
                    
              toastr.clear();
    NioApp.Toast("<h5>Organization Didn't Delete</h5>", 'error',{position:'top-right'});
                }
				else if(data == 'Success'){
				
          toastr.clear();
    NioApp.Toast("<h5>Organization Delete Successfully</h5>", 'success',{position:'top-right'});
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
            dataType: 'JSON',
            data: {method:name,
				   id:ide,
				
				  },
			
            success: function(data){
 
                if(data['res'] == 'Error'){
                   toastr.clear();
    NioApp.Toast("<h5>"+data['name']+" didn't Updated</h5>", 'error',{position:'top-right'});
            
                }
				else if(data['res'] == 'Success'){
			
						 toastr.clear();
    NioApp.Toast("<h5>"+data['name']+" De-Activated Successfully</h5>", 'success',{position:'top-right'});
    var status="Not approved";
				fetchhospitalsdata(status);
					}
					else if(data['res'] == "Successs") {
              toastr.clear();
    NioApp.Toast("<h5>"+data['name']+" Activated Successfully</h5>", 'success',{position:'top-right'});
				var status="Approved";
				fetchhospitalsdata(status);
					
					
                }
			
           
            }
        });
	};
	
	 function openmodal(id,name,type,address,phone,code,firstaddress,city,postcode) {
        $('#id').val(id);
        $('#full-name').val(name);
		$('#otype').val(type);
      
        $.ajax({
            type: 'POST',
            url: 'phpcode.php',
            data: {type:type,fetchtype:"btn"},
        
          
            success: function(data){
        
                $("#otype").html(data); 
                $('#ocontact').val(phone);
        $('#ocode').val(code);
        $('#ofaddress').val(firstaddress);
        $('#oaddress').val(address);
        $('#ocity').val(city);
        $('#opost').val(postcode);
        
        
        $('#modalForm').modal('show');
            }
			
        });
       
    };

    $("#orupdate").on('submit', function(e){
		
        e.preventDefault();
    var formdata = new FormData(this);
    formdata.append("updateorginaztion","btn");
    $.ajax({
        type: 'POST',
        url: 'phpcode.php',
        data: formdata,
        contentType: false,
        processData:false,
        beforeSend: function(){
            $('#organisationsubmit').attr("disabled","disabled");
            $('#orupdate').css("opacity",".5");
        },
        success: function(data){

            if(data == 'Error'){
               toastr.clear(); 
           NioApp.Toast("<h5>Organisation Didn't Update Successfully</h5>", 'error',{position:'top-right'});
            }else if (data == "alreadynhs"){
                toastr.clear();
           NioApp.Toast("<h5>Already Organisation Created</h5>", 'error',{position:'top-right'});
            }
            else if(data == "sss")
                {
                $('#orupdate')[0].reset();
                toastr.clear();
                
           NioApp.Toast("<h5>Organisation Updated Successfully</h5>", 'success',{position:'top-right'});
                setTimeout(function(){window.location.href="organizationlist.php";}, 2000);
            }
            else if(data == "postcodealready")
            {
                 NioApp.Toast("<h5>Postcode Already Registered</h5>", 'warning',{position:'top-right'});
            }
            else if(data == "orcodealready")
            {
                 NioApp.Toast("<h5>Organisation Code Already Registered</h5>", 'warning',{position:'top-right'});
            }
        
            $('#orupdate').css("opacity","");
            $("#organisationsubmit").removeAttr("disabled");
        }
        
    });

});


	
	$("#hupdate").on('submit', function(e){
        	e.preventDefault();
		
		var hname = $('#full-name').val();
		
		if(hname != ''){
			
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
		}else {
			toastr.clear();
			NioApp.Toast("<h5>Write Something</h5>", 'error',{position:'top-right'});
			document.getElementById("full-name").style.borderColor = "red";
		}
    });
	</script>
</html>