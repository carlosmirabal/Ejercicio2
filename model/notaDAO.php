<?php
require_once 'nota.php';
class NotaDAO{
    private $pdo;

    public function __construct(){
        include '../model/connection.php';
        $this->pdo=$pdo;
    }

    public function notas(){
        $id=$_GET['id'];
        $query = "SELECT * FROM tbl_notas WHERE id_alumno=?";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->bindParam(1,$id);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(){
        try {
            $this->pdo->beginTransaction();

            $query1="UPDATE tbl_notas SET nota=? WHERE id_alumno=? AND nombre_asignatura LIKE 'Mates';";
            $sentencia1=$this->pdo->prepare($query1);
            $id=$_POST['id'];
            echo $id;
            $nota1=$_POST['nota0'];
            echo $nota1;
            $sentencia1->bindParam(1,$nota1);
            $sentencia1->bindParam(2,$id);
            $sentencia1->execute();
            $query2="UPDATE tbl_notas SET nota=? WHERE id_alumno=? AND nombre_asignatura LIKE 'Programacion';";
            $sentencia2=$this->pdo->prepare($query2);
            $id=$_POST['id'];
            $nota2=$_POST['nota1'];
            echo $nota2;
            $sentencia2->bindParam(1,$nota2);
            $sentencia2->bindParam(2,$id);
            $sentencia2->execute();
            $query3="UPDATE tbl_notas SET nota=? WHERE id_alumno=? AND nombre_asignatura LIKE 'Fisica';";
            $sentencia3=$this->pdo->prepare($query3);
            $id=$_POST['id'];
            $nota3=$_POST['nota2'];
            echo $nota3;
            $sentencia3->bindParam(1,$nota3);
            $sentencia3->bindParam(2,$id);
            $sentencia3->execute();
            $this->pdo->commit();
            header('Location: ../view/zona_admin.php');
        } catch (Exception $e) {
            $this->pdo->rollBack();
            echo $e;
			header('Location: ../view/zona_admin.php');
        }
    }

    public function medias(){
        $query="SELECT AVG(tbl_notas.nota) AS notas FROM tbl_notas WHERE nombre_asignatura='Mates'";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $return=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach ($return as $media) {
            echo "La nota media de Mates es: ".round($media['notas'],2)."<br>";

        }

        $query2="SELECT AVG(tbl_notas.nota) AS notas FROM tbl_notas WHERE nombre_asignatura='Fisica'";
        $sentencia2=$this->pdo->prepare($query2);
        $sentencia2->execute();
        $return2=$sentencia2->fetchAll(PDO::FETCH_ASSOC);

        foreach ($return2 as $media2) {
            echo "La nota media de Física es: ".round($media2['notas'],2)."<br>";
        }

        $query3="SELECT AVG(tbl_notas.nota) AS notas FROM tbl_notas WHERE nombre_asignatura='Programacion'";
        $sentencia3=$this->pdo->prepare($query3);
        $sentencia3->execute();
        $return3=$sentencia3->fetchAll(PDO::FETCH_ASSOC);
        foreach ($return3 as $media3) {
            echo "La nota media de Programacion es: ".round($media3['notas'],2)."<br>";

        }

        $query5="SELECT nombre_asignatura,AVG(nota) AS nota FROM tbl_notas GROUP BY nombre_asignatura ORDER BY nota DESC LIMIT 1";
        $sentencia5=$this->pdo->prepare($query5);
        $sentencia5->execute();
        $return5=$sentencia5->fetchAll(PDO::FETCH_ASSOC);
        foreach ($return5 as $media5) {
            echo "La materia con más nota media es  ".$media5['nombre_asignatura']." con una nota de ".round($media5['nota'],2)."<br>";

        }

        $query4="SELECT qry_nota_max.nombre_asignatura, qry_nota_max.nota_max, MAX(tbl_alumno.nombre) AS alumno FROM (SELECT tbl_notas.nombre_asignatura, MAX(tbl_notas.nota) AS nota_max FROM tbl_notas GROUP BY tbl_notas.nombre_asignatura) AS qry_nota_max INNER JOIN tbl_notas ON tbl_notas.nombre_asignatura = qry_nota_max.nombre_asignatura AND tbl_notas.nota = qry_nota_max.nota_max INNER JOIN tbl_alumno ON tbl_notas.id_alumno = tbl_alumno.id_alumno GROUP BY tbl_notas.nombre_asignatura ORDER BY tbl_alumno.nombre DESC";
        $sentencia4=$this->pdo->prepare($query4);
        $sentencia4->execute();
        $return4=$sentencia4->fetchAll(PDO::FETCH_ASSOC);
        foreach ($return4 as $media4){
            echo $media4['nombre_asignatura']." ";
            echo $media4['nota_max']." ";
            echo $media4['alumno']."<br>";
        }


    }
}
?>