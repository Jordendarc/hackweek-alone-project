<?php
require 'db/dbConfig.php';
$username = empty($_POST['username']) ? '' : $_POST['username'];
$bodyText = empty($_POST['formBodyText']) ? '' : $_POST['formBodyText'];

$database = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName);
$insertion = "INSERT INTO postInformation(username,postBody)VALUES('$username','$bodyText')";
mysqli_query($database,$insertion);
mysqli_close($database);
?>
