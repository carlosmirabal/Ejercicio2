<?php
require_once '../model/admin.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../index.html');
}
echo '<div class="logo"><h1>Bienvenido '.$_SESSION['email']->getEmail().'</h1><h1 style="float: right;"><a href="../controller/logout_controller.php">Logout</a></h1></div>';