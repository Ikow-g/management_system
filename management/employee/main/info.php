<?php
    include '../../DB/conn.php';

    $id = $_GET['id'];
    $sql2 = "SELECT * FROM task WHERE id_task='$id'";
    $query2 = mysqli_query($conn,$sql2);
    $data = mysqli_fetch_assoc($query2);

    $sql = "SELECT * FROM detail_task
    JOIN user ON user.id_user = detail_task.id_worker
    WHERE id_task='$id'";

    $query = mysqli_query($conn,$sql);
    
    $sql3 = "SELECT id_worker FROM detail_task WHERE id_task='$id'";
    $query3 = mysqli_query($conn,$sql3);
?>

<?php include '../template/header.php' ?>
<?php include '../template/sidebar.php' ?>
<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Info Task</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Task Data</p>
                        <div class="row">
                            <div class="form-group">
                                <label class="form-control-label">Task Name</label>
                                <input class="form-control" type="text" value="<?= $data['task_name'] ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="form-control-label">Time Given</label>
                                <input class="form-control" type="datetime-local"
                                    value="<?= date('Y-m-d\TH:i', strtotime($data['time_given'])) ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="form-control-label">Time Target</label>
                                <input class="form-control" type="datetime-local"
                                    value="<?= date('Y-m-d\TH:i', strtotime($data['time_target'])) ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="form-control-label">Time Done</label>
                                <input class="form-control" type="datetime-local"
                                    value="<?= $data['time_done'] != NULL ? date('Y-m-d\TH:i', strtotime($data['time_done'])) : ''?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="form-control-label">Task Decription</label>
                                <textarea class="form-control" name="task_description" cols="30" rows="10"
                                    placeholder="Task Description" readonly><?= $data['detail'] ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="form-control-label">Worker</label>
                                <?php while($dt = mysqli_fetch_assoc($query)): ?>
                                <input class="form-control mb-2" type="text" value="<?= $dt['full_name'] ?>" readonly>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md">
                                <a href='index.php' class="btn btn-info btn-sm ms-auto float-end">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../template/footer.php' ?>
        <script src="task.js"></script>