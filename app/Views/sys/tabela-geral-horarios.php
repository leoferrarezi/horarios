<style>
    #cards-container::-webkit-scrollbar {
        width: 5px;
        background-color: #000;
    }

    #cards-container::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px rgba(6, 6, 6, 0.3);
    }

    #cards-container::-webkit-scrollbar-thumb {
        background-color: #333;
        outline: 1px solid slategrey;
    }
</style>


<!-- Modal -->
<div class="modal fade" id="modalAtribuirDisciplina" tabindex="-1" aria-labelledby="modalAtribuirDisciplinaLabel" aria-hidden="true" style="z-index: 10000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAtribuirDisciplinaLabel">Atribuir Disciplina</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tabelaDisciplinasModal" class="table">
                    <thead>
                        <tr>
                            <th>Disciplina</th>
                            <th>Professor</th>
                            <th>Quantidade</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Disciplinas pendentes serão carregadas aqui -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para seleção de ambiente -->
<div class="modal fade" id="modalSelecionarAmbiente" tabindex="-1" aria-labelledby="modalSelecionarAmbienteLabel" aria-hidden="true" style="z-index: 10000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSelecionarAmbienteLabel">Selecionar Ambiente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="selectAmbiente">Selecione o ambiente:</label>
                    <select class="form-control" id="selectAmbiente">
                        <option value="Sala 101">Sala 101</option>
                        <option value="Sala 102">Sala 102</option>
                        <option value="Sala 103">Sala 103</option>
                        <option value="Sala 104">Sala 104</option>
                        <option value="Laboratório 1">Laboratório 1</option>
                        <option value="Quadra A">Quadra A</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirmarAmbiente">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!-- Filtro -->
