<?php

include '../../DB/conn.php';

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$corporate = $_SESSION['corporate'];
$role = 3;

$sql = "INSERT INTO user VALUES('', '$username', '$password', '$name', '$role')";
$query = mysqli_query($conn, $sql);

$id_user = mysqli_insert_id($conn);

if($query){
    $sql2 = "INSERT INTO corporate_employee VALUES('$id_user', '$corporate')";
    $query2 = mysqli_query($conn, $sql2);
    if($query2){
        header("Location: index.php");
        exit;
    }
}
echo mysqli_error($conn);