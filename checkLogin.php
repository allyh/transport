<?php
session_start();
if(!isset($_SESSION['loginName']) && empty($_SESSION['loginName'])){
//    redirect the page to login page 
    header('location:index.php');
}
//if(isset($_SESSION['power']) && !empty($_SESSION['power']) && $_SESSION['power'] == 1){
//    header('location: signup.php');
//}
?>