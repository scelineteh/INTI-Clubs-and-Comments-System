<?php
session_start();
if(!isset($_SESSION["studentid"])){
header("Location: aalogin.php");
exit(); }
?>