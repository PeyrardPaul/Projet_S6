<!-- page permettant la comparaison de deux départements selon les critères choisis
recherche_avancee.php redirige vers recherche_avancee_affichage.php -->
<?php include 'session.php'; ?>

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
                //echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="connexion.php">Connexion </a></li>';
            } else if(isset($_SESSION['user'])) {
                // si l'utilisateur est connecté 
                echo'<li><a href="index.php">Accueil</a></li>';
                //echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="recherche_avancee.php">Comparer</a></li>';
                echo '<li><a href="recherche_par_critere.php">Recherche par critère</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$user['pseudo']."</li>";
            }
        ?>
        </ul>
    </div>
<body>




<?php
  
    // Connect to database 
    $con = mysqli_connect("localhost","root","root","projet_s6_indice_de_vie");
      
    // mysqli_connect("servername","username","password","database_name")
   
    // Get all the departements from departement table
    $sql = "SELECT * FROM `departement`";
    $all_departements = mysqli_query($con,$sql);
   
    // The following code checks if the submit button is clicked 
    // and inserts the data in the database accordingly

    
         // Store the Product name in a "name" variable
         $name = mysqli_real_escape_string($con,$_POST['dep']);
         
        // Store the departement ID in a "id" variable
        $id = mysqli_real_escape_string($con,$_POST['Département']); 
    
?>
   

 
    <form action="recherche_avancee_affichage.php" method="POST">

    <div class="sais_dep">
    <p id = "choidp">Choix des départements :</p>
        <select class = "choixdp" name="dep1">
            <?php 
                // use a while loop to fetch data 
                // from the $all_departements variable 
                // and individually display as an option
                while ($departement = mysqli_fetch_array($all_departements,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $departement["Nom"];?>">
                     <!-- The value we usually set is the primary key -->
                
                    <?php echo $departement["Nom"];?>
                       <!-- To show the departement name to the user -->
                    
                </option>
                <?php endwhile; ?>
                <!-- While loop must be terminated -->
        </select>  

<?php
  
    // Connect to database 
    $con = mysqli_connect("localhost","root","root","projet_s6_indice_de_vie");
      
    // mysqli_connect("servername","username","password","database_name")
   
    // Get all the departements from departement table
    $sql = "SELECT * FROM `departement`";
    $all_departements = mysqli_query($con,$sql);
   
    // The following code checks if the submit button is clicked 
    // and inserts the data in the database accordingly

    
         // Store the Product name in a "name" variable
         $name = mysqli_real_escape_string($con,$_POST['dep']);
         
        // Store the departement ID in a "id" variable
        $id = mysqli_real_escape_string($con,$_POST['Département']); 
    
?>
        <select class = "choixdp" name="dep2">
            <?php 
                // use a while loop to fetch data 
                // from the $all_departements variable 
                // and individually display as an option
                while ($departement = mysqli_fetch_array($all_departements,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $departement["Nom"];?>">
                
                    <?php echo $departement["Nom"];?>
                    
            </option>
         <?php endwhile; ?>
       </select>
                    </div>
    <br>
    <div class="marg">
    <p> Choix des critères de comparaison : </p>
        
    <label class = "critcell" for="pop"> Population :</label>
    <input type="checkbox" id="population" name="pop" value="Niv_pop">
    
    <br>
   
    <label class = "critcell" for="loy"> Loyer (prix moyen au m²) :</label>
    <input type="checkbox" id="Loyer" name="loy" value="Niv_loyer">
        
    <br>
          
    <label class = "critcell" for="st"> Santé (nombre de médecin pour 100000 habitants) :</label>
    <input type="checkbox" id="santé" name="st" value="Niv_santé">
                                  
    <br>
         
    <label class = "critcell" for="crim"> Crimes et délits :</label>
    <input type="checkbox" id="crimes et délits" name="crimdel" value="Niv_delit">
                      
    <br>
         
    <label class = "critcell" for="chom"> Taux de chômage :</label>
    <input type="checkbox" id="chômage" name="chom" value="Niv_chom">
                      
    <br>              
         
    <label class = "critcell" for="brv"> Taux de réussite au brevet :</label>
    <input type="checkbox" id="brevet" name="brv" value="Niv_brevet">
                      
    <br>
          
    <label class = "critcell" for="artif"> Part de surfaces artificialisées :</label>
    <input type="checkbox" id="surfaces artificialisées" name="artif" value="Niv_surfart">
                      
    <br>
         
    <label class = "critcell" for="plui"> Nombre de jours de pluie par an :</label>
    <input type="checkbox" id="pluie" name="plui" value="Niv_pluie">
                      
    <br>
         
    <label class = "critcell" for="pleau"> Nombre de plans d'eau :</label>
    <input type="checkbox" id="plans d'eau" name="pleau" value="Niv_plandeau">
                      
    <br>
         
    <label class = "critcell" for="medtempe"> Température médiane en juin (été) :</label>
    <input type="checkbox" id="médiane température +" name="medtempete" value="Niv_temp_ete">
                      
    <br>
         
    <label class = "critcell" for="medtemph"> Température médiane en janvier (hiver) :</label>
    <input type="checkbox" id="médiane température -" name="medtemphiver" value="Niv_temp_hiver">
                      
    <br>
         
    <label class = "critcell" class = "critcell" for="2g"> Nombre de sites 2G :</label>
    <input type="checkbox" id="2g" name="2g" value="Niv_2G">
        
    <br>
         
    <label class = "critcell" for="3g"> Nombre de sites 3G :</label>
    <input type="checkbox" id="3g" name="3g" value="Niv_3G">
                      
    <br>
         
    <label class = "critcell" for="4g"> Nombre de sites 4G :</label>
    <input type="checkbox" id="4g" name="4g" value="Niv_4G">
                      
    <br>
         
    <label class = "critcell" for="5g"> Nombre de sites 5G :</label>
    <input type="checkbox" id="5g" name="5g" value="Niv_5G">
        
    <br>
         
    <label class = "critcell" for="qrzo"> Moyenne de qualité du réseau internet :</label>
    <input type="checkbox" id="qualité réseau" name="qrzo" value="Niv_reseau">
                      
    <br>

</div>

                    </td>
                    </tr>
 
</table>

    <input id="bout" type="submit" value="Valider" />
</div>
</form>
</body>

    <footer class="footer">
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>  
        </p> 
    </footer>
</html>