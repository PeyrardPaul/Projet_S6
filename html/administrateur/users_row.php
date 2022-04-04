<?php 
	include 'session.php';

	if(isset($_POST['user_id'])){
		$id = $_POST['user_id'];
		
		$conn = getBD();

		$stmt = $conn->prepare("SELECT * FROM users WHERE user_id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
        $stmt->closeCursor();

		echo json_encode($row);
	}
?>