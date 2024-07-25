<?php
session.start();
$username="Neural";
$server="localhost";
$password="AshrayaFoundation";
$db="Ashraya";


$con=mysqli_connect($server,$username,$password,$db);
if(!$con){
    die ("connection not done db".mysqli_connect_error);
}
else{
    echo("database connected succesfully <br>");
}
?>
