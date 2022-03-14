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
<div>

<h1>
    Que souhaitez vous faire ?
</h1>
<p>
        <a style="color : black" href="comparaison_2dp.php">Comparer deux départements</a>
</p>
<p>
        <a style="color : black" href="comparaison_criteres.php">Comparer selon différents critères</a>
</p>

 <div> <!--dans cette grande div le contenu de la page -->
    <!-- Ici le contenu de la page -->

</div>
</body>