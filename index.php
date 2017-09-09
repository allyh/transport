<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (isset($_POST['btn1'])) {
    header('location: signup.php');
}
if (isset($_POST['btn'])) {
    require_once './processLogin.php';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>

    </head>
    <body >
        <div  class="wrapper col-md-8 col-md-offset-4">
            <div class="col-md-6">
                <form method="POST">
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="User Name" onblur="CheckEmpty('username')"/>
                    </div> 
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" onblur="CheckEmpty('password')"/>
                    </div> 
                    <button class="btn btn-default" name="btn">Sign In</button>
                    <button class="btn btn-default" name="btn1">Sign Up</button>
                </form>  
            </div>
        </div>
        <script src="js/validation.js"></script>
    </body>
</html>
