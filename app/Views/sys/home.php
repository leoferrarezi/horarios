<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo $title; ?></h4>
                <p class="card-description">
                <div class = "row"> <!-- EDITAR O CONTEÚDO DESSA DIV -->
                    <!-- CAIXAS DE ALERTA -->
                    <div class="col-md-26 grid-margin stretch-card" style="display: flex; justify-content: space-between;">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card" style="box-shadow: 3px 3px 3px gray;">
                            <div class="card">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">3 (três) <s></s></h3>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">Confirmados</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Pedidos de Susbstituição de Professor</h6>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card" style="box-shadow: 3px 3px 3px gray;">
                            <div class="card">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">2 (duas)</h3>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">Mensagens de Coordenação</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Respondidas</h6>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card" style="box-shadow: 3px 3px 3px gray;">
                            <div class="card">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">12 (doze)</h3>
                                    <p class="text-danger ms-2 mb-0 font-weight-medium">Disciplinas</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-danger">
                                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                    </div>
                                </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Sem docentes associados</h6>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card" style="box-shadow: 3px 3px 3px gray;">
                            <div class="card">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">2 (duas)</h3>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">Salas</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Disponíveis para reserva</h6>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- FIM DAS CAIXAS DE ALERTA -->

                    <!-- NOTIFICAÇÕES -->
                    <div class="col-md-26 grid-margin stretch-card">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">NOTIFICAÇÕES</h4>
                                <!-- <p class="card-description"> Add class <code>.alert-fill-*</code> with <code>.alert</code>-->
                                </p>
                                <div class="alert alert-fill-primary" style="box-shadow: 5px 5px 5px blue;"role="alert">
                                    <i class="mdi mdi-alert-circle"></i> Notificação de solicitações da <a href="#" style="color: white; font-weight: bold;" class="solicitacao-link">Coordenação</a>.
                                </div>
                                <div class="alert alert-fill-success" style="box-shadow: 5px 5px 5px green;" role="alert">
                                    <i class="mdi mdi-alert-circle"></i> Notificação de confirmação do <a href="#" style="color: white; font-weight: bold;" class="confirmacao-link">Coordenador</a>.
                                </div>
                                <div class="alert alert-fill-info" style="box-shadow: 5px 5px 5px rgb(164 105 191);"role="alert">
                                    <i class="mdi mdi-alert-circle"></i> Notificação de confirmação das <a href="#" style="color: white; font-weight: bold;" class="confirmacao-link">Pedagogas</a>. <!-- (para a área de trabalho do Coordenador).-->
                                </div>
                                <div class="alert alert-fill-warning" style= "box-shadow: 5px 5px 5px rgb(221 131 29);" role="alert">
                                    <i class="mdi mdi-alert-circle"></i>Há <a href="#" style="color: white; font-weight: bold;" class="tabela-conflito-link">Conflito de Horários</a>.
                                </div>
                                <div class="alert alert-fill-danger" style="box-shadow: 5px 5px 5px rgb(200 30 30);" role="alert">
                                    <i class="mdi mdi-alert-circle"></i>12 (doze) <a href="#" style="color: white; font-weight: bold;" class="tabela-disciplinas-link">Disciplinas sem professor associado</a>. 
                                </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <!-- FIM DAS NOTIFICAÇÕES -->
                    
                    <!-- QUADRO DE HORÁRIOS -->
                    <div class="col-md-26 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">QUADRO DE AULAS</h4>
                            <p class="card-description">Aulas agendadas para a data de hoje</p>
                           <!-- <p class="card-description">Add class <code>.nav-tabs-vertical</code> to <code>.nav</code> and <code>.tab-content-vertical</code> to <code>.tab-content</code>-->
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <!-- MENU LATERAL DA TABELA - SELEÇÃO DO NÍVEL -->
                                    <ul class="nav nav-tabs nav-tabs-vertical" role="tablist">
                                        <li class="nav-item">
                                        <a class="nav-link active" id="integrado" data-bs-toggle="tab" href="#integrado" role="tab" aria-controls="integrado" aria-selected="true"> Integrado <i class="mdi mdi-home-outline text-info ms-2"></i>
                                        </a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" id="subsequente" data-bs-toggle="tab" href="#subsequente" role="tab" aria-controls="subsequente" aria-selected="false"> Subsequente <i class="mdi mdi-account-outline text-danger ms-2"></i>
                                        </a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" id="graduação" data-bs-toggle="tab" href="#graduação" role="tab" aria-controls="graduação" aria-selected="false"> Graduação <i class="mdi mdi-email-outline text-success ms-2"></i>
                                        </a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" id="outros" data-bs-toggle="tab" href="#outros" role="tab" aria-controls="outros" aria-selected="false"> Outros <i class="mdi mdi-email-outline text-success ms-2"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>

                                        <!-- MENU SUPERIOR DA TABELA - SELEÇÃO DA TURMA - MÉDIO INTEGRADO -->
                                        <div class="col-8 col-sm-8">
                                         <div class="tab-content tab-content-vertical">
                                            <div class="tab-pane fade show active" id="integrado" role="tabpanel" aria-labelledby="integrado-tab">
                                              <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="md01" data-bs-toggle="tab" href="#md01" role="tab" aria-controls="md01" aria-selected="true">MÉDIO - 01</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="md02" data-bs-toggle="tab" href="#md02" role="tab" aria-controls="md02" aria-selected="false">MÉDIO - 02</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="md03" data-bs-toggle="tab" href="#md03" role="tab" aria-controls="md03" aria-selected="false">MÉDIO - 03</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="mdothers" data-bs-toggle="tab" href="#mdothers" role="tab" aria-controls="mdothers" aria-selected="false">...</a>
                                                </li>
                                                </ul>
                                            <div class="tab-content">
                                            <div class="tab-pane fade show active" id="md01" role="tabpanel" aria-labelledby="md01-tab">
                                               <!-- <div class="media d-block d-sm-flex">-->
                                                <div class="media-body mt-4 mt-sm-0">
                                                    <h4 class="mt-0">ENSINO MÉDIO - TURMA 01</h4>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">EM - Turma 01 - Manhã</h4>
                                                             <!--  <p class="page-description">Add class <code>.sortable-table</code></p>-->
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
                                                             <!--  Local para a automação da tabela do front com o banco de dados-->
                                                                
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

                                                                    <tbody>
                                                                
                                                                   <!-- SUGESTÃO DE CÓDIGO PARA A AUTOMAÇÃO  
                                                                        <?php if (!empty($nome_da_tabela)): ?> 
                                                                        <?php foreach ($nome_da_tabela as $item_da_tabela): ?>
                                                                            <tr>
                                                                                <td><?php echo $item_da_tabela['atributo_tempo']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_disciplina']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_professor']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_sala']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_inicio']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_fim']; ?></td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <a class="justify-content-center align-items-center d-flex btn btn-inverse-success btn-icon me-1" href="<?php echo base_url('horario/editar/' . $item_da_tabela['id']); ?>">
                                                                                            <i class="fa fa-edit"></i>
                                                                                        </a>
                                                                                        <a class="justify-content-center align-items-center d-flex btn btn-inverse-info btn-icon me-1" href="<?php echo base_url('horario/horarios/' . $item_da_tabela['id']); ?>">
                                                                                            <i class="fa fa-clock-o"></i>
                                                                                        </a>
                                                                                        <a class="justify-content-center align-items-center d-flex btn btn-inverse-danger btn-icon me-1" href="<?php echo base_url('horario/excluir/' . $item_da_tabela['id']); ?>">
                                                                                            <i class="fa fa-trash"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    <?php else: ?>
                                                                        <tr>
                                                                            <td colspan="5">Nenhuma aula prevista para este dia.</td>
                                                                        </tr>
                                                                    <?php endif; ?> 
                                                                </tbody> -->

                                                                <!--  Fim do local para a automação da tabela do front com o banco de dados-->

                                                                </table>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                </div>
                                              <!-- </div>-->
                                            </div>
                                            <div class="tab-pane fade" id="md02" role="tabpanel" aria-labelledby="md02-tab">
                                                <div class="media d-block d-sm-flex">
                                                <div class="media-body mt-4 mt-sm-0">
                                                    <h4 class="mt-0">ENSINO MÉDIO - TURMA 02</h4>
                                                            <!-- <div class="media d-block d-sm-flex">-->
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">EM - Turma 02 - Manhã</h4>
                                                                    <!--  <p class="page-description">Add class <code>.sortable-table</code></p>-->
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
                                                                                                                                   <!--  Local para a automação da tabela do front com o banco de dados-->
                                                                
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

                                                                    <tbody>
                                                                
                                                                   <!-- SUGESTÃO DE CÓDIGO PARA A AUTOMAÇÃO  
                                                                        <?php if (!empty($nome_da_tabela)): ?> 
                                                                        <?php foreach ($nome_da_tabela as $item_da_tabela): ?>
                                                                            <tr>
                                                                                <td><?php echo $item_da_tabela['atributo_tempo']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_disciplina']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_professor']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_sala']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_inicio']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_fim']; ?></td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <a class="justify-content-center align-items-center d-flex btn btn-inverse-success btn-icon me-1" href="<?php echo base_url('horario/editar/' . $item_da_tabela['id']); ?>">
                                                                                            <i class="fa fa-edit"></i>
                                                                                        </a>
                                                                                        <a class="justify-content-center align-items-center d-flex btn btn-inverse-info btn-icon me-1" href="<?php echo base_url('horario/horarios/' . $item_da_tabela['id']); ?>">
                                                                                            <i class="fa fa-clock-o"></i>
                                                                                        </a>
                                                                                        <a class="justify-content-center align-items-center d-flex btn btn-inverse-danger btn-icon me-1" href="<?php echo base_url('horario/excluir/' . $item_da_tabela['id']); ?>">
                                                                                            <i class="fa fa-trash"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    <?php else: ?>
                                                                        <tr>
                                                                            <td colspan="5">Nenhuma aula prevista para este dia.</td>
                                                                        </tr>
                                                                    <?php endif; ?> 
                                                                </tbody> -->

                                                                <!--  Fim do local para a automação da tabela do front com o banco de dados-->
                                                                        </table>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                        </div>
                                                    <!-- </div>-->
                                                </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="md03" role="tabpanel" aria-labelledby="md03-tab">
                                                <div class="media d-block d-sm-flex">
                                                <div class="media-body mt-4 mt-sm-0">
                                                    <h4 class="mt-0">ENSINO MÉDIO - TURMA 03</h4>
                                                     <!--  <p class="page-description">Add class <code>.sortable-table</code></p>-->
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
                                              <!-- </div>-->
                                                </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="mothers" role="tabpanel" aria-labelledby="mothers-tab">
                                                <h4>Outros Cursos: </h4>
                                                 <!--  <p class="page-description">Add class <code>.sortable-table</code></p>-->
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
                                                         <!--  Local para a automação da tabela do front com o banco de dados-->
                                                                
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

                                                                    <tbody>
                                                                
                                                                   <!-- SUGESTÃO DE CÓDIGO PARA A AUTOMAÇÃO  
                                                                        <?php if (!empty($nome_da_tabela)): ?> 
                                                                        <?php foreach ($nome_da_tabela as $item_da_tabela): ?>
                                                                            <tr>
                                                                                <td><?php echo $item_da_tabela['atributo_tempo']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_disciplina']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_professor']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_sala']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_inicio']; ?></td>
                                                                                <td><?php echo $item_da_tabela['atributo_fim']; ?></td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <a class="justify-content-center align-items-center d-flex btn btn-inverse-success btn-icon me-1" href="<?php echo base_url('horario/editar/' . $item_da_tabela['id']); ?>">
                                                                                            <i class="fa fa-edit"></i>
                                                                                        </a>
                                                                                        <a class="justify-content-center align-items-center d-flex btn btn-inverse-info btn-icon me-1" href="<?php echo base_url('horario/horarios/' . $item_da_tabela['id']); ?>">
                                                                                            <i class="fa fa-clock-o"></i>
                                                                                        </a>
                                                                                        <a class="justify-content-center align-items-center d-flex btn btn-inverse-danger btn-icon me-1" href="<?php echo base_url('horario/excluir/' . $item_da_tabela['id']); ?>">
                                                                                            <i class="fa fa-trash"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    <?php else: ?>
                                                                        <tr>
                                                                            <td colspan="5">Nenhuma aula prevista para este dia.</td>
                                                                        </tr>
                                                                    <?php endif; ?> 
                                                                </tbody> -->

                                                                <!--  Fim do local para a automação da tabela do front com o banco de dados-->
                                                                </table>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                </div>
                                              <!-- </div>-->
                                            </div>
                                            </div>
                                        </div>
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
    </div>
</div>


<script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../../assets/js/off-canvas.js"></script>
    <script src="../../../assets/js/hoverable-collapse.js"></script>
    <script src="../../../assets/js/misc.js"></script>
    <script src="../../../assets/js/settings.js"></script>
    <script src="../../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../../assets/js/tabs.js"></script>
    <!-- End custom js for this page -->