<?php
include_once __DIR__.DIRECTORY_SEPARATOR.'boot.php';
include_once INCLUDES_PATH . DS. 'front/header.php';
$page = $_SERVER['REQUEST_URI'];

switch ($folders){
    case('./admin_panel/index');
        include __DIR__.('./admin_panel/index.php');
        break;
    case('/admin_panel/admin/login');
        include __DIR__.('/admin_panel/admin/login.php');
        break;
    case('/admin_panel/view/product/index');
       include __DIR__.('/admin_panel/view/product/index.php');
       break;
    case('/admin_panel/view/product/add');
        include __DIR__.('/admin_panel/view/product/add.php');
        break;
}

?>


<!--Start Carousel-->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner" id="home">
        <div class="carousel-item active">
            <img src="<?=FRONTEND_URL;?>img/head/ktv.jpg" class="d-block w-100" alt="k-iptv">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-danger">انضم لعائلة k-iptv</h5>
                <p class="text-primary">نضمن لك مشاهده ممتعه دون انقطاع</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?=FRONTEND_URL;?>img/head/2.webp" class="d-block w-100" alt="multi-devices">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-danger">Multi-Devices</h5>
                <p class="text-primary">نقدم لكم خدمه تتماشي مع جميع الأجهزة  </p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?=FRONTEND_URL;?>img/head/4.png" class="d-block w-100" alt="multi-devices">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-danger">Multi-Devices</h5>
                <p class="text-primary">نقدم لكم خدمه تتماشي مع جميع الأجهزة  </p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?=FRONTEND_URL;?>img/head/5.png" class="d-block w-100" alt="multi-devices">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-danger">Multi-Devices</h5>
                <p class="text-primary">نقدم لكم خدمه تتماشي مع جميع الأجهزة  </p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!--End Carousel-->
<?php include_once 'server.php'?>
<!--Start Section Background Stars-->
<!--<div id='stars'></div>
<div id='stars2'></div>
<div id='stars3'></div>-->
<!--End Section Background Stars-->
<!--Start Section Why Us-->
<div class="why-us">
    <div class="why-us2">
        <div class="container">
            <h1 class="why text-center">Why Us</h1>
            <!--Start cards -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="icon text-center"><i class="fas fa-dollar-sign fa-2x"></i></div>
                            <h5 class="card-title text-center">طرق دفع آمنة وتناسب اختياراتك</h5>
                            <p class="card-text text-center">paypal - فيزا - ويسترن يونيون</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="icon text-center"><i class="fas fa-rocket fa-2x"></i></div>
                            <h5 class="card-title text-center">أمان وسرعة عالية </h5>
                            <p class="card-text text-center">ثبات القنوات وجودة تصل الى 4K لبعض القنوات</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="icon text-center"><i class="fas fa-stopwatch fa-2x"></i></div>
                            <h5 class="card-title text-center">سرعة في التفعيل</h5>
                            <p class="card-text text-center">يتم ارسال الاشتراك عبر الواتس اب للعضوية وطريقة الاشتراك</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end cards -->
        </div>
    </div>
</div>
<!--END Section Why Us-->
<?php include_once 'contact_form.php'?>
<!-- Start Section About -->
<div class="about text-center">
    <div class="container">
        <h1>Meet our New Services <span>K-IPTV</span></h1>
        <p class="lead">We Have Big <strong>Servers</strong> For Good Watching</p>
    </div>
</div>
<!-- End Section About -->
<?php include_once 'testimonial.php'?>




<?php include_once INCLUDES_PATH . DS. 'front/footer.php';?>