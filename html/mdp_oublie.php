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
    <form method=Post action="recuperation.php" autocomplete=ON>
        <p> Email de récupération :
            <input type="text" name="recup" value=""/>
        </p>
        <p>
		    <input type="submit" value="Envoyer">
		</p>
	</form>
    <?php /*
	    try{
            $db = mysqli_connect("localhost", "root", "root", "projet_s6_indice_de_vie");
            echo "Connection réussie <br/>";
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage().'<br/>');
        }
        
        $sql="SELECT ";
        
        if (mysqli_query($db,$sql)) {
            echo "Mot de passe récupérer ! <br/>";
        } else {
            echo "Error: " . $sql . "<br/>" . mysqli_error($bdd);
        }*/
	?>
</body>
</html>
