<div id="modalmantenimiento" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content tx-size-sm">
            <form method="post" id="empresa_form">
                <div class="modal-header  pd-x-20">
                    <h4 class="modal-title" id="mdltitulo"></h4>
                </div>
                <div class="modal-body pd-20">
                    <input type="hidden" id="art_id" name="art_id">
                    <div class="form-layout form-layout-1">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Titulo : <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="art_titulo" id="art_titulo" placeholder="Ingrese Titulo" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Extracto : <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="art_ext" id="art_ext" placeholder="Ingrese Extracto" required>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Cuerpo: <span class="tx-danger">*</span></label>
                                    <!-- <input class="form-control" type="text" name="art_cuerpo" id="art_cuerpo"  placeholder="Ingrese Cuerpo" required> -->
                                    <div id="editor">
                                    </div>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Miniatura: <span class="tx-danger">*</span></label>
                                    <input type="file" class="form-control" name="art_image" id="art_image" required>
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->
                    </div>
                    <div class="modal-footer" id="modal-footer">
                        <button type="button" class="btn btn-rounded btn-default" id="btnclosemodal">Cerrar</button>
                        <button type="submit" name="action" id="btnagregar" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                    </div>
            </form>
        </div>
    </div>
</div>