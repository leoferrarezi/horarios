<div class="modal fade" id="modal-edit-curso" tabindex="-1" role="dialog" aria-labelledby="modal-edit-prof-label" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Editar Curso</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form id="editarCurso" class="forms-sample" method="post" action='<?php echo base_url('sys/curso/atualizar'); ?>'>
                <div class="modal-body">
                    <?php echo csrf_field() ?>
                    <input type="hidden" id="edit-id" name="id" />
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nome</label>
                        <input type="text" class="form-control" 
                            id="edit-nome" name="nome" placeholder="Digite o nome do professor">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Matriz</label>
                        <select class="Select2Matriz" id="edit-matriz" style="width:100%" name="matriz_id">
                            <?php foreach($matrizes as $matriz): ?>
                                <option value="<?php echo esc($matriz['id']) ?>"><?php echo esc($matriz['nome']) ?></option>
                            <?php endforeach; ?>
                        </select>
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