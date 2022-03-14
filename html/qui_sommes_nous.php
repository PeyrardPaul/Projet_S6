<?php
	include '../../bd.php';
	session_start();
    $bdd = getBD();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
    <title>Qui sommes-nous ?</title>
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
    <p class = "qui_sommes_nous">
    Nous sommes un groupe de cinq développeurs junior. Nous avons travaillé de concert dans le but de vous proposer
    un site distrayant et informatif.<br/>

    <!-- logo paul va -->
    Nous sommes étudiants en troisième année de licence MIASHS à l'Université Paul-Valéry Montpellier III.
    Ce site est le fruit d'un long projet d'une année de travail dans lequel nous avons mis toutes nos compétences.
</p>
    
<p id="soustitre"> Présentons notre équipe <p>
    
<p class="profil">
    <!-- photo de profil-->
    Mélissa Pulci <br/>
    21 ans 
</p>

<p class="profil">
    <!-- photo de profil-->
    Shelmy Assiah <br/>
     ans 
</p>

<p class="profil">
    <!-- photo de profil-->
    Paul Peyrard <br/>
    20 ans 
</p>

<p class="profil">
    <!-- photo de profil-->
    Augustin Hannebert <br/>
    20 ans 
</p>

<p class="profil">
    <!-- photo de profil-->
    Nour Aït-Kadour <br/>
     ans 
</p>    
</body>
</html>