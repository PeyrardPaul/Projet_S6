
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet"href="../Styles/style.css"type="text/css"media="screen"/>
<title>N-Maps</title>
<style>
	h2 {
		text-align:center;
		padding-bottom:25px;
		padding-top:25px;
		margin: 10px 13em 10px 13em;
		background-color: #0E0D3F;
		color: white;
		}
	
	p {
		text-align:center;
		margin-top:10px;
		margin-left:105px;
		}
	a {
		color: blue;
	}
</style>
</head>

<?php include 'session.php'; ?>


<?php $bdd = getBD(); ?>

<?php
  if(isset($_SESSION['user']))
  {
    header('location: index.php');
  }
?>

<body>
			
<h2>CONNECTEZ-VOUS</h2>
<div class="body">

	<form method=Post action="connecter.php" autocomplete=ON>
		<div class="pseudo">
			<label for="pseudo">Pseudo</label>:
			<input type="pseudo"  name="pseudo" value="" placeholder="Saisir pseudo" required/>
		</div>

		<div class="password">
			<label for="password" name="password">Mot de passe</label>:
			<input type="password" name="password" placeholder="Saisir password" required/> 
		</div>

		<p><a href="mdp_oublie.php">Mot de passe oublié ?</a></p>

		<input type="submit" class="login" name="login" value="Me connecter"/>
		<br/>
	</form>
</div>

<a href="inscription.php"><h2>INSCRIVEZ-VOUS</h2></a>
</body>
</html>
