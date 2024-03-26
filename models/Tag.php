<?php
class Tag extends Conectar
{

    public function get_tags()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tags WHERE estado = 1";
        $stmt = $conectar->prepare($sql);
        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }

    public function get_tag_x_id($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tags WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $resultado = $stmt->fetchAll();
    }

    public function insert_tag($nombre)
    {
        $conectar = parent::conexion();
        parent::set_names();

        // Preparar la consulta SQL para insertar un nuevo registro
        $sql = "INSERT INTO tags(nombre, fech_crea, fech_modi, fech_elim, estado) VALUES (?, now(), null, null, 1)";
        $stmt = $conectar->prepare($sql);
        $stmt->bindParam(1, $nombre);
        $stmt->execute();

        $sql1 = "SELECT last_insert_id() AS 'id'; ";
        $sql1 = $conectar->prepare($sql1);
        $sql1->execute();
        return $resultado = $sql1->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_tag($id, $nombre)
    {
        $conectar = parent::conexion();
        parent::set_names();

        // Preparar la consulta SQL para actualizar el nombre de un registro
        $sql = "UPDATE tags SET nombre = ?, fech_modi = now() WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $id);
        $stmt->execute();

        return $resultado = $stmt->fetchAll();
    }

    public function delete_tag($id)
    {
        $conectar = parent::conexion();
        parent::set_names();

        // Preparar la consulta SQL para eliminar un registro cambiando su estado a 0
        $sql = "UPDATE tags SET estado = 0 WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        // Verificamos si se eliminó correctamente el registro
        if ($stmt->rowCount() > 0) {
            return true; // Indicamos que se eliminó el registro correctamente
        } else {
            return false; // Indicamos que no se eliminó ningún registro (puede que el registro con ese ID no exista)
        }
    }
}
