<div class="modal fade" id="modal-cad-horario" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Cadastrar Horário Curricular</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form id="cadastrarhorario" class="forms-sample" method="post" action='<?php echo base_url('sys/horario/salvar'); ?>'>
                <div class="modal-body">
                    <?php echo csrf_field() ?>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nome</label>
                        <input type="text" class="form-control" 
                            id="nome" name="nome" placeholder="Digite o nome da horario" 
                            value="<?php echo esc(old('nome'))?>">
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