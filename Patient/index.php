<?php

include_once('../database/db.php');
//if(!isset($_SESSION['superadmin']))
//{
//	header('location:auth-login.php');
//}
if(!isset($_SESSION['patnhs'])){
	header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php
include_once('header.php');
	
	?>

<body class="nk-body bg-lighter npc-default has-sidebar">
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
                                <div class="nk-block">
                                    <div class="row g-gs">
                                    
                                        <div class="col-xxl-12">
                                            <div class="card card-full">
                                                <div class="nk-ecwg nk-ecwg8 h-100">
                                                    <div class="card-inner">
                                                        <div class="card-title-group mb-3">
                                                            <div class="card-title">
                                                                <!--<h6 class="title">Dummy Text</h6>-->
                                                            </div>
                                                        </div>
<!--                                                       <ul class="nav nav-tabs">-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link active" data-toggle="tab" href="#tabItem1">nav</a>-->
<!--    </li>-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link" data-toggle="tab" href="#tabItem2">nav</a>-->
<!--    </li>-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link" data-toggle="tab" href="#tabItem3">nav</a>-->
<!--    </li>-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link" data-toggle="tab" href="#tabItem4">nav</a>-->
<!--    </li>-->
<!--</ul>-->
<div class="tab-content">
    <div class="tab-pane active" id="tabItem1">
<h3 class="nk-block-title page-title">Referal For <?=$fetch["pt_name"]." ".$fetch["pt_surname"]?></h3>
                                            <p>You need to choose an appointment for this referal</p>
    <div class="row">
        <div class="col-md-12">
            <h6>Booking Reference Number </h6>
            <p><?=$_SESSION["patubrn"]?></p>
            <h6>Referal By</h6>
            <p><?=$kop["ur_fname"]." ".$kop["ur_sname"]?></p>
            <button type="button" onclick="javascript:$('#tabItem2').addClass('active');$('#tabItem1').removeClass('active');" class="btn btn-primary">Choose an appointment</button>
        </div>
        
    </div>                                        
    </div>
    <div class="tab-pane" id="tabItem2">
       <form>
         <div class="row">
             <div class="col-md-6 form-group">
                 <label>Appointment Date</label>
                 <input class="form-control" type="date" id="date">
             </div>
             
             <div class="col-md-6 form-group">
                 <label>Appointment Time</label>
                 <input class="form-control" type="time" id="time">
             </div>
         </div>  
           <button type="button" onclick="javascript:$('#tabItem3').addClass('active');$('#tabItem2').removeClass('active');$('#dateee').html($('#date').val()+' '+$('#time').val());" class="btn btn-primary">Next</button>
       
       </form>
    </div>
    <div class="tab-pane" id="tabItem3">
        <h4>Check Details & Book Appointment</h4>
        <p><b>Booking Refference Number:</b> <?=$ubrn?></p>
        <h6>Date And Time</h6>
        <p id="dateee"></p>
        <h6>Organisation Name</h6>
        <p><?=$kop["or_name"]?></p>
        <h6>Organisation Location</h6>
        <p><?=$kop["or_address"]?></p>
        <h6>Referal By</h6>
            <p><?=$kop["ur_fname"]." ".$kop["ur_sname"]?></p>
            <button type="button" onclick="javascript:$.ajax({url:'phpcode.php',type:'POST',data:{referalid:<?=$kop["sp_refferalid"]?>,orid:<?=$kop["orid"]?>,date:$('#date').val(),time:$('#time').val(),ubrn:<?=$ubrn?>,serviceid:<?=$kop["sp_serviceid"]?>,patientid:<?=$kop["sp_patientid"]?>,addappo:'btn'},success:function(res){if(res!='' && res!=null){if(res =='Success'){toastr.clear();NioApp.Toast('<h5>Appointment Book Successfully!</h5>', 'success',{position:'top-right'});}}}})" class="btn btn-primary">Book Appointment</button>
      
    </div>
    <div class="tab-pane" id="tabItem4">
        <p>contnet</p>
    </div>
</div>
                                                    </div><!-- .card-inner -->
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        
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