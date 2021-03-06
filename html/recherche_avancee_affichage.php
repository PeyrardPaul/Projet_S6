<?php 
    include 'session.php';
    $bdd = getBD();
    
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
    <title>Département</title>
</head>
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
<body>
    <?php
        $_SESSION['critere']=array();
        array_push($_SESSION['critere'],$_POST['pop'],$_POST['loy'],$_POST['st'],$_POST['crimdel'],$_POST['chom'],
        $_POST['brv'],$_POST['artif'],$_POST['plui'],$_POST['pleau'],$_POST['medtempete'],$_POST['medtemphiver'],$_POST['2g'],$_POST['3g'],$_POST['4g'],
        $_POST['5g'],$_POST['qrzo']); // ajouter le critere dans la session

        $dep1=$_POST['dep1'];
        
        $dep2=$_POST['dep2'];
        
        $rep = $bdd->query("SELECT * FROM departement WHERE Nom = '{$dep1}' OR Nom = '{$dep2}'");
    //rea : récupère et affiche
    echo "<div class='out_dep_colle'>";
    while ($ligne = $rep ->fetch()) { 
        echo "<div class='dep_colle'>";
        echo "<br/><h3>".$ligne['Nom']."</h3>"; //affiche le nom
        for ($i = 0; $i != count($_SESSION['critere']); $i++) { //affiche les critères
            if ($_SESSION['critere'][$i]!="") {
                echo "Note ".$_SESSION['critere'][$i]." = ";
                if($ligne[$_SESSION['critere'][$i]]=="1") {
                    echo "<p class='etoile'>★☆☆☆☆</p><br/>";
                }
                else if($ligne[$_SESSION['critere'][$i]]=="2") {
                    echo "<p class='etoile'>★★☆☆☆</p><br/>";
                }
                else if($ligne[$_SESSION['critere'][$i]]=="3") {
                    echo "<p class='etoile'>★★★☆☆</p><br/>";
                }
                else if($ligne[$_SESSION['critere'][$i]]=="4") {
                    echo "<p class='etoile'>★★★★☆</p><br/>";
                }
                else {
                    echo "<p class='etoile'>★★★★★</p><br/>";
                }
            }
        }
        echo "</div>";
    }
    echo "</div>";
    //Description des critères
    echo "<h2> Description des critères </h2>";
    echo "<br/><br/>";
    if (isset($_POST['pop'])) {
        echo "<p><strong>Niv_pop:</strong> Population, où 5 étoiles signifie un niveau élevé de population </p><br/>";
    }if (isset($_POST['loy'])) {
        echo "<p><strong>Niv_loyer:</strong> Prix moyen du loyer au mètre carré, où 5 étoiles signifie un prix moyen élevé du loyer </p><br/>";
    }if (isset($_POST['st'])) {
        echo "<p><strong>Niv_santé:</strong> Nombre de médecins pour 100 000 habitants, où 5 étoiles signifie un nombre élevé de médecins </p><br/>";
    }if (isset($_POST['crimdel'])) {
        echo "<p><strong>Niv_delit:</strong> Total des crimes et délits, où 5 étoiles signifie un nombre élevé de crimes et délits </p><br/>";
    }if (isset($_POST['chom'])) {
        echo "<p><strong>Niv_chom:</strong> Taux de chômage, où 5 étoiles signifie un taux élevé de chômage </p><br/>";
    }if (isset($_POST['brv'])) {
        echo "<p><strong>Niv_brevet:</strong> Taux de réussite au brevet, où 5 étoiles signifie un taux élevé de réussite au brevet </p><br/>";
    }if (isset($_POST['artif'])) {
        echo "<p><strong>Niv_surfart:</strong> Part de surfaces artificialisées, où 5 étoiles signifie une part élevée de surfaces artificialisées </p><br/>";
    }if (isset($_POST['plui'])) {    
        echo "<p><strong>Niv_pluie:</strong> Nombre de jours de pluie par an, où 5 étoiles signifie un nombre élevé de jours de pluie </p><br/>";
    }if (isset($_POST['pleau'])) {
        echo "<p><strong>Niv_plandeau:</strong> Nombre de plans d'eau, où 5 étoiles signifie un nombre élevé de plans d'eau </p><br/>";
    }if (isset($_POST['medtempete'])) {
        echo "<p><strong>Niv_temp_ete:</strong> Température en Eté en C°, où 5 étoiles signifie une température élevée en Eté </p><br/>";
    }if (isset($_POST['medtemphiver'])) {
        echo "<p><strong>Niv_temp_hiver:</strong> Température en Hiver en C°, où 5 étoiles signifie une température élevée en Hiver </p><br/>";
    }if (isset($_POST['2g'])) {
        echo "<p><strong>Niv_2G:</strong> Couverture réseau en 2G, où 5 étoiles signifie une couverture de réseau élevée en 2G </p><br/>";
    }if (isset($_POST['3g'])) {
        echo "<p><strong>Niv_3G:</strong> Couverture réseau en 3G, où 5 étoiles signifie une couverture de réseau élevée en 3G </p><br/>";
    }if (isset($_POST['4g'])) {
        echo "<p><strong>Niv_4G:</strong> Couverture réseau en 4G, où 5 étoiles signifie une couverture de réseau élevée en 4G </p><br/>";
    }if (isset($_POST['5g'])) {
        echo "<p><strong>Niv_5G:</strong> Couverture réseau en 5G, où 5 étoiles signifie une couverture de réseau élevée en 5G </p><br/>";
    }if (isset($_POST['qrzo'])) {
        echo "<p><strong>Niv_Niv_reseau:</strong> Réseau internet sur le département, où 5 étoiles signifie un réseau internet élevée </p><br/>";
    }
        unset($_SESSION['critere']); //vide la session
    ?>
</body>


    <footer class="footer">
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>    
        </p> 
    </footer>
</html>