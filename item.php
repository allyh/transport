<?php
require_once './checkLogin.php';
require_once './processCustomer.php';
require_once './connection/connect.php';
$query = "select `categoryName`, `categoryId` from category";
$result = mysqli_query($link, $query);
$newCustomerId = $_SESSION['newCustomerId'];
// Query the detail of a new customer using the $newCustomerId set in the session
$queryNewCustomerInfo = "select `customerId`, `fullName`, `phoneNumber`, email, adress "
        . "from customer "
        . "where `customerId` = $newCustomerId;";
$result2 = mysqli_query($link, $queryNewCustomerInfo);
$data1 = mysqli_fetch_array($result2);
// assumption userId = loginName , pick the login name from the session
$userId = $_SESSION['loginName'];
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
            <div class="col-md-8">
                <div class="col-md-12" style="padding: 0px">
                    <p>Add Items for customer:</p>
                    <ul  class="list-unstyled list-inline">
                        <li><?php echo $data1['fullName'] ?></li>
                        <li><?php echo $data1['phoneNumber'] ?></li>
                        <li><?php echo $data1['adress'] ?></li>

                    </ul>
                </div>
                <form method="POST" >
                    <div class="form-group">
                        <label for="itemName">Item Name</label>
                        <input type="text" class="form-control" name="itemName" id="itemName" placeholder="Item Name"/>
                    </div> 

                    <div class="form-group">
                        <label for="itemDescription">Item Description</label>
                        <input type="text" class="form-control" name="itemDescription" id="itemDescription" placeholder="Item Description"/>
                    </div> 
                    <div class="form-group">
                        <label for="itemDescription">Item Category</label>
                        <select class="form-control" name="categoryId">
                            <?php while ($data = mysqli_fetch_array($result)) { ?>
                                <option value="<?php echo $data['categoryId'] ?>"><?php echo $data['categoryName']; ?></option>
                            <?php } ?>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="itemDescription">Item Quantity</label>
                        <input type="number" name="quantty" class="form-control"/>
                    </div> 

                    <button class="btn btn-default" name="ibtn">Add item</button>
                    <button class="btn btn-default" name="done">Done</button>
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
if (isset($_POST['ibtn'])) {
    $categoryId = $_POST['categoryId'];
    $itemName = mysqli_real_escape_string($link, $_POST['itemName']);
    $itemDescriprion = mysqli_real_escape_string($link, $_POST['itemDescription']);
    $itemQuantity = mysqli_real_escape_string($link, $_POST['quantty']);
//    print_r($_POST);
//    exit();
    $sql = "INSERT INTO `transport_db`.`item` (`itemNumber`, `userId`, `categoryId`, `itemName`, `itemDescription`, `receivedOn`, `customerId`, `quantity`) "
            . "VALUES (NULL, '$userId', '$categoryId', '$itemName', '$itemDescriprion', CURRENT_TIMESTAMP, '$newCustomerId', '$itemQuantity');";
    if (mysqli_query($link, $sql)) {
        $message = "item added successfully, add another one";
        echo $message;
    }
}
if(isset($_POST['done'])){
    header('location: customer.php');
}
