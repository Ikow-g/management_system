<?php

require_once '../DB/conn.php';

$username = $_POST['username'];
$pass = $_POST['password'];


$sql = "SELECT * FROM user JOIN role ON role.id_role = user.id_role 
        WHERE username='$username' AND password='$pass'";
$query = mysqli_query($conn,$sql);

$data = mysqli_fetch_assoc($query);

if($data){
    $_SESSION['login'] = true;
    $_SESSION['data'] = [
        "id" => $data['id_user'],
        "name" =>$data['full_name'],
        "role" =>$data['role_name'],
    ];

    switch ($data['role_name']) 
    {
        case "admin":
            header("Location: ../admin/index.php");
            break;
        case "owner":
            $id = $data['id_user'];
            $sql2 = "SELECT id_corporate FROM corporate WHERE id_owner='$id'";
            $query2 = mysqli_query($conn,$sql2);
            $data_corp = mysqli_fetch_assoc($query2);
            $_SESSION['corporate'] = $data_corp['id_corporate'];
            header("Location: ../owner/index.php");
            break;
        case "employee":
            header("Location: ../employee/index.php");
            break;
        case "manager":
            $id = $data['id_user'];
            $sql2 = "SELECT id_corporate FROM corporate_employee WHERE id_corporate_employee='$id'";
            $query2 = mysqli_query($conn,$sql2);
            $data_corp = mysqli_fetch_assoc($query2);
            $_SESSION['corporate'] = $data_corp['id_corporate'];
            header("Location: ../manager/index.php");
            break;
        default:
            echo "<script>
                    alert('Login Failed, please try again!');
                    window.location.href = 'sign-in.php';
                </script>";
            break;
    }
}else{
        echo "<script>
            alert('There is no credential found');
            window.location.href = 'sign-in.php';
        </script>";
}