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

<body>

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
	  $name = mysqli_real_escape_string($con,$_POST['code_dep']);
	
  }
?>
<form method="POST" action="comparaison_critere_affichage.php">
        <label>Choix dep</label>
        <select name="code_dep">
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
        <input type="submit" value="submit" name="submit">
    </form>
</body>