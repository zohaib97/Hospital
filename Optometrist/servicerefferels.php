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
														<option value="">- Select -</option>
														<option value="Advice and Guidance Request">Advice request</option>
														<option value="Advice Responded">Advice Responded</option>
														<option value="Referrals Recieved">Referrals Recieved</option>
														<option value="Referrals Accepted">Referrals Accepted</option>
														<option value="Referals Rejected">Referals Rejected</option>
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
                                  <div class="nk-block nk-block-lg" id="rdata" style="display: none">
										
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
	// for worklist
	
	$("#worklist").on("change", function(){
		document.getElementById('btnshow').style.display = "block";
	});
	
	function workbltdata(){
				
		var work = $("#worklist").val();
		
		if(work == "Advice and Guidance Request"){
		    	 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{serrefferelfetch:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				
		}
	
		
		if(work == "Advice Responded"){
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{serrefferelfetch1:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
		}
	if(work == "Referrals Recieved"){
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{serrefferelfetch2:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
		}
			if(work == "Referrals Accepted"){
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{serrefferelfetch3:"btn"},	            
        success: function(response){                    
            $("#rdata").html(response); 
            //alert(response);
        }

    });
		}
		if(work == "Referals Rejected"){
			document.getElementById('rdata').style.display = "block";
			document.getElementById('hideno').style.display = "none";
				 $.ajax({    
        type: "POST",
        url: "phpcode.php", 
		data:{serrefferelfetch4:"btn"},	            
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
// 	function fetchrefferels1(){
// 		 $.ajax({    
//         type: "POST",
//         url: "phpcode.php", 
// 		data:{serrefferelfetch1:"btn"},	            
//         success: function(response){                    
//             $("#rdata").html(response); 
//             //alert(response);
//         }

//     });
// 	}
// 		function fetchrefferels2(){
// 		 $.ajax({    
//         type: "POST",
//         url: "phpcode.php", 
// 		data:{serrefferelfetch2:"btn"},	            
//         success: function(response){                    
//             $("#rdata").html(response); 
//             //alert(response);
//         }

//     });
// 	}
	$(document).ready(function(){
		fetchrefferels();
	});
	
	function slsl(cid,status){
	    $.ajax({
	        url:"phpcode.php",
	        type:"POST",
	        data:{fekk:"btn",cid:cid,status:status},
	        success:function(res){
	        if(res == "success"){
	            fetchrefferels();
	        }
	        if(res == "successs"){
	            fetchrefferels();
	        }
	        }
	    })
	}
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
