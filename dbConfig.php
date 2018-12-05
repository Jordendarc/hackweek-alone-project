<?php
//DB details
$dbHost     = 'HOST';
$dbUsername = 'DB USERNAME';
$dbPassword = 'PASSWORD';
$dbName     = 'DB NAME';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}

?>
