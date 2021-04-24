<?php
include_once('../database/db.php');
if(isset($_POST['patientfetch']))
{
    $id = $_POST['createid'];
    $sql = mysqli_query($con,"SELECT * FROM admin WHERE id = '$id'");
    $fet = mysqli_fetch_array($sql);
    $name = $fet['name'];
	$nsh = $_POST['nsh'];
$query = mysqli_query($con,"SELECT * FROM `tbl_patients` WHERE pt_nhsno = '$nsh' and pt_create = '$name'");
	
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
					<th class="nk-tb-col tb-col-sm"><span>Name</span></th>
				
					<th class="nk-tb-col"><span>Mobile No</span></th>
					<th class="nk-tb-col"><span>NHS no</span></th>
					<th class="nk-tb-col"><span>Street Name</span></th>
					<th class="nk-tb-col"><span>Date of Birth</span></th>
					<th class="nk-tb-col"><span>View Details</span></th>
					
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
	$date1 = date_create($fetch['pt_dob']);
	$dob1 = date_format($date1,"d-m-Y");

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
		<span class="tb-lead">'.$dob1.'</span>
	</td>
		<td class="nk-tb-col">
		<a class="tb-lead" style="cursor: pointer;" onclick="fetchpatientdetails(\''.$fetch["pt_title"].'\',\''.$name." ".$fetch["pt_surname"].'\',\''.$fetch["pt_email"].'\',\''.$nh.'\',\''.$dob1.'\',\''.$fetch["pt_houseno"].'\',\''.$sname.'\',\''.$fetch["pt_country"].'\',\''.$fetch["pt_city"].'\',\''.$fetch["pt_postcode"].'\',\''.$fetch["pt_telno"].'\',\''.$fetch["pt_mobno"].'\')">View Details</a>
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
		echo"There is no patient matching criteria";
	}
}


if(isset($_POST['patientfetch2']))
{
    $query = mysqli_query($con,"SELECT * FROM `tbl_patients`");
    if(mysqli_num_rows($query) > 0)
    {
        echo"already";
    }
    else 
    {
        echo"not available";
    }
}

if(isset($_POST['fetchlocationdata']))
{
    $aid =$_SESSION["a_id"];
$qiu=mysqli_query($con,"SELECT * FROM `admin`,orginzation where admin.organization = orginzation.orid and admin.id='$aid'");
$fetchsa=mysqli_fetch_array($qiu);
    $org = $fetchsa['organization'];
$query = mysqli_query($con,"SELECT * FROM `org_locations` where org_id = '$org'");
	
	if(mysqli_num_rows($query)>0)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
					<th class="nk-tb-col text-center"><span>Location Name</span></th>
					<th class="nk-tb-col tb-col-sm text-center"><span>Location First Line Address</span></th>
				
					<th class="nk-tb-col text-center"><span>Location Second Line Address</span></th>
					<th class="nk-tb-col text-center"><span>Location Postcode</span></th>
					<th class="nk-tb-col text-center"><span>Location City</span></th>
					<th class="nk-tb-col text-center"><span>Location Site Code</span></th>
				
				<th class="nk-tb-col text-center"><span>Actions</span></th>
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
		    $mid = $fetch['id'];
	$name = $fetch['org_location'];
	$address = $fetch['org_address'];
	$postcode = $fetch['org_postcode'];

	$loccity = $fetch['org_city'];
	$locsite = $fetch['org_sitecode'];
	$locname = $fetch['org_location_name'];
echo'   <tr class="nk-tb-item">
		<td class="nk-tb-col text-center">
		<span class="tb-lead">'.$locname.'</span>
	</td>
	<td class="nk-tb-col tb-col-sm text-center">

			<span class="tb-lead">'.$name.'</span>
	
	</td>
	<td class="nk-tb-col text-center">
		<span class="tb-lead">'.$address.'</span>
	</td>
	<td class="nk-tb-col text-center">
		<span class="tb-lead">'.$postcode.'</span>
	</td>
	<td class="nk-tb-col text-center">
		<span class="tb-lead">'.$loccity.'</span>
	</td>
	<td class="nk-tb-col text-center">
		<span class="tb-lead">'.$locsite.'</span>
	</td>

<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mx-auto">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal1('."'$mid'".','."'$name'".','."'$address'".','."'$postcode'".','."'$loccity'".','."'$locsite'".','."'$locname'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
					
							
							<li><a href="javascript:void(0)" onClick="confirm('."'$mid'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

						</ul>
					</div>
				</div>
			</li>
		</ul>
	</td>
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


if(isset($_POST['fetchnames']))
{
    $aid =$_SESSION["a_id"];
$qiu=mysqli_query($con,"SELECT * FROM `admin`,orginzation where admin.organization = orginzation.orid and admin.id='$aid'");
$fetchsa=mysqli_fetch_array($qiu);
    $org = $fetchsa['organization'];
$query = mysqli_query($con,"SELECT * FROM `service_name` where org_id = '$org'");
	
	if(mysqli_num_rows($query)>0)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
					<th class="nk-tb-col text-center"><span>Service Name</span></th>
					
				
				<th class="nk-tb-col text-center"><span>Actions</span></th>
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
		    $mid = $fetch['s_id'];
	$name = $fetch['s_name'];
	

	
echo'   <tr class="nk-tb-item">
		<td class="nk-tb-col text-center">
		<span class="tb-lead">'.$name.'</span>
	</td>

<td class="nk-tb-col nk-tb-col-tools">
		<ul class="nk-tb-actions gx-1 my-n1">
			<li class="mx-auto">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
					<div class="dropdown-menu dropdown-menu-right">
						<ul class="link-list-opt no-bdr">
							<li><a href="javascript:void(0)" onClick="openmodal3('."'$mid'".','."'$name'".')"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
					
							
							<li><a href="javascript:void(0)" onClick="confirm('."'$mid'".')"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>

						</ul>
					</div>
				</div>
			</li>
		</ul>
	</td>
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



?>