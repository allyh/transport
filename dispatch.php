<?php
require_once './checkLogin.php';
require_once './processCustomer.php';
require_once './connection/connect.php';
$query = "select `categoryName`, `categoryId` from category";
$result = mysqli_query($link, $query);
@$customerId = mysqli_real_escape_string($link, $_GET['customerId']);
if (isset($customerId) && $customerId <> "") {
    $queryNewCustomerInfo = "select `customerId`, `fullName`, `phoneNumber`, email, adress "
            . "from customer "
            . "where `customerId` = $customerId;";
}
$result2 = mysqli_query($link, $queryNewCustomerInfo);
$data1 = mysqli_fetch_array($result2);
// assumption userId = loginName , pick the login name from the session
$userId = $_SESSION['loginName'];
//.............
$query = "select * from item "
        . "where `customerId` = '$customerId';";
$result = mysqli_query($link, $query);
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style type="text/css">
            .hideAnchor{
                display: none;
            }
        </style>
    </head>
    <body>
        <?php include_once './includes/navBar.php'; ?>
        <div class="wrapper col-md-8 col-md-offset-2">
            <?php include_once './includes/sideBar.php'; ?>
            <div class="col-md-8">
                <!--details for a customer go here-->
                <p>Dispatch Items for customer:</p>
                <ul  class="list-unstyled list-inline">
                    <li><?php echo $data1['fullName'] ?></li>
                    <li><?php echo $data1['phoneNumber'] ?></li>
                    <li><?php echo $data1['adress'] ?></li>

                </ul>
            </div>
            <table class="table" style="position: relative; top: 40px;">
                <thead>
                    <tr><th>Item Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($data = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $data['itemName'] ?></td>
                            <td><?php echo $data['itemDescription'] ?></td>
                            <td><?php echo $data['quantity'] ?></td>
                            <td><?php echo $data['location'] ?></td>
                            <td> <a class="btn-click <?php if($data['status']==1) echo 'hideAnchor';?>" href="processDispatch.php?userId=<?php echo $_SESSION['loginName']; ?>&customerId=<?php echo $customerId ?>&itemId=<?php echo $data['itemNumber'] ?>">Dispatch</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
    <script type="text/javascript">
    </script>
</html>
