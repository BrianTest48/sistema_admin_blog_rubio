<?php
    class Mensaje extends Conectar{

        public function get_mensaje(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM mensajes ORDER BY id DESC";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_mensaje($nombre, $numero, $correo, $mensaje) {
           
            $conectar = parent::conexion();
            parent::set_names();
    
            // Preparar la consulta SQL para insertar un nuevo artículo
            $sql = "INSERT INTO mensajes(nombre, telefono, correo, mensaje, fecha) VALUES (?, ?, ?, ?, now())";
            $stmt = $conectar->prepare($sql);
            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $numero);
            $stmt->bindParam(3, $correo);
            $stmt->bindParam(4, $mensaje);
            $stmt->execute();
    
            $sql1 = "SELECT last_insert_id() AS 'id'; ";
            $sql1 = $conectar->prepare($sql1);
            $sql1->execute();
            return $resultado = $sql1->fetchAll(PDO::FETCH_ASSOC);
           
        }

    
       
    }
?>