<?php


require_once("jpgraph/src/jpgraph.php");
require_once("jpgraph/src/jpgraph_bar.php");


include '../BD.php';
$bdd= getBD();


$rep = $bdd->query("SELECT AVG(`Nombre de crimes pour 100 000 habitants`)/100 as tot, AVG(`Taux de chomage (%)`) as tot2, AVG(`Santé (nombre de médecin pour 100 000 habitants)`)/100 as tot3, AVG(`Taux de réussite au brevet (%)`) as tot4, Département FROM `departement` WHERE Département=34");
while ($ligne =$rep->fetch()) 
{
   $donnees1=$ligne['tot'];
   $donnees2=$ligne['tot2'];
   $donnees3=$ligne['tot3'];
   $donnees4=$ligne['tot4'];
  

 if($don=$ligne['Département'])
 {
   $donnees=array($donnees1,$donnees2,$donnees3,$donnees4);
 } 

$largeur = 250;
$hauteur = 200;

// Initialisation du graphique
$graphe = new Graph($largeur, $hauteur);
// Echelle lineaire ('lin') en ordonnee et pas de valeur en abscisse ('text')
// Valeurs min et max seront determinees automatiquement
$graphe->setScale("textlin");

// Creation de l'histogramme
$histo = new BarPlot($donnees);
// Ajout de l'histogramme au graphique
$graphe->add($histo);

// Ajout du titre du graphique
$graphe->title->set("Histogramme");

// Affichage du graphique
$graphe->stroke();
}
$rep->closeCursor();


// $req = $bdd->query("SELECT AVG(`Nombre de crimes pour 100 000 habitants`)/100 as tot, AVG(`Taux de chomage (%)`) as tot2, AVG(`Santé (nombre de médecin pour 100 000 habitants)`)/100 as tot3, AVG(`Taux de réussite au brevet (%)`) as tot4, Département FROM `departement` WHERE Département=1");
// while ($ligne =$req->fetch()) 
// {
//    $donnees1=$ligne['tot'];
//    $donnees2=$ligne['tot2'];
//    $donnees3=$ligne['tot3'];
//    $donnees4=$ligne['tot4'];
  

//  if($don=$ligne['Département'])
//  {
//    $donnees=array($donnees1,$donnees2,$donnees3,$donnees4);
//  } 

// $largeur = 250;
// $hauteur = 200;

// // Initialisation du graphique
// $graphe2 = new Graph($largeur, $hauteur);
// // Echelle lineaire ('lin') en ordonnee et pas de valeur en abscisse ('text')
// // Valeurs min et max seront determinees automatiquement
// $graphe2->setScale("textlin");

// // Creation de l'histogramme
// $histo2 = new BarPlot($donnees);
// // Ajout de l'histogramme au graphique
// $graphe2->add($histo2);

// // Ajout du titre du graphique
// $graphe2->title->set("Histogramme2");

// // Affichage du graphique
// $graphe2->stroke();
// }

?>