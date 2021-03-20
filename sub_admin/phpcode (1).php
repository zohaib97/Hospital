<?php
include_once('../database/db.php');

if(isset($_POST['fetchpatient']))
{
$query = mysqli_query($con,"SELECT * FROM `tbl_patients`");
				
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
							<th class="nk-tb-col"><span>Title</span></th>
							<th class="nk-tb-col"><span>Full Name</span></th>
							<th class="nk-tb-col"><span>Email</span></th>
							<th class="nk-tb-col"><span>Street</span></th>
							<th class="nk-tb-col"><span>City</span></th>
							<th class="nk-tb-col"><span>Country</span></th>
							<th class="nk-tb-col"><span>Telephone Number</span></th>
							<th class="nk-tb-col"><span>NHS No</span></th>
							
						</tr><!-- .nk-tb-item -->
					</thead>
					 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$patid = $fetch['pt_id'];
	$patname = $fetch['pt_title'];
	$patsname = $fetch['pt_surname'];
	$patdob = $fetch['pt_dob'];
	$patnhs = $fetch['pt_nhsno'];
	$patstreet = $fetch['pt_streetname'];
	$patcity = $fetch['pt_city'];
	$patcountry = $fetch['pt_country'];
	$patpostcode = $fetch['pt_postcode'];
	$patemail = $fetch['pt_email'];
	$pattelno = $fetch['pt_telno'];
	$patmobno = $fetch['pt_mobno'];
	$pathid = $fetch['pt_hid'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col">
		<span class="tb-product">
			<span class="title">'.$fetch['pt_title'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['pt_surname'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['pt_email'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['pt_streetname'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['pt_city'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['pt_country'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['pt_telno'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['pt_nhsno'].'</span>
	</td>';
		}
		echo'</tbody> </table>
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {
    $("#myTable").DataTable();
} )
</script>;
';
	}
}

if(isset($_POST['patientfetch']))
{
	$nhs = $_POST['nhs'];
$query = mysqli_query($con,"SELECT * FROM `tbl_patients` WHERE pt_nhsno = '$nhs'");
	echo mysqli_error($con);
	if(mysqli_num_rows($query)>0)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<hr>
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
					<th class="nk-tb-col nk-tb-col-check">
						<div class="custom-control custom-control-sm custom-checkbox notext">
							<input type="checkbox" class="custom-control-input" id="puid">
							<label class="custom-control-label" for="puid"></label>
						</div>
					</th>
					<th class="nk-tb-col"><span>Full Name</span></th>
				
					<th class="nk-tb-col"><span>Mobile No</span></th>
					<th class="nk-tb-col"><span>NHS no</span></th>
					<th class="nk-tb-col"><span>Street Name</span></th>
					<th class="nk-tb-col"><span>Date of Birth</span></th>
					
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$name = $fetch['pt_name'];
	$id = $fetch['pt_id'];
	$nh = $fetch['pt_nhsno'];
	$mobno = $fetch['pt_mobno'];
	$sname = $fetch['pt_streetname'];
	$dob = $fetch['pt_dob']; 

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input gg" name="check[]" value="'.$id.'" id="check'.$id.'" >
			<label class="custom-control-label" for="check'.$id.'" onclick="showss('.$id.')"></label>
		</div>
	</td>
	<td class="nk-tb-col">
		<span class="tb-product">
			
			<span class="title">'.$name.'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$mobno.'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$nh.'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$sname.'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$dob.'</span>
	</td>
	';
		
	
										
		}
		echo'</tbody> </table>
		<button class="btn btn-info float-right" onClick="showmyref()">Refer/Advice</button>
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {
    $("#myTable").DataTable();
} )
</script>
';
	}
	else{
		echo"No Data Found";
	}
}







