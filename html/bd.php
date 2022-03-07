<?php
function getBD(){
$bdd = new PDO('mysql:host=localhost;dbname=projet_s6_indice_de_vie;charset=utf8', 
'root', '');
return $bdd;
}
?>