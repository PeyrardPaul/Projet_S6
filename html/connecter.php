<?php
	include 'session.php';
 	$bdd = getBD(); 
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="../Styles/style.css" type="text/css" media="screen"/>
		<title>N-Maps</title>
	</head>
	<body>
	<div class="bandeau"> <!--ici le bandeau haut de page -->
        <img id="logo" src="../images/N-Maps.png" alt="images logo" >
        <h1><a href="index.php">N-MAPS</a></h1>
        <ul class="menu">
		<?php
            // si l'utilisateur n'est pas connecté 
            if(!isset($_SESSION['user'])) {
                echo'<li><a href="index.php">Accueil</a></li>';
                echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="connexion.php">Connexion </a></li>';
            } else if(isset($_SESSION['user'])) {
                // si l'utilisateur est connecté 
                echo'<li><a href="index.php">Accueil</a></li>';
                echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="recherche_avancee.php">Recherche avancée</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$_SESSION['user'][4]."</li>";
            }
        ?>
        </ul>
    </div>
    <?php
	if(isset($_POST['login'])){	
		$pseudo = $_POST['pseudo'];
		$password = $_POST['password'];
		$rep = $bdd -> query("select * from users where pseudo ='{$pseudo}' and password ='{$password}'");			//echo("<meta http-equiv='refresh' content='1; url=http://localhost/PEYRARD/index.php '>");
		while ($mat = $rep->fetch()) {
			$_SESSION['user']=array($mat['user_id'],$mat['code_dep'],$mat['nom'],$mat['prenom'],$mat['pseudo'],$mat['password'],$mat['adresse_email'],$mat['adresse'],$mat['type'],$mat['password_reset']);
		}
	}
			/*try{
			$stmt = $bdd->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE pseudo = :pseudo");
			$stmt->execute(['pseudo'=>$pseudo]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				if(password_verify($password, $row['password'])){
					if($row['type']==1){
						$_SESSION['admin'] = $row['user_id'];
					} else {
						$_SESSION['user'] = $row['user_id'];
					}
				} else{
					$_SESSION['error'] = 'Mot de passe incorrect';
				}
			} else{
			$_SESSION['error'] = 'pseudo non trouvé';
			}
		} catch(PDOException $e){
			echo "Problème de connection: " . $e->getMessage();
		}
	} else{
		$_SESSION['error'] = 'erreur';
	}
	$stmt-> closeCursor();
	header('location: connexion.php');
	*/
	?>	
	</body>


	<footer>
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>  
        -   <a href="commentaire.php"> Espace commentaires</a>  
        </p> 
    </footer>
	
</html>