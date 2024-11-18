<div class="modal fade" id="modal-cad-curso" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Cadastrar Curso</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form id="cadastrarCurso" class="forms-sample" method="post" action='<?php echo base_url('sys/curso/salvar'); ?>'>
                <div class="modal-body">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nome</label>
                        <input type="text" class="form-control" 
                            id="nome" name="nome" placeholder="Digite o nome do curso" 
                            value="<?= esc(old('nome'))?>">
                    </div>
                    <div class="form-group">
                        <label for="matriz">Matriz</label>
                        <select class="Select2Matriz" id="Select2Matriz" style="width:100%" name="matriz_id">
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