<?php
	include 'session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];

		try{
			$stmt = $conn->prepare("UPDATE departement SET Nom=:name WHERE Département=:id");
			$stmt->execute(['name'=>$name, 'id'=>$id]);
			$_SESSION['success'] = 'Département mis à jour';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
	
	}
	else{
		echo "erreur";
	}

	header('location: departement.php');

?>