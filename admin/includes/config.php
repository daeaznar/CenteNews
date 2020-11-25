<?php
$host_name = "localhost";
$host_user = "root";
$host_pass = "";
$database = "centenews";

$con = mysqli_connect($host_name, $host_user, $host_pass, $database);

// Check connection
if (mysqli_connect_errno())
{
    die("<h1>Something went wrong, please train again later: " . mysqli_connect_error() . "</h1>");
}
?>