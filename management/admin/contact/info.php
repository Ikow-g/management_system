<?php
    include '../../DB/conn.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM contact_us WHERE id_contact_us='$id'";
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
                            <p class="mb-0">Contact Us</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="action_edit.php" method="post">
                            <input type="hidden" name="id" value='<?= $data['id_contact_us'] ?>'>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Name</label>
                                    <input class="form-control" type="text" value="<?= $data['name'] ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <input class="form-control" value="<?= $data['email'] ?>" type="text" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Subject</label>
                                    <input class="form-control" value="<?= $data['subject'] ?>" type="text" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-control-label">Messages</label>
                                    <textarea class="form-control" name="message" rows="5" readonly><?= $data['message'] ?></textarea>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="row">
                                <div class="col-md">
                                    <a href="index.php" class="btn btn-info btn-sm ms-auto float-end">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../template/footer.php' ?>