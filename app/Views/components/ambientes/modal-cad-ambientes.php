<div class="modal fade" id="modal-cad-ambiente" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Cadastrar Ambiente</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form id="cadastrarAmbiente" class="forms-sample" method="post" action='<?php echo base_url('sys/cadastro-ambientes/salvar-ambiente'); ?>'>
                <div class="modal-body">
                    <?php echo csrf_field() ?>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" required
                            id="nome" name="nome" placeholder="Digite o nome do ambiente" 
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