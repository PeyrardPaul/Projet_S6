<?php
	include 'session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['user_id'];
		
		$conn = getBD();

		try{
			$stmt = $conn->prepare("DELETE FROM users WHERE user_id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Utilisateur supprimé avec succès';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$stmt->closeCursor();
	}
	else{
		$_SESSION['error'] = 'Choisir un utilisateur à supprimer en premier';
	}

	header('location: users.php');
	
?>