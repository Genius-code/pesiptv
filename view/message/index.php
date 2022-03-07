<?php
session_start();
include_once  __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'boot.php';
include_once '../../database/connect.php';
include_once INCLUDES_PATH . 'backend/header.php';
include_once INCLUDES_PATH.'validation.php';;
//check if Not found session login redirect to login page
if (!isset($_SESSION['login'])) {
    header('location:'.SITE_URL .'admin/login');
}

//Check Num of Page Visi
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$res_per_page = 10;
//  sql limit start number of result on display page
$first_page = ($page - 1) * $res_per_page;
$query = '';
if (isset($_GET['status']) && $_GET['status'] == 'new') {
    $query = 'WHERE status = "new"';
}
$stmt = $pdo->prepare("SELECT * FROM messages $query LIMIT $first_page,$res_per_page");
$stmt->execute();
$messages = $stmt->fetchAll();
$num_of_res = $stmt->rowCount();

?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-2 my-5">

            <div class="card mt-5 text-center">
                <div class="card-header">
                    Messages
                </div>
                <div class="card-body">
                    <h5 class="card-title">Messages From Clients</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>

        </div>
    </div>
   <!--<?= $num_of_pages;?>-->
    <div class="row">
        <div class="col-12 mx-auto">
            <!-- Start Div Errors && Success -->
            <?php if(isset($_SESSION['errors'])):?>

                <?php foreach($_SESSION['errors'] as $error): ?>
                    <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if(isset($_SESSION['success'])):?>
                <div class="alert alert-success text-center"><?php echo $_SESSION['success']; ?></div>
            <?php endif; ?>
            <!-- End Div Errors && Success -->
            <div class="table-responsive-sm">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;?>
                    <?php foreach ($messages as $message) :?>
                    <tr>
                        <th scope="row"><?= $count ++?></th>
                        <td><?= $message['name']?></td>
                        <td><?= $message['phone']?></td>
                        <td><?= $message['email']?></td>
                        <td><?= $message['title']?></td>
                        <td><?= $message['content']?></td>
                        <td><?= $message['status']?></td>
                        <td><?= $message['date']?></td>
                        <td>
                            <a href="<?= SITE_URL.'handelers/deleteMessage?id='.$message['id'];?>" class="btn btn-danger">Delete <i class="bi bi-x-square-fill"></i></a>
                            <?php if ($message['status'] == 'new'):?>
                                <a href="<?= SITE_URL.'handelers/readMessage?id='.$message['id'];?>" class="btn btn-success">Read <i class="bi bi-x-square-fill"></i></a>
                            <?php endif;?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
<?php
   $stmt2 = $pdo->prepare("SELECT * FROM messages");
   $stmt2->execute();
   $total_of_res = $stmt2->rowCount();
   $total_pages = ceil($total_of_res / $res_per_page);

?>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center" style="margin: auto">
        <?php if ($page > 1) :?>
        <li class="page-item ">
            <a class="page-link" href="index?page=<?=($page - 1)?>" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <?php endif;?>
        <?php for ($num_page=1; $num_page <= $total_pages; $num_page++) :?>
        <li class="page-item"><a class="page-link" href="index.php?page=<?=$num_page;?>"><?= $num_page;?></a></li>
        <?php endfor;?>
        <?php if ($num_page > $page) :?>
        <li class="page-item">
            <a class="page-link" href="index?page=<?=($page + 1)?>">Next</a>
        </li>
        <?php endif;?>
    </ul>
</nav>













<?php unset($_SESSION['errors']);?>
<?php unset($_SESSION['success']);?>
<?php include_once INCLUDES_PATH.'backend/footer.php'; ?>
