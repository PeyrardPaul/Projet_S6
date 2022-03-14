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
<style>
    
</style>
</head>
<body>
<div class="bandeau"> <!--ici le bandeau haut de page -->
        <img id="logo" src="../images/N-Maps.png" alt="images logo" >
        <h1><a href="index.php">N-MAPS</a></h1>
        <ul class="menu">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="qui_sommes_nous.php">Qui sommes nous ?</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="departement.php">Département</a></li>
			<li><?php
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
        $recup=$_POST['recup'];
        $a=1;
	    $rep = $bdd -> query("select * from users where adresse_email ='{$recup}'");
        
        while ($mat = $rep->fetch()) {
            $mdp=$mat['password'];
            echo "<br/>";
        }
       
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        
        require '../vendor/phpmailer/phpmailer/src/Exception.php';
        require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
        require '../vendor/phpmailer/phpmailer/src/SMTP.php';
        require '../vendor/autoload.php';
        
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->Host = 'localhost';               //Adresse IP ou DNS du serveur SMTP
        $mail->Port = 25;                          //Port TCP du serveur SMTP
        $mail->SMTPAuth = false;                        //Utiliser l'identification
        $mail->SMTPAutoTLS = false; 
        $mail->CharSet = 'UTF-8';
        $mail->smtpConnect();
        
        if($mail->SMTPAuth){
           $mail->SMTPSecure = 'tls';               //Protocole de sécurisation des échanges avec le SMTP
           $mail->Username   =  '';    //Adresse email à utiliser
           $mail->Password   =  '';         //Mot de passe de l'adresse email à utiliser
        }
        
        $mail->From       = 'shelmyassiah9@gmail.com';                //L'email à afficher pour l'envoi
        
        $mail->AddAddress('paul.peyrard17@gmail.com');
        
        $mail->Subject    =  "Voici le titre du mail";                      //Le sujet du mail
        $mail->WordWrap   = 50; 
        $mail->Body = 'cefzefzefezfef';			       //Nombre de caracteres pour le retour a la ligne automatique
        $mail->AltBody = 'Salut cest le mail'; 	       //Texte brut
        $mail->IsHTML(false);                                  //Préciser qu'il faut utiliser le texte brut
        
        if ($mail->send()) {
              echo 'Message bien envoyé';
        } else{
            echo $mail->ErrorInfo;
        }
            
	?>
</body>
</html>
