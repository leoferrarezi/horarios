<!-- incluir os componentes modais antes do restante do documento -->


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

<div class="page-header">
    <h3 class="page-title">TABELA GERAL DE HORÁRIOS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tabela Geral de Horários</li>
        </ol>
    </nav>
</div>

<!-- Filtro -->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Filtros</h4>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="curso">Curso</label>
                            <select class="js-example-basic-multiple" multiple="multiple" style="width:100%" id="curso">
                                <option value="ADS">Análise e Desenvolvimento de Sistemas</option>
                                <option value="ECA">Engenharia de Controle e Automação</option>
                                <option value="FIS">Licenciatura em Física</option>
                                <option value="INFO">Técnico em Informática</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="turma">Turma</label>
                            <select class="js-example-basic-multiple" multiple="multiple" style="width:100%" id="turma">
                                <option value="1">1º período </option>
                                <option value="2">2º período </option>
                                <option value="3">3º período </option>
                                <option value="4">4º período </option>
                                <option value="5">1º A </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="professor">Professor</label>
                            <select class="js-example-basic-single" style="width:100%" id="professor">
                                <option value="0">-</option>
                                <option value="1">Professor Artur</option>
                                <option value="2">Professora Berenice</option>
                                <option value="3">Professor Carlos</option>
                                <option value="4">Professor Daniel</option>
                                <option value="5">Professora Elaine</option>
                                <option value="6">Professor Francisca</option>
                                <option value="7">Professor Glória</option>
                                <option value="8">Professor Hugo</option>
                                <option value="9">Professor Ilda</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ambiente">Ambiente</label>
                            <select class="js-example-basic-single" style="width:100%" id="ambiente">
                                <option value="0">-</option>
                                <option value="1">Sala 101</option>
                                <option value="2">Sala 102</option>
                                <option value="3">Sala 103</option>
                                <option value="4">Sala 104</option>
                                <option value="5">Laboratório 1</option>
                                <option value="6">Quadra A</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="mdi mdi-filter me-1"></i>Filtrar
                        </button>
                        <button type="submit" class="btn btn-light">
                            <i class="mdi mdi-filter-remove me-1"></i>Limpar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabela de Horários (Manhã, Tarde, Noite) -->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="accordion accordion-solid-header" id="accordion-4" role="tablist">
                    <div class="card">
                        <div class="card-header" role="tab" id="heading-10">
                            <h4 class="mb-0">
                                <a data-bs-toggle="collapse" href="#collapse-10" aria-expanded="true" aria-controls="collapse-10">
                                    <i class="mdi mdi mdi-menu-down me-1"></i> Horários - Técnico em Informática 1º A
                                </a>
                            </h4>
                        </div>
                        <div id="collapse-10" class="collapse show" role="tabpanel" aria-labelledby="heading-10" data-bs-parent="#accordion-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div id="alert-horarios-vazios" class="alert alert-warning" style="display: none;">
                                            Há <span id="contador-horarios-vazios">0</span> horários sem aulas atribuídas.
                                        </div>
                                        <div class="table-responsive">
                                            <table id="tabela-horarios-manha" class="table table-bordered text-center mb-4">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7" class="text-center bg-primary text-white">MANHÃ</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Horário</th>
                                                        <th>Segunda-Feira</th>
                                                        <th>Terça-Feira</th>
                                                        <th>Quarta-Feira</th>
                                                        <th>Quinta-Feira</th>
                                                        <th>Sexta-Feira</th>
                                                        <th>Sábado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="coluna-fixa">07:30 - 08:20</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="07:30 - 08:20"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="07:30 - 08:20"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="07:30 - 08:20"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="07:30 - 08:20"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="07:30 - 08:20"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="coluna-fixa">08:20 - 09:10</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="08:20 - 09:10"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="08:20 - 09:10"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="08:20 - 09:10"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="08:20 - 09:10"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="08:20 - 09:10"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="coluna-fixa">09:10 - 10:00</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="09:10 - 10:00"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="09:10 - 10:00"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="09:10 - 10:00"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="09:10 - 10:00"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="09:10 - 10:00"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="coluna-fixa">10:15 - 11:05</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="10:15 - 11:05"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="10:15 - 11:05"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="10:15 - 11:05"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="10:15 - 11:05"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="10:15 - 11:05"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="coluna-fixa">11:05 - 11:55</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="11:05 - 11:55"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="11:05 - 11:55"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="11:05 - 11:55"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="11:05 - 11:55"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="11:05 - 11:55"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="coluna-fixa">11:55 - 12:45</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="11:55 - 12:45"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="11:55 - 12:45"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="11:55 - 12:45"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="11:55 - 12:45"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="11:55 - 12:45"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table id="tabela-horarios-tarde" class="table table-bordered text-center mb-4">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7" class="text-center bg-primary text-white">TARDE</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Horário</th>
                                                        <th>Segunda-Feira</th>
                                                        <th>Terça-Feira</th>
                                                        <th>Quarta-Feira</th>
                                                        <th>Quinta-Feira</th>
                                                        <th>Sexta-Feira</th>
                                                        <th>Sábado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="coluna-fixa">13:30 - 14:20</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="13:30 - 14:20"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="13:30 - 14:20"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="13:30 - 14:20"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="13:30 - 14:20"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="13:30 - 14:20"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="coluna-fixa">14:20 - 15:10</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="14:20 - 15:10"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="14:20 - 15:10"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="14:20 - 15:10"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="14:20 - 15:10"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="14:20 - 15:10"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="coluna-fixa">15:10 - 16:00</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="15:10 - 16:00"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="15:10 - 16:00"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="15:10 - 16:00"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="15:10 - 16:00"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="15:10 - 16:00"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="coluna-fixa">16:15 - 17:05</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="16:15 - 17:05"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="16:15 - 17:05"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="16:15 - 17:05"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="16:15 - 17:05"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="16:15 - 17:05"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="coluna-fixa">17:05 - 17:55</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="17:05 - 17:55"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="17:05 - 17:55"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="17:05 - 17:55"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="17:05 - 17:55"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="17:05 - 17:55"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="coluna-fixa">17:55 - 18:45</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="17:55 - 18:45"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="17:55 - 18:45"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="17:55 - 18:45"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="17:55 - 18:45"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="17:55 - 18:45"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table id="tabela-horarios-noite" class="table table-bordered text-center mb-4">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7" class="text-center bg-primary text-white">NOITE</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Horário</th>
                                                        <th>Segunda-Feira</th>
                                                        <th>Terça-Feira</th>
                                                        <th>Quarta-Feira</th>
                                                        <th>Quinta-Feira</th>
                                                        <th>Sexta-Feira</th>
                                                        <th>Sábado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="coluna-fixa">19:00 - 19:50</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="19:00 - 19:50"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="19:00 - 19:50"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="19:00 - 19:50"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="19:00 - 19:50"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="19:00 - 19:50"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="coluna-fixa">19:50 - 20:40</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="19:50 - 20:40"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="19:50 - 20:40"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="19:50 - 20:40"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="19:50 - 20:40"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="19:50 - 20:40"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="coluna-fixa">20:50 - 21:40</td>
                                                        <td class="horario-vazio" data-dia="Segunda" data-horario="20:50 - 21:40"></td>
                                                        <td class="horario-vazio" data-dia="Terça" data-horario="20:50 - 21:40"></td>
                                                        <td class="horario-vazio" data-dia="Quarta" data-horario="20:50 - 21:40"></td>
                                                        <td class="horario-vazio" data-dia="Quinta" data-horario="20:50 - 21:40"></td>
                                                        <td class="horario-vazio" data-dia="Sexta" data-horario="20:50 - 21:40"></td>
                                                        <td class="sabado-fixo">REPOSIÇÃO</td>
                                                    </tr>
                                                    <tr>
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
            </div>
        </div>
    </div>
