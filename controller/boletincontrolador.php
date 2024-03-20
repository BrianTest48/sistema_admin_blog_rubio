<?php
    /* Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /* Llamando a la clase */
    require_once("../models/Boletin.php");
    /* Inicializando Clase */
    $boletin = new Boletin();

    /* Opcion de solicitud de controller */
    switch($_GET["op"]){
       
        case "listar":
            $datos=$boletin->get_correos();
            $data = Array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["id"];
                $sub_array[] = $row["correo"];
                $sub_array[] = $row["fecha"];
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
            $correo = $_POST['correo'];
            $datos=$boletin->insert_boletin($correo);
            
            echo json_encode($datos);
            break;
    }
?>