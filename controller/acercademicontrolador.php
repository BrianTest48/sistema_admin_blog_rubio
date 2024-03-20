<?php
    /* Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /* Llamando a la clase */
    require_once("../models/Acercademi.php");
    /* Inicializando Clase */
    $acercade = new Acercademi();

    /* Opcion de solicitud de controller */
    switch($_GET["op"]){
       
        case "listar_tabla":
            $datos = $acercade->get_acercade();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["id"];
                $sub_array[] = '<img src="../../assets/acercademi/'.$row["imagen"].'" width="250px" height="250px">';
            
                $mensaje = strlen($row["mensaje"]) > 50 ? substr($row["mensaje"], 0, 50) . '...' : $row["mensaje"];
                $sub_array[] = $mensaje;
                
                $sub_array[] = '<button type="button" onClick="editar('.$row["id"].');"  id="'.$row["id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
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
        case 'guardaryeditar':
            // Directorio donde se guardarán las imágenes
            $directorio_destino = "../assets/acercademi/"; 
        
            // Nombre del archivo de imagen
            $nombre_archivo = isset($_FILES['acer_image']['name']) ? $_FILES['acer_image']['name'] : null;
        
            // Ruta completa del archivo de imagen
            $ruta_archivo = $directorio_destino . $nombre_archivo;

            
            // Nombre de la imagen para guardar en la base de datos
            $nombre_imagen = $nombre_archivo;
        
            // Insertar o editar el artículo en la base de datos
            $datos = $acercade->get_acercade_id($_POST["acer_id"]);
            if (empty($_POST["acer_id"])) {
               //
            } else {
                if (!empty($_FILES['acer_image']['name'])) {
                    // Si se proporciona una nueva imagen, actualizarla junto con el artículo
                    $acercade->update_acercade($_POST["acer_id"], $nombre_imagen, $_POST["acer_mensaje"]);
                    move_uploaded_file($_FILES['acer_image']['tmp_name'], $ruta_archivo);
                } else {
                    // Si no se proporciona una nueva imagen, actualizar solo los otros campos del artículo
                    $acercade->update_acercade_sin_img($_POST["acer_id"], $_POST["acer_mensaje"]);
                }
            }
        
            break;
            
        case "mostrar":
            $datos = $acercade->get_acercade_id($_POST["acer_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["id"] = $row["id"];
                    $output["imagen"] = $row["imagen"];
                    $output["mensaje"] = $row["mensaje"];
                }
                echo json_encode($output);
            }
            break;
    }
?>