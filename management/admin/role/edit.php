<?php
    include '../../DB/conn.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM role WHERE id_role='$id'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

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
                            <p class="mb-0">Edit Role</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="action_edit.php" method="post">
                            <input type="hidden" name="id" value='<?= $data['id_role'] ?>'>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Role Name</label>
                                    <input class="form-control" name="role" type="text"
                                        value="<?= $data['role_name'] ?>" placeholder="Role Name" required>
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