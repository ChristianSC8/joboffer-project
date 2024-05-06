<?php
include_once("../../../layouts/head.php");
session_start();
if (!isset($_SESSION['user_authenticated']) || $_SESSION['user_authenticated'] !== true) {
    header("Location: ../../components/auth/login.php");
    exit();
}
include "header.dash.php";
?>


