<?php
	include 'session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = getBD();

		try{
			$stmt = $conn->prepare("DELETE FROM departement WHERE Département=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Département supprimé';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		
	}
	else{
		$_SESSION['error'] = "Sélectionner d'abord un département à supprimer";
	}

	header('location: departement.php');
	
?>