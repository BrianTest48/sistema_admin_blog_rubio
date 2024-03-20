<?php
    class Portada extends Conectar{

        public function get_portada(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM portada";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_portada($titulo) {
           
            $conectar = parent::conexion();
            parent::set_names();
    
            // Preparar la consulta SQL para insertar un nuevo artículo
            $sql = "INSERT INTO portada (imagen) VALUES (?)";
            $stmt = $conectar->prepare($sql);
    
            // Enlazar los parámetros con los valores
            $stmt->bindParam(1, $titulo);
    
            // Ejecutar la consulta
            $stmt->execute();
    
            $sql1 = "SELECT last_insert_id() AS 'id'; ";
            $sql1 = $conectar->prepare($sql1);
            $sql1->execute();
            return $resultado = $sql1->fetchAll(PDO::FETCH_ASSOC);
           
        }

        public function update_portada($id, $titulo) {
            $conectar = parent::conexion();
            parent::set_names();
            
            // Preparar la consulta SQL para actualizar el artículo con el ID proporcionado
            $sql = "UPDATE portada SET imagen = ? WHERE id = ?";
            $stmt = $conectar->prepare($sql);
            
            // Enlazar los parámetros con los valores
            $stmt->bindParam(1, $titulo);
            $stmt->bindParam(2, $id);
            
            // Ejecutar la consulta
            $stmt->execute();
        
            return $resultado=$stmt->fetchAll();
        }


        public function get_portada_id($cur_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM portada WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cur_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_portada($id){
            $conectar = parent::conexion();
            $sql = "DELETE FROM portada WHERE id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            // Verificamos si se eliminó correctamente el registro
            if ($sql->rowCount() > 0) {
                return true; // Indicamos que se eliminó el registro correctamente
            } else {
                return false; // Indicamos que no se eliminó ningún registro (puede que el registro con ese ID no exista)
            }
        }
       
    }
?>