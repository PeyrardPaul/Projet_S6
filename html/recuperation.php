<?php
	include '../../bd.php';
	session_start();
	// $bdd = getBD();

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
	    $rep = $bdd -> query("select password from users where adresse_email ='{$recup}'");			//echo("<meta http-equiv='refresh' content='1; url=http://localhost/PEYRARD/index.php '>");
        while ($mat = $rep->fetch()) {
            if ($mat['adresse_email']!="") {
                echo "Mot de passe= ".$mat['adresse_email']."<br/>";
            }
            else {
                echo "L'adresse email ne correspond à aucun compte !";
            }
        }
	?>
</body>
</html>
