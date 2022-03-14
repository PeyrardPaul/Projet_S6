
<?php
	include 'session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM departement WHERE name=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Département déja existant';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO departement (nom) VALUES (:name)");
				$stmt->execute(['name'=>$name]);
				$_SESSION['success'] = 'Nouveau département ajouté';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		echo "erreur";
	}

	header('location: departement.php');

?>