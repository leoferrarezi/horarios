<div class="modal fade" id="modal-copiar-versao" tabindex="-1" role="dialog" aria-labelledby="modal-copiar-versao-label" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Duplicar Versão</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form id="duplicarVersao" class="forms-sample" method="post" action='<?php echo base_url('sys/versao/duplicar'); ?>'>
                <div class="modal-body">

                    <?php echo csrf_field() ?>

                    <input type="hidden" id="duplicar-id" name="id" />

                    <div class="form-group">
                        <label for="exampleInputUsername1">Nome da Cópia</label>
                        <input type="text" class="form-control" 
                            id="copia-nome" name="nome" placeholder="Digite o nome da nova versão">
                    </div>

                    <div class="form-group">
                        <label for="semestres">Semestre:</label>
                        <div class="form-check">
                            <div class="form-check">
                                <label class="form-check-label text-light" for="semRadio1">
                                    <input class="form-check-input form-check-primary" type="radio" name="semestre" id="semRadio1" value="1" <?php echo (old('copia-semestre') == '1') ? 'checked' : '' ?>> 
                                1 </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label text-light" for="semRadio2">
                                    <input class="form-check-input form-check-primary" type="radio" name="semestre" id="semRadio2" value="2" <?php echo (old('copia-semestre') == '2') ? 'checked' : '' ?>> 
                                2 </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary me-2">Criar Cópia</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>