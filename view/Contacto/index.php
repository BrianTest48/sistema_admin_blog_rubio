<?php require_once("../Main/sesion.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("../Main/mainhead.php"); ?>
    <title>Administrador - Contacto</title>
</head>

<body>
    <?php
    require_once("../Main/mainleftpanel.php");
    require_once("../Main/mainheadpanel.php");
    ?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="../Inicio/">Inicio</a>
                <span class="breadcrumb-item active">Contacto</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Configuracion de Imagen</h4>
            <p class="mg-b-0">En este modulo se podra editar el modulo "Contacto"</p>
        </div>
        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <br>
                <div class="table-wrapper">
                    <table id="empresa_data" class="table display responsive nowrap" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="wd-5p">Id</th>
                                <th class="wd-5p">Imagen</th>
                                <th class="wd-5p">Texto</th>
                                <th class="wd-5p">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
    <footer class="br-footer">
        <div class="footer-left">
            <div class="mg-b-2"></div>
            <div></div>
        </div>
        <div class="footer-right d-flex align-items-center">
            <span class="tx-uppercase mg-r-10"></span>
        </div>
    </footer>
    <!-- ########## END: MAIN PANEL ########## -->
    <?php
    require_once("./modal.php");
    require_once("../Main/mainjs.php");
    ?>
    <script src="./contacto.js" type="text/javascript"></script>

</body>

</html>