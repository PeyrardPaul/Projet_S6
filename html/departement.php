<?php
	include '../../bd.php';
	session_start();
	$bdd = getBD();
?>

<html lang="fr">
	<head>
    	<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
    	<title>Département</title>
	</head>

	<body>
		<div class="bandeau">
			<img id="logo" src="../images/N-Maps.png" alt="images logo" >
			<h1><a href="index.php">N-MAPS</a></h1>
			<ul class="menu">
				<li><a href="index.php">Accueil</a></li>
				<li><a href="qui_sommes_nous.php">Qui sommes nous ?</a></li>
				<li><a href="inscription.php">Inscription</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="departement.php">Département</a></li>
				<li><a href="connexion.php">Connexion</a></li>
			</ul>
		</div>

		<div> <p>
		M-MAPS vous permet de découvrir la France ! 
		Il vous suffit de choisir le mode de recherche que vous voulez. 
		La recherche par département vous permet de choisir un département et nous nous chargeons du reste pour vous donner le sinformations.
		Vous pouvez aussi comparer deux départements.
		</p> </div>
	</body>
</html>