<?php
$host="localhost";
$user="root";
$pass="";
$dbname="adishpay";
$conn=mysqli_connect($host,$user,$pass,$dbname);
if(!$conn){
    die("Connectin Error Occur: ".mysqli_connect_error());
}
?>