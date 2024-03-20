<?php
    class Articulo extends Conectar{

        public function get_articulos(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM articulos";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_articulo($titulo, $extracto, $texto, $thumb) {
           
            $conectar = parent::conexion();
            parent::set_names();
    
            // Preparar la consulta SQL para insertar un nuevo artículo
            $sql = "INSERT INTO articulos (titulo, extracto, texto, thumb) VALUES (?, ?, ?, ?)";
            $stmt = $conectar->prepare($sql);
    
            // Enlazar los parámetros con los valores
            $stmt->bindParam(1, $titulo);
            $stmt->bindParam(2, $extracto);
            $stmt->bindParam(3, $texto);
            $stmt->bindParam(4, $thumb);
    
            // Ejecutar la consulta
            $stmt->execute();
    
            $sql1 = "SELECT last_insert_id() AS 'id'; ";
            $sql1 = $conectar->prepare($sql1);
            $sql1->execute();
            return $resultado = $sql1->fetchAll(PDO::FETCH_ASSOC);
           
        }

        public function update_articulo($id, $titulo, $extracto, $texto, $thumb) {
            $conectar = parent::conexion();
            parent::set_names();
            
            // Preparar la consulta SQL para actualizar el artículo con el ID proporcionado
            $sql = "UPDATE articulos SET titulo = ?, extracto = ?, texto = ?, thumb = ? WHERE id = ?";
            $stmt = $conectar->prepare($sql);
            
            // Enlazar los parámetros con los valores
            $stmt->bindParam(1, $titulo);
            $stmt->bindParam(2, $extracto);
            $stmt->bindParam(3, $texto);
            $stmt->bindParam(4, $thumb);
            $stmt->bindParam(5, $id);
            
            // Ejecutar la consulta
            $stmt->execute();
        
            return $resultado=$stmt->fetchAll();
        }

        public function update_articulo_sin_img($id, $titulo, $extracto, $texto) {
            $conectar = parent::conexion();
            parent::set_names();
            
            // Preparar la consulta SQL para actualizar el artículo con el ID proporcionado
            $sql = "UPDATE articulos SET titulo = ?, extracto = ?, texto = ? WHERE id = ?";
            $stmt = $conectar->prepare($sql);
            
            // Enlazar los parámetros con los valores
            $stmt->bindParam(1, $titulo);
            $stmt->bindParam(2, $extracto);
            $stmt->bindParam(3, $texto);
            $stmt->bindParam(4, $id);
            
            // Ejecutar la consulta
            $stmt->execute();
        
            return $resultado=$stmt->fetchAll();
        }
        
        
        

        public function get_last_articulos(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM articulos ORDER BY id DESC LIMIT 4;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_articulo_id($cur_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM articulos WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cur_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_articulo($id){
            $conectar = parent::conexion();
            $sql = "DELETE FROM articulos WHERE id = ?";
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