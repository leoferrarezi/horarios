<div class="modal fade" id="modal-edit-versoes" tabindex="-1" role="dialog" aria-labelledby="modal-edit-prof-label" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Editar Versão</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form id="editarVersao" class="forms-sample" method="post" action='<?php echo base_url('sys/versao/atualizar'); ?>'>
                <div class="modal-body">
                    <?php echo csrf_field() ?>
                    <input type="hidden" id="edit-id" name="id" />
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nome</label>
                        <input type="text" class="form-control" 
                            id="edit-nome" name="nome" placeholder="Digite o nome da versão">
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