<!-- incluir os componentes modais antes do restante do documento -->
<?php echo view('components/temposAulas/modal-edit-tempoAula'); ?>
<?php echo view('components/temposAulas/modal-cad-tempoAula'); ?>
<?php echo view('components/temposAulas/modal-deletar'); ?>

<div class="page-header">
    <h3 class="page-title">GERENCIAR TEMPOS DE AULA</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tempos de Aula</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ações</h4>
                <div class="row">
                    <div class="col-12 mb-4">
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#modal-cad-tempoAula"><i class="fa fa-plus-circle btn-icon-prepend"></i> Incluir Tempo de Aula</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Filtros</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="filtroHorario">Grade de Horário:</label>
                            <select class="js-example-basic-single" name="grade" style="width:100%;" id="filtroHorario">
                                <option value=""></option>
                                <?php foreach ($horarios as $horario): ?>
                                    <option value="<?php echo esc($horario['nome']) ?>"><?php echo esc($horario['nome']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mb-4" id="listagem-tempoAula">
                                <thead>
                                    <tr>
                                        <th>Grade de Horário</th>
                                        <th>Dia da semana</th>
                                        <th>Início</th>
                                        <th>Fim</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($temposAulas)): // Verifica se há dados 
                                    ?>
                                        <?php foreach ($temposAulas as $ta): // Loop para percorrer os dados 
                                        ?>
                                            <tr>
                                                <td><?php echo esc($ta['nome_horario']); ?></td>
                                                <td><?php
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
                                                    echo esc($diasSemana[$ta['dia_semana']]); ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    // Formata hora e minuto de início para HH:mm
                                                    echo sprintf('%02d:%02d', esc($ta['hora_inicio']), esc($ta['minuto_inicio']));
                                                    ?>
                                                </td>

                                                <td>
                                                    <?php
                                                    // Formata hora e minuto de fim para HH:mm
                                                    echo sprintf('%02d:%02d', esc($ta['hora_fim']), esc($ta['minuto_fim']));
                                                    ?>
                                                </td>
                                                <td> <!-- Aqui é a célula para as Ações (botões de editar e excluir) -->
                                                    <div class="d-flex">
                                                        <!-- Botão para editar -->
                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Atualizar dados dO Tempo de Aula">
                                                            <button type="button" class="justify-content-center align-items-center d-flex btn btn-inverse-success button-trans-success btn-icon me-1"
                                                                data-bs-toggle="modal" data-bs-target="#modal-edit-tempoAula"
                                                                data-id="<?php echo esc($ta['id']); ?>"
                                                                data-diasemana="<?php echo esc($ta['dia_semana']); ?>"
                                                                data-horario="<?php echo esc($ta['horario_id']); ?>"
                                                                data-hora-inicio="<?php echo esc($ta['hora_inicio']); ?>"
                                                                data-minuto-inicio="<?php echo esc($ta['minuto_inicio']); ?>"
                                                                data-hora-fim="<?php echo esc($ta['hora_fim']); ?>"
                                                                data-minuto-fim="<?php echo esc($ta['minuto_fim']); ?>">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </span>
                                                        <!-- Botão para excluir -->
                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Excluir Tempo de Aula">
                                                            <button type="button" class="justify-content-center align-items-center d-flex btn btn-inverse-danger button-trans-danger btn-icon me-1"
                                                                data-bs-toggle="modal" data-bs-target="#modal-deletar-tempoAula"
                                                                data-id="<?php echo esc($ta['id']); ?>"
                                                                data-nome="<?php echo esc($ta['nome_horario']); ?>">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </td> <!-- Fim da célula de Ações -->
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <!-- Caso não haja registros -->
                                        <tr>
                                            <td colspan="6">Nenhum Tempo de Aula cadastrado.</td> <!-- A célula de Ações também conta como 1 -->
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 mt-4 d-flex justify-content-end">Legenda</div>
            <div class="col-12 mt-4 d-flex justify-content-end gap-3">
                <p class="card-description text-end"><i class="fa fa-edit text-success me-2"></i>Editar &nbsp; &nbsp; </p>
                <p class="card-description text-end"><i class="fa fa-trash text-danger me-2"></i>Excluir</p>
            </div>
        </div>
    </div>
</div>

