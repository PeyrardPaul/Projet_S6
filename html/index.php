<?php
	include 'session.php';
	//$bdd = getBD();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../Styles/style.css" type="text/css" media="screen"/>
    <title>N-Maps</title>
</head>
<body>
     <div class="bandeau"> <!--ici le bandeau haut de page -->
        <img id="logo" src="../images/N-Maps.png" alt="images logo" >
        <h1><a href="index.php">N-MAPS</a></h1>
        <ul class="menu">
        <?php
            // si l'utilisateur n'est pas connecté 
            if(!isset($_SESSION['user'])) {
                echo'<li><a href="index.php">Accueil</a></li>';
                // echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="connexion.php">Connexion </a></li>';
            } else if(isset($_SESSION['user'])) {
                // si l'utilisateur est connecté 
                echo'<li><a href="index.php">Accueil</a></li>';
                // echo'<li><a href="recherche_simple.php">Recherche simple</a></li>';
                echo'<li><a href="recherche_avancee.php">Comparer</a></li>';
                echo"<li><a href='deconnexion.php'>Déconnexion</a></li>";
                echo "<li>Bonjour ".$user['pseudo']."</li>";
            }
        ?>
 <a id="casecompteur"><img id = "compteur" src="http://www.mon-compteur.fr/html_c01genv2-235151-5" border="0" /></a>
     <!-- ce compteur est directement issu du site : http://www.mon-compteur.fr, page installation.html -->
       </ul>
    </div>
    
     <div> <!--je fais une grosse div qui contiendra la page. -->
    

        <header>
                
        <!--    <div class="header-cover">  </div>-->
                   
                        <div class="conteneur">
                            <div class="d2"></div>
                        </div>
           
           
            <div class="header-area">
                 <div class="header-content">
                    <p>
                        <?php
		                if(isset($_SESSION['user'])) {
   
							echo "Bonjour <strong><font color='white'>". $user['pseudo']. "</font></strong><br/>" ;
                            echo "Bienvenue sur N-MAPS"."<br/>";

		                }
		                else {
                            echo "Bienvenue sur N-MAPS"."<br/>";
		                }?>
                    </p>

                    <p>
                        
                        Site d'avis et de comparaison des départements français. </p>
                        Il s'agit d'un outil qui vous fera découvrir les départements de France métropolitaine à travers différents indices de vie.
                        <br/>

                        Nous souhaitons que nos utilisateurs s'approprient cet outil !<br/>
                        <br/>

                        Que ce soit pour des projets sérieux tels que le choix d'un futur lieu de résidence, <br/>

                        ou quelque chose de plus léger comme votre prochaine destination de vacance ! <br/>

                        Ou bien même pour satisfaire votre soif de connaissances... <br/>
                        <br/>

                        Prenez le temps de découvrir la France à travers différents angles,
                        nous attendons vos avis, commentaires et retours avec impatience ! <br/>
                    </p>
                   
                    
                </div> 
                
             </div> 
             
        </header>
    <?php
        if(isset($_SESSION['user'])){
            echo("
            <div class='page'>
    
            <!-- Ici on va proposer les 2 manières de s'informer sur le dpt en question  -->
                <h3>Pour découvrir la France, choississez un mode de recherche &#x1F440;</h3>
                
                    &#128077; Utilisez la  &#x1F449; <a href='recherche_simple.php'>recherche simple</a>&#x1F448; pour découvrir toutes les informations sur un département choisi. 
                <br>
                
                    &#128077; Utilisez la <a href='recherche_avancee.php'>Comparer</a> pour comparer deux départements choisis sur une liste de critères que vous sélectionnez. 
                
            </div>
            ");
        }
    ?>

        <!-- carte cliquable  -->
    <div id="ancre"></div>
    <div id="mamap">         
        <td width="650"><img src="France-departements.png" width="600" height="650" border="0"usemap="#Map" title="Carte des départements"> 
        <map name="Map">        
            <area shape="poly" coords="462,294,448,300,426,290,416,289,409,313,424,327,430,322,447,335,454,324" href="recherche_simple_affichage.php?dep=1" target="_self" title="Ain 01">
            <area shape="poly" coords="380,77,340,76,335,119,349,143,357,113,370,109" href="recherche_simple_affichage.php?dep=2" target="_self" title="Aisne 02">
            <area shape="poly" coords="302,294,319,311,330,304,360,320,372,295,356,280,332,277,318,280,316,288" href="recherche_simple_affichage.php?dep=3" target="_self" title="Allier 03">
            <area shape="poly" coords="445,432,456,458,474,453,486,450,502,444,495,429,505,415,505,403,478,411,461,428" href="recherche_simple_affichage.php?dep=4" target="_self" title="Alpes de Haute Provence 04">
            <area shape="poly" coords="457,424,477,408,505,399,509,386,490,374,474,374,483,386,457,390,447,414" href="recherche_simple_affichage.php?dep=5" target="_self" title="Hautes Alpes 05">
            <area shape="poly" coords="539,425,506,417,498,428,506,442,500,451,513,466,532,450,543,430" href="recherche_simple_affichage.php?dep=6" target="_self" title="Alpes Maritimes 06">
            <area shape="poly" coords="407,361,413,384,406,420,386,423,373,396,390,386" href="recherche_simple_affichage.php?dep=7" target="_self" title="Ardèche 07">
            <area shape="poly" coords="401,65,382,77,375,109,410,116,417,94" href="recherche_simple_affichage.php?dep=8" target="_self" title="Ardennes 08">
            <area shape="poly" coords="277,534,290,522,281,516,286,500,272,490,257,497,247,497,239,514" href="recherche_simple_affichage.php?dep=9" target="_self"title="Ariège 09">
            <area shape="poly" coords="352,171,372,198,401,193,402,175,396,166,383,156,365,162,353,161" href="recherche_simple_affichage.php?dep=10" target="_self" title="Aube 10">
            <area shape="poly" coords="342,492,315,487,312,480,283,481,277,490,289,497,286,515,296,522,300,512,335,506" href="recherche_simple_affichage.php?dep=11" target="_self" title="Aude 11">
            <area shape="poly" coords="350,447,347,434,334,425,329,397,322,389,312,405,284,414,290,430,307,432,318,453,333,457" href="recherche_simple_affichage.php?dep=12" target="_self" title="Aveyron 12">
            <area shape="poly" coords="454,491,453,461,433,459,411,447,396,473" href="recherche_simple_affichage.php?dep=13" target="_self" title="Bouches du Rhône 13">
            <area shape="poly" coords="169,112,218,111,225,136,168,144,175,131" href="recherche_simple_affichage.php?dep=14" target="_self" title="Calvados 14">
            <area shape="poly" coords="292,385,300,404,317,385,332,393,346,383,339,366,313,357,300,367" href="recherche_simple_affichage.php?dep=15" target="_self" title="Cantal 15">
            <area shape="poly" coords="236,314,201,319,188,336,201,368,219,347,238,324" href="recherche_simple_affichage.php?dep=16" target="_self" title="Charente 16">
            <area shape="poly" coords="156,299,143,303,151,332,173,359,192,371,197,369,188,360,184,335,193,326,194,316" href="recherche_simple_affichage.php?dep=17" target="_self" title="Charente Maritime 17">
            <area shape="poly" coords="296,290,333,270,325,230,301,223,296,242,284,245,294,254" href="recherche_simple_affichage.php?dep=18" target="_self" title="Cher 18">
            <area shape="poly" coords="259,357,265,380,290,381,307,354,308,340,290,337" href="recherche_simple_affichage.php?dep=19" target="_self" title="Corrèze 19">
            <area shape="poly" coords="380,202,388,213,381,238,383,246,408,259,424,257,434,236,432,221,425,222,411,212,400,197" href="recherche_simple_affichage.php?dep=21" target="_self" title="Côte d'Or 21">
            <area shape="poly" coords="64,139,63,176,110,181,124,171,126,153" href="recherche_simple_affichage.php?dep=22" target="_self" title="côtes d'Armor 22">
            <area shape="poly" coords="267,300,282,331,308,334,314,315,297,295,282,295" href="recherche_simple_affichage.php?dep=23" target="_self" title="Creuse 23">
            <area shape="poly" coords="205,374,202,388,244,403,262,381,254,358,230,343" href="recherche_simple_affichage.php?dep=24" target="_self" title="Dordogne 24">
            <area shape="poly" coords="448,243,470,272,494,235,487,222" href="recherche_simple_affichage.php?dep=25" target="_self" title="Doubs 25">
            <area shape="poly" coords="411,362,426,374,448,396,442,415,451,425,438,426,409,419,418,386" href="recherche_simple_affichage.php?dep=26" target="_self" title="Drôme 26">
            <area shape="poly" coords="222,109,229,139,242,153,267,141,267,131,277,118,275,109,246,117" href="recherche_simple_affichage.php?dep=27" target="_self" title="Eure 27">
            <area shape="poly" coords="267,144,276,170,287,181,267,194,244,185,246,166,245,156" href="recherche_simple_affichage.php?dep=28" target="_self" title="Eure et Loir 28">
            <area shape="poly" coords="60,147,62,200,25,197,14,178,13,150,40,144" href="recherche_simple_affichage.php?dep=29" target="_self" title="Finistère 29">
            <area shape="poly" coords="391,474,412,438,403,425,388,427,375,421,376,434,355,435,355,446,370,445,381,456" href="recherche_simple_affichage.php?dep=30" target="_self" title="Gard 30">
            <area shape="poly" coords="267,450,281,479,260,492,246,495,236,511,222,521,225,506,223,493,232,481,245,480,254,469,250,456" href="recherche_simple_affichage.php?dep=31" target="_self"  title="Haute Garonne 31">
            <area shape="poly" coords="192,449,188,466,200,474,214,480,241,477,249,469,233,440" href="recherche_simple_affichage.php?dep=32" target="_self" title="Gers 32">
            <area shape="poly" coords="147,406,191,425,208,394,194,390,200,378,173,363,155,347" href="recherche_simple_affichage.php?dep=33" target="_self" title="Gironde 33">
            <area shape="poly" coords="387,474,374,455,362,449,345,453,322,468,317,475,316,484,327,483,343,489" href="recherche_simple_affichage.php?dep=34" target="_self" title="Hérault 34">
            <area shape="poly" coords="131,153,130,173,111,184,123,209,151,206,163,192,163,163" href="recherche_simple_affichage.php?dep=35" target="_self" title="Ille et Vilaine 35">
            <area shape="poly" coords="255,297,291,290,291,255,278,244,262,248,259,258,251,257,247,279" href="recherche_simple_affichage.php?dep=36" target="_self" title="Indre 36">
            <area shape="poly" coords="218,224,210,248,234,260,242,276,249,257,257,246,235,216" href="recherche_simple_affichage.php?dep=37" target="_self" title="Indre et Loire 37">
            <area shape="poly" coords="434,332,454,354,466,353,468,365,474,381,451,392,439,376,427,363,412,353,422,341" href="recherche_simple_affichage.php?dep=38" target="_self" title="Isère 38">
            <area shape="poly" coords="438,242,429,258,433,289,448,296,459,291,463,271" href="recherche_simple_affichage.php?dep=39" target="_self" title="Jura 39">
            <area shape="poly" coords="132,466,184,464,187,446,200,439,173,418,147,410" href="recherche_simple_affichage.php?dep=40" target="_self" title="Landes 40">
            <area shape="poly" coords="238,212,261,243,292,240,297,221,275,215,265,199,245,192" href="recherche_simple_affichage.php?dep=41" target="_self" title="Loir et Cher 41">
            <area shape="poly" coords="364,324,374,358,389,358,399,364,407,354,386,341,391,330,383,310,368,309" href="recherche_simple_affichage.php?dep=42" target="_self" title="Loire 42">
            <area shape="poly" coords="340,362,350,382,370,393,397,367,387,361,366,363,356,359" href="recherche_simple_affichage.php?dep=43" target="_self" title="Haute Loire 43">
            <area shape="poly" coords="96,229,149,208,164,229,145,237,154,250,139,257,117,254" href="recherche_simple_affichage.php?dep44=" target="_self" title="Loire Atlantique 44">
            <area shape="poly" coords="271,197,278,212,319,225,332,192,311,190,306,180,292,180,284,190" href="recherche_simple_affichage.php?dep=45" target="_self" title="Loiret 45">
            <area shape="poly" coords="245,409,251,420,269,426,281,421,278,411,294,406,289,385,267,383" href="recherche_simple_affichage.php?dep=46" target="_self" title="Lot 46">
            <area shape="poly" coords="196,429,203,438,230,436,246,421,241,407,212,398" href="recherche_simple_affichage.php?dep=47" target="_self" title="Lot et Garonne 47">
            <area shape="poly" coords="349,386,334,403,339,424,356,433,372,432,374,415,368,398" href="recherche_simple_affichage.php?dep=48" target="_self" title="Lozère 48">
            <area shape="poly" coords="160,209,170,230,156,237,157,251,179,253,208,244,209,220,184,210" href="recherche_simple_affichage.php?dep=49" target="_self" title="Maine et Loire 49">
            <area shape="poly" coords="136,88,152,157,175,159,175,145,166,145,168,111,157,91" href="recherche_simple_affichage.php?dep=50" target="_self" title="Manche 50">
            <area shape="poly" coords="361,114,409,119,410,150,398,163,385,154,354,156,352,145" href="recherche_simple_affichage.php?dep=51" target="_self" title="Marne 51">
            <area shape="poly" coords="409,156,401,167,408,177,404,193,424,216,443,208,449,198,432,171" href="recherche_simple_affichage.php?dep=52" target="_self" title="Haute Marne 52">
            <area shape="poly" coords="167,163,168,194,156,204,186,206,201,170,197,162" href="recherche_simple_affichage.php?dep=53" target="_self" title="Mayenne 53">
            <area shape="poly" coords="445,159,462,169,494,156,452,131,447,104,437,100,442,137" href="recherche_simple_affichage.php?dep=54" target="_self" title="Meurthe et Moselle 54">
            <area shape="poly" coords="418,100,413,154,433,165,443,163,434,101" href="recherche_simple_affichage.php?dep=55" target="_self" title="Meuse 55">
            <area shape="poly" coords="67,205,72,231,121,216,107,185,62,179,66,190" href="recherche_simple_affichage.php?dep=56" target="_self" title="Morbihan 56">
            <area shape="poly" coords="454,106,474,106,530,124,494,130,499,154,465,136,454,125" href="recherche_simple_affichage.php?dep=57" target="_self" title="Moselle 57">
            <area shape="poly" coords="328,227,336,261,336,273,361,277,377,270,376,238,351,229" href="recherche_simple_affichage.php?dep=58" target="_self" title="Nièvre 58">
            <area shape="poly" coords="296,12,322,34,333,58,338,69,376,70,375,56,338,30,309,9" href="recherche_simple_affichage.php?dep=59" target="_self" title="Nord 59">
            <area shape="poly" coords="282,93,283,121,304,122,316,129,332,126,330,95,311,97" href="recherche_simple_affichage.php?dep=60" target="_self" title="Oise 60">
            <area shape="poly" coords="177,146,178,159,202,160,205,170,222,164,239,183,243,160,223,139" href="recherche_simple_affichage.php?dep=61" target="_self" title="Orne 61">
            <area shape="poly" coords="293,15,314,35,334,68,310,63,275,48,277,21" href="recherche_simple_affichage.php?dep=62" target="_self" title="Pas de calais 62">
            <area shape="poly" coords="312,332,313,352,338,359,370,355,362,336,360,325,327,309,317,315" href="recherche_simple_affichage.php?dep=63" target="_self" title="Puy de Dôme 63">
            <area shape="poly" coords="123,478,128,470,191,469,196,479,179,512,136,497" href="recherche_simple_affichage.php?dep=64" target="_self" title="Pyrénées Atlantiques 64">
            <area shape="poly" coords="224,483,217,497,218,520,194,521,184,511,198,490,200,476,209,482" href="recherche_simple_affichage.php?dep=65" target="_self" title="Hautes Pyrénées 65">
            <area shape="poly" coords="335,511,304,516,294,524,280,536,289,543,317,544,341,538" href="recherche_simple_affichage.php?dep=66" target="_self" title="Pyrénées Orientales 66">
            <area shape="poly" coords="540,130,520,127,510,134,493,132,504,144,500,171,519,177" href="recherche_simple_affichage.php?dep=67" target="_self" title="Bas Rhin 67">
            <area shape="poly" coords="504,175,494,201,511,219,521,218,519,183" href="recherche_simple_affichage.php?dep=68" target="_self" title="Haut Rhin 68">
            <area shape="poly" coords="408,349,423,330,409,323,407,308,394,303,388,318,396,331,390,340" href="recherche_simple_affichage.php?dep=69" target="_self" title="Rhône 69">
            <area shape="poly" coords="437,214,438,238,444,239,486,220,487,202,459,195,446,211" href="recherche_simple_affichage.php?dep=70" target="_self" title="Haute Saône 70">
            <area shape="poly" coords="364,279,376,293,373,306,406,298,413,286,428,286,424,259,407,263,378,248,378,272" href="recherche_simple_affichage.php?dep=71" target="_self" title="Saône et Loire 71">
            <area shape="poly" coords="221,167,206,177,192,206,219,221,236,212,241,187,222,180" href="recherche_simple_affichage.php?dep=72" target="_self" title="Sarthe 72">
            <area shape="poly" coords="491,371,510,357,504,337,484,327,476,336,457,330,451,340,454,349,468,348,473,364" href="recherche_simple_affichage.php?dep=73" target="_self" title="Savoie 73">
            <area shape="poly" coords="493,291,473,301,459,313,462,328,475,330,483,324,494,326,504,317" href="recherche_simple_affichage.php?dep=74" target="_self" title="Haute Savoie 74">
            <!-- <area shape="poly" coords="302,142,314,136,315,152,302,151" href="Paris-html.htm" title="Paris et région Parisienne" target="_self"> -->
            <area shape="poly" coords="34,54,48,45,61,44,65,56,72,60,60,62,49,64" href="recherche_simple_affichage.php?dep=75" title="Paris 75" target="_self">
            <area shape="poly" coords="216,101,232,83,265,71,275,88,278,104,267,107,246,113,234,104" href="recherche_simple_affichage.php?dep=76" target="_self" title="Seine Maritime 76">
            <area shape="poly" coords="317,131,337,131,351,159,342,172,333,173,328,187,309,182,318,151" href="recherche_simple_affichage.php?dep=77" target="_self" title="Seine et Marne 77">
            <area shape="poly" coords="269,133,283,134,297,140,298,150,292,154,281,169,274,156" href="recherche_simple_affichage.php?dep=78" target="_self" title="Yvelines 78">
            <area shape="poly" coords="174,258,183,294,174,303,200,316,210,313,200,253" href="recherche_simple_affichage.php?dep=79" target="_self" title="Deux Sèvres 79">
            <area shape="poly" coords="269,69,284,87,316,92,333,90,332,74,303,65,275,51" href="recherche_simple_affichage.php?dep=80" target="_self" title="Somme 80">
            <area shape="poly" coords="270,446,290,435,305,439,314,455,329,460,316,471,305,477,287,477" href="recherche_simple_affichage.php?dep=81" target="_self" title="Tarn 81">
            <area shape="poly" coords="237,438,247,455,273,441,286,433,284,423,268,430,249,423" href="recherche_simple_affichage.php?dep=82" target="_self" title="Tarn et Garonne 82">
            <area shape="poly" coords="457,490,457,460,476,458,496,454,510,469,495,488,475,495" href="recherche_simple_affichage.php?dep=83" target="_self" title="Var 83">
            <area shape="poly" coords="407,422,414,438,415,445,432,456,450,456,445,442,438,429,422,426" href="recherche_simple_affichage.php?dep=84" target="_self" title="Vaucluse 84">
            <area shape="poly" coords="141,262,151,253,169,259,177,296,170,301,127,286,105,254" href="recherche_simple_affichage.php?dep=85" target="_self" title="Vendée 85">
            <area shape="poly" coords="203,249,213,312,237,310,250,296,231,262,217,258" href="recherche_simple_affichage.php?dep=86" target="_self" title="Vienne 86">
            <area shape="poly" coords="235,340,258,353,284,337,273,330,262,301,249,300,238,313,245,323" href="recherche_simple_affichage.php?dep=87" target="_self" title="Haute Vienne 87">
            <area shape="poly" coords="497,161,491,194,459,193,451,195,438,169,449,165,459,174" href="recherche_simple_affichage.php?dep=88" target="_self" title="Vosges 88">
            <area shape="poly" coords="380,231,385,215,377,202,367,202,348,175,334,178,335,196,331,222,356,227" href="recherche_simple_affichage.php?dep=89" target="_self" title="Yonne 89">
            <area shape="poly" coords="492,204,494,226,512,224,501,214" href="recherche_simple_affichage.php?dep=90" target="_self" title="Territoire de Belfort 90">
            <area shape="poly" coords="300,153,315,154,307,176,297,175,290,180,286,170" href="recherche_simple_affichage.php?dep=91" target="_self" title="Essonne 91">
            <area shape="poly" coords="44,29,49,41,31,52,31,58,49,67,45,87,19,63,20,45" href="recherche_simple_affichage.php?dep=92" target="_self" title="Hauts de Seine 92">
            <area shape="poly" coords="52,26,52,40,64,43,68,52,79,53,95,67,94,42,91,16" href="recherche_simple_affichage.php?dep=93" target="_self" title="Seine Saint denis 93">
            <area shape="poly" coords="52,68,51,84,92,98,97,68,79,58,71,65" href="recherche_simple_affichage.php?dep=94" target="_self" title="Val de Marne 94">
            <area shape="poly" coords="278,123,303,124,314,132,299,139,289,131,273,128" href="recherche_simple_affichage.php?dep=95" target="_self" title="Val d'Oise 95">
        </map>

    </div>
            <!-- fin de la carte cliquable -->
    </div>
 
    
</body>
    <footer class="footer"><!--ici le pied de page -->
        <p>N-Maps &copy; 2022 
        -   <a href="qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="contact.php"> Nous contacter </a>   
        </p> 
    </footer>
   
</html>

