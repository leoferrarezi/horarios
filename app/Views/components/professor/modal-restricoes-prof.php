<?php
$diasSemana = [0 => 'Domingo', 1 => 'Segunda-feira', 2 => 'Terça-feira', 3 => 'Quarta-feira', 4 => 'Quinta-feira', 5 => 'Sexta-feira', 6 => 'Sábado'];
?>

<form id="cadastroHorarios" class="forms-sample" method="post"
    action='<?php echo base_url('sys/professor/horario/salvarRestricoes'); ?>'>

    <div class="modal fade" id="modal-restricoes-prof" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Restrições de Horário: <span id="professor-nome"></span>
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>



                <div class="modal-body">
                    <?php $first = true; ?>
                    <!-- Navegação das Abas -->
                    <ul class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <?php foreach ($temposAula as $dia => $tempos): ?>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link <?= $first ? 'active' : '' ?>" id="nav-<?= strtolower($dia) ?>-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-<?= strtolower($dia) ?>" role="tab"
                                    aria-controls="nav-<?= strtolower($dia) ?>"
                                    aria-selected="<?= $first ? 'true' : 'false' ?>" href="#">
                                    <?= $dia ?>
                                </a>
                            </li>
                            <?php $first = false; ?>
                        <?php endforeach; ?>
                    </ul>

                    <!-- Conteúdo das Abas -->
                    <div class="tab-content" id="nav-tabContent">
                        <?php $first = true; ?>
                        <?php foreach ($temposAula as $dia => $tempos): ?>
                            <div class="tab-pane fade <?= $first ? 'show active' : '' ?>" id="nav-<?= strtolower($dia) ?>"
                                role="tabpanel" aria-labelledby="nav-<?= strtolower($dia) ?>-tab">
                                <h1 class="text-center">Horários de <?= $dia ?></h1>
                                <div class="responsive-table">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <h2>Manhã</h2>
                                                </th>
                                                <th class="text-center">
                                                    <h2>Tarde</h2>
                                                </th>
                                                <th class="text-center">
                                                    <h2>Noite</h2>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php foreach (['Manhã', 'Tarde', 'Noite'] as $periodo): ?>
                                                    <td style="vertical-align: top; width: 33.33%">
                                                        <?php if (isset($tempos[$periodo]) && !empty($tempos[$periodo])) : ?>
                                                            <table class="table table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">Tempo de aula</th>
                                                                        <th class="text-center">Preferência</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($tempos[$periodo] as $horario): ?>
                                                                        <tr>
                                                                            <td class="text-center">
                                                                                <?= $horario['inicio'] . '-' . $horario['fim'] ?>
                                                                            </td>
                                                                            <td class="d-flex justify-content-center">
                                                                                <input type="radio" class="btn-check"
                                                                                    name="preferencia-<?= strtolower($dia) ?>"
                                                                                    id="preferencia_<?= strtolower($dia) ?>_none"
                                                                                    autocomplete="off" value="0" checked>
                                                                                <label class="btn btn-sm btn-outline-secondary"
                                                                                    for="preferencia_<?= strtolower($dia) ?>_none">
                                                                                    <i class="fa fa-minus"></i>
                                                                                </label>

                                                                                <input type="radio" class="btn-check"
                                                                                    name="preferencia-<?= strtolower($dia) ?>"
                                                                                    id="preferencia_<?= strtolower($dia) ?>_pref"
                                                                                    autocomplete="off" value="1">
                                                                                <label class="btn btn-sm btn-outline-success"
                                                                                    for="preferencia_<?= strtolower($dia) ?>_pref">
                                                                                    <i class="fa fa-check"></i>
                                                                                </label>

                                                                                <input type="radio" class="btn-check"
                                                                                    name="preferencia-<?= strtolower($dia) ?>"
                                                                                    id="preferencia_<?= strtolower($dia) ?>_rest"
                                                                                    autocomplete="off" value="2">
                                                                                <label class="btn btn-sm btn-outline-danger"
                                                                                    for="preferencia_<?= strtolower($dia) ?>_rest">
                                                                                    <i class="fa fa-times"></i>
                                                                                </label>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        <?php else : ?>
                                                            <p class="text-center">Nenhum horário disponível</p>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php $first = false; ?>
                        <?php endforeach; ?>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary me-2">Salvar</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>