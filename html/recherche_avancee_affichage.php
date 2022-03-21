<?php require '../../bd.php'; ?>
<?php $bdd = getBD(); ?>
<?php session_start(); ?>

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
        if (isset($_POST['pop'])) { //il manque à faire autant de if qu'il y a de criteres
            array_push($_SESSION['critere'],$_POST['pop']); // ajouter le critere dans la session
        }
        print_r($_SESSION['critere']);

        $dep1=$_POST['dep1'];
        $dep2=$_POST['dep2'];
        $rep = $bdd->query("SELECT * FROM departement WHERE Nom = '{$dep1}' OR Nom = '{$dep2}'");
    //rea : récupère et affiche
    while ($ligne = $rep ->fetch()) {
        echo $ligne['Nom'];
        echo "<br/>";
        echo $ligne['Population'];
        echo "<br/>";
    }

		if(isset($_POST['pop'])){
			echo "test validé";
		}
        else{
            echo "pas bon";
        }
        unset($_SESSION['critere']); //vide la session
    ?>
</body>