<?php
include_once('connect.php');

//fetch staff services data
if(isset($_POST['fetchservice']))
{
$query = mysqli_query($con,"SELECT * FROM services  JOIN ser_specialty_add ON services.service_speciality=ser_specialty_add.spec_id JOIN app_type ON services.service_a_type=app_type.app_id JOIN service_cliniciant ON services.ser_cl_type=service_cliniciant.cl_id JOIN service_name ON services.service_name=service_name.s_id");
				
if($query)
{
	echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
	
	<table class="nowrap nk-tb-list is-separate" id="myTable">
		<thead>
			<tr class="nk-tb-item nk-tb-head">
			
				<th class="nk-tb-col"><span>ID</span></th>
				<th class="nk-tb-col"><span>Service Name</span></th>
				<th class="nk-tb-col"><span>Service Request</span></th>
				<th class="nk-tb-col"><span>Service Comments</span></th>
				<th class="nk-tb-col"><span>Service refer</span></th>
				<th class="nk-tb-col"><span>Service Location</span></th>
				<th class="nk-tb-col"><span>Speciality</span></th>
				<th class="nk-tb-col"><span>Appointment type</span></th>
				<th class="nk-tb-col"><span>Gender</span></th>
				<th class="nk-tb-col"><span>Bookable</span></th>
				<th class="nk-tb-col"><span>Effective Start Date</span></th>
				<th class="nk-tb-col"><span>Effective End Date</span></th>
				<th class="nk-tb-col"><span>Minimum Age range</span></th>
				<th class="nk-tb-col"><span>Maximum Age range</span></th>
				<th class="nk-tb-col"><span>Care Menu</span></th>
				<th class="nk-tb-col"><span>Clination type</span></th>
				<th class="nk-tb-col"><span>Reason For Restriction</span></th>
				<th class="nk-tb-col"><span>Restriction Comments</span></th>
				<th class="nk-tb-col"><span>Instructions</span></th>
				<th class="nk-tb-col"><span>Priority Routine</span></th>
				<th class="nk-tb-col"><span>Priority Urgent</span></th>
				<th class="nk-tb-col"><span>Priority  Week</span></th>
				<th class="nk-tb-col"><span>2 Week Wait</span></th>
				<th class="nk-tb-col"><span>Organisation Name</span></th>
		

				
				
			</tr><!-- .nk-tb-item -->
		</thead>
		 <tbody id="">';
	while($fetch = mysqli_fetch_array($query))
	{
$rfid = $fetch['m_id'];

echo'   <tr class="nk-tb-item">

<td class="nk-tb-col">
	<span class="tb-product">
		<span class="title">'.$fetch['service_id'].'</span>
	</span>
</td>
<td class="nk-tb-col">
	<span class="tb-lead">'.$fetch['s_name'].'</span>
</td>
<td class="nk-tb-col">
	<span class="tb-lead">'.$fetch['service_r_t_support'].'</span>
</td>
<td class="nk-tb-col">
	<span class="tb-lead">'.$fetch['service_cmnts'].'</span>
</td>
<td class="nk-tb-col">
	<span class="tb-lead">'.$fetch['service_refer'].'</span>
</td>
<td class="nk-tb-col">
	<span class="tb-lead">'.$fetch['service_location'].'</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">'.$fetch['spec_name'].'</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">'.$fetch['app_type'].'</span>
</td>
   <td class="nk-tb-col">
<span class="tb-lead">'.$fetch['service_gender'].'</span>
</td>
 <td class="nk-tb-col">
<span class="tb-lead">'.$fetch['sender_bookable'].'</span>
</td>
 <td class="nk-tb-col">
<span class="tb-lead">'.$fetch['service_e_date'].'</span>
</td>

<td class="nk-tb-col ">
	
	<span class="tb-lead">'.$fetch['service_e_date2'].'</span>
	
</td>
<td class="nk-tb-col ">
		<span class="tb-lead">'.$fetch['service_age'].'</span>
</td>
<td class="nk-tb-col ">
		<span class="tb-lead">'.$fetch['service_age2'].'</span>
</td>
<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['service_caremenu'].'</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">'.$fetch['cl_type'].'</span>
 </td>
 <td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['ser_res_reas'].'</span>
</td>
<td class="nk-tb-col">
	<span class="tb-lead">'.$fetch['ser_res_cmnt'].'</span>
</td>
<td class="nk-tb-col">
	<span class="tb-lead">'.$fetch['ser_instruct'].'</span>
</td>
<td class="nk-tb-col">
	<span class="tb-lead">'.$fetch['ser_priority_rout'].'</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">'.$fetch['ser_priority_urg'].'</span>
</td>

<td class="nk-tb-col">
<span class="tb-lead">'.$fetch['ser_priority_wekex'].'</span>
 </td>
 <td class="nk-tb-col">
	 <span class="title">'.$fetch['ser_priority_2week'].'</span>
	</span>
</td>
<td class="nk-tb-col">
	<span class="tb-lead">'.$fetch['s_orgname'].'</span>
</td>
';

									
	}
	echo'</tbody> </table>
	
	
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {
	$("#myTable").DataTable();
} )
</script>
';
}
}

