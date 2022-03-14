<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
    <title>Département</title>
</head>
<div class="bandeau">
	<img id="logo" src="../images/N-Maps.png" alt="images logo" >
	<h1><a href="index.php">N-MAPS</a></h1>
	<ul class="menu">
		<li><a href="index.php">Accueil</a></li>
		<li><a href="qui_sommes_nous.php">Qui sommes nous ?</a></li>
		<li><a href="inscription.php">Inscription</a></li>
		<li><a href="contact.php">Contact</a></li>
		<li><a href="departement.php">Département</a></li>
		<li><a href="connexion.php">Connexion</a></li>
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
    if(isset($_POST['submit']))
    {
         // Store the Product name in a "name" variable
         $name = mysqli_real_escape_string($con,$_POST['dep1']);
         
        // Store the departement ID in a "id" variable
        $id = mysqli_real_escape_string($con,$_POST['Département']); 
    }
?>
   
<form method="POST" action="comparaison_2dpaffichage.php">
        <p>Choix du premier departement</p>
        <select name="dep1">
            <?php 
                // use a while loop to fetch data 
                // from the $all_departements variable 
                // and individually display as an option
                while ($departement = mysqli_fetch_array($all_departements,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $departement["Nom"];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $departement["Nom"];
                        // To show the departement name to the user
                    ?>
                </option>
                <?php 
                endwhile; 
                // While loop must be terminated
            ?>
        </select>
</form>

        <?php
  
    // Connect to database 
    $con = mysqli_connect("localhost","root","root","projet_s6_indice_de_vie");
      
    // mysqli_connect("servername","username","password","database_name")
   
    // Get all the departements from departement table
    $sql = "SELECT * FROM `departement`";
    $all_departements = mysqli_query($con,$sql);
   
    // The following code checks if the submit button is clicked 
    // and inserts the data in the database accordingly
    if(isset($_POST['submit']))
    {
         // Store the Product name in a "name" variable
         $name = mysqli_real_escape_string($con,$_POST['dep1']);
         
        // Store the departement ID in a "id" variable
        $id = mysqli_real_escape_string($con,$_POST['Département']); 
    }
?>
                <form method="POST" action="comparaison_2dpaffichage.php">
        <p>Choix du second departement</p>
        <select name="dep2">
            <?php 
                // use a while loop to fetch data 
                // from the $all_departements variable 
                // and individually display as an option
                while ($departement = mysqli_fetch_array($all_departements,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $departement["Nom"];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $departement["Nom"];
                        // To show the departement name to the user
                    ?>
                </option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
        </select>
        <br>
        <input type="submit" value="submit" name="submit">
    </form>
    <br>

    <form>
    </form>
</body>
</html>
<body>