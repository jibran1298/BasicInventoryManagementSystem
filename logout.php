<?php
session_start();
$_SESSION["login"] = "notok";
header('Location: index.php');
?>