//for staff manager delete
if(isset($_POST['deladmin']))
{
		
		$vid = $_POST['vid'];
		$vdel = "DELETE FROM `tbl_user` WHERE `staff_id` = '$vid'";
		$vq = mysqli_query($con,$vdel);
		if($vq){
			echo "Success";
		}else {
			echo "Error";
		}
		
}

//fetch staff manager data
if(isset($_POST['adminfetch']))
{
$query = mysqli_query($con,"SELECT * FROM tbl_user JOIN staff_role on tbl_user.tbl_role=staff_role.role_id WHERE tbl_user.tbl_role=2");
				
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
							<th class="nk-tb-col nk-tb-col-check">
								<div class="custom-control custom-control-sm custom-checkbox notext">
									<input type="checkbox" class="custom-control-input" id="puid">
									<label class="custom-control-label" for="puid"></label>
								</div>
							</th>
							<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
							<th class="nk-tb-col"><span>Email</span></th>
							<th class="nk-tb-col"><span>Password</span></th>
							<th class="nk-tb-col"><span>Contact</span></th>
							<th class="nk-tb-col tb-col-md"><span>Department</span></th>
							<th class="nk-tb-col tb-col-md"><span>Designtion</span></th>
							<th class="nk-tb-col nk-tb-col-tools">
							</th>
						</tr><!-- .nk-tb-item -->
					</thead>
					 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$mid = $fetch['staff_id'];
	$mname = $fetch['staff_fname'];
	$msname = $fetch['staff_sname'];
	$memail = $fetch['staff_email'];
	$mpass = $fetch['staff_pass'];
	$mphn = $fetch['staff_contact'];
	$mdepart = $fetch['staff_department'];
	$mdob = $fetch['staff_dob'];
	$mrole = $fetch['tbl_role'];
	$mrname = $fetch['role_name'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" id="puid1">
			<label class="custom-control-label" for="puid1"></label>
		</div>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			<img src="images/product/a.png" alt="" class="thumb">
			<span class="title">'.$fetch['staff_sname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_email'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['staff_pass'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_contact'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_department'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['role_name'].'</span>
	</td>
	<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal1('."'$mid'".','."'$mname'".','."'$msname'".','."'$memail'".','."'$mpass'".','."'$mphn'".','."'$mdepart'".','."'$mdob'".','."'$mrole'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>							
							<li><a href="javascript:void(0)" onClick="confirm('."'$mid'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

						</ul>
					</div>
				</div>
			</li>
		</ul>
	</td>
</tr>';
										
		}
		echo'</tbody> </table>
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {
    $("#myTable").DataTable();
} )
</script>';
	}
}

//fetch service data
if(isset($_POST['adminfetchupdate']))
{
	$fetchid = $_SESSION['a_id'];
$query = mysqli_query($con,"SELECT * FROM `service_user` WHERE `su_id` = '$fetchid'");
if($query)
{
while($fetch = mysqli_fetch_array($query))
{
	$sid = $fetch['su_id'];
	$sname = $fetch['su_name'];
	$semail = $fetch['su_email'];
	$spass = $fetch['su_password'];
	$scontact = $fetch['su_contact'];
	$shos = $fetch['su_hospital'];

echo'<div class="card-aside-wrap">

	<div class="card-inner card-inner-lg">
		<div class="nk-block-head nk-block-head-lg">
			<div class="nk-block-between">
				<div class="nk-block-head-content">
					<h4 class="nk-block-title">Personal Information</h4>
					<div class="nk-block-des">
						<p>Basic info, like your name and address, that you use on Nio Platform.</p>
					</div>
				</div>
				<div class="nk-block-head-content align-self-start d-lg-none">
					<a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
				</div>
			</div>
		</div><!-- .nk-block-head -->

		<div class="nk-block">
			<div class="nk-data data-list">
				<div class="data-head">
					<h6 class="overline-title">Basics</h6>
				</div>

				<div class="data-item" onClick="cupdmodal('."'$sid'".','."'$sname'".','."'$semail'".','."'$spass'".','."'$scontact'".','."'$shos'".')">
					<div class="data-col">
						<span class="data-label">Full Name</span>
						<span class="data-value">'.$fetch['su_name'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
				</div><!-- data-item -->
				<div class="data-item" onClick="cupdmodal('."'$sid'".','."'$sname'".','."'$semail'".','."'$spass'".','."'$scontact'".','."'$shos'".')">
					<div class="data-col">
						<span class="data-label">Display Name</span>
						<span class="data-value">'.$fetch['su_name'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
				</div><!-- data-item -->
				<div class="data-item">
					<div class="data-col">
						<span class="data-label">Email</span>
						<span class="data-value">'.$fetch['su_email'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
				</div><!-- data-item -->
				<div class="data-item" onClick="cupdmodal('."'$sid'".','."'$sname'".','."'$semail'".','."'$spass'".','."'$scontact'".','."'$shos'".')">
					<div class="data-col">
						<span class="data-label">Password</span>
						<span class="data-value text-soft">'.$fetch['su_password'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
				</div><!-- data-item -->
				<div class="data-item" onClick="cupdmodal('."'$sid'".','."'$sname'".','."'$semail'".','."'$spass'".','."'$scontact'".','."'$shos'".')">
					<div class="data-col">
						<span class="data-label">Contact</span>
						<span class="data-value">'.$fetch['su_contact'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
				</div>
				<!-- data-item -->
			</div>
			<!-- data-list -->

			<!-- data-list -->
		</div><!-- .nk-block -->
	</div>
	<div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
		<div class="card-inner-group" data-simplebar>
			<div class="card-inner">
				<div class="user-card">
					<div class="user-avatar bg-primary">
						<span>AB</span>
					</div>
					<div class="user-info">
						<span class="lead-text">'.$fetch['su_name'].'</span>
						<span class="sub-text">'.$fetch['su_email'].'</span>
					</div>
					<div class="user-action">
						<div class="dropdown">
							<a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
							<div class="dropdown-menu dropdown-menu-right">
								<ul class="link-list-opt no-bdr">
									<li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
									<li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div><!-- .user-card -->
			</div><!-- .card-inner -->
			<div class="card-inner">
				<div class="user-account-info py-0">
					<h6 class="overline-title-alt">Super Admin</h6>

				</div>
			</div>

		</div><!-- .card-inner-group -->
	</div>
	<!-- card-aside -->
</div>';

	}
	}
}

