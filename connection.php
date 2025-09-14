<?php
error_reporting(0);
$servername="localhost";
$username="root";
$password="";
$dbname="responsiveform";

$conn = mysqli_connect($servername,$username,$password,$dbname);

//new tecnology 
//$mysqli= new mysqli("localhost","root","","responsiveform");

if($conn)
{
    //echo "Connection okay";
}
else
{
    echo "Connection failed".mysqli_connect_error();
}
?>