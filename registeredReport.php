<?php
require_once './checkLogin.php';
require_once './connection/connect.php';
if (isset($_POST['btn'])) {
    echo $date1 = $_POST['date1'];
    echo $date2 = $_POST['date2'];
    $query = "select * from item where `receivedOn` between '$date1' and '$date2';";
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
                        <td colspan="5" ><strong>Registered Items Report</strong></td>
                </tr>
                </thead>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>ItemNumber</th>
                        <th>Quantity</th>
                        <th>Arrival Date</th>
                    </tr>
                <tbody>
                    <?php while (@$data = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $data['itemName']; ?></td>
                            <td><?php echo $data['itemNumber']; ?></td>
                            <td><?php echo $data['quantity']; ?></td>
                            <td><?php echo $data['receivedOn']; ?></td>
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
