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
    <?php 
        $recup=$_POST['recup'];
	    $rep = $bdd -> query("select password from users where adresse_email ='{$recup}'");			//echo("<meta http-equiv='refresh' content='1; url=http://localhost/PEYRARD/index.php '>");
        while ($mat = $rep->fetch()) {
            if ($mat['adresse_email']!="") {
                echo "Mot de passe= ".$mat['adresse_email']."<br/>";
            }
            else {
                echo "L'adresse email ne correspond à aucun compte !";
            }
        }
	?>
</body>
</html>
