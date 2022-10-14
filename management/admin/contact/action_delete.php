<?php
include '../../DB/conn.php';

$id = $_GET['id'];

$sql = "DELETE FROM contact_us WHERE id_contact_us='$id'";
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: index.php");
    exit;
}