<?php
session_start();
include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'boot.php';

include_once INCLUDES_PATH . DS . 'backend/header.php';
include_once '../database/connect.php';
include_once INCLUDES_PATH . DS . 'function.php';
//check if Not found session login redirect to login page
if (!isset($_SESSION['login'])) {
    header('location: login.php');
}

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = 1");
    $stmt->execute();
    $users = $stmt->fetchAll();

?>
<div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto my-5">

                <div class="card mt-5 text-center">
                    <div class="card-header">
                        Profile Info
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special Admin Profile</h5>
                        <p class="card-text">ٍSpecial information admin panel</p>
                    </div>
                </div>

            </div>
        </div>
    <?php if (isset($_SESSION['errors'])) :?>
        <?php foreach($_SESSION['errors'] as $error):?>
            <div class="alert alert-danger"><?= $error?></div>
        <?php endforeach;?>
    <?php endif;?>

    <?php if (isset($_SESSION['success'])) :?>
        <div class="alert alert-success"><?= $_SESSION['success']?></div>
    <?php endif;?>
    <form method="post" action="<?= SITE_URL.'handelers/editProfile'?>">
        <?php foreach ($users as $user):?>
        <div class="form-group row my-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" name="name" value="<?= !empty($user['user_name']) ? $user['user_name'] : '';?>">
            </div>
        </div>
        <div class="form-group row  my-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="inputEmail3" name="email" value="<?= !empty($user['email']) ? $user['email'] : '';?>">
            </div>
        </div>
        <div class="form-group row  my-2">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Old Password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword3" name="password">
            </div>
        </div>
        <div class="form-group row  my-2">
            <label for="inputPassword3" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword3" name="new_password">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 my-2">
                <button type="update" class="btn btn-primary" name="update">Update</button>
            </div>
        </div>
        <?php endforeach;?>
    </form>
</div>



<?php unset($_SESSION['errors']);?>
<?php unset($_SESSION['success']);?>
<?php include_once INCLUDES_PATH . DS . 'backend/footer.php';?>