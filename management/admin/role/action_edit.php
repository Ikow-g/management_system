<?php

include '../../DB/conn.php';

$id = $_POST['id'];
$role = $_POST['role'];

$sql = "UPDATE role SET role_name='$role' WHERE id_role='$id'";

$query = mysqli_query($conn, $sql);

if($query){
    header("Location: index.php");
    exit;
}