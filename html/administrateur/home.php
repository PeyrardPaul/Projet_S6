<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"href="../../Styles/style.css"type="text/css"media="screen"/>
    <title> Admin </title>
</head>
<body>

<div class="bandeau"> <!--ici le bandeau haut de page -->
        <img id="logo" src="../../images/N-Maps.png" alt="images logo" >
        <h1><a href="index.php">N-MAPS</a></h1>
        <ul class="menu">

        <p>
                        <?php


                       include 'session.php';
		                if(isset($_SESSION['admin'])) {

                            echo "Welcome ".$admin['pseudo']."<br/>";
                            echo'<li><a href="../index.php">Accueil</a></li>';
                            echo'<li><a href="../recherche_simple.php">Recherche simple</a></li>';
                            echo'<li><a href="../recherche_avancee.php">Recherche avancée</a></li>';
                            echo'<li><a href="../contact.php">Contact</a></li>';
                            echo"<li><a href='../deconnexion.php'>Déconnexion</a></li>";
                            echo'<li><a href="../commentaire.php"> Espace commentaires</a></li>';

		                }
		                else 
                        {
                            //echo "Welcome admin"."<br/>";
                            echo "Vous n'êtes pas administrateur";
                           
		                }?>
                    </p>
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
                    
                        <?php
                            if(isset($_SESSION['admin'])) {

                            echo'<li><a href="departement_add.php">Ajouter un département</a></li>';
                            echo'<li><a href="departement_delete.php">Supprimer un département</a></li>';
                            echo'<li><a href="departement_edit.php">Modifier un département</a></li>';
                            echo'<li><a href="user_add.php">Ajouter un utilisateur</a></li>';
                            echo'<li><a href="user_delete.php">Supprimer un utilisateur</a></li>';
                            echo'<li><a href="user_edit.php">Modifier un utilisateur</a></li>';
                            echo'<li><a href="user.php">Utilisateur</a></li>';

                            }
                        ?>

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



</body>

<footer><!--ici le pied de page -->
        <p>N-Maps © 2022 - <a id="quisommesnous" href="qui_sommes_nous.php">Qui sommes nous ?</a></p>
        
</footer>

</html>