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
    <div><!-- ici une div avec le contenu des informations sur la page  -->
    <?php echo '<img class="photo_dep" src="../images/departements/'.$_POST['dep'].'.jpg" alt="photo du département en question">';?>
        <?php
            //echo($_POST['nom_dep']); // ici le code du dpt
            $rep = $bdd->query("select * from departement where Département ='".$_POST['dep']."'"); //ici on affiche les informations pour le département selectionné
            while ($ligne = $rep ->fetch()) {
                
                echo "<h2>".$ligne['Département']." ".$ligne['Nom']."</h2><br />\n";  //Département est le Code postal 
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
    </div>
    
</body>