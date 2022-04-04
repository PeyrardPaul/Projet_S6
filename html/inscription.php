<?php
	//include '../../bd.php';
	include 'session.php';
	//$bdd = getBD();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <title> Inscription </title>
</head>
<body class="hold-transition register-page">
<div class="bandeau"> <!--ici le bandeau haut de page -->
        <img id="logo" src="../images/N-Maps.png" alt="images logo" >
        <h1><a href="index.php">N-MAPS</a></h1>
        <ul class="menu">
        <?php
            // si l'utilisateur n'est pas connecté 
            if(!isset($_SESSION['user'])) {
                echo'<li><a href="index.php">Accueil</a></li>';
                //echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="connexion.php">Connexion </a></li>';
            } else if(isset($_SESSION['user'])) {
                // si l'utilisateur est connecté 
                echo'<li><a href="index.php">Accueil</a></li>';
                //echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="recherche_avancee.php">Comparer</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$_SESSION['user'][2]."</li>";
            }
        ?>
        </ul>
    </div>
<div>

<div class="register-box" style="margin-top:-50px;">

<h2><p class="box-msg"> Enregistrement </p></h2>
    
    <div class="box">
            <form method=Post action="enregistrement.php" autocomplete=ON>
                
            <div class="form-group has-feedback">
            <label for="nom">Nom </label>:
                <input type="text" class="form-control" id="name" name="n" required
                maxlength="20" size="10"
                placeholder="Nom"  >
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
             
            <div class="form-group has-feedback">
            <label for="prenom">Prénom </label>:
                <input type="text" id="name" class="form-control" name="p" required
                maxlength="50" size="10"
                placeholder="Prénom">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            
            <div class="form-group has-feedback">
            <label for="pseudo">Pseudo</label> :
                <input type="text" id="name" class="form-control" name="psd" required
                maxlength="50" size="10"
                placeholder="Pseudo"  >
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
             
            <div class="form-group has-feedback">
            <label for="dep">Département</label> :
                <input type="text" class="form-control" id="name" name="dep" required
                maxlength="2" size="10"
                placeholder="Département Ex: 34"  >
                <span class="glyphicon glyphicon-globe form-control-feedback"></span>
            </div>
            
            <div class="form-group has-feedback">
            <label for="mail">Email</label> :
                <input type="text" id="name" class="form-control" name="mail" required
                maxlength="50" size="10"
                placeholder="Adresse mail"  >
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
                
            <div class="form-group has-feedback">
            <label for="adr">Adresse</label> :
                <input type="text" id="name" class="form-control" name="adr" required
                maxlength="50" size="10"
                placeholder="Adresse" >
                <span class="glyphicon glyphicon-bed form-control-feedback"></span>
            </label>
                
            <div class="form-group has-feedback">
            <label for="mdp1">Mot de passe </label>:
                <input type="password" id="name" class="form-control" name="mdp1" required
                minlength="4" maxlength="20" size="10"
                placeholder="Mot de passe">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
                
            <div class="form-group has-feedback">
            <label for="mdp2">Confirmez</label> :
                <input type="password" id="name" class="form-control" name="mdp2" required
                minlength="4" maxlength="20" size="10"  placeholder="Répétez le mot de passe" >
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <br/>

            </div>

            <hr>
          <div class="row">
          <div class="col-xs-5">
                <button type="submit" class="btn btn-warning btn-block btn-flat" name="signup"><i class="fa fa-pencil"></i>Envoyer</button>
            </div>
          </div>
    
            </form>
            <br>
      <a href="connexion.php">J'ai déjà un compte</a><br>
      <a href="index.php"><i class="fa fa-home"></i> Acceuil</a>
        </div>
    </div>

</body>
<br/>
<br/>
<footer class="footer">
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>  
        </p> 
    </footer>
</html>