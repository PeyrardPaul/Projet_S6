<!-- cette page permet à un utilisateur membre de se connecter, si il ne l'est pas
elle lui propose de créer un compte.
on y accède par l'index uniquement quand on n'est pas connecté -->
<?php include 'session.php'; ?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
<title>N-Maps</title>
<style>
</style>
</head>

<body class="hold-transition login-page">

<div class="bandeau"> <!--ici le bandeau haut de page -->
    <img id="logo" src="../images/N-Maps.png" alt="images logo" >
    <h1><a href="index.php">N-MAPS</a></h1>
    <ul class="menu">
		<?php
            // si l'utilisateur n'est pas connecté 
            if(!isset($_SESSION['user'])) {
                echo'<li><a href="index.php">Accueil</a></li>';
                // echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="connexion.php">Connexion </a></li>';
            } else if(isset($_SESSION['user'])) {
                // si l'utilisateur est connecté 
				header('location:index.php');
                echo'<li><a href="index.php">Accueil</a></li>';
                // echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="recherche_avancee.php">Comparer</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$user['pseudo']."</li>";
            }
        ?>
    </ul>
</div>
<div class="login-box" style="margin-top:-50px;">

	<h2><p class="box-msg"> Se connecter </p></h2>
    
    <div class="box">
        <form method="post" action="connecter.php" autocomplete="on">

            <div class="form-group has-feedback">
                <label for="pseudo"> Pseudo </label> :
                <input type="pseudo" class="form-control" name="pseudo" value="" placeholder="Saisir pseudo" required/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <label for="password" name="password"> Mot de passe </label> :
                <input type="password" class="form-control" name="password" placeholder="Saisir password" required/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span> 
            </div>

            <p style="text-align:center;margin-top:15px;"> 
                <a id="bleu" href="mdp_oublie.php"> 
                    Mot de passe oublié ? 
                </a>
            </p>
            <div class="row">
    			<div class="col-xs-5">
          			<button type="submit" class="btn btn-warning btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i>Me connecter</button>
        		</div>
      		</div>
        </form>
        <br/>
        <a href="inscription.php" class="text-center">s'inscrire</a><br>
      <a href="index.php"><i class="fa fa-home"></i> Accueil</a>
    </div>
    
    </div>
</body>
<br/>
<br/>
<br/>
	<footer class="footer">
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>  
        </p> 
    </footer>

</html>
