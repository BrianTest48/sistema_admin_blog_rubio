<?php
require_once("../config/conexion.php");
require_once("../models/Usuario.php");

session_start();

$usuario = new Usuario();

switch ($_GET["op"]) {
    case 'ingresar':
        $datos = $usuario->loguear_usuario($_POST["alias"], $_POST["clave"]);

        if (is_array($datos) && count($datos) > 0) {
            $_SESSION["id"] = $datos[0]["id"];
            $_SESSION["nombre"] = $datos[0]["nombre"];
            echo "1";
        } else {
            echo "0";
        }

        break;
}
