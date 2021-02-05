<?php
// hier word de rij de je geselecteerd had verwijderd
require 'config.php';
	$sql = "DELETE FROM back2_leden WHERE id = '".$_POST["id"]."'";  
	if(mysqli_query($mysqli, $sql))
	{  
		echo 'persoon verwijderd';
	}  
 ?>