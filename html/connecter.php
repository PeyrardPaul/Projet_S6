<?php require '../../bd.php'; ?>
<?php $bdd = getBD(); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen"/>
		<title>N-Maps</title>
	</head>
	<body>
    <?php
		$pseudo=$_POST['pseudo'];
		$mdp=$_POST['password'];
		
		if($pseudo=="" or $mdp=="") {
			echo "mail ou mot de passe vide";
			echo("<meta http-equiv='refresh' content='1; url=http://localhost/Projet_S6/html/connexion.php?pseudo=".$pseudo." '>");
		}
		else {
			$rep = $bdd -> query("select * from users where pseudo ='{$pseudo}' and password ='{$mdp}'");
			while ($mat = $rep->fetch()) {
				echo "user_id= ".$mat['user_id']."<br/>";
                echo "code_dep= ".$mat['code_dep']."<br/>";
				echo "nom= ".$mat['nom']."<br/>";
				echo "prenom= ".$mat['prenom']."<br/>";
                echo "pseudo= ".$mat['pseudo']."<br/>";
                echo "password= ".$mat['password']."<br/>";
				echo "adresse_email= ".$mat['adresse_email']."<br/>";
                echo "adresse= ".$mat['adresse']."<br/>";
                echo "photo= ".$mat['photo']."<br/>";
				echo "type= ".$mat['type']."<br/>";
				echo "code_activation= ".$mat['code_activation']."<br/>";
				echo "code_reset= ".$mat['code_reset']."<br/>";
				$_SESSION['user']=array($mat['user_id'],$mat['code_dep'],$mat['nom'],$mat['prenom'],$mat['pseudo'],$mat['adresse_email'],$mat['adresse'],$mat['photo'],$mat['type'],$mat['code_activation'],$mat['code_reset']);
            }
			echo("<meta http-equiv='refresh' content='1; url=http://localhost/Projet_S6/html/index.php '>");
		}
		$rep ->closeCursor();
		?>	
	</body>
</html>