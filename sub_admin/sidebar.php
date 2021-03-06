<?php
include_once('../database/db.php');
?>

<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu"> 
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand" style="margin-left: -10px;">
                        <a href="index.html" class="logo-link nk-sidebar-logo">
<!--							<img src="images/logo1.png" alt="logo1.png" height="50" width="100">-->
                            <img class="logo-light logo-img" src="./images/logo1.png"alt="logo" width="100">
                            <img class="logo-dark logo-img" src="./images/logo1.png" alt="logo-dark" width="100">
                            <img class="logo-small logo-img logo-img-small" src="./images/logo1-small.png"  alt="logo-small" width="45" >
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                           <?php
                           $id = $_SESSION['a_id'];
								$sql = mysqli_query($con,"SELECT * FROM admin WHERE id = '$id'");
								$fetch = mysqli_fetch_array($sql);
								$orgid = $fetch['organization'];
								$sql1 = mysqli_query($con,"SELECT * FROM orginzation WHERE orid = '$orgid'");
								$fetch1 = mysqli_fetch_array($sql1);
								$ortype = $fetch1['or_type'];
                           ?>
                          
								<!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Dashboards</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="index.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-menu"></em></span>
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>
								<!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Applications</h6>
                                </li>
                             <?php
                           if($ortype == "NHS Hospital")
                           {
                           ?>
								<li class="nk-menu-item">
								  <a href="createserdef.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">Create Service Definer</span>
                                  </a>
								</li>
								<li class="nk-menu-item">
									<a href="createrole.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Create Role</span>
                                  </a>
								</li>
								 <li class="nk-menu-item has-sub">
									
                                    <a href="consultant.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Organisation Management</span>
                                    </a>
                                   
                                </li>
                                <li class="nk-menu-item">
                                    <a href="service.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Services</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="servicename.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Service Names</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
									<a href="locations.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Locations</span>
                                  </a>
								</li>
								<li class="nk-menu-item">
									<a href="servicerefferels.php" class="nk-menu-link">
										<span class="nk-menu-icon"><em class="icon ni ni-swap"></em></span>
										<span class="nk-menu-text">Service Referrels</span>
									</a>
								</li>
                                <li class="nk-menu-item">
									<a href="createroom.php" class="nk-menu-link">
										<span class="nk-menu-icon"><em class="icon ni ni-swap"></em></span>
										<span class="nk-menu-text">Create Room</span>
									</a>
								</li>
                                <?php
                           }
                           elseif($ortype == "GP Practice" || $ortype == "Opticians" || $ortype == "Dental Practice" || $ortype == "Community Hospital")
                           {
                                ?>
								<li class="nk-menu-item has-sub">
								  <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Patients</span>
                                  </a>
                                  <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="patientshow.php" class="nk-menu-link"><span class="nk-menu-text">Patients List</span></a>
                                        </li>
                                    
                                        <li class="nk-menu-item">
                                            <a href="serviceappointment.php" class="nk-menu-link"><span class="nk-menu-text">Service Appointments</span></a>
                                        </li>
										<li class="nk-menu-item">
                                            <a href="patientappointment.php" class="nk-menu-link"><span class="nk-menu-text">Patient Appointments</span></a>
                                        </li>
                                       
                                    </ul><!-- .nk-menu-sub -->
								</li>
								<li class="nk-menu-item">
									<a href="createrole.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Create Role</span>
                                  </a>
								</li>
								<li class="nk-menu-item has-sub">
									
                                    <a href="consultant.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Organisation Management</span>
                                    </a>
                                   
                                </li>
                                <!--<li class="nk-menu-item">-->
                                <!--<a href="Appointment.php" class="nk-menu-link">-->
                                <!--<span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>-->
                                <!--        <span class="nk-menu-text">Appointment</span>-->
                                <!--</a>-->
                                <!--</li>-->
								<li class="nk-menu-item">
									<a href="e-refferelservice.php" class="nk-menu-link">
										<span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">E-Referrel Service</span>
									</a>
								</li>
								<li class="nk-menu-item">
									<a href="refferels.php" class="nk-menu-link">
									<span class="nk-menu-icon"><em class="icon ni ni-swap"></em></span>
										<span class="nk-menu-text">Referrels</span>
									</a>
									</li>
                                <?php
                           }
                                ?>
							
								<!-- .nk-menu-item -->
                               
								<li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Online Users</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="onlineadmins.php" class="nk-menu-link"><span class="nk-menu-text">Admins</span></a>
                                        </li>
                                    
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Managers</span></a>
                                        </li>
										<li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Consultants</span></a>
                                        </li>
										<li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Doctors</span></a>
                                        </li>
										<li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Nurses</span></a>
                                        </li>
										<li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Dentists</span></a>
                                        </li>
										<li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">General practitionals</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li>
								<li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Offline Users</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="offlineadmins.php" class="nk-menu-link"><span class="nk-menu-text">Admins</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Managers</span></a>
                                        </li>
										<li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Consultants</span></a>
                                        </li>
										<li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Doctors</span></a>
                                        </li>
										<li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Nurses</span></a>
                                        </li>
										<li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">Dentists</span></a>
                                        </li>
										<li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link"><span class="nk-menu-text">General practitionals</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                              
                                
                                <!--  <li class="nk-menu-item">-->
                                <!--    <a href="patientappointment.php" class="nk-menu-link">-->
                                <!--        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>-->
                                <!--        <span class="nk-menu-text">Patient Appointment</span>-->
                                <!--    </a>-->
                                <!--</li>-->
                               
                                <!-- <li class="nk-menu-item">-->
                                <!--    <a href="serviceappointment.php" class="nk-menu-link">-->
                                <!--        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>-->
                                <!--        <span class="nk-menu-text">Service Appointment</span>-->
                                <!--    </a>-->
                                <!--</li>-->
                                
								<!-- .nk-menu-item -->
<!--
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-table-view-fill"></em></span>
                                        <span class="nk-menu-text">Tables</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                     
                                        <li class="nk-menu-item">
                                            <a href="table-datatable.php" class="nk-menu-link"><span class="nk-menu-text">DataTables</span></a>
                                        </li>
-->
<!--                                    </ul> .nk-menu-sub -->
<!--                                </li> .nk-menu-item -->
<!--
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-view-group-fill"></em></span>
                                        <span class="nk-menu-text">Forms</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="form-validation.php" class="nk-menu-link"><span class="nk-menu-text">Form Validation</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="form-wizard.php" class="nk-menu-link"><span class="nk-menu-text">Wizard Basic</span></a>
                                        </li>
                                       
                                    </ul> .nk-menu-sub 
                                </li>
-->
								<!-- .nk-menu-item -->
<!--
                                <li class="nk-menu-item">
                                    <a href="toastr.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-alert-circle-fill"></em></span>
                                        <span class="nk-menu-text">Toastr</span>
                                    </a>
                                </li> .nk-menu-item 
-->
<!--
                                <li class="nk-menu-item">
                                    <a href="sweet-alert.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-caution-fill"></em></span>
                                        <span class="nk-menu-text">Sweet Alert</span>
                                    </a>
                                </li> .nk-menu-item 
-->
<!--
                                <li class="nk-menu-item">
                                    <a href="email-templates.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tag-alt-fill"></em></span>
                                        <span class="nk-menu-text">Email Template</span>
                                    </a>
                                </li>
-->
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>