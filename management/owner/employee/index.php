<?php 
    require_once '../../DB/conn.php';

    $i = 1;
    $corporate = $_SESSION['corporate'];
    $sql = "SELECT * FROM corporate_employee 
            JOIN user ON user.id_user = corporate_employee.id_corporate_employee
            WHERE id_role='4' AND id_corporate='$corporate'";
    $query = mysqli_query($conn,$sql);
?>

<?php include '../template/header.php' ?>
<?php include '../template/sidebar.php' ?>

<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <a href="add.php" class="btn btn-primary float-end">New Employee</a>
                <h6>Employee</h6>
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
                                    Name
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Username
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action
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
                                    <?= $data['full_name'] ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?= $data['username'] ?>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-warning" href="edit.php?id=<?= $data['id_user'] ?>">Edit</a>
                                        <a class="btn btn-danger" href="action_delete.php?id=<?= $data['id_user'] ?>"
                                            onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include '../template/footer.php' ?>