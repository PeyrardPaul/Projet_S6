<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
    <title> Inscription </title>
</head>
<body>
<div class="bandeau">
        <img id="logo" src="../images/N-Maps.png" alt="images logo" >
        <h1><a href="index.php">N-MAPS</a></h1>
        <ul class="menu">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="qui_sommes_nous.php">Qui sommes nous ?</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="departement.php">Département</a></li>
            <li><a href="connexion.php">Connexion</a></li>
        </ul>
</div>

<div>
<p>Nom:</p>
<input type="text" id="name" name="name" required
     maxlength="20" size="10"
    placeholder="Pseudo" style="margin-bottom:20px;">
    <br/>
<p>Adresse email :</p>
<input type="text" id="name" name="name" required
     maxlength="50" size="10"
    placeholder="Adresse mail" style="margin-bottom:20px;">
    <br/>
<p>Mot de passe:</p>
<input type="text" id="name" name="name" required
    minlength="4" maxlength="20" size="10"
    placeholder="Mot de passe" style="margin-bottom:20px;">
    <br/>
<p>Validez le Mot de passe :</p>
<input type="text" id="name" name="name" required
    minlength="4" maxlength="20" size="10"  placeholder="Répétez le mot de passe" style="margin-bottom:20px;">
    
    <br/>

</div>
</body>
</html>