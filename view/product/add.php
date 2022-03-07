<?php 
session_start();
include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'boot.php';
include_once '../../database/connect.php';
include_once INCLUDES_PATH . 'backend/header.php';
include_once '../../csrf_token.php';
//check if Not found session login redirect to login page
if (!isset($_SESSION['login'])) {
    header('location:'.SITE_URL .'admin/login');
}

?>



<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto my-5">

            <div class="card mt-5 text-center">
                <div class="card-header">
                    Prices Plan
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special Prices</h5>
                    <p class="card-text">Add Data For Services</p>
                    <a href="index" class="btn btn-primary">View All Product</a>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col mx-auto">

            <?php if (isset($_SESSION['errors'])) :?>
            <?php foreach($_SESSION['errors'] as $error):?>
            <div class="alert alert-danger"><?= $error?></div>
            <?php endforeach;?>
            <?php endif;?>

            <?php if (isset($_SESSION['success'])) :?>
            <div class="alert alert-success"><?= $_SESSION['success']?></div>
            <?php endif;?>

            <form class="p-4 m-3 border bg-gradient-info" method="POST" action="<?= SITE_URL.'handelers/addProduct.php'?>">
                <input type="hidden" name="csrf_token" value="<?=$token?>">
                <div class="form-group">
                    <label for="cat">Product Name</label>
                    <input type="text" class="form-control" name="product_name" id="cat">
                </div>
                <div class="form-group">
                    <label for="cat">Duration</label>
                    <input type="text" class="form-control" name="product_duration" id="cat">
                </div>
                <div class="form-group">
                    <label for="cat">Product Price</label>
                    <input type="number" class="form-control" name="product_price" id="cat">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="product_desc"
                        rows=" 3"></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-success my-2">
                    <i class="bi bi-reply-all-fill"></i> Submit
                </button>
            </form>
        </div>
    </div>
</div>

<?php unset($_SESSION['errors']);?>
<?php unset($_SESSION['success']);?>
<?php include_once INCLUDES_PATH. 'backend/footer.php';?>