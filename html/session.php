<?php
	
	session_start();

	include '../../bd.php';
	if(isset($_SESSION['admin'])){
		header('location: administrateur/home.php');
	}

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();
		}
		catch(PDOException $e){
			echo "Problème de connexion";
		}

		$pdo->close();
	}
?>