//for profile update
if(isset($_POST['updateadmin']))
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$contact = $_POST['contact'];
		
		
//		$select = mysqli_query($con,"SELECT * FROM `admin` WHERE `id` = '$id'");
//		$fetc = mysqli_fetch_array($select);
//		if($_FILES['uploadedimages']['name']!=''&& $_FILES['uploadedimages']['name']!= null)
//		{
//	$file = $_FILES['uploadedimages']['name'];
//			move_uploaded_file($_FILES['uploadedimages']['tmp_name'],'../customer/assets/images/avatars/'.$file);
//		}
//		else
//		{
//			$file = $fetc['profile_pic'];	
//		}
//	
		$query = mysqli_query($con,"UPDATE `admin` SET `name`='$name',`contact`='$contact' WHERE `id` = '$id'");
		
		if($query)
		{
		
			echo "Success";
			
		}
		else
		{
			echo("Error");
		}
	}
if(isset($_POST['updateadminaddress']))
	{
		$id = $_POST['aid'];
		
		$address = $_POST['address'];
		
		
//		$select = mysqli_query($con,"SELECT * FROM `admin` WHERE `id` = '$id'");
//		$fetc = mysqli_fetch_array($select);
//		if($_FILES['uploadedimages']['name']!=''&& $_FILES['uploadedimages']['name']!= null)
//		{
//	$file = $_FILES['uploadedimages']['name'];
//			move_uploaded_file($_FILES['uploadedimages']['tmp_name'],'../customer/assets/images/avatars/'.$file);
//		}
//		else
//		{
//			$file = $fetc['profile_pic'];	
//		}
//	
		$query = mysqli_query($con,"UPDATE `admin` SET `address` = '$address' WHERE `id` = '$id'");
		
		if($query)
		{
		
			echo "Success";
			
		}
		else
		{
			echo("Error");
		}
	}

//for staff update
if(isset($_POST['updatehadmin']))
	{
		$maid = mysqli_real_escape_string($con,$_POST['mid']);
		$mroleid = mysqli_real_escape_string($con,$_POST['roleid']);
		$mafname = mysqli_real_escape_string($con,$_POST['fname']);
		$masname = mysqli_real_escape_string($con,$_POST['sname']);
		$maemail = mysqli_real_escape_string($con,$_POST['memail']);
		$mapass = mysqli_real_escape_string($con,$_POST['mpassword']);
		$macont = mysqli_real_escape_string($con,$_POST['mcontact']);
		$madepart = mysqli_real_escape_string($con,$_POST['mdepart']);
		$madob = mysqli_real_escape_string($con,$_POST['mdob']);
	
		$emcheck = mysqli_query($con, "SELECT * FROM `tbl_user` WHERE `staff_email` = '$maemail' and `tbl_role` != '$mroleid' and `staff_sname` != '$masname'");
		$count = mysqli_num_rows($emcheck);
	
		if($count>0){
			echo"staffemailalready";
		}else {
						
			$query = mysqli_query($con,"UPDATE `tbl_user` SET `staff_fname`='$mafname',`staff_sname`='$masname',`staff_email`='$maemail',`staff_pass`='$mapass',`staff_contact`='$macont',`staff_department`='$madepart',`staff_dob`='$madob' WHERE `tbl_role` = '$mroleid' and `staff_id` = '$maid'");
		
		if($query)
		{
		
			echo "Success";
			
		}
		else
		{
			echo("Error");
		}
	}
}

