<?php 

class Nota {
    //Atributos, siempre en privado
    private $id_nota;
    private $nombre_materia;
    private $id_alumno;
    private $nota;

    //Constructor
    public function __construct($id_nota,$nombre_materia,$nota){
        $this->id_nota=$id_nota;
        $this->nombre_materia=$nombre_materia;
        $this->nota=$nota;
    }

    /*
    * @return mixed
    */
    public function getIdNota()
    {
        return $this->id_nota;
    }

    /*
    * @param mixed $id_nota
    *
    * @return self
    */
    public function setIdNota($id_nota)
    {
        $this->id_nota = $id_nota;

        return $this;
    }

    /*
    * @return mixed
    */
    public function getNombreMateria()
    {
        return $this->nombre_materia;
    }

    /*
    * @param mixed $nombre_materia
    *
    * @return self
    */
    public function setNombreMateria($nombre_materia)
    {
        $this->nombre_materia = $nombre_materia;

        return $this;
    }

    /*
    * @return mixed
    */
    public function getIdAlumno()
    {
        return $this->id_alumno;
    }

    /*
    * @param mixed $id_alumno
    *
    * @return self
    */
    public function setIdAlumno($id_alumno)
    {
        $this->id_alumno = $id_alumno;

        return $this;
    }

    /*
    * @return mixed
    */
    public function getNota()
    {
        return $this->nota;
    }

    /*
    * @param mixed $nota
    *
    * @return self
    */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }
}

?>