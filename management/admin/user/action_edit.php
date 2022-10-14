<?php

include '../../DB/conn.php';

$id = $_POST['id'];
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

if($password != ""){
    $sql = "UPDATE user SET username='$username', password='$password', full_name='$name', id_role='$role' WHERE id_user='$id'";
}else{
    $sql = "UPDATE user SET username='$username', full_name='$name', id_role='$role' WHERE id_user='$id'";
}
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: index.php");
    exit;
}