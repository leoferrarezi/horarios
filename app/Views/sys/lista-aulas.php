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
                            <select class="form-select filtro" id="filtroCurso">
                                <option value="">-</option>
                                <?php foreach ($cursos as $curso): ?>
                                    <option value="<?php echo esc($curso['nome']) ?>"><?php echo esc($curso['nome']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="curso">Turma:</label>
                            <select class="form-select filtro" id="filtroTurma">
                                <option value="">-</option>
                                <?php foreach ($turmas as $turma): ?>
                                    <option value="<?php echo esc($turma['sigla']) ?>"><?php echo esc($turma['sigla']) ?></option>
                                <?php endforeach; ?>
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
                    <table class="table mb-4" id="listagem-aulas">
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
                            <?php if (!empty($consulta)): ?>
                                <?php foreach ($consulta as $aula): ?>
                                    <tr>
                                        <td><?php echo esc($aula['curso_nome']); ?></td>
                                        <td><?php echo esc($aula['turma_sigla']); ?></td>
                                        <td><?php echo esc($aula['disciplina_nome']); ?></td>
                                        <td><?php echo str_replace(",", "<br />", esc($aula['professores_nome'])); ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <span data-bs-toggle="tooltip" data-placement="top" title="Atualizar dados da aula">
                                                    <button
                                                        type="button"
                                                        class="justify-content-center align-items-center d-flex btn btn-inverse-success button-trans-success btn-icon me-1"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-edit-aula"
                                                        data-id="<?php echo esc($aula['id']); ?>"
                                                        data-curso="<?php echo esc($aula['curso_nome']); ?>"
                                                        data-curso_id="<?php echo esc($aula['curso_id']); ?>"
                                                        data-turma="<?php echo esc($aula['turma_sigla']); ?>"
                                                        data-turma_id="<?php echo esc($aula['turma_id']); ?>"
                                                        data-disciplina="<?php echo esc($aula['disciplina_nome']); ?>"
                                                        data-disciplina_id="<?php echo esc($aula['disciplina_id']); ?>"
                                                        data-profs="<?php echo esc($aula['professores_nome']); ?>"
                                                        data-profs_id="<?php echo esc($aula['professores_id']); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </span>

                                                <span data-bs-toggle="tooltip" data-placement="top" title="Excluir aula">
                                                    <button
                                                        type="button"
                                                        class="justify-content-center align-items-center d-flex btn btn-inverse-danger button-trans-danger btn-icon me-1"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-deletar-aula"
                                                        data-id="<?php echo esc($aula['id']); ?>"
                                                        data-curso="<?php echo esc($aula['curso_nome']); ?>"
                                                        data-turma="<?php echo esc($aula['turma_sigla']); ?>"
                                                        data-disciplina="<?php echo esc($aula['disciplina_nome']); ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4">Nenhuma aula cadastrada.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mt-4">
        <p class="card-description text-end"><i class="fa fa-edit text-success me-2"></i>Editar &nbsp; &nbsp; &nbsp; &nbsp;
            <i class="fa fa-trash text-danger me-2"></i>Excluir
        </p>
    </div>
</div>

<!-- daqui pra baixo é javascript -->
<script>
    //Para carregar a tradução dos itens da DataTable
    const dataTableLangUrl = "<?php echo base_url('assets/js/traducao-dataTable/pt_br.json'); ?>";

    //essa linha abaixo é para detectar que o documento foi completamente carregado e executar o código após isso
    $(document).ready(function() {
        <?php if (!empty($aula)): ?>

            var table = $("#listagem-aulas").DataTable({

                aLengthMenu: [
                    [-1, 5, 15, 30],
                    ["Todos", 5, 15, 30],
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
                columns: [null, null, null, null, null]
            });

            $('#modal-edit-aula').on('show.bs.modal', function(event) {
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
            $('#modal-deletar-aula').on('show.bs.modal', function(event) {

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

            $('.filtro').on('change', function() {
                table.columns(0).search($("#filtroCurso").val());
                table.columns(1).search($("#filtroTurma").val());
                table.draw();
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
    });
</script>