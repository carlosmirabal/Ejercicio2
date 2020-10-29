<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <link href="../css/fontawesome-free-5.15.0-web/css/all.css" rel="stylesheet">
  <script  src="../js/code.js"></script>
</head>
<body>
    <?php
        require_once '../controller/session_controller.php';
        include "../model/alumnoDAO.php";
        include "../model/notaDAO.php";
        // $id= $_GET['id'];
        $alumnodao = new AlumnoDAO();
        $alumno = $alumnodao->lecturamodi($_GET['id']);
        $notadao = new NotaDAO();
        $notas = $notadao->notas();
        if (isset($_POST['nota1'])) {
            $update=new NotaDAO;
            $result=$update->update();
        }

    ?>
<h2 style="text-align: center;">Añadir Alumno</h2>
<div class="row">
    <div class="form">
      <form action="update_alu.php" method="POST" onsubmit="return validacionForm1()">
        <input type="hidden" name='id' value="<?php echo $_GET['id'];?>" ><br>
        <label>Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" value="<?php echo $alumno['nombre'];?>" disabled ><br>
        <label>1r apellido:</label><br>
        <input type="text" name="apellidop" id="apellidop" value="<?php echo $alumno['apellido_p'];?>" disabled ><br>
        <label>2nd apellido:</label><br>
        <input type="text" name="apellidom" id="apellidom" value="<?php echo $alumno['apellido_m'];?>" disabled ><br>
        <label>Grupo:</label><br>
        <input type="text" name="grupo" id="grupo" value="<?php echo $alumno['grupo'];?>" disabled ><br>
        <label>Email:</label><br>
        <input type="email" name="email" id="email" value="<?php echo $alumno['email'];?>" disabled ><br>
        <?php
        
        $i=0;
        foreach ($notas as $nota) {
          echo "<label>".$nota['nombre_asignatura']."</label><br>";
          echo "<input type='text' name='nota".$i."' id='nota' value='".$nota['nota']."'><br>";
          $i++;
          }
         ?>
        <input type="submit" value="Submit" name="update">
      </form> <br>  
    </div>
      <button class="button button2"><a href="zona_admin.php"><h2>Volver</h2></a></button>
</div>

</body>
</html>