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
	$orgid = $_POST['orgid'];
	$gphid = $_POST['rid'];
	$ptitle = $_POST['ptitle'];
	$pfirstname = $_POST['pfirstname'];
	$psurname = $_POST['psurname'];
	$date=date_create($_POST['pdob']);
	// 	echo $_POST['pdob']; 
	$pdob = date_format($date,"Y-m-d");
	$nhsno = $_POST['nhsno'];
	$houseno = $_POST['houseno'];
	$streetname = $_POST['streetname'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$postalcode = $_POST['postalcode'];
	$telephoneno = $_POST['telephoneno'];
	$mobileno = $_POST['mobileno'];
	$email = $_POST['email'];
	$age = $_POST['age'];
	$sql = mysqli_query($con,"SELECT * FROM tbl_patients WHERE pt_nhsno = '$nhsno'");
	$fe = mysqli_num_rows($sql);
	if($fe >0)
	{
	    echo "nhs";
	}
	else{
	$query = mysqli_query($con,"INSERT INTO `tbl_patients`(`pt_title`, `pt_name`, `pt_surname`, `pt_dob`, `pt_nhsno`, `pt_houseno`, `pt_streetname`, `pt_city`, `pt_country`, `pt_postcode`, `pt_telno`, `pt_mobno`, `pt_email`,`pt_createid`,`pt_age`,`pt_orgid`)VALUES('$ptitle','$pfirstname','$psurname','$pdob','$nhsno','$houseno','$streetname','$city','$country','$postalcode','$telephoneno','$mobileno','$email','$gphid','$age','$orgid')");
	echo mysqli_error($con);
	if($query)
	{
		echo "Success";
	}
	else{
		echo "Error";
	}
	}
}
if(isset($_POST['updatepatient']))
{
	$pid=$_POST["pid"];
	$gphid = $_POST['rid'];
	$ptitle = $_POST['ptitle'];
	$pfirstname = $_POST['pfirstname'];
	$psurname = $_POST['psurname'];
	$date=date_create($_POST['pdob']);
	// 	echo $_POST['pdob']; 
	$pdob = date_format($date,"Y-m-d");
	$nhsno = $_POST['nhsno'];
	$houseno = $_POST['houseno'];
	$streetname = $_POST['streetname'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$postalcode = $_POST['postalcode'];
	$telephoneno = $_POST['telephoneno'];
	$mobileno = $_POST['mobileno'];
	$email = $_POST['email'];
	$age = $_POST['age'];

	
$query = mysqli_query($con,"UPDATE `tbl_patients` SET  `pt_title`='$ptitle', `pt_name`='$pfirstname', `pt_surname`='$psurname', `pt_dob`='$pdob', `pt_nhsno`='$nhsno', `pt_houseno`='$houseno', `pt_streetname`='$streetname', `pt_city`='$city', `pt_country`='$country', `pt_postcode`='$postalcode', `pt_telno`='$telephoneno', `pt_mobno`='$mobileno', `pt_email`='$email',`pt_age`='$age' where `pt_id`='$pid'");
echo mysqli_error($con);
	if($query)
	{
		echo "Success";
	}
	else{
		echo "Error";
	
	}
}
if(isset($_POST["checkemail"])){
    extract($_POST);
    $q=mysqli_query($con,"select * from tbl_patients where pt_email ='$email'");
    if(mysqli_num_rows($q) >0){
        echo "exists";
    }else{
        $q1=mysqli_query($con,"select * from tbl_ruser where ur_email ='$email'");
        if(mysqli_num_rows($q1) > 0)
        {
            echo "exists";
        }
        else
        {
            $q2=mysqli_query($con,"select * from tbl_user where staff_email ='$email'");
            if(mysqli_num_rows($q2) > 0)
            {
                echo "exists";
            }
            else
            {
                $q3=mysqli_query($con,"select * from admin where email ='$email'");
                if(mysqli_num_rows($q3) > 0)
                {
                    echo "exists";
                }
                else
                {
                    echo"not exists";
                }
            }
        }
    }
}
if(isset($_POST["checknhs"])){
    extract($_POST);
    $q=mysqli_query($con,"select * from tbl_patients where pt_nhsno ='$nhs'");
    
    if(mysqli_num_rows($q) > 0){
        echo "exists";
    }else{
        echo "not exists";
    }
}

//for refferels fetch
if(isset($_POST['refferelfetch']))
{
	$e = $_SESSION['gprefferer'];
// 	echo $e;
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	
		$q1 = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` WHERE c_gpid = '$id' and request_type = 'Appointment Request' ");
		$f1 = mysqli_fetch_array($q1);
		$refferid = $f1['c_id'];
// 	$kk=mysqli_query($con,"SELECT * FROM `tbl_refferelattachment` where ra_refferelid='$refferid'");
// 	if(mysqli_num_rows($kk) < 0){
	$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.service_id = tbl_consultantrefferels.c_serid JOIN service_name ON service_name.s_id = services.service_name JOIN service_cliniciant ON services.ser_cl_type= service_cliniciant.cl_id JOIN ser_specialty_add ON services.service_speciality = ser_specialty_add.spec_id JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid JOIN tbl_patients ON tbl_patients.pt_id = tbl_consultantrefferels.c_rfid where c_gpid = '$id' and request_type = 'Appointment Request' and c_status= '2'");

	// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<button onclick="window.print()" class="btn btn-danger">Print</button>
		<br>
		<br>
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
				
					<th class="nk-tb-col"><span>Refferel Id</span></th>
					<th class="nk-tb-col"><span>Priority</span></th>
					<th class="nk-tb-col"><span>Status</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>Speciality</span></th>
					<th class="nk-tb-col"><span>Clinic Type</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
					<th class="nk-tb-col"><span>NHS No</span></th>
					<th class="nk-tb-col"><span>Patient First Name</span></th>
					<th class="nk-tb-col"><span>Patient Last Name</span></th>
					<th class="nk-tb-col"><span>Organisation Name</span></th>
						<th class="nk-tb-col"><span>View referral</span></th>
						<th class="nk-tb-col"><span>Refer to Appointment</span></th>
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
		    
	$rfid = $fetch['c_id'];
$qki=mysqli_query($con,"select * from tbl_refferelattachment  where ra_refferelid='$rfid' ORDER BY ra_id DESC LIMIT 1");
$hks=mysqli_fetch_array($qki);
// $qki1=mysqli_query($con,"select * from tbl_refferelattachment  where ra_refferelid='$rfid' and ra_sender_id ='".$fetch["ur_id"]."'
// sender='".$fetch["ur_id"]."' and reply ='1' and reciever='$id'");

	echo'   <tr class="nk-tb-item">

	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_id'].'</span>
	</td>
	<td class="nk-tb-col">';
      if($fetch['ser_priority_rout'] != 0)
                                                         {
    echo'  <span>Routine</span>';
  
                                                         }
                                                         elseif($fetch['ser_priority_urg'] != 0)
                                                         {
    echo '<span>Urgent</span>';
                                                         }
                                                         
                                                       
                                                         elseif($fetch['ser_priority_2week'] != 0)
                                                         {
              
              echo'                                           <span>2 Weeks</span>';
                                                         
                 }
	echo '</td>
	';
		if($hks["sender"] == $id && $hks["reciever"]==$fetch["ur_id"] && $hks["reply"] == 0 ){
 echo '
 	<td class="nk-tb-col">

	<span class="badge badge-danger">Clinician Provider Response Required</span>
	</td>
	

	';   
	}elseif($hks["sender"] == $fetch["ur_id"] && $hks["reciever"]== $id && $hks["reply"] == 1){
	echo '
<td class="nk-tb-col">

	<span class="badge badge-primary ">waiting for your response</span>
	</td>
	';
	}	else{
 echo '
 	<td class="nk-tb-col">

	<span class="badge badge-danger">Clinician Provider Response Required</span>
	</td>
	

	';   
	}
	echo'
		<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['s_name'].'</span>
	</td>
	
	
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['spec_name'].'</span>
		</span>
	</td>
		<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['cl_type'].'</span>
		</span>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['ur_fname'].'</span>
		</span>
	</td>

	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_nhsno'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['pt_name'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['pt_surname'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['or_name'].'</span>
	</td>
	<td class="nk-tb-col">
		<a class="tb-lead btn btn-info btn-sm text-white" href="reply.php?c_id='.$fetch["c_id"].'&coid='.$fetch["c_userid"].'&pid='.$fetch["c_rfid"].'&rfno='.$fetch["c_id"].'&nhsno='.$fetch["c_nhsno"].'">Open </a>
	</td>
	<td class="nk-tb-col">
	<span class=""><a href="createappointment.php?ubrn='.$fetch['c_UBRN'].'" class="btn btn-info btn-sm">Refer to Appointment</a></span>
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
// 	}else{
// 	    $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.service_id = tbl_consultantrefferels.c_serid JOIN service_name ON service_name.s_id = services.service_name JOIN service_cliniciant ON services.ser_cl_type= service_cliniciant.cl_id JOIN ser_specialty_add ON services.service_speciality = ser_specialty_add.spec_id JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid  where c_gpid = '$id' and request_type = 'Appointment Request' and c_status='242'");

// 	// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
// 	if($query)
// 	{
// 		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
// 		<button onclick="window.print()" class="btn btn-danger">Print</button>
// 		<br>
// 		<br>
// 		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
// 			<thead>
// 				<tr class="nk-tb-item nk-tb-head">
				
// 					<th class="nk-tb-col"><span>Service Id</span></th>
// 					<th class="nk-tb-col"><span>Priority</span></th>
// 					<th class="nk-tb-col"><span>Status</span></th>
// 					<th class="nk-tb-col"><span>Service Name</span></th>
// 					<th class="nk-tb-col"><span>Speciality</span></th>
// 					<th class="nk-tb-col"><span>Clininic Type</span></th>
// 					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
// 					<th class="nk-tb-col"><span>NHS Number</span></th>
// 					<th class="nk-tb-col"><span>Organisation Name</span></th>
// 						<th class="nk-tb-col"><span>View referrer</span></th>
// 				</tr><!-- .nk-tb-item -->
// 			</thead>
// 			 <tbody id="">';
// 		while($fetch = mysqli_fetch_array($query))
// 		{
		    
// 	$rfid = $fetch['c_id'];
// $qki=mysqli_query($con,"select * from tbl_refferelattachment  where ra_refferelid='$rfid' ORDER BY ra_id DESC LIMIT 1");
// $hks=mysqli_fetch_array($qki);
// // $qki1=mysqli_query($con,"select * from tbl_refferelattachment  where ra_refferelid='$rfid' and ra_sender_id ='".$fetch["ur_id"]."'
// // sender='".$fetch["ur_id"]."' and reply ='1' and reciever='$id'");

// 	echo'   <tr class="nk-tb-item">

// 	<td class="nk-tb-col">
// 		<span class="tb-lead">'.$fetch['c_serid'].'</span>
// 	</td>
// 	<td class="nk-tb-col">';
//       if($fetch['ser_priority_rout'] != 0)
//                                                          {
//     echo'  <span>Routine</span>';
  
//                                                          }
//                                                          elseif($fetch['ser_priority_urg'] != 0)
//                                                          {
//     echo '<span>Urgent</span>';
//                                                          }
                                                         
                                                       
//                                                          elseif($fetch['ser_priority_2week'] != 0)
//                                                          {
              
//               echo'                                           <span>2 Weeks</span>';
                                                         
//                  }
// 	echo '</td>
// 	';
// 		if($hks["sender"] == $id && $hks["reciever"]==$fetch["ur_id"] && $hks["reply"] == 0 ){
//  echo '
//  	<td class="nk-tb-col">

// 	<span class="badge badge-danger">Clinician Provider Response Required</span>
// 	</td>
	

// 	';   
// 	}elseif($hks["sender"] == $fetch["ur_id"] && $hks["reciever"]== $id && $hks["reply"] == 1){
// 	echo '
// <td class="nk-tb-col">

// 	<span class="badge badge-primary ">waiting for your response</span>
// 	</td>
// 	';
// 	}	else{
//  echo '
//  	<td class="nk-tb-col">

// 	<span class="badge badge-danger">Clinician Provider Response Required</span>
// 	</td>
	

// 	';   
// 	}
// 	echo'
// 		<td class="nk-tb-col">
// 		<span class="tb-lead">'.$fetch['s_name'].'</span>
// 	</td>
	
	
// 	<td class="nk-tb-col tb-col-sm">
// 		<span class="tb-product">
			
// 			<span class="title">'.$fetch['spec_name'].'</span>
// 		</span>
// 	</td>
// 		<td class="nk-tb-col tb-col-sm">
// 		<span class="tb-product">
			
// 			<span class="title">'.$fetch['cl_type'].'</span>
// 		</span>
// 	</td>
// 	<td class="nk-tb-col tb-col-sm">
// 		<span class="tb-product">
			
// 			<span class="title">'.$fetch['ur_fname'].'</span>
// 		</span>
// 	</td>

// 	<td class="nk-tb-col">
// 		<span class="tb-lead">'.$fetch['c_nhsno'].'</span>
// 	</td>	
// 	<td class="nk-tb-col">
// 		<span class="tb-lead">'.$fetch['or_name'].'</span>
// 	</td>
// 	<td class="nk-tb-col">
// 		<a class="tb-lead btn btn-info btn-sm text-white" href="reply.php?c_id='.$fetch["c_id"].'&coid='.$fetch["c_userid"].'&pid='.$fetch["c_rfid"].'&rfno='.$fetch["c_id"].'&nhsno='.$fetch["c_nhsno"].'">Open </a>
// 	</td>
// 		<td class="nk-tb-col">
// 	<span class=""><a href="createappointment.php" class="btn btn-info btn-sm">Refer to Appointment</a></span>
// 	</td>
// 	';   
	
	
										
// 		}
// 		echo'</tbody> </table>
		
		
// 		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
// 	<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
// 	<script>$(document).ready(function () {
// 		$("#myTable").DataTable();
// 	} )
// 	</script>
// 	';
// 		}
// 	}
}
//for refferels fetch1
if(isset($_POST['refferelfetch1']))
{
	$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e' ");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	$q1 = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` WHERE c_gpid = '$id'");
		$f1 = mysqli_fetch_array($q1);
		$refferid = $f1['c_id'];
	
	$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.service_id = tbl_consultantrefferels.c_serid JOIN service_name ON service_name.s_id = services.service_name JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid join tbl_refferelattachment on tbl_consultantrefferels.c_id = tbl_refferelattachment.ra_refferelid JOIN tbl_patients ON tbl_patients.pt_id = tbl_consultantrefferels.c_rfid JOIN ser_specialty_add ON services.service_speciality = ser_specialty_add.spec_id where c_gpid = '$id' and tbl_refferelattachment.ra_refferelid = '$refferid' and c_status= 1 and request_type = 'Appointment Request' GROUP BY c_serid");

	// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
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
				<th class="nk-tb-col"><span>Refferal Id</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>NHS No</span></th>
					<th class="nk-tb-col"><span>Patient First Name</span></th>
					<th class="nk-tb-col"><span>Patient Last Name</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Organisation Name</span></th>
					<th class="nk-tb-col"><span>Status</span></th>
					<th class="nk-tb-col"><span>referrer Status</span></th>
					<th class="nk-tb-col"><span>View referrer</span></th>
					<th class="nk-tb-col"><span>Refer to Appointment</span></th>
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$rfid = $fetch['c_id'];
$qki=mysqli_query($con,"select * from tbl_refferelattachment  where ra_refferelid='$rfid' ORDER BY ra_id DESC LIMIT 1");
$hks=mysqli_fetch_array($qki);

	echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input" name="check" id="'.$rfid.'" onclick="show('."'$rfid'".')">
			<label class="custom-control-label" for="'.$rfid.'"></label>
		</div>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_id'].'</span>
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
		<span class="tb-lead">'.$fetch['pt_name'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['pt_surname'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['or_name'].'</span>
	</td>';
		if($hks["sender"] == $id && $hks["reciever"]==$fetch["ur_id"] && $hks["reply"] == 0 ){
 echo '
 	<td class="nk-tb-col">

	<span class="badge badge-danger">Clinician Provider Response Required</span>
	</td>
	

	';   
	}elseif($hks["sender"] == $fetch["ur_id"] && $hks["reciever"]== $id && $hks["reply"] == 1){
	echo '
<td class="nk-tb-col">

	<span class="badge badge-primary ">waiting for your response</span>
	</td>
	';
	}	else{
 echo '
 	<td class="nk-tb-col">

	<span class="badge badge-danger">Clinician Provider Response Required</span>
	</td>
	

	';   
	}
		if($fetch["c_status"] == 1 ){
 echo '
	<td class="nk-tb-col">

	<span class="badge badge-primary ">Accepted</span>
	</td>

	';   
	}else{
	    
	}
	echo'<td class="nk-tb-col">
		<a class="tb-lead btn btn-info btn-sm text-white" href="reply.php?c_id='.$fetch["c_id"].'&coid='.$fetch["c_userid"].'&pid='.$fetch["c_rfid"].'&rfno='.$fetch["c_id"].'&nhsno='.$fetch["c_nhsno"].'">Open </a>
	</td>
		<td class="nk-tb-col">
	<span class=""><a href="createappointment.php?ubrn='.$fetch['c_UBRN'].'" class="btn btn-info btn-sm">Refer to Appointment</a></span>
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


//for refferels fetch2
if(isset($_POST['refferelfetch2']))
{
	$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e' ");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	$q1 = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` WHERE c_gpid = '$id'");
		$f1 = mysqli_fetch_array($q1);
		$refferid = $f1['c_id'];
	
	$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.service_id = tbl_consultantrefferels.c_serid JOIN service_name ON service_name.s_id = services.service_name JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid join tbl_refferelattachment on tbl_consultantrefferels.c_id = tbl_refferelattachment.ra_refferelid JOIN tbl_patients ON tbl_patients.pt_id = tbl_consultantrefferels.c_rfid JOIN ser_specialty_add ON services.service_speciality = ser_specialty_add.spec_id where c_gpid = '$id' and tbl_refferelattachment.ra_refferelid = '$refferid' and c_status= 0 and request_type = 'Appointment Request' GROUP BY c_serid");

	// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
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
				<th class="nk-tb-col"><span>Service Id</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>Speciality Name</span></th>
					<th class="nk-tb-col"><span>NHS No</span></th>
					<th class="nk-tb-col"><span>Patient First Name</span></th>
					<th class="nk-tb-col"><span>Patient Last Name</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Organisation Name</span></th>
					<th class="nk-tb-col"><span>Status</span></th>
					<th class="nk-tb-col"><span>Refer to Appointment</span></th>
					
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
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['spec_name'].'</span>
		</span>
	</td>
	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_nhsno'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['pt_name'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['pt_surname'].'</span>
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
	echo'	<td class="nk-tb-col">
	<span class=""><a href="createappointment.php?ubrn='.$fetch['c_UBRN'].'" class="btn btn-info btn-sm">Refer to Appointment</a></span>
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


//for refferels fetch3
if(isset($_POST['refferelfetch3']))
{
	$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	$q1 = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` WHERE c_gpid = '$id' and request_type = 'Advice request'");
if(mysqli_num_rows($q1) > 0)
	{
		$f1 = mysqli_fetch_array($q1);
		$refferid = $f1['c_id'];
	}

	$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.service_id = tbl_consultantrefferels.c_serid JOIN service_name ON service_name.s_id = services.service_name JOIN service_cliniciant ON services.ser_cl_type= service_cliniciant.cl_id JOIN ser_specialty_add ON services.service_speciality = ser_specialty_add.spec_id JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid join tbl_refferelattachment on tbl_consultantrefferels.c_id = tbl_refferelattachment.ra_refferelid JOIN tbl_patients ON tbl_patients.pt_id = tbl_consultantrefferels.c_rfid where c_gpid = '$id' and tbl_refferelattachment.ra_refferelid = '$refferid' and request_type = 'Advice request' and c_status = '2' GROUP BY c_serid and c_userid");

	// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<button onclick="window.print()" class="btn btn-danger">Print</button>
		<br>
		<br>
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
				<th class="nk-tb-col"><span>Refferal Id</span></th>
					<th class="nk-tb-col"><span>Priority</span></th>
					<th class="nk-tb-col"><span>Status</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>Speciality</span></th>
					<th class="nk-tb-col"><span>Clininic Type</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
					<th class="nk-tb-col"><span>NHS No</span></th>
					<th class="nk-tb-col"><span>Patient First Name</span></th>
					<th class="nk-tb-col"><span>Patient Last Name</span></th>
					<th class="nk-tb-col"><span>Organisation Name</span></th>
						<th class="nk-tb-col"><span>View referrer</span></th>
						<th class="nk-tb-col"><span>Refer to Appointment</span></th>
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$rfid = $fetch['c_id'];
$qki=mysqli_query($con,"select * from tbl_refferelattachment  where ra_refferelid='$rfid' ORDER BY ra_id DESC LIMIT 1");
$hks=mysqli_fetch_array($qki);
	echo'   <tr class="nk-tb-item">

	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_id'].'</span>
	</td>
	<td class="nk-tb-col">';
      if($fetch['ser_priority_rout'] != 0)
                                                         {
    echo'  <span>Routine</span>';
  
                                                         }
                                                         elseif($fetch['ser_priority_urg'] != 0)
                                                         {
    echo '<span>Urgent</span>';
                                                         }
                                                         
                                                       
                                                         elseif($fetch['ser_priority_2week'] != 0)
                                                         {
              
              echo'                                           <span>2 Weeks</span>';
                                                         
                 }
	echo '</td>
	';
		if($hks["sender"] == $id && $hks["reciever"]==$fetch["ur_id"] && $hks["reply"] == 0 ){
 echo '
 	<td class="nk-tb-col">

	<span class="badge badge-danger">Clinician Provider Response Required</span>
	</td>
	

	';   
	}elseif($hks["sender"] == $fetch["ur_id"] && $hks["reciever"]== $id && $hks["reply"] == 1){
	echo '
<td class="nk-tb-col">

	<span class="badge badge-primary ">waiting for your response</span>
	</td>
	';
	}else{
	    echo '
 	<td class="nk-tb-col">

	<span class="badge badge-danger">Clinician Provider Response Required</span>
	</td>
	

	'; 
	}
	echo'
		<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['s_name'].'</span>
	</td>
	
	
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['spec_name'].'</span>
		</span>
	</td>
		<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['cl_type'].'</span>
		</span>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['ur_fname'].'</span>
		</span>
	</td>

	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_nhsno'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['pt_name'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['pt_surname'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['or_name'].'</span>
	</td>
	<td class="nk-tb-col">
		<a class="tb-lead btn btn-info btn-sm text-white" href="reply.php?c_id='.$fetch["c_id"].'&coid='.$fetch["c_userid"].'&pid='.$fetch["c_rfid"].'&rfno='.$fetch["c_id"].'&nhsno='.$fetch["c_nhsno"].'">Open </a>
	</td>
		<td class="nk-tb-col">
	<span class=""><a href="createappointment.php?ubrn='.$fetch['c_UBRN'].'" class="btn btn-info btn-sm">Refer to Appointment</a></span>
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
//for refferels fetch4
if(isset($_POST['refferelfetch4']))
{
		$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	$q1 = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` WHERE c_gpid = '$id' and request_type = 'Advice request'");
	if(mysqli_num_rows($q1) > 0)
	{
		$f1 = mysqli_fetch_array($q1);
		$refferid = $f1['c_id'];
	}

	$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.service_id = tbl_consultantrefferels.c_serid JOIN service_name ON service_name.s_id = services.service_name JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid join tbl_refferelattachment on tbl_consultantrefferels.c_id = tbl_refferelattachment.ra_refferelid JOIN tbl_patients ON tbl_patients.pt_id = tbl_consultantrefferels.c_rfid JOIN ser_specialty_add ON services.service_speciality = ser_specialty_add.spec_id where c_gpid = '$id' and tbl_refferelattachment.ra_refferelid = '$refferid' and request_type != 'Appointment Request' and c_status= 1 GROUP BY c_serid");

	// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
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
					<th class="nk-tb-col"><span>Refferal Id</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>Speciality</span></th>
					<th class="nk-tb-col"><span>NHS No</span></th>
					<th class="nk-tb-col"><span>Patient First Name</span></th>
					<th class="nk-tb-col"><span>Patient Last Name</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Organisation Name</span></th>
					<th class="nk-tb-col"><span>Status</span></th>
			<th class="nk-tb-col"><span>Refer to Appointment</span></th>			
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
		<span class="tb-lead">'.$fetch['c_id'].'</span>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['ur_fname'].'</span>
		</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['s_name'].'</span>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['spec_name'].'</span>
		</span>
	</td>
	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_nhsno'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['pt_name'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['pt_surname'].'</span>
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
	echo '
		<td class="nk-tb-col">
	<span class=""><a href="createappointment.php?ubrn='.$fetch['c_UBRN'].'" class="btn btn-info btn-sm">Refer to Appointment</a></span>
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

//for refferels fetch1
if(isset($_POST['refferelfetch5']))
{
	$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	$q1 = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` WHERE c_gpid = '$id' and request_type = 'Advice request'");
	if(mysqli_num_rows($q1) > 0)
	{
		$f1 = mysqli_fetch_array($q1);
		$refferid = $f1['c_id'];
	}
	
	$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.service_id = tbl_consultantrefferels.c_serid JOIN service_name ON service_name.s_id = services.service_name JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid join tbl_refferelattachment on tbl_consultantrefferels.c_id = tbl_refferelattachment.ra_refferelid JOIN ser_specialty_add ON services.service_speciality = ser_specialty_add.spec_id JOIN tbl_patients ON tbl_patients.pt_id = tbl_consultantrefferels.c_rfid where c_gpid = '$id' and tbl_refferelattachment.ra_refferelid = '$refferid' and request_type != 'Appointment Request' and c_status= 0 GROUP BY c_serid ");

	// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
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
					<th class="nk-tb-col"><span>Refferal Id</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Consultant Name</span></th>
					<th class="nk-tb-col"><span>Speciality Name</span></th>
					<th class="nk-tb-col"><span>Service Name</span></th>
					<th class="nk-tb-col"><span>NHS No</span></th>
					<th class="nk-tb-col"><span>Patient First Name</span></th>
					<th class="nk-tb-col"><span>Patient Last Name</span></th>
					<th class="nk-tb-col tb-col-sm"><span>Organisation Name</span></th>
					<th class="nk-tb-col"><span>Status</span></th>
						<th class="nk-tb-col"><span>Refer to Appointment</span></th>		
					
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
		<span class="tb-lead">'.$fetch['c_id'].'</span>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$fetch['ur_fname'].'</span>
		</span>
	</td>
		<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['spec_name'].'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['s_name'].'</span>
	</td>
	
	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['c_nhsno'].'</span>
	</td>
		<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['pt_name'].'</span>
	</td>	
	<td class="nk-tb-col">
		<span class="tb-lead">'.$fetch['pt_surname'].'</span>
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
		echo '
		<td class="nk-tb-col">
	<span class=""><a href="createappointment.php?ubrn='.$fetch['c_UBRN'].'" class="btn btn-info btn-sm">Refer to Appointment</a></span>
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


//for refferels fetch6
if(isset($_POST['refferelfetch6']))
{
	$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	$q1 = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` WHERE c_gpid = '$id'");
	if(mysqli_num_rows($q1) > 0)
	{
		$f1 = mysqli_fetch_array($q1);
		$refferid = $f1['c_id'];
	}
	else
	{
	$refferid = '';
		
	
	$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.service_id = tbl_consultantrefferels.c_serid JOIN service_name ON service_name.s_id = services.service_name JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid join tbl_refferelattachment on tbl_consultantrefferels.c_id = tbl_refferelattachment.ra_refferelid where c_gpid = '$id' and tbl_refferelattachment.ra_refferelid = '$refferid' and tbl_refferelattachment.reply='1' and request_type != 'Appointment Request'");

	// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
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
}


//for refferels fetch7
if(isset($_POST['refferelfetch7']))
{
	$e = $_SESSION['gprefferer'];
	
	$q= mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
	$f = mysqli_fetch_array($q);
	$id = $f['ur_id'];
	$q1 = mysqli_query($con, "SELECT * FROM `tbl_consultantrefferels` WHERE c_gpid = '$id'");
	if(mysqli_num_rows($q1) > 0)
	{
		$f1 = mysqli_fetch_array($q1);
		$refferid = $f1['c_id'];
	}
	else
	{
	$refferid = '';
		
	
	$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`JOIN tbl_ruser ON tbl_ruser.ur_id = tbl_consultantrefferels.c_userid JOIN services ON services.service_id = tbl_consultantrefferels.c_serid JOIN service_name ON service_name.s_id = services.service_name JOIN orginzation ON orginzation.orid = tbl_consultantrefferels.c_orgid join tbl_refferelattachment on tbl_consultantrefferels.c_id = tbl_refferelattachment.ra_refferelid where c_gpid = '$id' and tbl_refferelattachment.ra_refferelid = '$refferid' and tbl_refferelattachment.reply='1' and request_type != 'Appointment Request'");

	// $query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels`,orginzation,tbl_patients where orginzation.orid=tbl_consultantrefferels.c_orgid and tbl_patients.pt_nhsno=tbl_consultantrefferels.c_nhsno and c_gpid = '$id'");
	if($query)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
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
}
//for patient fetch
if(isset($_POST['patientfetch']))
{
	$nhs = $_POST['nhs'];
	$query = mysqli_query($con,"SELECT * FROM `tbl_patients` WHERE pt_nhsno = '$nhs'");
$query1 = mysqli_query($con,"SELECT * FROM `tbl_patients` WHERE pt_nhsno = '$nhs'");
$fetch1 = mysqli_fetch_array($query1);
	if(mysqli_num_rows($query) > 0)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<hr>
	<h5>Patient List</h5>
	<input type="text" value="'.$fetch1["pt_age"].'" hidden id="pt_age">
	<input type="text" value="'.$fetch1["pt_title"].'" hidden id="pt_title">
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
					<th class="nk-tb-col nk-tb-col-check">
					
					</th>
					<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
				
					<th class="nk-tb-col"><span>Mobile No</span></th>
					<th class="nk-tb-col"><span>NHS no</span></th>
					<th class="nk-tb-col"><span>Street Name</span></th>
					<th class="nk-tb-col"><span>Date of Birth</span></th>
					<th class="nk-tb-col"><span>View Details</span></th>
						<th class="nk-tb-col"><span>Edit</span></th>
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
	$date =date_create($fetch['pt_dob']);
	$dob = date_format($date,"d-m-Y");
	$dob2=date_format($date,"Y-m-d");

	echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-radio notext">
			<input type="radio" class="custom-control-input gg" name="check" value="'.$id.'" id="check'.$id.'"  onclick="kk(\''.$fetch['pt_title'].'\')">
			<label class="custom-control-label" for="check'.$id.'" ></label>
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
		<a class="tb-lead" style="cursor: pointer;" class="btn btn-info btn-sm" onclick="fetchpatientdetails(\''.$fetch["pt_title"].'\',\''.$name." ".$fetch["pt_surname"].'\',\''.$fetch["pt_email"].'\',\''.$nh.'\',\''.$dob.'\',\''.$fetch["pt_houseno"].'\',\''.$sname.'\',\''.$fetch["pt_country"].'\',\''.$fetch["pt_city"].'\',\''.$fetch["pt_postcode"].'\',\''.$fetch["pt_telno"].'\',\''.$fetch["pt_mobno"].'\')">View Details</a>
	</td>
		</td>
		<td class="nk-tb-col">
		<a class="tb-lead" style="cursor: pointer;" class="btn btn-success btn-sm" onclick="fetchpatientedit('.$id.',\''.$fetch["pt_title"].'\',\''.$name.'\',\''.$fetch["pt_surname"].'\',\''.$fetch["pt_email"].'\',\''.$nh.'\',\''.$dob2.'\',\''.$fetch["pt_houseno"].'\',\''.$sname.'\',\''.$fetch["pt_country"].'\',\''.$fetch["pt_city"].'\',\''.$fetch["pt_postcode"].'\',\''.$fetch["pt_telno"].'\',\''.$fetch["pt_mobno"].'\')">Edit</a>
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
		echo"There is no patient matching criteria";
	}
}

//for Appointment patient fetch
if(isset($_POST['apppatientfetch']))
{
    $ubrn = $_POST['ubrn'];
	$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels` Join `tbl_patients` ON tbl_consultantrefferels.c_rfid = tbl_patients.pt_id WHERE c_UBRN = '$ubrn' GROUP BY pt_name");
	if(mysqli_num_rows($query )>0)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<hr>
		<h5>Patient Info</h5>
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
	$date =date_create($fetch['pt_dob']);
	$dob = date_format($date,"d-m-Y");

	echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-checkbox notext">
			<input type="checkbox" class="custom-control-input gg" name="check[]" value="'.$id.'" id="check'.$id.'">
			<label class="custom-control-label" for="check'.$id.'" ></label>
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
		$ptage = $_POST['ptage'];
		$pttitle = $_POST['pttitle'];
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
	$query = mysqli_query($con,"SELECT * FROM `services` WHERE ".$res." and FIND_IN_SET('$cliniciantype',ser_cl_type)  and service_speciality = '$speciality'");
	$query1 = mysqli_query($con,"SELECT * FROM `services` WHERE ".$res." and FIND_IN_SET('$cliniciantype',ser_cl_type)  and service_speciality = '$speciality'");
	$fetch1 = mysqli_fetch_array($query1);
// 	if($fetch1['service_age'] > $ptage || $fetch1['service_age2'] < $ptage)
// 	{
// 	    echo"age";
// 	}
// 	elseif($fetch1['service_gender'] == "Male" && $pttitle == "Ms" || $fetch1['service_gender'] == "Female" && $pttitle == "Mr")
// 	{
// 	    echo"gender";
// 	}

		echo mysqli_error($con);
		if(mysqli_num_rows($query) >0)
		{
			echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
			<hr>
			<h5 class="text-center">Service List</h5>
			<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable1" >
				<thead>
					<tr class="nk-tb-item nk-tb-head">
						<th class="nk-tb-col nk-tb-col-check">
							
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
					$loname = $fetch['service_location'];
				$sql3 = mysqli_query($con,"SELECT * FROM `org_locations` WHERE id = '$loname'");
				$fe3 = mysqli_fetch_array($sql3);
				$locname =$fe3['org_location_name'];
		// $dob = $fetch['service_location'];
		// 		$sql3 = mysqli_query($con,"SELECT * FROM `service_location` WHERE lo_id = '$dob'");
		// 		$fe3 = mysqli_fetch_array($sql3);
		// 		$dob = $fe3['lo_location'];
		$id = $fetch['service_id'];
	if($fetch['service_age'] > $ptage || $fetch['service_age2'] < $ptage)
	{
	 
	}
	elseif($fetch['service_gender'] == "Male" && $pttitle == "Ms")
	{
	 
	}
	elseif($fetch['service_gender'] == "Female" && $pttitle == "Mr")
	{
	    
	}
	else{
	echo'   <tr class="nk-tb-item">
		<td class="nk-tb-col nk-tb-col-check">
			<div class="custom-control custom-control-sm custom-radio notext">
				<input type="radio" class="custom-control-input dd" value="'.$id.'" name="checkw" id="'.$id.'" data-org="'.$fetch["s_orgid"].'" data-servage="'.$fetch["service_age"].'" data-servage2="'.$fetch["service_age2"].'" onclick="showss(this,\''.$mobno.'\')" >
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
			<span class="tb-lead">'.$locname.'</span>
		</td>
		';
			
	}								
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

//for Appointment service fetch
if(isset($_POST['appservicefetch']))
{
	$ubrn = $_POST['ubrn'];
$query = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels` join `services` ON tbl_consultantrefferels.c_serid = services.service_id WHERE c_UBRN = '$ubrn' GROUP BY service_id");
	echo mysqli_error($con);
	if(mysqli_num_rows($query) >0)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<hr>
		<h5>Service Info</h5>
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
	$loname = $fetch['service_location'];
				$sql3 = mysqli_query($con,"SELECT * FROM `org_locations` WHERE id = '$loname'");
				$fe3 = mysqli_fetch_array($sql3);
				$locname =$fe3['org_location_name'];

echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-radio notext">
			<input type="radio" class="custom-control-input dd" onclick="showss(this,\''.$mobno.'\')" value="'.$id.'" name="checkw" id="'.$id.'">
			<label class="custom-control-label" for="'.$id.'" ></label>
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
		<span class="tb-lead">'.$locname.'</span>
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
	$reqtype=$_POST["reqtype"];
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
	$q3 = mysqli_query($con,"SELECT * FROM `tbl_consultantrefferels` WHERE c_serid = '$checkw' and c_rfid = '$check'");
	$f3 = mysqli_num_rows($q3);
	$fe3 = mysqli_fetch_array($q3);
	$ubrn;
	$q4 = mysqli_query($con,"SELECT * FROM tbl_consultantrefferels ORDER BY c_id DESC LIMIT 1");
	$fe4 = mysqli_fetch_array($q4);
	$f4 = mysqli_num_rows($q4);
	if($f3 >0)
	{
	  
	    echo json_encode(array("res"=>"Already"));
	}
	else{
	    if($f4 > 0)
	    {
	        $ubrn = $fe4['c_UBRN']+1;
	    }
	    else
	    {
	        $ubrn = rand(9999999999,100000000);
	    }
	$q = mysqli_query($con,"INSERT INTO `tbl_consultantrefferels`(`c_UBRN`,`c_userid`, `c_rfid`, `c_serid`,`c_gpid`,`c_nhsno`,`c_orgid`,`c_status`,`request_type`) VALUES('$ubrn','$consultantid','$check','$checkw','$id','$nhs','$orgid','2','$reqtype')");
	
	if($q)
{
		echo json_encode(array("res"=>"success","c_id"=>mysqli_insert_id($con)));

	}
	else
	{
				echo json_encode(array("res"=>"Error"));
	}
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

//for comment status
if(isset($_POST['updatestatus']))
{
    $rfno = $_POST['rfno'];
    $query = mysqli_query($con,"UPDATE `tbl_refferelattachment` SET `status`= 'seen' WHERE ra_refferelid = '$rfno' and reply = '1'");
    if($query)
    {
        echo "Success";
    }
    else
    {
        echo"error";
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
		$r = "(`ra_message`, `ra_attach`,`ra_refferelid`, `ra_sender_id`,`reciever`,`sender`,`status`) VALUES ('$cmnt','$file','$id','$senderid','$coid','$senderid','unseen')";
		move_uploaded_file($_FILES['attachment']['tmp_name'],'assets/uploads/'.$file);
	}
	else if($file == "" && $file == null)
	{
		$r = "(`ra_message`, `ra_weblink`,`ra_refferelid`, `ra_sender_id`,`reciever`,`sender`,`status`) VALUES ('$cmnt','$weblink','$id','$senderid','$coid','$senderid','unseen')";
	}
	else if($weblink == "" && $file == "" && $weblink == null && $file == null)
	{
		$r = "(`ra_message`,`ra_refferelid`, `ra_sender_id`,`reciever`,`sender`,`status`) VALUES ('$cmnt','$id','$senderid','$coid','$senderid','unseen')";
	}
	elseif($weblink !="" && $file !="")
	{
		$r = "(`ra_message`,`ra_attach`,`ra_weblink`,`ra_refferelid`, `ra_sender_id`,`reciever`,`sender`,`status`) VALUES ('$cmnt','$file','$weblink','$id','$senderid','$coid','$senderid','unseen')";
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
	$datew=date_create($_POST['dob']);
 
	$dobw =date_format($datew,"Y-m-d");
    // echo $dob;
$assa = mysqli_query($con,"SELECT * FROM `tbl_patients` where pt_name ='$nm' and pt_dob='$dobw' and pt_surname='$em'");
	// echo mysqli_error($con);
	if(mysqli_num_rows($assa) > 0)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<hr>
		<h5>Patient List</h5>
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
				
					<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
				
					<th class="nk-tb-col"><span>Mobile No</span></th>
					<th class="nk-tb-col"><span>NHS no</span></th>
					<th class="nk-tb-col"><span>Street Name</span></th>
					<th class="nk-tb-col"><span>Date of Birth</span></th>
					<th class="nk-tb-col"><span>Email</span></th>
					<th class="nk-tb-col"><span>View Details</span></th>
						<th class="nk-tb-col"><span>Edit</span></th>
					
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
	$date1 = date_create($fetch['pt_dob']);
	$dob1=date_format($date1,"d-m-Y");
	$dob2=date_format($date1,"Y-m-d");
	$em = $fetch['pt_email'];


echo'   <tr class="nk-tb-item">
	
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$name." ".$fetch["pt_surname"].'</span>
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
		<span class="tb-lead">'.$dob1.'</span>
	</td>
	<td class="nk-tb-col">
		<span class="tb-lead">'.$em.'</span>
	</td>
		</td>
		<td class="nk-tb-col">
		<a class="tb-lead" style="cursor: pointer;" class="btn btn-info btn-sm" onclick="fetchpatientdetails(\''.$fetch["pt_title"].'\',\''.$name." ".$fetch["pt_surname"].'\',\''.$fetch["pt_email"].'\',\''.$nh.'\',\''.$dob.'\',\''.$fetch["pt_houseno"].'\',\''.$sname.'\',\''.$fetch["pt_country"].'\',\''.$fetch["pt_city"].'\',\''.$fetch["pt_postcode"].'\',\''.$fetch["pt_telno"].'\',\''.$fetch["pt_mobno"].'\')">View Details</a>
	</td>
		</td>
		<td class="nk-tb-col">
		<a class="tb-lead" style="cursor: pointer;" class="btn btn-success btn-sm" onclick="fetchpatientedit('.$id.',\''.$fetch["pt_title"].'\',\''.$name.'\',\''.$fetch["pt_surname"].'\',\''.$fetch["pt_email"].'\',\''.$nh.'\',\''.$dob2.'\',\''.$fetch["pt_houseno"].'\',\''.$sname.'\',\''.$fetch["pt_country"].'\',\''.$fetch["pt_city"].'\',\''.$fetch["pt_postcode"].'\',\''.$fetch["pt_telno"].'\',\''.$fetch["pt_mobno"].'\')">Edit</a>
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
		echo'There is no patient matching criteria';
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
<th class="nk-tb-col"><span>View Referr</span></th>
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
	<a href="reply.php?rfno=' . $fetch['ra_refferelid'] . '&pid='.$fetch["c_rfid"].'&coid='.$fetch["c_userid"].'&nhsno='.$fetch["c_nhsno"].'" class="btn btn-sm btn-info">Open</a>
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
		    $date =date_create($fe['ra_date']);
$da = date_format($date,"d-m-Y");
			if($fe['reciever'] != $senderid)
			{
			echo' <div class="card p-2 col-md-7 float-right "
			style="background-color: skyblue;text-align: right;color:white;border-radius:15px;"
			>
			<small><b>'.$da.' Sent By '.$dataid['ur_fname']." ".$dataid['ur_sname'].' ('.$dataid["title"].') (Referring Clinician)</b></small>
			<spane>'.$fe['ra_message'].'</spane>';
			if($fe['ra_attach'] != null)
			{

			echo'<a href="assets/uploads/'.$fe['ra_attach'].'" class="btn btn-white btn-sm col-md-5 p-0" download><i class="icon ni ni-arrow-down-round"></i>'.$fe['ra_attach'].'</a>';
			}
			echo'</div>

			';

			
			
			}
			else if($fe['reciever'] == $senderid)
			{
				$sid = $fe['ra_sender_id'];
				$idq1 = mysqli_query($con, "SELECT * FROM `tbl_ruser` WHERE `ur_id` = '$sid'");
			$dataid1 = mysqli_fetch_assoc($idq1);
			$date =date_create($fe['ra_date']);
$da = date_format($date,"d-m-Y");
				echo' <div class="card p-2 float-left col-md-7"
			style="background-color: #58b666;text-align: left;color:white;border-radius:15px;"
			>
			<small><b>'.$da.' Sent By '.$dataid1['ur_fname']." ".$dataid1['ur_sname'].' ('.$dataid1["title"].') (Service Provider Clinician)</b></small>
			<span>'.$fe['ra_message'].'</span>
			<br>
			</div>
			
			';
			if($fe['ra_attach'] != null)
			{

			echo'<a href="assets/uploads/'.$fe['ra_attach'].'" class="btn btn-info btn-sm col-md-5 p-0" download><i class="icon ni ni-arrow-down-round"></i>'.$fe['ra_attach'].'</a>';
			}
			echo'</div>

			';
			
			}
		}
	
}

//for patient fetch
if(isset($_POST['searchpatienta']))
{
	$em = $_POST['em'];
	$nm = $_POST['nm'];
	$date=date_create($_POST['dob']);
	$dob = date_format($date,"Y-m-d");

$assa = mysqli_query($con,"SELECT * FROM `tbl_patients` where pt_name ='$nm' and pt_dob='$dob' and pt_surname='$em'");
$query1 = mysqli_query($con,"SELECT * FROM `tbl_patients` where pt_name ='$nm' and pt_dob='$dob' and pt_surname='$em'");
$fetch1 = mysqli_fetch_array($query1);
	if(mysqli_num_rows($assa)>0)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<hr>
			<h5>Patient List</h5>
				<input type="text" value="'.$fetch1["pt_age"].'" hidden id="pt_age">
	<input type="text" value="'.$fetch1["pt_title"].'" hidden id="pt_title">
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
						<th class="nk-tb-col"><span>View Details</span></th>
						<th class="nk-tb-col"><span>Edit</span></th>
					
					
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
	$date=date_create($fetch['pt_dob']);
	$dob = date_format($date,"d-m-Y");
		$dob2 = date_format($date,"Y-m-d");
    
echo'   <tr class="nk-tb-item">
	<td class="nk-tb-col nk-tb-col-check">
		<div class="custom-control custom-control-sm custom-radio notext">
			<input type="radio" class="custom-control-input gg" name="check" value="'.$id.'" id="check'.$id.'" onclick="kk(\''.$fetch['pt_title'].'\')">
			<label class="custom-control-label" for="check'.$id.'" ></label>
		</div>
	</td>
	<td class="nk-tb-col tb-col-sm">
		<span class="tb-product">
			
			<span class="title">'.$name." ".$fetch["pt_surname"].'</span>
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
		<td class="nk-tb-col">
		<a class="tb-lead" style="cursor: pointer;" class="btn btn-info btn-sm" onclick="fetchpatientdetails(\''.$fetch["pt_title"].'\',\''.$name." ".$fetch["pt_surname"].'\',\''.$fetch["pt_email"].'\',\''.$nh.'\',\''.$dob.'\',\''.$fetch["pt_houseno"].'\',\''.$sname.'\',\''.$fetch["pt_country"].'\',\''.$fetch["pt_city"].'\',\''.$fetch["pt_postcode"].'\',\''.$fetch["pt_telno"].'\',\''.$fetch["pt_mobno"].'\')">View Details</a>
	</td>
		</td>
		<td class="nk-tb-col">
		<a class="tb-lead" style="cursor: pointer;" class="btn btn-success btn-sm" onclick="fetchpatientedit('.$id.',\''.$fetch["pt_title"].'\',\''.$name.'\',\''.$fetch["pt_surname"].'\',\''.$fetch["pt_email"].'\',\''.$nh.'\',\''.$dob2.'\',\''.$fetch["pt_houseno"].'\',\''.$sname.'\',\''.$fetch["pt_country"].'\',\''.$fetch["pt_city"].'\',\''.$fetch["pt_postcode"].'\',\''.$fetch["pt_telno"].'\',\''.$fetch["pt_mobno"].'\')">Edit</a>
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
		echo"There is no patient matching criteria";
	}
}

if(isset($_POST['fetchconsultant']))
{
			$orgid = $_POST['org'];
									 $q = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_role_id = '3' and ur_orgtype = '$orgid'");
									 if(mysqli_num_rows($q)>0)
									 {
									     echo '<option value="">-- Select --</option>';
										 while($fe = mysqli_fetch_array($q))
										 {
									 echo'
								 <option value="'.$fe['ur_id'].'">'.$fe['ur_fname'].'</option>';
										  
										 }
									 }
										
									}
									
if(isset($_POST["fetchspelly"])){
    $val=$_POST["val"];
    $query = mysqli_query($con,"SELECT * FROM `ser_specialty_add`,services where services.service_speciality =ser_specialty_add.spec_id and FIND_IN_SET('$val',services.service_r_t_support) GROUP BY ser_specialty_add.spec_name");
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

if(isset($_POST["fetorg"])){
    $val=$_POST["val"];
     $query = mysqli_query($con,"SELECT * FROM `orginzation` where orid ='$val'");
     $fetch = mysqli_fetch_array($query);
     $orgname = $fetch['or_name'];
     
     $query1 = mysqli_query($con,"SELECT * FROM `tbl_ruser` where ur_orgname ='$orgname'");
     $fetch1 = mysqli_fetch_array($query);

								$num = mysqli_num_rows($query1);
								if($num>0)
								{
								    ?>
									<option value="">-Select-</option>
								    <?php
									while($fe = mysqli_fetch_array($query))
									{
								?>
										<option value="<?=$fe['ur_id']?>"><?=$fe['ur_fname']?></option>
										<?php
											}
								}
}


//for insert appointment
if(isset($_POST['addapointment']))
{
	extract($_POST);
	$sql = mysqli_query($con,"INSERT INTO `tbl_serviceappointment`(`sp_ubrn`, `sp_patientid`, `sp_serviceid`, `sp_iwt`,`sp_refferalid`) VALUES ('$ubrn','$check','$checkw','$iwt','$refferalid')");
$dd=mysqli_insert_id($con);
	$sql2 = mysqli_query($con,"SELECT * FROM tbl_patients WHERE pt_id = '$check'");
	$ar = mysqli_fetch_array($sql2);
	$email1 = $ar['pt_email'];
	if($sql)
	{
		$to      = $email1;
	$subject = 'Appoiontment';
	$message = '<html><body>';
	$message .= '<h1>You Have Recieved An Appointment!</h1>';
	$message .= '<p>Check your account and book appointment<p>';
	$message .= '</body></html>';
	$headers = 'From: info@deevloopers.com' . "\r\n" .
		'Reply-To: info@deevloopers.com' . "\r\n" .
		"MIME-Version: 1.0\r\n".
		"Content-Type: text/html; charset=ISO-8859-1\r\n";
		'X-Mailer: PHP/' . phpversion();
	
	mail($to, $subject, $message, $headers);

		echo json_encode(array("res"=>"success","c_id"=>$dd));
	}
	else
	{
		echo json_encode(array("res"=>"Error"));
	}
}
if(isset($_POST["insdf"])){
	extract($_POST);
	$q=mysqli_query($con,"UPDATE `tbl_serviceappointment` SET `filename`='$paname',`description`='$desc' WHERE `sp_id`='$id'");
	if($q >0){
		echo "1";
	}else{
	echo "0";
	}
}


//fetch Consultant data
if(isset($_POST['gpfetchupdate']))
{
$e=	$_SESSION['gprefferer'];
$query = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE ur_email = '$e'");
if($query)
{
while($fetch = mysqli_fetch_array($query))
{
	$id = $fetch['ur_id'];
	$name = $fetch['ur_fname'];
	$address = $fetch['ur_address'];
	$city = $fetch['ur_city'];
    $postcode = $fetch['ur_postcode'];
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

				<div class="data-item" onClick="cupdmodal('."'$id'".','."'$name'".','."'$city'".','."'$address'".','."'$postcode'".')">
					<div class="data-col">
						<span class="data-label">Full Name</span>
						<span class="data-value">'.$fetch['ur_fname'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
				</div><!-- data-item -->
				<div class="data-item" onClick="cupdmodal('."'$id'".','."'$name'".','."'$city'".','."'$address'".','."'$postcode'".')">
					<div class="data-col">
						<span class="data-label">Display Name</span>
						<span class="data-value">'.$fetch['ur_fname'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
				</div><!-- data-item -->
				<div class="data-item">
					<div class="data-col">
						<span class="data-label">Email</span>
						<span class="data-value">'.$fetch['ur_email'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
				</div><!-- data-item -->
				<div class="data-item" onClick="cupdmodal('."'$id'".','."'$name'".','."'$city'".','."'$address'".','."'$postcode'".')">
					<div class="data-col">
						<span class="data-label">City</span>
						<span class="data-value text-soft">'.$fetch['ur_city'].'</span>
					</div>
					<div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
				</div><!-- data-item -->
				<div class="data-item" onClick="cupdmodal('."'$id'".','."'$name'".','."'$city'".','."'$address'".','."'$postcode'".')">
					<div class="data-col">
						<span class="data-label">Address</span>
						<span class="data-value">'.$fetch['ur_address'].'</span>
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

//for profile update
if(isset($_POST['updategp']))
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$postcode = $_POST['postcode'];
		$select = mysqli_query($con,"SELECT * FROM `tbl_ruser` WHERE `ur_id`='$id'");
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
		$query = mysqli_query($con,"UPDATE `tbl_ruser` SET `ur_fname`='$name',`ur_city`='$city',`ur_postcode`='$postcode',`image` = '$file' WHERE `ur_id` = '$id'");
		
		if($query)
		{
		
			echo "Success";
			
		}
		else
		{
			echo("Error");
		}
	}

if(isset($_POST['updategpaddress']))
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
		$query = mysqli_query($con,"UPDATE `tbl_ruser` SET `ur_address` = '$address' WHERE `ur_id` = '$id'");
		
		if($query)
		{
		
			echo "Success";
			
		}
		else
		{
			echo("Error");
		}
	}
?>