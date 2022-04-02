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
        <?php
            // si l'utilisateur n'est pas connecté 
            if(!isset($_SESSION['user'])) {
                echo'<li><a href="index.php">Accueil</a></li>';
                //echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="connexion.php">Connexion </a></li>';
            } else if(isset($_SESSION['user'])) {
                // si l'utilisateur est connecté 
                echo'<li><a href="index.php">Accueil</a></li>';
                //echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="recherche_avancee.php">Recherche avancée</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$_SESSION['user'][2]."</li>";
            }
        ?>
        </ul>
    </div>
<div>
<form method=Post action="enregistrement.php" autocomplete=ON>
<div class="marg">
<p><strong>Nom :</strong>
    <input type="text" id="name" name="n" required
     maxlength="20" size="10"
    placeholder="Nom" style="margin-bottom:20px;" value=<?php echo "'".$_GET['n']."'"?>>
</p>
    <br/>
<p><strong>Prénom :</strong>
    <input type="text" id="name" name="p" required
     maxlength="50" size="10"
    placeholder="Prénom" style="margin-bottom:20px;" value=<?php echo "'".$_GET['p']."'"?>>
</p>
    <br/>
<p><strong>Pseudo :</strong>
    <input type="text" id="name" name="psd" required
     maxlength="50" size="10"
    placeholder="Pseudo" style="margin-bottom:20px;" value=<?php echo "'".$_GET['psd']."'"?>>
</p>
    <br/>
<p><strong>Département :</strong>
    <input type="text" id="name" name="dep" required
     maxlength="2" size="10"
    placeholder="Département Ex: 34" style="margin-bottom:20px;" value=<?php echo "'".$_GET['dep']."'"?>>
</p>
    <br/>
<p><strong>Adresse email :</strong>
    <input type="text" id="name" name="mail" required
     maxlength="50" size="10"
    placeholder="Adresse mail" style="margin-bottom:20px;" value=<?php echo "'".$_GET['mail']."'"?>>
</p>
    <br/>
<p><strong>Adresse :</strong>
    <input type="text" id="name" name="adr" required
     maxlength="50" size="10"
    placeholder="Adresse" style="margin-bottom:20px;" value=<?php echo "'".$_GET['adr']."'"?>>
</p>
    <br/>
<p><strong>Mot de passe :</strong>
    <input type="password" id="name" name="mdp1" required
    minlength="4" maxlength="20" size="10"
    placeholder="Mot de passe" style="margin-bottom:20px;">
</p>
    <br/>
<p><strong>Validez le Mot de passe :</strong>
    <input type="password" id="name" name="mdp2" required
    minlength="4" maxlength="20" size="10"  placeholder="Répétez le mot de passe" style="margin-bottom:20px;">
</p>
<br/>
</div>
<p><div style="margin-left: 150px;">
		<input type="submit" value="Envoyer" />
</div></p>
</form>
</div>

    <footer>
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>   
        </p> 
    </footer>

</body>
</html>