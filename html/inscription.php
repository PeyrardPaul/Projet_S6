<?php
	//include '../../bd.php';
	include 'session.php';
	//$bdd = getBD();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
    <title> Inscription </title>
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
<div>
<form method="post" action="enregistrement.php" autocomplete="ON">

<p><strong>Nom :</strong>
    <input type="text"  name="n" required
     maxlength="20" size="10"
    placeholder="Nom" style="margin-bottom:20px;" />
</p>
   
<p><strong>Prénom :</strong>
    <input type="text"  name="p" required
     maxlength="50" size="10"
    placeholder="Prénom" style="margin-bottom:20px;" />
</p>
    
<p><strong>Pseudo :</strong>
    <input type="text"  name="psd" required
     maxlength="50" size="10"
    placeholder="Pseudo" style="margin-bottom:20px;" />
</p>
    
<p><strong>Département :</strong>
    <input type="text" name="dep" required
     maxlength="2" size="10"
    placeholder="Département Ex: 34" style="margin-bottom:20px;" />
</p>
    
<p><strong>Adresse email :</strong>
    <input type="text"  name="mail" required
     maxlength="50" size="10"
    placeholder="Adresse mail" style="margin-bottom:20px;" />
</p>
   
<p><strong>Adresse :</strong>
    <input type="text"  name="adr" required
     maxlength="50" size="10"
    placeholder="Adresse" style="margin-bottom:20px;" />
</p>
    
<p><strong>Mot de passe :</strong>
    <input type="password"  name="mdp1" required
    minlength="4" maxlength="20" size="10"
    placeholder="Mot de passe" style="margin-bottom:20px;"/>
</p>
    
<p><strong>Validez le Mot de passe :</strong>
    <input type="password"  name="mdp2" required
    minlength="4" maxlength="20" size="10"  placeholder="Répétez le mot de passe" style="margin-bottom:20px;"/>
</p>

<p>
    <div style="margin-left: 150px;">
		<input type="submit" value="Envoyer" />
    </div>
</p>

</form>
</div>
</body>
</html>