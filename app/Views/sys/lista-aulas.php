<!-- incluir os componentes modais antes do restante do documento -->
<?php echo view('components/aulas/modal-edit-aula'); ?>
<?php echo view('components/aulas/modal-cad-aula'); ?>
<?php echo view('components/aulas/modal-deletar-aula') ?>

<div class="page-header">
    <h3 class="page-title">GERENCIAR AULAS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('/sys/home')?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista Aulas</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- mostrar ALERT em caso de erro -->
                <?php if (session()->has('erros')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session('erros') as $erro): ?>
                                <li> <i class="mdi mdi-alert-circle"></i><?=esc($erro)?></li>
                            <?php endforeach?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- botões da parte de cima -->
                <div class="row">
                    <div class="col-12 mb-4">
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#modal-cad-aula">
                                <i class="fa fa-plus-circle btn-icon-prepend"></i> Incluir Aula
                        </button>                        
                    </div>
                </div>

                <!-- início da tabela -->

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mb-4" id="listagem-aulas">

                                <!-- cabeçalho da tabela -->

                                <thead>
                                <tr>
                                    <th>Curso</th>
                                    <th>Turma</th>
                                    <th>Disciplina</th>
                                    <th>Professor(es)</th>
                                </tr>
                                </thead>

                                <!-- corpo da tabela -->
                                <tbody>
                                <?php if (!empty($aulas)): ?>
                                    <?php foreach ($aulas as $aula): ?>
                                        <tr>
                                            <td><?php echo esc($professor['nome']); ?></td>
                                            <td><?php echo esc($professor['email']); ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <span data-bs-toggle="tooltip" data-placement="top" title="Atualizar dados da aula">
                                                        <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-success button-trans-success btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-edit-aula"
                                                                data-id="<?php echo esc($aula['id']); ?>"
                                                                data-disciplina="<?php echo esc($aula['disciplina']); ?>"
                                                                data-turma="<?php echo esc($professor['turma']); ?>"
                                                                data-profs="<?php echo esc($professor['professores']); ?>"
                                                        >
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
                                                        >
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
                <!-- legendas no canto inferior da tela -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <p class="card-description text-end"><i class="fa fa-edit text-success me-2"></i>Editar</p>
                        <p class="card-description text-end"><i class="fa fa-trash text-danger me-2"></i>Excluir</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- daqui pra baixo é javascript -->
    <script>
        //Para carregar a tradução dos itens da DataTable
        const dataTableLangUrl = "<?php echo base_url('assets/js/traducao-dataTable/pt_br.json'); ?>";

        //essa linha abaixo é para detectar que o documento foi completamente carregado e executar o código após isso
        $(document).ready(function ()
        {
            <?php if (!empty($aula)): ?>

            $("#listagem-aula").DataTable({

                aLengthMenu: [
                    [5, 15, 30, -1],
                    [5, 15, 30, "Todos"],
                ],

                language: {
                    search: "Pesquisar:",
                    url: dataTableLangUrl,
                },

                ordering: true,
                order: [[1, 'asc']],
                columns: [null, null, null, null]
            });

            $('#modal-edit-aula').on('show.bs.modal', function (event)
            {
                var button = $(event.relatedTarget);

                var disc = button.data('disciplina');
                var turma = button.data('turma');
                var prof = button.data('profs');
                var id = button.data('id');

                //var modal = $(this);
                //modal.find('#edit-id').val(id);
                //modal.find('#edit-nome').val(nome);
                //modal.find('#edit-email').val(email);
            });

            //Mesma abordagem do código acima, para o modal de excluir professor
            $('#modal-deletar-aula').on('show.bs.modal', function (event) {

                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                modal.find('#deletar-id').val(id);
            });

            //Ativa os tooltips dos botões
            $('[data-bs-toggle="tooltip"]').tooltip();

            <?php endif;?>

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
            <?php endif;?>
        });


    </script>