</div>

<!-- Tabela de Disciplinas Pendentes -->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Disciplinas Pendentes</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="disciplinas-pendentes" class="table mb-4">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Disciplina</th>
                                        <th>Professor</th>
                                        <th>Tempos/Quantidades</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr draggable="true" data-disciplina="Matemática" data-professor="Artur" data-ambiente="Sala 101">
                                        <td>1</td>
                                        <td>Matemática</td>
                                        <td>Artur</td>
                                        <td>2</td>
                                    </tr>
                                    <tr draggable="true" data-disciplina="Filosofia" data-professor="Berenice" data-ambiente="Sala 102">
                                        <td>2</td>
                                        <td>Filosofia</td>
                                        <td>Berenice</td>
                                        <td>4</td>
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
</script>
<script>
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
                // Cria um elemento fantasma personalizado
                const ghost = document.createElement('div');
                ghost.className = 'drag-ghost';

                // Obtém os dados da disciplina
                const disciplinaNome = disciplina.dataset.disciplina;
                const professorNome = disciplina.dataset.professor;

                ghost.innerHTML = `
                    <div>${disciplinaNome}</div>
                    <div>Prof: ${professorNome}</div>
                `;

                // Adiciona ao documento
                ghost.style.position = 'absolute';
                ghost.style.left = '-9999px';
                document.body.appendChild(ghost);

                // Define o elemento fantasma para o drag
                e.dataTransfer.setDragImage(ghost, 0, 0);

                // Define os dados para transferência
                e.dataTransfer.setData('text/plain', JSON.stringify({
                    disciplina: disciplinaNome,
                    professor: professorNome
                }));

                // Remove o fantasma depois de um tempo
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
                    <div><span data-label="disciplina">${disciplinaSelecionada}</span></div>
                    <div>Professor(a): <span data-label="professor">${professorSelecionado}</span></div>
                    <div><span data-label="ambiente">${ambienteSelecionado}</span></div>
                `;
                horarioSelecionado.dataset.disciplina = disciplinaSelecionada;
                horarioSelecionado.dataset.professor = professorSelecionado;
                horarioSelecionado.dataset.ambiente = ambienteSelecionado;

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
                delete horarioSelecionado.dataset.ambiente;

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
                professor: horario.dataset.professor,
                ambiente: horario.dataset.ambiente
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