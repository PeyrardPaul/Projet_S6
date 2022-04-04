<!DOCTYPE html>
<html lang="fr">
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="../../styles/style.css" type="text/css" media="screen"/>
		<title>Message Affiche</title>
    </head>
    <body>
    <?php
	include 'session.php';
	//$bdd = getBD();
?>
    <div class="bandeau"> <!--ici le bandeau haut de page -->
        <img id="logo" src="../../images/N-Maps.png" alt="images logo" >
        <h1><a href="home.php">N-MAPS</a></h1>
        <ul class="menu">
        <?php
            // si l'utilisateur n'est pas connecté 
            if(!isset($_SESSION['admin'])) {
                echo'<li><a href="../index.php">Accueil</a></li>';
                // echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="connexion.php">Connexion </a></li>';
            } else if(isset($_SESSION['admin'])) {
                // si l'utilisateur est connecté 
                echo'<li><a href="../index.php">Accueil</a></li>';
                // echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="../recherche_avancee.php">Recherche avancée</a></li>';
                echo"<li><a href='../deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$admin['pseudo']."</li>";
            }
        ?>
       </ul>
    </div>
    <div>
        <?php
       
   $bdd= getBD();
    $rep = $bdd->query("select * from contact,users where contact.user_id=users.user_id ");

  while ($ligne =$rep->fetch()) 
{
    echo "<div class='vu'><h4>Message de : " .$ligne['pseudo']."</h4><br/>";
    echo "Email: ".$ligne['adresse_email']."<br/>";
    echo "Motif: ".$ligne['motif']."<br/>";
	echo "Contenu: ".$ligne['message']."<br/></div>";
}
    
        ?>
    </div>

    </body>
<br/>
<br/><br/><br/><br/><br/><br/>
<footer class="footer"><!--ici le pied de page -->
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        </p> 
    </footer>

</html>