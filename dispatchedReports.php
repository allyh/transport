<?php
require_once './checkLogin.php';
require_once './connection/connect.php';
if (isset($_POST['btn'])) {
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];
    $query = "select `itemNumber`, itemName, `dispatchDate`,c.`fullName`, d.`userId` from `dispatch` d, customer c , item i "
            . "where (c.`customerId`=d.`customerId`) and "
            . "(i.`itemNumber` = d.`itemId`) and "
            . "`receivedOn` between '2017-09-09' and '2017-09-11';";
    @$result = mysqli_query($link, $query);
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
                Please select the date ranges:
                <form method="POST">
                    <div class="form-group">
                        <label for="date1">First Date</label>
                        <input type="date" name="date1" id="date1" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="date2">Last Date</label>
                        <input type="date" name="date2" id="date2" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btn" id="date2" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <td colspan="5"><strong>Dispatched Items Report</strong></td>
                </tr>
                </thead>
                <thead>
                    <tr>
                        <th>Item Number</th>
                        <th>Item Name</th>
                        <th>Dispatched Date</th>
                        <th>Customer Name</th>
                        <th>Atteded by</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while (@$data = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $data['itemNumber']; ?></td>
                            <td><?php echo $data['itemName']; ?></td>
                            <td><?php echo $data['dispatchDate']; ?></td>
                            <td><?php echo $data['fullName']; ?></td>
                            <td><?php echo $data['userId']; ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
                </thead>
            </table>
        </div>

    </body>
    <script type="text/javascript">
    </script>
</html>
