<?php



include_once('../database/db.php');

if(!isset($_SESSION['a_id'])){
	header('location: ../index.php');
}
$aid =$_SESSION["a_id"];
$qiu=mysqli_query($con,"SELECT * FROM `admin`,orginzation where admin.organization = orginzation.orid and admin.id='$aid'");
$fetchsa=mysqli_fetch_array($qiu);
    $org = $fetchsa['organization'];
 
    
?> 

<div class="nk-header nk-header-fixed is-light">
	<div class="container-fluid">
		<div class="nk-header-wrap">
			<div class="nk-menu-trigger d-xl-none ml-n1">
				<a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
			</div>
			<div class="nk-header-brand d-xl-none">
				<a href="index.html" class="logo-link">
					<img class="logo-light logo-img" src="images/logo1.png"  alt="logo">
					<img class="logo-dark logo-img" src="images/logo1.png" alt="logo-dark">
				</a>
			</div><!-- .nk-header-brand -->
			<div class="nk-header-search ml-3 ml-xl-0">
				<em class="icon ni ni-search"></em>
				<input type="text" class="form-control border-transparent form-focus-none" placeholder="Search anything">
			</div><!-- .nk-header-news -->
			<div class="nk-header-tools">
				<ul class="nk-quick-nav">
					<li class="dropdown chats-dropdown hide-mb-xs">
										<?php
											if(isset($_SESSION['gprefferer'])){
												$loginem = $_SESSION['gprefferer'];
			$idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
			$dataid = mysqli_fetch_assoc($idq);
			$senderid = $dataid['ur_id'];
// 		echo $senderid;
						$ks=mysqli_query($con,"SELECT * FROM `orginzation` where orid ='$orid'");
						$klo=mysqli_fetch_array($ks);
									$qqqq = mysqli_query($con,"SELECT count(*) as a FROM tbl_consultantrefferels,tbl_refferelattachment WHERE tbl_refferelattachment.ra_refferelid=tbl_consultantrefferels.c_id and tbl_consultantrefferels.c_gpid = '$senderid' and reply='1' and status = 'unseen' ");
									$fds=mysqli_fetch_array($qqqq);
									$mss = mysqli_query($con,"SELECT * FROM tbl_consultantrefferels,tbl_refferelattachment WHERE tbl_refferelattachment.ra_refferelid=tbl_consultantrefferels.c_id and tbl_consultantrefferels.c_gpid = '$senderid' and reply='1' and status = 'unseen'");
									$fff111= mysqli_fetch_array($mss);
									$reqtype111 = $fff111['request_type'] ? $fff111['request_type'] :"";
									$cid = $fff111['ra_sender_id'] ? $fff111['ra_sender_id'] :"";
									$query = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_id` = '$cid'");
						$cfetch = mysqli_fetch_array($query);
												}
												if(isset($_SESSION['consultant'])){
												    	$loginem = $_SESSION['consultant'];
			$idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
			$dataid = mysqli_fetch_assoc($idq);
			$senderid = $dataid['ur_id'];
// 		echo $senderid;
						$ks=mysqli_query($con,"SELECT * FROM `orginzation` where orid ='$orid'");
						$klo=mysqli_fetch_array($ks);
									$qqqq = mysqli_query($con,"SELECT count(*) as a FROM tbl_consultantrefferels,tbl_refferelattachment WHERE tbl_refferelattachment.ra_refferelid=tbl_consultantrefferels.c_id and tbl_consultantrefferels.c_userid = '$senderid' and reply='0' and status = 'unseen'");
									$fds=mysqli_fetch_array($qqqq);
									$mss = mysqli_query($con,"SELECT * FROM tbl_consultantrefferels,tbl_refferelattachment WHERE tbl_refferelattachment.ra_refferelid=tbl_consultantrefferels.c_id and tbl_consultantrefferels.c_userid = '$senderid' and reply='0' and status = 'unseen'");
									$fff111= mysqli_fetch_array($mss);
									$reqtype111 = $fff111['request_type'] ? $fff111['request_type'] :"";
									$cid = $fff111['ra_sender_id'] ? $fff111['ra_sender_id'] :"";
									$query = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_id` = '$cid'");
						$cfetch = mysqli_fetch_array($query);
												}
										?>
						<a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
							<div class="icon-status icon-status-na"><em class="icon ni ni-comments"></em></div>
							<sup class="badge badge-primary rounded-circle ml-n1 mt-n2"><?=$fds["a"]?></sup>
						</a>
						
						<div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
						
							<div class="dropdown-body">
								<ul class="chat-list">
								    <?php
								    
								    if(isset($_SESSION['gprefferer'])){
									if($fds["a"] >0){
									  echo '	<li class="chat-item">
										<a class="chat-link" href="refferels.php?status='.$fff111['c_status'].'&reqtype='.$fff111['request_type'].'">
											<div class="chat-media user-avatar">
												<span>IH</span>
												<span class="status dot dot-lg dot-gray"></span>
											</div>
											<div class="chat-info">
												<div class="chat-from">
													<div class="name">'.$cfetch['ur_fname']." ".$cfetch['ur_sname'].'</div>
													<span class="time">Now</span>
												</div>
												<div class="chat-context">
													<div class="text"><span>You have New Refferel Reply From '.$cfetch['ur_fname']." ".$cfetch['ur_sname'].'</span></div>
													<div class="status delivered">
														<em class="icon ni ni-check-circle-fill"></em>
													</div>
												</div>
											</div>
										</a>
									</li>
										';
									    
									}
								}
									if(isset($_SESSION['consultant'])){
									if($fds["a"] >0){
									  echo '	<li class="chat-item">
										<a class="chat-link" href="servicerefferels.php?status='.$fff111['c_status'].'&reqtype='.$fff111['request_type'].'">
											<div class="chat-media user-avatar">
												<span>IH</span>
												<span class="status dot dot-lg dot-gray"></span>
											</div>
											<div class="chat-info">
												<div class="chat-from">
													<div class="name">'.$cfetch['ur_fname']." ".$cfetch['ur_sname'].'</div>
													<span class="time">Now</span>
												</div>
												<div class="chat-context">
													<div class="text"><span>You have New Refferel Reply From </span></div>
													<div class="status delivered">
														<em class="icon ni ni-check-circle-fill"></em>
													</div>
												</div>
											</div>
										</a>
									</li>
									
										';
									    
									}
								}
									?>
								

								</ul>
							</div>
						
						</div>
					</li>
					<li class="dropdown notification-dropdown" >
