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
                                                <p class="text-<?php echo $alert['color']; ?> ms-2 mb-0 font-weight-medium">
                                                    <?php echo $alert['text']; ?>
                                                </p>
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
                            <div class="alert alert-fill-<?php echo $notification['color']; ?> mb-3"
                                style="box-shadow: 5px 5px 5px <?php echo $notification['shadow']; ?>;" role="alert">
                                <i class="mdi mdi-alert-circle"></i> <?php echo $text_without_last_word; ?> <a
                                    href="<?php echo $notification['link']; ?>"
                                    style="color: white;"><?php echo $last_word; ?></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- FIM DAS NOTIFICAÇÕES -->

            <!-- QUADRO DE HORÁRIOS -->
            <div class="card-body">
                <h4 class="card-title">Quadro de Aulas</h4>
                <p class="card-description">Aulas agendadas para a data de hoje</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Ordem #</th>
                                        <th>Nível</th>
                                        <th>Turno</th>
                                        <th>Turma</th>
                                        <th>Disciplina</th>
                                        <th>Professor</th>
                                        <th>Sala</th>
                                        <th>Início</th>
                                        <th>Fim</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Médio</td>
                                        <td>Manhã</td>
                                        <td>Terceiro - 01</td>
                                        <td>Matemática</td>
                                        <td>Miguel</td>
                                        <td>Sala 05</td>
                                        <td>07:30</td>
                                        <td>08:25</td>
                                        <td>
                                            <label class="badge badge-success">Em progresso.</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">Visualizar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Médio</td>
                                        <td>Manhã</td>
                                        <td>Terceiro - 02</td>
                                        <td>Biologia</td>
                                        <td>Russimeire</td>
                                        <td>Sala 06</td>
                                        <td>08:25</td>
                                        <td>09:15</td>
                                        <td>
                                            <label class="badge badge-danger">Pendente</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">Visualizar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Integrado</td>
                                        <td>Manhã</td>
                                        <td>Segundo - 01</td>
                                        <td>Biologia</td>
                                        <td>Russimeire</td>
                                        <td>Sala 07</td>
                                        <td>09:15</td>
                                        <td>10:00</td>
                                        <td>
                                            <label class="badge badge-info">Prevista</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">Visualizar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Integrado</td>
                                        <td>Manhã</td>
                                        <td>Segundo - 02</td>
                                        <td>Química</td>
                                        <td>Mônica</td>
                                        <td>Sala 06</td>
                                        <td>10:15</td>
                                        <td>11:00</td>
                                        <td>
                                            <label class="badge badge-info">Prevista</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">Visualizar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Graduação</td>
                                        <td>Noite</td>
                                        <td>ADS - 01</td>
                                        <td>Inglês</td>
                                        <td>Doralice</td>
                                        <td>Sala 03</td>
                                        <td>19:00</td>
                                        <td>19:45</td>
                                        <td>
                                            <label class="badge badge-info">Prevista</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">Visualizar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <label class="badge badge-info">Prevista</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">Visualizar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <label class="badge badge-info">Prevista</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">Visualizar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <label class="badge badge-info">Prevista</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">Visualizar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <label class="badge badge-info">Prevista</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">Visualizar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <label class="badge badge-danger">Pending</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">Visualizar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM QUADRO DE HORÁRIOS -->
        </div>
    </div>
</div>