<?php
session_start();
include_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'boot.php';
include_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'database/connect.php';
include_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'csrf_token.php';
global $pdo;
if (isset($_SESSION['login'])) {
    header('location: dashboard');
}
$_SESSION['errors'] = [];
//Check If User Coming From HTTP POST REQUEST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = sha1($password);

    //CSRF TOKEN
    if (isset($_POST['csrf_token'])) {
        if ($_POST['csrf_token'] == $_SESSION['csrf_token']) {
            echo 'done';
        } else {
            $_SESSION['errors'][] = 'Problem With CSRF Token Verification';
        }

        //CSRF Token Time Validation
        $max_time = 60*60*2;
        if (isset($_SESSION['csrf_token_time'])) {
            $token_time = $_SESSION['csrf_token_time'];
            if (($token_time + $max_time) >= time()) {
            } else {
                unset($_SESSION['csrf_token']);
                unset($_SESSION['csrf_token_time']);
                $_SESSION['errors'][] =  "CSRF Token Expired";
            }
        }
    }
    //check if user Exist in database

    $stmt = $pdo->prepare("SELECT email, password FROM users WHERE email= :email AND password = :password");
    $stmt->execute(array($email, $hash));
    $count = $stmt->rowCount();

    //check if count > 0 It's mean found record in database.
    if ($count > 0) {
       $_SESSION['login'] = $email; //Register Session Name
       header('location: dashboard'); //Redirect To Dashboard
       exit();
    } else {
        $_SESSION['errors'][] = "<strong>Login Failed</strong> Please Type Valid Email and Password";
    }


}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Login CSS -->
    <link rel="stylesheet" href="<?= BACKEND_URL?>css/login.css">
    <title>Login</title>
</head>
<body>

<div class="l-form">
    <form action="<?= $_SERVER['PHP_SELF']?>" class="form" method="POST">
        <input type="hidden" name="csrf_token" value="<?=$token?>">
        <h1 class="form_title">Sign In</h1>
        <!--START Div Email-->
        <div class="form_div">
            <input type="email" class="form_input" name="email" id="" >
            <label for="" class="form_label">Email</label>
        </div>
        <!--END Div Email-->
        <!--START Div Password-->
        <div class="form_div">
            <input type="password" class="form_input" name="password" id="" >
            <label for="" class="form_label">Password</label>
        </div>
        <!--END Div Password-->
        <!--Button-->
        <input type="submit" class="form_button" name="login" value="Sign In">
        <div class="error my-2">
            <?php if (isset($_SESSION['errors'])) :?>
                <?php foreach($_SESSION['errors'] as $error):?>
                    <div class="alert alert-danger text-center "><?= $error?></div>
                <?php endforeach;?>
            <?php endif;?>

            <?php if (isset($_SESSION['success'])) :?>
                <div class="alert alert-success"><?= $_SESSION['success']?></div>
            <?php endif;?>
        </div>
    </form>
</div>

</body>
</html>

<?php unset($_SESSION['errors']);?>
<?php unset($_SESSION['success']);?>
