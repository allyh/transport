<?php
require_once './checkLogin.php';
require_once './processCustomer.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <div class="wrapper col-md-8 col-md-offset-2">
            <div class="col-md-8">
                <form  method="POST">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name"/>
                    </div> 
                    <div class="form-group">
                        <label for="middleName">Middle Name</label>
                        <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name"/>
                    </div>
                    <div class="form-group">
                        <label for="surname">Sur Name</label>
                        <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname"/>
                    </div>

                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" name="phonenumber" id="phonenumber" placeholder="Phone Number"/>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="username"/>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <select class="form-control" name="privilege">
                            <option value="1">Administrator</option>
                            <option value="2">Data Enterer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Comfirm Password </label>
                        <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Comfirm Password"/>
                    </div>
                    <button class="btn btn-default" name="btn">Submit</button>
                </form>
            </div>


            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script type=text/javascript"  src="js/bootstrap.js"></script>
        </div>
    </body>
</html>
<?php
require_once './connection/connect.php';
$db_selected = mysqli_select_db($link, 'transport_db');
if (!$db_selected) {
    die();
}
if (isset($_POST['btn'])) {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $surname = $_POST['surname'];
    $phonenumber = $_POST['phonenumber'];
    $usernme = $_POST['username'];
    $privilege = $_POST['privilege'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $password = md5($password);
    $cpassword = md5($cpassword);
    $sql = "INSERT INTO `transport_db`.`register` (`Id`, `firstname`, `middlename`, `surname`, `phonenumber`, `username`, `password`, `regdate`, `privilege`) "
            . "VALUES (NULL, '$firstname', '$middlename', '$surname', '$phonenumber', '$usernme', '$password', CURRENT_TIMESTAMP, '$privilege');";
    if (!mysqli_query($link, $sql)) {
        die();
    }
}

        
 