<?php 
	require '../../bd.php'; 	
	$bdd = getBD();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen"/>
		<title>Enregistrement</title>
		<?php 
			if($_POST['n']=="" or
				$_POST['p']=="" or
                $_POST['psd']=="" or
                $_POST['dep']=="" or
				$_POST['adr']=="" or
				$_POST['mail']=="" or
				$_POST['mdp1']=="" or
				$_POST['mdp2']=="" or 
				($_POST['mdp1']!=$_POST['mdp2']) or
                $_POST['dep']>95 and $_POST['dep']<=0) {
					echo("<meta http-equiv='refresh' content='1; url=http://localhost/PEYRARD/inscription.php?n=".$_POST['n']."&p=".$_POST['p']."&psd=".$_POST['psd']."&dep=".$_POST['dep']."&adr=".$_POST['adr']."&mail=".$_POST['mail']." '>");
			}
			else {
					$n=$_POST['n'];
					$p=$_POST['p'];
                    $psd=$_POST['psd'];
                    $dep=$_POST['dep'];
					$adr=$_POST['adr'];
					$mail=$_POST['mail'];
					$mdp1=$_POST['mdp1'];
					function  enregistrer($depart,$nom,$pre,$psdo,$mdp,$email,$adres) 
					{
						$bdd = getBD();

						$req = $bdd->prepare('INSERT INTO users (user_id,code_dep, nom, prenom, pseudo,password,adresse_email,adresse,type,password_reset)
						VALUES(?,?,?,?,?,?,?,?,?,?)'); 
					    $req->execute(array($_POST['user_id'], $_POST['dep'],
					    $_POST['n'],$_POST['p'],$_POST['psd'],$_POST['mdp1'],$_POST['mail'],$_POST['adr'],'0',''));

						// $sql="INSERT INTO users(code_dep,nom,prenom,pseudo,password,adresse_email,adresse,type,code_activation,code_reset) VALUES($dep,$n,$p,$psd,$psw,$mail,$adr,'0',ROUND(RAND()*100),ROUND(RAND()*100))";

						// if (mysqli_query($db,$sql)) {
						// 	echo "Enregistrement des valeurs réussies <br/>";
						// } else {
						// 	echo "Error: " . $sql . "<br/>" . mysqli_error($bdd);
						// }
					} 

				enregistrer($n,$p,$psd,$dep,$adr,$mail,$mdp1);
				header('location: index.php');
				
			}
		?> 
	</head>
	<body>
	</body>
	<footer class="footer"><!--ici le pied de page -->
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>   
        </p> 
    </footer>
</html>
