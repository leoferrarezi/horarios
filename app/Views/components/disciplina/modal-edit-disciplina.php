<div class="modal fade" id="modal-edit-disciplina" tabindex="-1" role="dialog" aria-labelledby="modal-edit-prof-label" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Editar Disciplina</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form id="editarDisciplina" class="forms-sample" method="post" action='<?php echo base_url('sys/disciplina/atualizar'); ?>'>
                <div class="modal-body">
                    <?php echo csrf_field() ?>
                    <input type="hidden" id="edit-id" name="id" />
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control"
                            id="edit-nome" name="nome" placeholder="Digite o nome da Disciplina"
                            value="<?php echo esc(old('nome')) ?>">
                    </div>
                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input type="text" class="form-control"
                            id="edit-codigo" name="codigo" placeholder="Digite o codigo da Disciplina"
                            value="<?php echo esc(old('codigo')) ?>">
                    </div>
                    <div class="form-group">
                        <label for="matriz">Matriz</label>
                        <select class="form-select" id="edit-matriz" name="matriz_id">
                            <?php foreach ($matrizes as $matriz): ?>
                                <option value="<?php echo esc($matriz['id']) ?>"><?php echo esc($matriz['nome']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cargaHoraria">Carga Hóraria</label>
                        <input type="number" class="form-control"
                            id="edit-cargaHoraria" name="ch" placeholder="Digite a Carga Hóraria da Disciplina"
                            value="<?php echo esc(old('ch')) ?>">
                    </div>
                    <div class="form-group">
                        <label for="max_tempos_diarios">Tempo Máximo Diário</label>
                        <input type="number" class="form-control"
                            id="edit-max_tempos_diarios" name="max_tempos_diarios" placeholder="Digite o Tempo Máximo Diário da Disciplina"
                            value="<?php echo esc(old('ch')) ?>">
                    </div>
                    <div class="form-group">
                        <label for="periodo">Período</label>
                        <input type="number" class="form-control"
                            id="edit-periodo" name="periodo" placeholder="Digite o periodo da Disciplina"
                            value="<?php echo esc(old('periodo')) ?>">
                    </div>
                    <div class="form-group">
                        <label for="abreviatura">Abreviatura</label>
                        <input type="text" class="form-control"
                            id="edit-abreviatura" name="abreviatura" placeholder="Digite o abreviatura da Disciplina"
                            value="<?php echo esc(old('abreviatura')) ?>">
                    </div>
                    <div class="form-group">
                        <label for="grupo_ambiente">Grupo de Ambiente</label>
                        <select class="form-select" id="edit-grupo_ambiente" name="grupo_de_ambientes_id">
                            <?php foreach ($gruposAmbientes as $ga): ?>
                                <option value="<?php echo esc($ga['id']) ?>"><?php echo esc($ga['nome']) ?></option>
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