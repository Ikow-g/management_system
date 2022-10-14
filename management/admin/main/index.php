<?php 
    require_once '../../DB/conn.php';

    $i = 1;
    $sql = "SELECT * FROM user JOIN role ON role.id_role = user.id_role";
    $query = mysqli_query($conn,$sql);

    $sql2 = "SELECT COUNT(id_user) AS 'user_count' FROM user";
    $query2 = mysqli_query($conn,$sql2);
    $user = mysqli_fetch_assoc($query2);

    $sql3 = "SELECT COUNT(id_user) AS 'corp_count' FROM user WHERE id_role=2";
    $query3 = mysqli_query($conn,$sql3);
    $corp = mysqli_fetch_assoc($query3);

    $sql4 = "SELECT COUNT(id_contact_us) AS 'contact_count' FROM contact_us";
    $query4 = mysqli_query($conn,$sql4);
    $contact = mysqli_fetch_assoc($query4);
?>

<?php include '../template/header.php' ?>
<?php include '../template/sidebar.php' ?>

<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="card shadow-lg mx-4 mb-5">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Welcome <b><?= $_SESSION['data']['name'] ?></b>
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Position: <b><?= $_SESSION['data']['role'] ?></b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total<br>Corporate:</p>
                                    <h5 class="font-weight-bolder">
                                        <?= $corp['corp_count'] ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="fa fa-building text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total<br>Users:</p>
                                    <h5 class="font-weight-bolder">
                                        <?= $user['user_count'] ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Contact<br>in:</p>
                                    <h5 class="font-weight-bolder">
                                        <?= $contact['contact_count'] ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="fa fa-address-book text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../template/footer.php' ?>