<?php
include '../model/admin.php';
include '../model/adminDAO.php';
if (isset($_POST['femail'])) {
    $admin = new Administrador($_POST['femail'], md5($_POST['fpasswd']));
    $adminDAO = new AdminDAO();
    echo "primer if";
    if($adminDAO->login($admin)){
        echo 'perfect';
        // establecer sesiones
        // redirección a ebook.admin.php
        header('Location: ../view/zona_admin.php');
    }else {
        header('Location: ../index.html');
        echo "fallo";
    }
}else {
    header('Location: ../index.html');
}