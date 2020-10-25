<?php

	require_once '../model/admin.php';

	class alumnoDAO {
		private $pdo;

		function __construct() {
			include '../model/connection.php';
			$this->pdo=$pdo;
		}

		public function mostrar(){
			$query="SELECT * FROM tbl_alumno";
			$sentencia=$this->pdo->prepare($query);
			$sentencia->execute();

			$lista_alumnos=$sentencia->fetchALL(PDO::FETCH_ASSOC);

			foreach ($lista_alumnos as $alumno) {
				$id=$alumno['id_alumno'];
				echo "<a href='modificar_alumno.php?id={$id}'>Modificar </a>";
				echo "<a href='eliminar_alumno.php?id={$id}'>Eliminar </a>";

				echo $id;
				echo " , {$alumno['nombre']} , ";
				echo "{$alumno['apellido_p']} , ";
				echo "{$alumno['apellido_m']} , ";
				echo "{$alumno['grupo']} , ";
				echo "{$alumno['email']} , ";
				echo "{$alumno['passwd']} , <br>";
			}
		}

		public function insertar(){
			try {

				$sentencia=$this->pdo->prepare("INSERT INTO `tbl_alumno` (`nombre`,`apellido_p`,`apellido_m`,`grupo`,`email`,`passwd`) VALUES (?,?,?,?,?,?)");
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
				header('Location: ../view/zona_admin.php');
					
			} catch (Exception $e) {
					$this->pdo->rollback();
					echo $ex->getMessage();
			}
		}
	}


?>



