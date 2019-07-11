<?php
session_start();
if($_SESSION["login"] != "ok")
{
    header('Location: index.php');
}
?>