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
<!--					<li class="dropdown chats-dropdown hide-mb-xs">-->
<!--										data-toggle="dropdown"-->
<!--						<a href="#" class="dropdown-toggle nk-quick-nav-icon">-->
<!--							<div class="icon-status icon-status-na"><em class="icon ni ni-comments"></em></div>-->
<!--						</a>-->
<!--						<div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">-->
<!--							<div class="dropdown-head">-->
<!--								<span class="sub-title nk-dropdown-title">Recent Chats</span>-->
<!--								<a href="#">Setting</a>-->
<!--							</div>-->
<!--							<div class="dropdown-body">-->
<!--								<ul class="chat-list">-->
<!--									<li class="chat-item">-->
<!--										<a class="chat-link" href="apps-chats.html">-->
<!--											<div class="chat-media user-avatar">-->
<!--												<span>IH</span>-->
<!--												<span class="status dot dot-lg dot-gray"></span>-->
<!--											</div>-->
<!--											<div class="chat-info">-->
<!--												<div class="chat-from">-->
<!--													<div class="name">Iliash Hossain</div>-->
<!--													<span class="time">Now</span>-->
<!--												</div>-->
<!--												<div class="chat-context">-->
<!--													<div class="text">You: Please confrim if you got my last messages.</div>-->
<!--													<div class="status delivered">-->
<!--														<em class="icon ni ni-check-circle-fill"></em>-->
<!--													</div>-->
<!--												</div>-->
<!--											</div>-->
<!--										</a>-->
<!--									</li><!-- .chat-item -->
<!--									<li class="chat-item is-unread">-->
<!--										<a class="chat-link" href="apps-chats.html">-->
<!--											<div class="chat-media user-avatar bg-pink">-->
<!--												<span>AB</span>-->
<!--												<span class="status dot dot-lg dot-success"></span>-->
<!--											</div>-->
<!--											<div class="chat-info">-->
<!--												<div class="chat-from">-->
<!--													<div class="name">Abu Bin Ishtiyak</div>-->
<!--													<span class="time">4:49 AM</span>-->
<!--												</div>-->
<!--												<div class="chat-context">-->
<!--													<div class="text">Hi, I am Ishtiyak, can you help me with this problem ?</div>-->
<!--													<div class="status unread">-->
<!--														<em class="icon ni ni-bullet-fill"></em>-->
<!--													</div>-->
<!--												</div>-->
<!--											</div>-->
<!--										</a>-->
<!--									</li><!-- .chat-item -->
<!--									<li class="chat-item">-->
<!--										<a class="chat-link" href="apps-chats.html">-->
<!--											<div class="chat-media user-avatar">-->
<!--												<img src="images/avatar/b-sm.jpg" alt="">-->
<!--											</div>-->
<!--											<div class="chat-info">-->
<!--												<div class="chat-from">-->
<!--													<div class="name">George Philips</div>-->
<!--													<span class="time">6 Apr</span>-->
<!--												</div>-->
<!--												<div class="chat-context">-->
<!--													<div class="text">Have you seens the claim from Rose?</div>-->
<!--												</div>-->
<!--											</div>-->
<!--										</a>-->
<!--									</li><!-- .chat-item -->
<!--									<li class="chat-item">-->
<!--										<a class="chat-link" href="apps-chats.html">-->
<!--											<div class="chat-media user-avatar user-avatar-multiple">-->
<!--												<div class="user-avatar">-->
<!--													<img src="images/avatar/c-sm.jpg" alt="">-->
<!--												</div>-->
<!--												<div class="user-avatar">-->
<!--													<span>AB</span>-->
<!--												</div>-->
<!--											</div>-->
<!--											<div class="chat-info">-->
<!--												<div class="chat-from">-->
<!--													<div class="name">Softnio Group</div>-->
<!--													<span class="time">27 Mar</span>-->
<!--												</div>-->
<!--												<div class="chat-context">-->
<!--													<div class="text">You: I just bought a new computer but i am having some problem</div>-->
<!--													<div class="status sent">-->
<!--														<em class="icon ni ni-check-circle"></em>-->
<!--													</div>-->
<!--												</div>-->
<!--											</div>-->
<!--										</a>-->
<!--									</li><!-- .chat-item -->
<!--									<li class="chat-item">-->
<!--										<a class="chat-link" href="apps-chats.html">-->
<!--											<div class="chat-media user-avatar">-->
<!--												<img src="images/avatar/a-sm.jpg" alt="">-->
<!--												<span class="status dot dot-lg dot-success"></span>-->
<!--											</div>-->
<!--											<div class="chat-info">-->
<!--												<div class="chat-from">-->
<!--													<div class="name">Larry Hughes</div>-->
<!--													<span class="time">3 Apr</span>-->
<!--												</div>-->
<!--												<div class="chat-context">-->
<!--													<div class="text">Hi Frank! How is you doing?</div>-->
<!--												</div>-->
<!--											</div>-->
<!--										</a>-->
<!--									</li><!-- .chat-item -->
<!--									<li class="chat-item">-->
<!--										<a class="chat-link" href="apps-chats.html">-->
<!--											<div class="chat-media user-avatar bg-purple">-->
<!--												<span>TW</span>-->
<!--											</div>-->
<!--											<div class="chat-info">-->
<!--												<div class="chat-from">-->
<!--													<div class="name">Tammy Wilson</div>-->
<!--													<span class="time">27 Mar</span>-->
<!--												</div>-->
<!--												<div class="chat-context">-->
<!--													<div class="text">You: I just bought a new computer but i am having some problem</div>-->
<!--													<div class="status sent">-->
<!--														<em class="icon ni ni-check-circle"></em>-->
<!--													</div>-->
<!--												</div>-->
<!--											</div>-->
<!--										</a>-->
<!--									</li><!-- .chat-item -->
<!--								</ul><!-- .chat-list -->
<!--							</div><!-- .nk-dropdown-body -->
<!--							<div class="dropdown-foot center">-->
<!--								<a href="apps-chats.html">View All</a>-->
<!--							</div>-->
<!--						</div>-->
<!--					</li>-->
					<li class="dropdown notification-dropdown" >