// for staff register insert
if(isset($_POST['satffbtn'])){
	
	$stafffname = mysqli_real_escape_string($con, $_POST['staff_name']);
	$staffsname = mysqli_real_escape_string($con, $_POST['staff_sname']);
	$staffemail = mysqli_real_escape_string($con, $_POST['staff_email']);
	$staffphn = mysqli_real_escape_string($con, $_POST['staff_contact']);
	$staffdepart = mysqli_real_escape_string($con, $_POST['staff_depart']);
	$staffdob = mysqli_real_escape_string($con, $_POST['staff_dob']);
	$staffpass = mysqli_real_escape_string($con, $_POST['staff_pass']);
	$staffcpass = mysqli_real_escape_string($con, $_POST['staff_cpass']);
	$staffrole = mysqli_real_escape_string($con, $_POST['staff_role']);
	$staffregi = mysqli_real_escape_string($con, $_POST['staff_regi']);
	
	$emcheck = mysqli_query($con, "SELECT * FROM `tbl_user` WHERE `staff_email` = '$staffemail'");
	$contem = mysqli_num_rows($emcheck);
	
	if($contem>0){
		echo"emailalready";
	}else {
		
		if($staffrole == "2"){
			$qinsert = mysqli_query($con, "INSERT INTO `tbl_user`(`staff_fname`, `staff_sname`, `staff_email`, `staff_pass`, `staff_contact`, `staff_department`, `staff_dob`, `tbl_role`) VALUES ('$stafffname','$staffsname','$staffemail','$staffpass','$staffphn','$staffdepart','$staffdob','$staffrole')");
			
		}else {
			
			$qinsert = mysqli_query($con, "INSERT INTO `tbl_user`(`staff_fname`, `staff_sname`, `staff_email`, `staff_pass`, `staff_contact`, `staff_department`, `staff_dob`, `staff_regno`, `tbl_role`) VALUES ('$stafffname','$staffsname','$staffemail','$staffpass','$staffphn','$staffdepart','$staffdob','$staffregi','$staffrole')");
		}
//		echo"done";
	}
	
	
}

//fetch staff consultant data
if(isset($_POST['consultantbtn']))
{
$query = mysqli_query($con,"SELECT * FROM tbl_user JOIN staff_role on tbl_user.tbl_role=staff_role.role_id WHERE tbl_user.tbl_role= 3");
				
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
							<th class="nk-tb-col nk-tb-col-check">
								<div class="custom-control custom-control-sm custom-checkbox notext">
									<input type="checkbox" class="custom-control-input" id="puid">
									<label class="custom-control-label" for="puid"></label>
								</div>
							</th>
							<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
							<th class="nk-tb-col"><span>Email</span></th>
							<th class="nk-tb-col"><span>Password</span></th>
							<th class="nk-tb-col"><span>Contact</span></th>
							<th class="nk-tb-col tb-col-md"><span>Department</span></th>
							<th class="nk-tb-col tb-col-md"><span>Designtion</span></th>
							<th class="nk-tb-col nk-tb-col-tools">
							</th>
						</tr><!-- .nk-tb-item -->
					</thead>
					 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$mid = $fetch['staff_id'];
	$mname = $fetch['staff_fname'];
	$msname = $fetch['staff_sname'];
	$memail = $fetch['staff_email'];
	$mpass = $fetch['staff_pass'];
	$mphn = $fetch['staff_contact'];
	$mdepart = $fetch['staff_department'];
	$mdob = $fetch['staff_dob'];
	$mrole = $fetch['tbl_role'];
	$mrname = $fetch['role_name'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" id="puid1">
			<label class="custom-control-label" for="puid1"></label>
		</div>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			<img src="images/product/a.png" alt="" class="thumb">
			<span class="title">'.$fetch['staff_sname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_email'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['staff_pass'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_contact'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_department'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['role_name'].'</span>
	</td>
	<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal1('."'$mid'".','."'$mname'".','."'$msname'".','."'$memail'".','."'$mpass'".','."'$mphn'".','."'$mdepart'".','."'$mdob'".','."'$mrole'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							
							<li><a href="javascript:void(0)" onClick="confirm('."'$mid'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

						</ul>
					</div>
				</div>
			</li>
		</ul>
	</td>
</tr>';
										
		}
		echo'</tbody> </table>
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {
    $("#myTable").DataTable();
} )
</script>';
	}
}

