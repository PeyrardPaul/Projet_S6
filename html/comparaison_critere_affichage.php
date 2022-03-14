<?php 
	require '../../bd.php'; 
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
<div class="bandeau">
	<img id="logo" src="../images/N-Maps.png" alt="images logo" >
	<h1><a href="index.php">N-MAPS</a></h1>
	<ul class="menu">
		<li><a href="index.php">Accueil</a></li>
		<li><a href="qui_sommes_nous.php">Qui sommes nous ?</a></li>
		<li><a href="inscription.php">Inscription</a></li>
		<li><a href="contact.php">Contact</a></li>
		<li><a href="departement.php">Département</a></li>
		<li><a href="connexion.php">Connexion</a></li>
	</ul>
</div>
<body>
    <?php
        //echo($_POST['nom_dep']); // ici le code du dpt
        $rep = $bdd->query("select * from departement where Département ='".$_POST['code_dep']."'"); //ici on affiche les informations pour le département selectionné
        while ($ligne = $rep ->fetch()) {
            echo $ligne['Nom'].":".$ligne['Département']."<br />\n";  //Département est le Code postal 
            echo $ligne['Population']." habitants"."<br />\n";
            echo "Nombre de médecins pour 100 000 habitants : ".$ligne['Santé (nombre de médecin pour 100 000 habitants)']."<br />\n";
            echo "Nombre de crimes pour 100 000 habitants : ".$ligne['Nombre de crimes pour 100 000 habitants']."<br />\n";
            echo "Taux de chômage : ".$ligne['Taux de chomage (%)']." %"."<br />\n";
            echo "Taux de réussite au brevet des collège : ".$ligne['Taux de réussite au brevet (%)']." %"."<br />\n";
            echo "Nombre de jours de pluie par an : ".$ligne['Nombre de jours de pluie par an']."<br />\n";
            echo "Nombre de plan d'eau : ".$ligne["Nombre de plans d’eau"]."<br />\n";
            echo "Température médiane en hiver : ".$ligne["Médiane de la température du mois de janvier (Hiver) en C°"]." C°"."<br />\n";
            echo "Température médiane en été : ".$ligne["Médiane de la température du mois de juin (Ete) en C°"]." C°"."<br />\n";
           
        }
        $rep ->closeCursor();

    ?>
</body>