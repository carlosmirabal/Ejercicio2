<?php  

	/**
	 * 
	 */
	abstract class Persona {

		protected $id_persona;
		protected $email;
		protected $passwd;
		
		function __construct($email,$passwd)
		{
			$this->email->$email;
			$this->passwd->$passwd;
		}
	
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * @param mixed $passwd
     *
     * @return self
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->id_persona;
    }

    /**
     * @param mixed $id_persona
     *
     * @return self
     */
    public function setIdPersona($id_persona)
    {
        $this->id_persona = $id_persona;

        return $this;
    }
}
?>