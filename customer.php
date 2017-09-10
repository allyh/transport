<?php
require_once './checkLogin.php';
require_once './processCustomer.php';
$query = "select `customerId`, `fullName`, `phoneNumber`, email, adress "
        . "from customer;";
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
    </head>
    <body>
        <?php include_once './includes/navBar.php'; ?>
        <div class="wrapper col-md-8 col-md-offset-2">
            <?php include_once './includes/sideBar.php'; ?>
            <div class="col-md-8">
                <form  method="POST">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" name="fullName" id="firstname" placeholder="Full Name"/>
                    </div> 
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" name="phoneNumber" id="middlename" placeholder="Phone Number"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="surname" placeholder="Email"/>
                    </div>

                    <div class="form-group">
                        <label for="adress">Address</label>
                        <input type="text" class="form-control" name="address" id="phonenumber" placeholder="Adress"/>
                    </div>
                    <button class="btn btn-default" name="customerBtn">Submit</button>
                </form>
            </div>
            <table class="table" style="position: relative; top: 40px;">
                <thead>
                    <tr><th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($data = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $data['fullName'] ?></td>
                            <td><?php echo $data['email'] ?></td>
                            <td><?php echo $data['phoneNumber'] ?></td>
                            <td><?php echo $data['adress'] ?></td>
                            <td> <a href="item.php?customerId=<?php echo $data['customerId']; ?>">Add item</a> | <a href="dispatch.php?customerId=<?php echo $data['customerId'];?>">Dispatch</a></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>


    </body>
</html>