<div class="row">
    <div class="col-md-3">
        <div class="card position-fixed" id="cards-container" style="max-width: 20%; max-height: 80%; overflow-y: auto; overflow-x: hidden;">
            <div class="card-body overflow">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="curso">Curso:</label>
                            <select class="js-example-basic-single" style="width:100%" id="curso">
                                <option value="ADS">Análise e Desenvolvimento de Sistemas</option>
                                <option value="ECA">Engenharia de Controle e Automação</option>
                                <option value="FIS">Licenciatura em Física</option>
                                <option value="INFO">Técnico em Informática</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="turma">Turma:</label>
                            <select class="js-example-basic-single" style="width:100%" id="turma">
                                <option value="1">1º período </option>
                                <option value="2">2º período </option>
                                <option value="3">3º período </option>
                                <option value="4">4º período </option>
                                <option value="5">1º A </option>
                            </select>
                        </div>
                    </div>
                </div>

                <h6 class="card-title text-center"> Aulas Pendentes (80)</h6>
                <div class="row">
                    <div class="col-12">

                        <div draggable="true" data-disciplina="Matemática" data-professor="Jackson" data-aulas="4 aulas" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
                            <div class="card-body p-0 d-flex flex-column justify-content-center align-items-center text-center">
                                <h6 class="text-primary">
                                    <i class="mdi mdi-book-outline me-1"></i> Matemática
                                </h6>
                                <div class="d-flex align-items-center mb-0 py-0">
                                    <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">Jackson</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">4 aulas</small>
                                </div>
                            </div>
                        </div>

                        <div draggable="true" data-disciplina="Organização de Computadores" data-professor="Brenda" data-aulas="2 aulas" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
                            <div class="card-body p-0 d-flex flex-column justify-content-center align-items-center text-center">
                                <h6 class="text-primary">
                                    <i class="mdi mdi-book-outline me-1"></i> Algoritimos e Linguagens de Programação
                                </h6>
                                <div class="d-flex align-items-center mb-0 py-0">
                                    <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">Leandro</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">4 aulas</small>
                                </div>
                            </div>
                        </div>

                        <div draggable="true" data-disciplina="Organização de Computadores" data-professor="Brenda" data-aulas="2 aulas" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
                            <div class="card-body p-0 d-flex flex-column justify-content-center align-items-center text-center">
                                <h6 class="text-primary">
                                    <i class="mdi mdi-book-outline me-1"></i> Análise e Projetos de Sistemas
                                </h6>
                                <div class="d-flex align-items-center mb-0 py-0">
                                    <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">Elisângela</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">4 aulas</small>
                                </div>
                            </div>
                        </div>

                        <div draggable="true" data-disciplina="Organização de Computadores" data-professor="Brenda" data-aulas="2 aulas" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
                            <div class="card-body p-0 d-flex flex-column justify-content-center align-items-center text-center">
                                <h6 class="text-primary">
                                    <i class="mdi mdi-book-outline me-1"></i> Comunicação e Expressão
                                </h6>
                                <div class="d-flex align-items-center mb-0 py-0">
                                    <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">Iza</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">2 aulas</small>
                                </div>
                            </div>
                        </div>

                        <div draggable="true" data-disciplina="Organização de Computadores" data-professor="Brenda" data-aulas="2 aulas" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
                            <div class="card-body p-0 d-flex flex-column justify-content-center align-items-center text-center">
                                <h6 class="text-primary">
                                    <i class="mdi mdi-book-outline me-1"></i> Organização de Computadores
                                </h6>
                                <div class="d-flex align-items-center mb-0 py-0">
                                    <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">Brenda</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">2 aulas</small>
                                </div>
                            </div>
                        </div>

                        <div draggable="true" data-disciplina="Algoritmos Avançados" data-professor="Leandro" data-aulas="2 aulas" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
                            <div class="card-body p-0 d-flex flex-column justify-content-center align-items-center text-center">
                                <h6 class="text-primary">
                                    <i class="mdi mdi-book-outline me-1"></i> Algoritmos Avançados
                                </h6>
                                <div class="d-flex align-items-center mb-0 py-0">
                                    <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">Leandro</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">2 aulas</small>
                                </div>
                            </div>
                        </div>

                        <div draggable="true" data-disciplina="Análise Orientada a Objetos" data-professor="Elisangela" data-aulas="4 aulas" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
                            <div class="card-body p-0 d-flex flex-column justify-content-center align-items-center text-center">
                                <h6 class="text-primary">
                                    <i class="mdi mdi-book-outline me-1"></i> Análise Orientada a Objetos
                                </h6>
                                <div class="d-flex align-items-center mb-0 py-0">
                                    <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">Elisangela</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">4 aulas</small>
                                </div>
                            </div>
                        </div>

                        <div draggable="true" data-disciplina="Banco de Dados: Modelagem e Projetos" data-professor="Fernando" data-aulas="4 aulas" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
                            <div class="card-body p-0 d-flex flex-column justify-content-center align-items-center text-center">
                                <h6 class="text-primary">
                                    <i class="mdi mdi-book-outline me-1"></i> Banco de Dados: Modelagem e Projetos
                                </h6>
                                <div class="d-flex align-items-center mb-0 py-0">
                                    <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">Fernando</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                                    <small class="text-secondary">4 aulas</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Tabela de Horários (Manhã, Tarde, Noite) - Lado direito (9 colunas) -->
    <div class="col-lg-9">
        <div class="card position-fixed" id="cards-container" style="max-width: 60%; max-height: 80%; overflow-y: auto; overflow-x: hidden;">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <!--<div id="alert-horarios-vazios" class="alert alert-fill-warning" style="display: none;">
                            <i class="mdi mdi-alert-circle"></i>
                            Há <span id="contador-horarios-vazios">0</span> aulas sem horário atribuído.
                        </div>-->
                        <div class="table-responsive">
                            <table id="tabela-horarios-manha" class="table table-bordered text-center mb-4">
                                <!-- MANHÃ -->
                                <thead>
                                    <tr>
                                        <th colspan="7" class="text-center bg-primary text-white">MANHÃ</th>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <th class="col-1">Horário</th>
                                        <th class="col-1">Segunda-Feira</th>
                                        <th class="col-1">Terça-Feira</th>
                                        <th class="col-1">Quarta-Feira</th>
                                        <th class="col-1">Quinta-Feira</th>
                                        <th class="col-1">Sexta-Feira</th>
                                        <th class="col-1">Sábado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">07:30 - 08:20</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="07:30 - 08:20"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="07:30 - 08:20"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="07:30 - 08:20"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="07:30 - 08:20"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="07:30 - 08:20"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">08:20 - 09:10</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="08:20 - 09:10"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="08:20 - 09:10"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="08:20 - 09:10"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="08:20 - 09:10"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="08:20 - 09:10"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">09:10 - 10:00</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="09:10 - 10:00"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="09:10 - 10:00"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="09:10 - 10:00"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="09:10 - 10:00"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="09:10 - 10:00"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">10:15 - 11:05</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="10:15 - 11:05"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="10:15 - 11:05"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="10:15 - 11:05"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="10:15 - 11:05"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="10:15 - 11:05"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">11:05 - 11:55</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="11:05 - 11:55"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="11:05 - 11:55"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="11:05 - 11:55"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="11:05 - 11:55"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="11:05 - 11:55"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">11:55 - 12:45</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="11:55 - 12:45"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="11:55 - 12:45"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="11:55 - 12:45"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="11:55 - 12:45"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="11:55 - 12:45"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                </tbody>

                                <!-- TARDE -->
                                <thead>
                                    <tr>
                                        <th colspan="7" class="text-center bg-primary text-white">TARDE</th>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <th class="col-1">Horário</th>
                                        <th class="col-1">Segunda-Feira</th>
                                        <th class="col-1">Terça-Feira</th>
                                        <th class="col-1">Quarta-Feira</th>
                                        <th class="col-1">Quinta-Feira</th>
                                        <th class="col-1">Sexta-Feira</th>
                                        <th class="col-1">Sábado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">13:30 - 14:20</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="13:30 - 14:20"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="13:30 - 14:20"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="13:30 - 14:20"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="13:30 - 14:20"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="13:30 - 14:20"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">14:20 - 15:10</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="14:20 - 15:10"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="14:20 - 15:10"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="14:20 - 15:10"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="14:20 - 15:10"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="14:20 - 15:10"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">15:10 - 16:00</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="15:10 - 16:00"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="15:10 - 16:00"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="15:10 - 16:00"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="15:10 - 16:00"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="15:10 - 16:00"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">16:15 - 17:05</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="16:15 - 17:05"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="16:15 - 17:05"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="16:15 - 17:05"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="16:15 - 17:05"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="16:15 - 17:05"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">17:05 - 17:55</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="17:05 - 17:55"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="17:05 - 17:55"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="17:05 - 17:55"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="17:05 - 17:55"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="17:05 - 17:55"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">17:55 - 18:45</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="17:55 - 18:45"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="17:55 - 18:45"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="17:55 - 18:45"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="17:55 - 18:45"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="17:55 - 18:45"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                </tbody>

                                <!-- NOITE -->
                                <thead>
                                    <tr>
                                        <th colspan="7" class="text-center bg-primary text-white">NOITE</th>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <th class="col-1">Horário</th>
                                        <th class="col-1">Segunda-Feira</th>
                                        <th class="col-1">Terça-Feira</th>
                                        <th class="col-1">Quarta-Feira</th>
                                        <th class="col-1">Quinta-Feira</th>
                                        <th class="col-1">Sexta-Feira</th>
                                        <th class="col-1">Sábado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">19:00 - 19:50</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="19:00 - 19:50"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="19:00 - 19:50"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="19:00 - 19:50"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="19:00 - 19:50"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="19:00 - 19:50"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">19:50 - 20:40</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="19:50 - 20:40"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="19:50 - 20:40"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="19:50 - 20:40"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="19:50 - 20:40"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="19:50 - 20:40"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">20:50 - 21:40</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="20:50 - 21:40"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="20:50 - 21:40"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="20:50 - 21:40"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="20:50 - 21:40"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="20:50 - 21:40"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                    <tr style="height: 60px;">
                                        <td class="coluna-fixa">21:40 - 22:30</td>
                                        <td class="horario-vazio" data-dia="Segunda" data-horario="21:40 - 22:30"></td>
                                        <td class="horario-vazio" data-dia="Terça" data-horario="21:40 - 22:30"></td>
                                        <td class="horario-vazio" data-dia="Quarta" data-horario="21:40 - 22:30"></td>
                                        <td class="horario-vazio" data-dia="Quinta" data-horario="21:40 - 22:30"></td>
                                        <td class="horario-vazio" data-dia="Sexta" data-horario="21:40 - 22:30"></td>
                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Referente select2 do filtro -->
