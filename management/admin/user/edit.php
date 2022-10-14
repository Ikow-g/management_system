<?php
    include '../../DB/conn.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM role";
    $query = mysqli_query($conn, $sql);

    $sql2 = "SELECT * FROM user WHERE id_user='$id'";
    $query2 = mysqli_query($conn, $sql2);
    $user = mysqli_fetch_assoc($query2);

    // var_dump($user);
    // exit;
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
                            <p class="mb-0">Edit User</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">User Data</p>
                        <form action="action_edit.php" method="post">
                            <input type="hidden" name="id" value="<?= $user['id_user'] ?>">
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Name</label>
                                    <input class="form-control" name="name" type="text"
                                        value="<?= $user['full_name'] ?>" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Username</label>
                                    <input class="form-control" name="username" value="<?= $user['username'] ?>"
                                        type="text" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <input class="form-control" name="password" type="password" placeholder="Password">
                                    <small style='color: red;'>Fill to change password</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Role</label>
                                    <select name="role" class="form-control" required>
                                        <?php while($data = mysqli_fetch_assoc($query)): ?>
                                        <option value="<?= $data['id_role'] ?>"
                                            <?= $user['id_role'] == $data['id_role'] ? 'selected' : '' ?>>
                                            <?= $data['role_name'] ?></option>
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