//fetch staff doctors data
if(isset($_POST['doctorsbtn']))
{
$query = mysqli_query($con,"SELECT * FROM tbl_user JOIN staff_role on tbl_user.tbl_role=staff_role.role_id WHERE tbl_user.tbl_role = 4");
				
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
							<th class="nk-tb-col nk-tb-col-check">
								<div class="custom-control custom-control-sm custom-checkbox notext">
									<input type="checkbox" class="custom-control-input" id="puid">
									<label class="custom-control-label" for="puid"></label>
								</div>
							</th>
							<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
							<th class="nk-tb-col"><span>Email</span></th>
							<th class="nk-tb-col"><span>Password</span></th>
							<th class="nk-tb-col"><span>Contact</span></th>
							<th class="nk-tb-col tb-col-md"><span>Department</span></th>
							<th class="nk-tb-col tb-col-md"><span>Designtion</span></th>
							<th class="nk-tb-col nk-tb-col-tools">
							</th>
						</tr><!-- .nk-tb-item -->
					</thead>
					 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$mid = $fetch['staff_id'];
	$mname = $fetch['staff_fname'];
	$msname = $fetch['staff_sname'];
	$memail = $fetch['staff_email'];
	$mpass = $fetch['staff_pass'];
	$mphn = $fetch['staff_contact'];
	$mdepart = $fetch['staff_department'];
	$mdob = $fetch['staff_dob'];
	$mrole = $fetch['tbl_role'];
	$mrname = $fetch['role_name'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" id="puid1">
			<label class="custom-control-label" for="puid1"></label>
		</div>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			<img src="images/product/a.png" alt="" class="thumb">
			<span class="title">'.$fetch['staff_sname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_email'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['staff_pass'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_contact'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_department'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['role_name'].'</span>
	</td>
	<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal1('."'$mid'".','."'$mname'".','."'$msname'".','."'$memail'".','."'$mpass'".','."'$mphn'".','."'$mdepart'".','."'$mdob'".','."'$mrole'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							
							<li><a href="javascript:void(0)" onClick="confirm('."'$mid'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

						</ul>
					</div>
				</div>
			</li>
		</ul>
	</td>
</tr>';
										
		}
		echo'</tbody> </table>
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {
    $("#myTable").DataTable();
} )
</script>';
	}
}

//fetch staff nurse data
if(isset($_POST['nursebtn']))
{
$query = mysqli_query($con,"SELECT * FROM tbl_user JOIN staff_role on tbl_user.tbl_role=staff_role.role_id WHERE tbl_user.tbl_role = 5");
				
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
							<th class="nk-tb-col nk-tb-col-check">
								<div class="custom-control custom-control-sm custom-checkbox notext">
									<input type="checkbox" class="custom-control-input" id="puid">
									<label class="custom-control-label" for="puid"></label>
								</div>
							</th>
							<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
							<th class="nk-tb-col"><span>Email</span></th>
							<th class="nk-tb-col"><span>Password</span></th>
							<th class="nk-tb-col"><span>Contact</span></th>
							<th class="nk-tb-col tb-col-md"><span>Department</span></th>
							<th class="nk-tb-col tb-col-md"><span>Designtion</span></th>
							<th class="nk-tb-col nk-tb-col-tools">
							</th>
						</tr><!-- .nk-tb-item -->
					</thead>
					 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$mid = $fetch['staff_id'];
	$mname = $fetch['staff_fname'];
	$msname = $fetch['staff_sname'];
	$memail = $fetch['staff_email'];
	$mpass = $fetch['staff_pass'];
	$mphn = $fetch['staff_contact'];
	$mdepart = $fetch['staff_department'];
	$mdob = $fetch['staff_dob'];
	$mrole = $fetch['tbl_role'];
	$mrname = $fetch['role_name'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" id="puid1">
			<label class="custom-control-label" for="puid1"></label>
		</div>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			<img src="images/product/a.png" alt="" class="thumb">
			<span class="title">'.$fetch['staff_sname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_email'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['staff_pass'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_contact'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_department'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['role_name'].'</span>
	</td>
	<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal1('."'$mid'".','."'$mname'".','."'$msname'".','."'$memail'".','."'$mpass'".','."'$mphn'".','."'$mdepart'".','."'$mdob'".','."'$mrole'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							
							<li><a href="javascript:void(0)" onClick="confirm('."'$mid'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

						</ul>
					</div>
				</div>
			</li>
		</ul>
	</td>
</tr>';
										
		}
		echo'</tbody> </table>
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {
    $("#myTable").DataTable();
} )
</script>';
	}
}

