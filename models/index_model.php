<?php

    class index_model{
        private $db;
        private $index;
        
        public function __construct() {
            require_once("./data/datosdb.php");
            $this->db = Conectar::conexion($server, $dbname, $user, $password);
            $this->index = array();
        }

        public function guardarGasto($concepto, $fecha, $cantidad) {
            try {
                $sql = "INSERT INTO gastos(concepto, fecha, cantidad) VALUES (:concepto, :fecha, :cantidad);";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':concepto', $concepto, PDO::PARAM_STR);
                $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
                $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
                $stmt->execute();
                
            } catch(PDOException $e) {
                echo $sql . "<br>" .  $e->getMessage();
            }
        }

    }

?>