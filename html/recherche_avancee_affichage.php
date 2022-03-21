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

        echo($_POST['dep1']);
        
        echo "<br>";

        echo($_POST['dep2']);

        echo "<br>";

        $criteres = "";

if(isset($_POST['pop'])){
 $criteres += "population,";
 echo $criteres;
}
echo "<br>";
if(isset($_POST['loy'])){
    echo "validé";
   }


        $rep = $bdd->query('SELECT "" FROM articles Where departement = ain and departement = aisne');
    //rea : récupère et affiche
    while ($ligne = $rep ->fetch()) {}

		if(isset($_POST['pop'])){
			echo "test validé";
		}
        else{
            echo "pas bon";
        }

    ?>
</body>