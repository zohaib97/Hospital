<?php
include_once('connect.php');
if(!isset($_SESSION['superadmin']))
{
	header('location:auth-login.php');
}
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
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Dashboard</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
													
<!--
                                                    <ul class="nk-block-tools g-3">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Last 30 Days</span></a></li>
                                                                        <li><a href="#"><span>Last 6 Months</span></a></li>
                                                                        <li><a href="#"><span>Last 1 Years</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                                    </ul>
-->
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
								
								<!--<div class="row">-->
								<!--	<div class="col-lg-12 col-md-12 col-12">-->
								<!--		<div class="row">-->
								<!--			<div class="col-lg-6 col-md-6 col-12">-->
												<!-- fetch data service name -->
								<!--				<label for="">Service Name</label>-->
								<!--				<div class="card shadow nk-block nk-block-lg p-3 mb-3" id="servicedata">-->

								<!--				</div> -->
												<!-- fetch data service end -->
								<!--			</div>-->
								<!--			<div class="col-lg-6 col-md-6 col-12">-->
												<!-- fetch data service Location -->
								<!--				<label for="">Service Location</label>-->
								<!--				<div class="card shadow nk-block nk-block-lg p-3 mb-3" id="servicelocation">-->

								<!--				</div> -->
												<!-- fetch data service end -->
								<!--			</div>-->
								<!--			<div class="col-lg-6 col-md-6 col-12">-->
												<!-- fetch data service Appointment -->
								<!--				<label for="">Service Appointment</label>-->
								<!--				<div class="card shadow nk-block nk-block-lg mb-4 p-3" id="serappointment">-->

								<!--				</div> -->
												<!-- fetch data service end -->
								<!--			</div>-->
								<!--		</div>-->
								<!--	</div>-->
								<!--</div>-->
								
                                <?php           
                 $qe = mysqli_query($con, "SELECT COUNT(orid) AS number FROM orginzation");

