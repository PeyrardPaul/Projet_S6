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

    
    <p>Choix du premier departement</p>
        <select name="dep1">
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
    
    <p>Choix du second departement</p>

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
        <select name="dep2">
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <p> Choix des critères de comparaison </p>
    <table id = "critabl">

    <tr class = "critcol">

        <td class = "critcell">
    <label for="pop"> Population :</label>
    <input type="checkbox" id="population" name="pop" value="Niv_pop">
        </td>

        <td class = "critcell">
    <label for="loy"> Loyer (prix moyen au m²) :</label>
    <input type="checkbox" id="Loyer" name="loy" value="Niv_loyer">
        </td>

         <td class = "critcell">
    <label for="st"> Santé (nombre de médecin pour 100000 habitants) :</label>
    <input type="checkbox" id="santé" name="st" value="Niv_santé">
                     </td>
                    </tr>
    <tr class = "critcol">

        <td class = "critcell">
    <label for="crim"> Crimes et délits :</label>
    <input type="checkbox" id="crimes et délits" name="crimdel" value="Niv_délit">
                    </td>

        <td class = "critcell">
    <label for="chom"> Taux de chômage :</label>
    <input type="checkbox" id="chômage" name="chom" value="Niv_chom">
                    </td>

        <td class = "critcell">
    <label for="brv"> Taux de réussite au brevet :</label>
    <input type="checkbox" id="brevet" name="brv" value="Niv_brevet">
                    </td>
                    </tr>
    <tr class = "critcol">

         <td class = "critcell">
    <label for="artif"> Part de surfaces artificialisées :</label>
    <input type="checkbox" id="surfaces artificialisées" name="artif" value="Niv_surfart">
                    </td>

        <td class = "critcell">
    <label for="plui"> Nombre de jours de pluie par an :</label>
    <input type="checkbox" id="pluie" name="plui" value="Niv_pluie">
                    </td>

        <td class = "critcell">
    <label for="pleau"> Nombre de plans d'eau :</label>
    <input type="checkbox" id="plans d'eau" name="pleau" value="Niv_plandeau">
                    </td>
                    </tr>
    <tr class = "critcol">

        <td class = "critcell">
    <label for="medtempe"> Température médiane en juin (été) :</label>
    <input type="checkbox" id="médiane température +" name="medtempete" value="Niv_temp_ete">
                    </td>

        <td class = "critcell">
    <label for="medtemph"> Température médiane en janvier (hiver) :</label>
    <input type="checkbox" id="médiane température -" name="medtemphiver" value="Niv_temp_hiver">
                    </td>

        <td class = "critcell">
    <label for="2g"> Nombre de sites 2G :</label>
    <input type="checkbox" id="2g" name="2g" value="Niv_2G">
                    </td>
                    </tr>
    <tr class = "critcol">

        <td class = "critcell">
    <label for="3g"> Nombre de sites 3G :</label>
    <input type="checkbox" id="3g" name="3g" value="Niv_3G">
                    </td>

        <td class = "critcell">
    <label for="4g"> Nombre de sites 4G :</label>
    <input type="checkbox" id="4g" name="4g" value="Niv_4G">
                    </td>

        <td class = "critcell">
    <label for="5g"> Nombre de sites 5G :</label>
    <input type="checkbox" id="5g" name="5g" value="Niv_5G">
                    </td>
                    </tr>
    <tr class = "critcol">

        <td class = "critcell">
    <label for="qrzo"> Moyenne de qualité du réseau internet :</label>
    <input type="checkbox" id="qualité réseau" name="qrzo" value="Niv_reseau">
                    </td>
                    </tr>
 
</table>
    <input type="submit" value="Valider" />
</form>
</body>
</html>
<body>