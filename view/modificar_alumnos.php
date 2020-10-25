<!DOCTYPE html>
<html>
<head>
	<title>Agregar Alumnos</title>
</head>
<body>
	<?php
		include '../model/alumnoDAO.php';
		if (isset($_POST['insert'])) {
			$int=new alumnoDAO;
			$int->insertar();
		}

	?>
	<h2>Agregar Alumnos</h2>
	<form action="modificar_alumnos.php" method="POST">
	  <label for="fnombre">Nombre:</label><br>
	  <input type="text" name="fnombre" value=""><br>
	  <label for="fapellido_p">Apellido Paterno:</label><br>
	  <input type="text" name="fapellido_p" value=""><br><br>
	   <label for="fapellido_m">Apellido Materno:</label><br>
	  <input type="text" name="fapellido_m" value=""><br><br>
	   <label for="fgrupo">Grupo:</label><br>
	  <input type="text" name="fgrupo" value=""><br><br>
	   <label for="femail">Email:</label><br>
	  <input type="text" name="femail" value=""><br><br>
	  <label for="fpasswd">Password:</label><br>
	  <input type="text" name="fpasswd" value=""><br><br>
	  <input type="submit" value="Enviar" name="insert">
	</form> 
</body>
</html>