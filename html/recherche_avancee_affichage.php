<?php 
    require '../../bd.php'; 
    $bdd = getBD();
    session_start(); 
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
            <li><a href="index.php">Accueil</a></li>
            <li><a href="qui_sommes_nous.php">Qui sommes nous ?</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="recherche_simple.php">Recherche simple</a></li>
            <li><a href="recherche_avancee.php">Recherche avancée</a></li>

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
    while ($ligne = $rep ->fetch()) {
        echo "<br/><strong>".$ligne['Nom']."</strong>"; //affiche le nom
        for ($i = 0; $i != count($_SESSION['critere']); $i++) { //affiche les critères
            if ($_SESSION['critere'][$i]!="") {
                echo "Note ".$_SESSION['critere'][$i]." = ";
                if($ligne[$_SESSION['critere'][$i]]=="1") {
                    echo "<p id='etoile'>★☆☆☆☆</p><br/>";
                }
                else if($ligne[$_SESSION['critere'][$i]]=="2") {
                    echo "<p id='etoile'>★★☆☆☆</p><br/>";
                }
                else if($ligne[$_SESSION['critere'][$i]]=="3") {
                    echo "<p id='etoile'>★★★☆☆</p><br/>";
                }
                else if($ligne[$_SESSION['critere'][$i]]=="4") {
                    echo "<p id='etoile'>★★★★☆</p><br/>";
                }
                else {
                    echo "<p id='etoile'>★★★★★</p><br/>";
                }
            }
        }
    }//Description des critères
    echo "<h2>Description des critères :</h2>";
<<<<<<< HEAD
    echo "<br/><br/><p>L'ensemble des critères suivants sont présentés avec une évaluation purement comparative. Attribuer 5 étoiles à la moyenne de température de janvier n'est,
     dans l'absolut pas très intéressant. Dans le cas présent un département avec 5 étoiles pour cet indicateur aura une température particulièrement
      clémente comparé aux autres départements.</p><br/>";
    echo "<br/><br/><p>Niv_pop: densité de population ?</p><br/>";
    echo "<p>Niv_loyer: prix du loyer </p><br/>";
    echo "<p>Niv_santé: nombre de médecins pour 100 000 habitants</p><br/>";
    echo "<p>Niv_delit: Nombre de crimes pour 100000 habitants </p><br/>";
    echo "<p>Niv_chom: Taux de chômage </p><br/>";
    echo "<p>Niv_brevet: Taux de réussite au brevet </p><br/>";
    echo "<p>Niv_surfart: pourcentage de part de surfaces artificialisées </p><br/>";
    echo "<p>Niv_pluie: Nombre de jours de pluie par an</p><br/>";
    echo "<p>Niv_plandeau: Nombre de plan d'eaux accessibles dans le département </p><br/>";
    echo "<p>Niv_temp_ete: Médiane température au mois de Juin </p><br/>";
    echo "<p>Niv_temp_hiver: Médiane température au mois de Janvier </p><br/>";
    echo "<p>Niv_2G: Moyenne de sites 2G </p><br/>";
    echo "<p>Niv_3G: Moyenne de sites 3G </p><br/>";
    echo "<p>Niv_4G: Moyenne de sites 4G </p><br/>";
    echo "<p>Niv_5G: Moyenne de sites 5G </p><br/>";
    echo "<p>Niv_Niv_reseau: Qualité de la couverture réseau </p><br/>";
=======
    echo "<br/><br/><p><strong>Niv_pop:</strong> Population, où 5 étoiles signifie un niveau élevé de population </p><br/>";
    echo "<p><strong>Niv_loyer:</strong> Prix moyen du loyer au mètre carré, où 5 étoiles signifie un prix moyen élevé du loyer </p><br/>";
    echo "<p><strong>Niv_santé:</strong> Nombre de médecins pour 100 000 habitants, où 5 étoiles signifie un nombre élevé de médecins </p><br/>";
    echo "<p><strong>Niv_delit:</strong> Total des crimes et délits, où 5 étoiles signifie un nombre élevé de crimes et délits </p><br/>";
    echo "<p><strong>Niv_chom:</strong> Taux de chômage, où 5 étoiles signifie un taux élevé de chômage </p><br/>";
    echo "<p><strong>Niv_brevet:</strong> Taux de réussite au brevet, où 5 étoiles signifie un taux élevé de réussite au brevet </p><br/>";
    echo "<p><strong>Niv_surfart:</strong> Part de surfaces artificialisées, où 5 étoiles signifie une part élevée de surfaces artificialisées </p><br/>";
    echo "<p><strong>Niv_pluie:</strong> Nombre de jours de pluie par an, où 5 étoiles signifie un nombre élevé de jours de pluie </p><br/>";
    echo "<p><strong>Niv_plandeau:</strong> Nombre de plans d'eau, où 5 étoiles signifie un nombre élevé de plans d'eau </p><br/>";
    echo "<p><strong>Niv_temp_ete:</strong> Température en Eté en C°, où 5 étoiles signifie une température élevée en Eté </p><br/>";
    echo "<p><strong>Niv_temp_hiver:</strong> Température en Hiver en C°, où 5 étoiles signifie une température élevée en Hiver </p><br/>";
    echo "<p><strong>Niv_2G:</strong> Couverture réseau en 2G, où 5 étoiles signifie une couverture de réseau élevée en 2G </p><br/>";
    echo "<p><strong>Niv_3G:</strong> Couverture réseau en 3G, où 5 étoiles signifie une couverture de réseau élevée en 3G </p><br/>";
    echo "<p><strong>Niv_4G:</strong> Couverture réseau en 4G, où 5 étoiles signifie une couverture de réseau élevée en 4G </p><br/>";
    echo "<p><strong>Niv_5G:</strong> Couverture réseau en 5G, où 5 étoiles signifie une couverture de réseau élevée en 5G </p><br/>";
    echo "<p><strong>Niv_Niv_reseau:</strong> Réseau internet sur le département, où 5 étoiles signifie un réseau internet élevée </p><br/>";
>>>>>>> b24369cc8b0b2f8d1523438189c23bc372481f87
        unset($_SESSION['critere']); //vide la session
    ?>
</body>
</html>