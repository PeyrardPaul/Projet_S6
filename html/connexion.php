<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
<title>Welcome</title>
<style>
	h2 {
		text-align:center;
		padding-bottom:25px;
		padding-top:25px;
		margin: 10px 13em 10px 13em;
		background-color: black;
		color: white;
		font-family:'Open Sans', sans-serif;
		}
	
	p {
		text-align:center;
		}
	.inscrire {
		background-color: black;
		color: white;
		font-size: 18px;
		margin-right:2px;
		}
</style>
</head>
<body>
			
<h2>CONNECTEZ-VOUS</h2>

<div class="body">
<form>

<div class="pseudo">
<label for="pseudo">Pseudo</label>:
<input type="pseudo"  name="pseudo" placeholder="Saisir pseudo" required/>
</div>

<div class="password">
<label for="password" name="password">Mot de passe</label>:
<input type="password" name="password" placeholder="Saisir password" required/> 
</div>

<p><a href="MDP_oublie.html">Mot de passe oublié ?</a></p>

<button type="submit" class="login" name="login">Me connecter</button>
<br/>
</form>
</div>

<form action="inscription.php" class="ins">
	<button class="inscrire" type="submit"><h2>INSCRIVEZ-VOUS</h2></button>
</form>
</body>
</html>
