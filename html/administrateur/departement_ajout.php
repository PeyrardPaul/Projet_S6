
<?php
	include 'session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];

		$conn = getBD();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM departement WHERE Nom=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Département déja existant';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO departement (Nom) VALUES (:name)");
				$stmt->execute(['name'=>$name]);
				$_SESSION['success'] = 'Nouveau département ajouté';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$stmt->closeCursor();
	}
	else{
		echo "erreur";
	}

	header('location: departement.php');

?>