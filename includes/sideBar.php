<?php
$loginName = $_SESSION['loginName'];
$caprturePowerQuery = "select power from register "
        . "where username = '$loginName'";
$resultPower = mysqli_query($link, $caprturePowerQuery);
$outPut = mysqli_fetch_array($resultPower);
?>
<div class="col-md-4 ">
    <ul class="list-group">
        <?php
        if ($outPut['power'] == 1)
            echo '<li class="list-group-item"><a href="signup.php">Register User</a></li>';
        ?>
        <?php
        if ($outPut['power'] == 2)
            echo ' <li class="list-group-item"><a href="customer.php">Add Customer</a></li>
        <li class="list-group-item"><a href="item.php">Add Item</a> </li>
        <li class="list-group-item"><a href="category.php">Add Item Category</a></li>
        <li class="list-group-item"><a href="dispatch.php">Dispatch Item</a></li>';
        ?>
    </ul>
</div>