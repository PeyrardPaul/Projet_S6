<?php
	include 'session.php';
	$bdd = getBD();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../Styles/style.css" type="text/css" media="screen"/>
    <title>N-Maps</title>
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
                echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="connexion.php">Connexion </a></li>';
            } else if(isset($_SESSION['user'])) {
                // si l'utilisateur est connecté 
                echo'<li><a href="index.php">Accueil</a></li>';
                echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="recherche_avancee.php">Recherche avancée</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$_SESSION['user'][2]."</li>";
            }
        ?>

       </ul>
    </div>
    
     <div> <!--je fais une grosse div qui contiendra la page. -->
    
        <header>
                
        <!--    <div class="header-cover">  </div>-->
                   
                        <div class="conteneur">
                            <div class="d2"></div>
                        </div>
           
           
            <div class="header-area">
                 <div class="header-content">
                    <p>
                        <?php
		                if(isset($_SESSION['user'])) {
   
							echo "Bonjour <strong><font color='black'>". $user['pseudo']. "</font></strong><br/>" ;
                            echo "Bienvenue sur N-MAPS"."<br/>";

		                }
		                else {
                            echo "Bienvenue sur N-MAPS"."<br/>";
		                }?>
                    </p>

                    <p>
                        Site d'avis et de comparaison des départements en France. </p>
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
    <?php
        if(isset($_SESSION['user'])){
            echo("
            <div class='page'>
    
            <!-- Ici on va proposer les 2 manières de s'informer sur le dpt en question  -->
                <h3>Pour découvrir la France, choississez un mode de recherche &#x1F440;</h3>
                
                    &#128077; Utilisez la  &#x1F449; <a href='recherche_simple.php'>recherche simple</a>&#x1F448; pour découvrir toutes les informations sur un département choisi. 
                <br>
                
                    &#128077; Utilisez la recherche avancée pour comparer deux départements choisis sur une liste de critères que vous selctionnez. 
                
            </div>
            ");
        }
    ?>

        <!-- carte cliquable  -->
    <div>
        <!-- <p id="carte"><iframe src="//fr.batchgeo.com/map/99d9e2e01b38d2e26947900b4fcc342e" frameborder="0" width="100%" height="550" sandbox="allow-top-navigation allow-scripts allow-popups allow-same-origin allow-modals allow-forms" style="border:1px solid #aaa;"></iframe></p> -->
    </div>
            <!-- fin de la carte cliquable -->
    </div>
 
    
</body>
    <footer><!--ici le pied de page -->
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>  
        -   <a href="commentaire.php"> Espace commentaires</a>  
        </p> 
    </footer>
   
</html>

