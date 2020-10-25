<?php  
	//DAO=Data Access Object
	require_once 'admin.php';
	class AdminDao{
	    private $pdo;

	    public function __construct(){
	        include 'connection.php';
	        $this->pdo=$pdo;
	    }

	    public function login($user){
	        $query = "SELECT * FROM tbl_administrador WHERE email=? AND passwd=?";
	        $sentencia=$this->pdo->prepare($query);
	        $email=$user->getEmail();
	        $passwd=$user->getPasswd();
	        $sentencia->bindParam(1,$email);
	        $sentencia->bindParam(2,$passwd);
	        $sentencia->execute();
	        $result=$sentencia->fetch(PDO::FETCH_ASSOC);
	        $numRow=$sentencia->rowCount();
	        echo $numRow;
	        if(!empty($numRow) && $numRow==1){
	            //Creamos la sesión
	            // $user->setNombre($result['email']);
	            $user->setIdPersona($result['id_admin']);
	            session_start();
	            $_SESSION['email']=$user;
	            return true;
	        }else {
	            return false;
	        }
	    }
	}

?>