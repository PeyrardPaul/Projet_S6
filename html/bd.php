<?php
function getBD(){
$bdd = new PDO('mysql:host=localhost:8889;dbname=projet_s6_indice_de_vie;charset=utf8', 
	'root', 'root');
return $bdd;
}
?>