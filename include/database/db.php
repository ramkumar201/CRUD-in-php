<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "crud_db";

$con = mysqli_connect($hostname,$username,$password,$dbname);
if($con->connect_error){
    die('Database Connection failed'.$con->connect_error);
}else{
    
}
?>