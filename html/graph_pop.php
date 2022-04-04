<?php 
	require '../../bd.php'; 
    session_start();
	$bdd = getBD();
?>

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
<form method="GET" action="graph_pop.php">
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



<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_pie.php');
require_once ('jpgraph/src/jpgraph_pie3d.php');


// Some data
$pop_dep= $bdd->query("select Population from departement where Département ='".$_GET['dep']."'"); //ici on affiche les informations pour le département selectionné
$pop_avg = $bdd->query("select SUM(Population) from departement"); //ici on affiche les informations pour le département selectionné

$ligne = $pop_avg ->fetch();
$ligne = $pop_dep ->fetch();

$data = array($pop_dep,10000);

// Create the Pie Graph. 
$graph = new PieGraph(350,250);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("Mon titre");

// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('red');
$p1->ExplodeSlice(1);
$graph->Stroke();

?>
