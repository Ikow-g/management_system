<?php
    include '../../DB/conn.php';

    $sql = "SELECT * FROM role";
    $query = mysqli_query($conn, $sql);
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
                            <p class="mb-0">Add User</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">User Data</p>
                        <form action="action_add.php" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Username</label>
                                    <input class="form-control" name="username" type="text" placeholder="Username"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <input class="form-control" name="password" type="password" placeholder="Password"
                                        required>
                                </div>
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