<?php
session_start();
include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'boot.php';
include_once '../../database/connect.php';
include_once INCLUDES_PATH . 'backend/header.php';
include_once INCLUDES_PATH.'validation.php';
global $pdo;
//check if Not found session login redirect to login page
if (!isset($_SESSION['login'])) {
    header('location:'.SITE_URL .'admin/login');
}

if (isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM settings WHERE id = :id");
    $stmt->bindParam("id",$id);
    $stmt->execute();
    $set = $stmt->fetch();
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-2 my-5">

            <div class="card mt-5 text-center">
                <div class="card-header">
                    Site Setting
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special WebSite Data</h5>
                    <p class="card-text">Description,Social_Links,Address,Phone</p>
                    <a href="index" class="btn btn-primary">View All Setting</a>
                </div>
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
                    <form method="post" action="<?=SITE_URL."handelers/edit_data_setting?id=".$_GET['id']?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Web Site Description</label>
                            <input type="text" class="form-control" name="site_name" aria-describedby="emailHelp" value="<?= !empty($set['siteName']) ? $set['siteName'] : '';?>">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">FaceBook Link</label>
                            <input type="text" class="form-control" name="face_link" aria-describedby="emailHelp" value="<?= !empty($set['facebook']) ? $set['facebook'] : '';?>">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3" >
                            <label for="exampleInputEmail1" class="form-label">Instagram Link</label>
                            <input type="text" class="form-control" name="insta_link" aria-describedby="emailHelp" value="<?= !empty($set['instagram']) ? $set['instagram'] : '';?>">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Youtube</label>
                            <input type="text" class="form-control" name="youtube_link" aria-describedby="emailHelp" value="<?= !empty($set['youtube']) ? $set['youtube'] : '';?>">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Telegram Link</label>
                            <input type="text" class="form-control" name="tele_link" aria-describedby="emailHelp" value="<?= !empty($set['telegram']) ? $set['telegram'] : '';?>">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phone No.</label>
                            <input type="number" class="form-control" name="phone_num" aria-describedby="emailHelp" value="<?= !empty($set['phoneNumber']) ? $set['phoneNumber'] : '';?>">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email_link" aria-describedby="emailHelp" value="<?= !empty($set['email']) ? $set['email'] : '';?>">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address_link" aria-describedby="emailHelp" value="<?= !empty($set['address']) ? $set['address'] : '';?>">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?php unset($_SESSION['errors']);?>
<?php unset($_SESSION['success']);?>
<?php include_once INCLUDES_PATH . 'backend/footer.php';?>



