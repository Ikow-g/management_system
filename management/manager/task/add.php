<?php
    include '../../DB/conn.php';
    
    $corporate = $_SESSION['corporate'];
    $sql = "SELECT * FROM corporate_employee
    JOIN user ON user.id_user = corporate_employee.id_corporate_employee 
    AND id_corporate='$corporate'";
    $query = mysqli_query($conn,$sql);
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
                            <p class="mb-0">Add Task</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Task Data</p>
                        <!-- <a href="add.php" class='btn btn-secondary btn-sm'>Back</a> -->
                        <form action="action_add.php" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Task Name</label>
                                    <input class="form-control" name="task_name" type="text" placeholder="Task Name"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Time Target</label>
                                    <input class="form-control" name="time_target" type="datetime-local"
                                        placeholder="Username" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Task Decription</label>
                                    <textarea class="form-control" name="task_description" cols="30" rows="10"
                                        placeholder="Task Description" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Worker</label>
                                    <select class='form-control select2' name="worker[]" multiple="multiple"
                                        placeholder="Choose Worker" required>
                                        <?php  while($data = mysqli_fetch_assoc($query)): ?>
                                        <option value="<?= $data['id_user'] ?>"><?= $data['full_name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="row">
                                <div class="col-md">
                                    <button class="btn btn-primary btn-sm ms-auto float-end">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../template/footer.php' ?>
        <script src="task.js"></script>