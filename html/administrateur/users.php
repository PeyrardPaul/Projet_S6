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
        <h1><a href="home.php">N-MAPS</a></h1>
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

<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  

 
  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
       Utilisateurs
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">Utilisateurs</li>
      </ol>
    </section>


    <section class="content">
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                 
                  <th>Email</th>
                  <th>Nom complet</th>
                  <th>Département</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <?php
                    $conn = getBD();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM users,departement WHERE users.code_dep=departement.Département AND type=:type");
                      $stmt->execute(['type'=>0]);
                      foreach($stmt as $row){
                      
                        // $status = ($row['status']) ? '<span class="label label-success">active</span>' : '<span class="label label-danger">not verified</span>';
                        // $active = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="'.$row['id'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
                        echo "
                          <tr>
                            <td>".$row['adresse_email']."</td>
                            <td>".$row['nom'].' '.$row['prenom']."</td>
                            <td>".$row['Nom']."</td>
                         
                            <td>
                             
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['user_id']."'><i class='fa fa-edit'></i> Editer</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['user_id']."'><i class='fa fa-trash'></i> Supprimer</button>
                            </td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $stmt->closeCursor();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	
    <?php include 'users_modal.php'; ?>

</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

//   $(document).on('click', '.photo', function(e){
//     e.preventDefault();
//     var id = $(this).data('id');
//     getRow(id);
//   });

//   $(document).on('click', '.status', function(e){
//     e.preventDefault();
//     var id = $(this).data('id');
//     getRow(id);
//   });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'users_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.userid').val(response.user_id);
      $('#edit_contact').val(response.code_dep);
      $('#edit_firstname').val(response.nom);
      $('#edit_lastname').val(response.prenom);
      $('#edit_pseudo').val(response.pseudo);
      $('#edit_password').val(response.password);
      $('#edit_email').val(response.adresse_email);
      $('#edit_address').val(response.adresse);
      
      $('.fullname').html(response.nom+' '+response.prenom);
    }
  });
}
</script>
</body>
<footer class="footer"><!--ici le pied de page -->
        <p>N-Maps &copy; 2022 
        -   <a href="../qui_sommes_nous.php"> Qui sommes nous ? </a>   
        -   <a href="../commentaire.php"> Espace commentaires</a>  
        </p> 
    </footer>


</html>

