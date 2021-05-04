<?php

include_once('../database/db.php');
//if(!isset($_SESSION['superadmin']))
//{
//	header('location:auth-login.php');
//}
if(!isset($_SESSION['consultant'])){
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
                                <?php   
                             $loginem=   $_SESSION['consultant'];
                                $idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
			$dataid = mysqli_fetch_assoc($idq);
			$orgid = $dataid['ur_orgtype'];
				$urid = $dataid['ur_id'];
                 $qe = mysqli_query($con, "SELECT COUNT(m_id) AS number FROM `tbl_consultantrefferels` JOIN `services` ON tbl_consultantrefferels.c_serid = services.service_id WHERE services.s_orgid = '$orgid' and services.ser_priority_urg !='' and services.service_r_t_support = 'Advice Request,' and tbl_consultantrefferels.c_userid = '$urid' and tbl_consultantrefferels.c_status != '3'");


              $hos = mysqli_fetch_assoc($qe);
                
            ?>
                               
                                    <a href="servicerefferels.php?reqtype=Advice request&status=1" class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Urgent Advice Request</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php echo $hos['number']?></div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </a><!-- .col -->
                                    
                                  
                                
                                <?php   
                                $_SESSION['consultant'];
                                $idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
			$dataid = mysqli_fetch_assoc($idq);
			$orgid = $dataid['ur_orgtype'];
				$urid = $dataid['ur_id'];
                 $qe = mysqli_query($con, "SELECT COUNT(m_id) AS number FROM `tbl_consultantrefferels` JOIN `services` ON tbl_consultantrefferels.c_serid = services.service_id WHERE services.s_orgid = '$orgid' and services.ser_priority_rout !='' and services.service_r_t_support = 'Advice Request,' and tbl_consultantrefferels.c_userid = '$urid' and tbl_consultantrefferels.c_status != '3'");


              $hos = mysqli_fetch_assoc($qe);
                
            ?>
           
                                    <a href="servicerefferels.php?reqtype=Advice request&status=1" class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Routine Advice Request</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php echo $hos['number']?></div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </a><!-- .col -->
                                     <?php   
                                $_SESSION['consultant'];
                                $idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
			$dataid = mysqli_fetch_assoc($idq);
			$orgid = $dataid['ur_orgtype'];
				$urid = $dataid['ur_id'];
                 $qe = mysqli_query($con, "SELECT COUNT(m_id) AS number FROM `tbl_consultantrefferels` JOIN `services` ON tbl_consultantrefferels.c_serid = services.service_id WHERE services.s_orgid = '$orgid' and services.ser_priority_urg !='' and services.service_r_t_support = 'Appointment Request,' and tbl_consultantrefferels.c_userid = '$urid' and tbl_consultantrefferels.c_status != '3'");


              $hos = mysqli_fetch_assoc($qe);
                
            ?>
                                      <a href="servicerefferels.php?reqtype=Appointment Request&status=2" class="col-xxl-3 col-sm-6 mt-2">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Urgent Referrals Awaiting Triage</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php echo $hos['number']?></div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </a><!-- .col -->
                                         <?php   
                                $_SESSION['consultant'];
                                $idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
			$dataid = mysqli_fetch_assoc($idq);
			$orgid = $dataid['ur_orgtype'];
			$urid = $dataid['ur_id'];
                 $qe = mysqli_query($con, "SELECT COUNT(m_id) AS number FROM `tbl_consultantrefferels` JOIN `services` ON tbl_consultantrefferels.c_serid = services.service_id WHERE services.s_orgid = '$orgid' and services.ser_priority_rout !='' and services.service_r_t_support = 'Appointment Request,' and tbl_consultantrefferels.c_userid = '$urid' and tbl_consultantrefferels.c_status != '3'");


              $hos = mysqli_fetch_assoc($qe);
                
            ?>
                                        <a href="servicerefferels.php?reqtype=Appointment Request&status=2" class="col-xxl-3 col-sm-6 mt-2">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Routine Referrals Awaiting Triage</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php echo $hos['number']?></div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </a><!-- .col -->
                                        
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