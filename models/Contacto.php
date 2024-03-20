<?php
    class Contacto extends Conectar{

        public function get_contacto(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM contacto";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
 
        public function update_contacto($id, $imagen, $mensaje) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE contacto SET imagen = ?, mensaje = ? WHERE id = ?";
            $stmt = $conectar->prepare($sql);
            $stmt->bindParam(1, $imagen);
            $stmt->bindParam(2, $mensaje);
            $stmt->bindParam(3, $id);
            $stmt->execute();
            return $resultado=$stmt->fetchAll();
        }

        public function update_contacto_sin_img($id, $mensaje) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE contacto SET mensaje = ? WHERE id = ?";
            $stmt = $conectar->prepare($sql);
            $stmt->bindParam(1, $mensaje);
            $stmt->bindParam(2, $id);
            $stmt->execute();
            return $resultado=$stmt->fetchAll();
        }
        
        public function get_contacto_id($cur_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM contacto WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cur_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
       
    }
?>