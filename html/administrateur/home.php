<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"href="../../Styles/style.css"type="text/css"media="screen"/>
    <title> Admin </title>
</head>
<body>

<div class="bandeau"> <!--ici le bandeau haut de page -->
        <img id="logo" src="../../images/N-Maps.png" alt="images logo" >
        <h1><a href="index.php">N-MAPS</a></h1>
        <ul class="menu">

        <p>
             <?php


                       include 'session.php';
		                if(isset($_SESSION['admin'])) {

                            echo "Welcome ".$admin['pseudo']."<br/>";
                            echo'<li><a href="../index.php">Accueil</a></li>';
                            echo'<li><a href="../contact.php">Contact</a></li>';
                            echo"<li><a href='../deconnexion.php'>Déconnexion</a></li>";
                            echo'<li><a href="../commentaire.php"> Espace commentaires</a></li>';

		                }
		                else 
                        {
                            //echo "Welcome admin"."<br/>";
                            echo "Vous n'êtes pas administrateur";
                           
		                }?>
                    </p>
       </ul>
    </div>
    <header>
                
        
                   
                        <div class="conteneur">
                        <div class="d2"></div>
                        </div>
           
           
            <div class="header-area">
                 <div class="header-content">

                    <p>
                        Site d'avis et de comparaison des départements en France. </p>
                        Il s'agit d'un outil qui a pour but principal 
                        de vous faire découvrir les départements de France métropolitaine à travers différents indices de vie.
                        <br/>

                        Nous souhaitons que nos utilisateurs s'approprient cet outil !<br/>
                        <br/>

                        Que ce soit pour des projets sérieux tels que le choix d'un futur lieu de résidence. <br/>

                        Ou quelque chose de plus léger comme votre prochaine destination de vacance ! <br/>

                        Et même pour satisfaire votre soif de connaissances... <br/>
                        <br/>

                        Prenez le temps de découvrir la France à travers différents angles,
                        nous attendons vos avis, commentaires et retours avec impatience ! <br/>
                    </p>
                   
                    
                </div> 
                
             </div> 
             
        </header>
    
     <!-- <div> 
    
        
</body>

<footer>
        <p>N-Maps © 2022 - <a id="quisommesnous" href="qui_sommes_nous.php">Qui sommes nous ?</a></p>
        
</footer> -->


<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-purple ">
<div class="">

  <?php include 'includes/navbar.php'; ?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestion
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Acceuil</a></li>
        <li class="active">Gestion</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
    
    <?php include 'includes/menubar.php'; ?>
   
     

      </section>
      <!-- right col -->
    </div>
  

</div>


<?php include 'includes/scripts.php'; ?>

<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>

<footer><!--ici le pied de page -->
        <p>N-Maps &copy; 2022 
        -   <a href="../qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="../commentaire.php"> Espace commentaires</a>  
        </p> 
    </footer>


</html>