//fetch staff dentist data
if(isset($_POST['dentistbtn']))
{
$query = mysqli_query($con,"SELECT * FROM tbl_user JOIN staff_role on tbl_user.tbl_role=staff_role.role_id WHERE tbl_user.tbl_role = 6");
				
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
							<th class="nk-tb-col nk-tb-col-check">
								<div class="custom-control custom-control-sm custom-checkbox notext">
									<input type="checkbox" class="custom-control-input" id="puid">
									<label class="custom-control-label" for="puid"></label>
								</div>
							</th>
							<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
							<th class="nk-tb-col"><span>Email</span></th>
							<th class="nk-tb-col"><span>Password</span></th>
							<th class="nk-tb-col"><span>Contact</span></th>
							<th class="nk-tb-col tb-col-md"><span>Department</span></th>
							<th class="nk-tb-col tb-col-md"><span>Designtion</span></th>
							<th class="nk-tb-col nk-tb-col-tools">
							</th>
						</tr><!-- .nk-tb-item -->
					</thead>
					 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$mid = $fetch['staff_id'];
	$mname = $fetch['staff_fname'];
	$msname = $fetch['staff_sname'];
	$memail = $fetch['staff_email'];
	$mpass = $fetch['staff_pass'];
	$mphn = $fetch['staff_contact'];
	$mdepart = $fetch['staff_department'];
	$mdob = $fetch['staff_dob'];
	$mrole = $fetch['tbl_role'];
	$mrname = $fetch['role_name'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" id="puid1">
			<label class="custom-control-label" for="puid1"></label>
		</div>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			<img src="images/product/a.png" alt="" class="thumb">
			<span class="title">'.$fetch['staff_sname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_email'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['staff_pass'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_contact'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_department'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['role_name'].'</span>
	</td>
	<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal1('."'$mid'".','."'$mname'".','."'$msname'".','."'$memail'".','."'$mpass'".','."'$mphn'".','."'$mdepart'".','."'$mdob'".','."'$mrole'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							
							<li><a href="javascript:void(0)" onClick="confirm('."'$mid'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

						</ul>
					</div>
				</div>
			</li>
		</ul>
	</td>
</tr>';
										
		}
		echo'</tbody> </table>
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {
    $("#myTable").DataTable();
} )
</script>';
	}
}

//fetch staff genral pratictional data
if(isset($_POST['genralpbtn']))
{
$query = mysqli_query($con,"SELECT * FROM tbl_user JOIN staff_role on tbl_user.tbl_role=staff_role.role_id WHERE tbl_user.tbl_role = 7");
				
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
							<th class="nk-tb-col nk-tb-col-check">
								<div class="custom-control custom-control-sm custom-checkbox notext">
									<input type="checkbox" class="custom-control-input" id="puid">
									<label class="custom-control-label" for="puid"></label>
								</div>
							</th>
							<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
							<th class="nk-tb-col"><span>Email</span></th>
							<th class="nk-tb-col"><span>Password</span></th>
							<th class="nk-tb-col"><span>Contact</span></th>
							<th class="nk-tb-col tb-col-md"><span>Department</span></th>
							<th class="nk-tb-col tb-col-md"><span>Designtion</span></th>
							<th class="nk-tb-col nk-tb-col-tools">
							</th>
						</tr><!-- .nk-tb-item -->
					</thead>
					 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$mid = $fetch['staff_id'];
	$mname = $fetch['staff_fname'];
	$msname = $fetch['staff_sname'];
	$memail = $fetch['staff_email'];
	$mpass = $fetch['staff_pass'];
	$mphn = $fetch['staff_contact'];
	$mdepart = $fetch['staff_department'];
	$mdob = $fetch['staff_dob'];
	$mrole = $fetch['tbl_role'];
	$mrname = $fetch['role_name'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" id="puid1">
			<label class="custom-control-label" for="puid1"></label>
		</div>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			<img src="images/product/a.png" alt="" class="thumb">
			<span class="title">'.$fetch['staff_sname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_email'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['staff_pass'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_contact'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['staff_department'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['role_name'].'</span>
	</td>
	<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal1('."'$mid'".','."'$mname'".','."'$msname'".','."'$memail'".','."'$mpass'".','."'$mphn'".','."'$mdepart'".','."'$mdob'".','."'$mrole'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							
							<li><a href="javascript:void(0)" onClick="confirm('."'$mid'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

						</ul>
					</div>
				</div>
			</li>
		</ul>
	</td>
</tr>';
										
		}
		echo'</tbody> </table>
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {
    $("#myTable").DataTable();
} )
</script>';
	}
}

