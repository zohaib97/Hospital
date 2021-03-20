<?php
include_once('../database/db.php');

//for add refferel
if(isset($_POST['addrefferel']))
{
	$gpid = $_POST['rid'];
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
	
	
	$query = mysqli_query($con,"INSERT INTO `tbl_refferels`(`rf_gpid`,`rf_ptitle`, `rf_pname`, `rf_psurname`, `rf_dob`, `rf_nhsno`, `rf_houseno`, `rf_streetname`, `rf_city`, `rf_country`, `rf_postcode`, `rf_telno`, `rf_mobno`, `rf_email`) VALUES('$gpid','$ptitle','$pfirstname','$psurname','$pdob','$nhsno','$houseno','$streetname','$city','$country','$postalcode','$telephoneno','$mobileno','$email')");
	
	if($query)
	{
		echo "Success";
	}
	else
	{
		echo "Error";
	}
}

//for refferels fetch
if(isset($_POST['refferelfetch']))
{
	$e = $_SESSION['consultant'];
	$q= mysqli_query($con,"SELECT * FROM `tbl_user` WHERE staff_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['staff_id'];
$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels` JOIN tbl_refferels ON c_rfid = tbl_refferels.rf_id WHERE c_userid = '$id'");
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<div style="overflow-x:scroll;">
		
	<button onclick="window.print()" class="btn btn-danger">Print</button>
		<br>
		<br>
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
					<th class="nk-tb-col nk-tb-col-check">
						<div class="custom-control custom-control-sm custom-checkbox notext">
							<input type="checkbox" class="custom-control-input" id="puid">
							<label class="custom-control-label" for="puid"></label>
						</div>
					</th>
					<th class="nk-tb-col tb-col-sm"><span>Title</span></th>
					<th class="nk-tb-col tb-col-sm"><span>File</span></th>
					<th class="nk-tb-col"><span>Patient Name</span></th>
					<th class="nk-tb-col"><span>Patient Surname</span></th>
					<th class="nk-tb-col"><span>Patient DOB</span></th>
					<th class="nk-tb-col"><span>NHS no</span></th>
					<th class="nk-tb-col"><span>House no</span></th>
					<th class="nk-tb-col"><span>Street</span></th>
					<th class="nk-tb-col"><span>City</span></th>
					<th class="nk-tb-col"><span>Country</span></th>
					<th class="nk-tb-col"><span>Post code</span></th>
					<th class="nk-tb-col"><span>Tel no</span></th>
					<th class="nk-tb-col"><span>Mobile no</span></th>
					<th class="nk-tb-col"><span>Email</span></th>
					<th class="nk-tb-col"><span>Assign</span></th>
				
				
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$rfid = $fetch['rf_id'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" name="check" id="'.$rfid.'" onclick="show('."'$rfid'".')">
			<label class="custom-control-label" for="'.$rfid.'"></label>
		</div>
	</td>
	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['rf_ptitle'].'</span>
	</td>
	<td class="nk-tb-col">
		<a href="../Gprefferer/assets/uploads/'.$fetch['c_file'].'" class="btn btn-primary btn-sm" download>Download</a>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['rf_pname'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['rf_psurname'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['rf_dob'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['rf_nhsno'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['rf_houseno'].'</span>
	</td><td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['rf_streetname'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['rf_city'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['rf_country'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['rf_postcode'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['rf_telno'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['rf_mobno'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['rf_email'].'</span>
	</td>
	<td class="nk-tb-col">
		<a href="javascript:void(0)" class="btn btn-primary btn-sm">Assign</a>
	</td>
	';
		
	
										
		}
		echo'</tbody> </table>
		</div>
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {
    $("#myTable").DataTable({
	
	
	});
} )
</script>
';
	}
}

if(isset($_POST['consultantdata']))
{
	$id = $_POST['rid'];
	$consultantid = $_POST['consultant'];
	$file = $_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'],'assets/uploads/'.$file);
	$q = mysqli_query($con,"INSERT INTO `tbl_consultantrefferels`(`c_userid`, `c_rfid`, `c_file`) VALUES('$consultantid','$id','$file')");
	if($q)
	{
		echo "Success";
	}
	else
	{
		echo "Error";
	}
}

//for profile update denist
if(isset($_POST['upddentistbtn']))
	{
		$did = $_POST['did'];
//		$drole = $_POST['droleid'];
		$dfname = $_POST['dfname'];
		$dsname = $_POST['dsname'];
		$demail = $_POST['demail'];
		$dcon = $_POST['dcont'];
		$dob = $_POST['dob'];
		
		$query = mysqli_query($con,"UPDATE `tbl_ruser` SET `ur_fname` = '$dfname',`ur_sname` = '$dsname',`ur_email` ='$demail',`ur_contact` = '$dcon',`ur_dob` = '$dob' WHERE `ur_id` = '$did'");
	
	//$query = mysqli_query($con,"UPDATE `tbl_ruser` SET `ur_fname` = '$dfname', `ur_sname` = '$dsname' ,`ur_email` = '$demail', `ur_contact` = '$dcon' WHERE `ur_id` = '$did' and `ur_role_id` = '$drole'");
		
		if($query)
		{
		
			echo "Success";
			
		}
		else
		{
			echo("Error");
		}
	}

if(isset($_POST['upddentisbtn']))
	{
		$doid = $_POST['daid'];
//		$drid = $_POST['droleido'];
		$dorg = $_POST['dorgani'];
		
	$query = mysqli_query($con,"UPDATE `tbl_ruser` SET `ur_org` = '$dorg' WHERE `ur_id` = '$doid'");
		
		if($query)
		{
		
			echo "Success";
			
		}
		else
		{
			echo("Error");
		}
	}


//fetch dentist data
if(isset($_POST['dentistbtndata']))
{
$e =	$_SESSION['dentistem'];
$query = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_role_id` = 1 and `ur_email` = '$e'");
if($query)
{
while($fetch = mysqli_fetch_array($query))
{
	$id = $fetch['ur_id'];
	$fname = $fetch['ur_fname'];
	$sname = $fetch['ur_sname'];
	$remail = $fetch['ur_email'];
	$rpass = $fetch['ur_pass'];
	$contact = $fetch['ur_contact'];
	$org = $fetch['ur_org'];
	$drileid = $fetch['ur_role_id'];
	$dob = $fetch['ur_dob'];
	

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
			<div class="data-item" onClick="cupdmodal('."'$id'".','."'$fname'".','."'$sname'".','."'$remail'".','."'$contact'".','."'$org'".','."'$drileid'".','."'$dob'".')">
					<div class="data-col">
						<span class="data-label">First Name</span>
						<span class="data-value">'.$fetch['ur_fname'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
				</div>
				<!-- data-item -->
	<div class="data-item" onClick="cupdmodal('."'$id'".','."'$fname'".','."'$sname'".','."'$remail'".','."'$contact'".','."'$org'".','."'$drileid'".','."'$dob'".')">
					<div class="data-col">
						<span class="data-label">Sur Name</span>
						<span class="data-value">'.$fetch['ur_sname'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
				</div>
				<!-- data-item -->
				<div class="data-item">
					<div class="data-col">
						<span class="data-label">Password</span>
						<span class="data-value">'.$fetch['ur_pass'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
				</div>
				<!-- data-item -->
				<div class="data-item" onClick="cupdmodal('."'$id'".','."'$fname'".','."'$sname'".','."'$remail'".','."'$contact'".','."'$org'".','."'$drileid'".','."'$dob'".')">
					<div class="data-col">
						<span class="data-label">Email</span>
						<span class="data-value text-soft">'.$fetch['ur_email'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
				</div>
				<!-- data-item -->
				<div class="data-item" onClick="cupdmodal('."'$id'".','."'$fname'".','."'$sname'".','."'$remail'".','."'$contact'".','."'$org'".','."'$drileid'".','."'$dob'".')">
					<div class="data-col">
						<span class="data-label">Phone Number</span>
						<span class="data-value text-soft">'.$fetch['ur_contact'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
				</div><!-- data-item -->
				<div class="data-item" onClick="cupdmodal('."'$id'".','."'$fname'".','."'$sname'".','."'$remail'".','."'$contact'".','."'$org'".','."'$drileid'".','."'$dob'".')">
					<div class="data-col">
						<span class="data-label">Organization</span>
						<span class="data-value">'.$fetch['ur_org'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
				</div>
				<div class="data-item" onClick="cupdmodal('."'$id'".','."'$fname'".','."'$sname'".','."'$remail'".','."'$contact'".','."'$org'".','."'$drileid'".','."'$dob'".')">
					<div class="data-col">
						<span class="data-label">Date of Birth</span>
						<span class="data-value">'.$fetch['ur_dob'].'</span>
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
						<span class="lead-text">'.$fetch['ur_fname'].'</span>
						<span class="sub-text">'.$fetch['ur_email'].'</span>
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
?>