<?php
    class login_model{
        private $db;
        private $personas;
        

        public function __construct() {
            require_once("./data/datosdb.php");
            $this->db = Conectar::conexion($server, $dbname, $user, $password);
            $this->personas = array();
        }

        public function validar_usuario($usuario) {
  
            try {
                $sql = "SELECT password from usuarios where user = :user";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':user', $usuario, PDO::PARAM_STR);
                
                $stmt->execute();
                $result = $stmt->fetchAll();
        
                return $result;

                } catch (PDOException $e) {
                echo $sql . '<br>' . $e->getMessage();
            }
        }

    }

?>