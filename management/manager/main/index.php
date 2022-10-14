<?php 
    require_once '../../DB/conn.php';

    $i = 1;
    $sql = "SELECT * FROM user JOIN role ON role.id_role = user.id_role";
    $query = mysqli_query($conn,$sql);    

    $id_corp = $_SESSION['corporate'];  
    $id_manager = $_SESSION['data']['id'];

    $sql2 = "SELECT COUNT(id_corporate_employee) AS count_employee FROM corporate_employee WHERE id_corporate='$id_corp'";
    $query2 = mysqli_query($conn,$sql2);
    $employee = mysqli_fetch_assoc($query2);

    $sql3 = "SELECT COUNT(DISTINCT id_task) AS task_count FROM detail_task WHERE id_worker IN (SELECT
    id_corporate_employee
    FROM corporate_employee WHERE id_corporate='$id_corp')";
    $query3 = mysqli_query($conn,$sql3);
    $task = mysqli_fetch_assoc($query3);

    $sql4 = "SELECT COUNT(DISTINCT id_task) AS task_count FROM detail_task WHERE id_worker='$id_manager'";
    $query4 = mysqli_query($conn,$sql4);
    $your_task = mysqli_fetch_assoc($query4);
?>

<?php include '../template/header.php' ?>
<?php include '../template/sidebar.php' ?>

<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="card shadow-lg mx-4 mb-5">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Welcome <b><?= $_SESSION['data']['name'] ?></b>
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Position: <b><?= $_SESSION['data']['role'] ?></b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total<br>Employee:</p>
                                    <h5 class="font-weight-bolder">
                                        <?= $employee['count_employee'] ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="fa fa-user text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total<br>Task:</p>
                                    <h5 class="font-weight-bolder">
                                        <?= $task['task_count'] ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total<br>Your Task</p>
                                    <h5 class="font-weight-bolder">
                                        <?= $your_task['task_count'] ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="fa fa-book text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../template/footer.php' ?>