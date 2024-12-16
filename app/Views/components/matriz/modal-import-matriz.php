<div class="modal fade" id="modal-import-matriz" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Importar Matrizes</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="alert alert-primary text-dark" role="alert">
                        <i class="fa fa-info-circle"></i><strong>Caminho para exportação destes dados no SUAP:</strong><br>
                        Ensino -> Cursos, Matrizes e Componentes -> Matrizes Curriculares<br>
                        Aplicar os devidos filtros (Campus)<br>
                        Clicar no botão [Exportar para XLS], no canto superior direito.<br>
                        Salvar o arquivo e então enviar através do campo abaixo.
                    </div>
                </div>
            </div>

            <form id="importarMatriz" class="forms-sample" method="post" action='<?php echo base_url('sys/matriz/importar'); ?>' enctype="multipart/form-data">
                <div class="modal-body">
                    <?php echo csrf_field() ?>
                    <div class="form-group">
                        <label>Enviar arquivo</label>
                        <input type="file" name="arquivo" class="file-upload-default">
                        <div class="input-group col-xs-12 d-flex align-items-center">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Selecione o arquivo clicando ao lado ->">
                            <span class="input-group-append ms-2">
                                <button class="file-upload-browse btn btn-primary" type="button">Buscar arquivo</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>