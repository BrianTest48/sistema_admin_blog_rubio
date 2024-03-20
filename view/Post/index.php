<?php require_once("../Main/sesion.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("../Main/mainhead.php"); ?>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.snow.css" rel="stylesheet">
    <title>Administrador - Post</title>
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
                <span class="breadcrumb-item active">Post </span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Lista de Post</h4>
            <p class="mg-b-0">En este modulo se presentaran todos los posts</p>
        </div>
        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <!-- <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Empresas</h6> -->
                <div class="row">
                    <div class="col-12 col-sm-6">
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="row justify-content-end">

                            <div class="col-12 col-sm-5">
                                <button id="btnnuevo" class="btn btn-outline-primary btn-block mg-b-10">Nuevo Post</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="table-wrapper">
                    <table id="empresa_data" class="table display responsive nowrap" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="wd-5p">Id</th>
                                <th class="wd-5p">Titulo</th>
                                <th class="wd-5p">Extracto</th>
                                <th class="wd-10p">Fecha</th>
                                <th class="wd-5p">Editar</th>
                                <th class="wd-5p">Eliminar</th>
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

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.js"></script>
    <script src="./post.js" type="text/javascript"></script>

</body>

</html>