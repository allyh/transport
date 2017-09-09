<?php

require_once './connection/connect.php';
if (isset($_POST['customerBtn'])) {
    $customerFullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $query = "INSERT INTO `transport_db`.`customer` (`customerId`, `fullName`, `phoneNumber`, `email`, `adress`, `registeredOn`) "
            . "VALUES (NULL, '$customerFullName', '$phoneNumber', '$email', '$address', CURRENT_TIMESTAMP);";
    $feedBack = mysqli_query($link, $query);
    if (isset($feedBack)) {
        // query the details of a newly added customer i.e., a customer with a greatest id
        $queryCustomer = "select MAX(`customerId`)  as 'MAX_ID' "
                . "from customer";
        $result1 = mysqli_query($link, $queryCustomer);
        $result1 = mysqli_fetch_array($result1);
        $_SESSION['newCustomerId'] = $result1['MAX_ID'];
        header('location: item.php');
    }
}
?>
