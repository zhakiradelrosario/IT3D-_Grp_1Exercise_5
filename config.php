<?php
$con = mysqli_connect("localhost", "root", "", "search_db");

if (!$con) { 
    die("Connection failed: " . mysqli_connect_error());
}
?>
