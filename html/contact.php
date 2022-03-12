<?php
	include '../../bd.php';
	session_start();
	$bdd = getBD();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
    <title>Qui sommes-nous ?</title>
</head>
<body>
<div class="bandeau"> <!--ici le bandeau haut de page -->
        <img id="logo" src="../images/N-Maps.png" alt="images logo" >
        <h1><a href="index.php">N-MAPS</a></h1>
        <ul class="menu">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="qui_sommes_nous.php">Qui sommes nous ?</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="departement.php">Département</a></li>
			<li><?php
		                if(isset($_SESSION['user'])) {
			                echo "<li><a href='deconnexion.php'>Se déconnecter</a></li>";
							echo "<li>Bonjour ".$_SESSION['user'][4]."</li>";

		                }
		                else {
			                echo "<li><a href='connexion.php'>Se connecter </a></li>";
		                }?></li>
        </ul>
    </div>

 <div> <!--ici la grande div qui a le contenu de la page -->
	<form method="Post" class="formulaire" action="">

	<p><strong>Nom :</strong>
		<input type="text" id="user" value="" />
	</p>

	<p><strong>Email :</strong>
			<input type="text" value="" />
	</p>
	<br/>
	<p><strong>Sexe : </strong>
		<p style="padding-top:-20px;">
			Homme<input type="radio" name="H" style="margin-left:-70px;"/>
			Femme<input type="radio" name="F" style="margin-left:-70px;"/>
		</p>
	</p>
	<br/>
	<p><strong>Motif :</strong>
		<p>
			Aide/Renseignements<input style="margin-left:-80px;" type="checkbox" name="motif" />
			Demande d'inscription<input style="margin-left:-80px;" type="checkbox" name="motif" class="pq" />
			Plainte<input style="margin-left:-80px;" type="checkbox" name="motif" class="pq" />
		</p>
	</p>
	<br/>
	<p><strong>Message :</strong>
		<p><textarea rows="5" cols="25"></textarea></p>
	</p>
	<p><div style="margin-left: 150px;">
		<input type="submit" value="Envoyer" />
		<input type="reset" value="Recommencer" />
	</div>
	</form>
</div>
	

</body>
</html>