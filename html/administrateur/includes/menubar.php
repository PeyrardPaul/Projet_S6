
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<style>
table
{
border-collapse: collapse;
 background-color: grey;
}
tr,th,td
{
border: 2px solid black;

}

td
{

width: 300px;
height: 50px;

 font-size: 1em;

}

th
{
  width: 130px;
  height: 100px;

font-size: 1.3em;

}
span
{
  width: 500px;
height: 200px;
text-align: justify;
}
</style>

</head>

<aside class="content">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left info">
        <p><?php echo $admin['prenom'].' '.$admin['pseudo']; ?></p>
        <a><i class="fa fa-circle text-success"></i>Connecté(e)</a>
      </div>
    </div>
    <br><br>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="menu" data-widget="tree">

<table>

<tr>
   <th>   <div class="header">Administration</div>   </th>

    <td>  <div><a href="users.php"><i class="fa"></i> 
        <span>Utilisateurs</span></a></div> </td>
    <td>  <div class="treeview">
        
        <ul class="treeview-menu">
          <div><a href="departement.php"><i class="fa"></i> Liste des départements</a></div>
         
        </ul>
      </div>
   </td>
  
   </tr>
</table>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>