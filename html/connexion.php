<?php include 'session.php'; ?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
<title>N-Maps</title>
<style>
</style>
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
                // echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="connexion.php">Connexion </a></li>';
            } else if(isset($_SESSION['user'])) {
                // si l'utilisateur est connecté 
				header('location:index.php');
                echo'<li><a href="index.php">Accueil</a></li>';
                // echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="recherche_avancee.php">Recherche avancée</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$_SESSION['user'][2]."</li>";
            }
        ?>
    </ul>
</div>

	<h2 style="text-align:center;margin-bottom:-150px;margin-top:90px;"> Se connecter ou <a class="retour" href="inscription.php" style="margin-left:auto;margin-right:auto;width:200px;">s'inscrire</a></h2>

	<form method="post" action="connecter.php" autocomplete="on">
		<div class="pseudo">
			<label style="" for="pseudo"> Pseudo </label> :
			<input type="pseudo"  name="pseudo" value=<?php echo "'".$_GET['pseudo']."'"?> placeholder="Saisir pseudo" required/>
		</div>

		<div class="password">
			<label for="password" name="password"> Mot de passe </label> :
			<input type="password" name="password" placeholder="Saisir password" required/> 
		</div>

		<p style="text-align:center;margin-top:15px;"> 
			<a id="bleu" href="mdp_oublie.php"> 
				Mot de passe oublié ? 
			</a>
		</p>

		<input type="submit" class="login" name="login" value="Me connecter"/>
	</form>



	<footer>
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>  
        </p> 
    </footer>

</body>
</html>
