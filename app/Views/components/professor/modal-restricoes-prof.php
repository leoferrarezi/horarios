<?php
  // Array de mapeamento dos dias da semana
  $diasSemana = [
    0 => 'Domingo',
    1 => 'Segunda-feira',
    2 => 'Terça-feira',
    3 => 'Quarta-feira',
    4 => 'Quinta-feira',
    5 => 'Sexta-feira',
    6 => 'Sábado'
  ];
?>

<div class="modal fade" id="modal-restricoes-prof" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Restrições de Horário: <span id="professor-nome"></span></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="cadastroHorarios" class="forms-sample" method="post"
                action='<?php echo base_url('sys/professor/horario/salvarRestricoes'); ?>'>
                <div class="modal-body">
                    <div class="accordion accordion-solid-header" id="accordion-4" role="tablist">
                        <div class="row">
                          <?php foreach($horarios as $index => $horario):?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header" role="tab" id="<?php echo "heading-" . $index ?>">
                                        <h6 class="mb-0">
                                            <a data-bs-toggle="collapse" href="<?php echo "#collapse-" . $index ?>" aria-expanded="false"
                                                aria-controls="<?php echo "collapse-" . $index ?>" class="collapsed"> <?php echo $horario['nome']; ?> </a>
                                        </h6>
                                    </div>
                                    <div id="<?php echo "collapse-" . $index ?>" class="collapse" role="tabpanel" aria-labelledby="<?php echo "heading-" . $index ?>"
                                        data-bs-parent="#accordion-4">
                                        <div class="card-body">
                                            <div class="responsive-table">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Dia da Semana</th>
                                                            <th class="text-center">Tempo de aula</th>
                                                            <th class="text-center">Preferência</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php foreach($horario['tempos_de_aula'] as $ta): ?>
                                                        <tr>
                                                            <td><?php echo $diasSemana[$ta['dia_semana']] ?></td>
                                                            <td class="text-center">
                                                              <?php echo // Formata hora e minuto de início para HH:mm
                                                                    sprintf('%02d:%02d - %02d:%02d', esc($ta['hora_inicio']), esc($ta['minuto_inicio']), esc($ta['hora_fim']), esc($ta['minuto_fim'])); 
                                                              ?>
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                                    id="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary"
                                                                    for="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                                    id="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success"
                                                                    for="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                                    id="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger"
                                                                    for="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                      <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php endforeach; ?>

                        </div>
                    </div>

                    <p class="card-description text-end">
                        <i class="fa fa-minus text-secondary" style="margin-right: 5px; margin-left: 25px"></i>Sem
                        Informação
                        <i class="fa fa-check text-success" style="margin-right: 5px; margin-left: 25px"></i>Preferência
                        <i class="fa fa-times text-danger" style="margin-right: 5px; margin-left: 25px"></i>Restrição
                        Justificada
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary me-2">Salvar</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>