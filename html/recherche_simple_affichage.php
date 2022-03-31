<?php 
	require '../../bd.php'; 
    session_start();
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
                echo'<li><a href="recherche_avancee.php">Recherche avancée</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$_SESSION['user'][2]."</li>";
            }
        ?>
        </ul>
</div>
<body>
    <div><!-- ici une div avec le contenu des informations sur la page  -->
    <a class="Retour" href="index.php#ancre">Retour carte</a> <!--bouton retour vers recherche simple -->

    <!-- rajout de menu déroulant -->
            
    <?php $bdd = new PDO('mysql:host=localhost;dbname=projet_s6_indice_de_vie;charset=utf8', 'root', 'root'); ?>
    <?php
    
    // Connect to database 
    $con = mysqli_connect("localhost","root","root","projet_s6_indice_de_vie");
        
    // Get all the categories from category table
    $sql = "SELECT * FROM `departement`";
    $all_categories = mysqli_query($con,$sql);
    
    // The following code checks if the submit button is clicked 
    // and inserts the data in the database accordingly
    if(isset($_POST['submit']))
    {
        // Store the Product name in a "name" variable
        $name = mysqli_real_escape_string($con,$_POST['dep']);
        
    }
    ?>

    <div class="sais_dep">
    <p>
        Explorez un nouveau département
    </p>
   
    <form method="GET" action="recherche_simple_affichage.php">
            <select name="dep">
                <?php 
                    // use a while loop to fetch data 
                    // from the $all_categories variable 
                    // and individually display as an option
                    while ($category = mysqli_fetch_array(
                            $all_categories,MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $category["Département"];
                        // The value we usually set is the primary key
                    ?>">
                        <?php echo $category["Nom"];
                            // To show the category name to the user
                        ?>
                    </option>
                <?php 
                    endwhile; 
                    // While loop must be terminated
                ?>
            </select>
            <br>
            <input type="submit" value="Valider" name="submit">
    </form>
    </div>
    <!-- fin du menu déroulant -->

    <?php //echo '<img class="photo_dep" src="../images/departements/'.$_POST['dep'].'.jpg" alt="photo du département en question">';
            $rep = $bdd->query("select * from departement where Département ='".$_GET['dep']."'"); //ici on affiche les informations pour le département selectionné
            while ($ligne = $rep ->fetch()) {
                echo('<header>
                        <div class="header-cover">
                            <img class="photo_dep" src="../images/departements/'.$_GET['dep'].'.jpg" alt="photo du département en question">
                        </div>
                        <div class="header-area">
                            <div class="header-content">
                                <h1>'.$ligne['Nom'].'</h1><br> 
                            </div> 
                        </div>     
                    </header>');
                echo "<div class='info_dep'>";
                $dep = $ligne['Nom'];
                $id_dep = $ligne['Département'];
                //remplacer le _ par un espace pour un meilleur affichage
                $ligne['Population'] = str_replace("_"," ",$ligne['Population']); 
                $ligne['Nombre de crimes pour 100 000 habitants'] = str_replace("_"," ",$ligne['Nombre de crimes pour 100 000 habitants']); 
                //remplacer la virgule par le point pour pouvoir arrondir
                $ligne['Santé (nombre de médecin pour 100 000 habitants)'] = str_replace(",",".",$ligne['Santé (nombre de médecin pour 100 000 habitants)']);
                $ligne['Nombre de jours de pluie par an'] = str_replace(",",".",$ligne['Nombre de jours de pluie par an']);
                $ligne['Taux de réussite au brevet (%)'] = str_replace(",",".",$ligne['Taux de réussite au brevet (%)']);
                //arrondir
                $ligne['Santé (nombre de médecin pour 100 000 habitants)'] = round($ligne['Santé (nombre de médecin pour 100 000 habitants)'],0,PHP_ROUND_HALF_EVEN); // arrondir à l'unité
                $ligne['Nombre de jours de pluie par an'] = round($ligne['Nombre de jours de pluie par an'],0,PHP_ROUND_HALF_EVEN); // arrondir à l'unité   
                $ligne['Taux de réussite au brevet (%)'] = round($ligne['Taux de réussite au brevet (%)'],2,PHP_ROUND_HALF_EVEN); // arrondir à deux chiffres après la virgule 
                //reremplacer le point par la virgule pour un meilleur affichage 
                $ligne['Taux de réussite au brevet (%)'] = str_replace(".",",",$ligne['Taux de réussite au brevet (%)']);

                    echo "<p>Numéro du département : ".$ligne['Département']."<br></p>";
                    echo "<p>Population : ".$ligne['Population']." habitants"."<br></p>";
                    echo "<p>Nombre de médecins pour 100 000 habitants : ".$ligne['Santé (nombre de médecin pour 100 000 habitants)']."<br></p>";
                    echo "<p>Nombre de crimes pour 100 000 habitants : ".$ligne['Nombre de crimes pour 100 000 habitants']."<br></p>";
                    echo "<p>Taux de chômage : ".$ligne['Taux de chomage (%)']." %"."<br></p>";
                    echo "<p>Taux de réussite au brevet des collège : ".$ligne['Taux de réussite au brevet (%)']." %"."<br></p>";
                    echo "<p>Nombre de jours de pluie par an : ".$ligne['Nombre de jours de pluie par an']."<br></p>";
                    echo "<p>Nombre de plan d'eau : ".$ligne["Nombre de plans d’eau"]."<br></p>";
                    echo "<p>Température médiane en hiver : ".$ligne["Médiane de la température du mois de janvier (Hiver) en C°"]." C°"."<br/></p>";
                    echo "<p>Température médiane en été : ".$ligne["Médiane de la température du mois de juin (Ete) en C°"]." C°"."<br></p>";
                echo "</div>";
                
            }
            $rep ->closeCursor();
        ?> 
        <h2>Espace commentaire département <?php echo $dep;?></h2> <br/> 
        <?php
        $req = $bdd->query("SELECT id_commentaire,user_id,code_dep,contenu, date_commentaire 
        FROM commentaires WHERE code_dep = '{$id_dep}' ORDER BY date_commentaire DESC LIMIT 0,7");
        while ($mat = $req->fetch()) {?>
        <div class="aff_com">
            <?php 
                $id=$mat['user_id'];
                $req2 = $bdd->query("SELECT nom, prenom FROM users WHERE user_id = '{$id}'");
                while ($mat2 = $req2->fetch()) {
                    $nom = $mat2['nom'];
                    $prenom = $mat2['prenom'];
                }
                $req2->closeCursor();
            ?>
            <h3 style="margin-bottom:5px;"> 
                <em><?php echo $dep." -- ".$mat['date_commentaire']." par M/Mme ".$nom." ".$prenom;?></em>
            </h3>
            <p>
                <?php echo "<p>".$mat['contenu']."</p><br/><br/>"; ?>
            </p>
        </div>

        <?php
        } 
        $req->closeCursor();
        ?>
        
    </div>
    <?php
    if (isset($_SESSION['user'])) {
        echo "<div class='sais_com'>
        <h3>Laissez un commentaire ici &rarr;</h3>
        <form method=Post action='com_affich_simple.php' autocomplete=ON>
            <p>Message :<br/>
		    <textarea rows='8' cols='45' name='com'> </textarea>
	        </p>
            <input type='hidden' name='dep' value='".$id_dep."'>
        <p>
		    <input type='submit' value='Envoyer' />
        </p>
        </form>
        </div>";
    }
    ?>
</body>
<footer><!--ici le pied de page -->
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>   
        </p> 
    </footer>

</html>


    