<?php 
	include 'Connection.php';
	$output ='';
	$sql ="SELECT * FROM region where region_id='".$_POST['regionID']."' order by id";
	$result =mysqli_query($db,$sql);
	$output .='<option value="" disabled selected><-- Select Zone--></option>';
	while ($row=mysqli_fetch_array($result)) {
		$output .='<option value="'.$row["id"].'">'.$row["name"].'</option>';
		# code...
	}
	echo $output;
?>