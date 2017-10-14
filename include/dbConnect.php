<?php
$host ="localhost";
$user ="root";
$pass="";
$dbname ="landing";

$dbc = mysqli_connect($host, $user, $pass, $dbname);

//check connect database
if(!$dbc) {
    trigger_error("Can't connect your database" . mysqli_error());
}else {
    //set charset utf-8
    mysqli_set_charset($dbc, 'utf-8');
}