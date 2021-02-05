<?php
// mijn fdatabase gegevens
$db_hostname ='localhost';
$db_username ='82738';
$db_wachtwoord ='Tris2001';
$db_database = '82738_back2';

//maak database connectie dinges
$mysqli = mysqli_connect($db_hostname, $db_username, $db_wachtwoord, $db_database);


//geeft een melding als de verbinding niet gelukt is

if (!$mysqli){
    echo 'Fout! er is geen verbinding gemaakt met de database.<br/>';
    echo 'Foutnummer is:'.mysqli_connect_errno().'<br/>';
    echo 'Foutnummer is:'.mysqli_connect_error().'<br/>';
    exit();
}