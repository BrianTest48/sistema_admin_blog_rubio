<?php
    /* Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /* Llamando a la clase */
    require_once("../models/Contacto.php");
    /* Inicializando Clase */
    $contacto = new Contacto();

    /* Opcion de solicitud de controller */
    switch($_GET["op"]){
       
        case "listar_tabla":
            $datos = $contacto->get_contacto();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["id"];
                $sub_array[] = '<img src="../../assets/contacto/'.$row["imagen"].'" width="300px" height="100px">';
            
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
            $directorio_destino = "../assets/contacto/"; 
        
            // Nombre del archivo de imagen
            $nombre_archivo = isset($_FILES['cont_image']['name']) ? $_FILES['cont_image']['name'] : null;
        
            // Ruta completa del archivo de imagen
            $ruta_archivo = $directorio_destino . $nombre_archivo;

            
            // Nombre de la imagen para guardar en la base de datos
            $nombre_imagen = $nombre_archivo;
        
            // Insertar o editar el artículo en la base de datos
            $datos = $contacto->get_contacto_id($_POST["cont_id"]);
            if (empty($_POST["cont_id"])) {
               //
            } else {
                if (!empty($_FILES['cont_image']['name'])) {
                    // Si se proporciona una nueva imagen, actualizarla junto con el artículo
                    $contacto->update_contacto($_POST["cont_id"], $nombre_imagen, $_POST["cont_mensaje"]);
                    move_uploaded_file($_FILES['cont_image']['tmp_name'], $ruta_archivo);
                } else {
                    // Si no se proporciona una nueva imagen, actualizar solo los otros campos del artículo
                    $contacto->update_contacto_sin_img($_POST["cont_id"], $_POST["cont_mensaje"]);
                }
            }
        
            break;
            
        case "mostrar":
            $datos = $contacto->get_contacto_id($_POST["cont_id"]);
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