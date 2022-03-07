<?php
session_start();
include_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'boot.php';

include_once INCLUDES_PATH . DS. 'backend/header.php';
include_once '../database/connect.php';
include_once INCLUDES_PATH . DS. 'function.php';
//check if Not found session login redirect to login page
if (!isset($_SESSION['login'])) {
    header('location: login.php');
}

?>


    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Servers</div>
                    <div class="number"><a href="<?=SITE_URL.'view/product/index'?>"><?= countItems('id','products')?></a></div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Up from yesterday</span>
                    </div>
                </div>
                <i class='bx bxs-tv cart'></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Pending Review</div>
                    <div class="number"><a href="<?=SITE_URL.'view/review/index?status=pending'?>"><?= checkItem('status','reviews','refund')?></a></div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Up from yesterday</span>
                    </div>
                </div>
                <i class='bx bx-comment-detail cart two'></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">New Messages</div>
                    <div class="number"><a href="<?=SITE_URL.'view/message/index?status=new'?>"><?= checkItem('status','messages','new')?></a></div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Up from yesterday</span>
                    </div>
                </div>
                <i class='bx bxs-envelope-open cart three'></i>
            </div>

        </div>

        <div class="sales-boxes">
            <div class="recent-sales box">
                <div class="title">Site Statistics</div>
                <div class="card mx-auto" style="width: 36rem;">
                    <div class="card-header">
                        Featured
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Pages : 7</li>
                        <li class="list-group-item">Servers : <?= countItems('id','products')?></li>
                        <li class="list-group-item">Messages : <?= countItems('id','messages')?></li>
                        <li class="list-group-item">Reviews : <?= countItems('id','reviews')?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </section>

<?php include_once INCLUDES_PATH. 'backend/footer.php'; ?>