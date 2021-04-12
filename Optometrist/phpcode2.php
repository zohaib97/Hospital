<?php
include_once('../database/db.php');
if(isset($_POST['patientfetch']))
{
	$nsh = $_POST['nsh'];
$query = mysqli_query($con,"SELECT * FROM `tbl_patients` WHERE pt_nhsno = '$nsh'");
	
	if(mysqli_num_rows($query)>0)
	{
		echo'<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
		<hr>
		<table class="nowrap nk-tb-list is-separate" data-auto-responsive="false" id="myTable">
			<thead>
				<tr class="nk-tb-item nk-tb-head">
				
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
	$dob2 = date_format($date,"Y-m-d");

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
		<span class="tb-lead">'.$dob.'</span>
	</td>
		<td class="nk-tb-col">
		<a class="tb-lead" style="cursor: pointer;" onclick="fetchpatientdetails(\''.$fetch["pt_title"].'\',\''.$name." ".$fetch["pt_surname"].'\',\''.$fetch["pt_email"].'\',\''.$nh.'\',\''.$dob.'\',\''.$fetch["pt_houseno"].'\',\''.$sname.'\',\''.$fetch["pt_country"].'\',\''.$fetch["pt_city"].'\',\''.$fetch["pt_postcode"].'\',\''.$fetch["pt_telno"].'\',\''.$fetch["pt_mobno"].'\')">View Details</a>
	</td>
		</td>
		<td class="nk-tb-col">
		<a class="tb-lead" style="cursor: pointer;" class="btn btn-success btn-sm" onclick="fetchpatientedit('.$id.',\''.$fetch["pt_title"].'\',\''.$name.'\',\''.$fetch["pt_surname"].'\',\''.$fetch["pt_email"].'\',\''.$nh.'\',\''.$dob2.'\',\''.$fetch["pt_houseno"].'\',\''.$sname.'\',\''.$fetch["pt_country"].'\',\''.$fetch["pt_city"].'\',\''.$fetch["pt_postcode"].'\',\''.$fetch["pt_telno"].'\',\''.$fetch["pt_mobno"].'\')">Edit</a>
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
?>