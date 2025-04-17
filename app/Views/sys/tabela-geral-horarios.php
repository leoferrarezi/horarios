<style>
    /* Substitua #cards-container pelo seletor correto */
    .card-body.overflow-y-auto::-webkit-scrollbar {
        width: 5px;
        background-color: #000;
    }

    .card-body.overflow-y-auto::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px rgba(6, 6, 6, 0.3);
        background: #f1f1f1;
        /* Cor de fundo da trilha */
    }

    .card-body.overflow-y-auto::-webkit-scrollbar-thumb {
        background-color: #333;
        outline: 1px solid slategrey;
        border-radius: 10px;
        /* Arredondamento do thumb */
    }

    .horario-vazio .card {
        max-width: 100% !important;
        margin: 0 !important;
        height: 100%;
    }

    .horario-vazio .card-body {
        padding: 0.25rem !important;
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%;
    }

    .horario-vazio h6 {
        font-size: 0.75rem !important;
        margin-bottom: 0.1rem !important;
    }

    .horario-vazio small {
        font-size: 0.65rem !important;
    }

    /* Mantenha as regras existentes */
    .card-body.overflow-y-auto::-webkit-scrollbar {
        width: 5px;
        background-color: #000;
    }
</style>


<!-- Modal -->
<div class="modal fade" id="modalAtribuirDisciplina" tabindex="-1" aria-labelledby="modalAtribuirDisciplinaLabel" aria-hidden="true" style="z-index: 10000;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAtribuirDisciplinaLabel">Atribuir/Remover Disciplina</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tabelaDisciplinasModal" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 30%">Disciplina</th>
                                <th style="width: 30%">Professor</th>
                                <th style="width: 20%">Quantidade</th>
                                <th style="width: 20%">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
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
<div class="row g-3">
    <!-- Coluna esquerda - Filtros e Aulas Pendentes -->
    <div class="row g-3">
        <div class="col-md-3">
            <!-- Seção de Filtros -->
            <div class="card left-column-section mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-bottom: 10px;">
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
                            <div class="form-group" style="margin-bottom: 10px;">
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
                </div>
            </div>

            <!-- Seção de Aulas Pendentes -->
            <div class="card left-column-section">
                <div class="card-body overflow-y-auto" style="height: calc(46vh);">
                    <h6 class="card-title text-center"> Aulas Pendentes (80)</h6>
                    <div class="row">
                        <div class="col-12">

                            <div draggable="true" data-disciplina="Matemática" data-professor="Jackson" data-aulas="4" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
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

                            <div draggable="true" data-disciplina="Algoritimos e Linguagens de Programação" data-professor="Leandro" data-aulas="4" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
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

                            <div draggable="true" data-disciplina="Análise e Projetos de Sistemas" data-professor="Elisângela" data-aulas="4" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
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

                            <div draggable="true" data-disciplina="Comunicação e Expressão" data-professor="Iza" data-aulas="2" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
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

                            <div draggable="true" data-disciplina="Organização de Computadores" data-professor="Brenda" data-aulas="2" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
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

                            <div draggable="true" data-disciplina="Algoritmos Avançados" data-professor="Leandro" data-aulas="2" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
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

                            <div draggable="true" data-disciplina="Análise Orientada a Objetos" data-professor="Elisangela" data-aulas="4" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
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

                            <div draggable="true" data-disciplina="Banco de Dados: Modelagem e Projetos" data-professor="Fernando" data-aulas="4" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
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
            <div class="card" style="height: 70vh;">
                <div class="card-body overflow-y-auto overflow-x-hidden">
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
            const modalAtribuirDisciplinaElement = document.getElementById('modalAtribuirDisciplina');
            const modalSelecionarAmbienteElement = document.getElementById('modalSelecionarAmbiente');

            // Inicializa os modais usando a API do Bootstrap 5
            const modalAtribuirDisciplina = new bootstrap.Modal(modalAtribuirDisciplinaElement);
            const modalSelecionarAmbiente = new bootstrap.Modal(modalSelecionarAmbienteElement);

            const tabelaDisciplinasModal = document.getElementById('tabelaDisciplinasModal').querySelector('tbody');
            const selectAmbiente = document.getElementById('selectAmbiente');
            const confirmarAmbiente = document.getElementById('confirmarAmbiente');

            let horarioSelecionado = null;
            let disciplinaSelecionada = null;
            let professorSelecionado = null;
            let cardSelecionado = null;

            // Atualiza o contador de horários vazios
            function atualizarContadorHorariosVazios() {
                const todasCelulas = document.querySelectorAll('#tabela-horarios-manha td.horario-vazio:not(.coluna-fixa):not(.sabado-fixo)');
                const totalHorariosVazios = Array.from(todasCelulas).filter(celula => celula.innerHTML.trim() === "").length;
                if (contadorHorariosVazios) {
                    contadorHorariosVazios.textContent = totalHorariosVazios;
                }
                if (alertHorariosVazios) {
                    alertHorariosVazios.style.display = totalHorariosVazios > 0 ? 'block' : 'none';
                }
            }

            // Atualiza o contador de disciplinas pendentes
            function atualizarContadorPendentes() {
                const cardsPendentes = document.querySelectorAll('.card[draggable="true"]');
                const contadorPendentes = document.querySelector('.card-title.text-center');
                if (contadorPendentes) {
                    contadorPendentes.textContent = `Aulas Pendentes (${cardsPendentes.length})`;
                }
            }

            // Configura o evento dragstart para os cards de disciplinas pendentes
            function configurarDragStart(cardDisciplina) {
                cardDisciplina.addEventListener('dragstart', function(e) {
                    const ghost = document.createElement('div');
                    ghost.className = 'card shadow-sm border-primary';
                    ghost.style.width = '180px';
                    ghost.style.pointerEvents = 'none';
                    ghost.style.position = 'absolute';
                    ghost.style.left = '-9999px';

                    const disciplinaNome = cardDisciplina.dataset.disciplina;
                    const professorNome = cardDisciplina.dataset.professor;
                    const aulas = cardDisciplina.dataset.aulas;
                    const numAulas = parseInt(aulas) || 1;

                    ghost.innerHTML = `
                    <div class="card-body p-2">
                        <h6 class="card-title text-primary mb-1">${disciplinaNome}</h6>
                        <p class="card-text text-muted mb-1 small">
                            <i class="mdi mdi-account me-1"></i>
                            <small class="text-secondary text-truncate">${professorNome}</small>
                        </p>
                        <p class="card-text text-muted small mb-0">
                            <i class="mdi mdi-clock-outline me-1"></i> ${aulas}
                        </p>
                    </div>
                `;

                    document.body.appendChild(ghost);
                    e.dataTransfer.setDragImage(ghost, 90, 20);
                    e.dataTransfer.setData('text/plain', JSON.stringify({
                        disciplina: disciplinaNome,
                        professor: professorNome,
                        aulas: numAulas
                    }));

                    // Guarda a referência ao card
                    e.dataTransfer.setData('cardElement', cardDisciplina.dataset.disciplina + '|' + cardDisciplina.dataset.professor);

                    setTimeout(() => document.body.removeChild(ghost), 0);
                });
            }

            // Função para abrir o modal de seleção de ambiente
            function abrirModalAmbiente(disciplina, professor, cardElement, numAulas) {
                disciplinaSelecionada = disciplina;
                professorSelecionado = professor;
                cardSelecionado = cardElement;
                modalSelecionarAmbiente.show();
            }

            // Configura o evento de confirmação do ambiente
            confirmarAmbiente.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const ambienteSelecionado = selectAmbiente.value;
                const numAulas = cardSelecionado ? parseInt(cardSelecionado.dataset.aulas) || 1 : 1;

                if (horarioSelecionado) {
                    // Se o horário já contém uma disciplina, move-a de volta para a lista de pendentes
                    if (horarioSelecionado.innerHTML.trim() !== "") {
                        moverDisciplinaParaPendentes(horarioSelecionado);
                    }

                    // Encontra a linha atual e todas as células da mesma linha
                    const linhaAtual = horarioSelecionado.parentNode;
                    const celulasLinha = Array.from(linhaAtual.cells);
                    const indiceColuna = celulasLinha.indexOf(horarioSelecionado);

                    // Encontra todas as linhas da tabela
                    const todasLinhas = Array.from(document.querySelectorAll('#tabela-horarios-manha tbody tr'));
                    const indiceLinha = todasLinhas.indexOf(linhaAtual);

                    // Preenche os horários necessários
                    let aulasRestantes = numAulas;
                    let linha = indiceLinha;
                    let coluna = indiceColuna;

                    while (aulasRestantes > 0 && linha < todasLinhas.length) {
                        const celulaAtual = todasLinhas[linha].cells[coluna];

                        // Verifica se a célula está vazia e não é coluna fixa ou sábado
                        if (celulaAtual.classList.contains('horario-vazio') &&
                            !celulaAtual.classList.contains('coluna-fixa') &&
                            !celulaAtual.classList.contains('sabado-fixo')) {

                            celulaAtual.innerHTML = `
                                <div class="card border-1 shadow-sm bg-gradient" style="cursor: pointer; height: 100%;">
                                    <div class="card-body p-1 d-flex flex-column justify-content-center align-items-center text-center">
                                        <h6 class="text-wrap mb-0 fs-6 text-primary" style="font-size: 0.75rem !important;">
                                            <i class="mdi mdi-book-outline me-1"></i>
                                            ${disciplinaSelecionada}
                                        </h6>
                                        <div class="d-flex align-items-center mb-0 py-0">
                                            <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                                            <small class="text-secondary" style="font-size: 0.65rem !important;">${professorSelecionado}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                                            <small class="text-secondary" style="font-size: 0.65rem !important;">${ambienteSelecionado}</small>
                                        </div>
                                    </div>
                                </div>
                            `;

                            celulaAtual.dataset.disciplina = disciplinaSelecionada;
                            celulaAtual.dataset.professor = professorSelecionado;
                            celulaAtual.dataset.ambiente = ambienteSelecionado;
                            celulaAtual.classList.add('horario-preenchido', 'p-0');

                            aulasRestantes--;
                        }

                        // Move para a próxima célula (mesma coluna, próxima linha)
                        linha++;

                        // Se chegou ao final da tabela, volta para o início e próxima coluna
                        if (linha >= todasLinhas.length) {
                            linha = 0;
                            coluna = (coluna + 1) % 7; // 7 colunas na tabela
                            if (coluna === 0) coluna = 1; // Pula a coluna de horários
                        }
                    }

                    // Remove o card da lista de pendentes
                    if (cardSelecionado && cardSelecionado.parentNode) {
                        cardSelecionado.parentNode.removeChild(cardSelecionado);
                        atualizarContadorPendentes();
                    }

                    atualizarContadorHorariosVazios();
                    modalSelecionarAmbiente.hide();
                    modalAtribuirDisciplina.hide();
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
                    <td><button class="btn btn-danger btn-sm btn-remover">Remover</button></td>
                `;
                    tabelaDisciplinasModal.appendChild(row);

                    // Adiciona evento de clique diretamente
                    row.querySelector('.btn-remover').addEventListener('click', function() {
                        removerDisciplina();
                    });
                }

                // Mensagem de substituição
                const mensagemRow = document.createElement('tr');
                mensagemRow.innerHTML = `
                <td colspan="4" class="text-center text-warning">Atenção: Ao atribuir uma nova disciplina, a atual será substituída.</td>
            `;
                tabelaDisciplinasModal.appendChild(mensagemRow);

                // Carrega as disciplinas pendentes
                const disciplinasPendentes = document.querySelectorAll('.card[draggable="true"]');
                disciplinasPendentes.forEach(card => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                    <td>${card.dataset.disciplina}</td>
                    <td>${card.dataset.professor}</td>
                    <td>${card.dataset.aulas}</td>
                    <td><button class="btn btn-primary btn-sm btn-atribuir">Atribuir</button></td>
                `;
                    tabelaDisciplinasModal.appendChild(row);

                    // Adiciona evento de clique diretamente
                    row.querySelector('.btn-atribuir').addEventListener('click', function() {
                        atribuirDisciplina(card.dataset.disciplina, card.dataset.professor, card);
                    });
                });
            }

            // Função para atribuir disciplina ao horário selecionado
            function atribuirDisciplina(disciplina, professor, cardElement) {
                if (horarioSelecionado) {
                    modalAtribuirDisciplina.hide();
                    // Pequeno delay para garantir que o modal feche antes de abrir o próximo
                    setTimeout(() => {
                        abrirModalAmbiente(disciplina, professor, cardElement);
                    }, 300);
                }
            }

            // Função para remover a disciplina do horário selecionado
            function removerDisciplina() {
                if (horarioSelecionado) {
                    moverDisciplinaParaPendentes(horarioSelecionado);

                    horarioSelecionado.innerHTML = '';
                    delete horarioSelecionado.dataset.disciplina;
                    delete horarioSelecionado.dataset.professor;
                    delete horarioSelecionado.dataset.ambiente;
                    horarioSelecionado.classList.remove('horario-preenchido');

                    atualizarContadorHorariosVazios();
                    modalAtribuirDisciplina.hide();
                }
            }

            // Move uma disciplina de volta para a lista de pendentes
            function moverDisciplinaParaPendentes(horario) {
                const disciplinaExistente = {
                    disciplina: horario.dataset.disciplina,
                    professor: horario.dataset.professor,
                    ambiente: horario.dataset.ambiente
                };

                const novoCard = document.createElement('div');
                novoCard.setAttribute('draggable', 'true');
                novoCard.dataset.disciplina = disciplinaExistente.disciplina;
                novoCard.dataset.professor = disciplinaExistente.professor;
                novoCard.dataset.aulas = "1 aula";
                novoCard.className = 'card border-1 shadow-sm mx-4 my-1 bg-gradient';
                novoCard.style.cursor = 'pointer';

                novoCard.innerHTML = `
                <div class="card-body p-0 d-flex flex-column justify-content-center align-items-center text-center">
                    <h6 class="text-primary">
                        <i class="mdi mdi-book-outline me-1"></i> ${disciplinaExistente.disciplina}
                    </h6>
                    <div class="d-flex align-items-center mb-0 py-0">
                        <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                        <small class="text-secondary">${disciplinaExistente.professor}</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                        <small class="text-secondary">1 aula</small>
                    </div>
                </div>
            `;

                const containerCards = document.querySelector('.card-body .row .col-12');
                if (containerCards) {
                    containerCards.appendChild(novoCard);
                    configurarDragStart(novoCard);
                    atualizarContadorPendentes();
                }
            }

            // Configura os eventos de drag-and-drop para os horários
            const todosHorarios = document.querySelectorAll('#tabela-horarios-manha td.horario-vazio, #tabela-horarios-manha td.horario-preenchido');

            todosHorarios.forEach(horario => {
                // Abre o modal ao clicar em um horário
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

                // Atribui a disciplina ao horário ao soltar
                horario.addEventListener('drop', function(e) {
                    e.preventDefault();
                    this.classList.remove('drag-over');
                    const data = JSON.parse(e.dataTransfer.getData('text/plain'));

                    // Encontra o card correspondente na lista de pendentes
                    const cardIdentifier = e.dataTransfer.getData('cardElement');
                    const cards = document.querySelectorAll('.card[draggable="true"]');
                    let cardToRemove = null;

                    cards.forEach(card => {
                        const cardId = card.dataset.disciplina + '|' + card.dataset.professor;
                        if (cardId === cardIdentifier) {
                            cardToRemove = card;
                        }
                    });

                    horarioSelecionado = horario;
                    abrirModalAmbiente(data.disciplina, data.professor, cardToRemove, data.aulas);
                });
            });

            // Configura o drag-and-drop para os cards de disciplinas pendentes
            const cardsDisciplinas = document.querySelectorAll('.card[draggable="true"]');
            cardsDisciplinas.forEach(card => {
                // Adiciona um identificador único para cada card
                card.dataset.cardId = card.dataset.disciplina + '|' + card.dataset.professor;
                configurarDragStart(card);
            });

            // Atualiza os contadores ao carregar a página
            atualizarContadorHorariosVazios();
            atualizarContadorPendentes();

            // Remove as funções globais e usa escopo local
            window.atribuirDisciplina = atribuirDisciplina;
            window.removerDisciplina = removerDisciplina;
        });
    </script>