// for Service Definer from sub_admin
if(isset($_POST['servicadd']))
	{
		$ser_name = mysqli_real_escape_string($con, $_POST['ser_name']);
		$ser_email = mysqli_real_escape_string($con, $_POST['ser_email']);
		$ser_reqt = mysqli_real_escape_string($con, $_POST['ser_reqt']);
		$ser_cmnt = mysqli_real_escape_string($con, $_POST['ser_cmnts']);
		$ser_refer = mysqli_real_escape_string($con, $_POST['ser_show']);
		$ser_loc = mysqli_real_escape_string($con, $_POST['ser_location']);
		$ser_spe = mysqli_real_escape_string($con, $_POST['spec_drop']);
		$ser_app = mysqli_real_escape_string($con, $_POST['ser_apptype']);
		$ser_gen = mysqli_real_escape_string($con, $_POST['ser_gen']);
		$ser_dire = mysqli_real_escape_string($con, $_POST['ser_direct']);
		$ser_eff = mysqli_real_escape_string($con, $_POST['ser_effect']);
		$ser_eff2 = mysqli_real_escape_string($con, $_POST['ser_effect2']);
		$ser_tdate = mysqli_real_escape_string($con, $_POST['ser_tdate']);
		$ser_ager = mysqli_real_escape_string($con, $_POST['ser_ager']);
		$ser_ager2 = mysqli_real_escape_string($con, $_POST['ser_ager2']);
		$ser_care = mysqli_real_escape_string($con, $_POST['ser_carem']);
//		$ser_pass = mysqli_real_escape_string($con, $_POST['ser_pass']);
		$cltype = mysqli_real_escape_string($con, $_POST['ser_cltype']);
		$res_reas = mysqli_real_escape_string($con, $_POST['re_reason']);
		$res_cmnt = mysqli_real_escape_string($con, $_POST['re_cmnt']);
		$ser_conn = mysqli_real_escape_string($con, $_POST['ser_conname']);
		$ser_conad = mysqli_real_escape_string($con, $_POST['ser_conadd']);
		$ser_concoun = mysqli_real_escape_string($con, $_POST['ser_concount']);
		$ser_conpos = mysqli_real_escape_string($con, $_POST['ser_conpost']);
		$ser_conton = mysqli_real_escape_string($con, $_POST['ser_sontown']);
		$ser_hpcont = mysqli_real_escape_string($con, $_POST['hp_con']);
		$ser_hpfax = mysqli_real_escape_string($con, $_POST['hp_fax']);
		$ser_hptex = mysqli_real_escape_string($con, $_POST['hp_text']);
		$ser_hpemail = mysqli_real_escape_string($con, $_POST['hp_email']);
		$ser_patel = mysqli_real_escape_string($con, $_POST['pa_tel']);
		$ser_paop = mysqli_real_escape_string($con, $_POST['pa_hop']);
		$ser_poen = mysqli_real_escape_string($con, $_POST['po_end']);
		$ser_pore = mysqli_real_escape_string($con, $_POST['po_rec']);
		$ser_poday = mysqli_real_escape_string($con, $_POST['po_day']);
		$ser_poapxit = mysqli_real_escape_string($con, $_POST['po_aptime']);
		$ser_pores = mysqli_real_escape_string($con, $_POST['po_resp']);
		$ser_popro = mysqli_real_escape_string($con, $_POST['po_prosys']);
		$ser_inst = mysqli_real_escape_string($con, $_POST['ser_ins']);
//		$ser_priosup = mysqli_real_escape_string($con, $_POST['ser_priosup']);
	
		$ser_rout = mysqli_real_escape_string($con, $_POST['ser_routin']);
		$ser_urg = mysqli_real_escape_string($con, $_POST['ser_urgent']);
		$ser_toweek = mysqli_real_escape_string($con, $_POST['ser_towweek']);
		$ser_weekend = mysqli_real_escape_string($con, $_POST['ser_weekend']);
	
		
			$codeapp = rand(0000,9999);
			$ser_ids =  mysqli_real_escape_string($con, $codeapp);
	
	// login user || admin ID SELECT * FROM admin JOIN hospitals ON admin.id=hospitals.u_id WHERE admin.id = '$uaid'
	$uaid = $_SESSION['ser_id'];
	// fetch data hospital and admin for hospitals name
	$fetchq = mysqli_query($con,"SELECT * FROM tbl_service_definer JOIN hospitals ON tbl_service_definer.u_hospid=hospitals.u_id WHERE tbl_service_definer.u_serid = '$uaid'");
	$fetchdatau = mysqli_fetch_assoc($fetchq);
	$hosname = $fetchdatau['h_name'];
	$hospid = $fetchdatau['hid'];
	$adname = $fetchdatau['u_sername'];
	
		 // for service create
		$query = mysqli_query($con, "INSERT INTO `services`(`service_id`, `service_name`, `sender_email`, `service_r_t_support`, `service_cmnts`, `service_refer`, `service_location`, `service_speciality`, `service_a_type`, `service_gender`, `sender_bookable`, `service_e_date`, `service_e_date2`, `service_t_date`, `service_age`, `service_age2`, `service_caremenu`, `ser_cl_type`,`ser_res_reas`, `ser_res_cmnt`, `ser_instruct`, `ser_priority_rout`, `ser_priority_urg`, `ser_priority_wekex`, `ser_priority_2week`, `s_hos_name`, `s_hos_id`, `ser_create_id`, `ser_create_name`) VALUES ('$ser_ids','$ser_name','$ser_email','$ser_reqt','$res_cmnt','$ser_refer','$ser_loc','$ser_spe','$ser_app','$ser_gen','$ser_dire','$ser_eff','$ser_eff2','$ser_tdate','$ser_ager','$ser_ager2','$ser_care','$cltype','$res_reas','$res_cmnt','$ser_inst','$ser_rout','$ser_urg','$ser_weekend','$ser_toweek','$hosname','$hospid','$uaid','$adname')");	
	
		if($query)
		{
			// for service contact
			$_SESSION['cltypeid'] = mysqli_insert_id($con);
			$serid = $_SESSION['cltypeid'];
			
			$sercon = mysqli_query($con, "INSERT INTO `ser_contact`(`scon_name`, `scon_add`, `scon_coun`, `scon_postal`, `scon_town`, `sertbl_id`,`hp_ctel`, `hp_faxn`, `hp_texttel`, `hp_pemail`, `pa_tel`, `pa_hop`) VALUES ('$ser_conn','$ser_conad','$ser_concoun','$ser_conpos','$ser_conpos','$serid','$ser_hpcont','$ser_hpfax','$ser_hptex','$ser_hpemail','$ser_patel','$ser_paop')");
			
			if($sercon){
				// for slot amangement
				$serviceid = $_SESSION['cltypeid'];
				
				$slotq = mysqli_query($con, "INSERT INTO `slot_management`(`sm_untilend`, `sm_recever`, `sm_days`, `sm_reserperiod`, `sm_providesys`, `sm_approxi`, `sm_ser_id`) VALUES ('$ser_poen','$ser_pore','$ser_poday','$ser_pores','$ser_popro','$ser_poapxit','$serviceid')");
				
				if($slotq){
					echo "Successapps";
				}else
				  {
					echo("errorinslotm");
				  }
			}else{
				echo("errorinsercon");
			}
			
		}else {
			echo("errorservice");
		}
		
	}

