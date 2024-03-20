<?php
    /* Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /* Llamando a la clase */
    require_once("../models/Articulo.php");
    /* Inicializando Clase */
    $articulo = new Articulo();

    /* Opcion de solicitud de controller */
    switch($_GET["op"]){
       
        case "listar":
            $datos=$articulo->get_articulos();
            
            echo json_encode($datos);
            break;
        case "listar_tabla":
            $datos=$articulo->get_articulos();
            $data = Array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["id"];
                $sub_array[] = $row["titulo"];
                $sub_array[] = $row["extracto"];
                $sub_array[] = $row["fecha"];
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
        case "listar_ultimos":
            $datos=$articulo->get_last_articulos();
            echo json_encode($datos);
            break;

        case 'guardaryeditar':
            // Directorio donde se guardarán las imágenes
            $directorio_destino = "../assets/img/"; // ¡Asegúrate de cambiar esto!
        
            // Nombre del archivo de imagen
            $nombre_archivo = isset($_FILES['art_image']['name']) ? $_FILES['art_image']['name'] : null;
        
            // Ruta completa del archivo de imagen
            $ruta_archivo = $directorio_destino . $nombre_archivo;

            
            // Nombre de la imagen para guardar en la base de datos
            $nombre_imagen = $nombre_archivo;
        
            // Insertar o editar el artículo en la base de datos
            $datos = $articulo->get_articulo_id($_POST["art_id"]);
            if (empty($_POST["art_id"])) {
                if (is_array($datos) && count($datos) == 0) {
                    $articulo->insert_articulo($_POST["art_titulo"], $_POST["art_ext"], $_POST["contenido"], $nombre_imagen);
                    move_uploaded_file($_FILES['art_image']['tmp_name'], $ruta_archivo);
                }
            } else {
                if (!empty($_FILES['art_image']['name'])) {
                    // Si se proporciona una nueva imagen, actualizarla junto con el artículo
                    $articulo->update_articulo($_POST["art_id"], $_POST["art_titulo"], $_POST["art_ext"], $_POST["contenido"], $nombre_imagen);
                    move_uploaded_file($_FILES['art_image']['tmp_name'], $ruta_archivo);
                } else {
                    // Si no se proporciona una nueva imagen, actualizar solo los otros campos del artículo
                    $articulo->update_articulo_sin_img($_POST["art_id"], $_POST["art_titulo"], $_POST["art_ext"], $_POST["contenido"]);
                }
            }
        
            break;
            
        case "mostrar":
            $datos = $articulo->get_articulo_id($_POST["art_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["id"] = $row["id"];
                    $output["titulo"] = $row["titulo"];
                    $output["extracto"] = $row["extracto"];
                    $output["fecha"] = $row["fecha"];
                    $output["texto"] = $row["texto"];
                    $output["thumb"] = $row["thumb"];
                }
                echo json_encode($output);
            }
            break;
        case "eliminar":
            $resultado = $articulo->delete_articulo($_POST["id"]);

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