<?php  
	
	include 'persona.php';
	class Administrador extends Persona {
		
		function __construct($email,$passwd) {
			parent:: __construct($email,$passwd);
			$this->email=$email;
			$this->passwd=$passwd;
		}

    /**
     * @return mixed
     */
    public function getIdAdmin()
    {
        return $this->id_admin;
    }

    /**
     * @param mixed $id_admin
     *
     * @return self
     */
    public function setIdAdmin($id_admin)
    {
        $this->id_admin = $id_admin;

        return $this;
    }
}

?>