<?php

//Array Session of errors
$_SESSION['errors'] = [];

/*
 * Function Check if data empty or Not
 * Function check if length is ok
 * must be put 3 arguments(value,name,number)
 */
function valRequire(string $value, string $name, int $num = null)
{
    if (empty($value)) {
        $_SESSION['errors'][] = "<strong>$name</strong> required";
        return false;
    } elseif (strlen($value) < $num) {
        $_SESSION['errors'][] = "<strong>$name</strong> must be greater than $num chars";
        return false;
    }
    return true;
}

//Function Validate check Min Length

function checkMinLenght(string $value,string $name,int $num)
{
    if (strlen($value) < $num) {
        $_SESSION['errors'][] = "<strong>$name</strong> must be greater than $num chars";
        return false;
    }
    return true;
}
// Function  validate check if valid email
function validEmail(string $value, string $name)
{
    if (!filter_var($value,FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'][] = "Invalid <strong>$name</strong>";
        return false;
    }
    return true;
}
// Function check if Number
function check_number (string $value, string $name)
{
    if (! is_numeric($value)) {
        $_SESSION['errors'][] = "<strong>$name</strong> must be Number";
        return false;
    }
    return true;
}
// Function Validate Token
//function valToken(string $value)
//{
//    if (isset($value)) {
//        if ($value == $_SESSION['csrf_token']);
//    }
//}