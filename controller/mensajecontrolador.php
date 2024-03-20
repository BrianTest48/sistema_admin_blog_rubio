<?php
    /* Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /* Llamando a la clase */
    require_once("../models/Mensaje.php");
    /* Inicializando Clase */
    $mensaje = new Mensaje();

    /* Opcion de solicitud de controller */
    switch($_GET["op"]){
       
        case "listar":
            $datos=$mensaje->get_mensaje();
            $data = Array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["id"];
                $sub_array[] = $row["nombre"];
                $sub_array[] = $row["telefono"];
                $sub_array[] = $row["correo"];
                $mensaje = strlen($row["mensaje"]) > 50 ? substr($row["mensaje"], 0, 50) . '...' : $row["mensaje"];
                $sub_array[] = $mensaje;
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

        case "guardar":
            $nombre = $_POST['nombre'];
            $celular = $_POST['telefono'];
            $correo = $_POST['correo'];
            $msg= $_POST['mensaje'];
            $datos=$mensaje->insert_mensaje($nombre, $celular, $correo, $msg);
            
            echo json_encode($datos);
            break;
    }
?>