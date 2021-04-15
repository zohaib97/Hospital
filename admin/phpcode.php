<?php
include_once('connect.php');

// for approve and not approve
if(isset($_POST['method']))
   {
//for admin not approve
 if($_POST['method'] == "aapprove")
	{
		
		$id = $_POST['id'];
		$query = "UPDATE `admin` SET `status` = 'not_approve' WHERE `id` = '$id'";
		$vq = mysqli_query($con,$query);
		
		if($vq)
		{
			echo("Success");
		}
		
	}
	//for admin approve
	 if($_POST['method'] == "anot_approve")
	{
		
		$id = $_POST['id'];
		$query = "UPDATE `admin` SET `status` = 'approve' WHERE `id` = '$id'";
		$vq = mysqli_query($con,$query);
		
		if($vq)
		{
			echo("Success");
		}
		
	}
	//for hospital not approve
 if($_POST['method'] == "hactive")
	{
		
		$id = $_POST['id'];
		$query = "UPDATE `hospitals` SET `h_status` = 'not_active' WHERE `hid` = '$id'";
		$vq = mysqli_query($con,$query);
		
		if($vq)
		{
			echo("Success");
		}
		
	}
	//for hospital approve
	 if($_POST['method'] == "hnot_active")
	{
		
		$id = $_POST['id'];
		$query = "UPDATE `hospitals` SET `h_status` = 'active' WHERE `hid` = '$id'";
		$vq = mysqli_query($con,$query);
		
		if($vq)
		{
			echo("Successs");
		}
		
	}

	if($_POST['method'] == "aApproved")
	{
		
		$id = $_POST['id'];
		$query = "UPDATE `orginzation` SET `status` = 'Not approved' WHERE `orid` = '$id'";
		$vq = mysqli_query($con,$query);
		
		if($vq)
		{
		    $query1 = mysqli_query($con,"SELECT * FROM `orginzation` WHERE orid = '$id'");
		    $fetch = mysqli_fetch_array($query1);
			echo json_encode(array("res"=>"Success","name"=>$fetch['or_name']));
		}
		else{
			echo json_encode(array("res"=>"error","name"=>$fetch['or_name']));
		}
	}
	//for admin approve
	 if($_POST['method'] == "aNot approved")
	{
		
		$id = $_POST['id'];
		$query = "UPDATE `orginzation` SET `status` = 'Approved' WHERE `orid` = '$id'";
		$vq = mysqli_query($con,$query);
		
		if($vq)
		{
		    $query1 = mysqli_query($con,"SELECT * FROM `orginzation` WHERE orid = '$id'");
		    $fetch = mysqli_fetch_array($query1);
			echo json_encode(array("res"=>"Successs","name"=>$fetch['or_name']));
		}
		else{
			echo json_encode(array("res"=>"errorn","name"=>$fetch['or_name']));
		}
		
	}
}

//for hospital add
if(isset($_POST['addhospital']))
{
	$name = $_POST['hname'];
	$hnhs_n = $_POST['nhs_no'];
	$hstartd = $_POST['start_date'];
	$hendd = $_POST['end_date'];
	
	$aid = $_POST['cid'];
	
	$nhsq = mysqli_query($con, "SELECT * FROM `hospitals` WHERE `h_name` = '$name'");
	$nhsc = mysqli_num_rows($nhsq);
	
	if($nhsc>0){
		echo"alreadynhs";
	}else {
		$query = mysqli_query($con,"INSERT INTO `hospitals`(`h_name`, `h_status`, `u_id`, `h_NHS_no`, `start_date`, `end_date`) VALUES ('$name','not_active','$aid','$hnhs_n','$hstartd','$hendd')");
	
		if($query)
		{
			echo "Success";
		}
		else
		{
			echo "Error";
		}
	}
}

