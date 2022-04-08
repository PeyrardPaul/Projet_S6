<!-- cette page recoit les infos de connexion.php et s'en sert pour connecter ou non l'utilisateur. -->

<?php
include 'session.php'; ?>
<?php ?>


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
                //echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="connexion.php">Connexion </a></li>';
            } else if(isset($_SESSION['user'])) {
                // si l'utilisateur est connecté 
				//header('location:index.php');
                echo'<li><a href="index.php">Accueil</a></li>';
                //echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="recherche_avancee.php">Comparer</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$user['pseudo']."</li>";
            }
        ?>
        </ul>
    </div>
    <?php

if(isset($_POST['login'])){
		
	$pseudo = $_POST['pseudo'];
	$password = $_POST['password'];
	$bdd = getBD();
	$boo=false;

	$rep = $bdd -> query("SELECT * FROM users WHERE pseudo ='{$pseudo}' and password ='{$password}'");
	while ($mat = $rep->fetch()) {
		$boo=true;
		echo "<h2>Connexion réussie, profitez au maximum de notre site maintenant !</h2>";
		if($mat['type']==1){
			$_SESSION['admin'] = $mat['user_id'];
			header('location: administrateur/home.php');
		}
		else
					{
		$_SESSION['user']=$mat['user_id'];}
    }
}
if ($boo==true) {
	echo("<meta http-equiv='refresh' content='1; url=index.php '>");
}
else {
	header('location: connexion.php?pseudo='.$pseudo.'');
}

//header('location: connexion.php');
$rep-> closeCursor();
	/*try{

		$stmt = $bdd->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE pseudo= :pseudo");
		$stmt->execute(['pseudo'=>$pseudo]);
		$row = $stmt->fetch();
		if($row['numrows'] > 0){
				if(password_verify($password, $row['password'])){
					if($row['type']==1){
						$_SESSION['admin'] = $row['user_id'];
						/////header('location: administrateur/home.php');
					}
					else
					{
						$_SESSION['user'] = $row['user_id'];
					 ////	header('location: index.php');
					}
				}
				else{
					$_SESSION['error'] = 'Mot de passe incorrect';
				}
		}
		else{
			$_SESSION['error'] = 'pseudo non trouvé';
		}
	}
	catch(PDOException $e){
		echo "Problème de connection: " . $e->getMessage();
	}

}
else{
	$_SESSION['error'] = 'erreur';
}*/
		?>	
	</body>
	<footer class="footer"><!--ici le pied de page -->
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>  
        </p> 
    </footer>
</html>