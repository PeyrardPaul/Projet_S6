<!DOCTYPE html>
<html lang="fr">
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen"/>
		<title>Message</title>

    </head>
<body>

<?php 
        include 'session.php';
        if(isset($_SESSION['user']))
    {
       $me= $user['user_id'];
        function enregistre($iden,$motif,$messag)
            {
            $bdd = getBD();
            $req = $bdd->prepare('INSERT INTO contact (user_id,motif,message) VALUES(:id,:motif,:mess)');             
            $req->execute(array( 
                'id'=> $iden,
               'motif' => $_POST['drone'],
               'mess' => $_POST['mes']
            ));

            }

        if(!isset($_POST["drone"]))
        {
			header('location: message.php');
        }  
    
    } 
    echo enregistre($user['user_id'],$_POST['drone'],$_POST['mes']);
    header('location: index.php');
?>
	</body>
	<footer class="footer"><!--ici le pied de page -->
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>   
        </p> 
    </footer>
</html>
