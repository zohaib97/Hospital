<?php
include_once('../database/db.php');

//fetch patient data
if(isset($_POST['fetchpatient']))
{
$query = mysqli_query($con,"SELECT * FROM `tbl_patients`");
				
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
							<th class="nk-tb-col tb-col-sm"><span>Title</span></th>
							<th class="nk-tb-col"><span>Name</span></th>
							<th class="nk-tb-col"><span>Email</span></th>
							<th class="nk-tb-col"><span>Street</span></th>
							<th class="nk-tb-col"><span>City</span></th>
							<th class="nk-tb-col"><span>Country</span></th>
							<th class="nk-tb-col"><span>Telephone Number</span></th>
							<th class="nk-tb-col"><span>NHS No</span></th>
							
						</tr><!-- .nk-tb-item -->
					</thead>
					 <tbody id="" style="display:none;">';
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
	<td class="nk-tb-col tb-col-sm">
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

//fetch Appointment Data
if(isset($_POST['fetchappointment']))
{
    $ubrn = $_SESSION['patubrn'];
$query = mysqli_query($con,"SELECT * FROM `tbl_patientappointment` join `services` on tbl_patientappointment.o_serviceid = services.service_id join orginzation on tbl_patientappointment.o_orgid = orginzation.orid join tbl_patients on tbl_patientappointment.o_patientid = tbl_patients.pt_id join tbl_ruser on tbl_patientappointment.o_refferelid = tbl_ruser.ur_id Where o_ubrn = '$ubrn' ");
				
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
							<th class="nk-tb-col tb-col-sm"><span>UBRN</span></th>
							<th class="nk-tb-col"><span>Organization Name</span></th>
							<th class="nk-tb-col"><span>Service ID</span></th>
							<th class="nk-tb-col"><span>Date</span></th>
							<th class="nk-tb-col"><span>Time</span></th>
						
							<th class="nk-tb-col"><span>Reffered By</span></th>
					
							
						</tr><!-- .nk-tb-item -->
					</thead>
					 <tbody id="" >';
		while($fetch1 = mysqli_fetch_array($query))
		{


echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			<span class="title">'.$fetch1['o_ubrn'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch1['or_name'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch1['o_serviceid'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch1['o_date'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch1['o_time'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-sub">'.$fetch1['ur_fname'].''.$fetch1['ur_sname'].'</span>
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

//for add refferel
if(isset($_POST['addrefferel']))
{
	$gpid = $_POST['rid'];
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
	
	
	$query = mysqli_query($con,"INSERT INTO `tbl_refferels`(`rf_gpid`,`rf_ptitle`, `rf_pname`, `rf_psurname`, `rf_dob`, `rf_nhsno`, `rf_houseno`, `rf_streetname`, `rf_city`, `rf_country`, `rf_postcode`, `rf_telno`, `rf_mobno`, `rf_email`,`rf_orgid`) VALUES('$gpid','$ptitle','$pfirstname','$psurname','$pdob','$nhsno','$houseno','$streetname','$city','$country','$postalcode','$telephoneno','$mobileno','$email','$gphid')");
	
	if($query)
	{
		echo "Success";
	}
	else
	{
		echo "Error";
	}
}
//for add patient
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

//for Add appointment
if(isset($_POST['addappo']))
{
	
extract($_POST);
	
	
	$query = mysqli_query($con,"INSERT INTO `tbl_patientappointment`(`o_ubrn`, `o_orgid`, `o_serviceid`, `o_date`, `o_time`, `o_patientid`, `o_refferelid`) VALUES ('$ubrn','$orid','$serviceid','$date','$time','$patientid','$referalid')");
	
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
	$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	
	
$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.service_id = tbl_consultantrefferels.c_serid JOIN service_name ON service_name.s_id = services.service_name JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid where c_gpid = '$id'");

// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
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
					<th class="nk-tb-col"><span>Service Id</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>NHS Number</span></th>
					<th class="nk-tb-col"><span>Organisation Name</span></th>
					<th class="nk-tb-col"><span>Status</span></th>
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$rfid = $fetch['c_id'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" name="check" id="'.$rfid.'" onclick="show('."'$rfid'".')">
			<label class="custom-control-label" for="'.$rfid.'"></label>
		</div>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_serid'].'</span>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['ur_fname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['s_name'].'</span>
	</td>
	
	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_nhsno'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['or_name'].'</span>
	</td>';
		if($fetch["c_status"] == 1 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-primary ">Accepted</span>
</td>

';   
}if($fetch["c_status"] == 0 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-danger">Un-Accepted</span>
</td>

';   
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
//for refferels fetch1
if(isset($_POST['refferelfetch1']))
{
	$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e' ");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	
	
$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.m_id = tbl_consultantrefferels.c_rfid JOIN service_name ON service_name.s_id = services.service_name JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid where c_gpid = '$id' and c_status= 1");

// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
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
				<th class="nk-tb-col"><span>Service Id</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>NHS Number</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Organisation Name</span></th>
					<th class="nk-tb-col"><span>Status</span></th>
					
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$rfid = $fetch['c_id'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" name="check" id="'.$rfid.'" onclick="show('."'$rfid'".')">
			<label class="custom-control-label" for="'.$rfid.'"></label>
		</div>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_serid'].'</span>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['ur_fname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['s_name'].'</span>
	</td>
	
	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_nhsno'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['or_name'].'</span>
	</td>';
		if($fetch["c_status"] == 1 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-primary ">Accepted</span>
</td>

';   
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


//for refferels fetch2
if(isset($_POST['refferelfetch2']))
{
	$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e' ");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	
	
$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.service_id = tbl_consultantrefferels.c_serid JOIN service_name ON service_name.s_id = services.service_name JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid where c_gpid = '$id' and c_status= 0");

// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
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
				<th class="nk-tb-col"><span>Service Id</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>NHS Number</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Organisation Name</span></th>
					<th class="nk-tb-col"><span>Status</span></th>
					
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$rfid = $fetch['c_id'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" name="check" id="'.$rfid.'" onclick="show('."'$rfid'".')">
			<label class="custom-control-label" for="'.$rfid.'"></label>
		</div>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_serid'].'</span>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['ur_fname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['s_name'].'</span>
	</td>
	
	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_nhsno'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['or_name'].'</span>
	</td>';
		if($fetch["c_status"] == 0 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-danger">Un-Accepted</span>
</td>

';   
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


//for refferels fetch3
if(isset($_POST['refferelfetch3']))
{
	$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	
	
$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels` JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.m_id = tbl_consultantrefferels.c_rfid JOIN service_name ON service_name.s_id = services.service_name JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid JOIN app_type ON app_type.app_id = services.service_a_type where c_gpid = '$id'");

// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
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
				<th class="nk-tb-col"><span>Service Id</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>NHS Number</span></th>
										<th class="nk-tb-col"><span>Appointment type</span></th>

					<th class="nk-tb-col tb-col-sm"><span>Organisation Name</span></th>
					<th class="nk-tb-col"><span>Status</span></th>
					
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$rfid = $fetch['c_id'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" name="check" id="'.$rfid.'" onclick="show('."'$rfid'".')">
			<label class="custom-control-label" for="'.$rfid.'"></label>
		</div>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_serid'].'</span>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['ur_fname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['s_name'].'</span>
	</td>
	
	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_nhsno'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['app_type'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['or_name'].'</span>
	</td>';
		if($fetch["c_status"] == 1 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-primary ">Accepted</span>
</td>

';   
}if($fetch["c_status"] == 0 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-danger">Un-Accepted</span>
</td>

';   
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
//for refferels fetch4
if(isset($_POST['refferelfetch4']))
{
		$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	
	
$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels` JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.m_id = tbl_consultantrefferels.c_rfid JOIN service_name ON service_name.s_id = services.service_name JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid where c_gpid = '$id'");

// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
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
					<th class="nk-tb-col"><span>Service Id</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>NHS Number</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Organisation Name</span></th>
					<th class="nk-tb-col"><span>Status</span></th>
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$rfid = $fetch['c_id'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" name="check" id="'.$rfid.'" onclick="show('."'$rfid'".')">
			<label class="custom-control-label" for="'.$rfid.'"></label>
		</div>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_serid'].'</span>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['ur_fname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['s_name'].'</span>
	</td>
	
	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_nhsno'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['or_name'].'</span>
	</td>';
		if($fetch["c_status"] == 1 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-primary ">Accepted</span>
</td>

';   
}if($fetch["c_status"] == 0 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-danger">Un-Accepted</span>
</td>

';   
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

//for refferels fetch1
if(isset($_POST['refferelfetch5']))
{
	$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	
	
$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels` JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.m_id = tbl_consultantrefferels.c_rfid JOIN service_name ON service_name.s_id = services.service_name JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid where c_gpid = '$id'");

// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
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
					<th class="nk-tb-col"><span>Service Id</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>NHS Number</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Organisation Name</span></th>
					<th class="nk-tb-col"><span>Status</span></th>
					
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$rfid = $fetch['c_id'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" name="check" id="'.$rfid.'" onclick="show('."'$rfid'".')">
			<label class="custom-control-label" for="'.$rfid.'"></label>
		</div>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_serid'].'</span>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['ur_fname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['s_name'].'</span>
	</td>
	
	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_nhsno'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['or_name'].'</span>
	</td>';
		if($fetch["c_status"] == 1 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-primary ">Accepted</span>
</td>

';   
}if($fetch["c_status"] == 0 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-danger">Un-Accepted</span>
</td>

';   
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


//for refferels fetch6
if(isset($_POST['refferelfetch6']))
{
	$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	
	
$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels` JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.m_id = tbl_consultantrefferels.c_rfid JOIN service_name ON service_name.s_id = services.service_name JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid where c_gpid = '$id'");

// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
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
				<th class="nk-tb-col"><span>Service Id</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>NHS Number</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Organisation Name</span></th>
					<th class="nk-tb-col"><span>Status</span></th>
					
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$rfid = $fetch['c_id'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" name="check" id="'.$rfid.'" onclick="show('."'$rfid'".')">
			<label class="custom-control-label" for="'.$rfid.'"></label>
		</div>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_serid'].'</span>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['ur_fname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['s_name'].'</span>
	</td>
	
	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_nhsno'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['or_name'].'</span>
	</td>';
		if($fetch["c_status"] == 1 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-primary ">Accepted</span>
</td>

';   
}if($fetch["c_status"] == 0 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-danger">Un-Accepted</span>
</td>

';   
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


//for refferels fetch7
if(isset($_POST['refferelfetch7']))
{
	$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	
	
$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels` JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.m_id = tbl_consultantrefferels.c_rfid JOIN service_name ON service_name.s_id = services.service_name JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid where c_gpid = '$id'");

// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
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
					<th class="nk-tb-col"><span>Service Id</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>NHS Number</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Organisation Name</span></th>
					<th class="nk-tb-col"><span>Status</span></th>
					
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$rfid = $fetch['c_id'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" name="check" id="'.$rfid.'" onclick="show('."'$rfid'".')">
			<label class="custom-control-label" for="'.$rfid.'"></label>
		</div>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_serid'].'</span>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['ur_fname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['s_name'].'</span>
	</td>
	
	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_nhsno'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['or_name'].'</span>
	</td>';
		if($fetch["c_status"] == 1 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-primary ">Accepted</span>
</td>

';   
}if($fetch["c_status"] == 0 ){
 echo '
<td class="nk-tb-col">

<span class="badge badge-danger">Un-Accepted</span>
</td>

';   
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

//for patient fetch
if(isset($_POST['patientfetch']))
{
	$nhs = $_POST['nhs'];
$query = mysqli_query($con,"SELECT * FROM `tbl_patients` WHERE pt_nhsno = '$nhs'");
	if(mysqli_num_rows($query )>0)
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
					<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
				
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
			<input type="checkbox" class="custom-control-input gg" name="check[]" value="'.$id.'" id="check'.$id.'"  checked="">
			<label class="custom-control-label" for="check'.$id.'" onclick="showss('.$id.')"></label>
		</div>
	</td>
	<td class="nk-tb-col tb-col-sm">
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

//for service fetch
if(isset($_POST['searchservice']))
{
	$res="";
	$periority = $_POST['ref_priority'];
	$speciality = $_POST['ref_spec'];
	$cliniciantype = $_POST['ref_cltype'];
if($periority == "Routine")
{ 
	$res ="ser_priority_rout !=''";

}elseif($periority == "Urgent")
{
	$res ="ser_priority_urg !=''";
}
 elseif($periority == "2 Week Wait")
 {
	 $res ="ser_priority_2week !=''";
 }
$query = mysqli_query($con,"SELECT * FROM `services` WHERE ".$res." and ser_cl_type = '$cliniciantype' and service_speciality = '$speciality'");
	echo mysqli_error($con);
	if(mysqli_num_rows($query) >0)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<hr>
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable1" >
			<thead>
				<tr class="nk-tb-item nk-tb-head">
					<th class="nk-tb-col nk-tb-col-check">
						<div class="custom-control custom-control-sm custom-checkbox notext">
							<input type="checkbox" class="custom-control-input" id="puid">
							<label class="custom-control-label" for="puid"></label>
						</div>
					</th>
					<th class="nk-tb-col tb-col-sm"><span>Service Name</span></th>
				
					<th class="nk-tb-col"><span>Service Speciality</span></th>
					<th class="nk-tb-col"><span>Gender</span></th>
					<th class="nk-tb-col"><span>Clinician Type</span></th>
					<th class="nk-tb-col"><span>Service Location</span></th>
					
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$name = $fetch['service_name'];
			$sql = mysqli_query($con,"SELECT * FROM `service_name` WHERE s_id = '$name'");
			$fe = mysqli_fetch_array($sql);
			$name = $fe['s_name'];
	$nh = $fetch['service_speciality'];
			$sql1 = mysqli_query($con,"SELECT * FROM `ser_specialty_add` WHERE spec_id = '$nh'");
			$fe1 = mysqli_fetch_array($sql1);
			$nh = $fe1['spec_name'];
	$mobno = $fetch['service_gender'];
			
	$sname = $fetch['ser_cl_type'];
			$sql2 = mysqli_query($con,"SELECT * FROM `service_cliniciant` WHERE cl_id = '$sname'");
			$fe2 = mysqli_fetch_array($sql2);
			$sname =$fe2['cl_type'];
	// $dob = $fetch['service_location'];
	// 		$sql3 = mysqli_query($con,"SELECT * FROM `service_location` WHERE lo_id = '$dob'");
	// 		$fe3 = mysqli_fetch_array($sql3);
	// 		$dob = $fe3['lo_location'];
	$id = $fetch['service_id'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input dd" value="'.$id.'" name="checkw[]" id="'.$id.'" onclick="showss('.$id.')" checked="">
			<label class="custom-control-label" for="'.$id.'"></label>
		</div>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$name.'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$nh.'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$mobno.'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$sname.'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['service_location'].'</span>
	</td>
	';
		
	
										
		}
		echo'</tbody> </table>
	
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function () {
    $("#myTable1").DataTable();
} )
</script>
';
	}
 else{
	 echo "Data Not Found";
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
//for servicerefferel insert
if(isset($_POST['addservicerefferel']))
{
	$check=$_POST["check"];
	$q1 = mysqli_query($con,"SELECT * FROM `tbl_patients` WHERE pt_id = '$check'");
	$f1 = mysqli_fetch_array($q1);
	$nhs = $f1['pt_nhsno'];
	$checkw =$_POST["checkw"];
	$consultantid = $_POST['consultant'];
	$orgid = $_POST['organisation'];

	$e = $_SESSION['gprefferer'];
	$q2 = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q2);
	$id = $f['ur_id'];
	$q = mysqli_query($con,"INSERT INTO `tbl_consultantrefferels`(`c_userid`, `c_rfid`, `c_serid`,`c_gpid`,`c_nhsno`,`c_orgid`) VALUES('$consultantid','$check','$checkw','$id','$nhs','$orgid')");
	if($q)
{
		echo json_encode(array("res"=>"success","c_id"=>mysqli_insert_id($con)));

	}
	else
	{
				echo json_encode(array("res"=>"Error"));
	}
}

if(isset($_POST['refinsertbtn']))
{
	
	$refreqt = mysqli_real_escape_string($con, $_POST['ref_reqt']);
	$refprio = mysqli_real_escape_string($con, $_POST['ref_priority']);
	$refclterm = mysqli_real_escape_string($con, $_POST['ref_clterm']);
	$refspec = mysqli_real_escape_string($con, $_POST['ref_spec']);
	$refcltype = mysqli_real_escape_string($con, $_POST['ref_cltype']);
	$refnamecl = mysqli_real_escape_string($con, $_POST['ref_namecl']);
	
	$refq = mysqli_query($con, "INSERT INTO `refer_advice`(`ref_reqt`, `ref_prio`, `ref_clterm`, `ref_spec`, `ref_cltype`, `ref_namecl`) VALUES ('$refreqt','$refprio','$refclterm','$refspec','$refcltype','$refnamecl')");
	
	if($refq){
		echo"referaddone";
	}else {
		echo"refererror";
	}
	
}

//for refer/advice fetch
if(isset($_POST['referadbtn']))
{
//	$e = $_SESSION['gprefferer'];
//	$q= mysqli_query($con,"SELECT * FROM `tbl_gprefferer` WHERE gp_email = '$e'");
//	$f = mysqli_fetch_array($q);
//	$id = $f['gp_id'];
$query = mysqli_query($con,"SELECT * FROM `service_definer`");
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
					<th class="nk-tb-col tb-col-sm"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>Indicated Appointment Wait</span></th>
					<th class="nk-tb-col"><span>Directly Bookable</span></th>
					<th class="nk-tb-col"><span>Location</span></th>
					
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
//	$rfid = $fetch['rf_id'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
		</span>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			<span class="title">'.$fetch['service_name'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['service_a_type'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['sender_bookable'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['service_location'].'</span>
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

// for add cmnt from gp

if(isset($_POST['cmntdatabtn']))
{
	$id = $_POST['rid'];
	$coid = $_POST['coid'];
	$cmnt = $_POST['cmntad'];
	$weblink = $_POST['weblink'];
	$file = $_FILES['attachment']['name'];
	$loginem = $_SESSION['gprefferer'];
	
	$idq = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_email` = '$loginem'");
	$dataid = mysqli_fetch_assoc($idq);
	$senderid = $dataid['ur_id'];
	
	if($weblink == ""  && $weblink == null)
	{
		$r = "(`ra_message`, `ra_attach`,`ra_refferelid`, `ra_sender_id`,`reciever`,`sender`) VALUES ('$cmnt','$file','$id','$senderid','$coid','$senderid')";
		move_uploaded_file($_FILES['attachment']['tmp_name'],'assets/uploads/'.$file);
	}
	else if($file == "" && $file == null)
	{
		$r = "(`ra_message`, `ra_weblink`,`ra_refferelid`, `ra_sender_id`,`reciever`,`sender`) VALUES ('$cmnt','$weblink','$id','$senderid','$coid','$senderid')";
	}
	else if($weblink == "" && $file == "" && $weblink == null && $file == null)
	{
		$r = "(`ra_message`,`ra_refferelid`, `ra_sender_id`,`reciever`,`sender`) VALUES ('$cmnt','$id','$senderid','$coid','$senderid')";
	}
	elseif($weblink !="" && $file !="")
	{
		$r = "(`ra_message`,`ra_attach`,`ra_weblink`,`ra_refferelid`, `ra_sender_id`,`reciever`,`sender`) VALUES ('$cmnt','$file','$weblink','$id','$senderid','$coid','$senderid')";
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
		echo mysqli_error($con);
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
					<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
				
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
	<td class="nk-tb-col tb-col-sm">
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
//for servicerefferels fetch
if(isset($_POST['replyfetch'])) 
{
		$e = $_SESSION['gprefferer'];
		$q = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
		$f = mysqli_fetch_array($q);
		$id = $f['ur_id'];
		$q1 = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` WHERE c_gpid = '$id'");
		$f1 = mysqli_fetch_array($q1);
		$refferid = $f1['c_id'];
// 		echo "<script>alert('".$refferid."')</script>";
		$query = mysqli_query($con, "SELECT * FROM tbl_refferelattachment,tbl_consultantrefferels where tbl_consultantrefferels.c_id = tbl_refferelattachment.ra_refferelid and tbl_refferelattachment.ra_refferelid = '$refferid' and reply='1' GROUP BY ra_refferelid");

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

		<th class="nk-tb-col"><span>Refferel ID</span></th>
		<th class="nk-tb-col"><span>Consultant Name</span></th>
		<th class="nk-tb-col"><span>Message</span></th>
		<th class="nk-tb-col"><span>Weblink</span></th>
<th class="nk-tb-col"><span>Chat</span></th>
	</tr><!-- .nk-tb-item -->
	</thead>
	<tbody id="">';
			while ($fetch = mysqli_fetch_array($query)) {
				$rfid = $fetch['ra_sender_id'];
				$sql = mysqli_query($con,"SELECT * FROM tbl_ruser WHERE ur_id = '$rfid'");
				$fe = mysqli_fetch_array($sql);
				$namef =$fe['ur_sname'];

				echo '   <tr class="nk-tb-item">

	<td class="nk-tb-col">
	<span class="tb-lead">' . $fetch['ra_refferelid'] . '</span>
	</td>

	<td class="nk-tb-col">
	<span class="tb-lead">' . $namef . '</span>
	</td>
	<td class="nk-tb-col">
	<span class="tb-lead">' . $fetch['ra_message'] . '</span>
	</td>
	<td class="nk-tb-col">
	<span class="tb-lead">' . $fetch['ra_weblink'] . '</span>
	</td>
	<td class="nk-tb-col">
	<a href="reply.php?rfno=' . $fetch['ra_refferelid'] . '&pid='.$fetch["c_rfid"].'&coid='.$fetch["c_userid"].'" class="btn btn-sm btn-info">Chat</a>
	</td>
	';
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

if(isset($_POST['fetchreplybtn']))
{
	$rfno = $_POST['rfno'];
			$loginem = $_SESSION['gprefferer'];
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

//for patient fetch
if(isset($_POST['searchpatienta']))
{
	$em = $_POST['em'];
	$nm = $_POST['nm'];
	$dob = $_POST['dob'];

$assa = mysqli_query($con,"SELECT * FROM `tbl_patients` where pt_name ='$nm' and pt_dob='$dob' and pt_surname='$em'");
	if(mysqli_num_rows($assa)>0)
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
					<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
				
					<th class="nk-tb-col"><span>Mobile No</span></th>
					<th class="nk-tb-col"><span>NHS no</span></th>
					<th class="nk-tb-col"><span>Street Name</span></th>
					<th class="nk-tb-col"><span>Email</span></th>
					<th class="nk-tb-col"><span>Date of Birth</span></th>
					
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($assa))
		{
	$name = $fetch['pt_name'];
	$id = $fetch['pt_id'];
	$nh = $fetch['pt_nhsno'];
	$mobno = $fetch['pt_mobno'];
	$email = $fetch['pt_email'];
	$sname = $fetch['pt_streetname'];
	$dob = $fetch['pt_dob'];
    
echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input gg" name="check[]" value="'.$id.'" id="check'.$id.'" checked="">
			<label class="custom-control-label" for="check'.$id.'" onclick="showss('.$id.')"></label>
		</div>
	</td>
	<td class="nk-tb-col tb-col-sm">
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
		<span class="tb-lead">'.$email.'</span>
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

if(isset($_POST['fetchconsultant']))
{
			$orgid = $_POST['org'];
									 $q = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_role_id = '3' and ur_orgtype = '$orgid'");
									 if(mysqli_num_rows($q)>0)
									 {
										 while($fe = mysqli_fetch_array($q))
										 {
									 echo'
								 <option value="'.$fe['ur_id'].'">'.$fe['ur_fname'].'</option>';
										  
										 }
									 }
										
									}
									
if(isset($_POST["fetchspelly"])){
    $val=$_POST["val"];
    $query = mysqli_query($con,"SELECT * FROM `ser_specialty_add`,services where services.service_speciality =ser_specialty_add.spec_id and FIND_IN_SET('$val',services.service_r_t_support)");
								$num = mysqli_num_rows($query);
								if($num>0)
								{
								    ?>
								    	<option value="">-Select-</option>
								    <?php
									while($fe = mysqli_fetch_array($query))
									{
								?>
										<option value="<?=$fe['spec_id']?>"><?=$fe['spec_name']?></option>
										<?php
											}
								}
}
if(isset($_POST["fetchclims"])){
    $val=$_POST["val"];
     $query = mysqli_query($con,"SELECT * FROM `service_cliniciant` where cl_spectype ='$val'");
								$num = mysqli_num_rows($query);
								if($num>0)
								{
								    ?>
								    	<option value="">-Select-</option>
								    <?php
									while($fe = mysqli_fetch_array($query))
									{
								?>
										<option value="<?=$fe['cl_id']?>"><?=$fe['cl_type']?></option>
										<?php
											}
								}
}
?>