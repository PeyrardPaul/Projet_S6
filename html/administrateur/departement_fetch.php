<?php
	include 'session.php';

	$output = '';

	$conn = getBD();

	$stmt = $conn->prepare("SELECT * FROM departement");
	$stmt->execute();

	foreach($stmt as $row){
		$output .= "
			<option value='".$row['Département']."' class='append_items'>".$row['Nom']."</option>
		";
	}

	
	echo json_encode($output);

?>