<script>
    (function($) {
        'use strict';
        if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
        }
        if ($(".js-example-basic-multiple").length) {
            $(".js-example-basic-multiple").select2();
        }
    })(jQuery);

    document.addEventListener('DOMContentLoaded', function() {
        const alertHorariosVazios = document.getElementById('alert-horarios-vazios');
        const contadorHorariosVazios = document.getElementById('contador-horarios-vazios');
        const modalAtribuirDisciplina = new bootstrap.Modal(document.getElementById('modalAtribuirDisciplina'));
        const modalSelecionarAmbiente = new bootstrap.Modal(document.getElementById('modalSelecionarAmbiente'));
        const tabelaDisciplinasModal = document.getElementById('tabelaDisciplinasModal').querySelector('tbody');
        const selectAmbiente = document.getElementById('selectAmbiente');
        const confirmarAmbiente = document.getElementById('confirmarAmbiente');

        let horarioSelecionado = null;
        let disciplinaSelecionada = null;
        let professorSelecionado = null;

        // Atualiza o contador de horários vazios para todas as tabelas
        function atualizarContadorHorariosVazios() {
            const todasCelulas = document.querySelectorAll(`
                #tabela-horarios-manha td.horario-vazio:not(.coluna-fixa):not(.sabado-fixo),
                #tabela-horarios-tarde td.horario-vazio:not(.coluna-fixa):not(.sabado-fixo),
                #tabela-horarios-noite td.horario-vazio:not(.coluna-fixa):not(.sabado-fixo)
            `);
            const totalHorariosVazios = Array.from(todasCelulas).filter(celula => celula.innerHTML.trim() === "").length;
            contadorHorariosVazios.textContent = totalHorariosVazios;
            alertHorariosVazios.style.display = totalHorariosVazios > 0 ? 'block' : 'none';
        }

        // Configura o evento dragstart para as disciplinas pendentes
        function configurarDragStart(disciplina) {
            disciplina.addEventListener('dragstart', function(e) {
                // Cria um elemento fantasma com classes do Bootstrap
                const ghost = document.createElement('div');
                ghost.className = 'card shadow-sm border-primary';
                ghost.style.width = '180px';
                ghost.style.pointerEvents = 'none';
                ghost.style.position = 'absolute';
                ghost.style.left = '-9999px';

                // Obtém os dados da disciplina
                const disciplinaNome = disciplina.dataset.disciplina;
                const professorNome = disciplina.dataset.professor;
                const quantidade = disciplina.querySelector('td:nth-child(4)').textContent;

                ghost.innerHTML = `
                    <div class="card-body p-2">
                        <h6 class="card-title text-primary mb-1">${disciplinaNome}</h6>
                        <p class="card-text text-muted mb-1 small">
                            <i class="mdi mdi-account me-1"></i>
                            <small class="text-secondary text-truncate">${professorNome}</small>
                        </p>
                        <!--<p class="card-text text-muted small mb-0">
                            <i class="mdi mdi-clock-outline me-1"></i> 1 aula
                        </p>-->
                    </div>
                `;

                document.body.appendChild(ghost);
                e.dataTransfer.setDragImage(ghost, 90, 20);
                e.dataTransfer.setData('text/plain', JSON.stringify({
                    disciplina: disciplinaNome,
                    professor: professorNome
                }));

                setTimeout(() => document.body.removeChild(ghost), 0);
            });
        }

        // Função para abrir o modal de seleção de ambiente
        function abrirModalAmbiente(disciplina, professor) {
            disciplinaSelecionada = disciplina;
            professorSelecionado = professor;
            modalSelecionarAmbiente.show();
        }

        // Configura o evento de confirmação do ambiente
        confirmarAmbiente.addEventListener('click', function() {
            const ambienteSelecionado = selectAmbiente.value;

            if (horarioSelecionado) {
                // Se o horário já contém uma disciplina, move-a de volta para a tabela de pendentes
                if (horarioSelecionado.innerHTML.trim() !== "") {
                    moverDisciplinaParaPendentes(horarioSelecionado);
                }

                // Atribui a nova disciplina ao horário
                horarioSelecionado.innerHTML = `
                    <div class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
                        <div class="card-body p-0 d-flex flex-column justify-content-center align-items-center text-center">
                            <h6 class="card-title mb-0 fs-6 text-primary text-truncate">
                                <i class="mdi mdi-book-outline me-1"></i>
                                ${disciplinaSelecionada}
                            </h6>

                            <div class="d-flex align-items-center mb-0 py-0">
                                <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                                <small class="text-secondary text-truncate">${professorSelecionado}</small>
                            </div>

                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                                <small class="text-secondary">${ambienteSelecionado}</small>
                            </div>
                        </div>
                    </div>
                `;

                horarioSelecionado.dataset.disciplina = disciplinaSelecionada;
                horarioSelecionado.dataset.professor = professorSelecionado;
                //horarioSelecionado.dataset.ambiente = ambienteSelecionado;
                horarioSelecionado.classList.add('horario-preenchido', 'p-0');

                // Adiciona a classe para identificar que o horário está preenchido
                horarioSelecionado.classList.add('horario-preenchido');

                // Atualiza a quantidade de disciplinas pendentes
                const disciplinaArrastada = Array.from(document.querySelectorAll('#disciplinas-pendentes tbody tr')).find(tr =>
                    tr.dataset.disciplina === disciplinaSelecionada &&
                    tr.dataset.professor === professorSelecionado
                );

                if (disciplinaArrastada) {
                    const quantidade = parseInt(disciplinaArrastada.querySelector('td:nth-child(4)').textContent);
                    if (quantidade > 1) {
                        disciplinaArrastada.querySelector('td:nth-child(4)').textContent = quantidade - 1;
                    } else {
                        disciplinaArrastada.remove();
                    }
                }

                atualizarContadorHorariosVazios();
                modalSelecionarAmbiente.hide();
            }
        });

        // Carrega as disciplinas pendentes no modal
        function carregarDisciplinasPendentes() {
            tabelaDisciplinasModal.innerHTML = '';

            // Verifica se há uma disciplina atribuída no horário selecionado
            if (horarioSelecionado && horarioSelecionado.dataset.disciplina) {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${horarioSelecionado.dataset.disciplina}</td>
                    <td>${horarioSelecionado.dataset.professor}</td>
                    <td>1</td>
                    <td><button class="btn btn-danger btn-sm" onclick="removerDisciplina()">Remover</button></td>
                `;
                tabelaDisciplinasModal.appendChild(row);
            }

            // Adiciona uma mensagem de substituição
            const mensagemRow = document.createElement('tr');
            mensagemRow.innerHTML = `
                <td colspan="4" class="text-center text-warning">Atenção: Ao atribuir uma nova disciplina, a atual será substituída.</td>
            `;
            tabelaDisciplinasModal.appendChild(mensagemRow);

            // Carrega as disciplinas pendentes
            const disciplinasPendentes = document.querySelectorAll('#disciplinas-pendentes tbody tr');
            disciplinasPendentes.forEach(disciplina => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${disciplina.dataset.disciplina}</td>
                    <td>${disciplina.dataset.professor}</td>
                    <td>${disciplina.querySelector('td:nth-child(4)').textContent}</td>
                    <td><button class="btn btn-primary btn-sm" onclick="atribuirDisciplina('${disciplina.dataset.disciplina}', '${disciplina.dataset.professor}')">Atribuir</button></td>
                `;
                tabelaDisciplinasModal.appendChild(row);
            });
        }

        // Função global para atribuir disciplina ao horário selecionado
        window.atribuirDisciplina = function(disciplina, professor) {
            if (horarioSelecionado) {
                abrirModalAmbiente(disciplina, professor);
                modalAtribuirDisciplina.hide();
            }
        };

        // Função global para remover a disciplina do horário selecionado
        window.removerDisciplina = function() {
            if (horarioSelecionado) {
                // Move a disciplina de volta para a tabela de pendentes
                moverDisciplinaParaPendentes(horarioSelecionado);

                // Limpa o horário
                horarioSelecionado.innerHTML = '';
                delete horarioSelecionado.dataset.disciplina;
                delete horarioSelecionado.dataset.professor;
                //delete horarioSelecionado.dataset.ambiente;

                // Remove a classe de horário preenchido
                horarioSelecionado.classList.remove('horario-preenchido');

                // Atualiza o contador de horários vazios
                atualizarContadorHorariosVazios();

                // Fecha o modal
                modalAtribuirDisciplina.hide();
            }
        };

        // Move uma disciplina de volta para a tabela de pendentes
        function moverDisciplinaParaPendentes(horario) {
            const disciplinaExistente = {
                disciplina: horario.dataset.disciplina,
                professor: horario.dataset.professor
                //ambiente: horario.dataset.ambiente
            };

            // Verifica se a disciplina já existe na tabela de pendentes
            const disciplinaPendente = Array.from(document.querySelectorAll('#disciplinas-pendentes tbody tr')).find(tr =>
                tr.dataset.disciplina === disciplinaExistente.disciplina &&
                tr.dataset.professor === disciplinaExistente.professor
            );

            if (disciplinaPendente) {
                // Se a disciplina já existe, incrementa o quantitativo
                const quantidade = parseInt(disciplinaPendente.querySelector('td:nth-child(4)').textContent);
                disciplinaPendente.querySelector('td:nth-child(4)').textContent = quantidade + 1;
            } else {
                // Se a disciplina não existe, cria uma nova linha
                const novaDisciplinaPendente = document.createElement('tr');
                novaDisciplinaPendente.setAttribute('draggable', 'true');
                novaDisciplinaPendente.dataset.disciplina = disciplinaExistente.disciplina;
                novaDisciplinaPendente.dataset.professor = disciplinaExistente.professor;
                novaDisciplinaPendente.innerHTML = `
                    <td>${document.querySelectorAll('#disciplinas-pendentes tbody tr').length + 1}</td>
                    <td>${disciplinaExistente.disciplina}</td>
                    <td>${disciplinaExistente.professor}</td>
                    <td>1</td>
                `;
                configurarDragStart(novaDisciplinaPendente);
                document.querySelector('#disciplinas-pendentes tbody').appendChild(novaDisciplinaPendente);
            }
        }

        // Configura os eventos de drag-and-drop para os horários de todas as tabelas
        const horariosManha = document.querySelectorAll('#tabela-horarios-manha td.horario-vazio, #tabela-horarios-manha td.horario-preenchido');
        const horariosTarde = document.querySelectorAll('#tabela-horarios-tarde td.horario-vazio, #tabela-horarios-tarde td.horario-preenchido');
        const horariosNoite = document.querySelectorAll('#tabela-horarios-noite td.horario-vazio, #tabela-horarios-noite td.horario-preenchido');

        const todosHorarios = [...horariosManha, ...horariosTarde, ...horariosNoite];

        todosHorarios.forEach(horario => {
            // Abre o modal ao clicar em um horário (vazio ou preenchido)
            horario.addEventListener('click', function() {
                horarioSelecionado = horario;
                carregarDisciplinasPendentes();
                modalAtribuirDisciplina.show();
            });

            // Permite soltar uma disciplina no horário
            horario.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('drag-over');
            });

            horario.addEventListener('dragleave', function() {
                this.classList.remove('drag-over');
            });

            // Atribui a disciplina ao horário ao soltar (agora abre o modal de ambiente)
            horario.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('drag-over');
                const data = JSON.parse(e.dataTransfer.getData('text/plain'));
                horarioSelecionado = horario;
                abrirModalAmbiente(data.disciplina, data.professor);
            });
        });

        // Configura o drag-and-drop para as disciplinas pendentes iniciais
        let disciplinasPendentes = document.querySelectorAll('#disciplinas-pendentes tbody tr');
        disciplinasPendentes.forEach(disciplina => {
            configurarDragStart(disciplina);
        });

        // Atualiza o contador de horários vazios ao carregar a página
        atualizarContadorHorariosVazios();
    });
</script>