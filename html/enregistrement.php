<?php require '../../bd.php'; ?>
<?php $bdd = getBD(); ?>

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
					function enregistrer($n,$p,$psd,$dep,$adr,$mail,$mdp1) {
						try{
							$db = mysqli_connect("localhost", "root", "root", "projet_s6_indice_de_vie");
							echo "Connection réussie <br/>";
						}
						catch (Exception $e){
							die('Erreur : ' . $e->getMessage().'<br/>');
						}
						
						$sql="INSERT INTO users(code_dep,nom,prenom,pseudo,password,adresse_email,adresse,type,code_activation,code_reset) VALUES(".$dep.",'".$n."','".$p."','".$psd."','".$mdp1."','".$mail."','".$adr."','0',ROUND(RAND()*100),ROUND(RAND()*100))";
						
						if (mysqli_query($db,$sql)) {
							echo "Enregistrement des valeurs réussies <br/>";
						} else {
							echo "Error: " . $sql . "<br/>" . mysqli_error($bdd);
						}
					} 
				enregistrer($n,$p,$psd,$dep,$adr,$mail,$mdp1);
				echo("<meta http-equiv='refresh' content='1; url=http://localhost/Projet_S6/html/index.php '>");
			}
		?>
	</head>
	<body>
	</body>
</html>
