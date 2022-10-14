<?php

include '../DB/conn.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_us VALUES('', '$name', '$email', '$subject', '$message')";
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: ../contact.php");
    exit;
}