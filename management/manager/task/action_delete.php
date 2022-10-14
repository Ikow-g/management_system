<?php
include '../../DB/conn.php';

$id = $_GET['id'];

$sql = "DELETE FROM task WHERE id_task='$id'";
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: index.php");
    exit;
}