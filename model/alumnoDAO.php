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
			echo "<table id='customers'>";
			echo "<tr><th>Editar</th><th>ID</th><th>Nombre</th><th>Apellido 1</th><th>Apellido 2</th><th>Grupo</th><th>Email</th><th>Password</th></tr>";
			foreach ($lista_alumnos as $alumno) {
				$id=$alumno['id_alumno'];

				echo "<tr><td><a href='modificar_alumno.php?id={$id}'>Modificar </a>";
				echo "<a href='../view/zona_admin.php?id={$id}'>Eliminar</a></td>";
				echo "<td>$id</td>";
				echo "<td>{$alumno['nombre']}</td>";
				echo "<td>{$alumno['apellido_p']}</td>";
				echo "<td>{$alumno['apellido_m']}</td>";
				echo "<td>{$alumno['grupo']}</td>";
				echo "<td>{$alumno['email']}</td>";
				echo "<td>{$alumno['passwd']}</td>";
				
			}
			echo "</tr></table>";
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
		public function filtro(){
			$nombre=$_POST['fnombre'];
			$apellido_p=$_POST['fapellido_p'];
			$query="SELECT * FROM tbl_alumno WHERE nombre LIKE '%$nombre%' AND apellido_p LIKE '%$apellido_p%'";
			$sentencia=$this->pdo->prepare($query);
			$sentencia->execute();

			$lista_alumnos=$sentencia->fetchALL(PDO::FETCH_ASSOC);
			echo "<table id='customers'>";
			echo "<tr><th>Editar</th><th>ID</th><th>Nombre</th><th>Apellido 1</th><th>Apellido 2</th></tr>";

			foreach ($lista_alumnos as $alumno) {
				$id=$alumno['id_alumno'];
				echo "<tr><td><a href='modificar_alumno.php?id={$id}'>Modificar </a>";
				echo "<a href='../view/zona_admin.php?id={$id}'>Eliminar </a></td>";

				echo "<td>{$id}</td>";
				echo "<td>{$alumno['nombre']}</td>";
				echo "<td>{$alumno['apellido_p']}</td>";
				echo "<td>{$alumno['apellido_m']}</td>";
			}
			echo "</tr></table>";
		}
		public function eliminar(){
			try {
				$this->pdo->beginTransaction();
				$id=$_GET['id'];
		
				//Primero hacemos una consulta rn la tabla notas para que encuentre el usuario
				$query="SELECT * FROM tbl_notas WHERE `id_alumno` =?";
				$sentencia=$this->pdo->prepare($query);
				$sentencia->bindParam(1,$id);
				$sentencia->execute();
				$lista_notas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
				//Si encuentra un resultado eliminará todas las notas relacionadas con el usuario
				//Además eliminaremos el usuario
				if ($lista_notas!="") {
					$query="DELETE FROM tbl_notas WHERE id_alumno=?";
					$sentencia=$this->pdo->prepare($query);
					$sentencia->bindParam(1,$id);
					$sentencia->execute();
		
					$query="DELETE FROM tbl_alumno WHERE id_alumno=?";
					$sentencia=$this->pdo->prepare($query);
					$sentencia->bindParam(1,$id);
					$sentencia->execute();
				}
				$this->pdo->commit();
				header('Location: ../view/zona_admin.php');
			} catch (Exception $e) {
				$this->pdo->rollBack();
				echo $e;
				header('Location: ../view/zona_admin.php');
			}
		}


	}


?>



