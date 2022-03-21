<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>NMAP_commentaires</title>
<link href="../Styles/commentaires.css" rel="stylesheet" />
</head>
<body>
<h1>A vos posts!</h1>
<p>Derniers posts</p>
<?php
include '../../bd.php';
try
{
$bdd = getBD();
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}
$req = $bdd->query('SELECT id, titre, contenu,
DATE_FORMAT(date_cree, \'%d/%m/%Y à %Hh%imin%ss\') AS
date_creation_fr FROM liste ORDER BY date_cree DESC LIMIT 0,
7');
while ($donnees = $req->fetch())
{
?>
<div class="news">
<h3>
<?php echo htmlspecialchars($donnees['titre']); ?>
<em>  <?php echo $donnees['date_creation_fr']; ?></em>
</h3>
<p>
<?php
echo nl2br(htmlspecialchars($donnees['contenu']));  //nl2br permet de convertir les retours à la ligne en balise <br/>
?>
<br />
<em><a href="commentaireU.php?liste=<?php echo $donnees['id'];
?>">Commentaires</a></em>
</p>
</div>
<?php
} 
$req->closeCursor();
?>
</body>
<footer><!--ici le pied de page -->
       <a href="index.php">Acceuil</a>
    </footer>
</html>