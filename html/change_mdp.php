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
            <p><strongVeuillez saisir votre nouveau mot de passe :</strong>
                <input type='password' id='name' name='mdp' required
                minlength='4' maxlength='20' size='10'
                placeholder='Mot de passe' style='margin-bottom:20px;'>
            </p>
            <p><div style='margin-left: 150px;'>
		        <input type='submit' value='Envoyer' />
            </div></p>
        </form>";
    }
    ?>
</body>
</html>
