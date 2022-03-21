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
                echo "Note ".$_SESSION['critere'][$i]." = ".$ligne[$_SESSION['critere'][$i]]." étoile(s)<br/>";
            }
        }
    }
        unset($_SESSION['critere']); //vide la session
    ?>
</body>