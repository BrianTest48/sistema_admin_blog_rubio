<?php
    class Usuario extends Conectar {

        public function loguear_usuario($usuario, $clave) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM usuario WHERE usuario = ? AND clave = ? ;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usuario);
            $sql->bindValue(2, $clave);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>