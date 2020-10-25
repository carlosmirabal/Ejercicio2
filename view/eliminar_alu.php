<?php 
    require_once '../model/connection.php';

    try {
        $pdo->beginTransaction();
        $id=$_GET['id'];

        //Primero hacemos una consulta rn la tabla notas para que encuentre el usuario
        $query="SELECT * FROM tbl_notas WHERE `id_alumno` =?";
        $sentencia=$pdo->prepare($query);
        $sentencia->bindParam(1,$id);
        $sentencia->execute();
        $lista_notas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        //Si encuentra un resultado eliminará todas las notas relacionadas con el usuario
        //Además eliminaremos el usuario
        if ($lista_notas!="") {
            $query="DELETE FROM tbl_notas WHERE id_alumno=?";
            $sentencia=$pdo->prepare($query);
            $sentencia->bindParam(1,$id);
            $sentencia->execute();

            $query="DELETE FROM tbl_alumno WHERE id_alumno=?";
            $sentencia=$pdo->prepare($query);
            $sentencia->bindParam(1,$id);
            $sentencia->execute();
        }
        $pdo->commit();
        header('Location: ../view/zona_admin.php');
    } catch (Exception $e) {
        $pdo->rollBack();
        echo $e;
        header('Location: ../view/zona_admin.php');
    }

?>