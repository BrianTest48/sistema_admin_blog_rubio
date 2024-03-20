<?php
    class Boletin extends Conectar{

        public function get_correos(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM boletin ORDER BY id DESC";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_boletin($correo) {
           
            $conectar = parent::conexion();
            parent::set_names();
    
            // Preparar la consulta SQL para insertar un nuevo artículo
            $sql = "INSERT INTO boletin (correo, fecha) VALUES (?, now())";
            $stmt = $conectar->prepare($sql);
            $stmt->bindParam(1, $correo);
            $stmt->execute();
    
            $sql1 = "SELECT last_insert_id() AS 'id'; ";
            $sql1 = $conectar->prepare($sql1);
            $sql1->execute();
            return $resultado = $sql1->fetchAll(PDO::FETCH_ASSOC);
           
        }

    
       
    }
?>