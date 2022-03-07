<?php 
session_start();
include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'boot.php';
include_once '../../database/connect.php';
include_once INCLUDES_PATH . 'backend/header.php';
include_once '../../csrf_token.php';
global $pdo;
//check if Not found session login redirect to login page
if (!isset($_SESSION['login'])) {
    header('location:'.SITE_URL .'admin/login');
}

if (isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam("id",$id);
    $stmt->execute();
    $product = $stmt->fetch();
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-4">

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
        <div class="col offset-3">

            <?php if (isset($_SESSION['errors'])) :?>
                <?php foreach($_SESSION['errors'] as $error):?>
                    <div class="alert alert-danger"><?= $error?></div>
                <?php endforeach;?>
            <?php endif;?>

            <?php if (isset($_SESSION['success'])) :?>
                <div class="alert alert-success"><?= $_SESSION['success']?></div>
            <?php endif;?>

            <form class="p-4 m-3 border bg-gradient-info" method="POST" action="<?= SITE_URL.'handelers/editProduct?id='.$_GET['id']?>">
                <input type="hidden" name="csrf_token" value="<?=$token?>">
                <div class="form-group">
                    <label for="cat">Product Name</label>
                    <input type="text" class="form-control" name="product_name" id="cat" value="<?= !empty($product['name']) ? $product['name'] : '';?>">
                </div>
                <div class="form-group">
                    <label for="cat">Duration</label>
                    <input type="text" class="form-control" name="product_duration" id="cat" value="<?= !empty($product['duration']) ? $product['duration'] : '';?>">
                </div>
                <div class="form-group">
                    <label for="cat">Product Price</label>
                    <input type="number" class="form-control" name="product_price" id="cat" value="<?= !empty($product['price']) ? $product['price'] : '';?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="product_desc"
                              rows=" 3" ><?= !empty($product['description']) ? $product['description'] : '';?></textarea>
                </div>

                <button type="submit" name="update" class="btn btn-success my-2">
                    <i class="bi bi-reply-all-fill"></i> Submit
                </button>
            </form>
        </div>
    </div>
</div>

<?php unset($_SESSION['errors']);?>
<?php unset($_SESSION['success']);?>
<?php include_once INCLUDES_PATH. 'backend/footer.php';?>
