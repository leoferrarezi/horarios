<div class="modal fade modal-xl" id="modal-edit-turmas" tabindex="-1" role="dialog" aria-labelledby="modal-edit-prof-label" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Editar Turma</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="editarTurma" class="forms-sample" method="post" action='<?php echo base_url('sys/turma/atualizar'); ?>'>
                <div class="modal-body">
                    <?php echo csrf_field() ?>
                    <input type="hidden" id="edit-id" name="id" />
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label for="edit-codigo">Código</label>
                                <input type="text" class="form-control"
                                    id="edit-codigo" name="codigo" placeholder="Digite o codigo da turma"
                                    value="<?php echo esc(old('codigo')) ?>">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label for="edit-sigla">Sigla</label>
                                <input class="form-control" type="text" name="sigla" id="edit-sigla"
                                    value="<?php echo esc(old('codigo')) ?>">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm 12">
                            <div class="form-group">
                                <label for="edit-ano">Ano</label>
                                <input type="number" min="2000" max="2099" class="form-control" id="edit-ano" name="ano"
                                    value="<?php echo esc(old('ano')) ?>">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm 12">
                            <div class="form-group">
                                <label for="edit-ano">Período</label>
                                <input type="number" min="1" max="12" class="form-control" id="edit-periodo" name="periodo"
                                    value="<?php echo esc(old('periodo')) ?>">
                            </div>
                        </div>


                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label for="semestres">Semestre</label>
                                <div id="semestres">
                                    <div class="form-check form-check-inline d-flex m-0">
                                        <div class="form-check form-check-inline me-3">
                                            <input class="form-check-input" type="radio" name="semestre" id="inlineRadio1" value="1" <?php echo (old('semestre') == '1') ? 'checked' : '' ?>>
                                            <label class="form-check-label text-light" for="inlineRadio1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="semestre" id="inlineRadio2" value="2" <?php echo (old('semestre') == '2') ? 'checked' : '' ?>>
                                            <label class="form-check-label text-light" for="inlineRadio2">2</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="edit-curso_id">Curso</label>
                                <select class="form-select" id="edit-curso_id" name="curso_id">
                                    <?php foreach ($cursos as $curso): ?>
                                        <option value="<?php echo esc($curso['id']) ?>"><?php echo esc($curso['nome']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm 12">
                            <div class="form-group">
                                <label for="edit-tempos_diarios">Tempos de aulas díarios</label>
                                <input type="number" min="1" max="99" class="form-control" id="edit-tempos_diarios" name="tempos_diarios"
                                    value="<?php echo esc(old('tempos_diarios')) ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="edit-horario_id">Horário</label>
                                <select class="form-select" id="edit-horario_id" name="horario_id">
                                    <?php foreach ($horarios as $h): ?>
                                        <option value="<?php echo esc($h['id']) ?>"><?php echo esc($h['nome']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="edit-horario_preferencial_id">Horário Preferencial</label>
                                <select class="form-select" id="edit-horario_preferencial_id" name="horario_preferencial_id">
                                    <?php foreach ($horarios as $hp): ?>
                                        <option value="<?php echo esc($hp['id']) ?>"><?php echo esc($hp['nome']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
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