if($qe)
{


              $hos = mysqli_fetch_assoc($qe);
            }
                
            ?>
                                <div class="nk-block">
                                    <div class="row g-gs">
                                    <a href="organizationlist.php" class="col-xxl-3 col-sm-6">
                                     
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title"> Hospital/Organisation</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php echo $hos['number']?></div>
                                                                <div class="nk-ecwg6-ck">
                                                                    <!-- <canvas class="ecommerce-line-chart-s3" id="todayOrders"></canvas> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </a><!-- .col -->
                                        <?php           
                 $qe = mysqli_query($con, "SELECT COUNT(m_id) AS num FROM services");

                 if($qe)
                 {
              $ser = mysqli_fetch_assoc($qe);
                 }
            ?>
                                <a href="services.php" class="col-xxl-3 col-sm-6">
                                    
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Services</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php  echo $ser['num']?></div>
                                                                <!-- <div class="nk-ecwg6-ck">
                                                                    <canvas class="ecommerce-line-chart-s3" id="todayRevenue"></canvas>
                                                                </div> -->
                                                            </div>
                                                            <!-- <div class="info"><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>2.34%</span><span> vs. last week</span></div> -->
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                   
                                </a>
                                        <?php
                                        $qe = mysqli_query($con, "SELECT COUNT(ur_id) AS number FROM tbl_ruser WHERE ur_role_id = '5' ");
                                        if($qe)
{
                                        $usr = mysqli_fetch_assoc($qe);
}
                                         ?>
                                         <a href="organisationroles.php?role=GP_Refferer" class="col-xxl-3 col-sm-6 mt-2">
                                   
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Gp Refferers</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php echo $usr['number']?></div>
                                                               
                                                            </div>
                                                          
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </a><!-- .col -->
                                        <?php
                                        $qe = mysqli_query($con, "SELECT COUNT(ur_id) AS number FROM tbl_ruser Where ur_role_id = '1'");
                                        if($qe)
{
                                        $usr = mysqli_fetch_assoc($qe);
}
                                         ?>
                                        <a href="organisationroles.php?role=Dentist" class="col-xxl-3 col-sm-6 mt-2">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Dentists</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php echo $usr['number']?></div>
                                                              
                                                            </div>
                                                          
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </a>
                                        <?php
                                        $qe = mysqli_query($con, "SELECT COUNT(ur_id) AS number FROM tbl_ruser Where ur_role_id = '3'");
                                        $usr = mysqli_fetch_assoc($qe);
                                         ?>
                                        <a href="organisationroles.php?role=consultant" class="col-xxl-3 col-sm-6 mt-2">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Consultant</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php echo $usr['number']?></div>
                                                              
                                                            </div>
                                                        
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </a>
                                        <?php
                                        $qe = mysqli_query($con, "SELECT COUNT(ur_id) AS number FROM tbl_ruser Where ur_role_id = '6'");
                                        $usr = mysqli_fetch_assoc($qe);
                                         ?>
                                        <a href="organisationroles.php?role=Optometrist" class="col-xxl-3 col-sm-6 mt-2">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Opticians</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php echo $usr['number']?></div>
                                                              
                                                            </div>
                                                        
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </a>
                                        
                                        <?php
                                        $qe = mysqli_query($con, "SELECT COUNT(id) AS number FROM admin where super_admin = '0'");
                                        $usr = mysqli_fetch_assoc($qe);
                                         ?>
                                        <a href="adminlist.php" class="col-xxl-3 col-sm-6 mt-2">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Admins</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php echo $usr['number']?></div>
                                                              
                                                            </div>
                                                        
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </a>
                                        <!-- <div class="col-xxl-8">
                                            <div class="card card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Dummy Text</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list mt-n2">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>Order No.</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                                                        <div class="nk-tb-col"><span>Amount</span></div>
                                                        <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                                                    </div>
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead"><a href="#">#95954</a></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <div class="user-card">
                                                                <div class="user-avatar sm bg-purple-dim">
                                                                    <span>AB</span>
                                                                </div>
                                                                <div class="user-name">
                                                                    <span class="tb-lead">Dummy Text</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="tb-sub">02/11/2020</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount">4,596.75 <span>USD</span></span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead"><a href="#">#95850</a></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <div class="user-card">
                                                                <div class="user-avatar sm bg-azure-dim">
                                                                    <span>DE</span>
                                                                </div>
                                                                <div class="user-name">
                                                                    <span class="tb-lead">Dummy Text</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="tb-sub">02/02/2020</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount">596.75 <span>USD</span></span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="badge badge-dot badge-dot-xs badge-danger">Canceled</span>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead"><a href="#">#95812</a></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <div class="user-card">
                                                                <div class="user-avatar sm bg-warning-dim">
                                                                    <img src="./images/avatar/b-sm.jpg" alt="">
                                                                </div>
                                                                <div class="user-name">
                                                                    <span class="tb-lead">Dummy Text</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="tb-sub">02/01/2020</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount">199.99 <span>USD</span></span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead"><a href="#">#95256</a></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <div class="user-card">
                                                                <div class="user-avatar sm bg-purple-dim">
                                                                    <span>NL</span>
                                                                </div>
                                                                <div class="user-name">
                                                                    <span class="tb-lead">Dummy Text</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="tb-sub">01/29/2020</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount">1099.99 <span>USD</span></span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="badge badge-dot badge-dot-xs badge-success">Paid</span>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead"><a href="#">#95135</a></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <div class="user-card">
                                                                <div class="user-avatar sm bg-success-dim">
                                                                    <span>CH</span>
                                                                </div>
                                                                <div class="user-name">
                                                                    <span class="tb-lead">Dummy Text</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="tb-sub">01/29/2020</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount">1099.99 <span>USD</span></span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="badge badge-dot badge-dot-xs badge-warning">Due</span>
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>.card -->
                                        <!-- </div> -->
                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
             <?php
				include_once('footer.php');
				if(isset($_SESSION['status']))
				{
					echo(" <script>
					toastr.clear();
    NioApp.Toast('<h5>Login Successfully</h5><p>Your profile has been created successfully.</p>', 'success',{position:'top-right'});</script>");
					unset($_SESSION['status']);
				}
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

</html>

<script>
	// for appointment show
	function appshow(showid){
		var shid = showid;
		
		if($('#app'+shid).prop('checked') == true){
			
			$.ajax({
				url: 'phpcode.php',
				type: 'post',
				data: {shid:shid,appupdbtn:"btn"},
				success: function(data){
					if(data == "doneapp"){
						toastr.clear();
    			NioApp.Toast("<h5>Allow</h5>", 'success',{position:'top-right'});
					}else {
						toastr.clear();
    			NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
					}
				}
			});
			
		}
		// not show
		else{
			
			$.ajax({
				url: 'phpcode.php',
				type: 'post',
				data: {shid:shid,appupdnotallow:"btn"},
				success: function(data){
					if(data == "doneapp"){
						toastr.clear();
    			NioApp.Toast("<h5>Not Allow</h5>", 'success',{position:'top-right'});
					}else {
						toastr.clear();
    			NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
					}
				}
			});
		}	
	}
	
	// for location show
	function locshow(locshowid){
		var locid = locshowid;
		
		if($('#loc'+locid).prop('checked') == true){
			
			$.ajax({
				url: 'phpcode.php',
				type: 'post',
				data: {locid:locid,locupdbtn:"btn"},
				success: function(data){
					if(data == "doneapp"){
						toastr.clear();
    			NioApp.Toast("<h5>Allow</h5>", 'success',{position:'top-right'});
					}else {
						toastr.clear();
    			NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
					}
				}
			});
			
		} // not show
		else{
			
			$.ajax({
				url: 'phpcode.php',
				type: 'post',
				data: {locid:locid,locupdnotbtn:"btn"},
				success: function(data){
					if(data == "doneapp"){
						toastr.clear();
    			NioApp.Toast("<h5>Not Allow</h5>", 'success',{position:'top-right'});
					}else {
						toastr.clear();
    			NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
					}
				}
			});
			
		}
			
		
		
//		if($("input:checkbox[name='ser_appchange']").checked)
//			{
//				alert(shid);
//			}
//		$("input:checkbox[name='ser_appchange']").on('change',function(){
//		$("input:checkbox[name='name='ser_appchange'']:checked").each(function(){
//		if($("#ser_refer").prop('checked') == false){
//			$('#ser_show').attr("readonly",true);
//		}
//		else{
//			$('#ser_show').attr("readonly",false);
//		}
//		});
//	});
		
	}
	
	// for name show
	function snameupdallow(snameshowid){
		var snamecid = snameshowid;
		
		if($('#sname'+snamecid).prop('checked') == true){
			
			$.ajax({
				url: 'phpcode.php',
				type: 'post',
				data: {snamecid:snamecid,snameallbtn:"btn"},
				success: function(data){
					if(data == "doneapp"){
						toastr.clear();
    			NioApp.Toast("<h5>Allow</h5>", 'success',{position:'top-right'});
					}else {
						toastr.clear();
    			NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
					}
				}
			});
			
		} // not show
		else{
			
			$.ajax({
				url: 'phpcode.php',
				type: 'post',
				data: {snamecid:snamecid,snamenotbtn:"btn"},
				success: function(data){
					if(data == "doneapp"){
						toastr.clear();
    			NioApp.Toast("<h5>Not Allow</h5>", 'success',{position:'top-right'});
					}else {
						toastr.clear();
    			NioApp.Toast("<h5>Something Went Wrong</h5>", 'error',{position:'top-right'});
					}
				}
			});
			
		}
			
	
		
//		if($("input:checkbox[name='ser_appchange']").checked)
//			{
//				alert(shid);
//			}
//		$("input:checkbox[name='ser_appchange']").on('change',function(){
//		$("input:checkbox[name='name='ser_appchange'']:checked").each(function(){
//		if($("#ser_refer").prop('checked') == false){
//			$('#ser_show').attr("readonly",true);
//		}
//		else{
//			$('#ser_show').attr("readonly",false);
//		}
//		});
//	});
		
	}
	
	
	// for service name
	function fetchservice(){
		$.ajax({
			url: 'phpcode.php',
			type: 'post',
			data:{serfetchbtn:"btn"},
			success: function(response){
				$('#servicedata').html(response);
			}
		});
	}
	$(document).ready(function(){
		fetchservice();
	});
	
	// for service location
	function fetchlocation(){
		$.ajax({
			url: 'phpcode.php',
			type: 'post',
			data: {serlocfetchbtn:"btn"},
			success: function(response){
				$('#servicelocation').html(response);
			}
		});
	}
	$(document).ready(function(){
		fetchlocation();
	});
	
	// for service appointment
	function fetchappointment(){
		$.ajax({
			url: 'phpcode.php',
			type: 'post',
			data: {serappbtn:"btn"},
			success: function(response){
				$('#serappointment').html(response);
			}
		});
	}
	$(document).ready(function(){
		fetchappointment();
	});
</script>
