<?php
	include '../../bd.php';
	session_start();
	$bdd = getBD();

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
<title>Welcome</title>
</head>
<body>
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
                echo'<li><a href="recherche_avancee.php">Recherche avancée</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$_SESSION['user'][2]."</li>";
            }
        ?>
        </ul>
</div>
    <?php
    if(isset($_POST['mdp'])) {
        $mdp=$_POST['mdp'];
        $id=$_SESSION['recup'];
        try{
            $db = mysqli_connect("localhost", "root", "root", "projet_s6_indice_de_vie");
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage().'<br/>');
        }
        
        $sql="UPDATE users SET password = '{$mdp}' WHERE user_id = '{$id}'";
        
        if (mysqli_query($db,$sql)) {
            echo "Votre mot de passe a été modifié <br/>";
            unset($_SESSION['recup']);
        } else {
            echo "Error: " . $sql . "<br/>" . mysqli_error($bdd);
        }
    }
    else {
        echo "
        <form method=Post action='change_mdp.php' autocomplete=ON>
            <div class='marg'>
            <p><strong>Veuillez saisir votre nouveau mot de passe :</strong>
                <input type='password' id='name' name='mdp' required
                minlength='4' maxlength='20' size='10'
                placeholder='Mot de passe'>
            </p>
            <br/>
            <p>
		        <input type='submit' value='Envoyer' />
            </p>
            </div>
        </form>";
    }
    ?>
</body>
</html>
