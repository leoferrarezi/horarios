<script>
    //inicialização precoce pra poder controlar via modal
    var table;
</script>

<!-- incluir os componentes modais antes do restante do documento -->
<?php echo view('components/aulas/modal-cad-aula'); ?>
<?php echo view('components/aulas/modal-edit-aula'); ?>
<?php echo view('components/aulas/modal-deletar-aula') ?>

<div class="page-header">
    <h3 class="page-title">GERENCIAR AULAS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista Aulas</li>
        </ol>
    </nav>
</div>

<!-- mostrar ALERT em caso de erro -->
<?php if (session()->has('erros')): ?>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session('erros') as $erro): ?>
                                <li> <i class="mdi mdi-alert-circle"></i><?= esc($erro) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- ações e filtros -->
<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ações</h4>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#modal-cad-aula">
                            <i class="fa fa-plus-circle btn-icon-prepend"></i> Incluir Aula
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Filtros</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="curso">Curso:</label>
                            <select class="js-example-basic-single" style="width:100%;" id="filtroCurso">
                                <option value=""></option>
                                <?php foreach ($cursos as $curso): ?>
                                    <option value="<?php echo esc($curso['id']) ?>"><?php echo esc($curso['nome']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="curso">Turma:</label>
                            <select class="js-example-basic-single filtro" style="width:100%;" id="filtroTurma">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- início da tabela -->
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-4" id="listagem-aulas" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Turma</th>
                                <th>Disciplina</th>
                                <th>Professor(es)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- preenchido por ajax -->
                        </tbody>
                    </table>
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
    $(document).ready(function() 
    {
        $('.js-example-basic-single').select2(
        {
            placeholder: "Selecione uma opção:",
            allowClear: true,
            width: '100%'
        });

        $("#turmas").on("invalid", function() 
        {
            if (this.validity.valueMissing) 
            {
                this.setCustomValidity("Selecione ao menos uma turma!");
            }
        });

        $("#professores, #professoresEdit").on("invalid", function() 
        {
            if (this.validity.valueMissing) 
            {
                this.setCustomValidity("Selecione ao menos um professor!");
            }
        });

        $("#turmas, #professores, #professoresEdit").on("change", function() 
        {
            this.setCustomValidity("");
        });

        <?php //if (!empty($aula)): ?>

            table = $("#listagem-aulas").DataTable(
            {
                ajax:{
                    url:"<?php echo base_url('sys/aulas/getTableByAjax'); ?>",
                    dataSrc:""
                },                
                aLengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "Todos"],
                ],
                language: {
                    search: "Pesquisar:",
                    url: dataTableLangUrl,
                },
                ordering: true,
                order: [
                    [0, 'asc'],
                    [1, 'asc']
                ],
                columns: [
                    { data: 'curso_nome' },
                    { data: 'turma_sigla' },
                    { data: 'disciplina_nome' },
                    { data: 'professores_nome' },
                    { data: null }
                ],
                columnDefs: [
                    {
                        targets: 4,
                        data: null,
                        className: 'dt-left',
                        render: function (data, type, row, meta) {
                            return `
                                <div class="d-flex">
                                    <span data-bs-toggle="tooltip" data-placement="top" title="Atualizar dados da aula">
                                        <button
                                            type="button"
                                            class="justify-content-center align-items-center d-flex btn btn-inverse-success button-trans-success btn-icon me-1"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-aula"
                                            data-id="${data.id}"
                                            data-curso="${data.curso_nome}"
                                            data-curso_id="${data.curso_id}"
                                            data-turma="${data.turma_sigla}"
                                            data-turma_id="${data.turma_id}"
                                            data-disciplina="${data.disciplina_nome}"
                                            data-disciplina_id="${data.disciplina_id}"
                                            data-profs="${data.professores_nome}"
                                            data-profs_id="${data.professores_id}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </span>
                                    <span data-bs-toggle="tooltip" data-placement="top" title="Excluir aula">
                                        <button
                                            type="button"
                                            class="justify-content-center align-items-center d-flex btn btn-inverse-danger button-trans-danger btn-icon me-1"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal-deletar-aula"
                                            data-id="${data.id}"
                                            data-curso="${data.curso_nome}"
                                            data-turma="${data.turma_sigla}"
                                            data-disciplina="${data.disciplina_nome}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </span>
                                </div>
                            `;
                        }
                    }
                ]
            });

            $('#modal-edit-aula').on('show.bs.modal', function(event) 
            {
                var button = $(event.relatedTarget);

                var id = button.data('id');
                var curso = button.data('curso');
                var curso_id = button.data('curso_id');
                var disciplina = button.data('disciplina');
                var disciplina_id = button.data('disciplina_id');
                var turma = button.data('turma');
                var turma_id = button.data('turma_id');
                var profs_id = button.data('profs_id') + "";
                var prof = (profs_id.indexOf(",") > -1) ? profs_id.split(',') : profs_id;

                var modal = $(this);
                modal.find('#edit-id').val(id);
                modal.find('#cursoEdit').val(curso_id).change();
                modal.find('#turmaEdit').val(turma_id).change();
                modal.find('#disciplinaEdit').val(disciplina_id).change();
                modal.find('.select2-professoresEdit').val(prof).change();
            });

            //Mesma abordagem do código acima, para o modal de excluir professor
            $('#modal-deletar-aula').on('show.bs.modal', function(event) 
            {
                var button = $(event.relatedTarget);

                var id = button.data('id');
                var curso = button.data('curso');
                var turma = button.data('turma');
                var disciplina = button.data('disciplina');

                var modal = $(this);
                modal.find('#deletar-id').val(id);
                modal.find('#deletar-curso').text(curso);
                modal.find('#deletar-turma').text(turma);
                modal.find('#deletar-disciplina').text(disciplina);
            });

            //Ativa os tooltips dos botões
            $('[data-bs-toggle="tooltip"]').tooltip();

            //Seleciona opção do filtro para a tabela
            $('#filtroCurso').on('change', function() 
            {
                $('#filtroTurma').find('option').remove().end().append('<option value="0">-</option>');
                $('#filtroTurma option[value="0"]').prop('selected', true);

                //Buscar turmas do curso selecionado.
                if($('#filtroCurso').val() > 0)
                {
                    $.get('<?php echo base_url('sys/turma/getTurmasByCurso/'); ?>' + $('#filtroCurso').val(), function(data) 
                    {
                        $.each(data, function(idx, obj) 
                        {
                            $('#filtroTurma').append('<option value="' + obj.id + '">' + obj.sigla + '</option>');
                        });
                    }, 'json')
                }

                table.columns(0).search($('#filtroCurso option:selected').text());                
                table.draw();
            });

            $('#filtroTurma').on('change', function()
            {
                table.columns(1).search($('#filtroTurma option:selected').text());
                table.draw();
            });

        <?php //endif; ?>

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