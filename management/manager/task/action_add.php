<?php

include '../../DB/conn.php';

$task_name = $_POST['task_name'];
$task_desc = $_POST['task_description'];
date_default_timezone_set("Asia/Jakarta");
$time_given = date('Y-m-d H:i:s');
$time_target = $_POST['time_target'];
$status = 4;
$count_worker = count($_POST['worker']);
$id_task_giver = $_SESSION['data']['id'];

$sql = "INSERT INTO task VALUES('', '$task_name', '$task_desc', '$time_given', '$time_target', NULL, NULL, '$status', '$id_task_giver')";
$query = mysqli_query($conn, $sql);

$id_task = mysqli_insert_id($conn);

if($query){
    $sql2 = "INSERT INTO detail_task VALUES";
    for($a=0;$a<$count_worker;$a++){
        $id_worker = $_POST['worker'][$a];
        $sql2.="('', '$id_task','$id_worker'),";
    }
    $sql2 = substr($sql2, 0, strlen($sql2) - 1);
    $query2 = mysqli_query($conn, $sql2);
    if($query2){
        header("Location: index.php");
        exit;
    }
}
echo mysqli_error($conn);