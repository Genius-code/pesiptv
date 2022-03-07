<?php
session_start();
include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'boot.php';
include_once INCLUDES_PATH . 'backend/header.php';
include_once '../../database/connect.php';
include_once INCLUDES_PATH.'validation.php';

//check if Not found session login redirect to login page
if (!isset($_SESSION['login'])) {
    header('location:'.SITE_URL .'admin/login');
}


$stmt = $pdo->prepare("SELECT * FROM settings");
$stmt->execute();
$data = $stmt->fetchAll();

?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-2 my-5">
            <div class="card mt-5 text-center">
                <div class="card-header">
                    Settings WebSite
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special WebSite Data</h5>
                    <p class="card-text">Description,Social_Links,Address,Phone</p>
                </div>
            </div>

        </div>

        <?php if(isset($_SESSION['errors'])):?>

            <?php foreach($_SESSION['errors'] as $error): ?>
                <div class="alert alert-danger text-center"><?php echo $error; ?></div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success text-center"><?php echo $_SESSION['success']; ?></div>
        <?php endif; ?>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        WebSite Setting
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                            <div class="mb-3">
                                <?php foreach ($data as $value):?>
                                <label for="exampleInputEmail1" class="form-label">Web Site Description</label>
                                <input type="text" class="form-control" name="site_name" aria-describedby="emailHelp" value="<?= $value['siteName'];?>">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    <div class="mb-3">
                                        <!-- FaceBook -->
                                        <label for="exampleInputEmail1" class="form-label">FaceBook Link</label>
                                        <input type="text" class="form-control" name="face_link" aria-describedby="emailHelp" value="<?= $value['facebook'];?>">
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                        <!-- Instagram -->
                                        <label for="exampleInputEmail1" class="form-label">Instagram Link</label>
                                        <input type="email" class="form-control" name="insta_link" aria-describedby="emailHelp" value="<?= $value['instagram'];?>">
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                        <!-- Youtube -->
                                        <label for="exampleInputEmail1" class="form-label">Youtube Link</label>
                                        <input type="email" class="form-control" name="insta_link" aria-describedby="emailHelp" value="<?= $value['youtube'];?>">
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                        <!-- Telegram -->
                                        <label for="exampleInputEmail1" class="form-label">Telegram Link</label>
                                        <input type="email" class="form-control" name="tele_link" aria-describedby="emailHelp" value="<?= $value['telegram'];?>">
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Phone No.</label>
                                            <input type="email" class="form-control" name="phone_num" aria-describedby="emailHelp" value="<?= $value['phoneNumber'];?>">
                                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

                                            <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" name="email_link" aria-describedby="emailHelp" value="<?= $value['email'];?>">
                                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

                                            <label for="exampleInputEmail1" class="form-label">Address</label>
                                            <input type="email" class="form-control" name="address_link" aria-describedby="emailHelp" value="<?= $value['address'];?>">
                                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                        <a href="<?= 'edit?id='.$value['id'];?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    </div>
                                <?php endforeach;?>
                            </div>

                    </div>
                </div>
            </div>

            </div>

        </div>

    </div>
</div>



















    <?php unset($_SESSION['errors']);?>
    <?php unset($_SESSION['success']);?>
    <?php include_once INCLUDES_PATH.'backend/footer.php';?>
