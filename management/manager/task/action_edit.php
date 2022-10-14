<?php

include '../../DB/conn.php';

$id = $_POST['id'];
$task_name = $_POST['task_name'];
$task_desc = $_POST['task_description'];
date_default_timezone_set("Asia/Jakarta");
$time_target = $_POST['time_target'];
$status = 4;
$count_worker = count($_POST['worker']);
$id_task_giver = $_SESSION['data']['id'];

$sql = "UPDATE task SET task_name='$task_name', detail='$task_desc', 
time_target='$time_target' WHERE id_task='$id'";
$query = mysqli_query($conn, $sql);

if($query){
    $sql3 = "DELETE FROM detail_task WHERE id_task='$id'";
    $query3 = mysqli_query($conn, $sql3);
    if($query3){
        $sql2 = "INSERT INTO detail_task VALUES";
        for($a=0;$a<$count_worker;$a++){
            $id_worker = $_POST['worker'][$a];
            $sql2.="('', '$id','$id_worker'),";
        }
        $sql2 = substr($sql2, 0, strlen($sql2) - 1);
        $query2 = mysqli_query($conn, $sql2);
        if($query2){
            header("Location: index.php");
            exit;
        }
    }
}
echo mysqli_error($conn);