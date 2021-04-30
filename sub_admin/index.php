<?php

include_once('../database/db.php');
//if(!isset($_SESSION['superadmin']))
//{
//	header('location:auth-login.php');
//}
if(!isset($_SESSION['a_id'])){
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
                                
                           $id = $_SESSION['a_id'];
								$sql = mysqli_query($con,"SELECT * FROM admin WHERE id = '$id'");
								$fetch = mysqli_fetch_array($sql);
								$orgid = $fetch['organization'];
							
								$sql1 = mysqli_query($con,"SELECT * FROM orginzation WHERE orid = '$orgid'");
								$fetch1 = mysqli_fetch_array($sql1);
								$ortype = $fetch1['or_type'];
                           if($ortype == "NHS Hospital")
                           {
                               $qe = mysqli_query($con, "SELECT COUNT(c_id) AS number FROM tbl_consultantrefferels WHERE c_orgid = '$orgid' ");
                        
               


              $hos = mysqli_fetch_assoc($qe);
                
            ?>
                               
                                        <!--<div class="col-xxl-3 col-sm-6">-->
                                        <!--    <div class="card">-->
                                        <!--        <div class="nk-ecwg nk-ecwg6">-->
                                        <!--            <div class="card-inner">-->
                                        <!--                <div class="card-title-group">-->
                                        <!--                    <div class="card-title">-->
                                        <!--                        <h6 class="title">TOTAL REFFERS</h6>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="data">-->
                                        <!--                    <div class="data-group">-->
                                        <!--                        <div class="amount"><?php echo $hos['number']?></div>-->
                                        <!--                        <div class="nk-ecwg6-ck">-->
                                        <!--                            <canvas class="ecommerce-line-chart-s3" id="todayOrders"></canvas>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--            </div><!-- .card-inner -->
                                        <!--        </div><!-- .nk-ecwg -->
                                        <!--    </div><!-- .card -->
                                        <!--</div>-->
                                        <!-- .col -->
                                        <?php  
                           }
                           if($ortype != "NHS Hospital")
                           {
                               $aid =$_SESSION["a_id"];
                               $qiu=mysqli_query($con,"SELECT * FROM `admin`,orginzation where admin.organization = orginzation.orid and admin.id='$aid'");
$fetchsa=mysqli_fetch_array($qiu);
    $org = $fetchsa['organization'];
                 $qe = mysqli_query($con, "SELECT COUNT(pt_id) AS num FROM tbl_patients WHERE pt_orgid = '$org'");


              $ser = mysqli_fetch_assoc($qe);
                $aid1 = $_SESSION['gprefferer'];
						$query = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$aid1'");
						$fetch = mysqli_fetch_array($query);
									$id = $fetch['ur_id'];
									$orid=$fetch["ur_orgtype"];
            ?>
                                
                                        <a href="patientshow.php" class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Total Patients Referred</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php  echo $ser['num']?></div>
                                                              
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </a><!-- .col -->
                                         <a href="refferels.php?reqtype=Appointment Request&status=2" class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Total Referrals Sent</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php
                                                                $q=mysqli_query($con,"SELECT count(*) as a FROM `tbl_consultantrefferels` WHERE c_gpid ='$id' and c_status = '2' and request_type ='Appointment Request'");
                                                                if(mysqli_num_rows($q) >0){
                                                                $r=mysqli_fetch_array($q);
                                                                echo $r["a"];
                                                                }?></div>
                                                               
                                                            </div>
                                                            </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </a><!-- .col -->
                                        <a href="refferels.php?reqtype=Appointment Request&status=1" class="col-xxl-3 col-sm-6 mt-2">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Total Referrals Accepted</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php
                                                                $q=mysqli_query($con,"SELECT count(*) as a FROM `tbl_consultantrefferels` WHERE c_gpid ='$id' and c_status = '1' and request_type ='Appointment Request'");
                                                                if(mysqli_num_rows($q) >0){
                                                                $r=mysqli_fetch_array($q);
                                                                echo $r["a"];
                                                                }?></div>
                                                              
                                                            </div>
                                                            </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </a><!-- .col -->
                                        <a href="refferels.php?reqtype=Appointment Request&status=0" class="col-xxl-3 col-sm-6 mt-2">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Total Referrals Rejected</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"><?php
                                                                $q=mysqli_query($con,"SELECT count(*) as a FROM `tbl_consultantrefferels` WHERE c_gpid ='$id' and c_status = '0' and request_type ='Appointment Request'");
                                                                if(mysqli_num_rows($q) >0){
                                                                $r=mysqli_fetch_array($q);
                                                                echo $r["a"];
                                                                }?></div>
                                                              
                                                            </div>
                                                            </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </a><!-- .col -->
                                     
                                        <?php
                           }
                                        $id = $_SESSION['a_id'];
								$sql = mysqli_query($con,"SELECT * FROM admin WHERE id = '$id'");
								$fetch = mysqli_fetch_array($sql);
								$orgid = $fetch['organization'];
								$sql1 = mysqli_query($con,"SELECT * FROM orginzation WHERE orid = '$orgid'");
								$fetch1 = mysqli_fetch_array($sql1);
								$ortype = $fetch1['or_type'];
                           if($ortype == "NHS Hospital")
                           {
                                        $qe = mysqli_query($con, "SELECT COUNT(u_serid) AS number FROM tbl_service_definer WHERE u_orgid = '$orgid'");
                                        $usr = mysqli_fetch_assoc($qe);
                                       
                                         ?>
                                       <a href="consultant.php?role=ServiceDefiner" class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">SERVICE DEFINER</h6>
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
                                         $loginem=   $_SESSION['consultant'];
                                $idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
			$dataid = mysqli_fetch_assoc($idq);
			$orgid1 = $dataid['ur_orgtype'];
				$urid = $dataid['ur_id'];
                 $qe = mysqli_query($con, "SELECT COUNT(m_id) AS number FROM `tbl_consultantrefferels` JOIN `services` ON tbl_consultantrefferels.c_serid = services.service_id WHERE services.s_orgid = '$orgid1' and services.ser_priority_urg !='' and tbl_consultantrefferels.request_type = 'Advice Request' and tbl_consultantrefferels.c_userid = '$urid'");


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
             
                   $loginem=   $_SESSION['consultant'];
                                $idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
			$dataid = mysqli_fetch_assoc($idq);
			$orgid1 = $dataid['ur_orgtype'];
				$urid = $dataid['ur_id'];
                 $qe = mysqli_query($con, "SELECT COUNT(m_id) AS number FROM `tbl_consultantrefferels` JOIN `services` ON tbl_consultantrefferels.c_serid = services.service_id WHERE services.s_orgid = '$orgid1' and services.ser_priority_rout !='' and tbl_consultantrefferels.request_type = 'Advice Request' and tbl_consultantrefferels.c_userid = '$urid'");


              $hos = mysqli_fetch_assoc($qe);
            
                                        ?>
                                         <a href="servicerefferels.php?reqtype=Advice request&status=1" class="col-xxl-3 col-sm-6 mt-2">
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
             
                  $loginem=   $_SESSION['consultant'];
                                $idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
			$dataid = mysqli_fetch_assoc($idq);
			$orgid1 = $dataid['ur_orgtype'];
				$urid = $dataid['ur_id'];
                 $qe = mysqli_query($con, "SELECT COUNT(m_id) AS number FROM `tbl_consultantrefferels` JOIN `services` ON tbl_consultantrefferels.c_serid = services.service_id WHERE services.s_orgid = '$orgid1' and services.ser_priority_urg !='' and tbl_consultantrefferels.request_type = 'Appointment Request' and tbl_consultantrefferels.c_userid = '$urid'");


              $hos = mysqli_fetch_assoc($qe);
           
                                        ?>
                                         <a href="servicerefferels.php?reqtype=Appointment Request&status=2" class="col-xxl-3 col-sm-6 mt-2">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Urgent Refferals Awaiting Triage</h6>
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
            
                 $loginem=   $_SESSION['consultant'];
                                $idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
			$dataid = mysqli_fetch_assoc($idq);
			$orgid1 = $dataid['ur_orgtype'];
				$urid = $dataid['ur_id'];
                 $qe = mysqli_query($con, "SELECT COUNT(m_id) AS number FROM `tbl_consultantrefferels` JOIN `services` ON tbl_consultantrefferels.c_serid = services.service_id WHERE services.s_orgid = '$orgid1' and services.ser_priority_rout !='' and tbl_consultantrefferels.request_type = 'Appointment Request' and tbl_consultantrefferels.c_userid = '$urid'");


              $hos = mysqli_fetch_assoc($qe);
            
                                        ?>
                                        <a href="servicerefferels.php?reqtype=Appointment Request&status=2" class="col-xxl-3 col-sm-6 mt-2">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Routine Refferals Awaiting Triage</h6>
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
           
                                        ?>
                                        <?php
                           }
                           
                                        $id = $_SESSION['a_id'];
								$sql = mysqli_query($con,"SELECT * FROM admin WHERE id = '$id'");
								$fetch = mysqli_fetch_array($sql);
								$orgid = $fetch['organization'];
								$email = $fetch['email'];
								$sql1 = mysqli_query($con,"SELECT * FROM orginzation WHERE orid = '$orgid'");
								$fetch1 = mysqli_fetch_array($sql1);
								$ortype = $fetch1['or_type'];
								$orname = $fetch1['or_name'];
								$orcode = $fetch1['or_code'];
                           if($ortype == "NHS Hospital")
                           {
                                        $qe = mysqli_query($con, "SELECT COUNT(ur_id) AS number FROM tbl_ruser WHERE ur_role_id ='3' and ur_orgtype = '$orgid' and ur_orgcode = '$orcode' and ur_email != '$email'");
                                        $usr = mysqli_fetch_assoc($qe);
                                         ?>
                                        <a href="consultant.php?role=consultant" class="col-xxl-3 col-sm-6 mt-2">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">TOTAL CONSULTANT</h6>
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
                           }
                            $id = $_SESSION['a_id'];
								$sql = mysqli_query($con,"SELECT * FROM admin WHERE id = '$id'");
								$fetch = mysqli_fetch_array($sql);
								$orgid = $fetch['organization'];
								$email = $fetch['email'];
								$sql1 = mysqli_query($con,"SELECT * FROM orginzation WHERE orid = '$orgid'");
								$fetch1 = mysqli_fetch_array($sql1);
								$ortype = $fetch1['or_type'];
								$orname = $fetch1['or_name'];
								$orcode = $fetch1['or_code'];
                           if($ortype != "NHS Hospital")
                           {
                                $qe = mysqli_query($con, "SELECT COUNT(ur_id) AS number FROM tbl_ruser WHERE ur_role_id ='5' and ur_orgtype = '$orgid' and ur_orgcode = '$orcode' and ur_email != '$email'");
                                        $usr = mysqli_fetch_assoc($qe);
                           
                                       ?>
                                       <a href="consultant.php?role=GP_Refferer" class="col-xxl-3 col-sm-6 mt-2">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Total Registered Dentist</h6>
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
                           }
                                        ?><!-- .col -->
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
                                                </div> -->
                                            <!-- </div>.card -->
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