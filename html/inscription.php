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
<label for="nom">Nom(4 à 8 characters):</label>
<input type="text" id="name" name="name" required
    minlength="3" maxlength="16" size="10"
    placeholder="Pseudo">
    <br>
<label for="nom">Adresse email :</label>
<input type="text" id="name" name="name" required
    minlength="100" maxlength="100" size="10"
    placeholder="Adresse mail">
    <br>
<label for="nom">Mot de passe (4 à 12 charactères):</label>
<input type="text" id="name" name="name" required
    minlength="4" maxlength="16" size="10"
    placeholder="Mot de passe (attention aux majuscules)">
    <br>
<label for="nom">Validez le Mot de passe :</label>
<input type="text" id="name" name="name" required
    minlength="4" maxlength="16" size="10"  placeholder="Répétez le mot de passe">
    
    <br>

</div>
</body>
</html>