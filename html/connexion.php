

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
<title>N-Maps</title>
<style>
</style>
</head>

<?php include 'session.php'; ?>






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
			if(isset($_SESSION['user']))
			{
				header('location: index.php');
				echo "<li><a href='deconnexion.php'>Se déconnecter</a></li>";
					echo "<li>Bonjour ".$_SESSION['user'][4]."</li>";
			}
			else if(isset($_SESSION['admin']))
			{
				header('location: administrateur/home.php');
				echo "<li><a href='deconnexion.php'>Se déconnecter</a></li>";
					echo "<li>Bonjour ".$_SESSION['admin'][4]."</li>";
			}
			else
			 {
				echo "<li><a href='connexion.php'>Se connecter </a></li>";}
?>
	
				</li> 
        </ul>
    </div>

<body>
		<h2 style="text-align:center;margin-bottom:-150px;margin-top:100px;">SE CONNECTER ou<a class="retour"href="inscription.php" style="margin-left:auto;margin-right:auto;width:200px;">S'inscrire</a></h2>
	<div class="body"> <!--Pourquoi créer une classe body dans le body ?????? -->

		<form method="post" action="connecter.php" autocomplete="on">
			<div class="pseudo">
				<label style="" for="pseudo">Pseudo</label>:
				<input type="pseudo"  name="pseudo" value="" placeholder="Saisir pseudo" required/>
			</div>

			<div class="password">
				<label for="password" name="password">Mot de passe</label>:
				<input type="password" name="password" placeholder="Saisir password" required/> 
			</div>

			<p style="text-align:center;margin-top:15px;"><a id="bleu" href="mdp_oublie.php">Mot de passe oublié ?</a></p>

			<input type="submit" class="login" name="login" value="Me connecter"/>
			<br/>
		</form>
	</div>
	
</body>
</html>
