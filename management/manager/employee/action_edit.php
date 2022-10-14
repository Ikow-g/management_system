<?php

include '../../DB/conn.php';

$id = $_POST['id_user'];
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];


if($password != ""){
    $sql = "UPDATE user SET username='$username', password='$password', full_name='$name' WHERE id_user='$id'";
}else{
    $sql = "UPDATE user SET username='$username', full_name='$name' WHERE id_user='$id'";
}
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: index.php");
    exit;
}
echo mysqli_error($conn);
exit;