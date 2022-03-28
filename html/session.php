<?php
	session_start();
	include '../../bd.php';
	if(isset($_SESSION['admin'])){
		header('location: administrateur/home.php');
	}
	// si l'utilisateur est connecté 
	if(isset($_SESSION['user'])){
		// alors on se connecte à la base de données 
		$bdd = getBD();
		try{
			// par rapport à l'identifiant de l'utilisateur 
			$stmt = $bdd->prepare("SELECT * FROM users WHERE user_id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();
		} catch(PDOException $e){
			echo "Problème de connexion";
		}
	}
?>