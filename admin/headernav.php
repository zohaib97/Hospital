<?php
include_once('connect.php');
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
                            
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown chats-dropdown hide-mb-xs">
<!--										data-toggle="dropdown"-->
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon">
                                            <div class="icon-status icon-status-na"><em class="icon ni ni-comments"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Recent Chats</span>
                                                <a href="#">Setting</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <ul class="chat-list">
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="apps-chats.html">
                                                            <div class="chat-media user-avatar">
                                                                <span>IH</span>
                                                                <span class="status dot dot-lg dot-gray"></span>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Iliash Hossain</div>
                                                                    <span class="time">Now</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">You: Please confrim if you got my last messages.</div>
                                                                    <div class="status delivered">
                                                                        <em class="icon ni ni-check-circle-fill"></em>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item is-unread">
                                                        <a class="chat-link" href="apps-chats.html">
                                                            <div class="chat-media user-avatar bg-pink">
                                                                <span>AB</span>
                                                                <span class="status dot dot-lg dot-success"></span>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Abu Bin Ishtiyak</div>
                                                                    <span class="time">4:49 AM</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">Hi, I am Ishtiyak, can you help me with this problem ?</div>
                                                                    <div class="status unread">
                                                                        <em class="icon ni ni-bullet-fill"></em>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="apps-chats.html">
                                                            <div class="chat-media user-avatar">
                                                                <img src="images/avatar/b-sm.jpg" alt="">
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">George Philips</div>
                                                                    <span class="time">6 Apr</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">Have you seens the claim from Rose?</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="apps-chats.html">
                                                            <div class="chat-media user-avatar user-avatar-multiple">
                                                                <div class="user-avatar">
                                                                    <img src="images/avatar/c-sm.jpg" alt="">
                                                                </div>
                                                                <div class="user-avatar">
                                                                    <span>AB</span>
                                                                </div>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Softnio Group</div>
                                                                    <span class="time">27 Mar</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">You: I just bought a new computer but i am having some problem</div>
                                                                    <div class="status sent">
                                                                        <em class="icon ni ni-check-circle"></em>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="apps-chats.html">
                                                            <div class="chat-media user-avatar">
                                                                <img src="images/avatar/a-sm.jpg" alt="">
                                                                <span class="status dot dot-lg dot-success"></span>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Larry Hughes</div>
                                                                    <span class="time">3 Apr</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">Hi Frank! How is you doing?</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="apps-chats.html">
                                                            <div class="chat-media user-avatar bg-purple">
                                                                <span>TW</span>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Tammy Wilson</div>
                                                                    <span class="time">27 Mar</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">You: I just bought a new computer but i am having some problem</div>
                                                                    <div class="status sent">
                                                                        <em class="icon ni ni-check-circle"></em>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                </ul><!-- .chat-list -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="apps-chats.html">View All</a>
                                            </div>
                                        </div>
                                    </li> 
                                    <li class="dropdown notification-dropdown">
                        <!-- data-toggle="dropdown"-->


                       
<?php
$id=$_SESSION['superadmin'];
$mkj=mysqli_query($con,"SELECT * FROM `admin` where id='$id'");
$kls=mysqli_fetch_array($mkj);
$orid= isset($kls["organization"]);
 $e = mysqli_query($con,"SELECT COUNT(status) AS a FROM orginzation WHERE status ='NOT approved';");
 $row=mysqli_fetch_array($e);
 $w = mysqli_query($con,"SELECT COUNT(status) AS b FROM admin WHERE super_admin = '0' and  status ='not_approve';");
 $num=mysqli_fetch_array($w);
 
 $num1 = $num['b'];
 $num2 = $row['a'];
 $total = $num1 + $num2;
 if($num2 == 0 ){
     ?>
    <a href="#" class="dropdown-toggle nk-quick-nav-icon 1">
    <div class="icon-status icon-status-na"><em class="icon ni ni-bell"></em></div>
</a>
<?php
 }else{


?>
 <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                            <sup class="badge badge-primary rounded-circle" ><?=$num2?></sup>
                        </a>
                        <?php
											
											?>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                            <div class="dropdown-head">
                                <span class="sub-title nk-dropdown-title">Organisation Notifications</span>

                                <!--                                                <a href="#">Mark All as Read</a>-->
                            </div>
                            <div class="dropdown-body">
                                <div class="nk-notification">
                                

                                    <?php
                                    $query = mysqli_query($con,"SELECT * FROM orginzation WHERE  status = 'Not approved'  ORDER BY orid desc limit 1 ");
                                    $num = mysqli_num_rows($query);
                                    if($num>0){
                                            	while($org = mysqli_fetch_array($query))
                                                {
                                            ?>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">New Organisation Registered <br>Requested For
                                                <span>Approval</span></div>
                                            <div class="nk-notification-time">Organisation Name : <?=$org['or_name']?></div>
                                        </div>
                                    </div>
                                    <?php
                                                }
                                            }else{
                                                echo "<p style='text-align:center;margin-top:12px;'>No Organization Avaliable For Approve<p>";
                                            }
                                                $org = mysqli_fetch_array($query);
                                                    ?>

                                </div><!-- .nk-notification -->
                                

                            </div><!-- .nk-dropdown-body -->
                            <div class="dropdown-foot center">
                                <a href="organizationlist.php?status=Not approved" >View All</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    

                    </li>
									<?php
													$email = $_SESSION['superadmin'];
													$query = mysqli_query($con,"SELECT * FROM `admin` WHERE email = '$email' and super_admin = '1'");
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
<!--                                                    <div class="user-status user-status-verified">verified</div>-->
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
<!--
                                                    <li><a href="#"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
-->
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