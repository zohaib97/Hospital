<?php
include_once('../database/db.php');
if(isset($_POST['ssssa']))
{
$query = mysqli_query($con,"SELECT * FROM `orginzation` ");
	
	if(mysqli_num_rows($query)>0)
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
				
					<th class="nk-tb-col"><span>Code</span></th>
					<th class="nk-tb-col"><span>Address</span></th>
					
					
					
				</tr><!-- .nk-tb-item -->
			</thead>
			 <tbody id="">';
		while($fetch = mysqli_fetch_array($query))
		{
	$name = $fetch['or_name'];
	$id = $fetch['orid'];
	$nh = $fetch['or_code'];
	$mobno = $fetch['or_address'];
	

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
	<span class="tb-lead"><a class="btn btn-info btn-sm text-white" onclick="jjsj('.$id.')">Book</a></span>
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
if(isset($_POST["insbtn"])){
$id=$_POST["id"];
$nhsno=$_POST["nhs"];
$q=mysqli_query($con,"INSERT INTO `tbl_app`(`nhsno`, `orid`) VALUES ('$nhsno','$id')");
if($q >0){
	echo "1";
}else{
	echo "0";
}

}
?>