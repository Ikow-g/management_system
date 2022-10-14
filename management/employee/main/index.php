<?php require_once '../../DB/conn.php'; 
include '../template/header.php' 
?>
<?php include '../template/sidebar.php' ?>
<?php 
    // $corporate = $_SESSION['corporate'];
    $id_user = $_SESSION['data']['id'];
    $i = 1;
    $sql = "SELECT * FROM task 
    JOIN status ON task.id_status = status.id_status 
    JOIN detail_task ON detail_task.id_task = task.id_task
    JOIN corporate_employee ON corporate_employee.id_corporate_employee = detail_task.id_worker
    WHERE corporate_employee.id_corporate_employee='$id_user'
    GROUP BY task.id_task";
    $query = mysqli_query($conn,$sql);
?>


<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="card shadow-lg mx-4 mb-3">
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
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Task</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive p-0">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    No</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Task Name
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Time Done
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Download
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($data = mysqli_fetch_assoc($query)): ?>
                            <tr>
                                <td class="align-middle text-center">
                                    <?= $i++ ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?= $data['task_name'] ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?= $data['time_done'] ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?php if($data['id_status'] == 1)  : ?>
                                    <span class="badge badge bg-gradient-success"><?= $data['status_name'] ?></span>
                                    <?php elseif($data['id_status'] == 2)  : ?>
                                    <span class="badge badge bg-gradient-danger"><?= $data['status_name'] ?></span>
                                    <?php elseif($data['id_status'] == 3)  : ?>
                                    <span class="badge badge bg-gradient-primary"><?= $data['status_name'] ?></span>
                                    <?php else  : ?>
                                    <span class="badge badge bg-gradient-warning"><?= $data['status_name'] ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-info" href="info.php?id=<?= $data['id_task'] ?>">Info</a>
                                        <?php if($data['id_status'] != 1): ?>
                                        <a class="btn btn-success"
                                            href="submit.php?id=<?= $data['id_task'] ?>">Submit</a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <?php if($data['id_status'] != 4): ?>
                                    <a href="../../task_result/<?= $data['picture'] ?>"
                                        download="../../task_result/<?= $data['picture'] ?>"><i
                                            class="fa fa-download"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include '../template/footer.php' ?>