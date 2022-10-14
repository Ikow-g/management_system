<?php

include '../../DB/conn.php';

$name = $_POST['name'];
$corporate = $_POST['corporate'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = 2;


$sql = "INSERT INTO user VALUES('', '$username', '$password', '$name', '$role')";
$query = mysqli_query($conn, $sql);

$id_user = mysqli_insert_id($conn);

$sql2 = "INSERT INTO corporate VALUES('', '$corporate', '$id_user')";
$query = mysqli_query($conn, $sql2);

if($query){
    header("Location: index.php");
    exit;
}else{
    echo mysqli_error($conn);
}