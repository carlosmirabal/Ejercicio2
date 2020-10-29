<?php  
	
	require_once 'persona.php';
	class Alumno extends Persona {

		private $nombre;
		private $apellido_p;
		private $apellido_m;
		private $grupo;
		
		function __construct($id_persona,$nombre,$apellido_p,$apellido_m,$grupo,$email,$passwd)
		{
			parent:: __construct($id_persona,$nombre,$apellido_p,$apellido_m,$grupo,$email,$passwd);
			$this->nombre=$nombre;
			$this->apellido_p=$apellido_p;
			$this->apellido_m=$apellido_m;
			$this->grupo=$grupo;
			$this->id_persona=$id_persona;
		}
	
    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellidoP()
    {
        return $this->apellido_p;
    }

    /**
     * @param mixed $apellido_p
     *
     * @return self
     */
    public function setApellidoP($apellido_p)
    {
        $this->apellido_p = $apellido_p;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellidoM()
    {
        return $this->apellido_m;
    }

    /**
     * @param mixed $apellido_m
     *
     * @return self
     */
    public function setApellidoM($apellido_m)
    {
        $this->apellido_m = $apellido_m;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * @param mixed $grupo
     *
     * @return self
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }
}
?>