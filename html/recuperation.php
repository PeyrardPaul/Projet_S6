<?php
	include '../../bd.php';
	session_start();
	$bdd = getBD();

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
<title>Welcome</title>
<style>
    
</style>
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
    <?php 
        $recup=$_POST['recup'];
        $a=1;
	    $rep = $bdd -> query("select * from users where adresse_email ='{$recup}'");
        while ($mat = $rep->fetch()) {
            /*ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "projetpanms@gmail.com";
            $to = $recup;
            $subject = "Mail de récupération de votre mot de passe";
            $message = "Voici votre mot de passe :".$mat['password']."";
            $headers = "From: ".$from."";
            mail($to,$subject,$message, $headers);
            echo "<h2>L'email a été envoyé avec succès !</h2>";
            */
            echo "<h2>Voici votre mot de passe : ".$mat['password']."";
            $a+=1;
            echo "<br/>";
        }
        if ($a==1) {
            echo "<h2>L'adresse email saisie ne correspond à aucun compte !</h2>";
        }
	?>
</body>
</html>
