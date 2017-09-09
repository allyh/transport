<?php

// include connection to the database
require_once './connection/connect.php';
// grab the values from input 
$username = mysqli_real_escape_string($link, $_POST['username']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$password = md5($password);
//echo mysqli_real_escape_string($link, $username)."<br/>";
$query = "select * from register where username = '$username' and password = '$password';";
$result = mysqli_query($link, $query);
$numberOfRows = mysqli_num_rows($result); // check number of rows returned by the select statement above 
if ($numberOfRows === 1) {
    session_start();
    $_SESSION['loginName'] = $username;
    require_once './privilege.php';
    if ($power == 1) {
        header('location: signup.php');
    } else {
        header('location: customer.php');
    }
} else {
    echo 'username or password is incorrect';
}