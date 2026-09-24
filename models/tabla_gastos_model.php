<?php

    class tabla_gastos_model{
        private $db;
        private $index;
        
        public function __construct() {
            require_once("./data/datosdb.php");
            $this->db = Conectar::conexion($server, $dbname, $user, $password);
            $this->index = array();
        }

        public function buscarGastos($fechaInicial, $fechaFinal) {
            try {
                $sql = "SELECT * FROM gastos WHERE fecha >= :fechaInicial AND fecha <= :fechaFinal ORDER BY fecha ASC";        
                $stmt = $this->db->prepare($sql);
                
                $stmt->bindParam(':fechaInicial', $fechaInicial, PDO::PARAM_STR);
                $stmt->bindParam(':fechaFinal', $fechaFinal, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
                } catch (PDOException $e) {
                echo $sql . '<br>' . $e->getMessage();
            } 
        }

        public function buscarDia($fecha) {
            try {
                $sql = "SELECT * FROM gastos WHERE fecha = :fecha ORDER BY fecha ASC";        
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
                } catch (PDOException $e) {
                echo $sql . '<br>' . $e->getMessage();
            } 
        }

        public function buscarGasto($id) {
            try {
                $sql = "SELECT * FROM gastos WHERE id = :id";        
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
                } catch (PDOException $e) {
                echo $sql . '<br>' . $e->getMessage();
            } 
        }

        public function eliminarGasto($id) {
            try {
                $sql = "DELETE FROM gastos WHERE id = :id";        
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                return $stmt->execute();
                } catch (PDOException $e) {
                echo $sql . '<br>' . $e->getMessage();
            } 
        }

    }

?>