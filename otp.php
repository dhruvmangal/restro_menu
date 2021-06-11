<?php
session_start();
$_SESSION["name"]= $_POST["name"];
$_SESSION["phone"]= $_POST["phone"];
$_SESSION["table"]=$_POST["table"];
$_SESSION["speak"]= "speak";
header("location:index.php");
?>