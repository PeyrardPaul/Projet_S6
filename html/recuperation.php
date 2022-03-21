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
        $recup=$_POST['recup'];
        $a=1;
	    $rep = $bdd -> query("select * from users where adresse_email ='{$recup}'");
        
        while ($mat = $rep->fetch()) {
            $mdp=$mat['password'];
            $nom=$mat['nom'];
            $prenom=$mat['prenom'];
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
        $mail->Host = 'smtp.gmail.com';               //Adresse IP ou DNS du serveur SMTP
        $mail->Port = 587;                          //Port TCP du serveur SMTP
        $mail->SMTPAuth = true;                        //Utiliser l'identification
        $mail->SMTPAutoTLS = true; 
        $mail->CharSet = 'UTF-8';
        $mail->SMTPSecure = 'tls';               //Protocole de sécurisation des échanges avec le SMTP
        $mail->Username   =  'projetpanms@gmail.com';    //Adresse email à utiliser
        $mail->Password   =  'PaNmS-2022';         //Mot de passe de l'adresse email à utiliser
        
        
        $mail->setFrom('projetpanms@gmail.com','N-MAPS');                //L'email à afficher pour l'envoi
        
        $mail->AddAddress($recup);
        
        $mail->Subject    =  "Récupération du mot de passe";                      //Le sujet du mail
        $mail->WordWrap   = 50; 
        $mail->Body = "Bonjour M/Mme ".$nom." ".$prenom.", vous comptez changer votre mot de passe. Si c'est bien vous, veuillez cliquer sur ce lien: <a href='http://localhost/Projet_S6/html/change_mdp.php'>Cliquer ici</a>";			       //Nombre de caracteres pour le retour a la ligne automatique
        $mail->AltBody = 'Mail de récupération de mot de passe'; 	       //Texte brut
        $mail->IsHTML(true);                                  //Préciser qu'il faut utiliser le texte brut
        
        if ($mail->send()) {
              echo 'Mail bien envoyé';
        } else{
            echo $mail->ErrorInfo;
        }
            
	?>
</body>
</html>
