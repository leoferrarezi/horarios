<div class="row">
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">3 (três)</h3>
                            <p class="text-danger ms-2 mb-0 font-weight-medium">
                                Aulas
                            </p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-danger">
                            <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Aulas sem horários</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">4 (quatro)</h3>
                            <p class="text-danger ms-2 mb-0 font-weight-medium">
                                Disciplinas
                            </p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-danger">
                            <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Sem aulas associadas</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">3 (três)</h3>
                            <p class="text-success ms-2 mb-0 font-weight-medium">
                                Confirmados
                            </p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success">
                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Pedidos de substituição de professor</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">1 (um)</h3>
                            <p class="text-danger ms-2 mb-0 font-weight-medium">
                                Mensagens
                            </p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-danger">
                            <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Mensagens não respondidas</h6>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">OCUPAÇÕES DAS SALAS</h4>
                <div class="position-relative">
                    <div class="daoughnutchart-wrapper">
                        <canvas id="disponibilidade-salas" data-disp="3" data-reserv="5" data-indisp="6" class="transaction-chart"></canvas>
                    </div>
                    <div class="custom-value">55 <span>Total</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">DISPONIBILIDADE DE PROFESSORES</h4>
                <div class="position-relative">
                    <div class="daoughnutchart-wrapper">
                        <canvas id="disponibilidade-professores" data-disp="3" data-indisp="6" class="transaction-chart"></canvas>
                    </div>
                    <div class="custom-value">250 <span>Total</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">QUADRO DE AULAS</h4>
 <!--               <p class="card-description">Aulas agendadas para a data de hoje</p> -->
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
                                        <th>Status</th>
                                        <th>Ações</th>
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
                                            <label class="badge badge-success">Em andamento</label>
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