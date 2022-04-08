<!-- cette page sert uniquement à détruire la session utilisateur et donc à 
déconnecter celui ci  -->
<?php
	session_start();
	session_destroy();

	header('location: index.php');
?>