<!-- cette page renseigne sur l'équipe qui a travaillé sur ce projet, 
elle est accessible par le lien dans le bandeau en pied de page -->

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
    <link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
    <title>Qui sommes-nous ?</title>
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
                echo'<li><a href="recherche_avancee.php">Comparer</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$user['pseudo']."</li>";
            }
        ?>
        </ul>
    </div>

    <img class ="logoupv" src = "../images/logo_univ_PVM3.png"   />
    <p class = "qui_sommes_nous">
    Nous sommes un groupe de cinq développeurs junior. Nous avons travaillé de concert dans le but de vous proposer
    un site distrayant et informatif tout en étant sûr d'utilisation et parfaitement fonctionnel.<br/>

                        
    Nous sommes étudiants en troisième année de licence MIASHS à l'Université Paul-Valéry Montpellier III.
    Ce site est le fruit d'un long projet. Une année de travail dans laquelle nous avons acquis et
    développés les compétences nécessaires à l'élaboration de ce projet.
    
    </p>
    
<p class="soustitre"> Présentons notre équipe <p>
    
<p class="profil">
    <img src = "../images/melissa.jpeg"/>
    <br/>
    Mélissa Pulci <br/>
    20 ans 
</p>

<p class="profil">
<img src = "../images/shelmy.jpeg"/>
    <br/>
    Shelmy Assiah <br/>
    20 ans 
</p>

<p class="profil">
<img src = "../images/paul.jpeg"/>
    <br/>
    Paul Peyrard <br/>
    20 ans 
</p>

<p class="profil">
<img src = "../images/augustin.jpg"/>
    <br/>
    Augustin Hannebert <br/>
    20 ans 
</p>

<p class="profil">
<img src = "../images/nour.jpeg"/>
    <br/>
    Nour Aït Kaddour <br/>
    20 ans 
</p>   


    <footer class="footer">
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>   
        </p> 
    </footer>
</body>
</html>