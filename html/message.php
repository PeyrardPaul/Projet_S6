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
        $me=$_POST['mes'];
        $u=$user['user_id'];
        function enregistre($iden,$messag) 
            {
            $bdd = getBD();
            $req = $bdd->prepare('INSERT INTO messages (user_id, contenu) VALUES("'.$user['user_id'].'","'.$_POST['mes'].'")'); 
            // trouver ou est stockée l'id user
            
            $req->execute(array( 
                $u,
                $_POST['mes']
                                ));

            }

        if(!isset($_POST["aide"]) && !isset($_POST["dem"]) && !isset($_POST["pl"]))
        {
			if($_POST['mail']=="" or $_POST['mes']=="" )
            {
					echo("<meta http-equiv='refresh' content='1; url=contact.php '>");
			}
            else{
                echo "rien";
            }
        }  
        else
        {  
                 enregistre($user['user_id'],$_POST['mes']);
                 header('location: recu.php');                       
        }
    
    }   
    echo 'INSERT INTO messages (user_id, contenu) VALUES("'.$user['user_id'].'","'.$_POST['mes'].'")';
		?>
	</body>
	<footer class="footer"><!--ici le pied de page -->
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>   
        </p> 
    </footer>
</html>
