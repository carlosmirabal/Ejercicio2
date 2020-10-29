<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Nota Media</title>
</head>
<body>
    <h2>Nota Media</h2>
    <?php 
        require_once '../model/notaDAO.php';
        $nota=new NotaDAO;
        $nota->medias();
    ?>
    <br>
    <a href="zona_admin.php"><button class="button button2">Volver</button></a>
 
</body>
</html>