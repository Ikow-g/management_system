<?php
    include '../../DB/conn.php';

    $id = $_GET['id'];
    $sql2 = "SELECT * FROM task WHERE id_task='$id'";
    $query2 = mysqli_query($conn,$sql2);
    $data = mysqli_fetch_assoc($query2);

    $corporate = $_SESSION['corporate'];
    $sql = "SELECT * FROM corporate_employee
    JOIN user ON user.id_user = corporate_employee.id_corporate_employee
    AND id_corporate='$corporate'";
    $query = mysqli_query($conn,$sql);
    
    $sql3 = "SELECT id_worker FROM detail_task WHERE id_task='$id'";
    $query3 = mysqli_query($conn,$sql3);

    $worker = [];
    while($data2 = mysqli_fetch_assoc($query3)){
        array_push($worker, $data2['id_worker']);
    }
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
                            <p class="mb-0">Edit Task</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Task Data</p>
                        <form action="action_edit.php" method="post">
                            <input type="hidden" name="id" value='<?=$id?>'>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Task Name</label>
                                    <input class="form-control" name="task_name" type="text" placeholder="Task Name"
                                        value="<?= $data['task_name'] ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Time Target</label>
                                    <input class="form-control" name="time_target" type="datetime-local"
                                        placeholder="Username"
                                        value="<?= date('Y-m-d\TH:i', strtotime($data['time_target'])) ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Task Decription</label>
                                    <textarea class="form-control" name="task_description" cols="30" rows="10"
                                        placeholder="Task Description" required><?= $data['detail'] ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Worker</label>
                                    <select class='form-control select2' name="worker[]" multiple="multiple"
                                        placeholder="Choose Worker" required>
                                        <?php  while($dt = mysqli_fetch_assoc($query)): ?>
                                        <option value="<?= $dt['id_user'] ?>"
                                            <?= in_array($dt['id_user'], $worker) ? 'selected' : '' ?>>
                                            <?= $dt['full_name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="row">
                                <div class="col-md">
                                    <button class="btn btn-warning btn-sm ms-auto float-end">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../template/footer.php' ?>
        <script src="task.js"></script>