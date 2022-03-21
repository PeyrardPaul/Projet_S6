<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Commentaires</title>
        <link href="../Styles/style.css" rel="stylesheet" />
    </head>

<body>
    <div class="bandeau"> <!--ici le bandeau haut de page -->
        <img id="logo" src="../images/N-Maps.png" alt="images logo" >
        <h1> <a href="index.php">N-MAPS</a> </h1>
        <ul class="menu">
        <?php
            if(!isset($_SESSION['user'])) {
                echo'<li><a href="index.php">Accueil</a></li>';
                echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="recherche_avancee.php">Recherche avancée</a></li>';
                echo'<li><a href="contact.php">Contact</a></li>';
                echo'<li><a href="qui_sommes_nous.php">Qui sommes nous ?</a></li>';
                echo'<li><a href="connexion.php">Se connecter </a></li>';
                echo'<li><a href="commentaire.php">Voir commentaires</a></li>';
            } else if(isset($_SESSION['user'])) {
                echo'<li><a href="index.php">Accueil</a></li>';
                echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="recherche_avancee.php">Recherche avancée</a></li>';
                echo'<li><a href="contact.php">Contact</a></li>';
                echo'<li><a href="qui_sommes_nous.php">Qui sommes nous ?</a></li>';   
                echo"<li><a href='deconnexion.php'>Se déconnecter</a></li>";
                echo'<li><a href="commentaire.php"> Espace commentaires</a></li>';
            }
        ?>
        </ul>
    </div>
    
    <h2> À vos posts !</h2>
    <p class="soustitre">Derniers posts</p>
    
    <?php
        include '../../bd.php';
        try {
            $bdd = getBD();
        } catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
        $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_cree, \'%d/%m/%Y à %Hh%imin%ss\') AS
        date_creation_fr FROM liste ORDER BY date_cree DESC LIMIT 0,7');
        while ($donnees = $req->fetch()) {
    ?>

    <div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>  <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>

    <p>
        <?php echo nl2br(htmlspecialchars($donnees['contenu']));  //nl2br permet de convertir les retours à la ligne en balise <br/> 
        ?>
        <br />
        <em> <a href="commentaireU.php?liste=<?php echo $donnees['id'];?>">Commentaires </a> </em>
    </p>
    </div>

    <?php
    } 
    $req->closeCursor();
    ?>

</body>
<footer>    <a href="index.php">Acceuil</a> </footer>
</html>