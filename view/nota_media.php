<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Media</title>
</head>
<body>
    <h2>Nota Media</h2>
    <?php 
        require_once '../model/notaDAO.php';
        $nota=new NotaDAO;
        $nota->medias();
    ?>
</body>
</html>