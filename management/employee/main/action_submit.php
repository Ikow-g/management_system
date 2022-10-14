<?php

include '../../DB/conn.php';


$target_dir = "../../task_result/";

$file_tmp =$_FILES['file']['tmp_name'];
$file_name_array = explode('.',$_FILES['file']['name']);
$file_ext=strtolower(end($file_name_array));
$file_new = uniqid().'.'.$file_ext;
$target = $target_dir.$file_new;

var_dump($target);
exit;
$move = move_uploaded_file($file_tmp, $target);

if($move){
    $id = $_POST['id'];
    date_default_timezone_set("Asia/Jakarta");
    $time_done = date('Y-m-d H:i:s');

    $sql = "UPDATE task SET time_done='$time_done', picture='$file_new', id_status='3' WHERE id_task='$id'";
    $query = mysqli_query($conn, $sql);
    if($query){
            echo "<script>
                alert('File Submited');
                window.location.href = 'index.php';
            </script>";
        exit;
    }
}else{
    exit;
    echo "<script>
        alert('Someting went wrong when uploading file');
        window.location.href = 'index.php';
        </script>";
}
echo mysqli_error($conn);