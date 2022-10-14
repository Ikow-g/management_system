<?php
include '../../DB/conn.php';

$id = $_GET['id'];

$sql = "DELETE FROM role WHERE id_role='$id'";
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: index.php");
    exit;
}