if(isset($_POST['addpatient']))
{
	
	$gphid = $_POST['hid'];
	$ptitle = $_POST['ptitle'];
	$pfirstname = $_POST['pfirstname'];
	$psurname = $_POST['psurname'];
	$pdob = $_POST['pdob'];
	$nhsno = $_POST['nhsno'];
	$houseno = $_POST['houseno'];
	$streetname = $_POST['streetname'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$postalcode = $_POST['postalcode'];
	$telephoneno = $_POST['telephoneno'];
	$mobileno = $_POST['mobileno'];
	$email = $_POST['email'];
	
	
	$query = mysqli_query($con,"INSERT INTO `tbl_patients`(`pt_title`, `pt_name`, `pt_surname`, `pt_dob`, `pt_nhsno`, `pt_houseno`, `pt_streetname`, `pt_city`, `pt_country`, `pt_postcode`, `pt_telno`, `pt_mobno`, `pt_email`,`pt_hid`)VALUES('$ptitle','$pfirstname','$psurname','$pdob','$nhsno','$houseno','$streetname','$city','$country','$postalcode','$telephoneno','$mobileno','$email','$gphid')");
	
	if($query)
	{
		echo "Success";
	}
	else
	{
		echo "Error";
	}
}



//for staff manager delete
if(isset($_POST['deladmin']))
{
		
		$vid = $_POST['vid'];
		$vdel = "DELETE FROM `tbl_ruser` WHERE `ur_id` = '$vid'";
		$vq = mysqli_query($con,$vdel);
		if($vq){
			echo "Success";
		}else {
			echo "Error";
		} 
}

if(isset($_POST["appgeneralbtn"]))
{
	$vid = $_POST['vid'];
	$status=$_POST["status"];
	if($status =="not_approve"){
		$vdel = "UPDATE  `tbl_ruser` SET ur_status='approve' WHERE `ur_id` = '$vid'";
		$vq = mysqli_query($con,$vdel);
		$aaa=mysqli_query($con,"select * from tbl_ruser where ur_id='$vid'");
		$feh=mysqli_fetch_array($aaa);
		$email=$feh["ur_email"];
			$to      = $email;
	$subject = 'For Approval ';
	$message = '<html><body>';
	$message .= '<h1>You Has Been Approved By Admin!</h1>';
	$message .= '</body></html>';
	$headers = 'From: info@deevloopers.com' . "\r\n" .
		'Reply-To: info@deevloopers.com' . "\r\n" .
		"MIME-Version: 1.0\r\n".
		"Content-Type: text/html; charset=ISO-8859-1\r\n";
		'X-Mailer: PHP/' . phpversion();
	
	mail($to, $subject, $message, $headers);
		if($vq){
			echo "Success";
		}else {
			echo "Error";
		} 
	}elseif($status =="approve"){
		$vdel = "UPDATE  `tbl_ruser` SET ur_status='not_approve' WHERE `ur_id` = '$vid'";
		$vq = mysqli_query($con,$vdel);
		if($vq){
			echo "Successs";
		}else {
			echo "Errorr";
		} 
	}
}

// fetch staff G-P Referrer data
if(isset($_POST['fetchgpdata']))
{
    $em = $_SESSION['superadmin'];
    $sql = mysqli_query($con,"SELECT * FROM admin WHERE email = '$em'");
    $fet = mysqli_fetch_array($sql);
    $org = $fet['organization'];
	$query = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_orgtype = '$org' and ur_role_id = '5'");
				
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
							<th class="nk-tb-col"><span>Full Name</span></th>
							<th class="nk-tb-col"><span>Email</span></th>
							<th class="nk-tb-col"><span>Password</span></th>
							<th class="nk-tb-col"><span>Status</span></th>
						
							<th class="nk-tb-col nk-tb-col-tools">
								<ul class="nk-tb-actions gx-1 my-n1">
									<li class="mr-n1">
										<div class="dropdown">
											<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
											<div class="dropdown-menu dropdown-menu-right">
												<ul class="link-list-opt no-bdr">
													<li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
													<li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
													<li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
													<li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</th>
						</tr><!-- .nk-tb-item -->
					</thead>
					 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
			$mid = $fetch['ur_id'];
	$sgpname = $fetch['ur_fname'];
	$sgpemail = $fetch['ur_email'];
	$sgppass = $fetch['ur_pass'];


	echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col">
		<span class="tb-product">
			
			<span class="title">'.$fetch['ur_fname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['ur_email'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['ur_pass'].'</span>
	</td>';
	if($fetch["ur_status"] =="not_approve"){
		echo '<td class="nk-tb-col"><span class="btn btn-danger" onclick="aprovenotaprove(\''.$mid.'\',\'g'.$fetch["ur_status"].'\')">Not Active</span></td>';
	}elseif($fetch["ur_status"] =="approve"){
		echo '<td class="nk-tb-col"><span class="btn btn-success" onclick="aprovenotaprove(\''.$mid.'\',\'g'.$fetch["ur_status"].'\')">Active</span></td>';
	}
	echo'
	<td class="nk-tb-col">
		
	</td>';
										
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

//fetch staff service definer data
if(isset($_POST['fetchsrdef']))
{
$query = mysqli_query($con,"SELECT * FROM `tbl_service_definer`");
				
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
							<th class="nk-tb-col"><span>Full Name</span></th>
							<th class="nk-tb-col"><span>Email</span></th>
							<th class="nk-tb-col"><span>Password</span></th>
							<th class="nk-tb-col"><span>Contact</span></th>
							<th class="nk-tb-col"><span>Role</span></th>
							<th class="nk-tb-col nk-tb-col-tools">
								<ul class="nk-tb-actions gx-1 my-n1">
									<li class="mr-n1">
										<div class="dropdown">
											<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
											<div class="dropdown-menu dropdown-menu-right">
												<ul class="link-list-opt no-bdr">
													<li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
													<li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
													<li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
													<li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</th>
						</tr><!-- .nk-tb-item -->
					</thead>
					 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$aserid = $fetch['u_serid'];
	$asername = $fetch['u_sername'];
	$aseremail = $fetch['u_seremail'];
	$aserpass = $fetch['u_serpass'];
	$asercon = $fetch['u_sercontact'];
	$aserrole = $fetch['u_serrole'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col">
		<span class="tb-product">
			<span class="title">'.$fetch['u_sername'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['u_seremail'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['u_serpass'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['u_sercontact'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['u_serrole'].'</span>
	</td>
	<td class="nk-tb-col">
		
	</td>';
		}
		echo'</tbody> </table>
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {
    $("#myTable").DataTable();
} )
</script>;
';
	}
}


//fetch staff manager data
if(isset($_POST['adminfetch']))
{
$query = mysqli_query($con,"SELECT * FROM tbl_user JOIN staff_role on tbl_user.tbl_role=staff_role.role_id WHERE tbl_user.tbl_role= '2'");
				
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
							<th class="nk-tb-col"><span>Full Name</span></th>
							<th class="nk-tb-col"><span>Email</span></th>
							<th class="nk-tb-col"><span>Password</span></th>
							<th class="nk-tb-col"><span>Contact</span></th>
							<th class="nk-tb-col"><span>Department</span></th>
							<th class="nk-tb-col"><span>Designtion</span></th>
							<th class="nk-tb-col nk-tb-col-tools">
								<ul class="nk-tb-actions gx-1 my-n1">
									<li class="mr-n1">
										<div class="dropdown">
											<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
											<div class="dropdown-menu dropdown-menu-right">
												<ul class="link-list-opt no-bdr">
													<li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
													<li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
													<li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
													<li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
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
	$status = $fetch['staff_status'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col">
		<span class="tb-product">
			
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
	</td>';
			if($fetch['staff_status'] == "not_active")
	{
	echo'
	<td class="nk-tb-col">
		<span class="btn btn-danger" onClick="aprovenotaprove('."'$mid'".','."'m$status'".')">Not Active</span>
	</td>';
	}
			else
			{
				echo'
	<td class="nk-tb-col">
		<span class="btn btn-success" onClick="aprovenotaprove('."'$mid'".','."'m$status'".')">Active</span>
	</td>';
			}
	echo'<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal1('."'$mid'".','."'$mname'".','."'$msname'".','."'$memail'".','."'$mpass'".','."'$mphn'".','."'$mdepart'".','."'$mdob'".','."'$mrole'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							<li><a href="#"><em class="icon ni ni-eye"></em><span>View</span></a></li>
							
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
</script>
';
	}
}

//fetch admin data
if(isset($_POST['adminfetchupdate']))
{
$e=	$_SESSION['superadmin'];
$query = mysqli_query($con,"SELECT * FROM `admin` WHERE super_admin = 0 and email= '$e'");
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
						<span>AB</span>
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

// for fetch service name
if(isset($_POST['fetchserbtndata']))
{
	$sernameq = mysqli_query($con, "SELECT * FROM `service_name`");
	echo'<option>- Select -</option>';
 while($datarole = mysqli_fetch_assoc($sernameq)){ 
 	echo'<option value='.$datarole['s_id'].'>'.$datarole['s_name'].'</option>';
 }
}

// for fetch service location
if(isset($_POST['fetchserlocbtn']))
{
	$serlq = mysqli_query($con, "SELECT * FROM `service_location`");
	echo'<option>- Select -</option>';
	while($fetchloc = mysqli_fetch_assoc($serlq)){
		echo'<option value='.$fetchloc['lo_id'].'>'.$fetchloc['lo_location'].'</option>';
	}
}

// for fetch service speciality
if(isset($_POST['fetchspecbtn']))
{
	$serlq = mysqli_query($con, "SELECT * FROM `ser_specialty_add`");
	echo'<option>- Select -</option>';
	while($fetchloc = mysqli_fetch_assoc($serlq)){
		echo'<option value='.$fetchloc['spec_id'].'>'.$fetchloc['spec_name'].'</option>';
	}

}

// for fetch service appointment
if(isset($_POST['fetchappbtn']))
{
	$serappq = mysqli_query($con, "SELECT * FROM `app_type`");
	echo'<option>- Select -</option>';
	while($fetchapp = mysqli_fetch_assoc($serappq)){
		echo'<option value='.$fetchapp['app_id'].'>'.$fetchapp['app_type'].'</option>';
	}
}




if(isset($_POST['clinical']))
{
	
$clinicaltype = $_POST['clinical'];
echo "$clinicaltype";

	$query = "SELECT * from `service_cliniciant` WHERE cl_spectype = '$clinicaltype' ";

	$result = $con->query($query);

	if ($result->num_rows > 0) {
 	   while ($row = $result->fetch_assoc()) {
		echo '<option value="'.$row['cl_id'].'">'.$row['cl_type'].'</option>';
 	    }
	}else{
	    echo '<option value="">State not available</option>'; 
	}
}
// for fetch service clinical type
// if(isset($_POST['fetchclinbtn']))
// {
// 
// 	$cliniq = mysqli_query($con, "SELECT * from `service_cliniciant`  ");
// 	echo'<option>- Select -</option>';
// 	while($fetchcl = mysqli_fetch_assoc($cliniq)){
// 		echo'<option value='.$fetchcl['cl_id'].'>'.$fetchcl['cl_type'].'</option>';
// 	}
// }

// for fetch service specialty
if(isset($_POST['fetchdataspecbtn']))
{
	$sernameq = mysqli_query($con, "SELECT * FROM `ser_specialty_add`");
	echo'<option>- Select -</option>';
 while($datarole = mysqli_fetch_assoc($sernameq)){
 	echo'<option value='.$datarole['spec_id'].'>'.$datarole['spec_name'].'</option>';
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
		$maid = $_POST['mid'];
		$mroleid = $_POST['roleid'];
		$mafname = $_POST['fname'];
		$masname = $_POST['sname'];
		$maemail = $_POST['memail'];
		$mapass = $_POST['mpassword'];
		$macont = $_POST['mcontact'];
		$madepart = $_POST['mdepart'];
		$madob = $_POST['mdob'];	
	
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

// for staff register
if(isset($_POST['satffbtn']))
{
	
	$stafffname = mysqli_real_escape_string($con, $_POST['staff_name']);
	$staffsname = mysqli_real_escape_string($con, $_POST['staff_sname']);
	$title = mysqli_real_escape_string($con, $_POST['title']);
	$staffemail = mysqli_real_escape_string($con, $_POST['staff_email']);
	$staffphn = mysqli_real_escape_string($con, $_POST['staff_contact']);
	$staffdepart = mysqli_real_escape_string($con, $_POST['staff_depart']);
	$staffdob = mysqli_real_escape_string($con, $_POST['staff_dob']);
	
	$emcheck = mysqli_query($con, "SELECT * FROM `tbl_user` WHERE `staff_email` = '$staffemail'");
	$contem = mysqli_num_rows($emcheck);
	
	if($contem>0){
		echo"emailalready";
	}
	else
	{
		
		mysqli_query($con,"INSERT INTO `tbl_ruser`(`ur_fname`, `ur_sname`, `ur_email`, `ur_pass`, `title`, `ur_orgtype`, `ur_role_id`, `ur_status`, `ur_proregno`, `ur_address`, `ur_city`, `ur_postcode`) VALUES ('$stafffname','$staffsname','$staffemail','$staffpass','$title','$staffdepart','$staffrole','approve','')");
		// if($staffrole == "2"){
		// 	$qinsert = mysqli_query($con, "INSERT INTO `tbl_user`(`staff_fname`, `staff_sname`, `staff_email`,`staff_add1`,`staff_add2`,`staff_add3`,`staff_postcode`, `staff_pass`, `staff_contact`, `staff_department`, `staff_dob`, `tbl_role`) VALUES ('$stafffname','$staffsname','$staffemail','$add1','$add2','$add3','$postcode','$staffpass','$staffphn','$staffdepart','$staffdob','$staffrole')");
			
		// }
		// else
		// {
			
		// 	$qinsert = mysqli_query($con, "INSERT INTO `tbl_user`(`staff_fname`, `staff_sname`, `staff_email`,`staff_add1`,`staff_add2`,`staff_add3`,`staff_postcode`, `staff_pass`, `staff_contact`, `staff_department`, `staff_dob`, `staff_regno`, `tbl_role`) VALUES ('$stafffname','$staffsname','$staffemail','$add1','$add2','$add3','$postcode','$staffpass','$staffphn','$staffdepart','$staffdob','$staffregi','$staffrole')");
		// }
//		echo"done";
	}
	
}


//fetch staff consultant data
if(isset($_POST['consultantbtn']))
{
	$em = $_SESSION['superadmin'];
    $sql = mysqli_query($con,"SELECT * FROM admin WHERE email = '$em'");
    $fet = mysqli_fetch_array($sql);
    $org = $fet['organization'];
	$query = mysqli_query($con,"SELECT * FROM `tbl_ruser`,tbl_role,orginzation where tbl_role.ro_id=tbl_ruser.ur_role_id and tbl_ruser.ur_orgtype = orginzation.orid and tbl_ruser.ur_role_id='3' and ur_orgtype = '$org'");
				
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate " data-auto-responsive="false" id="myTable">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
						
							<th class="nk-tb-col"><span>Full Name</span></th>
							<th class="nk-tb-col"><span>Email</span></th>
							<th class="nk-tb-col"><span>Password</span></th>
							<th class="nk-tb-col"><span>Role</span></th>
							<th class="nk-tb-col"><span>Orgnization Type</span></th>
							<th class="nk-tb-col "><span>Orgnization Name</span></th>
							<th class="nk-tb-col "><span>Status</span></th>
							<th class="nk-tb-col nk-tb-col-tools">
								<ul class="nk-tb-actions gx-1 my-n1">
									<li class="mr-n1">
										<div class="dropdown">
											<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
											<div class="dropdown-menu dropdown-menu-right">
												<ul class="link-list-opt no-bdr">
													<li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
													<li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
													<li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
													<li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</th>
						</tr><!-- .nk-tb-item -->
					</thead>
					 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$mid = $fetch['ur_id'];
	// $mname = $fetch['staff_fname'];
	// $msname = $fetch['staff_sname'];
	// $memail = $fetch['staff_email'];
	// $mpass = $fetch['staff_pass'];
	// $mphn = $fetch['staff_contact'];
	// $mdepart = $fetch['staff_department'];
	// $mdob = $fetch['staff_dob'];
	// $mrole = $fetch['tbl_role'];
	// $mrname = $fetch['role_name'];

	echo'   <tr class="nk-tb-item">
	
	<td class="nk-tb-col ">
		<span class="tb-product">
		<span class="tb-sub">'.$fetch['ur_fname'].$fetch["ur_sname"].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['ur_email'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['ur_pass'].'</span>
	</td>
	<td class="nk-tb-col">
	    <span class="tb-sub">'.$fetch['ro_role'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['or_type'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['or_name'].'</span>
	</td>
	<td class="nk-tb-col">';
	if($fetch["ur_status"] =="not_approve"){
		echo '<span class="btn btn-danger" onclick="aprovenotaprove(\''.$mid.'\',\'c'.$fetch["ur_status"].'\')">Not Active</span>';
	}elseif($fetch["ur_status"] =="approve"){
		echo '<span class="btn btn-success" onclick="aprovenotaprove(\''.$mid.'\',\'c'.$fetch["ur_status"].'\')">Active</span>';
	}
	echo '</td>
	<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">';
			// <li><a href="javascript:void(0)" onClick="openmodal1('."'$mid'".','."'$mname'".','."'$msname'".','."'$memail'".','."'$mpass'".','."'$mphn'".','."'$mdepart'".','."'$mdob'".','."'$mrole'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							echo '<li><a href="#"><em class="icon ni ni-eye"></em><span>View</span></a></li>
							
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
	</script>
	';
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
							<th class="nk-tb-col"><span>Full Name</span></th>
							<th class="nk-tb-col"><span>Email</span></th>
							<th class="nk-tb-col"><span>Password</span></th>
							<th class="nk-tb-col"><span>Contact</span></th>
							<th class="nk-tb-col"><span>Department</span></th>
							<th class="nk-tb-col"><span>Designtion</span></th>
							<th class="nk-tb-col nk-tb-col-tools">
								<ul class="nk-tb-actions gx-1 my-n1">
									<li class="mr-n1">
										<div class="dropdown">
											<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
											<div class="dropdown-menu dropdown-menu-right">
												<ul class="link-list-opt no-bdr">
													<li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
													<li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
													<li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
													<li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
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
	$status = $fetch['staff_status'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" id="puid1">
			<label class="custom-control-label" for="puid1"></label>
		</div>
	</td>
	<td class="nk-tb-col tb-col-">
		<span class="tb-product">
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
	</td>';
			if($fetch['staff_status'] == "not_active")
	{
	echo'
	<td class="nk-tb-col">
		<span class="btn btn-danger" onClick="aprovenotaprove('."'$mid'".','."'d$status'".')">Not Active</span>
	</td>';
	}
			else
			{
	echo'<td class="nk-tb-col">
		<span class="btn btn-success" onClick="aprovenotaprove('."'$mid'".','."'d$status'".')">Active</span>
	</td>';
			}
	echo'<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal1('."'$mid'".','."'$mname'".','."'$msname'".','."'$memail'".','."'$mpass'".','."'$mphn'".','."'$mdepart'".','."'$mdob'".','."'$mrole'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							<li><a href="#"><em class="icon ni ni-eye"></em><span>View</span></a></li>
							
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
</script>;
';
	}
}

//fetch staff nurse data
if(isset($_POST['nursebtn']))
{
	$em = $_SESSION['superadmin'];
    $sql = mysqli_query($con,"SELECT * FROM admin WHERE email = '$em'");
    $fet = mysqli_fetch_array($sql);
    $org = $fet['organization'];
			$query = mysqli_query($con,"SELECT * FROM `tbl_ruser`,tbl_role,orginzation where tbl_role.ro_id=tbl_ruser.ur_role_id and tbl_ruser.ur_orgtype = orginzation.orid and tbl_ruser.ur_role_id='4' and ur_orgtype = '$org'");
						
			if($query)
			{
				echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
				
				<table class="nowrap nk-tb-list is-separate " data-auto-responsive="false" id="myTable">
							<thead>
								<tr class="nk-tb-item nk-tb-head">
								
									<th class="nk-tb-col"><span>Full Name</span></th>
									<th class="nk-tb-col"><span>Email</span></th>
									<th class="nk-tb-col"><span>Password</span></th>
									<th class="nk-tb-col"><span>Role</span></th>
									<th class="nk-tb-col"><span>Orgnization Type</span></th>
									<th class="nk-tb-col"><span>Orgnization Name</span></th>
									<th class="nk-tb-col"><span>Status</span></th>
									<th class="nk-tb-col nk-tb-col-tools">
										<ul class="nk-tb-actions gx-1 my-n1">
											<li class="mr-n1">
												<div class="dropdown">
													<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
													<div class="dropdown-menu dropdown-menu-right">
														<ul class="link-list-opt no-bdr">
															<li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
															<li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
															<li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
															<li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
														</ul>
													</div>
												</div>
											</li>
										</ul>
									</th>
								</tr><!-- .nk-tb-item -->
							</thead>
							<tbody id="">';
				while($fetch = mysqli_fetch_array($query))
				{
			$mid = $fetch['ur_id'];
			// $mname = $fetch['staff_fname'];
			// $msname = $fetch['staff_sname'];
			// $memail = $fetch['staff_email'];
			// $mpass = $fetch['staff_pass'];
			// $mphn = $fetch['staff_contact'];
			// $mdepart = $fetch['staff_department'];
			// $mdob = $fetch['staff_dob'];
			// $mrole = $fetch['tbl_role'];
			// $mrname = $fetch['role_name'];

		echo'   <tr class="nk-tb-item">
			
			<td class="nk-tb-col">
				<span class="tb-product">
					<span class="title">'.$fetch['ur_fname'].$fetch["ur_sname"].'</span>
				</span>
			</td>
			<td class="nk-tb-col">
				<span class="tb-sub">'.$fetch['ur_email'].'</span>
			</td>
			<td class="nk-tb-col">
				<span class="tb-lead">'.$fetch['ur_pass'].'</span>
			</td>
			<td class="nk-tb-col">
			<span class="tb-lead">'.$fetch['ro_role'].'</span>
			</td>
			<td class="nk-tb-col">
				<span class="tb-sub">'.$fetch['or_type'].'</span>
			</td>
			<td class="nk-tb-col">
				<span class="tb-sub">'.$fetch['or_name'].'</span>
			</td>
			<td class="nk-tb-col">';
			if($fetch["ur_status"] =="not_approve"){
				echo '<span class="btn btn-danger" onclick="aprovenotaprove(\''.$mid.'\',\''.$fetch["ur_status"].'\')">Not Active</span>';
			}elseif($fetch["ur_status"] =="approve"){
				echo '<span class="btn btn-success" onclick="aprovenotaprove(\''.$mid.'\',\''.$fetch["ur_status"].'\')">Active</span>';
			}
			echo '</td>
			<td class="nk-tb-col nk-tb-col-tools">
				<ul class="nk-tb-actions gx-1 my-n1">
					<li class="mr-n1">
						<div class="dropdown">
							<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
							<div class="dropdown-menu dropdown-menu-right">
								<ul class="link-list-opt no-bdr">';
					// <li><a href="javascript:void(0)" onClick="openmodal1('."'$mid'".','."'$mname'".','."'$msname'".','."'$memail'".','."'$mpass'".','."'$mphn'".','."'$mdepart'".','."'$mdob'".','."'$mrole'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
									echo '<li><a href="#"><em class="icon ni ni-eye"></em><span>View</span></a></li>
									
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
		</script>
		';
			}
}

//fetch staff dentist data
if(isset($_POST['dentistbtn']))
{
	$em = $_SESSION['superadmin'];
    $sql = mysqli_query($con,"SELECT * FROM admin WHERE email = '$em'");
    $fet = mysqli_fetch_array($sql);
    $org = $fet['organization'];
		$query = mysqli_query($con,"SELECT * FROM `tbl_ruser`,tbl_role,orginzation where tbl_role.ro_id=tbl_ruser.ur_role_id and tbl_ruser.ur_orgtype = orginzation.orid and tbl_ruser.ur_role_id='1' and ur_orgtype = '$org'");
					
		if($query)
		{
			echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
			
			<table class="nowrap nk-tb-list is-separate " data-auto-responsive="false" id="myTable">
						<thead>
							<tr class="nk-tb-item nk-tb-head">
							
								<th class="nk-tb-col"><span>Full Name</span></th>
								<th class="nk-tb-col"><span>Email</span></th>
								<th class="nk-tb-col"><span>Password</span></th>
								<th class="nk-tb-col"><span>Role</span></th>
								<th class="nk-tb-col"><span>Orgnization Type</span></th>
								<th class="nk-tb-col"><span>Orgnization Name</span></th>
								<th class="nk-tb-col"><span>Status</span></th>
								<th class="nk-tb-col nk-tb-col-tools">
									<ul class="nk-tb-actions gx-1 my-n1">
										<li class="mr-n1">
											<div class="dropdown">
												<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
												<div class="dropdown-menu dropdown-menu-right">
													<ul class="link-list-opt no-bdr">
														<li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
														<li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
														<li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
														<li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
													</ul>
												</div>
											</div>
										</li>
									</ul>
								</th>
							</tr><!-- .nk-tb-item -->
						</thead>
						<tbody id="">';
			while($fetch = mysqli_fetch_array($query))
			{
		$mid = $fetch['ur_id'];
		// $mname = $fetch['staff_fname'];
		// $msname = $fetch['staff_sname'];
		// $memail = $fetch['staff_email'];
		// $mpass = $fetch['staff_pass'];
		// $mphn = $fetch['staff_contact'];
		// $mdepart = $fetch['staff_department'];
		// $mdob = $fetch['staff_dob'];
		// $mrole = $fetch['tbl_role'];
		// $mrname = $fetch['role_name'];

	echo'   <tr class="nk-tb-item">
		
		<td class="nk-tb-col">
			<span class="tb-product">
				<span class="title">'.$fetch['ur_fname'].$fetch["ur_sname"].'</span>
			</span>
		</td>
		<td class="nk-tb-col">
			<span class="tb-sub">'.$fetch['ur_email'].'</span>
		</td>
		<td class="nk-tb-col">
			<span class="tb-lead">'.$fetch['ur_pass'].'</span>
		</td>
		<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['ro_role'].'</span>
		</td>
		<td class="nk-tb-col">
			<span class="tb-sub">'.$fetch['or_type'].'</span>
		</td>
		<td class="nk-tb-col">
			<span class="tb-sub">'.$fetch['or_name'].'</span>
		</td>
		<td class="nk-tb-col">';
		if($fetch["ur_status"] =="not_approve"){
			echo '<span class="btn btn-danger" onclick="aprovenotaprove(\''.$mid.'\',\''.$fetch["ur_status"].'\')">Not Active</span>';
		}elseif($fetch["ur_status"] =="approve"){
			echo '<span class="btn btn-success" onclick="aprovenotaprove(\''.$mid.'\',\''.$fetch["ur_status"].'\')">Active</span>';
		}
		echo '</td>
		<td class="nk-tb-col nk-tb-col-tools">
			<ul class="nk-tb-actions gx-1 my-n1">
				<li class="mr-n1">
					<div class="dropdown">
						<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
						<div class="dropdown-menu dropdown-menu-right">
							<ul class="link-list-opt no-bdr">';
						echo '<li><a href="#"><em class="icon ni ni-eye"></em><span>View</span></a></li>
								
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
	</script>
	';
		}

}
//fetch staff genral pratictional data
if(isset($_POST['genralpbtn']))
{
	$query = mysqli_query($con,"SELECT * FROM `tbl_ruser`,tbl_role,orginzation where tbl_role.ro_id=tbl_ruser.ur_role_id and tbl_ruser.ur_orgtype = orginzation.orid and tbl_ruser.ur_role_id='5'");
				
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate " data-auto-responsive="false" id="myTable">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
						
							<th class="nk-tb-col"><span>Full Name</span></th>
							<th class="nk-tb-col"><span>Email</span></th>
							<th class="nk-tb-col"><span>Password</span></th>
							<th class="nk-tb-col"><span>Role</span></th>
							<th class="nk-tb-col"><span>Orgnisation Type</span></th>
							<th class="nk-tb-col"><span>Orgnisation Name</span></th>
							<th class="nk-tb-col"><span>Status</span></th>
							<th class="nk-tb-col nk-tb-col-tools">
								<ul class="nk-tb-actions gx-1 my-n1">
									<li class="mr-n1">
										<div class="dropdown">
											<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
											<div class="dropdown-menu dropdown-menu-right">
												<ul class="link-list-opt no-bdr">
													<li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
													<li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
													<li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
													<li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</th>
						</tr><!-- .nk-tb-item -->
					</thead>
					 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$mid = $fetch['ur_id'];
	// $mname = $fetch['staff_fname'];
	// $msname = $fetch['staff_sname'];
	// $memail = $fetch['staff_email'];
	// $mpass = $fetch['staff_pass'];
	// $mphn = $fetch['staff_contact'];
	// $mdepart = $fetch['staff_department'];
	// $mdob = $fetch['staff_dob'];
	// $mrole = $fetch['tbl_role'];
	// $mrname = $fetch['role_name'];

	echo'   <tr class="nk-tb-item">
	
	<td class="nk-tb-col">
		<span class="tb-product">
			<span class="tb-sub">'.$fetch['ur_fname'].$fetch["ur_sname"].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['ur_email'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['ur_pass'].'</span>
	</td>
	<td class="nk-tb-col">
	<span class="tb-sub">'.$fetch['ro_role'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['or_type'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch['or_name'].'</span>
	</td>
	<td class="nk-tb-col">';
	if($fetch["ur_status"] =="not_approve"){
		echo '<span class="btn btn-danger" onclick="eaprovenotaprove(\''.$mid.'\',\''.$fetch["ur_status"].'\')">Not Active</span>';
	}elseif($fetch["ur_status"] =="approve"){
		echo '<span class="btn btn-success" onclick="eaprovenotaprove(\''.$mid.'\',\''.$fetch["ur_status"].'\')">Active</span>';
	}
	echo '</td>
	<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mr-n1">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">';
			// <li><a href="javascript:void(0)" onClick="openmodal1('."'$mid'".','."'$mname'".','."'$msname'".','."'$memail'".','."'$mpass'".','."'$mphn'".','."'$mdepart'".','."'$mdob'".','."'$mrole'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
							echo '<li><a href="#"><em class="icon ni ni-eye"></em><span>View</span></a></li>
							
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
	</script>
	';
	}
}

// for Service Definer from sub_admin
if(isset($_POST['servicadd']))
	{
		$ser_name = mysqli_real_escape_string($con, $_POST['ser_name']);
		
		$ser_cmnt = mysqli_real_escape_string($con, $_POST['ser_cmnts']);
		$ser_refer = mysqli_real_escape_string($con, $_POST['ser_show']);
		$ser_loc = mysqli_real_escape_string($con, $_POST['ser_location']);
		$ser_spe = mysqli_real_escape_string($con, $_POST['ser_speciality']);
		$ser_app = mysqli_real_escape_string($con, $_POST['ser_apptype']);
		$ser_gen = mysqli_real_escape_string($con, $_POST['ser_gen']);
		$ser_dire = mysqli_real_escape_string($con, $_POST['ser_direct']);
		$ser_eff = mysqli_real_escape_string($con, $_POST['ser_effect']);
		$ser_eff2 = mysqli_real_escape_string($con, $_POST['ser_effect2']);
		// $ser_tdate = mysqli_real_escape_string($con, $_POST['ser_tdate']);
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
		// $ser_conton = mysqli_real_escape_string($con, $_POST['ser_sontown']);
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
	
		$ser_reqt = $_POST['ser_reqt'];
		$chk = "";
		foreach($ser_reqt as $chek){
		$chk .= $chek.",";
		}
	
		
			$codeapp = rand(0000,9999);
			$ser_ids =  mysqli_real_escape_string($con, $codeapp);
	
	// login user || admin ID
	$uaid = $_SESSION['a_id'];
	// fetch data hospital and admin for hospitals name
	$e = $_SESSION['superadmin'];
	
	$q = mysqli_query($con,"SELECT * FROM `admin` WHERE `email` = '$e'");
	$af = mysqli_fetch_array($q);
	$id = $af['organization'];
	$name = $af['name'];
	$sql = mysqli_query($con,"SELECT * FROM orginzation WHERE orid = '$id'");
	$fet = mysqli_fetch_array($sql);
	$orgid = $fet['orid'];
	$orgname = $fet['or_name'];
	
		 // for service create
		$query = mysqli_query($con, "INSERT INTO `services`(`service_id`, `service_name`, `service_r_t_support`, `service_cmnts`, `service_refer`, `service_location`, `service_speciality`, `service_a_type`, `service_gender`, `sender_bookable`, `service_e_date`, `service_e_date2`, `service_age`, `service_age2`, `service_caremenu`, `ser_cl_type`,`ser_res_reas`, `ser_res_cmnt`, `ser_instruct`, `ser_priority_rout`, `ser_priority_urg`, `ser_priority_wekex`, `ser_priority_2week`, `s_orgname`, `s_orgid`, `ser_create_id`, `ser_create_name`,`status`) VALUES ('$ser_ids','$ser_name','$chk','$res_cmnt','$ser_refer','$ser_loc','$ser_spe','$ser_app','$ser_gen','$ser_dire','$ser_eff','$ser_eff2','$ser_ager','$ser_ager2','$ser_care','$cltype','$res_reas','$res_cmnt','$ser_inst','$ser_rout','$ser_urg','$ser_weekend','$ser_toweek','$orgname','$orgid','$uaid','$name','approve')");	
	
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

// for create role register
if(isset($_POST['createrolebtn']))
{
	
	$stafffname = mysqli_real_escape_string($con, $_POST['staff_name']);
	$staffsname = mysqli_real_escape_string($con, $_POST['staff_sname']);
	$staffemail = mysqli_real_escape_string($con, $_POST['staff_email']);
	$staffpass=mysqli_real_escape_string($con,$_POST["staff_pass"]);
	$title=mysqli_real_escape_string($con,$_POST["title"]);

	$orgname = mysqli_real_escape_string($con, $_POST['orgname']);	
	$orgphno = mysqli_real_escape_string($con, $_POST['orgphno']);	
	$orgaddress = mysqli_real_escape_string($con, $_POST['orgaddress']);	
	$proregno = mysqli_real_escape_string($con, $_POST['proregno']);	
	$orgcode = mysqli_real_escape_string($con, $_POST['orgcode']);	
	$address = mysqli_real_escape_string($con, $_POST['address']);	
	$city = mysqli_real_escape_string($con, $_POST['city']);	
	$postcode = mysqli_real_escape_string($con, $_POST['postcode']);
	$orgtype = mysqli_real_escape_string($con, $_POST['orgtype']);	
	$staffrole = mysqli_real_escape_string($con, $_POST['staff_role']);
	
	$emcheck = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$staffemail'");
	$contem = mysqli_num_rows($emcheck);
	
	if($contem>0){
		echo"emailalready";
	}else {
		

		// for role name
		$qrole = mysqli_query($con, "SELECT * FROM  `tbl_role` WHERE `ro_id` = '$staffrole'");
		$fetchd = mysqli_fetch_assoc($qrole);
		$rname = $fetchd['ro_role'];
		
		// "INSERT INTO `tbl_ruser`(`ur_fname`, `ur_sname`, `ur_email`, `ur_pass`, `ur_contact`, `ur_org`, `ur_dob`, `ur_regno`, `ur_role_id`, `ur_role_name`, `ur_hid`, `ur_status`,'ru_created_id') VALUES ('$stafffname','$staffsname','$staffemail','$staffpass','$staffphn','$staffdepart','$staffdob','$staffregi','$staffrole','$rname','$hospid','inactive','$uaid')"
		
		$qinsert = mysqli_query($con, "INSERT INTO `tbl_ruser`(`ur_fname`, `ur_sname`, `ur_email`, `ur_pass`, `title`, `ur_orgname`, `ur_orgcode`, `ur_orgtype`, `ur_role_id`, `ur_role_name`, `ur_orgphno`, `ur_orgaddress`, `ur_status`, `ur_proregno`, `ur_address`, `ur_city`, `ur_postcode`) VALUES ('$stafffname','$staffsname','$staffemail','$staffpass','$title','$orgname','$orgcode','$orgtype','$staffrole','$rname','$orgphno','$orgaddress','approve','$proregno','$address','$city','$postcode')");
		if($qinsert > 0){
			echo "1";
		}
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

// for add specialty type
if(isset($_POST['inserdataspecbtn']))
{
	
	$specname = mysqli_real_escape_string($con, $_POST['specialadd']);
	
	$clq = mysqli_query($con, "INSERT INTO `ser_specialty_add`(`spec_name`) VALUES ('$specname')");
	if($clq){
		echo "donespec";
	}else {
		echo("errorspec");
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
					<th class="nk-tb-col nk-tb-col-check">
					</th>
					<th class="nk-tb-col"><span>Full Name</span></th>
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$idapp = $fetch['app_id'];
	$name = $fetch['app_type'];
	$appallow = $fetch['app_show'];

echo'<tr class="nk-tb-item">';
		if($appallow == "allow"){
			echo'<td class="nk-tb-col nk-tb-col-check">
				<div class="custom-control custom-control-sm custom-checkbox notext">
					<input type="checkbox" name="ser_appchange" onchange="appshow('.$idapp.')" checked="" class="custom-control-input" id="app'.$idapp.'">
					<label class="custom-control-label" for="app'.$idapp.'"></label>
				</div>
			</td>';
		}else if($appallow == "not_allow"){
			echo'<td class="nk-tb-col nk-tb-col-check">
				<div class="custom-control custom-control-sm custom-checkbox notext">
					<input type="checkbox" name="ser_appchange" onchange="appshow('.$idapp.')" class="custom-control-input" id="app'.$idapp.'">
					<label class="custom-control-label" for="app'.$idapp.'"></label>
				</div>
			</td>';
		}
	
	echo'<td class="nk-tb-col">
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

// for service definer create
if(isset($_POST['serdefbtn']))
{
	
	$sername = mysqli_real_escape_string($con, $_POST['sername']);
	$seremail = mysqli_real_escape_string($con, $_POST['seremail']);
	$serpass = mysqli_real_escape_string($con, $_POST['serpass']);
	$sercont = mysqli_real_escape_string($con, $_POST['sercontact']);
	
	// email check
	$emq = mysqli_query($con, "SELECT * FROM `tbl_service_definer` WHERE `u_seremail` = '$seremail'");
	$count = mysqli_num_rows($emq);
	if($count>0){
		echo"emalready";
	}else {
		
		$adid = $_SESSION['a_id'];
		$e = $_SESSION['superadmin'];
	
	$q = mysqli_query($con,"SELECT * FROM `admin` WHERE `email` = '$e'");
	$af = mysqli_fetch_array($q);
	$id = $af['organization'];
	$sql = mysqli_query($con,"SELECT * FROM orginzation WHERE orid = '$id'");
	$fet = mysqli_fetch_array($sql);
	$orgid = $fet['orid'];
		
		$dataq = mysqli_query($con, "INSERT INTO `tbl_service_definer`(`u_sername`, `u_seremail`, `u_serpass`, `u_sercontact`,`u_orgid`, `u_createid`) VALUES ('$sername','$seremail','$serpass','$sercont','$orgid','$adid')");
		
		if($dataq){
			echo"serdone";
		}else {
			echo"serero";
		}
		
	}
	
}


// for approve and not approve
if(isset($_POST['method']))
{	
		//for consultant not active
		if($_POST['method'] == "capprove")
			{
				
				$id = $_POST['id'];
				$query = "UPDATE `tbl_ruser` SET `ur_status` = 'not_approve' WHERE `ur_id` = '$id'";
				$vq = mysqli_query($con,$query);
				
				if($vq)
				{
					echo("Success");
				}
			
		}
	//for consultant active
	if($_POST['method'] == "cnot_approve")
		{
			
			$id = $_POST['id'];
			$query = "UPDATE `tbl_ruser` SET `ur_status` = 'approve' WHERE `ur_id` = '$id'";
			$vq = mysqli_query($con,$query);
			
			if($vq)
			{
				echo("Success");
			}
			
		}

		//for Gp-refferer not active
		if($_POST['method'] == "gapprove")
			{
				
				$id = $_POST['id'];
				$query = "UPDATE `tbl_ruser` SET `ur_status` = 'not_approve' WHERE `ur_id` = '$id'";
				$vq = mysqli_query($con,$query);
				
				if($vq)
				{
					echo("Success");
				}
			
		}
	//for Gp-refferer active
	if($_POST['method'] == "gnot_approve")
		{
			
			$id = $_POST['id'];
			$query = "UPDATE `tbl_ruser` SET `ur_status` = 'approve' WHERE `ur_id` = '$id'";
			$vq = mysqli_query($con,$query);
			
			if($vq)
			{
				echo("Success");
			}
			
		}
}

// for add gp referrer
if(isset($_POST['addgprefferer']))
{
	
	$gfpname = mysqli_real_escape_string($con, $_POST['fname']);
	$gspname = mysqli_real_escape_string($con, $_POST['sname']);
	$gpemail = mysqli_real_escape_string($con, $_POST['email']);
	$gppas = mysqli_real_escape_string($con, $_POST['pass']);
	$gptitle = mysqli_real_escape_string($con, $_POST['title']);
	
	$chem = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$gpemail'");
	$num = mysqli_num_rows($chem);
	$e = $_SESSION['superadmin'];
	
	$q = mysqli_query($con,"SELECT * FROM `admin` WHERE `email` = '$e'");
	$af = mysqli_fetch_array($q);
	$id = $af['organization'];
	$sql = mysqli_query($con,"SELECT * FROM orginzation WHERE orid = '$id'");
	$fet = mysqli_fetch_array($sql);
	$orgid = $fet['orid'];
	if($num>0){
		echo"gpalready";
	}else {
		$gpq = mysqli_query($con, "INSERT INTO `tbl_ruser`(`ur_fname`, `ur_sname`, `ur_email`, `ur_pass`, `title`,`ur_orgtype`,`ur_role_id`,`ur_role_name`,`ur_status`) VALUES ('$gfpname','$gspname','$gpemail','$gppas','$gptitle','$orgid','5','G-P Referrer','approve')");
		
		if($gpq){
			echo"gpdone";
		}else {
			echo "Error";
		}
	}
	
}


if(isset($_POST['searchpatient']))
{
	$em = $_POST['em'];
	$nm = $_POST['nm'];
	$dob = $_POST['dob'];

$assa = mysqli_query($con,"SELECT * FROM `tbl_patients` where pt_name ='$nm' and pt_dob='$dob' and pt_surname='$em'");
	// echo mysqli_error($con);
	if($assa)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<hr>
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
					<th class="nk-tb-col nk-tb-col-check">
						<div class="custom-control custom-control-sm custom-checkbox notext">
							<input type="checkbox" class="custom-control-input" id="puid">
							<label class="custom-control-label" for="puid"></label>
						</div>
					</th>
					<th class="nk-tb-col"><span>Name</span></th>
					<th class="nk-tb-col"><span>Surname</span></th>
				
					<th class="nk-tb-col"><span>Mobile No</span></th>
					<th class="nk-tb-col"><span>NHS no</span></th>
					<th class="nk-tb-col"><span>Street Name</span></th>
					<th class="nk-tb-col"><span>Date of Birth</span></th>
					<th class="nk-tb-col"><span>Email</span></th>
					
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($assa))
		{
	$name = $fetch['pt_name'];
	$id = $fetch['pt_id'];
	$nh = $fetch['pt_nhsno'];
	$sn = $fetch['pt_surname'];
	$mobno = $fetch['pt_mobno'];
	$sname = $fetch['pt_streetname'];
	$dob = $fetch['pt_dob'];
	$em = $fetch['pt_email'];


echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input gg" name="check[]" value="'.$id.'" id="check'.$id.'" >
			<label class="custom-control-label" for="check'.$id.'" onclick="showss('.$id.')"></label>
		</div>
	</td>
	<td class="nk-tb-col">
		<span class="tb-product">
			
			<span class="title">'.$name.'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$sn.'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$mobno.'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$nh.'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$sname.'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$dob.'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$em.'</span>
	</td>
	</tr>
	'; 
		
	
										
		}
		echo'</tbody> </table>
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {
    $("#myTable").DataTable();
} );
</script>
';
	}
	else{
		echo"No Data Found";
	}
}
if(isset($_POST['readRecord']))
{
	$e = $_SESSION['superadmin'];
	
	$q = mysqli_query($con,"SELECT * FROM `admin` WHERE email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['id'];
	$query = mysqli_query($con,"SELECT * FROM services  JOIN ser_specialty_add ON services.service_speciality=ser_specialty_add.spec_id JOIN app_type ON services.service_a_type=app_type.app_id JOIN service_cliniciant ON services.ser_cl_type=service_cliniciant.cl_id JOIN service_name ON services.service_name=service_name.s_id WHERE ser_create_id = '$id'");
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
					<th class="nk-tb-col"><span>Minimum Age range</span></th>Secondary 
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
					<th class="nk-tb-col"><span>Status</span></th>

					
					
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
			if($fetch["status"] =="not_approve"){
		echo '<td class="nk-tb-col"><span class="btn btn-danger" id="gbtn" onclick="eaprovenotaprove(\''.$rfid.'\',\'g'.$fetch["status"].'\')">Not Active</span></td>';
	}elseif($fetch["status"] =="approve"){
		echo '<td class="nk-tb-col"><span class="btn btn-success" id="gbtn" onclick="eaprovenotaprove(\''.$rfid.'\',\'g'.$fetch["status"].'\')">Active</span></td>';
	}
	
										
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
if(isset($_POST["obtn"])){
		if($_POST['status'] == "gapprove")
			{
				
				$id = $_POST['eid'];
		
				$query = "UPDATE `services` SET `status` = 'not_approve' WHERE `m_id` = '$id'";
				$vq1 = mysqli_query($con,$query);
				if($vq1)
				{
					echo "Successs" ;
				}
			
		}elseif($_POST['status'] == "gnot_approve")
		{
			
			$id = $_POST['eid'];
			$query = "UPDATE `services` SET `status` = 'approve' WHERE `m_id` = '$id'";
			$vq = mysqli_query($con,$query);
			
			if($vq)
			{
				echo "Success" ;
			}
			
		}else{
		    echo "sss";
		}
}

?>