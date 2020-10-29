<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php  
		require_once '../controller/session_controller.php';
		require_once '../model/alumnoDAO.php';
		if (isset($_GET['id'])) {
			$eliminar=new alumnoDAO;
			$eliminar->eliminar();
		}
	?>
	<div class="form2">
		<h3>Filtro de alumnos</h3>
		<form action="zona_admin.php" method="POST">
		<label for="fnombre">Nombre:</label>
		<input type="text" name="fnombre" value="">
		<label for="fapellido_p">Apellido Paterno:</label>
		<input type="text" name="fapellido_p" value="">
		<input type="submit" value="Enviar" name="filtro_b">
		<br><br>
		</form>
		<br> <br>
	</div>


	<?php 
		echo "<br>";
		// require_once '../controller/session_controller.php';
		// require_once '../model/alumnoDAO.php';
		if (empty($_POST['filtro_b'])) {
			$res=new alumnoDAO;
			echo $res->mostrar();
		}elseif (empty($_POST['fnombre']) && empty($_POST['fapellido_p'])) {
			$res=new alumnoDAO;
			echo $res->mostrar();
		}elseif (isset($_POST['fnombre']) || isset($_POST['fapellido_p'])){
			$res=new alumnoDAO;
			echo $res->filtro();
		}
		
	?>
	<br>
	<button><a href="modificar_alumnos.php">Añadir Usuario</a></button>
	<button><a href="nota_media.php">Nota media</a></button>


</body>
</html>