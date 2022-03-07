<?php
$message_sent = false;
if (isset($_POST['email']) && !empty($_POST['email'])) {

    if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {

        //variables
        $userName  = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $userEmail = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $phone     = filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
        $subject   = filter_var($_POST['subject'],FILTER_SANITIZE_STRING);
        $message   = filter_var($_POST['message'],FILTER_SANITIZE_STRING);

        $to = "dreamshar14@gmail.com"; //Email that receive message
        $body = "";

        $body = "From: " .$userName."\r\n";
        $body = "Email: " .$userEmail."\r\n";
        $body = "phone: " .$phone."\r\n";
        $body = "Subject: " .$subject."\r\n";
        $body = "message: " .$message."\r\n";

        //mail($to,$subject,$body);

        $message_sent = true;
    }

}
?>

<!-- Start Section Contact -->
<!-- Start Section ContactUs -->
<section class="contact-us text-center" id="contact">
    <div class="fields">
        <i class="fas fa-headphones fa-5x"></i>
        <h1>كن علي تواصل معنا</h1>
        <p class="lead">نحن بخدمتكم بأي وقت</p>

    <?php if ($message_sent):?>
        <h3 style="color: #53043b;font-size: 30px;font-weight: 700 ;">Thanks, we'll be in touch</h3>
        <?php else:?>
        <div class="container">
            <div class="row">
                <!--Start Contact Form -->

                <div class="col">
                    <form role="form" method="post" autocomplete="off">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" placeholder="jane" name="name" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control input-lg" placeholder="jane@email.com" name="email" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control input-lg" placeholder="phoneNumber" name="phone" required>
                        </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Subject Message" name="subject" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control input-lg" placeholder="Message" required name="message"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary d-grid gap">Contact Us</button>
                    </div>
                    </form>
                </div>

                <!--End Contact Form -->
            </div>
        </div>
    <?php endif;?>
    </div>
</section>
<!-- End Section ContactUs -->
<!-- END Section Contact -->
