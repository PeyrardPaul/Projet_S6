<?php 
	include 'session.php';
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
        <?php
            // si l'utilisateur n'est pas connecté 
            if(!isset($_SESSION['user'])) {
                echo'<li><a href="index.php">Accueil</a></li>';
                // echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="connexion.php">Connexion </a></li>';
            } else if(isset($_SESSION['user'])) {
                // si l'utilisateur est connecté 
                echo'<li><a href="index.php">Accueil</a></li>';
                // echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="recherche_avancee.php">Comparer</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$user['pseudo']."</li>";
            }
        ?>
        </ul>
</div>
<body>
    <div>
    <?php
    if (isset($_SESSION['user'])) {
        if (isset($_POST['com'])) {
            $id_client_c = $_SESSION['user'][0];
            $com = $_POST['com'];
            $com = str_replace("'","''",$com); //remplacer apostrophe par double apostrophe pour pas d'erreur lors de l'INSERT
            $id_dep = $_POST['dep'];
            
            try{
                $db = mysqli_connect("localhost", "root", "root", "projet_s6_indice_de_vie");
            }
            catch (Exception $e){
                die('Erreur : ' . $e->getMessage().'<br/>');
            }
            
            $sql="INSERT INTO commentaires(user_id,code_dep,contenu,date_commentaire) VALUES('".$id_client_c."','".$id_dep."','".$com."',NOW())";
            $interdit = array("put","merde","salop","con","couille","encu","slp","pd","pédé","niq","nik","DROP","drop","ALTER","alter","insert","INSERT","INTO","into");
            $flag = False;
            $i = 0;
            $ttl = count($interdit);
            while($flag == False){
                for($i=0; $i<($ttl-1); $i++){
                    if(strpos($com,$interdit[$i])== True){
                        $flag = True;
                        break;
                    }
                }
            }
            if($flag == True){
                echo "Si vous êtes là c'est que nous ne tolérons pas l'un des mots qui composent votre commentaire, merci de ne pas mettre d'insulte ou de mot déplacé.";
            }
            else{
            if (mysqli_query($db,$sql)) {
                //echo "Votre commentaire a bien été ajouté<br/>";
                header('location: recherche_simple_affichage.php?dep='.$id_dep.'&submit=Valider');
            } else {
                echo "Error: " . $sql . "<br/>" . mysqli_error($bdd);
            }
        }
        }
    }
    ?>
</body>
<footer class="footer"><!--ici le pied de page -->
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>   
        </p> 
    </footer>

</html>


    