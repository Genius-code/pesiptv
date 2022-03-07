<?php
session_start();
include_once  __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'boot.php';
include_once '../../database/connect.php';
include_once INCLUDES_PATH . 'backend/header.php';
include_once INCLUDES_PATH.'validation.php';
//check if Not found session login redirect to login page
if (!isset($_SESSION['login'])) {
    header('location:'.SITE_URL .'admin/login');
}

 
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$items = $stmt->fetchAll();

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
                    <a href="add" class="btn btn-primary">Add Product</a>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col mx-auto">
            <?php if(isset($_SESSION['errors'])):?>

            <?php foreach($_SESSION['errors'] as $error): ?>
            <div class="alert alert-danger text-center"><?php echo $error; ?></div>
            <?php endforeach; ?>
            <?php endif; ?>

            <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success text-center"><?php echo $_SESSION['success']; ?></div>
            <?php endif; ?>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Price</th>
                        <th scope="col">Details</th>
                        <th scope="col">Setting</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    <?php foreach($items as $item):?>
                    <tr>
                        <th scope="row"><?= $i++?>
                        </th>
                        <td><?= $item['name'];?></td>
                        <td><?= $item['duration'];?></td>
                        <td><?= $item['price'];?></td>
                        <td><?= nl2br($item['description']);?></td>
                        <td>
                            <a href="<?= SITE_URL.'handelers/deleteProduct?id='.$item['id'];?>"> <button type="button"
                                    class="btn btn-danger mx-2 my-1">Delete</button></a>
                            <a href="<?= 'edit?id='.$item['id'];?>"><button type="button"
                                    class="btn btn-warning">Edit</button></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</div>


<?php unset($_SESSION['errors']); ?>
<?php unset($_SESSION['success']); ?>
<?php include_once INCLUDES_PATH.'backend/footer.php'; ?>