//for Subadmin add
if(isset($_POST['addsubadmin']))
{
	$name = $_POST['saname'];
	$sname = $_POST['ssname'];
	$email = $_POST['saemail'];
	$password = $_POST['sapass'];
	$contact = $_POST['sacontact'];
	$organization = $_POST['saorganization'];
	// $address = $_POST['saaddress'];
	date_default_timezone_set('Asia/Karachi');
	$time =  date('h:i:s a', time());
	$code = bin2hex(random_bytes(5));
	
	$aid = $_POST['cid'];
	
	$nhsq = mysqli_query($con, "SELECT * FROM `admin` WHERE `name` = '$name'");
	$nhsc = mysqli_num_rows($nhsq);
	
	if($nhsc>0){
		echo"alreadynhs";
	}else {
		$query = mysqli_query($con,"INSERT INTO `admin`(`name`, `email`, `password`, `contact`, `organization`,`time`,`status`,`code`,`on/off`) VALUES ('$name','$email','$password','$contact','$organization','$time','approve','$code','off')");
	
		if($query)
		{
		    $query2 = mysqli_query($con,"SELECT * FROM `orginzation` WHERE orid ='$organization'");
		    $orgfetch = mysqli_fetch_array($query2);
		    $orgname = $orgfetch['or_name'];
		    $orgcode = $orgfetch['or_code'];
		    $orgtype = $orgfetch['or_type'];
		    
		    $orgphone = $orgfetch['or_phone'];
		    $orgaddress = $orgfetch['or_address'];
		    $orgcity = $orgfetch['or_city'];
		    $orgpostcode = $orgfetch['or_postcode'];
		    if($orgtype == "NHS Hospital")
		    {
		        $roleid = 3;
		        $rolename = 'Consultant';
		    }
		    elseif($orgtype == "Opticians")
		    {
		        $roleid = 6;
		        $rolename = 'Optometrist';
		    }
		    else{
		        $roleid = 5;
		        $rolename = 'General practitioner';
		    }
		    $query3 = mysqli_query($con,"SELECT * FROM organisation_type WHERE ort_name = '$orgtype'");
		    $typefetch = mysqli_fetch_array($query3);
		    $typeid = $typefetch['id'];
		    $query1 = mysqli_query($con,"INSERT INTO `tbl_ruser`(`ur_fname`, `ur_sname`, `ur_email`, `ur_pass`, `title`, `ur_orgname`, `ur_orgcode`, `ur_orgtype`, `ur_role_id`, `ur_role_name`, `ur_orgphno`, `ur_orgaddress`, `ur_status`, `ur_proregno`, `ur_address`, `ur_city`, `ur_postcode`) VALUES ('$name','$sname','$email','$password','Mr','$orgname','$orgcode','$typeid','$roleid','$rolename','$orgphone','$orgaddress','approve','862131645','$orgaddress','$orgcity','$orgpostcode')");
			echo "Success";
		}
		else
		{
			echo "Error";
		}
	}
}

//for orgtype add
if(isset($_POST['addorgtype']))
{
	$name = $_POST['orgname'];
	
	$nhsq = mysqli_query($con, "SELECT * FROM `organisation_type` WHERE `ort_name` = '$name'");
	$nhsc = mysqli_num_rows($nhsq);
	
	if($nhsc>0){
		echo"alreadadd";
	}else {
		$query = mysqli_query($con,"INSERT INTO `organisation_type`(`ort_name`) VALUES ('$name')");
	
		if($query)
		{
			echo "Success";
		}
		else
		{
			echo "Error";
		}
	}
}

//for admin delete
if(isset($_POST['deladmin']))
{
		
		$vid = $_POST['vid'];
		$vdel = "DELETE FROM `admin` WHERE `id` = '$vid'";
		$vq = mysqli_query($con,$vdel);
		if($vq){
			echo "Success";
		}else {
			echo "Error";
		}
		
//		header('location:data-table.php');
		
	}

//for organisation type delete
if(isset($_POST['delortname']))
{
		
		$vid = $_POST['vid'];
		$vdel = "DELETE FROM `organisation_type` WHERE `id` = '$vid'";
		$vq = mysqli_query($con,$vdel);
		if($vq){
			echo "Success";
		}else {
			echo "Error";
		}
		
//		header('location:data-table.php');
		
	}

//for appointment type delete
if(isset($_POST['delappname']))
{
		
		$vid = $_POST['vid'];
		$vdel = "DELETE FROM `app_type` WHERE `app_id` = '$vid'";
		$vq = mysqli_query($con,$vdel);
		if($vq){
			echo "Success";
		}else {
			echo "Error";
		}
		
//		header('location:data-table.php');
		
	}

//for hopitals delete
if(isset($_POST['delhos']))
{
		
		$vid = $_POST['vid'];
		$vdel = "DELETE FROM `hospitals` WHERE `hid` = '$vid'";
		$vq = mysqli_query($con,$vdel);
		if($vq){
			echo "Success";
		}else {
			echo "Error";
		}
		
//		header('location:data-table.php');
		
	}

