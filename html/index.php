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
	<link rel="stylesheet" href="../Styles/style.css" type="text/css" media="screen"/>
    <title> N-Maps</title>
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
    
     <div> <!--je fais une grosse div qui contiendra la page. -->

    
         <header>
            <div class="header-cover">
                <img src="../images/montpellier.jpg" alt="image montpellier">
            </div>
            <div class="header-area">
                 <div class="header-content">
                    <p>Bienvenue sur N-MAPS</p>  
                    <p>Site d'avis et de comparaison des départements en France. </p>
                    Il s'agit d'un outil qui a pour but principal 
    de vous faire découvrir les départements de France métropolitaine à travers différents indices de vie.
    <br/>

    Nous souhaitons que nos utilisateurs s'approprient cet outil !<br/>
    <br/>

    Que ce soit pour des projets sérieux tels que le choix d'un futur lieu de résidence. <br/>

    Ou quelque chose de plus léger comme votre prochaine destination de vacance ! <br/>

    Et même pour satisfaire votre soif de connaissances... <br/>
    <br/>

    Prenez le temps de découvrir la France à travers différents angles,
    nous attendons vos avis, commentaires et retours avec impatience ! <br/>
     </p>
                    
                </div> 
             </div>     
        </header>

        <!-- carte cliquable  -->
                
        <!-- fin de la carte cliquable -->
    </div>
 
    <footer><!--ici le pied de page -->
        N-Maps © 2022
    </footer>
   
</body>
</html>

