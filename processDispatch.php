<?php
require_once './checkLogin.php';
require_once './connection/connect.php';
@$userId = mysqli_real_escape_string($link, $_GET['userId']);
@$customerId = mysqli_real_escape_string($link, $_GET['customerId']);
@$itemId = mysqli_real_escape_string($link, $_GET['itemId']);
if (isset($_POST['DispatchBtn'])) {
    $identity = mysqli_real_escape_string($link, $_POST['identity']);
    $userId = mysqli_real_escape_string($link, $_POST['userId']);
    $customerId = mysqli_real_escape_string($link, $_POST['customerId']);
    $itemId = mysqli_real_escape_string($link, $_POST['itemId']);
    echo $userId . "<br/>";
    echo $customerId . "<br/>";
    echo $itemId . "<br/>";
    echo $identity . "<br/>";
    $query = "INSERT INTO `transport_db`.`dispatch` (`dispatchId`, `userId`, `customerId`, `itemId`, `dispatchDate`, `identityNo`) "
            . "VALUES (NULL, '$userId', '$customerId', '$itemId', CURRENT_TIMESTAMP, '$identity');";
    $result = mysqli_query($link, $query);
    if (isset($result)) {
        $queryItemNo = "update item set status = 1 where `itemNumber` = $itemId;";
        $resultN = mysqli_query($link, $queryItemNo);
        if (isset($resultN)) {
            header("location: dispatch.php?customerId=$customerId");
        }
    }
}
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
                <form  method="POST">
                    <div class="form-group">
                        <label for="identity">Identity Number</label>
                        <input type="text" class="form-control" name="identity" id="identity" placeholder="Enter Identity number "/>
                    </div> 
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="userId" value="<?php echo @$userId ?>" />
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="customerId" value="<?php echo @$customerId ?>" />
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="itemId" value="<?php echo @$itemId ?>" />
                    </div>
                    <button class="btn btn-default" name="DispatchBtn">Dispatch</button>
                </form>
            </div>
        </div>
    </body>
</html>