<!-- daqui pra baixo é javascript -->
<script>
    //Para carregar a tradução dos itens da DataTable
    const dataTableLangUrl = "<?php echo base_url('assets/js/traducao-dataTable/pt_br.json'); ?>";

    //essa linha abaixo é para detectar que o documento foi completamente carregado e executar o código após isso
    $(document).ready(function() {

        $("#horario_id, #edit-horario_id").on("invalid", function() {
            this.setCustomValidity("Preencha o horário!")
        });
        $("#horario_id, #edit-horario_id").on("change", function() {
            this.setCustomValidity("")
        });

        $("#tempo_inicio, #edit-tempo_inicio").on("invalid", function() {
            this.setCustomValidity("Preencha a hora e minuto de início!")
        });

        $("#tempo_fim, #edit-tempo_fim").on("invalid", function() {
            this.setCustomValidity("Preencha a hora e minuto de fim!")
        });

        $("#tempo_inicio, #edit-tempo_inicio, #tempo_fim, #edit-tempo_fim").on("change", function() {
            this.setCustomValidity("");
        });



        //Verificar se tem curso para então "transformar" a tabela em DataTable
        <?php if (!empty($temposAulas)): ?>

            //Cria a DataTable
            var table = $("#listagem-tempoAula").DataTable({

                //Define as entradas de quantidade de linhas visíveis na tabela
                aLengthMenu: [
                    [-1, 10, 25, 50],
                    ["Todos", 10, 25, 50],
                ],

                //Define as questões de tradução/idioma
                language: {
                    search: "Pesquisar:",
                    url: dataTableLangUrl,
                },

                //Ativa ordenação
                ordering: true,
                //Diz que a coluna 1 (segunda/nome) deve ser o padrão de ordenação ao carregar a tabela
                order: [
                    [2, 'asc']
                ],
                //Desativa a ordenação por ações
                columns: [null, null, null, null, {
                    orderable: false
                }]
            });


            $('#modal-edit-tempoAula').on('show.bs.modal', function(event) {
                // Obter o DOM do botão que ativou o modal
                var button = $(event.relatedTarget);

                var id = button.data('id');
                var diaSemana = button.data('diasemana');
                var horario = button.data('horario');
                var horaInicio = button.data('hora-inicio'); // Hora de início
                var minutoInicio = button.data('minuto-inicio'); // Minuto de início
                var horaFim = button.data('hora-fim'); // Hora de fim
                var minutoFim = button.data('minuto-fim'); // Minuto de fim

                // Formar o modal com os dados preenchidos
                var modal = $(this);
                modal.find('#edit-id').val(id);
                modal.find('#edit-horario_id').val(horario);
                modal.find('#edit-dia_semana').val(diaSemana);
                // Formatar hora e minuto de início para o formato HH:MM
                var tempoInicio = ('00' + horaInicio).slice(-2) + ':' + ('00' + minutoInicio).slice(-2);
                modal.find('#edit-tempo_inicio').val(tempoInicio);

                // Se quiser preencher também o campo de horário de fim, basta seguir a mesma lógica
                var tempoFim = ('00' + horaFim).slice(-2) + ':' + ('00' + minutoFim).slice(-2);
                modal.find('#edit-tempo_fim').val(tempoFim);

            });

            $('#modal-deletar-tempoAula').on('show.bs.modal', function(event) {
                // Button that triggered the modal
                var button = $(event.relatedTarget);

                // Extract info from data-* attributes
                var nome = button.data('nome');
                var id = button.data('id');

                var modal = $(this);
                modal.find('#deletar-id').val(id);
                modal.find('#deletar-nome').text(nome);
            });

            //Ativa os tooltips dos botões
            $('[data-bs-toggle="tooltip"]').tooltip();

            //Seleciona opção do filtro para a tabela
            $('#filtroHorario').on('change', function() {
                var filtroSelecionado = $(this).val();
                table.columns(0).search(filtroSelecionado).draw();
            });

        <?php endif; ?>

        // Exibe mensagem de sucesso se o flashdata estiver com 'sucesso'
        <?php if (session()->getFlashdata('sucesso')): ?>
            $.toast({
                heading: 'Sucesso',
                text: '<?php echo session()->getFlashdata('sucesso'); ?>',
                showHideTransition: 'slide',
                icon: 'success',
                loaderBg: '#f96868',
                position: 'top-center'
            });
        <?php endif; ?>

        // Exibe mensagem de erro se o flashdata estiver com 'erro'
        <?php if (session()->has('erros')): ?>
            <?php foreach (session('erros') as $erro): ?>
                $.toast({
                    heading: 'Erro',
                    text: '<?= esc($erro); ?>',
                    showHideTransition: 'fade',
                    icon: 'error',
                    loaderBg: '#dc3545',
                    position: 'top-center'
                });
            <?php endforeach; ?>
        <?php endif; ?>
    });
</script>

<!-- Exibe mensagem de Exceção -->
<?php if (session()->getFlashdata('erro')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $.toast({
                heading: 'Erro',
                text: "<?= esc(session()->getFlashdata('erro'), 'js'); ?>",
                showHideTransition: 'fade',
                icon: 'error',
                loaderBg: '#dc3545',
                position: 'top-center',
                hideAfter: false
            });
        });
    </script>
<?php endif; ?>

<!--Referente ao select 2-->
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            placeholder: "Selecione uma opção:",
            allowClear: true,
            width: '100%'
        });
    });
</script>