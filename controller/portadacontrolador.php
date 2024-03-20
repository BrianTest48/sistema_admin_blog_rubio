<?php
    /* Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /* Llamando a la clase */
    require_once("../models/Portada.php");
    /* Inicializando Clase */
    $portada = new Portada();

    /* Opcion de solicitud de controller */
    switch($_GET["op"]){
       
        case "listar_tabla":
            $datos=$portada->get_portada();
            $data = Array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["id"];
                $sub_array[] = '<img src="../../assets/portada/'.$row["imagen"].'" width="300px" height="100px">';
                $sub_array[] = '<button type="button" onClick="editar('.$row["id"].');"  id="'.$row["id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id"].');"  id="'.$row["id"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
        case 'guardaryeditar':
            // Directorio donde se guardarán las imágenes
            $directorio_destino = "../assets/portada/"; // ¡Asegúrate de cambiar esto!
        
            // Nombre del archivo de imagen
            $nombre_archivo = isset($_FILES['ptd_image']['name']) ? $_FILES['ptd_image']['name'] : null;
        
            // Ruta completa del archivo de imagen
            $ruta_archivo = $directorio_destino . $nombre_archivo;

            
            // Nombre de la imagen para guardar en la base de datos
            $nombre_imagen = $nombre_archivo;
        
            // Insertar o editar el artículo en la base de datos
            $datos = $portada->get_portada_id($_POST["ptd_id"]);
            if (empty($_POST["ptd_id"])) {
                if (is_array($datos) && count($datos) == 0) {
                    $portada->insert_portada($nombre_imagen);
                    move_uploaded_file($_FILES['ptd_image']['tmp_name'], $ruta_archivo);
                }
            } else {
                $portada->update_portada($_POST["ptd_id"], $nombre_imagen);
                move_uploaded_file($_FILES['ptd_image']['tmp_name'], $ruta_archivo);
            }
        
            break;
            
        case "mostrar":
            $datos = $portada->get_portada_id($_POST["ptd_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["id"] = $row["id"];
                    $output["imagen"] = $row["imagen"];
                }
                echo json_encode($output);
            }
            break;
        case "eliminar":
            $resultado = $portada->delete_portada($_POST["id"]);

            // Comprobamos el resultado y devolvemos una respuesta apropiada
            if ($resultado) {
                // Si la eliminación fue exitosa, devolvemos 1
                echo "1";
            } else {
                // Si la eliminación falló, devolvemos 0
                echo "0";
            }
            break;
    }
?>