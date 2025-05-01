<!-- incluir os componentes modais antes do restante do documento -->
<?php echo view('components/versoes/modal-edit-versoes'); ?>
<?php echo view('components/versoes/modal-cad-versoes'); ?>
<?php echo view('components/versoes/modal-deletar-versoes') ?>
<?php echo view('components/versoes/modal-copiar-versao') ?>
<?php echo view('components/versoes/modal-ativar-versao') ?>

<div class="page-header">
    <h3 class="page-title">GERENCIAR VERSÕES</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista Versões</li>
        </ol>
    </nav>
</div>

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
                    <div class="col-12 mb-4">
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#modal-cad-versoes"><i class="fa fa-plus-circle btn-icon-prepend"></i> Incluir Versão</button>
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
                            <table class="table mb-4" id="listagem-versao">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Semestre</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($versoes)): //verifica se a tabela tem dados ?>
                                        <?php foreach ($versoes as $versao): //loop para percorrer todos os professores retornados do bd ?>
                                            <tr>
                                                <td><?php echo esc($versao['id']); ?></td>
                                                <td><?php echo esc($versao['nome']); ?></td>
                                                <td><?php echo esc($versao['semestre']); ?></td>
                                                <td>
                                                    <div class="d-flex">

                                                        <span data-bs-toggle="tooltip" data-placement="top" title="<?php echo ($versao_nome == $versao['nome']) ? "Versão já em uso" : "Ativar versão"; ?>">
                                                            <button <?php echo ($versao_nome == $versao['nome']) ? "disabled" : ""; ?>
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-info button-trans-info btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-ativar-versao"
                                                                data-ativar-id="<?php echo esc($versao['id']); ?>"
                                                                data-ativar-nome="<?php echo esc($versao['nome']); ?>">
                                                                <i class="fa fa-check-square-o"></i>
                                                            </button>
                                                        </span>

                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Criar cópia da versão">
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-primary button-trans-primary btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-copiar-versao"
                                                                data-copia-id="<?php echo esc($versao['id']); ?>"
                                                                data-copia-nome="<?php echo esc($versao['nome']); ?>"
                                                                data-copia-semestre="<?php echo esc($versao['semestre']); ?>">
                                                                <!-- icone do botão -->
                                                                <i class="fa fa-copy"></i>
                                                            </button>
                                                        </span>
                                                        
                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Atualizar dados da versão">
                                                            <!-- botão com estilo, ativação do modal, e dados formados para transmitir ao modal -->
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-success button-trans-success btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-edit-versoes"
                                                                data-id="<?php echo esc($versao['id']); ?>"
                                                                data-nome="<?php echo esc($versao['nome']); ?>"
                                                                data-semestre="<?php echo esc($versao['semestre']); ?>">
                                                                <!-- icone do botão -->
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </span>

                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Excluir Versão">
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-danger button-trans-danger btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-deletar-versoes"
                                                                data-id="<?php echo esc($versao['id']); ?>"
                                                                data-nome="<?php echo esc($versao['nome']); ?>">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <!-- caso não haja matriz cadastrado -->
                                        <tr>
                                            <td colspan="4">Nenhuma versão cadastrada.</td>
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
                <p class="card-description text-end"><i class="fa fa-check-square-o text-info me-2"></i>Ativar &nbsp; &nbsp; </p>
                <p class="card-description text-end"><i class="fa fa-copy text-primary me-2"></i>Criar Cópia &nbsp; &nbsp; </p>
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

        $("#nome, #edit-nome, #copia-nome").on("input", function() {
            this.setCustomValidity("");
        });
        $("#nome, #edit-nome, #copia-nome").on("invalid", function() {
            this.setCustomValidity("Preencha o nome da versão!");
        });

        //Verificar se tem curso para então "transformar" a tabela em DataTable
        <?php if (!empty($versoes)): ?>

            //Cria a DataTable
            $("#listagem-versao").DataTable({

                //Define as entradas de quantidade de linhas visíveis na tabela
                aLengthMenu: [
                    [-1, 5, 15, 30],
                    ["Todos", 5, 15, 30],
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
                columns: [null, null, null, {
                    orderable: false
                }]
            });


            $('#modal-edit-versoes').on('show.bs.modal', function(event) {
                // Obter o DOM do botão que ativou o modal
                var button = $(event.relatedTarget);

                // Extrair as informações dos atributos data-*
                var id = button.data('id');
                var nome = button.data('nome');
                var semestre = button.data('semestre');

                // Formar o modal com os dados preenchidos
                var modal = $(this);
                modal.find('#edit-id').val(id);
                modal.find('#edit-nome').val(nome);
                modal.find('input[name="semestre"][value="' + semestre + '"]').prop('checked', true);

            });

            $('#modal-copiar-versao').on('show.bs.modal', function(event) {
                // Obter o DOM do botão que ativou o modal
                var button = $(event.relatedTarget);

                // Extrair as informações dos atributos data-*
                var id = button.data('copia-id');
                var nome = button.data('copia-nome');
                var semestre = button.data('copia-semestre');

                // Formar o modal com os dados preenchidos
                var modal = $(this);
                modal.find('#duplicar-id').val(id);
                modal.find('#copia-nome').val("Cópia de " + nome);
                modal.find('input[name="semestre"][value="' + semestre + '"]').prop('checked', true);

            });

            $('#modal-deletar-versoes').on('show.bs.modal', function(event) {
                // Button that triggered the modal
                var button = $(event.relatedTarget);

                // Extract info from data-* attributes
                var nome = button.data('nome');
                var id = button.data('id');

                var modal = $(this);
                modal.find('#deletar-id').val(id);
                modal.find('#deletar-nome').text(nome);
            });

            $('#modal-ativar-versao').on('show.bs.modal', function(event) {
                // Button that triggered the modal
                var button = $(event.relatedTarget);

                // Extract info from data-* attributes
                var nome = button.data('ativar-nome');
                var id = button.data('ativar-id');

                var modal = $(this);
                modal.find('#ativar-id').val(id);
                modal.find('#ativar-nome').text(nome);
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
    });
</script>