<!-- incluir os componentes modais antes do restante do documento -->
<?php echo view('components/turmas/modal-edit-turma'); ?>
<?php echo view('components/turmas/modal-cad-turma'); ?>
<?php echo view('components/turmas/modal-deletar-turma') ?>
<?php echo view('components/turmas/modal-import-turma') ?>

<div class="page-header">
    <h3 class="page-title">GERENCIAR TURMAS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista Turmas</li>
        </ol>
    </nav>
</div>

<!-- ações e filtros -->
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ações</h4>
                <div class="row">
                    <div class="col-12 mb-4">
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#modal-cad-turmas"><i class="fa fa-plus-circle btn-icon-prepend"></i> Incluir Turma</button>
                        <button class="btn btn-info btn-icon-text" data-bs-toggle="modal"
                            data-bs-target="#modal-import-turmas"><i class="fa fa-upload btn-icon-prepend"></i> Importar Turmas do SUAP</button>
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
                            <label for="curso">Curso:</label>
                            <select class="js-example-basic-single filtro" style="width:100%;" id="filtroCurso">
                                <option value=""></option>
                                <?php foreach ($cursos as $curso): ?>
                                    <option value="<?php echo esc($curso['nome']) ?>"><?php echo esc($curso['nome']) ?></option>
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
                            <table class="table mb-4" id="listagem-turmas">

                                <!-- cabeçalho da tabela -->
                                <thead>
                                    <tr>
                                        <th>Curso</th>
                                        <th>Sigla</th>
                                        <th>Semest</th>
                                        <th>Per./Turma</th>
                                        <th>Aulas/Dia</th>
                                        <th>Horário</th>
                                        <th>Horário Pref</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>

                                <!-- corpo da tabela -->

                                <tbody>

                                    <?php if (!empty($turmas)): //verifica se a tabela tem dados 
                                    ?>
                                        <?php foreach ($turmas as $t): //loop para percorrer todos os professores retornados do bd 
                                        ?>
                                            <tr>
                                                <td><?php echo esc($t['curso']); ?></td>
                                                <td><?php echo esc($t['sigla']); ?></td>
                                                <td><?php echo esc($t['semestre']); ?></td>
                                                <td><?php echo esc($t['periodo']); ?>º</td>
                                                <td><?php echo esc($t['tempos_diarios']); ?></td>
                                                <td><?php echo esc($t['horario']); ?></td>
                                                <td><?php echo esc($t['horario_preferencial']); ?></td>

                                                <!-- essa celula monta os botões de ação que acionam modais -->

                                                <td>
                                                    <div class="d-flex">
                                                        <!-- o elemento <span> é apenas para mostrar o tooltip -->
                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Atualizar dados da Turma">
                                                            <!-- botão com estilo, ativação do modal, e dados formados para transmitir ao modal -->
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-success button-trans-success btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-edit-turmas"
                                                                data-id="<?php echo esc($t['id']); ?>"
                                                                data-sigla="<?php echo esc($t['sigla']); ?>"
                                                                data-semestre="<?php echo esc($t['semestre']); ?>"
                                                                data-periodo="<?php echo esc($t['periodo']); ?>"
                                                                data-curso_id="<?php echo esc($t['curso_id']); ?>"
                                                                data-tempos_diarios="<?php echo esc($t['tempos_diarios']); ?>"
                                                                data-horario_id="<?php echo esc($t['horario_id']); ?>"
                                                                data-horario_preferencial_id="<?php echo esc($t['horario_preferencial_id']); ?>">

                                                                <!-- icone do botão -->
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </span>

                                                        <!-- abaixo são repetidos os códigos acima para replicar os outros 2 botões -->

                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Excluir Turma">
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-danger button-trans-danger btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-deletar-turmas"
                                                                data-id="<?php echo esc($t['id']); ?>"
                                                                data-nome="<?php echo esc($t['sigla']); ?>">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <!-- caso não haja curso cadastrado -->
                                        <tr>
                                            <td colspan="10">Nenhuma turma cadastrada.</td>
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
        $("#sigla, #edit-sigla").on("invalid", function() {
            this.setCustomValidity("Preencha a sigla da turma!");
        });

        $("#periodo, #edit-periodo").on("invalid", function() {
            if (this.validity.valueMissing) {
                this.setCustomValidity("Preencha o período da turma!");
            } else if (this.validity.rangeUnderflow) {
                this.setCustomValidity(`O período deve ser a partir de ${this.min}.`);
            } else if (this.validity.rangeOverflow) {
                this.setCustomValidity(`O período deve ser no máximo ${this.max}.`);
            } else {
                this.setCustomValidity("Valor inválido.");
            }
        });

        $("#periodo, #edit-periodo").on("input", function() {
            if (this.validity.valueMissing) {
                this.setCustomValidity("Preencha o período da turma!");
            } else if (this.validity.rangeUnderflow) {
                this.setCustomValidity(`O período deve ser a partir de ${this.min}.`);
            } else if (this.validity.rangeOverflow) {
                this.setCustomValidity(`O período deve ser no máximo ${this.max}.`);
            } else if (this.validity.stepMismatch) {
                this.setCustomValidity("Valor inválido.");
            } else {
                this.setCustomValidity("");
            }
        });

        $("#inlineRadio1, #inlineRadio2").on("invalid", function() {
            this.setCustomValidity("Selecione o semestre da turma!");
        });

        $("#inlineRadio1, #inlineRadio2").on("change", function() {
            $("#inlineRadio1, #inlineRadio2").each(function() {
                this.setCustomValidity("");
            });
        });

        $("#curso_id, #edit-curso_id").on("invalid", function() {
            this.setCustomValidity("Preencha o curso da turma!");
        });

        $("#curso_id, #edit-curso_id").on("change", function() {
            this.setCustomValidity("");
        });

        $("#tempos_diarios, #edit-tempos_diarios").on("invalid", function() {
            if (this.validity.valueMissing) {
                this.setCustomValidity("Preencha os tempos de aulas diários!");
            } else if (this.validity.rangeUnderflow) {
                this.setCustomValidity(`Os tempos de aulas diários devem ser a partir de ${this.min}.`);
            } else if (this.validity.rangeOverflow) {
                this.setCustomValidity(`Os tempos de aulas diários devem ser no máximo ${this.max}.`);
            } else {
                this.setCustomValidity("Valor inválido.");
            }
        });

        $("#tempos_diarios, #edit-tempos_diarios").on("input", function() {
            if (this.validity.valueMissing) {
                this.setCustomValidity("Preencha os tempos de aulas diários!");
            } else if (this.validity.rangeUnderflow) {
                this.setCustomValidity(`Os tempos de aulas diários devem ser a partir de ${this.min}.`);
            } else if (this.validity.rangeOverflow) {
                this.setCustomValidity(`Os tempos de aulas diários devem ser no máximo ${this.max}.`);
            } else if (this.validity.stepMismatch) {
                this.setCustomValidity("Valor inválido.");
            } else {
                this.setCustomValidity("");
            }
        });

        <?php if (!empty($turmas)): ?>

            //Cria a DataTable
            var table = $("#listagem-turmas").DataTable({

                //Define as entradas de quantidade de linhas visíveis na tabela
                aLengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Todos"],
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
                    [1, 'asc']
                ],
                //Desativa a ordenação por ações
                columns: [null, null, null, null, null, null, null, {
                    orderable: false
                }]
            });

            //programação do modal de Edição do curso
            //mais especificamente preenche os campos com os dados atuais
            //que vêm lá do código HTML do botão de editar
            $('#modal-edit-turmas').on('show.bs.modal', function(event) {
                // Obter o DOM do botão que ativou o modal
                var button = $(event.relatedTarget);

                // Extrair as informações dos atributos data-* 
                var id = button.data('id');
                var sigla = button.data('sigla');
                var semestre = button.data('semestre');
                var periodo = button.data('periodo');
                var cursoId = button.data('curso_id');
                var temposDiarios = button.data('tempos_diarios');
                var horarioId = button.data('horario_id');
                var horarioPreferencialId = button.data('horario_preferencial_id');


                // Formar o modal com os dados preenchidos
                var modal = $(this);
                modal.find('#edit-id').val(id);
                modal.find('#edit-id').val(id); // Preenche o campo com o id
                modal.find('#edit-sigla').val(sigla); // Preenche o campo com a sigla
                modal.find('#edit-periodo').val(periodo); // Preenche o campo com o periodo
                modal.find('input[name="semestre"][value="' + semestre + '"]').prop('checked', true);
                modal.find('#edit-curso_id').val(cursoId); // Preenche o campo com o curso_id
                modal.find('#edit-tempos_diarios').val(temposDiarios); // Preenche o campo com tempos_diarios
                modal.find('#edit-horario_id').val(horarioId); // Preenche o campo com o horario_id
                modal.find('#edit-horario_preferencial_id').val(horarioPreferencialId); // Preenche o campo com horario_preferencial_id

            });

            //Mesma abordagem do código acima, para o modal de excluir professor
            $('#modal-deletar-turmas').on('show.bs.modal', function(event) {
                // Button that triggered the modal
                var button = $(event.relatedTarget);

                // Extract info from data-* attributes
                var id = button.data('id');
                var nome = button.data('nome');

                var modal = $(this);
                modal.find('#deletar-id').val(id);
                modal.find('#deletar-nome').text(nome);
            });

            $('.filtro').on('change', function() {
                table.columns(0).search($("#filtroCurso").val());
                table.draw();
            });

            //Ativa os tooltips dos botões
            $('[data-bs-toggle="tooltip"]').tooltip();

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
        // Inicializar somente modal
        $('#modal-cad-turmas .js-example-basic-single').select2({
            placeholder: "Selecione uma opção:",
            allowClear: true,
            width: '100%',
            dropdownParent: $('#modal-cad-turmas')
        });

        // Para os outros .js-example-basic-single que estão na página principal:
        $('.js-example-basic-single').not('#modal-cad-turmas .js-example-basic-single').select2({
            placeholder: "Selecione uma opção:",
            allowClear: true,
            width: '100%'
        });
    });
</script>