<?php 
	include 'session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = getBD();

		$stmt = $conn->prepare("SELECT * FROM departement WHERE Département=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
		
		echo json_encode($row);
	}
?>