<?php
//hier word de rij die net gemaakt is toegeoecht aan de database
require 'config.php';
$sql = "INSERT INTO back2_leden(Titel, Text, Link) VALUES('".$_POST["Titel"]."','".$_POST["Text"]."','" .$_POST["Link"]. "')";
if(mysqli_query($mysqli, $sql))
{  
     echo 'Persoon toegevoegd';
}  
 ?>