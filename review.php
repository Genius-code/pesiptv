<?php
session_start();
include_once __DIR__.DIRECTORY_SEPARATOR.'boot.php';
include_once './database/connect.php';
include_once INCLUDES_PATH . DS. 'front/header.php';
include_once './csrf_token.php';

$stmt = $pdo->prepare("SELECT * FROM reviews");
$stmt->execute();
$comments = $stmt->fetchAll();

?>

<section>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=SITE_URL.'index'?>">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">آراء العملاء</li>
            </ol>
        </nav>
        <div class="clearfix">...</div>
        <!-- Start Card Clients Review -->
        <?php foreach ($comments as $comment):?>
        <div class="card ml-2 bg-dark text-white my-2" style="max-width: 650px">
            <div class="row g-1">
                <div class="col-md-6">
                    <img src="<?=FRONTEND_URL;?>img/avatar7.png" class="img-fluid rounded-start" alt="avatar" width="100px">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?=$comment['name'];?></h5>
                        <p class="card-text"><?=$comment['comment'];?></p>
                        <p class="card-text"><small class="text-muted"><?=$comment['date'];?></small></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        <!-- End Card Clients Review -->
        <div class="clearfix">...</div>
        <div class="row">
            <div class="col-md">
                <!-- Start div alert -->
                <?php if (isset($_SESSION['errors'])) :?>
                    <?php foreach($_SESSION['errors'] as $error):?>
                        <div class="alert alert-danger text-center"><?= $error?></div>
                    <?php endforeach;?>
                <?php endif;?>

                <?php if (isset($_SESSION['success'])) :?>
                    <div class="alert alert-success text-center"><?= $_SESSION['success']?></div>
                <?php endif;?>
                <!-- End div alert -->
                <form class="row g-3" method="post" action="<?=SITE_URL.'handelers/addReview.php'?>">
                    <input type="hidden" name="csrf_token" value="<?=$token?>">
                    <div class="alert alert-primary mx-auto" role="alert">
                        رأيك يهمنا
                        نستعرض فى هذه الصفحة اراء عملاء الموقع نقدر لك
                        إضافة رأيك عبر النموذج بالاسفل
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Name" name="name_review">
                        <label for="floatingPassword">الاسم</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control is-invalid" id="floatingInputInvalid" placeholder="name@example.com" value="test@example.com" name="email_review">
                        <label for="floatingInputInvalid">البريد الإلكتروني</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="رأيك يهمنا" id="floatingTextarea2" style="height: 100px" name="comment_review"></textarea>
                        <label for="floatingTextarea2">التعليق</label>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit" name="review">أضف رأيك</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</section>










<?php unset($_SESSION['errors']); ?>
<?php unset($_SESSION['success']); ?>
<?php include_once INCLUDES_PATH . DS. 'front/footer.php';?>
