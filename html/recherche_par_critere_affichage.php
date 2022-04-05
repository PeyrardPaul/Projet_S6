<?php include 'session.php'; ?>

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
                echo '<li><a href="recherche_par_critere.php">Recherche par critère</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$user['pseudo']."</li>";
            }
        ?>
        </ul>
    </div>
<body>
    <?php
    $_SESSION['test']=array();
    array_push($_SESSION['test'],$_POST['pop'],$_POST['loy'],$_POST['st'],$_POST['crimdel'],$_POST['chom'],
    $_POST['brv'],$_POST['artif'],$_POST['plui'],$_POST['pleau'],$_POST['medtempete'],$_POST['medtemphiver'],$_POST['2g'],$_POST['3g'],$_POST['4g'],
    $_POST['5g'],$_POST['qrzo']); // ajouter le critere dans la session

    $_SESSION['rech_critere'] = array();
    for ($i = 0; $i!=count($_SESSION['test']); $i++) { //varaible session avec que les critères saisis
        if (isset($_SESSION['test'][$i])) {
            array_push($_SESSION['rech_critere'],$_SESSION['test'][$i]);
        }
    }
    print_r($_SESSION['rech_critere']);
        $req = $bdd->query("SELECT * FROM departement");
        while ($ligne = $req->fetch()) {
            echo "<br><h3>".$ligne['Nom']."</h3>";
        }
    unset($_SESSION['test']);
    unset($_SESSION['rech_critere']);
    ?>
</body>

    <footer class="footer">
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>  
        </p> 
    </footer>
</html>