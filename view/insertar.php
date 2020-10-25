<?php 
//NO UTILIZAR ESTE ARCHIVO

	include '../model/connection.php';

	try {

	$sentencia=$pdo->prepare("INSERT INTO `tbl_alumno` (`nombre`,`apellido_p`,`apellido_m`,`grupo`,`email`,`passwd`) VALUES (?,?,?,?,?,?)");
	$nombre=$_POST['fnombre'];
	$apellido_p=$_POST['fapellido_p'];
	$apellido_m=$_POST['fapellido_m'];
	$grupo=$_POST['fgrupo'];
	$email=$_POST['femail'];
	$passwd=md5($_POST['fpasswd']);
	$sentencia->bindParam(1,$nombre);
	$sentencia->bindParam(2,$apellido_p);
	$sentencia->bindParam(3,$apellido_m);
	$sentencia->bindParam(4,$grupo);
	$sentencia->bindParam(5,$email);
	$sentencia->bindParam(6,$passwd);

	$sentencia->execute();
		
	} catch (Exception $e) {
		$pdo->rollback();
		echo $ex->getMessage();
	}


?>