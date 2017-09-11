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
        <style type="text/css">
            .login{
                background-color: #fafbfc;
                height: 300px;
                padding: 40px;
                margin-top: 50px;
            }
/*            .control{
                width: 70%;
            }*/
        </style>
    </head>
    <body >
        <div  class="wrapper col-md-8 col-md-offset-2">
            <div class="col-md-12" style="text-align: center; margin-top: 40px;font-size: 20px; font-family: cursive"><strong>Sign to ITS</strong></div>
            <div class="col-md-4 col-md-offset-4 login">
                <form method="POST">
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control control" name="username" id="username" placeholder="User Name" onblur="CheckEmpty('username')"/>
                    </div> 
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control control" name="password" id="password" placeholder="Password" onblur="CheckEmpty('password')"/>
                    </div> 
                    <button class="btn btn-primary form-control control" name="btn">Sign In</button>
                </form>  
            </div>
        </div>
        <script src="js/validation.js"></script>
    </body>
</html>
