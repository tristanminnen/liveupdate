<?php
//hier wordt de voornaam, achternaam of email gewijzicht
require 'config.php';
	$id = $_POST["id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE back2_leden SET ".$column_name."='".$text."' WHERE id='".$id."'";  
	if(mysqli_query($mysqli, $sql))
	{  
		echo 'persoon is bijgewerkt';
	}  
 ?>