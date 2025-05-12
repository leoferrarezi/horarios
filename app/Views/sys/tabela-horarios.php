<style>
    .card-body.overflow-y-auto::-webkit-scrollbar,
    .custom-scrollbar::-webkit-scrollbar {
        width: 5px;
        background-color: #000;
    }

    .card-body.overflow-y-auto::-webkit-scrollbar-track,
    .custom-scrollbar::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px rgba(6, 6, 6, 0.3);
        background: #f1f1f1;
        /* Cor de fundo da trilha */
    }

    .card-body.overflow-y-auto::-webkit-scrollbar-thumb,
    .custom-scrollbar::-webkit-scrollbar-thumb {
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

    .loader-demo-box {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        opacity: 0.9;
        background-color: #191c24;
        position: absolute;
        z-index: 9999;
        visibility: hidden;
    }

    .circle-loader::before {
        border-top-color: #8f5fe8
    }

    #loader-text {
        position: absolute;
        margin-top: 15vh;
        width: 100%;
        color: #fff;
        font-size: 12px;
        text-align: center;
    }

    .left-column-section {
        width: 100%;
    }

    .card.left-column-section {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-body.overflow-y-auto {
        flex: 1;
        min-height: 0;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="modalAtribuirDisciplina" tabindex="-1" aria-labelledby="modalAtribuirDisciplinaLabel" aria-hidden="true" style="z-index: 10000;">
    <div class="modal-dialog" style="width: 1000px; max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalAtribuirDisciplinaLabel">
                    [<span id="modal_Turma"></span>] : [<span id="dia_da_aula"></span>] : [<span id="hora_da_aula"></span>]
                </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tabelaDisciplinasModal" class="table">
                        <thead>
                            <tr>
                                <td colspan="4" class="text-center text-warning"> <i class="mdi mdi-alert-outline fs-6 me-1"></i> Atenção: ao atribuir uma nova disciplina, a atual será substituída.</td>
                            </tr>
                            <tr>
                                <th>Disciplina</th>
                                <th>Professor</th>
                                <th>Quantidade</th>
                                <!--<th>Ambiente</th>-->
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <thead>
                            <tr>
                                <td colspan="4" class="text-center text-info"><i class="mdi mdi-information-outline fs-6 me-1"></i> O ambiente onde ocorrerá a aula será definido no próximo passo.</td>
                            </tr>
                        </thead>
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
<div class="modal fade" id="modalSelecionarAmbiente" role="dialog" tabindex="-1" aria-labelledby="modalSelecionarAmbienteLabel" aria-hidden="false" style="z-index: 10000;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalSelecionarAmbienteLabel">Definir Ambiente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-1 shadow-sm bg-gradient">
                            <div class="card-body">
                                <h6 class="text-primary">
                                    <i class="mdi mdi-book-outline me-1"></i> <span id="modalAmbienteNomeDisciplina"></span>
                                </h6>
                                <div class="d-flex align-items-center mb-0 py-0">
                                    <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                                    <small class="text-secondary"><span id="modalAmbienteProfessor"></span></small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                                    <small class="text-secondary"><span id="modalAmbienteAulas"></span> aulas</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-1 shadow-sm">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="selectAmbiente">
                                        <h6 class="text-primary">Selecione o ambiente:</h6>
                                    </label>
                                    <select class="form-select" id="selectAmbiente">
                                        <?php foreach ($ambientes as $ambiente): ?>
                                            <option value="<?php echo esc($ambiente['id']) ?>"><?php echo esc($ambiente['nome']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirmarAmbiente">Confirmar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal de Confirmação de Remoção -->
<div class="modal fade" id="modalConfirmarRemocao" tabindex="-1" aria-labelledby="modalConfirmarRemocaoLabel" aria-hidden="true" style="z-index: 10001;">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header border-secondary">
                <h5 class="modal-title text-white" id="modalConfirmarRemocaoLabel">
                    <i class="mdi mdi-alert-circle-outline me-2 text-warning"></i> Confirmar Remoção
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row" id="rowConflito">
                    <h5 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Conflito identificado!</h5>
                    <div class="card bg-dark border-danger mb-3">
                        <div class="card-body p-2">
                            <h6 class="text-warning mb-1" id="modalRemocaoConflitoCurso">...</h6>
                            <h6 class="text-warning mb-1" id="modalRemocaoConflitoTurma">...</h6>
                            <p class="text-warning mb-1" id="modalRemocaoConflitoDisciplina">...</p>
                            <p class="text-warning mb-1" id="modalRemocaoConflitoProfessor">...</p>
                            <p class="text-warning mb-1" id="modalRemocaoConflitoAmbiente">...</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <p class="text-light">Deseja remover esta disciplina do horário?</p>
                    <div class="card bg-dark border-warning mb-3">
                        <div class="card-body p-2">
                            <h6 class="text-warning mb-1" id="modalRemocaoDisciplina"></h6>
                            <small class="text-muted" id="modalRemocaoProfessor"></small><br />
                            <small class="text-muted" id="modalRemocaoAmbiente"></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmarRemocao">Remover</button>
            </div>
        </div>
    </div>
</div>

<!--só pra testar o modal de ambiente-->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSelecionarAmbiente">Launch demo modal</button> -->


<!-- Filtro -->
<div class="row g-3">
    <!-- Coluna esquerda - Filtros e Aulas Pendentes -->
    <div class="col-md-3 d-flex flex-column" style="position: relative; height: 74vh;">
        <!-- loader -->
        <div class="loader-demo-box">
            <div class="circle-loader"></div>
            <div id="loader-text">Carregando...</div>
        </div>

        <!-- Seção de Filtros -->
        <div class="card left-column-section mb-3" style="flex: 0 0 30%;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="curso">Curso:</label>
                            <select class="form-select filtro" id="filtroCurso">
                                <option value="0">-</option>
                                <?php foreach ($cursos as $curso): ?>
                                    <option value="<?php echo esc($curso['id']) ?>"><?php echo esc($curso['nome']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="curso">Turma:</label>
                            <select class="form-select filtro" id="filtroTurma">
                                <option value="0">-</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Seção de Aulas Pendentes -->
        <div class="card left-column-section position-relative" style="flex: 1; min-height: 0;">
            <div class="card-body d-flex flex-column position-relative" style="height: 100%;">
                <p class="text-center">
                    Aulas Pendentes: &nbsp;
                    <span class="badge badge-pill badge-info" id="aulasCounter">-</span>
                </p>

                <div class="row">
                    <div class="col-12 text-center">
                        <button id="btn_atribuir_automaticamente" type="button" class="btn btn-info" disabled>
                            <i class="mdi mdi-auto-fix"></i> Auto atribuir
                        </button>
                    </div>
                </div>

                <hr class="my-2" />

                <div class="position-absolute start-0 end-0" style="top: 160px; bottom: 15px;">
                    <div class="h-100 overflow-y-auto custom-scrollbar" id="aulasContainer" style="overflow-x: hidden;">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Tabela de Horários (Manhã, Tarde, Noite) - Lado direito (9 colunas) -->
    <div class="col-lg-9">
        <div class="card" style="height: 74vh;">
            <div class="card-body overflow-y-auto overflow-x-hidden">
                <div class="row">
                    <div class="col-12">

                        <!--<div id="alert-horarios-vazios" class="alert alert-fill-warning" style="display: none;">
                            <i class="mdi mdi-alert-circle"></i>
                            Há <span id="contador-horarios-vazios">0</span> aulas sem horário atribuído.
                        </div>-->

                        <div class="table-responsive">

                            <table id="tabela-horarios" class="table table-bordered text-center mb-4">

                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    //Vertozão global pra guardar dados dos horários da turma
    var horarios = [];

    //Vertozão global pra guardar dados das aulas da turma
    var aulas = [];

    //Referencia para os nomes dos dias da semana
    var nome_dia = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];

    const sleep = (delay) => new Promise((resolve) => setTimeout(resolve, delay))

    $(document).ready(function() 
    {
        // Define variáveis globais para armazenar os dados do modal
        const modalAtribuirDisciplinaElement = document.getElementById('modalAtribuirDisciplina');
        const modalSelecionarAmbienteElement = document.getElementById('modalSelecionarAmbiente');

        // Inicializa os modais usando a API do Bootstrap 5
        const modalAtribuirDisciplina = new bootstrap.Modal(modalAtribuirDisciplinaElement);
        const modalSelecionarAmbiente = new bootstrap.Modal(modalSelecionarAmbienteElement);

        //Algumas globais pra controle dos modals
        let horarioSelecionado = null;

        // Função para atualizar contador de pendentes
        function atualizarContadorPendentes() 
        {
            let totalAulasPendentes = 0;
            $('.card[draggable="true"]').each(function() 
            {
                totalAulasPendentes += parseInt($(this).data('aulas-pendentes'));
            });

            $('#aulasCounter').text(totalAulasPendentes);
        }

        // Função para mover disciplina de volta para pendentes
        function moverDisciplinaParaPendentes(horarioElement) 
        {
            const $horario = $(horarioElement);
            const disciplina = $horario.data('disciplina');
            const professor = $horario.data('professor');
            const aulaId = $horario.data('aula-id');
            const aulasTotal = $horario.data('aulas-total') || '1';

            // Verifica se já existe na lista de pendentes
            if ($(`#aula_${aulaId}`).length > 0) 
            {
                const cardAula = $(`#aula_${aulaId}`);
                const aulasPendentes = cardAula.data('aulas-pendentes') + 1;
                cardAula.data('aulas-pendentes', aulasPendentes);
                cardAula.find('.aulas-pendentes').text(aulasPendentes);
            } 
            else 
            {
                const cardAula = `
                    <div id="aula_${aulaId}" draggable="true" data-aula-id="${aulaId}" data-disciplina="${disciplina}" data-professor="${professor}" data-aulas-total="${aulasTotal}" data-aulas-pendentes="1" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">
                        <div class="card-body p-0 d-flex flex-column justify-content-center align-items-center text-center">
                            <h6 class="text-primary">
                                <i class="mdi mdi-book-outline me-1"></i> ${disciplina}
                            </h6>
                            <div class="d-flex align-items-center mb-0 py-0" id="professor_aula_${aulaId}">
                                <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                                <small class="text-secondary">${professor}</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                                <small class="text-secondary"><span class="aulas-pendentes">1</span> aulas</small>
                            </div>
                        </div>
                    </div>
                `;

                $('#aulasContainer').append(cardAula);

                configurarDragAndDrop(); // Reconfigura eventos para o novo card
            }

            atualizarContadorPendentes();
        }

        // Modal de confirmação de remoção (estilo Bootstrap)
        function mostrarModalConfirmacaoRemocao(horarioElement)
        {
            const $horario = $(horarioElement);
            const aulaId = $horario.data('aula-id');

            const modalConfirmarRemocao = new bootstrap.Modal(document.getElementById('modalConfirmarRemocao'));

            // Preenche os dados no modal
            $('#modalRemocaoDisciplina').text($horario.data('disciplina'));
            $('#modalRemocaoProfessor').text('Professor: ' + $horario.data('professor'));
            $('#modalRemocaoAmbiente').text('Ambiente: ' + $horario.data('ambienteNome'));

            //Verificar e preencher dados do conflito
            if($horario.data('conflito') > 0)
            {
                // Requisição para buscar os dados da aula em conflito
                $.get('<?php echo base_url('sys/tabela-horarios/dadosDaAula/'); ?>' + $horario.data('conflito'),
                function(data)
                {
                    $('#modalRemocaoConflitoCurso').text("Curso: " + data.curso);
                    $('#modalRemocaoConflitoTurma').text("Turma: " + data.turma);
                    $('#modalRemocaoConflitoDisciplina').text("Disciplina: " + data.disciplina);
                    $('#modalRemocaoConflitoProfessor').text("Professor: " + data.professor);
                    $('#modalRemocaoConflitoAmbiente').text("Ambiente: " + data.ambiente);

                }, 'json');

                $('#rowConflito').show();
            }
            else
            {
                $('#rowConflito').hide();
            }

            // Remove qualquer evento anterior do botão de confirmação
            $('#confirmarRemocao').off('click');

            // Configura o evento de confirmação
            $('#confirmarRemocao').on('click', function()
            {                
                horarioId = $horario.attr('id').split('_')[1]; // Extrai o ID do horário

                // Requisição para remover a disciplina ao horário no backend
                $.post('<?php echo base_url('sys/tabela-horarios/removerAula'); ?>', 
                {
                    aula_id: aulaId,
                    tempo_de_aula_id: horarioId
                },
                function(data)
                {
                    if(data == "1")
                    {
                        moverDisciplinaParaPendentes(horarioElement);

                        // Limpa o horário
                        $horario.html('')
                            .removeClass('horario-preenchido')
                            .addClass('horario-vazio')
                            .removeData(['disciplina', 'professor', 'ambiente', 'aula-id', 'aulas-total', 'aulas-pendentes'])
                            .off('click')
                            .click(function() {
                                horarioSelecionado = $(this);
                                carregarDisciplinasPendentes($(this).attr('id'));
                                modalAtribuirDisciplina.show();
                            });

                        // Fecha o modal
                        modalConfirmarRemocao.hide();

                        // Mostra feedback de sucesso
                        $.toast({
                            heading: 'Sucesso',
                            text: 'A disciplina foi removida do horário.',
                            showHideTransition: 'slide',
                            icon: 'success',
                            loaderBg: '#f96868',
                            position: 'top-center'
                        });
                    }
                    else
                    {
                        // Mostra feedback de erro
                        $.toast({
                            heading: 'Erro',
                            text: 'Ocorreu um erro ao remover a aula do horário.',
                            showHideTransition: 'slide',
                            icon: 'error',
                            loaderBg: '#f96868',
                            position: 'top-center'
                        });
                    }
                });                
            });

            // Mostra o modal
            modalConfirmarRemocao.show();
        }

        // Configura drag and drop
        function configurarDragAndDrop() 
        {
            // Drag start para cards de disciplinas
            $('.card[draggable="true"]').on('dragstart', function(e) 
            {
                e.originalEvent.dataTransfer.setData('text/plain', $(this).data('aula-id'));
                $(this).addClass('dragging');
            });

            // Drag end para cards de disciplinas
            $('.card[draggable="true"]').on('dragend', function() 
            {
                $(this).removeClass('dragging');
            });

            // Drag over para horários
            $('.horario-vazio, .horario-preenchido').on('dragover', function(e) 
            {
                e.preventDefault();
                $(this).addClass('drag-over');
            });

            // Drag leave para horários
            $('.horario-vazio, .horario-preenchido').on('dragleave', function() 
            {
                $(this).removeClass('drag-over');
            });

            // Drop para horários
            $('.horario-vazio, .horario-preenchido').on('drop', function(e) 
            {
                e.preventDefault();

                $(this).removeClass('drag-over');

                horarioId = $(this).attr('id').split('_')[1]; // Extrai o ID do horário

                const aulaId = e.originalEvent.dataTransfer.getData('text/plain');

                if (aulaId) 
                {
                    horarioSelecionado = $(this);
                    atribuirDisciplina(aulaId, horarioId);
                }
            });
        }

        // Função para atribuir disciplina ao horário selecionado
        function atribuirDisciplina(aulaId, horarioId) 
        {
            modalAtribuirDisciplina.hide();

            // Pequeno delay para garantir que o modal feche antes de abrir o próximo
            setTimeout(() => {
                abrirModalAmbiente(aulaId, horarioId);
            }, 300);
        }

        // Função para abrir o modal de seleção de ambiente
        function abrirModalAmbiente(aulaId, horarioId) 
        {
            let minhaAula = getAulaById(aulaId);
            $("#modalAmbienteNomeDisciplina").html(minhaAula.disciplina);
            $("#modalAmbienteProfessor").html(minhaAula.professores.join(", "));
            $("#modalAmbienteAulas").html("1 aula"); // Sempre atribui 1 aula por vez

            // Armazena o ID da aula e horario para uso posterior
            $('#modalSelecionarAmbiente').data('aula-id', aulaId).data('horario-id', horarioId);

            modalSelecionarAmbiente.show();
        }

        // Configura o evento de confirmação do ambiente
        $("#confirmarAmbiente").click(function(e) 
        {
            e.preventDefault();
            e.stopPropagation();

            const ambienteSelecionadoId = $("#selectAmbiente").val();
            const ambienteSelecionadoNome = $("#selectAmbiente option:selected").text();
            const aulaId = $('#modalSelecionarAmbiente').data('aula-id');
            const aula = getAulaById(aulaId);
            const cardAula = $(`#aula_${aulaId}`);
            const horarioId = $('#modalSelecionarAmbiente').data('horario-id');

            if (horarioSelecionado) 
            {
                // Requisição para atribuir a disciplina ao horário no backend
                $.post('<?php echo base_url('sys/tabela-horarios/atribuirAula'); ?>', 
                {
                    aula_id: aulaId,
                    tempo_de_aula_id: horarioId,
                    ambiente_id: ambienteSelecionadoId
                },
                function(data) 
                {
                    if(data == "0") 
                    {
                        $.toast({
                            heading: 'Erro',
                            text: 'Ocorreu um erro ao atribuir a disciplina ao horário.',
                            showHideTransition: 'slide',
                            icon: 'error',
                            loaderBg: '#f96868',
                            position: 'top-center'
                        });
                        return;
                    }
                    else if(data == "1" || data.indexOf("CONFLITO") >= 0)
                    {
                        var conflitoStyle = "text-primary";
                        var conflitoIcon = "fa-mortar-board";
                        var aulaConflito = 0;

                        if(data.indexOf("AMBIENTE") >= 0)
                        {
                            aulaConflito = data.split("-")[2];
                            conflitoStyle = "text-warning";
                            conflitoIcon = "fa-warning";
                        }

                        // Se o horário já contém uma disciplina, move-a de volta para a lista de pendentes
                        if (horarioSelecionado.html().trim() !== "") 
                        {
                            moverDisciplinaParaPendentes(horarioSelecionado[0]);
                        }

                        // Preenche o horário selecionado
                        horarioSelecionado.html(`
                            <div class="card border-1 shadow-sm bg-gradient" style="cursor: pointer; height: 100%;">
                                <div class="card-body p-1 d-flex flex-column justify-content-center align-items-center text-center">
                                    <h6 class="text-wrap mb-0 fs-6 ${conflitoStyle}" style="font-size: 0.75rem !important;">
                                        <i class="fa ${conflitoIcon} me-1"></i>
                                        ${aula.disciplina}
                                    </h6>
                                    <div class="d-flex align-items-center mb-0 py-0">
                                        <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                                        <small class="text-wrap text-secondary" style="font-size: 0.65rem !important;">${aula.professores.join(", ")}</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                                        <small class="text-wrap text-secondary" style="font-size: 0.65rem !important;">${ambienteSelecionadoNome}</small>
                                    </div>
                                </div>
                            </div>
                        `);

                        // Adiciona os dados ao horário
                        horarioSelecionado
                            .data('disciplina', aula.disciplina)
                            .data('professor', aula.professores.join(", "))
                            .data('ambiente', ambienteSelecionadoId)
                            .data('ambienteNome', ambienteSelecionadoNome)
                            .data('aula-id', aulaId)
                            .data('aulas-total', cardAula.data('aulas-total'))
                            .data('aulas-pendentes', cardAula.data('aulas-pendentes'))
                            .data('conflito', aulaConflito)
                            .removeClass('horario-vazio')
                            .addClass('horario-preenchido')
                            .off('click')
                            .click(function() {
                                mostrarModalConfirmacaoRemocao(this);
                            });

                        // Atualiza a quantidade de aulas pendentes no card
                        const aulasPendentes = cardAula.data('aulas-pendentes') - 1;
                        cardAula.data('aulas-pendentes', aulasPendentes);
                        cardAula.find('.aulas-pendentes').text(aulasPendentes);

                        // Se zerou, remove o card
                        if (aulasPendentes <= 0) 
                        {
                            cardAula.remove();
                        }

                        atualizarContadorPendentes();
                        modalSelecionarAmbiente.hide();

                        // Mostra feedback de sucesso
                        $.toast({
                            heading: 'Sucesso',
                            text: 'A disciplina foi atribuída ao horário.',
                            showHideTransition: 'slide',
                            icon: 'success',
                            loaderBg: '#f96868',
                            position: 'top-center'
                        });
                    }                
                });                
            }
        });

        // Carrega as disciplinas pendentes no modal
        function carregarDisciplinasPendentes(id) 
        {
            id = id.split('_')[1]; // Extrai o ID do horário
            var dadosDoHorario = getHorarioById(id);

            $("#dia_da_aula").html(nome_dia[dadosDoHorario.dia_semana]);
            $("#hora_da_aula").html(dadosDoHorario.hora_inicio + ":" + dadosDoHorario.minuto_inicio);
            $("#modal_Turma").html($('#filtroTurma option:selected').text());

            $("#tabelaDisciplinasModal tbody").empty();

            // Verifica se há uma disciplina atribuída no horário selecionado
            if (horarioSelecionado && horarioSelecionado.data('disciplina')) {
                const row = `
                    <tr>
                        <td>${horarioSelecionado.data('disciplina')}</td>
                        <td>${horarioSelecionado.data('professor')}</td>
                        <td>1 aula</td>
                        <td><button class="btn btn-danger btn-sm btn-remover">Remover</button></td>
                    </tr>
                `;

                $("#tabelaDisciplinasModal tbody").append(row);

                // Evento para botão remover
                $("#tabelaDisciplinasModal .btn-remover").click(function() {
                    mostrarModalConfirmacaoRemocao(horarioSelecionado[0]);
                    modalAtribuirDisciplina.hide();
                });
            }

            $('.card[draggable="true"]').each(function() 
            {
                var theCard = $(this);

                var disciplinaRow = '' +
                    '<tr>' +
                        '<td>' + $(this).data("disciplina") + '</td>' +
                        '<td>' + $(this).data("professor") + '</td>' +
                        '<td>' + $(this).data("aulas-pendentes") + ' aulas</td>' +
                        '<td>' +
                            '<button type="button" class="btn btn-primary btn-sm botao_atribuir" id="botao_atribuir_' + $(this).data("aula-id") + '" >Atribuir</button>' +
                        '</td>' +
                    '</tr>';

                $("#tabelaDisciplinasModal tbody").append(disciplinaRow);

                // Adiciona evento de clique diretamente
                $("#botao_atribuir_" + $(this).data("aula-id")).on('click', function() 
                {
                    atribuirDisciplina($(this).attr('id').split('_')[2], id);
                });
            });
        }

        //Função para pesquisar o id de um horário pelo dia e horários
        function getIdByDiaHoraMinuto(vetor, dia, hora_inicio, minuto_inicio, hora_fim, minuto_fim) 
        {
            var id = 0;

            $.each(vetor, function(idx, obj) 
            {
                if (obj.dia_semana == dia && obj.hora_inicio == hora_inicio && obj.minuto_inicio == minuto_inicio && obj.hora_fim == hora_fim && obj.minuto_fim == minuto_fim) 
                {
                    id = obj.id;
                    return false; //simula o BREAK no .each do JQuery
                }
            });

            return id;
        }

        //Função para retornar os dados de um horário pelo id
        function getHorarioById(id) 
        {
            let theIdObj = null;

            $.each(horarios, function(idx, obj) 
            {
                if (obj.id == id) 
                {
                    theIdObj = obj;
                    return false; //simula o BREAK no .each do JQuery
                }
            });

            return theIdObj;
        }

        //Função para retornar os dados de uma aula pelo id
        function getAulaById(id) 
        {
            let theIdObj = null;

            $.each(aulas, function(idx, obj) 
            {
                if (obj.id == id) 
                {
                    theIdObj = obj;
                    return false; //simula o BREAK no .each do JQuery
                }
            });

            return theIdObj;
        }

        function getAmbienteNome(id)
        {
            var ambienteNome = "";

            $("#selectAmbiente option").each(function() 
            {
                if ($(this).val() == id) 
                {
                    ambienteNome = $(this).text();
                }
            });

            return ambienteNome;
        }

        $("#btn_atribuir_automaticamente").click(function() 
        {
            alert("Que pena, vc perdeu.");
        });

        //Progração do evento "change" dos select de cursos
        $('#filtroCurso').on('change', function() 
        {
            $(".loader-demo-box").css("visibility", "visible");

            //Limpar a tabela de horários inteira
            $("#tabela-horarios").empty();

            //Limpar card de aulas pendentes
            $('#aulasContainer').empty();

            atualizarContadorPendentes();

            $('#filtroTurma').find('option').remove().end().append('<option value="0">-</option>');
            $('#filtroTurma option[value="0"]').prop('selected', true);

            //Buscar turmas do curso selecionado.
            $.get('<?php echo base_url('sys/turma/getTurmasByCursoAndSemestre/'); ?>' + $('#filtroCurso').val() + '/<?php echo $semestre; ?>', function(data) 
            {
                $.each(data, function(idx, obj) 
                {
                    $('#filtroTurma').append('<option value="' + obj.id + '">' + obj.sigla + '</option>');
                });
            }, 'json')
            .done(function() 
            {
                $(".loader-demo-box").css("visibility", "hidden");
            });
        });

        //Progração do evento "change" dos select de turmas
        $('#filtroTurma').on('change', function() 
        {
            $(".loader-demo-box").css("visibility", "visible");

            $("#btn_atribuir_automaticamente").prop('disabled', true);

            //Limpar a tabela de horários inteira
            $("#tabela-horarios").empty();

            atualizarContadorPendentes();

            if ($('#filtroTurma').val() != 0) 
            {
                var quantasAulas = 0;

                //Buscar aulas da turma selecionada.
                $.get('<?php echo base_url('sys/aulas/getAulasFromTurma/'); ?>' + $('#filtroTurma').val(), function(data) 
                {
                    //Limpar todas as aulas pendentes.
                    $('#aulasContainer').empty();

                    //Verifica se a aula atual já está na lista, para a questão de mais de um professor.
                    $.each(data, function(idx, obj) 
                    {
                        var found = false;

                        //Vetor dentro do obj para casos de aulas com mais de um professor
                        obj.professores = [];

                        //Verifica se a aula atual já está na lista, para a questão de mais de um professor.
                        $("#aulasContainer").children().each(function() 
                        {
                            //Verifica o numero da aula através do id do card.
                            var aula = $(this).attr('id').split('_')[1];

                            if (aula == obj.id) 
                            {
                                found = true; //encontrado
                                //Adiciona o professor na aula já existente (visual do card)
                                $('#professor_aula_' + obj.id).append(' &nbsp; ' +
                                    '<i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>' +
                                    '<small class="text-secondary">' + obj.professor.split(" ")[0] + '</small>'
                                );

                                //Adiciona o professor na aula já existente (atributo data-professor)
                                $('#aula_' + obj.id).data('professor', $('#aula_' + obj.id).data('professor') + ',' + obj.professor.split(" ")[0]);

                                //Coloca o professor adicional no vetor da aula já existente
                                let objetoAlterar = getAulaById(obj.id);
                                objetoAlterar.professores.push(obj.professor.split(" ")[0]);
                            }
                        });

                        //Se não encontrou a aula atual, adiciona na lista.
                        if (!found) 
                        {
                            var cardAula = '' +
                                '<div id="aula_' + obj.id + '" draggable="true" data-aula-id="' + obj.id + '" data-disciplina="' + obj.disciplina + '" data-professor="' + obj.professor.split(" ")[0] + '" data-aulas-total="' + (obj.ch / 20) + '" data-aulas-pendentes="' + (obj.ch / 20) + '" class="card border-1 shadow-sm mx-4 my-1 bg-gradient" style="cursor: pointer;">' +
                                    '<div class="card-body p-0 d-flex flex-column justify-content-center align-items-center text-center">' +
                                        '<h6 class="text-primary">' +
                                        '<i class="mdi mdi-book-outline me-1"></i> ' + obj.disciplina +
                                        '</h6>' +
                                        '<div class="d-flex align-items-center mb-0 py-0" id="professor_aula_' + obj.id + '">' +
                                            '<i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>' +
                                            '<small class="text-secondary">' + obj.professor.split(" ")[0] + '</small>' +
                                        '</div>' +
                                        '<div class="d-flex align-items-center">' +
                                            '<i class="mdi mdi-door fs-6 text-muted me-1"></i>' +
                                            '<small class="text-secondary"><span class="aulas-pendentes">' + (obj.ch / 20) + '</span> aulas</small>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';

                            $('#aulasContainer').append(cardAula);

                            //Coloca o professor no vetor da aula
                            obj.professores.push(obj.professor.split(" ")[0]);

                            //adiciona a aula carregada no vetor de aulas
                            aulas.push(obj);

                            //faz o somatório de aulas da turma
                            quantasAulas += (obj.ch / 20);
                        }
                    });
                }, 'json')
                .done(function() 
                {
                    $("#aulasCounter").html(quantasAulas);
                    $("#btn_atribuir_automaticamente").prop('disabled', false);
                    configurarDragAndDrop();
                    $(".loader-demo-box").css("visibility", "hidden");
                });

                //Buscar horários da turma selecionada para montar a tabela de horários.
                $.get('<?php echo base_url('sys/tempoAula/getTemposFromTurma/'); ?>' + $('#filtroTurma').val(), function(data) 
                {
                    var dias = [];

                    var temManha = false;
                    var temTarde = false;
                    var temNoite = false;

                    $.each(data['tempos'], function(idx, obj) 
                    {
                        //Montar o array com os dias do horário da turma
                        if (dias.includes(obj.dia_semana) == false) 
                        {
                            dias.push(obj.dia_semana);
                        }

                        //Preencher o vetor de horários com todos os horarios lidos no getTemposFromTurma
                        let horario = {
                            id: obj.id,
                            dia_semana: obj.dia_semana,
                            hora_inicio: obj.hora_inicio,
                            minuto_inicio: obj.minuto_inicio,
                            hora_fim: obj.hora_fim,
                            minuto_fim: obj.minuto_fim
                        };
                        horarios.push(horario);

                        //Verifica se tem horário de manhã, tarde ou noite
                        if (obj.hora_inicio < 12)
                            temManha = true;
                        if (obj.hora_inicio >= 12 && obj.hora_inicio < 18)
                            temTarde = true;
                        if (obj.hora_inicio >= 18)
                            temNoite = true;
                    });

                    var htmlDaTableHead = '' +
                        '<tr>' +
                            '<th class="col-1">Horário</th>';

                            //Iterar pelos dias existentes no horário
                            $.each(dias, function(idx, obj) 
                            {
                                htmlDaTableHead += '<th class="col-1">' + nome_dia[obj] + '</th>';
                            });

                            htmlDaTableHead += '' +
                        '</tr>';

                    //Insere os horários na tabela se tiver aula pela manhã
                    if (temManha) 
                    {
                        var htmlDaTabela = '' +
                            '<thead>' +
                                '<tr>' +
                                    '<th colspan="' + (dias.length + 1) + '" class="text-center bg-primary text-white">MANHÃ</th>' +
                                '</tr>' +
                            '</thead>' +
                            htmlDaTableHead;

                        $('#tabela-horarios').append(htmlDaTabela);

                        $('#tabela-horarios').append('<tbody id="tabela-horarios-manha">');

                        //Vetor para guardar os horarios já adicionados na tabela
                        var horariosJaAdicionados = [];

                        $.each(horarios, function(idx, obj) 
                        {
                            //Verificar se já tem o horário na lista
                            var jaTemHorario = false;

                            $.each(horariosJaAdicionados, function(idx2, obj2) 
                            {
                                if (obj2.hora_inicio == obj.hora_inicio && obj2.minuto_inicio == obj.minuto_inicio && obj2.hora_fim == obj.hora_fim && obj2.minuto_fim == obj.minuto_fim) 
                                {
                                    jaTemHorario = true;
                                }
                            });

                            if (!jaTemHorario) 
                            {
                                if (obj.hora_inicio < 13) 
                                {
                                    var linhaDeHorarios = '' +
                                        '<tr>' +
                                            '<td class="coluna-fixa">' + obj.hora_inicio + ':' + obj.minuto_inicio + '-' + obj.hora_fim + ':' + obj.minuto_fim + '</td>';
                                            for (var i = 0; i < dias.length; i++) 
                                            {
                                                linhaDeHorarios += '<td class="horario-vazio" id="horario_' +
                                                    getIdByDiaHoraMinuto(horarios, dias[i], obj.hora_inicio, obj.minuto_inicio, obj.hora_fim, obj.minuto_fim) +
                                                    '"></td>';
                                            }
                                            linhaDeHorarios += '' +
                                        '</tr>'

                                    $('#tabela-horarios-manha').append(linhaDeHorarios);

                                    let gravaHorario = {
                                        hora_inicio: obj.hora_inicio,
                                        minuto_inicio: obj.minuto_inicio,
                                        hora_fim: obj.hora_fim,
                                        minuto_fim: obj.minuto_fim
                                    };
                                    horariosJaAdicionados.push(gravaHorario);

                                } //if hora < 13
                            }
                        });

                        $('#tabela-horarios').append('</tbody>');
                    }

                    //Insere os horários na tabela se tiver aula pela tarde
                    if (temTarde) 
                    {
                        var htmlDaTabela = '' +
                            '<thead>' +
                                '<tr>' +
                                    '<th colspan="' + (dias.length + 1) + '" class="text-center bg-primary text-white">TARDE</th>' +
                                '</tr>' +
                            '</thead>' +
                            htmlDaTableHead;

                        $('#tabela-horarios').append(htmlDaTabela);

                        $('#tabela-horarios').append('<tbody id="tabela-horarios-tarde">');

                        //Vetor para guardar os horarios já adicionados na tabela
                        var horariosJaAdicionados = [];

                        $.each(horarios, function(idx, obj) 
                        {
                            //Verificar se já tem o horário na lista
                            var jaTemHorario = false;

                            $.each(horariosJaAdicionados, function(idx2, obj2) 
                            {
                                if (obj2.hora_inicio == obj.hora_inicio && obj2.minuto_inicio == obj.minuto_inicio && obj2.hora_fim == obj.hora_fim && obj2.minuto_fim == obj.minuto_fim)
                                {
                                    jaTemHorario = true;
                                }
                            });

                            if (!jaTemHorario) 
                            {
                                if (obj.hora_inicio >= 13 && obj.hora_inicio < 18) 
                                {
                                    var linhaDeHorarios = '' +
                                        '<tr>' +
                                            '<td class="coluna-fixa">' + obj.hora_inicio + ':' + obj.minuto_inicio + '-' + obj.hora_fim + ':' + obj.minuto_fim + '</td>';
                                            for (var i = 0; i < dias.length; i++) 
                                            {
                                                linhaDeHorarios += '<td class="horario-vazio" id="horario_' +
                                                    getIdByDiaHoraMinuto(horarios, dias[i], obj.hora_inicio, obj.minuto_inicio, obj.hora_fim, obj.minuto_fim) +
                                                    '"></td>';
                                            }
                                            linhaDeHorarios += '' +
                                        '</tr>'

                                    $('#tabela-horarios-tarde').append(linhaDeHorarios);

                                    let gravaHorario = {
                                        hora_inicio: obj.hora_inicio,
                                        minuto_inicio: obj.minuto_inicio,
                                        hora_fim: obj.hora_fim,
                                        minuto_fim: obj.minuto_fim
                                    };
                                    horariosJaAdicionados.push(gravaHorario);

                                }
                            }
                        });

                        $('#tabela-horarios').append('</tbody>');

                    } //if tem tarde

                    //Insere os horários na tabela se tiver aula pela tarde
                    if (temNoite) 
                    {
                        var htmlDaTabela = '' +
                            '<thead>' +
                                '<tr>' +
                                    '<th colspan="' + (dias.length + 1) + '" class="text-center bg-primary text-white">NOITE</th>' +
                                '</tr>' +
                            '</thead>' +
                            htmlDaTableHead;

                        $('#tabela-horarios').append(htmlDaTabela);

                        $('#tabela-horarios').append('<tbody id="tabela-horarios-noite">');

                        //Vetor para guardar os horarios já adicionados na tabela
                        var horariosJaAdicionados = [];

                        $.each(horarios, function(idx, obj) 
                        {
                            //Verificar se já tem o horário na lista
                            var jaTemHorario = false;

                            $.each(horariosJaAdicionados, function(idx2, obj2) 
                            {
                                if (obj2.hora_inicio == obj.hora_inicio && obj2.minuto_inicio == obj.minuto_inicio && obj2.hora_fim == obj.hora_fim && obj2.minuto_fim == obj.minuto_fim) 
                                {
                                    jaTemHorario = true;
                                }
                            });

                            if (!jaTemHorario)
                            {
                                if (obj.hora_inicio >= 18) {
                                    var linhaDeHorarios = '' +
                                        '<tr>' +
                                            '<td class="coluna-fixa">' + obj.hora_inicio + ':' + obj.minuto_inicio + '-' + obj.hora_fim + ':' + obj.minuto_fim + '</td>';
                                            for (var i = 0; i < dias.length; i++) 
                                            {
                                                linhaDeHorarios += '<td class="horario-vazio" id="horario_' +
                                                    getIdByDiaHoraMinuto(horarios, dias[i], obj.hora_inicio, obj.minuto_inicio, obj.hora_fim, obj.minuto_fim) +
                                                    '"></td>';
                                            }
                                            linhaDeHorarios += '' +
                                        '</tr>'

                                    $('#tabela-horarios-noite').append(linhaDeHorarios);

                                    let gravaHorario = {
                                        hora_inicio: obj.hora_inicio,
                                        minuto_inicio: obj.minuto_inicio,
                                        hora_fim: obj.hora_fim,
                                        minuto_fim: obj.minuto_fim
                                    };
                                    horariosJaAdicionados.push(gravaHorario);

                                } //if hora > 18
                            }
                        });

                        $('#tabela-horarios').append('</tbody>');

                    } // if tem noite

                    // Configura eventos após criar a tabela
                    configurarDragAndDrop();

                    $(".horario-vazio").click(function() 
                    {
                        horarioSelecionado = $(this);
                        carregarDisciplinasPendentes($(this).attr('id'));
                        modalAtribuirDisciplina.show();
                    });

                    var counter = 0;

                    $.each(data['aulas'], async function(idx, obj)
                    {
                        counter++;

                        setTimeout(function() 
                        {                            
                            const aulaSelecionadaId = obj.aula_id;
                            const aula = getAulaById(obj.aula_id);

                            const ambienteSelecionadoId = obj.ambiente_id;
                            const ambienteSelecionadoNome = getAmbienteNome(ambienteSelecionadoId);

                            horarioSelecionado = $(`#horario_${obj.tempo_de_aula_id}`);
                            cardAula = $(`#aula_${obj.aula_id}`);

                            var conflitoStyle = "text-primary";
                            var conflitoIcon = "fa-mortar-board";

                            if(obj.choque > 0)
                            {
                                conflitoStyle = "text-warning";
                                conflitoIcon = "fa-warning";
                            }

                            // Preenche o horário selecionado
                            horarioSelecionado.html(`
                                <div class="card border-1 shadow-sm bg-gradient" style="cursor: pointer; height: 100%;">
                                    <div class="card-body p-1 d-flex flex-column justify-content-center align-items-center text-center">
                                        <h6 class="text-wrap mb-0 fs-6 ${conflitoStyle}" style="font-size: 0.75rem !important;">
                                            <i class="fa ${conflitoIcon} me-1"></i>
                                            ${aula.disciplina}
                                        </h6>
                                        <div class="d-flex align-items-center mb-0 py-0">
                                            <i class="mdi mdi-account-tie fs-6 text-muted me-1"></i>
                                            <small class="text-wrap text-secondary" style="font-size: 0.65rem !important;">${aula.professores.join(", ")}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-door fs-6 text-muted me-1"></i>
                                            <small class="text-wrap text-secondary" style="font-size: 0.65rem !important;">${ambienteSelecionadoNome}</small>
                                        </div>
                                    </div>
                                </div>
                            `);

                            // Adiciona os dados ao horário
                            horarioSelecionado
                                .data('disciplina', aula.disciplina)
                                .data('professor', aula.professores.join(", "))
                                .data('ambiente', ambienteSelecionadoId)
                                .data('ambienteNome', ambienteSelecionadoNome)
                                .data('aula-id', obj.aula_id)
                                .data('aulas-total', cardAula.data('aulas-total'))
                                .data('aulas-pendentes', cardAula.data('aulas-pendentes'))
                                .data('conflito', obj.choque)
                                .removeClass('horario-vazio')
                                .addClass('horario-preenchido')
                                .off('click')
                                .click(function() {
                                    mostrarModalConfirmacaoRemocao(this);
                                });

                            // Atualiza a quantidade de aulas pendentes no card
                            const aulasPendentes = cardAula.data('aulas-pendentes') - 1;
                            cardAula.data('aulas-pendentes', aulasPendentes);
                            cardAula.find('.aulas-pendentes').text(aulasPendentes);

                            // Se zerou, remove o card
                            if (aulasPendentes <= 0) 
                            {
                                cardAula.remove();
                            }

                            atualizarContadorPendentes();

                        }, 100 * counter); // Atraso de 100ms para cada iteração
                    });

                }, 'json');
            } 
            else // nenhuma turma selecionada
            {
                //Limpar a tabela de horários inteira
                $("#tabela-horarios").empty();

                //Limpar card de aulas pendentes
                $('#aulasContainer').empty();

                //Esconder o div do loader
                $(".loader-demo-box").css("visibility", "hidden");
            }
        });
    });
</script>