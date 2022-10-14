<?php

include '../../DB/conn.php';

$role = $_POST['role'];

$sql = "INSERT INTO role VALUES('', '$role')";
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: index.php");
    exit;
}