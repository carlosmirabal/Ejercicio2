<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
</head>
<body>
	<?php 
		require_once '../controller/session_controller.php';
		require_once '../model/alumnoDAO.php';
		$mostrar =new alumnoDAO();
		echo $mostrar->mostrar();
	?>
	<br>
	<button><a href="modificar_alumnos.php">Añadir Usuario</a></button>


</body>
</html>