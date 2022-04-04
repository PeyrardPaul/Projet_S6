<?php
	include 'session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['user_id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$dep = $_POST['contact'];
        $pseudo = $_POST['pseudo'];

		$conn = getBD();
		$stmt = $conn->prepare("SELECT * FROM users WHERE user_id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		if($password == $row['password'])
        {
			$password = $row['password'];
		}
		else{
			$password = $_POST['password'];
		}

		try{
			$stmt = $conn->prepare("UPDATE users SET code_dep=:dep, nom=:firstname, prenom=:lastname, pseudo=:pseudo, password=:password, adresse_email=:email, adresse=:address WHERE user_id=:id");
			$stmt->execute(['dep'=>$dep,'firstname'=>$firstname, 'lastname'=>$lastname, 'pseudo'=>$pseudo, 'password'=>$password, 'email'=>$email, 'address'=>$address, 'id'=>$id]);
			$_SESSION['success'] = 'Utilisateur modifié';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$stmt->closeCursor();
	}
	else{
		$_SESSION['error'] = 'Choisir un utilisateur en premier';
	}

	header('location: users.php');

?>