<!--										 data-toggle="dropdown"-->
						<a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown" style="width: 37px;height: 37px;">
							<i class="icon ni ni-bell"></i>
							<?php 
								$q1 = mysqli_query($con,"SELECT count(*) as a FROM `tbl_ruser` WHERE ur_orgtype = '$org' and ur_role_id = '1' and ur_status='not_approve'");
								$f1=mysqli_fetch_array($q1);
									$q2 = mysqli_query($con,"SELECT count(*) as a FROM `tbl_ruser` WHERE ur_orgtype = '$org' and ur_role_id = '3' and ur_status='not_approve'");
								$f2=mysqli_fetch_array($q2);
									$q3 = mysqli_query($con,"SELECT count(*) as a FROM `tbl_ruser` WHERE ur_orgtype = '$org' and ur_role_id = '4' and ur_status='not_approve'");
								$f3=mysqli_fetch_array($q3);
									$q4 = mysqli_query($con,"SELECT count(*) as a FROM `tbl_ruser` WHERE ur_orgtype = '$org' and ur_role_id = '5' and ur_status='not_approve'");
								$f4=mysqli_fetch_array($q4);
								$jk=mysqli_query($con,"SELECT  count(*) as a FROM `services`,tbl_serviceappointment WHERE services.m_id and tbl_serviceappointment.sp_serviceid and services.s_orgid ='$org'");
 $klsa=mysqli_fetch_array($jk);
 $fj=$klsa["a"];
								$q5 = mysqli_query($con,"SELECT count(*) as a,nhsno FROM `tbl_app` WHERE orid = '$org'");
								$f5=mysqli_fetch_array($q5);
								
								$total =$f1["a"]+$f2["a"]+$f3["a"]+$f4["a"]+$f5["a"]+$fj;
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
											<div class="nk-notification-time"><a href="dentist.php">View All</a></div>
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
											<div class="nk-notification-text">You have new <span> Service Appointment </span></div>
											
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
											<div class="nk-notification-time"><a href="consultant.php">View All</a></div>
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
											<div class="nk-notification-time"><a href="nurse.php">View All</a></div>
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
											<div class="nk-notification-time"><a href="generalp.php">View All</a></div>
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
									<em class="icon ni ni-user-alt"></em>
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