<?php require '../../bd.php'; ?>
<?php $bdd = getBD(); ?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
<title>Welcome</title>
<style>
    
</style>
</head>
<body>
    <form method=Post action="recuperation.php" autocomplete=ON>
        <p> Email de récupération :
            <input type="text" name="recup" value=""/>
        </p>
        <p>
		    <input type="submit" value="Envoyer">
		</p>
	</form>
    <?php /*
	    try{
            $db = mysqli_connect("localhost", "root", "root", "projet_s6_indice_de_vie");
            echo "Connection réussie <br/>";
        }
        catch (Exception $e){
            die('Erreur : ' . $e->getMessage().'<br/>');
        }
        
        $sql="SELECT ";
        
        if (mysqli_query($db,$sql)) {
            echo "Mot de passe récupérer ! <br/>";
        } else {
            echo "Error: " . $sql . "<br/>" . mysqli_error($bdd);
        }*/
	?>
</body>
</html>
