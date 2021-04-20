<?php
//session_start();
include_once('../database/db.php');

if(!isset($_SESSION['consultant'])){
	header('location: ../index.php');
}
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
<!--										data-toggle="dropdown"-->
						<a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
							<div class="icon-status icon-status-na"><em class="icon ni ni-comments"></em></div>
								<sup class="badge badge-primary rounded-circle ml-n1 mt-n2"><?=$fds["a"]?></sup>
						</a>
						<div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
							<div class="dropdown-head">
								<span class="sub-title nk-dropdown-title">Recent Chats</span>
							
							</div>
							<div class="dropdown-body">
								<ul class="chat-list">
								
							<?php
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
							
						
								
								</ul><!-- .chat-list -->
							</div><!-- .nk-dropdown-body -->
						
						</div>
					</li>
					<li class="dropdown notification-dropdown">
							<!--data-toggle="dropdown"-->
						<a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown" style="width: 37px;height: 37px;">
							<i class="icon ni ni-bell"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
							<div class="dropdown-head">
								<span class="sub-title nk-dropdown-title">Notifications</span>
							</div>
							<div class="dropdown-body">
								<div class="nk-notification">
									<?php
									$e = $_SESSION['consultant'];
									$q = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
									$f = mysqli_fetch_array($q);
									$id = $f['ur_id'];
							
									$qq= mysqli_query($con,"SELECT  count(*) as a FROM tbl_consultantrefferels,tbl_refferelattachment WHERE tbl_refferelattachment.ra_refferelid=tbl_consultantrefferels.c_id and c_userid = '$id' and c_status='2'");
									$rfcksj=mysqli_fetch_array($qq);
								
									$reqtype111 = $rfcksj['request_type'] ? $rfcksj['request_type'] :"";
									if($rfcksj["a"] >0){
									?>
									<div class="nk-notification-item dropdown-inner">
										<div class="nk-notification-icon">
											<em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
										</div>
										<div class="nk-notification-content">
											<div class="nk-notification-text">You have New Service Refferels</div>
											
										</div>
									</div>
									<?php }?>
								</div><!-- .nk-notification -->
							</div><!-- .nk-dropdown-body -->
							<div class="dropdown-foot center">
								<a href="servicerefferels.php?reqtype=<?=$reqtype111?>&status=0">View All</a>
							</div>
						</div>
					</li>
					<?php
						$aid = $_SESSION['consultant'];
						$query = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$aid'");
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
									<div class="user-name dropdown-indicator"><?=$fetch["ur_fname"]." ".$fetch['ur_sname']?></div>
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
										<span class="lead-text"><?=$fetch['ur_sname']?></span>
										<span class="sub-text"><?=$fetch['ur_email']?></span>
									</div>
									<?php
									}
									?>
								</div>
							</div>
							<div class="dropdown-inner">
								<ul class="link-list">
									<li><a href="user-profile.php"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
									<li><a href="#"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
									<li><a href="#"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
									<li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
								</ul>
							</div>
							<div class="dropdown-inner">
								<ul class="link-list">
									<li><a href="logout.php"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div><!-- .nk-header-wrap -->
	</div><!-- .container-fliud -->
</div>