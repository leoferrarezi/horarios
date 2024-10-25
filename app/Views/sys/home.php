<div class="row"></div>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo $title; ?></h4>
            <p class="card-description">
                <!-- CAIXAS DE ALERTA -->
            <div class="col-md-12 grid-margin stretch-card d-flex justify-content-between">
                <div class="row">
                    <?php
                    $alerts = [
                        ['count' => '3 (três)', 'text' => 'Confirmados', 'desc' => 'Pedidos de Susbstituição de Professor', 'icon' => 'mdi-arrow-top-right', 'color' => 'success'],
                        ['count' => '2 (duas)', 'text' => 'Mensagens de Coordenação', 'desc' => 'Respondidas', 'icon' => 'mdi-arrow-top-right', 'color' => 'success'],
                        ['count' => '12 (doze)', 'text' => 'Disciplinas', 'desc' => 'Sem docentes associados', 'icon' => 'mdi-arrow-bottom-left', 'color' => 'danger'],
                        ['count' => '2 (duas)', 'text' => 'Salas', 'desc' => 'Disponíveis para reserva', 'icon' => 'mdi-arrow-top-right', 'color' => 'success']
                    ];
                    foreach ($alerts as $alert): ?>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h3 class="mb-0"><?php echo $alert['count']; ?></h3>
                                                <p class="text-<?php echo $alert['color']; ?> ms-2 mb-0 font-weight-medium"><?php echo $alert['text']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon icon-box-<?php echo $alert['color']; ?>">
                                                <span class="mdi <?php echo $alert['icon']; ?> icon-item"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal"><?php echo $alert['desc']; ?></h6>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- FIM DAS CAIXAS DE ALERTA -->

            <!-- NOTIFICAÇÕES -->
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">NOTIFICAÇÕES</h4>
                        <?php
                        $notifications = [
                            ['text' => 'Notificação de solicitações da Coordenação.', 'color' => 'primary', 'shadow' => 'blue', 'link' => '#coordination'],
                            ['text' => 'Notificação de confirmação do Coordenador.', 'color' => 'success', 'shadow' => 'green', 'link' => '#confirmation'],
                            ['text' => 'Notificação de confirmação das Pedagogas.', 'color' => 'info', 'shadow' => 'rgb(164 105 191)', 'link' => '#pedagogas'],
                            ['text' => 'Há Conflito de Horários.', 'color' => 'warning', 'shadow' => 'rgb(221 131 29)', 'link' => '#conflict'],
                            ['text' => '12 (doze) Disciplinas sem professor associado.', 'color' => 'danger', 'shadow' => 'rgb(200 30 30)', 'link' => '#disciplines']
                        ];
                        foreach ($notifications as $notification):
                            $words = explode(' ', $notification['text']);
                            $last_word = array_pop($words);
                            $text_without_last_word = implode(' ', $words);
                        ?>
                            <div class="alert alert-fill-<?php echo $notification['color']; ?> mb-3" style="box-shadow: 5px 5px 5px <?php echo $notification['shadow']; ?>;" role="alert">
                                <i class="mdi mdi-alert-circle"></i> <?php echo $text_without_last_word; ?> <a href="<?php echo $notification['link']; ?>" style="color: white;"><?php echo $last_word; ?></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- FIM DAS NOTIFICAÇÕES -->

            <!-- QUADRO DE HORÁRIOS -->
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">QUADRO DE AULAS</h4>
                        <p class="card-description">Aulas agendadas para a data de hoje</p>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <!-- MENU LATERAL DA TABELA - SELEÇÃO DO NÍVEL -->
                                <ul class="nav nav-tabs nav-tabs-vertical" role="tablist">
                                    <?php
                                    $levels = ['Integrado', 'Subsequente', 'Graduação', 'Outros'];
                                    foreach ($levels as $index => $level): ?>
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo $index === 0 ? 'active' : ''; ?>" id="<?php echo strtolower($level); ?>" data-bs-toggle="tab" href="#<?php echo strtolower($level); ?>" role="tab" aria-controls="<?php echo strtolower($level); ?>" aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                                <i class="mdi mdi-school text-<?php echo ['info', 'success', 'warning', 'danger'][$index]; ?> me-2"></i> <?php echo $level; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <!-- MENU SUPERIOR DA TABELA - SELEÇÃO DA TURMA - MÉDIO INTEGRADO -->
                            <div class="col-8 col-sm-8">
                                <div class="tab-content tab-content-vertical">
                                    <?php
                                    $classes = ['MÉDIO - 01', 'MÉDIO - 02', 'MÉDIO - 03', '...'];
                                    foreach ($levels as $index => $level): ?>
                                        <div class="tab-pane fade <?php echo $index === 0 ? 'show active' : ''; ?>" id="<?php echo strtolower($level); ?>" role="tabpanel" aria-labelledby="<?php echo strtolower($level); ?>-tab">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <?php foreach ($classes as $classIndex => $class): ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo $classIndex === 0 ? 'active' : ''; ?>" id="md<?php echo $classIndex + 1; ?>" data-bs-toggle="tab" href="#md<?php echo $classIndex + 1; ?>" role="tab" aria-controls="md<?php echo $classIndex + 1; ?>" aria-selected="<?php echo $classIndex === 0 ? 'true' : 'false'; ?>"><?php echo $class; ?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <div class="tab-content">
                                                <?php foreach ($classes as $classIndex => $class): ?>
                                                    <div class="tab-pane fade <?php echo $classIndex === 0 ? 'show active' : ''; ?>" id="md<?php echo $classIndex + 1; ?>" role="tabpanel" aria-labelledby="md<?php echo $classIndex + 1; ?>-tab">
                                                        <div class="media-body mt-4 mt-sm-0">
                                                            <h4 class="mt-0">ENSINO MÉDIO - TURMA <?php echo $classIndex + 1; ?></h4>
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">EM - Turma <?php echo $classIndex + 1; ?> - Manhã</h4>
                                                                    <div class="row">
                                                                        <div class="table-sorter-wrapper col-lg-12 table-responsive">
                                                                            <table id="sortable-table-1" class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Tempo</th>
                                                                                        <th class="sortStyle">Disciplina<i class="mdi mdi-chevron-down"></i></th>
                                                                                        <th class="sortStyle">Professor<i class="mdi mdi-chevron-down"></i></th>
                                                                                        <th class="sortStyle">Sala<i class="mdi mdi-chevron-down"></i></th>
                                                                                        <th class="sortStyle">Início<i class="mdi mdi-chevron-down"></i></th>
                                                                                        <th class="sortStyle">Fim<i class="mdi mdi-chevron-down"></i></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>1</td>
                                                                                        <td>Matemática</td>
                                                                                        <td>Miguel M.</td>
                                                                                        <td>Sala 06</td>
                                                                                        <td>07:30</td>
                                                                                        <td>08:25</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>2</td>
                                                                                        <td>Biologia</td>
                                                                                        <td>Russimeire</td>
                                                                                        <td>Sala 06</td>
                                                                                        <td>08:25</td>
                                                                                        <td>09:15</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>3</td>
                                                                                        <td>Biologia</td>
                                                                                        <td>Russimeire</td>
                                                                                        <td>Sala 06</td>
                                                                                        <td>09:15</td>
                                                                                        <td>10:00</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>4</td>
                                                                                        <td>Matemática</td>
                                                                                        <td>Miguel M.</td>
                                                                                        <td>Sala 06</td>
                                                                                        <td>10:15</td>
                                                                                        <td>11:00</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>5</td>
                                                                                        <td>Inglês</td>
                                                                                        <td>Doralice</td>
                                                                                        <td>Sala 06</td>
                                                                                        <td>11:00</td>
                                                                                        <td>11:45</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- MENU SUPERIOR DA TABELA - SELEÇÃO DA TURMA - MÉDIO INTEGRADO -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM QUADRO DE HORÁRIOS -->
        </div>
        </p>
    </div>
</div>

<script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../../../assets/js/off-canvas.js"></script>
<script src="../../../assets/js/hoverable-collapse.js"></script>
<script src="../../../assets/js/misc.js"></script>
<script src="../../../assets/js/settings.js"></script>
<script src="../../../assets/js/todolist.js"></script>
<script src="../../../assets/js/tabs.js"></script>