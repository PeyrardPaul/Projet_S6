<?php
	include 'session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$dep = $_POST['contact'];
        $pseudo = $_POST['pseudo'];

		$conn = getBD();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE adresse_email=:email");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Email déjà pris';
		}
		else{
			$password =  $_POST['password'];
			//$filename = $_FILES['photo']['name'];
			//$now = date('Y-m-d');
			// if(!empty($filename)){
			// 	move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
			// }
			try{
				$stmt = $conn->prepare("INSERT INTO users (code_dep, nom, prenom, pseudo, password, adresse_email, adresse, type, password_reset) VALUES (:code_dep, :firstname, :lastname, :pseudo, :password, :email, :address, :type, :reset)");
				$stmt->execute(['code_dep'=>$dep, , 'firstname'=>$firstname, 'lastname'=>$lastname, 'pseudo'=>$pseudo, 'password'=>$password, 'email'=>$email, 'address'=>$address, 'type'=>0, 'reset'=>NULL]);
				$_SESSION['success'] = 'Utilisateur ajouté';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$stmt->closeCursor();
	}
	else{
		$_SESSION['error'] = 'Remplir le formulaire en premier';
	}

	header('location: users.php');

?>