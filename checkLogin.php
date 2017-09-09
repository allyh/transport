<?php
session_start();
if(!isset($_SESSION['loginName']) && empty($_SESSION['loginName'])){
//    redirect the page to login page 
    header('location:index.php');
}
?>