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

$req = $bdd->prepare("INSERT INTO 
commentaires (user_id,code_dep,id_liste,contenu)
SELECT users.user_id, users.code_dep,liste.id,commentaires.contenu
FROM users,commentaires,liste 
where users.user_id=commentaires.user_id
and commentaires.id_liste=liste.id
and commentaires.contenu=?
and users.pseudo=?
and commentaires.date_commentaire= NOW()
");
$req->execute(array($_POST['psd'], $_POST['message']));

header('Location: commentaireU.php');
?>
<!-- INSERT INTO 
commentaires (user_id,code_dep,id_liste,contenu)
SELECT users.user_id, users.code_dep,liste.id,'telme'
FROM users,commentaires,liste 
where users.user_id=commentaires.user_id
and commentaires.id_liste=liste.id
and users.pseudo='test'

INSERT INTO commentaires (user_id,code_dep,contenu)
SELECT users.user_id, users.code_dep,'boff boff'
FROM users,commentaires,liste where users.user_id=commentaires.user_id
and users.pseudo='test' -->

<!-- INSERT INTO commentaires (pseudo, message, date_commentaire)
SELECT pseudo FROM users,commentaires where users.user_id=commentaires.user_id
VALUES(?, ?,NOW()) -->