<!--										 data-toggle="dropdown"-->
						<a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown" style="width: 37px;height: 37px;">
							<i class="icon ni ni-bell"></i>
							
							<?php 
												if(isset($_SESSION['gprefferer'])){
												$loginem = $_SESSION['gprefferer'];
			$idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
			$dataid = mysqli_fetch_assoc($idq);
			$senderid = $dataid['ur_id'];
// 		echo $senderid;
						$ks=mysqli_query($con,"SELECT * FROM `orginzation` where orid ='$orid'");
						$klo=mysqli_fetch_array($ks);
									$qqqq = mysqli_query($con,"SELECT count(*) as a FROM tbl_consultantrefferels,tbl_refferelattachment WHERE tbl_refferelattachment.ra_refferelid=tbl_consultantrefferels.c_id and tbl_consultantrefferels.c_gpid = '$senderid' and tbl_consultantrefferels.c_status ='2' ");
									$fdsw=mysqli_fetch_array($qqqq);
									$mss = mysqli_query($con,"SELECT * FROM tbl_consultantrefferels,tbl_refferelattachment WHERE tbl_refferelattachment.ra_refferelid=tbl_consultantrefferels.c_id and tbl_consultantrefferels.c_gpid = '$senderid' and tbl_consultantrefferels.c_status ='2' ");
									$fff111= mysqli_fetch_array($mss);
									$reqtype111 = $fff111['request_type'] ? $fff111['request_type'] :"";
									$cid = $fff111['ra_sender_id'] ? $fff111['ra_sender_id'] :"";
									$query = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_id` = '$cid'");
						$cfetch = mysqli_fetch_array($query);
												}
												if(isset($_SESSION['consultant'])){
												    	$loginem = $_SESSION['consultant'];
			$idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
			$dataid = mysqli_fetch_assoc($idq);
			$senderid = $dataid['ur_id'];
// 		echo $senderid;
						$ks=mysqli_query($con,"SELECT * FROM `orginzation` where orid ='$orid'");
						$klo=mysqli_fetch_array($ks);
									$qqqq = mysqli_query($con,"SELECT count(*) as a FROM tbl_consultantrefferels,tbl_refferelattachment WHERE tbl_refferelattachment.ra_refferelid=tbl_consultantrefferels.c_id and tbl_consultantrefferels.c_userid = '$senderid'  and tbl_consultantrefferels.c_status ='2'");
									$fdsw=mysqli_fetch_array($qqqq);
									$mss = mysqli_query($con,"SELECT * FROM tbl_consultantrefferels,tbl_refferelattachment WHERE tbl_refferelattachment.ra_refferelid=tbl_consultantrefferels.c_id and tbl_consultantrefferels.c_userid = '$senderid' and tbl_consultantrefferels.c_status ='2'");
									$fff111= mysqli_fetch_array($mss);
									$reqtype111 = $fff111['request_type'] ? $fff111['request_type'] :"";
									$cid = $fff111['ra_sender_id'] ? $fff111['ra_sender_id'] :"";
									$query = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_id` = '$cid'");
						$cfetch = mysqli_fetch_array($query);
												}
								$q1 = mysqli_query($con,"SELECT count(*) as a FROM `tbl_ruser` WHERE ur_orgtype = '$org' and ur_role_id = '1' and ur_status='not_approve'");
								$f1=mysqli_fetch_array($q1);
									$q2 = mysqli_query($con,"SELECT count(*) as a FROM `tbl_ruser` WHERE ur_orgtype = '$org' and ur_role_id = '3' and ur_status='not_approve'");
								$f2=mysqli_fetch_array($q2);
									$q3 = mysqli_query($con,"SELECT count(*) as a FROM `tbl_ruser` WHERE ur_orgtype = '$org' and ur_role_id = '4' and ur_status='not_approve'");
								$f3=mysqli_fetch_array($q3);
									$q4 = mysqli_query($con,"SELECT count(*) as a FROM `tbl_ruser` WHERE ur_orgtype = '$org' and ur_role_id = '5' and ur_status='not_approve'");
								$f4=mysqli_fetch_array($q4);
								$jk=mysqli_query($con,"SELECT  count(*) as a FROM tbl_serviceappointment JOIN services ON services.service_id = tbl_serviceappointment.sp_serviceid WHERE services.s_orgid ='$org'");
 $klsa=mysqli_fetch_array($jk);
 $fj=$klsa["a"];
 	$jk1=mysqli_query($con,"SELECT  count(*) as a FROM tbl_patientappointment WHERE o_orgid ='$org'");
 $klsa1=mysqli_fetch_array($jk1);
 $fj1=$klsa1["a"];
								$q5 = mysqli_query($con,"SELECT count(*) as a,nhsno FROM `tbl_app` WHERE orid = '$org'");
								$f5=mysqli_fetch_array($q5);
								
								$total =$f1["a"]+$f2["a"]+$f3["a"]+$f4["a"]+$f5["a"]+$fj+$fj1+$fdsw["a"];
							?>
							<sup class="badge badge-primary rounded-circle ml-n1 mt-n2"><?=$total?></sup>
						</a>
						<?php if($total >0){?>
						<div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
							<div class="dropdown-head">
								<span class="sub-title nk-dropdown-title">Notifications</span>
							
							</div>
							
							<div class="dropdown-body">
								<div class="nk-notification">
								
									
									<?php 
									if($f1["a"] > 0){
									    echo '<div class="nk-notification-item dropdown-inner">
										<div class="nk-notification-icon">
											<em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
										</div>
									    <div class="nk-notification-content">
											<div class="nk-notification-text">You have new <span>Dentist for Approval</span></div>
											<div class="nk-notification-time"><a href="consultant.php?role=Dentist">View All</a></div>
										</div>
											</div>
										<hr>';
									}if($f5["a"] > 0){
									    echo '<div class="nk-notification-item dropdown-inner">
										<div class="nk-notification-icon">
											<em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
										</div>
									    <div class="nk-notification-content">
											<div class="nk-notification-text">You have new <span> Appointment From NHS-No : '.$f5["nhsno"].' </span></div>
											
										</div>
											</div>
										<hr>';
									}if($fj > 0){
									    echo '<div class="nk-notification-item dropdown-inner">
										<div class="nk-notification-icon">
											<em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
										</div>
									    <div class="nk-notification-content">
											<div class="nk-notification-text"><a href="serviceappointment.php">You have new <span> Service Appointment </span></a></div>
											
										</div>
											</div>
										<hr>';
									}
									if($fj1 > 0){
									    echo '<div class="nk-notification-item dropdown-inner">
										<div class="nk-notification-icon">
											<em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
										</div>
									    <div class="nk-notification-content">
											<div class="nk-notification-text"><a href="patientappointment.php">You have new <span> Patient Appointment </span></a></div>
											
										</div>
											</div>
										<hr>';
									}
									
										if($f2["a"] > 0){
									    echo '<div class="nk-notification-item dropdown-inner">
										<div class="nk-notification-icon">
											<em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
										</div>
									    <div class="nk-notification-content">
											<div class="nk-notification-text">You have new <span>Consultant for Approval</span></div>
											<div class="nk-notification-time"><a href="consultant.php?role=consultant">View All</a></div>
										</div>
											</div>
										<hr>';
									}
										if($f3["a"] > 0){
									    echo '<div class="nk-notification-item dropdown-inner">
										<div class="nk-notification-icon">
											<em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
										</div>
									    <div class="nk-notification-content">
											<div class="nk-notification-text">You have new <span>Community Nurse for Approval</span></div>
											<div class="nk-notification-time"><a href="consultant.php?role=Nurse">View All</a></div>
										</div>
											</div>
										<hr>';
									}	if($f4["a"] > 0){
									    echo '<div class="nk-notification-item dropdown-inner">
										<div class="nk-notification-icon">
											<em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
										</div>
									    <div class="nk-notification-content">
											<div class="nk-notification-text">You have new <span>General practitioner Referrer for Approval</span></div>
											<div class="nk-notification-time"><a href="consultant.php?role=GP_Refferer">View All</a></div>
										</div>
											</div>
										';
									}
							?>
								
								
								</div><!-- .nk-notification -->
							</div>
						
						</div>
						<?php }?>
					</li>
					<?php
						$aid = $_SESSION['a_id'];
						$query = mysqli_query($con,"SELECT * FROM `admin` WHERE `id` = '$aid' and super_admin = '0'");
						$fetch = mysqli_fetch_array($query);
						if($query)
						{
					?>
					<li class="dropdown user-dropdown">
						<a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
							<div class="user-toggle">
								<div class="user-avatar sm">
									<img src="images/avatar/<?=$fetch['image']?>">
								</div>
								<div class="user-info d-none d-xl-block">
									<div class="user-status user-status-verified">verified</div>
									<div class="user-name dropdown-indicator"><?=$fetch['name']?></div>
								</div>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
							<div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
								<div class="user-card">
									<div class="user-avatar">
<img src="images/avatar/<?=$fetch['image']?>">
									</div>

									<div class="user-info">
										<span class="lead-text"><?=$fetch['name']?></span>
										<span class="sub-text"><?=$fetch['email']?></span>
									</div>
									<?php
									}
									?>
								</div>
							</div>
							<div class="dropdown-inner">
								<ul class="link-list">
									<li><a href="user-profile.php"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
									<li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
								</ul>
							</div>
							<div class="dropdown-inner">
								<ul class="link-list">
									<li><a href="logout.php?id=<?=$fetch['id']?>"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div><!-- .nk-header-wrap -->
	</div><!-- .container-fliud -->
</div>





