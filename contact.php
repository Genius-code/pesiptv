<?php
session_start();
include_once __DIR__.DIRECTORY_SEPARATOR.'boot.php';
include_once INCLUDES_PATH . DS. 'front/header.php';
include_once './database/connect.php';
include_once './csrf_token.php';

?>
<div class="container my-3">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=SITE_URL.'index'?>">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">أتصل بنا</li>
        </ol>
    </nav>
</div>



<div class="container-contact">
    <span class="big-circle"></span>
    <img src="img/shape.png" class="square" alt="" />
    <div class="form">
        <div class="contact-info">
            <h3 class="title">كن علي تواصل معنا </h3>
            <p class="text">
                نعمل دائما علي راحتكم
            </p>

            <div class="info">
                <div class="information">
                    <img src="img/location.png" class="icon" alt="" />
                    <p>جمهورية مصر العربية</p>
                </div>
                <div class="information">
                    <img src="img/email.png" class="icon" alt="" />
                    <p>lorem@ipsum.com</p>
                </div>
                <div class="information">
                    <img src="img/phone.png" class="icon" alt="" />
                    <p>01001245613</p>
                </div>
            </div>

            <div class="social-media">
                <p>تواصل معنا عبر :</p>
                <div class="social-icons">
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="contact-form">
            <span class="circle one"></span>
            <span class="circle two"></span>

            <form method="post" action="<?= SITE_URL.'handelers/addMessage.php'?>" autocomplete="off">
                <h3 class="title">Contact us</h3>
                <?php if(isset($_SESSION['success'])):?>
                    <div class="alert alert-success text-center my-3"><?php echo $_SESSION['success']; ?></div>
                <?php endif; ?>
                <div class="input-container">
                    <input type="text" name="name" class="input" required/>
                    <label for="">Username</label>
                    <span>Username</span>
                </div>
                <div class="input-container">
                    <input type="email" name="email" class="input" required/>
                    <label for="">Email</label>
                    <span>Email</span>
                </div>
                <div class="input-container">
                    <input type="tel" name="phone" class="input" required/>
                    <label for="">Phone</label>
                    <span>Phone</span>
                </div>
                <div class="input-container">
                    <input type="text" name="title" class="input" required/>
                    <label for="">Title</label>
                    <span>Title</span>
                </div>
                <div class="input-container textarea">
                    <textarea name="message" class="input" required></textarea>
                    <label for="">Message</label>
                    <span>Message</span>
                </div>
                <input type="submit" value="Send" name="msg" class="btn" />
                <?php if(isset($_SESSION['errors'])):?>

                    <?php foreach($_SESSION['errors'] as $error): ?>
                        <div class="alert alert-danger text-center my-3"><?php echo $error; ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </form>
        </div>
    </div>
</div>
<?php unset($_SESSION['errors']); ?>
<?php unset($_SESSION['success']); ?>
<?php include_once INCLUDES_PATH . DS. 'front/footer.php';?>