<div class="modal fade" id="modal-cad-versoes" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Cadastrar Versão</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form id="cadastrarVersao" class="forms-sample" method="post" action='<?php echo base_url('sys/versao/salvar'); ?>'>
                <div class="modal-body">

                    <?php echo csrf_field() ?>

                    <div class="form-group">

                        <label for="exampleInputUsername1">Nome:</label>
                        <input type="text" class="form-control" 
                            id="nome" name="nome" placeholder="Digite o nome da versão" 
                            value="<?php echo esc(old('nome'))?>">
                    </div>

                    <div class="form-group">
                        <label for="semestres">Semestre:</label>
                        <div class="form-check form-check-primary">
                            <label class="form-check-label" for="semRadio1">
                                <input class="form-check-input" type="radio" name="semestre" id="semRadio1" value="1" checked> 1 
                            </label>                            
                        </div>                        
                        <div class="form-check form-check-primary">
                            <label class="form-check-label" for="semRadio2">
                                <input class="form-check-input" type="radio" name="semestre" id="semRadio2" value="2" <?php echo (old('semestre') == '2') ? 'checked' : '' ?>> 2 
                            </label>                            
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary me-2">Salvar</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>