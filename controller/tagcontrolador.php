<?php
/* Llamando a cadena de Conexion */
require_once("../config/conexion.php");
/* Llamando a la clase */
require_once("../models/Tag.php");
/* Inicializando Clase */
$tag = new Tag();

/* Opcion de solicitud de controller */
switch ($_GET["op"]) {

    case "listar":
        $datos = $tag->get_tags();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["id"];
            $sub_array[] = $row["nombre"];
            $sub_array[] = '<button type="button" onClick="editar(' . $row["id"] . ');"  id="' . $row["id"] . '" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["id"] . ');"  id="' . $row["id"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case "guardaryeditar":
        try {
            $datos = $tag->get_tag_x_id($_POST["tag_id"]);
            if (empty($_POST["tag_id"])) {
                if (is_array($datos) && count($datos) == 0) {
                    $data = $tag->insert_tag($_POST["tag_nombre"]);
                    echo json_encode($data);
                }
            } else {
                $data = $tag->update_tag($_POST["tag_id"], $_POST["tag_nombre"]);
                echo json_encode($data);
            }
        } catch (PDOException $e) {
            // Manejo de la excepción
            echo json_encode(array("error" => $e->getMessage()));
        }
        break;

    case "mostrar":
        $datos = $tag->get_tag_x_id($_POST["tag_id"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["id"] = $row["id"];
                $output["nombre"] = $row["nombre"];
            }
            echo json_encode($output);
        }
        break;
    case "eliminar":
        $resultado = $tag->delete_tag($_POST["tag_id"]);

        // Comprobamos el resultado y devolvemos una respuesta apropiada
        if ($resultado) {
            // Si la eliminación fue exitosa, devolvemos 1
            echo "1";
        } else {
            // Si la eliminación falló, devolvemos 0
            echo "0";
        }
        break;
    case "combo":

        $datos = $tag->get_tags();
        if (is_array($datos) == true and count($datos) > 0) {
            $html = "<option label='Seleccione' ></option>";
            //$html="";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row["nombre"] . "'>" . $row["nombre"] . "</option>";
            }
            echo $html;
        }
        break;
}