// for fetch service clinical type
if(isset($_POST['fetchclinbtn'])){
	$cliniq = mysqli_query($con, "SELECT * from `service_cliniciant`");
	echo'<option>- Select -</option>';
	while($fetchcl = mysqli_fetch_assoc($cliniq)){
		echo'<option value='.$fetchcl['cl_type'].'>'.$fetchcl['cl_type'].'</option>';
	}
}

// for fetch service appointment
if(isset($_POST['fetchappbtn'])){
	$serappq = mysqli_query($con, "SELECT * FROM `app_type`");
	echo'<option>- Select -</option>';
	while($fetchapp = mysqli_fetch_assoc($serappq)){
		echo'<option value='.$fetchapp['app_type'].'>'.$fetchapp['app_type'].'</option>';
	}
}

// for fetch service location
if(isset($_POST['fetchserlocbtn'])){
	$serlq = mysqli_query($con, "SELECT * FROM `service_location`");
	echo'<option>- Select -</option>';
	while($fetchloc = mysqli_fetch_assoc($serlq)){
		echo'<option value='.$fetchloc['lo_location'].'>'.$fetchloc['lo_location'].'</option>';
	}
}

// for fetch service name
if(isset($_POST['fetchserbtndata'])){
	$sernameq = mysqli_query($con, "SELECT * FROM `service_name`");
	echo'<option>- Select -</option>';
 while($datarole = mysqli_fetch_assoc($sernameq)){
 	echo'<option value='.$datarole['s_name'].'>'.$datarole['s_name'].'</option>';
 	}
}

// for fetch service specialty
if(isset($_POST['fetchdataspecbtn']))
{
	$sernameq = mysqli_query($con, "SELECT * FROM `ser_specialty_add`");
	echo'<option>- Select -</option>';
 while($datarole = mysqli_fetch_assoc($sernameq)){
 	echo'<option value='.$datarole['spec_name'].'>'.$datarole['spec_name'].'</option>';
 }
}

// for service location
if(isset($_POST['ser_blocbtn']))
	{
	
		$ser_bname = $_POST['ser_bnameq'];
		$ser_bcity = $_POST['ser_bcityq'];
		$ser_blo = $_POST['ser_blocq'];
	
			$code = rand(0000,9999);
			$codesrting =  mysqli_real_escape_string($con, $code);
		
		$query = mysqli_query($con,"INSERT INTO `service_location`(`lo_bid`, `lo_name`, `lo_city`, `lo_location`) VALUES ('$codesrting','$ser_bname','$ser_bcity','$ser_blo')");
		
		if($query)
		{
		
			echo "Success";
			
		}
		else
		{
			echo("Error");
		}
	}

// for service name
if(isset($_POST['ser_namebtnq']))
	{
		$ser_nameqw = $_POST['ser_nameq'];
	
		$emcheck = mysqli_query($con, "INSERT INTO `service_name` (`s_name`) VALUES ('$ser_nameqw')");
		$count = mysqli_num_rows($emcheck);
	
		if($count){
			echo"sersuc";
		}else {
			echo "sererror";
		}
	}

// for appointment
if(isset($_POST['ser_app']))
	{
		$ser_name = $_POST['ser_appt'];
	
		$emcheck = mysqli_query($con, "INSERT INTO `app_type` (`app_type`) VALUES ('$ser_name')");
		$count = mysqli_num_rows($emcheck);
	
		if($count){
			echo"sersuc";
		}else {
			echo "sererror";
		}
	}

// for add clinician type
if(isset($_POST['ser_cltypebtn']))
{
	
	$cltype = mysqli_real_escape_string($con, $_POST['cltype']);
	
	$clq = mysqli_query($con, "INSERT INTO `service_cliniciant`(`cl_type`) VALUES ('$cltype')");
	if($clq){
		echo "Successapps";
	}else {
		echo("Erroryu");
	}
	
}
?>