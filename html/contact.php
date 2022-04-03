<?php
	include 'session.php';
	$bdd = getBD();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
    <title> Nous contacter </title>
</head>

<body>
	<div class="bandeau"> <!--ici le bandeau haut de page -->
        <img id="logo" src="../images/N-Maps.png" alt="images logo" >
        <h1><a href="index.php">N-MAPS</a></h1>
        <ul class="menu">
		<?php
            // si l'utilisateur n'est pas connecté 
            if(!isset($_SESSION['user'])) {
                echo('<li><a href="index.php"> Accueil </a></li>');
                //echo'<li><a href="recherche_simple.php"> Recherche simple </a></li>';
                echo'<li><a href="connexion.php"> Connexion </a></li>';
            } else if(isset($_SESSION['user'])) {
                // si l'utilisateur est connecté 
                echo'<li><a href="index.php">Accueil</a></li>';
                //echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="recherche_avancee.php">Recherche avancée</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$user['pseudo']."</li>";
            }
        ?>
        </ul>
    </div>

	<div> <!--ici la grande div qui a le contenu de la page -->
	<form method="post" class="formulaire" action="message.php">
	<div class="marg">
	<!--<p> <strong> Nom : </strong>
		<input style="margin-bottom:15px;" type="text" id="user" value="" />
	</p>-->

	<p> <strong> Email : </strong>
		<input type="text" name="ma"/>
	</p>

	<br/>
	<!--<p> <strong> Sexe : </strong>
		<input type="radio" id="H" name="H" style="margin-top:15px;" value="Homme" />
		<label style="margin-left:-60px;" for="H"> Homme </label> <br/>
		
		<input type="radio" id="F" name="F" style="margin-left:0px;" value="Femme" />
		<label style="margin-left:-60px; margin-bottom:15px;" for="F"> Femme </label>
	</p>
	<br/>-->
	<p> <strong>Motif : </strong></p>
	<label class = "critcell" class = "critcell" for="aide"> Aide/Renseignements :</label>
    <input type="checkbox" id="aide" name="aide" value="Aide/Renseignements">
    <br>

	<label class = "critcell" class = "critcell" for="dem"> Demande d'inscription :</label>
    <input type="checkbox" id="dem" name="dem" value="Demande d'inscription"> 
    <br>

	<label class = "critcell" class = "critcell" for="pl"> Plainte :</label>
    <input type="checkbox" id="pl" name="pl" value="Plainte"> 
    <br>

	<p> <strong><label> Message</label> : </strong></p>
	<textarea name="mes" rows="5" cols="30">
	</textarea>
	
	<div style="margin-left: 150px;">
		<p> <input type="submit" value="Envoyer" /> </p>
		<!--<p> <input type="reset" value="Recommencer" /> </p>-->
	</div>

	</div>
	</form>
	</div>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<footer class="footer"> 
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>  
        </p> 
    </footer>
</body>
</html>