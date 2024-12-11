<div class="modal fade" id="modal-edit-tempoAula" tabindex="-1" role="dialog" aria-labelledby="modal-edit-prof-label" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Editar Horário</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="editarhorario" class="forms-sample" method="post" action='<?php echo base_url('sys/tempoAula/atualizar'); ?>'>
                <div class="modal-body">
                    <?php echo csrf_field() ?>
                    <input type="hidden" id="edit-id" name="id" />
                    <div class="form-group">
                        <label for="exampleInputUsername1">Horário</label>
                        <select class="form-select" name="horario_id" id="edit-horario_id">
                            <?php foreach ($horarios as $h): ?>
                                <option value="<?php echo esc($h['id']) ?>"><?php echo esc($h['nome']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Dia da semana</label>
                        <select class="form-select" name="dia_semana" id="edit-dia_semana">
                            <option value="0">Domingo</option>
                            <option value="1">Segunda-feira</option>
                            <option value="2">Terça-feira</option>
                            <option value="3">Quarta-feira</option>
                            <option value="4">Quinta-feira</option>
                            <option value="5">Sexta-feira</option>
                            <option value="6">Sábado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Hora e Minuto Início</label>
                        <input type="time" class="form-control" name="tempo_inicio" id="edit-tempo_inicio">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Hora e Minuto Fim</label>
                        <input type="time" class="form-control" name="tempo_fim" id="edit-tempo_fim">
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