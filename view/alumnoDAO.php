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
	}


?>