//fetch admin data
if(isset($_POST['adminfetch']))
{
$query = mysqli_query($con,"SELECT * FROM orginzation INNER JOIN admin ON orginzation.orid=admin.organization WHERE super_admin = 0");
	if($query)
	{
		
//							<th class="nk-tb-col nk-tb-col-check">
//						<div class="custom-control custom-control-sm custom-checkbox notext">
//							<input type="checkbox" class="custom-control-input" id="puid">
//							<label class="custom-control-label" for="puid"></label>
//						</div>
//					</th>

		
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="true" id="myTable">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
					<th class="nk-tb-col "><span>Name</span></th>
					<th class="nk-tb-col"><span>Email</span></th>
					<th class="nk-tb-col"><span>Oganisation Name</span></th>
					<th class="nk-tb-col"><span>Password</span></th>
					<th class="nk-tb-col"><span>Contact</span></th>
					
					<th class="nk-tb-col"><span>Status</span></th>
					<th class="nk-tb-col"><span>Action</span></th>
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$id = $fetch['id'];
	$name = $fetch['name'];
	$organization = $fetch['organization'];
	$password = $fetch['password'];
	$address = $fetch['address'];
	$status = $fetch['status'];
	$email = $fetch['email'];
	$contact = $fetch['contact'];

echo
//	<td class="nk-tb-col nk-tb-col-check">
//		<div class="custom-control custom-control-sm custom-checkbox notext">
//			<input type="checkbox" class="custom-control-input" id="puid1">
//			<label class="custom-control-label" for="puid1"></label>
//		</div>
//	</td>
	
	'   <tr class="nk-tb-item">
	
	<td class="nk-tb-col ">
		<span class="tb-product">
			
			<span class="tb-sub">'.$fetch['name'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['email'].'</span>
	</td>
	<td class="nk-tb-col">
	<span class="tb-sub">'.$fetch['or_name'].'</span>
</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['password'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['contact'].'</span>
	</td>
	';
			if($fetch['status'] == "approve")
			{
	echo'<td class="nk-tb-col ">
		<span class="btn btn-success" onClick="aprovenotaprove('."'$id'".','."'a$status'".','."'$email'".')">'.$fetch['status'].'</span>
	</td>';
			}
			else if($fetch['status'] == "not_approve")
			{
				echo'<td class="nk-tb-col ">
		<span class="btn btn-danger" onClick="aprovenotaprove('."'$id'".','."'a$status'".','."'$email'".')">'.$fetch['status'].'</span>
	</td>';
			}
	echo'<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal1('."'$id'".','."'$name'".','."'$email'".','."'$address'".','."'$password'".','."'$contact'".','."'$organization'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							
							<li><a href="javascript:void(0)" onClick="confirm('."'$id'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

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
</script>
';
	}
}

//fetch organisation_type data
if(isset($_POST['orgtypefetch']))
{
$query = mysqli_query($con,"SELECT * FROM `organisation_type`");
	if($query)
	{
		
//							<th class="nk-tb-col nk-tb-col-check">
//						<div class="custom-control custom-control-sm custom-checkbox notext">
//							<input type="checkbox" class="custom-control-input" id="puid">
//							<label class="custom-control-label" for="puid"></label>
//						</div>
//					</th>

		
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="true" id="myTable">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
					<th class="nk-tb-col "><span>Name</span></th>
					
					<th class="nk-tb-col"><span class="float-right">Action</span></th>
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$id = $fetch['id'];
	$name = $fetch['ort_name'];


echo
//	<td class="nk-tb-col nk-tb-col-check">
//		<div class="custom-control custom-control-sm custom-checkbox notext">
//			<input type="checkbox" class="custom-control-input" id="puid1">
//			<label class="custom-control-label" for="puid1"></label>
//		</div>
//	</td>
	
	'   <tr class="nk-tb-item">
	
	<td class="nk-tb-col ">
		<span class="tb-product">
			
			<span class="tb-sub">'.$fetch['ort_name'].'</span>
		</span>
	</td>

	';
// 			if($fetch['status'] == "approve")
// 			{
// 	echo'<td class="nk-tb-col ">
// 		<span class="btn btn-success" onClick="aprovenotaprove('."'$id'".','."'a$status'".','."'$email'".')">'.$fetch['status'].'</span>
// 	</td>';
// 			}
// 			else if($fetch['status'] == "not_approve")
// 			{
// 				echo'<td class="nk-tb-col ">
// 		<span class="btn btn-danger" onClick="aprovenotaprove('."'$id'".','."'a$status'".','."'$email'".')">'.$fetch['status'].'</span>
// 	</td>';
// 			}
	echo'<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal1('."'$id'".','."'$name'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							
							<li><a href="javascript:void(0)" onClick="confirm('."'$id'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

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
</script>
';
	}
}


//fetch users data
if(isset($_POST['fetchusersbtn']))
{
$query = mysqli_query($con,"SELECT * FROM `hospitals` JOIN `tbl_fuser` ON tbl_fuser.fuser_id = hospitals.u_id");
	if($query)
	{
		echo'
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
		<thead>
			<tr class="nk-tb-item nk-tb-head">
				<th class="nk-tb-col tb-col-sm"><span>User Name</span></th>
				<th class="nk-tb-col"><span>Email</span></th>
				<th class="nk-tb-col"><span>Password</span></th>
				<th class="nk-tb-col"><span>Contact</span></th>
				<th class="nk-tb-col"><span>Organization</span></th>
				<th class="nk-tb-col"><span>Hospital</span></th>
				<th class="nk-tb-col"><span>NHS No</span></th>
				<th class="nk-tb-col nk-tb-col-tools">
				</th>
			</tr><!-- .nk-tb-item -->
		</thead>
		<tbody>';
		while($fetch = mysqli_fetch_array($query))
		{
	$id = $fetch['fuser_id'];
	$hname = $fetch['h_name'];
	$funame = $fetch['fuser_name'];
	$fuemail = $fetch['fuser_email'];
	$fupass = $fetch['fuser_pass'];
	$fucont = $fetch['fuser_contact'];
	$fuorg = $fetch['fuser_org'];
	$fuhosp = $fetch['fuser_hospital'];
	$funhs = $fetch['fuser_nhsno'];
	$fustatus = $fetch['fuser_status'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			<span class="title">'.$fetch['fuser_name'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['fuser_email'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['fuser_pass'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['fuser_contact'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['fuser_org'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['fuser_hospital'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['fuser_nhsno'].'</span>
	</td>
	<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal('."'$id'".','."'$hname'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							
							<li><a href="javascript:void(0)" onClick="confirm('."'$id'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

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

//fetch hospitals data
if(isset($_POST['hospitalfetch']))
{
$query = mysqli_query($con,"SELECT * FROM `hospitals` JOIN admin ON admin.id = hospitals.u_id");
	if($query)
	{
		echo'
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
		<thead>
			<tr class="nk-tb-item nk-tb-head">
				<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
				<th class="nk-tb-col"><span>Admin name</span></th>
				<th class="nk-tb-col"><span>NHS No</span></th>
				<th class="nk-tb-col"><span>Status</span></th>
				<th class="nk-tb-col nk-tb-col-tools">
				</th>
			</tr><!-- .nk-tb-item -->
		</thead>
		<tbody>';
		while($fetch = mysqli_fetch_array($query))
		{
	$id = $fetch['hid'];
	$hname = $fetch['h_name'];
	$name = $fetch['name'];
	$status = $fetch['h_status'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['h_name'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['name'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['h_NHS_no'].'</span>
	</td>';
			if($fetch['h_status']=='active')
			{
	echo'<td class="nk-tb-col">
		<span class="btn btn-success" onClick="aprovenotaprove('."'$id'".','."'h$status'".')">Active</span>
	</td>
	';
		}
			else
			{
				echo'<td class="nk-tb-col">
		<span class="btn btn-danger" onClick="aprovenotaprove('."'$id'".','."'h$status'".')">Not Active</span>
	</td>
	';
			}
	echo'<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal('."'$id'".','."'$hname'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							
							<li><a href="javascript:void(0)" onClick="confirm('."'$id'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

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

//fetch admin data
	if(isset($_POST['adminfetchupdate']))	
	{
	$query = mysqli_query($con,"SELECT * FROM `admin` WHERE super_admin = 1");
	if($query)
	{
	while($fetch = mysqli_fetch_array($query))
	{
		$id = $fetch['id'];
		$name = $fetch['name'];
		$contact = $fetch['contact'];
		$address = $fetch['address'];

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

					<div class="data-item" onClick="cupdmodal('."'$id'".','."'$name'".','."'$contact'".','."'$address'".')">
						<div class="data-col">
							<span class="data-label">Full Name</span>
							<span class="data-value">'.$fetch['name'].'</span>
						</div>
						<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
					</div><!-- data-item -->
					<div class="data-item" onClick="cupdmodal('."'$id'".','."'$name'".','."'$contact'".','."'$address'".')">
						<div class="data-col">
							<span class="data-label">Display Name</span>
							<span class="data-value">'.$fetch['name'].'</span>
						</div>
						<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
					</div><!-- data-item -->
					<div class="data-item">
						<div class="data-col">
							<span class="data-label">Email</span>
							<span class="data-value">'.$fetch['email'].'</span>
						</div>
						<div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
					</div><!-- data-item -->
					<div class="data-item" onClick="cupdmodal('."'$id'".','."'$name'".','."'$contact'".','."'$address'".')">
						<div class="data-col">
							<span class="data-label">Phone Number</span>
							<span class="data-value text-soft">'.$fetch['contact'].'</span>
						</div>
						<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
					</div><!-- data-item -->
					<div class="data-item" onClick="cupdmodal('."'$id'".','."'$name'".','."'$contact'".','."'$address'".')">
						<div class="data-col">
							<span class="data-label">Address</span>
							<span class="data-value">'.$fetch['address'].'</span>
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
						<img src="images/avatar/'.$fetch['image'].'">
						</div>
						<div class="user-info">
							<span class="lead-text">'.$fetch['name'].'</span>
							<span class="sub-text">'.$fetch['email'].'</span>
						</div>
						<div class="user-action">
							<div class="dropdown">
								<a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
								<div class="dropdown-menu dropdown-menu-right">
									<ul class="link-list-opt no-bdr">
										<li><a href="#" onClick="cupdmodal('."'$id'".','."'$name'".','."'$contact'".','."'$address'".')"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
										<li><a href="#" onClick="cupdmodal('."'$id'".','."'$name'".','."'$contact'".','."'$address'".')"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
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
		$select = mysqli_query($con,"SELECT * FROM `admin` WHERE `id`='$id'");
		$fetch = mysqli_fetch_array($select);
		if($_FILES['image']['name']!=''&& $_FILES['image']['name']!= null)
		{
		$file = $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],'images/avatar/'.$file);
		}
		else
		{
			$file = $fetch['image'];
		}
		
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
		$query = mysqli_query($con,"UPDATE `admin` SET `name`='$name',`contact`='$contact',`image` = '$file' WHERE `id` = '$id'");
		
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
//for hospital update
if(isset($_POST['updatehospital']))
	{
		$id = $_POST['id'];
		$name = $_POST['name'];

		$query = mysqli_query($con,"UPDATE `hospitals` SET `h_name`='$name' WHERE `hid` = '$id'");
		
		if($query)
		{
		
			echo "Success";
			
		}
		else
		{
			echo("Error");
		}
	}
//for admin update
if(isset($_POST['updatehadmin']))
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['saorganization'];
		$password = $_POST['password'];
		$contact = $_POST['contact'];
	
		$emcheck = mysqli_query($con, "SELECT * FROM `admin` WHERE `email` = '$email' and `id` != '$id'");
		$count = mysqli_num_rows($emcheck);
	
		if($count>0){
			echo"staffemailalready";
		}else {
	
		$query = mysqli_query($con,"UPDATE `admin` SET `name`='$name',`email` = '$email',`organization` = '$address',`password` = '$password',`contact` = '$contact' WHERE `id` = '$id'");
		
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

//for Organisation Type
if(isset($_POST['updateorgtype']))
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
	
	
		$emcheck = mysqli_query($con, "SELECT * FROM `organisation_type` WHERE `ort_name` = '$name'");
		$count = mysqli_num_rows($emcheck);
	
		if($count>0){
			echo"namealready";
		}else {
	
		$query = mysqli_query($con,"UPDATE `organisation_type` SET `ort_name`='$name' WHERE id = '$id'");
		
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
	
	//for Appointment Type
if(isset($_POST['apptypeupdate']))
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
	
	
		$emcheck = mysqli_query($con, "SELECT * FROM `app_type` WHERE `app_type` = '$name'");
		$count = mysqli_num_rows($emcheck);
	
		if($count>0){
			echo"namealready";
		}else {
	
		$query = mysqli_query($con,"UPDATE `app_type` SET `app_type`='$name' WHERE app_id = '$id'");
		
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
	

//for privacy add
if(isset($_POST['addprivacy']))
	{
	$title = $_POST['title'];
	$Desc = $_POST['desc'];
		$query = mysqli_query($con,"INSERT INTO `privacy_policy`(`ptitle`, `pdescription`) VALUES ('$title','$Desc')");
		
		if($query)
		{
		
			echo "Success";
			
		}
		else
		{
			echo("Error");
		}
	}

// for Service Definer
if(isset($_POST['servicadd']))
	{
	
		$ser_name = mysqli_real_escape_string($con, $_POST['ser_name']);
		$ser_email = mysqli_real_escape_string($con, $_POST['ser_email']);
		$ser_cmnt = mysqli_real_escape_string($con, $_POST['ser_cmnts']);
		$ser_refer = mysqli_real_escape_string($con, $_POST['ser_show']);
	
		$ser_loc = mysqli_real_escape_string($con, $_POST['ser_location']);
		$ser_spe = mysqli_real_escape_string($con, $_POST['ser_specialty']);
		$ser_app = mysqli_real_escape_string($con, $_POST['ser_apptype']);
		$ser_gen = mysqli_real_escape_string($con, $_POST['ser_gen']);
		$ser_dire = mysqli_real_escape_string($con, $_POST['ser_direct']);
		$ser_eff = mysqli_real_escape_string($con, $_POST['ser_effect']);
		$ser_eff2 = mysqli_real_escape_string($con, $_POST['ser_effect2']);
		$ser_tdate = mysqli_real_escape_string($con, $_POST['ser_tdate']);
		$ser_ager = mysqli_real_escape_string($con, $_POST['ser_ager']);
		$ser_ager2 = mysqli_real_escape_string($con, $_POST['ser_ager2']);
		$ser_care = mysqli_real_escape_string($con, $_POST['ser_carem']);
		$ser_pass = mysqli_real_escape_string($con, $_POST['ser_pass']);

			$codeapp = rand(0000,9999);
			$ser_ids =  mysqli_real_escape_string($con, $codeapp);
		
		$query = mysqli_query($con,"INSERT INTO `service_definer`(`service_id`, `service_name`, `sender_email`, `sender_pass`, `service_cmnts`, `service_refer`, `service_location`, `service_speciality`, `service_a_type`, `service_gender`, `sender_bookable`, `service_e_date`, `service_e_date2`, `service_t_date`, `service_age`, `service_age2`, `service_caremenu`) VALUES ('$ser_ids','$ser_name','$ser_email','$ser_pass','$ser_cmnt','$ser_refer','$ser_loc','$ser_spe','$ser_app','$ser_gen','$ser_dire','$ser_eff',
		'$ser_eff2','$ser_tdate','$ser_ager','$ser_ager2','$ser_care')");
		
		if($query)
		{
		
			echo "Successapps";
			
		}
		else
		{
			echo("Erroryu");
		}
	}

// for appointment

if(isset($_POST['ser_app']))
	{
		$ser_name = $_POST['appname'];
	$sql = mysqli_query($con,"SELECT * FROM `app_type` WHERE app_type = '$ser_name'");
	if(mysqli_num_rows>0)
	{
	echo"already";
	}
	else{
		$emcheck = mysqli_query($con, "INSERT INTO `app_type` (`app_type`) VALUES ('$ser_name')");
		$count = mysqli_num_rows($emcheck);
	
		if($count){
			echo"sersuc";
		}else {
			echo "sererror";
		}
	}
	}
	//for admin appointment type add
	if(isset($_POST['ser_app2']))
	{
		$ser_name = $_POST['appname'];
	$sql = mysqli_query($con,"SELECT * FROM `app_type` WHERE app_type = '$ser_name'");
	if(mysqli_num_rows>0)
	{
	echo"already";
	}
	else{
		$emcheck = mysqli_query($con, "INSERT INTO `app_type` (`app_type`,`app_show`) VALUES ('$ser_name','allow')");
		$count = mysqli_num_rows($emcheck);
	
		if($count){
			echo"sersuc";
		}else {
			echo "sererror";
		}
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


//fetch service name data
if(isset($_POST['serfetchbtn']))
{
$query = mysqli_query($con,"SELECT * FROM `service_name`");
	if($query)
	{
		echo'
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTableser1">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
					<th class="nk-tb-col nk-tb-col-check">
					</th>
					<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$idn = $fetch['s_id'];
	$name = $fetch['s_name'];
			$allowcheck = $fetch['sname_allow'];
			echo'<tr class="nk-tb-item">';
if($allowcheck == "allow"){
	
	echo'<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" onchange="snameupdallow('.$idn.')" class="custom-control-input" checked="" id="sname'.$idn.'">
			<label class="custom-control-label" for="sname'.$idn.'"></label>
		</div>
	</td>';
}

	else if($allowcheck == "not_allow"){
	
	echo'<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" onchange="snameupdallow('.$idn.')" class="custom-control-input" id="sname'.$idn.'">
			<label class="custom-control-label" for="sname'.$idn.'"></label>
		</div>
	</td>';
}
			
	echo'<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['s_name'].'</span>
		</span>
	</td>
</tr>';
										
		}
		echo'</tbody> </table>
		
<script>
$(document).ready(function () {
    $("#myTableser1").DataTable({
	"lengthMenu": [[4, 25, 50, -1], [4, 25, 50, "All"]]
	});
} )
</script>
';
	}
}

//fetch service location data
if(isset($_POST['serlocfetchbtn']))
{
$query = mysqli_query($con,"SELECT * FROM `service_location`");
	if($query)
	{
		echo'
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTableser2">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
					<th class="nk-tb-col nk-tb-col-check">
					</th>
					<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$idlo = $fetch['lo_id'];
	$name = $fetch['lo_location'];
	$lallow = $fetch['loc_allow'];

echo'<tr class="nk-tb-item">';
			if($lallow == "allow"){
				echo'<td class="nk-tb-col nk-tb-col-check">
					<div class="custom-control custom-control-sm custom-checkbox notext">
						<input type="checkbox" name="ser_locchange" onchange="locshow('.$idlo.')" checked="" class="custom-control-input" id="loc'.$idlo.'">
						<label class="custom-control-label" for="loc'.$idlo.'"></label>
					</div>
				</td>';
			}else if($lallow == "not_allow"){ 
				echo'<td class="nk-tb-col nk-tb-col-check">
					<div class="custom-control custom-control-sm custom-checkbox notext">
						<input type="checkbox" name="ser_locchange" onchange="locshow('.$idlo.')" class="custom-control-input" id="loc'.$idlo.'">
						<label class="custom-control-label" for="loc'.$idlo.'"></label>
					</div>
				</td>';
		}
	
		echo'<td class="nk-tb-col tb-col-sm">
			<span class="tb-product">
				
				<span class="title">'.$fetch['lo_location'].'</span>
			</span>
		</td>
	</tr>';
										
		}
		echo'</tbody> </table>
		
<script>
$(document).ready(function () {
    $("#myTableser2").DataTable({
	"lengthMenu": [[4, 25, 50, -1], [4, 25, 50, "All"]]
	});
} )
</script>
';
	}
}

//fetch service appointment data
if(isset($_POST['serappbtn']))
{
$query = mysqli_query($con,"SELECT * FROM `app_type`");
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTableap">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
				
					<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
			
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$idapp = $fetch['app_id'];
	$name = $fetch['app_type'];
// 	$appallow = $fetch['app_show'];

echo'<tr class="nk-tb-item">';
// 		if($appallow == "allow"){
// 			echo'<td class="nk-tb-col nk-tb-col-check">
// 				<div class="custom-control custom-control-sm custom-checkbox notext">
// 					<input type="checkbox" name="ser_appchange" onchange="appshow('.$idapp.')" checked="" class="custom-control-input" id="app'.$idapp.'">
// 					<label class="custom-control-label" for="app'.$idapp.'"></label>
// 				</div>
// 			</td>';
// 		}else if($appallow == "not_allow"){
// 			echo'<td class="nk-tb-col nk-tb-col-check">
// 				<div class="custom-control custom-control-sm custom-checkbox notext">
// 					<input type="checkbox" name="ser_appchange" onchange="appshow('.$idapp.')" class="custom-control-input" id="app'.$idapp.'">
// 					<label class="custom-control-label" for="app'.$idapp.'"></label>
// 				</div>
// 			</td>';
// 		}
//	<img src="images/product/a.png" alt="" class="thumb">
	echo'<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['app_type'].'</span>
		</span>
	</td>
</tr>';
										
		}
		echo'</tbody> </table>
		
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {
    $("#myTableap").DataTable({
	"lengthMenu": [[4, 25, 50, -1], [4, 25, 50, "All"]]
	});
	
} )
</script>
';
	}
}

//fetch admin service appointment data
if(isset($_POST['serappbtn2']))
{
$query = mysqli_query($con,"SELECT * FROM `app_type`");
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTableap">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
				
					<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
					<th class="nk-tb-col"><span class="float-right">Action</span></th>
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$idapp = $fetch['app_id'];
	$name = $fetch['app_type'];
// 	$appallow = $fetch['app_show'];

echo'<tr class="nk-tb-item">';
// 		if($appallow == "allow"){
// 			echo'<td class="nk-tb-col nk-tb-col-check">
// 				<div class="custom-control custom-control-sm custom-checkbox notext">
// 					<input type="checkbox" name="ser_appchange" onchange="appshow('.$idapp.')" checked="" class="custom-control-input" id="app'.$idapp.'">
// 					<label class="custom-control-label" for="app'.$idapp.'"></label>
// 				</div>
// 			</td>';
// 		}else if($appallow == "not_allow"){
// 			echo'<td class="nk-tb-col nk-tb-col-check">
// 				<div class="custom-control custom-control-sm custom-checkbox notext">
// 					<input type="checkbox" name="ser_appchange" onchange="appshow('.$idapp.')" class="custom-control-input" id="app'.$idapp.'">
// 					<label class="custom-control-label" for="app'.$idapp.'"></label>
// 				</div>
// 			</td>';
// 		}
//	<img src="images/product/a.png" alt="" class="thumb">
	echo'<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['app_type'].'</span>
		</span>
	</td>
	<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal1('."'$idapp'".','."'$name'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							
							<li><a href="javascript:void(0)" onClick="confirm('."'$idapp'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

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
    $("#myTableap").DataTable({
	"lengthMenu": [[4, 25, 50, -1], [4, 25, 50, "All"]]
	});
	
} )
</script>
';
	}
}

// for service appointment update allow
if(isset($_POST['appupdbtn']))
{
	
	$appuid = $_POST['shid'];
	
	$appq = mysqli_query($con, "UPDATE `app_type` SET `app_show` = 'allow' WHERE `app_id` = '$appuid'");
	
	if($appq){
		echo"doneapp";
	}else {
		echo"errorapp";
	}
	
}

// for service appointment update not allow
if(isset($_POST['appupdnotallow']))
{
	
	$appuid = $_POST['shid'];
	
	$appq = mysqli_query($con, "UPDATE `app_type` SET `app_show` = 'not_allow' WHERE `app_id` = '$appuid'");
	
	if($appq){
		echo"doneapp";
	}else {
		echo"errorapp";
	}
	
}

// for service location update allow
if(isset($_POST['locupdbtn']))
{
	
	$appuid = $_POST['locid'];
	
	$appq = mysqli_query($con, "UPDATE `service_location` SET `loc_allow` = 'allow' WHERE `lo_id` = '$appuid'");
	
	if($appq){
		echo"doneapp";
	}else {
		echo"errorapp";
	}
	
}

// for service location update not allow
if(isset($_POST['locupdnotbtn']))
{
	
	$appuid = $_POST['locid'];
	
	$appq = mysqli_query($con, "UPDATE `service_location` SET `loc_allow` = 'not_allow' WHERE `lo_id` = '$appuid'");
	
	if($appq){
		echo"doneapp";
	}else {
		echo"errorapp";
	}
	
}

// for service name update allow
if(isset($_POST['snameallbtn']))
{
	
	$snuid = $_POST['snamecid'];
	
	$appq = mysqli_query($con, "UPDATE `service_name` SET `sname_allow` = 'allow' WHERE `s_id` = '$snuid'");
	
	if($appq){
		echo"doneapp";
	}else {
		echo"errorapp";
	}
}

// for service name update not allow
if(isset($_POST['snamenotbtn']))
{
	
	$snuid = $_POST['snamecid'];
	
	$appq = mysqli_query($con, "UPDATE `service_name` SET `sname_allow` = 'not_allow' WHERE `s_id` = '$snuid'");
	
	if($appq){
		echo"doneapp";
	}else {
		echo"errorapp";
	}
	
}
// add addorginaztion
if(isset($_POST["addorginaztion"]))
{
	extract($_POST);
	$sql = mysqli_query($con,"SELECT * FROM orginzation WHERE or_postcode = '$opost'");
	if(mysqli_num_rows($sql) > 0)
	{
	    echo"postcodealready";
	}
	$sql1 = mysqli_query($con,"SELECT * FROM orginzation WHERE or_code = '$ocode'");
	if(mysqli_num_rows($sql1) > 0)
	{
	    echo"orcodealready";
	}
	else{
	$jjjs=mysqli_query($con,"INSERT INTO `orginzation`(`or_type`, `or_name`, `or_phone`, `or_address`, `or_code`, `or_firstaddress`, `or_city`, `or_postcode` , `status`) VALUES ('$otype','$oname','$ocontact','$oaddress','$ocode','$ofaddress','$ocity','$opost','Approved')");
	if($jjjs >0){
		echo "sss";
	}else{
		echo "Error";
	}
	}
}
//fetch orginaztion data
if(isset($_POST['orginaztionfetch']))
{
    $status=$_POST["status"];
$query = mysqli_query($con,"SELECT * FROM `orginzation` WHERE status = '$status' ");
	if($query)
	{
		echo'
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable" >
		<thead>
			<tr class="nk-tb-item nk-tb-head">
				<th class="nk-tb-col"><span>Organisation  Name</span></th>
				<th class="nk-tb-col"><span>Type</span></th>
				<th class="nk-tb-col"><span>Address</span></th>
				<th class="nk-tb-col"><span>Contact</span></th>
				<th class="nk-tb-col"><span>Code </span></th>
				<th class="nk-tb-col"><span>Frist Line Address</span></th>
				<th class="nk-tb-col"><span>City</span></th>
				<th class="nk-tb-col"><span>Postal code</span></th>
				<th class="nk-tb-col"><span>Status</span></th>
				<th class="nk-tb-col"><span>Action</span></th>

				
			</tr><!-- .nk-tb-item -->
		</thead>
		<tbody>';
		while($fetch = mysqli_fetch_array($query))
		{
	$id = $fetch['orid'];
	$status =$fetch['status'];
	// $hname = $fetch['h_name'];
	// $name = $fetch['name'];
	// $status = $fetch['h_status'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col ">
		<span class="tb-product">
			
			<span class="tb-sub">'.$fetch['or_name'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['or_type'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['or_address'].'</span>
	</td>
	<td class="nk-tb-col">
	<span class="tb-sub">'.$fetch['or_phone'].'</span>
	</td>
		<td class="nk-tb-col">
	<span class="tb-sub">'.$fetch['or_code'].'</span>
	</td>
		<td class="nk-tb-col">
	<span class="tb-sub">'.$fetch['or_firstaddress'].'</span>
	</td>
		<td class="nk-tb-col">
	<span class="tb-sub">'.$fetch['or_city'].'</span>
	</td>	
	<td class="nk-tb-col">
	<span class="tb-sub">'.$fetch['or_postcode'].'</span>
	</td>';
	if($fetch['status'] == "Approved")
	{
echo'<td class="nk-tb-col tb-col-md">
<span class="btn btn-success" onClick="aprovenotaprove('."'$id'".','."'a$status'".')">Approved</span>
</td>';
	}
	else if($fetch['status'] == "Not approved")
	{
		echo'<td class="nk-tb-col tb-col-md">
<span class="btn btn-danger" onClick="aprovenotaprove('."'$id'".','."'a$status'".')">Not Approved</span>
</td>';
	}
	echo '<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">';
							// <li><a href="javascript:void(0)" onClick="openmodal('."'$id'".','."'$hname'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							
							echo '<li><a href="javascript:void(0)" onClick="confirm('."'$id'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

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
//for hopitals delete
if(isset($_POST['delorg']))
{
		
		$vid = $_POST['vid'];
		$vdel = "DELETE FROM `orginzation` WHERE `orid` = '$vid'";
		$vq = mysqli_query($con,$vdel);
		if($vq){
			echo "Success";
		}else {
			echo "Error";
		}
		
//		header('location:data-table.php');
		
	}
//fetch unapprove orginaztion data
if(isset($_POST['unapproveorginaztionfetch']))
{
$query = mysqli_query($con,"SELECT * FROM `orginzation` WHERE status ='Not approved' ");
	if($query)
	{
		echo'
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">	
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
		<thead>
			<tr class="nk-tb-item nk-tb-head">
				<th class="nk-tb-col tb-col-sm"><span>Organisation Name</span></th>
				<th class="nk-tb-col"><span>Type</span></th>
				<th class="nk-tb-col"><span>Address</span></th>
				<th class="nk-tb-col"><span>Contact</span></th>
				<th class="nk-tb-col"><span>Code </span></th>
				<th class="nk-tb-col"><span>First Line Address</span></th>
				<th class="nk-tb-col"><span>City</span></th>
				<th class="nk-tb-col"><span>Postal code</span></th>
				<th class="nk-tb-col"><span>Status</span></th>
				<th class="nk-tb-col"><span>Action</span></th>
				
			</tr><!-- .nk-tb-item -->
		</thead>
		<tbody>';
		while($fetch = mysqli_fetch_array($query))
		{
	$id = $fetch['orid'];
	// $hname = $fetch['h_name'];
	// $name = $fetch['name'];
	$status = $fetch['status'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['or_name'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['or_type'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['or_address'].'</span>
	</td>
	<td class="nk-tb-col">
	<span class="tb-sub">'.$fetch['or_phone'].'</span>
	</td>
		<td class="nk-tb-col">
	<span class="tb-sub">'.$fetch['or_code'].'</span>
	</td>
		<td class="nk-tb-col">
	<span class="tb-sub">'.$fetch['or_firstaddress'].'</span>
	</td>
		<td class="nk-tb-col">
	<span class="tb-sub">'.$fetch['or_city'].'</span>
	</td>	<td class="nk-tb-col">
	<span class="tb-sub">'.$fetch['or_postcode'].'</span>
	</td>';
	if($fetch['status'] == "approved")
	{
echo'<td class="nk-tb-col tb-col-md">
<span class="btn btn-success" onClick="aprovenotaprove('."'$id'".','."'a$status'".')">Approved</span>
</td>';
	}
	else if($fetch['status'] == "Not approved")
	{
		echo'<td class="nk-tb-col tb-col-md">
<span class="btn btn-danger" onClick="aprovenotaprove('."'$id'".','."'a$status'".')">Not Approved</span>
</td>';
	}
	
echo'	<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">';
							// <li><a href="javascript:void(0)" onClick="openmodal('."'$id'".','."'$hname'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							
							echo '<li><a href="javascript:void(0)" onClick="confirm('."'$id'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

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
?>