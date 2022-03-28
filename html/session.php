<?php
	
	session_start();

	include '../../bd.php';
	if(isset($_SESSION['admin'])){
		header('location: administrateur/home.php');
	}

	if(isset($_SESSION['user'])){
		$bdd = getBD();

		try{
			$stmt = $bdd->prepare("SELECT * FROM users WHERE user_id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();

			//$_SESSION['prenom']= $user['prenom'];
		}
		catch(PDOException $e){
			echo "Problème de connexion";
		}

		
	}
?>