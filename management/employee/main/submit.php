<?php
    include '../../DB/conn.php';
    $id = $_GET['id'];
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
                            <p class="mb-0">Submit Task</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="action_submit.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <div class="form-group">
                                    <label class="form-control-label">FIle</label>
                                    <input class="form-control" name="file" type="file" placeholder="File"
                                        accept="image/*, .xls, .doc, .pdf, .docm, .docx" required>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="row">
                                <div class="col-md">
                                    <button class="btn btn-success btn-sm ms-auto float-end">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../template/footer.php' ?>