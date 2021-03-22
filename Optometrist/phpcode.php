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
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
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


//for servicerefferels fetch
if(isset($_POST['serrefferelfetch'])) 
{
	$e = $_SESSION['consultant'];

	$q = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	$query = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` JOIN `tbl_patients` ON c_rfid = tbl_patients.pt_id JOIN `services` ON c_serid = services.service_id JOIN `tbl_ruser` ON tbl_ruser.ur_id = tbl_consultantrefferels.c_gpid JOIN `service_name` ON service_name = service_name.s_id JOIN `ser_specialty_add` ON service_speciality = ser_specialty_add.spec_id JOIN `service_cliniciant` ON ser_cl_type = service_cliniciant.cl_id WHERE c_userid = '$id'  GROUP BY pt_nhsno");

	//	
	//	SELECT * FROM `services`,`tbl_consultantrefferels`,`tbl_refferels`,`tbl_patients`,`hospitals`,`refer_advice` WHERE refer_advice.ref_hid = services.s_hos_id AND tbl_patients.pt_hid = services.s_hos_id AND services.s_hos_id = hospitals.hid AND tbl_consultantrefferels.c_rfid = tbl_refferels.rf_id AND tbl_consultantrefferels.c_serid = services.service_id AND c_userid = '$id' LIMIT 3

	if ($query) {
		echo '<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

<div style="overflow-x:scroll;">

<button onclick="window.print()" class="btn btn-danger">Print</button>
<br>
<br>
<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
<thead>
<tr class="nk-tb-item nk-tb-head">
	<th class="nk-tb-col"><span>NHS no</span></th>
	<th class="nk-tb-col"><span>Referrer</span></th>
	<th class="nk-tb-col"><span>Service Name</span></th>
	<th class="nk-tb-col"><span>Specialty</span></th>
	<th class="nk-tb-col"><span>Clinic Type</span></th>
	<th class="nk-tb-col"><span>Clinicians</span></th>
	<th class="nk-tb-col"><span>Pateint Name</span></th>
	<th class="nk-tb-col"><span>Reply To Refferer</span></th>
	<th class="nk-tb-col"><span>Accept </span></th>

</tr><!-- .nk-tb-item -->
</thead>
<tbody id="">';
		while ($fetch = mysqli_fetch_array($query)) {
			$rfid = $fetch['pt_id'];

			echo '   <tr class="nk-tb-item">

<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['pt_nhsno'] . '</span>
</td>

<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['ur_sname'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['s_name'] . '</span>
</td><td class="nk-tb-col">
<span class="tb-lead">' . $fetch['spec_name'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['cl_type'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['ur_fname'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['pt_name'] . '</span>
</td>
<td class="nk-tb-col">
<a href="adreqreply.php?nhsno='.$fetch['pt_nhsno'].'&pid='.$fetch["c_rfid"].'" class="btn btn-info btn-sm">Chat</a>
</td>';
if($fetch["c_status"]==0){
echo '
<td class="nk-tb-col">

<a href="javascript:void(0)" onclick="slsl(\''.$fetch["c_id"].'\',\''.$fetch['c_status'].'\')" class="btn btn-primary btn-sm">UnAccept Request </a>
</td>

';
}elseif($fetch["c_status"] == 1 ){
 echo '
<td class="nk-tb-col">

<a href="javascript:void(0)" onclick="slsl(\''.$fetch["c_id"].'\',\''.$fetch['c_status'].'\')" class="btn btn-primary btn-sm">Accepted</a>
</td>

';   
}
		}
		echo '</tbody> </table>
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


//for servicerefferels fetch1
if(isset($_POST['serrefferelfetch1'])) 
{
	$e = $_SESSION['consultant'];
	$q = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	$query = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` JOIN `tbl_patients` ON c_rfid = tbl_patients.pt_id JOIN `services` ON c_serid = services.service_id JOIN `tbl_ruser` ON tbl_ruser.ur_id = tbl_consultantrefferels.c_gpid JOIN `service_name` ON service_name = service_name.s_id JOIN `ser_specialty_add` ON service_speciality = ser_specialty_add.spec_id JOIN `service_cliniciant` ON ser_cl_type = service_cliniciant.cl_id JOIN tbl_refferelattachment ON tbl_refferelattachment.ra_refferelid = tbl_consultantrefferels.c_id WHERE tbl_refferelattachment.reply='1' and tbl_refferelattachment.sender='$id' GROUP BY tbl_consultantrefferels.c_nhsno");

	//	
	//	SELECT * FROM `services`,`tbl_consultantrefferels`,`tbl_refferels`,`tbl_patients`,`hospitals`,`refer_advice` WHERE refer_advice.ref_hid = services.s_hos_id AND tbl_patients.pt_hid = services.s_hos_id AND services.s_hos_id = hospitals.hid AND tbl_consultantrefferels.c_rfid = tbl_refferels.rf_id AND tbl_consultantrefferels.c_serid = services.service_id AND c_userid = '$id' LIMIT 3

	if ($query) {
		echo '<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

<div style="overflow-x:scroll;">

<button onclick="window.print()" class="btn btn-danger">Print</button>
<br>
<br>
<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
<thead>
<tr class="nk-tb-item nk-tb-head">
	<th class="nk-tb-col tb-col-sm"><span>NHS no</span></th>

	<th class="nk-tb-col"><span>Referrer</span></th>
	<th class="nk-tb-col"><span>Service Name1</span></th>
	<th class="nk-tb-col"><span>Specialty</span></th>
	<th class="nk-tb-col"><span>Clinic Type</span></th>
	<th class="nk-tb-col"><span>Clinicians</span></th>
	<th class="nk-tb-col"><span>Pateint Name</span></th>
	<th class="nk-tb-col"><span>Reply To Refferer</span></th>
	<th class="nk-tb-col"><span>Accept </span></th>

</tr><!-- .nk-tb-item -->
</thead>
<tbody id="">';
		while ($fetch = mysqli_fetch_array($query)) {
			$rfid = $fetch['pt_id'];

			echo '   <tr class="nk-tb-item">

<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['pt_nhsno'] . '</span>
</td>

<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['ur_sname'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['s_name'] . '</span>
</td><td class="nk-tb-col">
<span class="tb-lead">' . $fetch['spec_name'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['cl_type'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['ur_fname'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['pt_name'] . '</span>
</td>
<td class="nk-tb-col">
<a href="adreqreply.php?nhsno='.$fetch['pt_nhsno'].'&pid='.$fetch["c_rfid"].'" class="btn btn-info btn-sm">Chat</a>
</td>
<td class="nk-tb-col">
<span class="badge badge-danger">Response</span>
</td>';

}
		echo '</tbody> </table>
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
//for servicerefferels fetch2
if(isset($_POST['serrefferelfetch2'])) 
{
	$e = $_SESSION['consultant'];
	$q = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	$query = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` JOIN `tbl_patients` ON c_rfid = tbl_patients.pt_id JOIN `services` ON c_serid = services.service_id JOIN `tbl_ruser` ON tbl_ruser.ur_id = tbl_consultantrefferels.c_gpid JOIN `service_name` ON service_name = service_name.s_id JOIN `ser_specialty_add` ON service_speciality = ser_specialty_add.spec_id JOIN `service_cliniciant` ON ser_cl_type = service_cliniciant.cl_id WHERE c_userid = '$id' GROUP BY pt_nhsno");

	//	
	//	SELECT * FROM `services`,`tbl_consultantrefferels`,`tbl_refferels`,`tbl_patients`,`hospitals`,`refer_advice` WHERE refer_advice.ref_hid = services.s_hos_id AND tbl_patients.pt_hid = services.s_hos_id AND services.s_hos_id = hospitals.hid AND tbl_consultantrefferels.c_rfid = tbl_refferels.rf_id AND tbl_consultantrefferels.c_serid = services.service_id AND c_userid = '$id' LIMIT 3

	if ($query) {
		echo '<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

<div style="overflow-x:scroll;">

<button onclick="window.print()" class="btn btn-danger">Print</button>
<br>
<br>
<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
<thead>
<tr class="nk-tb-item nk-tb-head">
	<th class="nk-tb-col tb-col-sm"><span>NHS no</span></th>

	<th class="nk-tb-col"><span>Referrer</span></th>
	<th class="nk-tb-col"><span>Service Name2</span></th>
	<th class="nk-tb-col"><span>Specialty</span></th>
	<th class="nk-tb-col"><span>Clinic Type</span></th>
	<th class="nk-tb-col"><span>Clinicians</span></th>
	<th class="nk-tb-col"><span>Pateint Name</span></th>
	<th class="nk-tb-col"><span>Reply To Refferer</span></th>
	<th class="nk-tb-col"><span>Accept </span></th>

</tr><!-- .nk-tb-item -->
</thead>
<tbody id="">';
		while ($fetch = mysqli_fetch_array($query)) {
			$rfid = $fetch['pt_id'];

			echo '   <tr class="nk-tb-item">

<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['pt_nhsno'] . '</span>
</td>

<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['ur_sname'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['s_name'] . '</span>
</td><td class="nk-tb-col">
<span class="tb-lead">' . $fetch['spec_name'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['cl_type'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['ur_fname'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['pt_name'] . '</span>
</td>
<td class="nk-tb-col">
<a href="adreqreply.php?nhsno='.$fetch['pt_nhsno'].'&pid='.$fetch["c_rfid"].'" class="btn btn-info btn-sm">Chat</a>
</td>';
if($fetch["c_status"]==0){
echo '
<td class="nk-tb-col">

<a href="javascript:void(0)" onclick="slsl(\''.$fetch["c_id"].'\',\''.$fetch['c_status'].'\')" class="btn btn-primary btn-sm">UnAccept Request </a>
</td>

';
}elseif($fetch["c_status"] == 1 ){
 echo '
<td class="nk-tb-col">

<a href="javascript:void(0)" onclick="slsl(\''.$fetch["c_id"].'\',\''.$fetch['c_status'].'\')" class="btn btn-primary btn-sm">Accepted</a>
</td>

';   
}
		}
		echo '</tbody> </table>
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
//for servicerefferels fetch3
if(isset($_POST['serrefferelfetch3'])) 
{
	$e = $_SESSION['consultant'];
	$q = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	$query = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` JOIN `tbl_patients` ON c_rfid = tbl_patients.pt_id JOIN `services` ON c_serid = services.service_id JOIN `tbl_ruser` ON tbl_ruser.ur_id = tbl_consultantrefferels.c_gpid JOIN `service_name` ON service_name = service_name.s_id JOIN `ser_specialty_add` ON service_speciality = ser_specialty_add.spec_id JOIN `service_cliniciant` ON ser_cl_type = service_cliniciant.cl_id WHERE c_userid = '$id' and c_status = 1 GROUP BY pt_nhsno");

	//	
	//	SELECT * FROM `services`,`tbl_consultantrefferels`,`tbl_refferels`,`tbl_patients`,`hospitals`,`refer_advice` WHERE refer_advice.ref_hid = services.s_hos_id AND tbl_patients.pt_hid = services.s_hos_id AND services.s_hos_id = hospitals.hid AND tbl_consultantrefferels.c_rfid = tbl_refferels.rf_id AND tbl_consultantrefferels.c_serid = services.service_id AND c_userid = '$id' LIMIT 3

	if ($query) {
		echo '<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

<div style="overflow-x:scroll;">

<button onclick="window.print()" class="btn btn-danger">Print</button>
<br>
<br>
<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
<thead>
<tr class="nk-tb-item nk-tb-head">
	<th class="nk-tb-col tb-col-sm"><span>NHS no</span></th>

	<th class="nk-tb-col"><span>Referrer</span></th>
	<th class="nk-tb-col"><span>Service Name3</span></th>
	<th class="nk-tb-col"><span>Specialty</span></th>
	<th class="nk-tb-col"><span>Clinic Type</span></th>
	<th class="nk-tb-col"><span>Clinicians</span></th>
	<th class="nk-tb-col"><span>Pateint Name</span></th>
	<th class="nk-tb-col"><span>Reply To Refferer</span></th>
	<th class="nk-tb-col"><span>Accept </span></th>

</tr><!-- .nk-tb-item -->
</thead>
<tbody id="">';
		while ($fetch = mysqli_fetch_array($query)) {
			$rfid = $fetch['pt_id'];

			echo '   <tr class="nk-tb-item">

<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['pt_nhsno'] . '</span>
</td>

<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['ur_sname'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['s_name'] . '</span>
</td><td class="nk-tb-col">
<span class="tb-lead">' . $fetch['spec_name'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['cl_type'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['ur_fname'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['pt_name'] . '</span>
</td>
<td class="nk-tb-col">
<a href="adreqreply.php?nhsno='.$fetch['pt_nhsno'].'&pid='.$fetch["c_rfid"].'" class="btn btn-info btn-sm">Chat</span >
</td>';
if($fetch["c_status"]==0){
echo '
<td class="nk-tb-col">

<span  class="badge badge-danger">UnAccept Request </span >
</td>

';
}elseif($fetch["c_status"] == 1 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-primary ">Accepted</span>
</td>

';   
}
		}
		echo '</tbody> </table>
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
//for servicerefferels fetch4
if(isset($_POST['serrefferelfetch4'])) 
{
	$e = $_SESSION['consultant'];
	$q = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	$query = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` JOIN `tbl_patients` ON c_rfid = tbl_patients.pt_id JOIN `services` ON c_serid = services.service_id JOIN `tbl_ruser` ON tbl_ruser.ur_id = tbl_consultantrefferels.c_gpid JOIN `service_name` ON service_name = service_name.s_id JOIN `ser_specialty_add` ON service_speciality = ser_specialty_add.spec_id JOIN `service_cliniciant` ON ser_cl_type = service_cliniciant.cl_id WHERE c_userid = '$id'  and c_status = 0 GROUP BY pt_nhsno");

	//	
	//	SELECT * FROM `services`,`tbl_consultantrefferels`,`tbl_refferels`,`tbl_patients`,`hospitals`,`refer_advice` WHERE refer_advice.ref_hid = services.s_hos_id AND tbl_patients.pt_hid = services.s_hos_id AND services.s_hos_id = hospitals.hid AND tbl_consultantrefferels.c_rfid = tbl_refferels.rf_id AND tbl_consultantrefferels.c_serid = services.service_id AND c_userid = '$id' LIMIT 3

	if ($query) {
		echo '<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

<div style="overflow-x:scroll;">

<button onclick="window.print()" class="btn btn-danger">Print</button>
<br>
<br>
<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
<thead>
<tr class="nk-tb-item nk-tb-head">
	<th class="nk-tb-col tb-col-sm"><span>NHS no</span></th>

	<th class="nk-tb-col"><span>Referrer</span></th>
	<th class="nk-tb-col"><span>Service Name4</span></th>
	<th class="nk-tb-col"><span>Specialty</span></th>
	<th class="nk-tb-col"><span>Clinic Type</span></th>
	<th class="nk-tb-col"><span>Clinicians</span></th>
	<th class="nk-tb-col"><span>Pateint Name</span></th>
	<th class="nk-tb-col"><span>Reply To Refferer</span></th>
	<th class="nk-tb-col"><span>Accept </span></th>

</tr><!-- .nk-tb-item -->
</thead>
<tbody id="">';
		while ($fetch = mysqli_fetch_array($query)) {
			$rfid = $fetch['pt_id'];

			echo '   <tr class="nk-tb-item">

<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['pt_nhsno'] . '</span>
</td>

<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['ur_sname'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['s_name'] . '</span>
</td><td class="nk-tb-col">
<span class="tb-lead">' . $fetch['spec_name'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['cl_type'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['ur_fname'] . '</span>
</td>
<td class="nk-tb-col">
<span class="tb-lead">' . $fetch['pt_name'] . '</span>
</td>
<td class="nk-tb-col">
<a href="adreqreply.php?nhsno='.$fetch['pt_nhsno'].'&pid='.$fetch["c_rfid"].'" class="btn btn-info btn-sm">Chat</a>
</td>';
if($fetch["c_status"]==0){
echo '
<td class="nk-tb-col">

<span class="badge badge-pill badge-danger">UnAccept Request </span>
</td>

';
}elseif($fetch["c_status"] == 1 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-pill badge-primary">Accepted</span>
</td>

';   
}
		}
		echo '</tbody> </table>
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

// for add cmnt from consultant

if(isset($_POST['cmntdatabtn']))
{
	$id = $_POST['rid'];
	$sql = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels` WHERE c_id = '$id'");
	$fetch1 = mysqli_fetch_array($sql);
	$reffererid = $fetch1['c_gpid'];
	$cmnt = $_POST['cmntad'];
	$weblink = $_POST['weblink'];
	$file = $_FILES['attachment']['name'];
	$loginem = $_SESSION['consultant'];
	
	$idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
	$dataid = mysqli_fetch_assoc($idq);
	$senderid = $dataid['ur_id'];
	
	if($weblink == "" || $weblink == null)
	{
		$r = "(`ra_message`, `ra_attach`,`ra_refferelid`, `ra_sender_id`,`reply`,`reciever`,`sender`) VALUES ('$cmnt','$file','$id','$senderid','1','$reffererid','$senderid')";
		move_uploaded_file($_FILES['attachment']['tmp_name'],'assets/uploads/'.$file);
	}
	else if($file == "" || $file == null)
	{
		$r = "(`ra_message`, `ra_weblink`,`ra_refferelid`, `ra_sender_id`,`reply`,`reciever`,`sender`) VALUES ('$cmnt','$weblink','$id','$senderid','1','$reffererid','$senderid')";
	}
	else if($weblink == "" && $file == "" || $weblink == null && $file == null)
	{
		$r = "(`ra_message`,`ra_refferelid`, `ra_sender_id`,`reply`,`reciever`,`sender`) VALUES ('$cmnt','$id','$senderid','1','$reffererid','$senderid')";
	}
	else
	{
		$r = "(`ra_message`,`ra_attach`,`ra_weblink`,`ra_refferelid`, `ra_sender_id`,`reply`,`reciever`,`sender`) VALUES ('$cmnt','$file','$weblink','$id','$senderid','1','$reffererid','$senderid')";
		move_uploaded_file($_FILES['attachment']['tmp_name'],'assets/uploads/'.$file);
	}
	
	
	
	$q = mysqli_query($con,"INSERT INTO `tbl_refferelattachment`".$r."");
	if($q)
	{
	unset($_SESSION['refferellastid']);
		echo "Success";
	}
	else
	{
		echo "Error";
	}
}

if(isset($_POST['fetchreplybtn']))
{
	$rfno = $_POST['rfno'];
			$loginem = $_SESSION['consultant'];
			$idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
			$dataid = mysqli_fetch_assoc($idq);
			$senderid = $dataid['ur_id'];

		$q = mysqli_query($con,"SELECT * FROM `tbl_refferelattachment` WHERE ra_refferelid = '$rfno'");
		while($fe = mysqli_fetch_array($q)){
			if($fe['reciever'] != $senderid)
			{
			echo' <div class="card p-2 col-md-7 float-right"
			style="background-color: skyblue;text-align: right;color:white;"
			>
			<spane>'.$fe['ra_message'].'</spane>
			</div>
			';
			}
			else if($fe['reciever'] == $senderid)
			{
				echo' <div class="card p-2 float-left col-md-7"
			style="background-color: white;text-align: left;"
			>
			<spane>'.$fe['ra_message'].'</spane>
			</div>
			';
			}
		}
	
}
if(isset($_POST["fekk"])){
    $id=$_POST["cid"];
    if($_POST["status"] ==0){
       $q=mysqli_query($con,"UPDATE tbl_consultantrefferels SET c_status='1' where c_id='$id'");
       if($q){
           echo "success";
       }else{
           echo "error";
       }
    }
    if($_POST["status"] == 1){
       $q=mysqli_query($con,"UPDATE tbl_consultantrefferels SET c_status='0' where c_id='$id'");
       if($q){
           echo "successs";
       }else{
           echo "error";
       }
    }
    
}
?>