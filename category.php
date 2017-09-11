<?php
require_once './checkLogin.php';
require_once './processCustomer.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.css" rel="stylesheet">
    </head>
    <body> 
        <?php include_once './includes/navBar.php'; ?>
        <div class="wrapper col-md-8 col-md-offset-2">
            <?php include_once './includes/sideBar.php'; ?>
            <div class="col-md-6">
                <form method="POST">
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" class="form-control" name="categoryName" id="itemName" placeholder="Category Name"/>
                    </div> 

                    <div class="form-group">
                        <label for="categoryDescription">Category Description</label>
                        <input type="text" class="form-control" name="categoryDescription" id="itemDescription" placeholder="Category Description"/>
                    </div> 

                    <button class="btn btn-primary" name="cbtn">Submit</button>
                </form>  
            </div>
        </div>

    </body>
</html>
<?php
require_once './connection/connect.php';
$db_selected = mysqli_select_db($link, 'transport_db');
if (!$db_selected) {
    die();
}
if (isset($_POST['cbtn'])) {
    $categoryName = $_POST['categoryName'];
    $categoryDescription = $_POST['categoryDescription'];
    $sql = "INSERT INTO category (categoryName, categoryDescription) VALUES ('$categoryName', '$categoryDescription')";
    header('location: customer.php');
    if (!mysqli_query($link, $sql)) {
        die();
    }
}