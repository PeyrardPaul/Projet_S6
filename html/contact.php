
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

 <div> <!--ici la grande div qui a le contenu de la page -->
	<form class="formulaire" action="POST">

	<p><label for="user">Nom :</label>
	<input type="text" id="user" value="" /></p>

	<p><label for="email">Email :</label>
	<input type="text" value="" /></p>

	<p><label for="sexe">Sexe :</label>
	Homme :<input type="radio" name="H" />
	Femme :<input type="radio" name="F" /></p>

	<p><label for="motif">Motif :</label>
	<input type="checkbox" name="motif" /> Aide/Renseignements
	<input type="checkbox" name="motif" class="pq" /> Demande d'inscription
	<input type="checkbox" name="motif" class="pq" /> Plainte</p>


	<p><label for="message">Message :</label>
	<textarea rows="5" cols="25"></textarea></p>

	<p><div style="margin-left: 150px;">
		<input type="submit" value="Envoyer" />
		<input type="reset" value="Recommencer" />
	</div></p>
	</form>
</div>
	

</body>
</html>