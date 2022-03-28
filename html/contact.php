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
                echo'<li><a href="recherche_simple.php"> Recherche simple </a></li>';
                echo'<li><a href="connexion.php"> Connexion </a></li>';
            } else if(isset($_SESSION['user'])) {
                // si l'utilisateur est connecté 
                echo'<li><a href="index.php">Accueil</a></li>';
                echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="recherche_avancee.php">Recherche avancée</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$_SESSION['user'][4]."</li>";
            }
        ?>
        </ul>
    </div>

	<div> <!--ici la grande div qui a le contenu de la page -->
	<form method="post" class="formulaire" action="">
	<div class="marg">
	<p> <strong> Nom : </strong>
		<input style="margin-bottom:15px;" type="text" id="user" value="" />
	</p>

	<p> <strong> Email : </strong>
		<input type="text" value="" />
	</p>

	<br/>
	<p> <strong> Sexe : </strong>
		<input type="radio" id="H" name="H" style="margin-top:15px;" value="Homme" />
		<label style="margin-left:-60px;" for="H"> Homme </label> <br/>
		
		<input type="radio" id="F" name="F" style="margin-left:0px;" value="Femme" />
		<label style="margin-left:-60px; margin-bottom:15px;" for="F"> Femme </label>
	</p>
	<br/>
	<p> <strong>Motif : </strong>
			Aide/Renseignements <input style="margin-left:-80px;" type="checkbox" name="motif" />
			Demande d'inscription <input style="margin-left:-80px;" type="checkbox" name="motif" class="pq" />
			Plainte <input style="margin-left:-80px;" type="checkbox" name="motif" class="pq" />
	</p>
	<br/>
	<p> <strong> Message : </strong>
		<textarea rows="5" cols="25"> </textarea>
	</p>
	</div>

	<div style="margin-left: 150px;">
		<p> <input type="submit" value="Envoyer" /> </p>
		<p> <input type="reset" value="Recommencer" /> </p>
	</div>

	</form>
	</div>
	
	<footer>
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>  
        -   <a href="commentaire.php"> Espace commentaires</a>  
        </p> 
    </footer>
</body>
</html>