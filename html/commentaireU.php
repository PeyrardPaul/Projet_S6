<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Commentaires</title>
<link href="../Styles/commentaires.css" rel="stylesheet" />
</head>
<body>
<h1>A vos posts!</h1>
<p><a href="commentaire.php">Retour à la liste des posts</a></p>
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

$req = $bdd->prepare('SELECT id, titre, contenu,
DATE_FORMAT(date_cree, \'%d/%m/%Y à %Hh%imin%ss\') AS
date_creation_fr FROM liste WHERE id = ?');
$req->execute(array($_GET['liste']));
$donnees = $req->fetch();
?>
<div class="news">
<h3>
<?php echo htmlspecialchars($donnees['titre']); ?>
<em>le <?php echo $donnees['date_creation_fr']; ?></em>
</h3>
<p>
<?php
echo nl2br(htmlspecialchars($donnees['contenu']));
?>
</p>
</div>
<h2>Commentaires</h2>
<?php
$req->closeCursor();

$req = $bdd->prepare('SELECT user_id, contenu,
DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS
date_commentaire_fr FROM commentaires WHERE id_liste = ? ORDER BY
date_commentaire');
$req->execute(array($_GET['liste']));
while ($donnees = $req->fetch())
{
?>
<p><strong><?php echo htmlspecialchars($donnees['user_id']); ?>
</strong>  <?php echo $donnees['date_commentaire_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?>
</p>
<?php
} 
$req->closeCursor();
?>
</body>
</html>