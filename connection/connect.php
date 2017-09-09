<?php
$server = 'localhost';
$username = 'root';
$database = 'transport_db';
$password = '';
$link = mysqli_connect($server, $username, $password, $database);
if(!$link){
    echo "Can't connect to the database";
}