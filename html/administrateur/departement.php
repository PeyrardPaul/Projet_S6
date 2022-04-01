<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="../../Styles/style.css" type="text/css" media="screen"/>
    <title>N-Maps</title>

<?php include 'session.php'; ?>
 <?php include 'includes/header.php'; ?> 
<body class="hold-transition  skin-purple">
<div class="bandeau"> <!--ici le bandeau haut de page -->
        <img id="logo" src="../../images/N-Maps.png" alt="images logo" >
        <h1><a href="index.php">N-MAPS</a></h1>
        </div>
  <?php include 'includes/navbar.php'; ?> 
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Département
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Acceuil</a></li>
        <li>Administration</li>
        <li class="active">Département</li>
      </ol>
    </section>

    <!-- Main content -->
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
                  <th>Département</th>
                  <th>Plus...</th>
                </thead>
                <tbody>
                  <?php
                    $conn = getBD();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM departement");
                      $stmt->execute();
                      foreach($stmt as $row){
                        echo "
                          <tr>
                            <td>".$row['Nom']."</td>
                            <td>
                              <button class='btn btn-primary btn-sm edit btn-flat' data-id='".$row['Département']."'><i class='fa fa-edit'></i> Editer</button>
                              <button class='btn btn-warning btn-sm delete btn-flat' data-id='".$row['Département']."'><i class='fa fa-trash'></i> Supprimer</button>
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
 
    <?php include 'departement_model.php'; ?>


<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('Département');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('Département');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'departement_row.php',
    data: {Département:id},
    dataType: 'json',
    success: function(response){
      $('.catid').val(response.Département);
      $('#edit_name').val(response.Nom);
      $('.catname').html(response.Nom);
    }
  });
}
</script>
</body>
</html>
