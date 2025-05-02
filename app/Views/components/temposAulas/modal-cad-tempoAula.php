<div class="modal fade" id="modal-cad-tempoAula" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Cadastrar Tempo de Aula</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="cadastrarTempoAula" class="forms-sample" method="post" action='<?php echo base_url('sys/tempoAula/salvar'); ?>'>
                <div class="modal-body">
                    <?php echo csrf_field() ?>

                    <div class="form-group">
                        <label for="horario_id">Horário</label>
                        <select class="form-select" id="horario_id" name="horario_id" required>
                            <?php foreach ($horarios as $h): ?>
                                <option value="<?php echo esc($h['id']) ?>"><?php echo esc($h['nome']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">

                        <label for="dia_semana">Dia da semana</label>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="1" class="form-check-input" value="1" checked> Segunda </label>
                                </div>
                                <div class="form-check form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="4" class="form-check-input" value="4" checked> Quinta </label>
                                </div>
                                <div class="form-check form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="0" class="form-check-input" value="0"> Domingo </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="2" class="form-check-input" value="2" checked> Terça </label>
                                </div>
                                <div class="form-check form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="5" class="form-check-input" value="5" checked> Sexta </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="3" class="form-check-input" value="3" checked> Quarta </label>
                                </div>
                                <div class="form-check form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="6" class="form-check-input" value="6"> Sábado </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="tempo_inicio">Hora e Minuto Início</label>
                                <input type="time" class="form-control" id="tempo_inicio" name="tempo_inicio" required>
                            </div>
                            <div class="col-md-6">
                                <label for="tempo_fim">Hora e Minuto Fim</label>
                                <input type="time" class="form-control" id="tempo_fim" name="tempo_fim" required>
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