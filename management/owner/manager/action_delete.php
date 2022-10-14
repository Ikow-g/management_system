<?php
include '../../DB/conn.php';

$id = $_GET['id'];

$sql = "DELETE FROM user WHERE id_user='$id'";
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: index.php");
    exit;
}