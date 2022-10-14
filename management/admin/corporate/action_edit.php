<?php

include '../../DB/conn.php';

$id = $_POST['id_user'];
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$corporate = $_POST['corporate'];


if($password != ""){
    $sql = "UPDATE user SET username='$username', password='$password', full_name='$name' WHERE id_user='$id'";
}else{
    $sql = "UPDATE user SET username='$username', full_name='$name' WHERE id_user='$id'";
}
$query = mysqli_query($conn, $sql);
// var_dump($query);
// echo mysqli_error($conn);
// exit;

if($query){
    $sql2 = "UPDATE corporate Set corporate_name='$corporate' WHERE id_owner='$id'";
    $query = mysqli_query($conn, $sql2);

    if($query){
        header("Location: index.php");
        exit;
    }
}
echo mysqli_error($conn);
exit;