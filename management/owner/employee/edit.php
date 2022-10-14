<?php
    include '../../DB/conn.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE user.id_user='$id'";
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
                            <p class="mb-0">Edit Employee</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Employee Data</p>
                        <form action="action_edit.php" method="post">
                            <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Name"
                                        value='<?= $data['full_name'] ?>' required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Username</label>
                                    <input class="form-control" name="username" type="text" placeholder="Username"
                                        value='<?= $data['username'] ?>' required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <input class="form-control" name="password" type="password" placeholder="Password">
                                    <small style='color: red;'>Fill to change password</small>
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