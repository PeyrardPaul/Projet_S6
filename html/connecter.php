<?php
include 'session.php'; ?>
<?php $bdd = getBD(); ?>


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
            <li><a href="index.php">Accueil</a></li>
            <li><a href="qui_sommes_nous.php">Qui sommes nous ?</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="recherche_simple.php">Recherche simple</a></li>
            <li><a href="recherche_avancee.php">Recherche avancée</a></li>

			<li>
                <?php
		                if(isset($_SESSION['user'])) {

			                echo "<li><a href='deconnexion.php'>Se déconnecter</a></li>";
							echo "<li>Bonjour ".$_SESSION['user'][4]."</li>";

		                }
		                else {
			                echo "<li><a href='connexion.php'>Se connecter </a></li>";
		                }?></li>
        </ul>
    </div>
    <?php

if(isset($_POST['login'])){
		
	$pseudo = $_POST['pseudo'];
	$password = $_POST['password'];

	try{

		$stmt = $bdd->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE pseudo = :pseudo");
		$stmt->execute(['pseudo'=>$pseudo]);
		$row = $stmt->fetch();
		if($row['numrows'] > 0){
				if(password_verify($password, $row['password'])){
					if($row['type']==1){
						$_SESSION['admin'] = $row['user_id'];
						//header('location: administrateur/home.php');
					}
					else
					{
						$_SESSION['user'] = $row['user_id'];
					 //	header('location: index.php');
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
}

		// $pseudo=$_POST['pseudo'];
		// $mdp=$_POST['password'];
		
		// if($pseudo=="" or $mdp=="") {
		// 	echo "mail ou mot de passe vide";
		// 	echo("<meta http-equiv='refresh' content='1; url=connexion.php?pseudo=".$pseudo." '>");
		// }
		// else {
		// 	$rep = $bdd -> query("select * from users where pseudo ='{$pseudo}' and password ='{$mdp}'");
		// 	while ($mat = $rep->fetch()) {
		// 		echo "<h2>Connexion réussie, profitez au maximum de notre site maintenant !</h2>";
		// 		$_SESSION['user']=array($mat['user_id'],$mat['code_dep'],$mat['nom'],$mat['prenom'],$mat['pseudo'],$mat['adresse_email'],$mat['type'],$mat['code_activation'],$mat['code_reset']);
        //     }
		// 	echo("<meta http-equiv='refresh' content='1; url=index.php '>");
		// }
		$stmt-> closeCursor();
		header('location: connexion.php');
		?>	
	</body>
</html>