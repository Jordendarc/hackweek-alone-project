<?php
require 'db/dbConfig.php';
$title = empty($_POST['title']) ? '' : $_POST['title'];
$message = empty($_POST['message']) ? '' : $_POST['message'];
$email = empty($_POST['email']) ? '' : $_POST['email'];


$database = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName);
$insertion = "INSERT INTO messagesForAdmin(title,message,email)VALUES('$title','$message','$email')";
mysqli_query($database,$insertion);
mysqli_close($database);
?>
