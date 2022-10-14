<?php
include '../../DB/conn.php';

$id= $_GET['id'];

switch ($_GET['act']) {
    case 'reject':
        $status = 2;
        break;
    case 'accept':
        $status = 1; 
        break;
    default:
        $status = 4;
        break;
}

$sql = "UPDATE task SET id_status='$status' WHERE id_task='$id'";
$query = mysqli_query($conn, $sql);

if($query){
    header("Location: index.php");
    exit;
}
echo mysqli_error($conn);