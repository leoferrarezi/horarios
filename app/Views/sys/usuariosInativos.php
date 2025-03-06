<?php echo view('components/gerenciar-usuarios/modal-reativar-usuario.php'); ?>
<?php echo view('components/gerenciar-usuarios/modal-excluir-permanentemente.php'); ?>

<div class="page-header">
    <h3 class="page-title">GERENCIAR USUÁRIOS DESATIVADOS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de Usuários Desativados</li>
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
                                <li> <i class="mdi mdi-alert-circle"></i><?php echo esc($erro) ?></li>
                            <?php endforeach; ?>
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
                        <!-- Botões de ação -->
                        <div class="row">
                            <div class="col-12 mb-4">
                                <!-- Botão para redirecionar para a view de gerenciar usuários ativos -->
                                <a href="<?php echo base_url('/sys/admin/') ?>" class="btn btn-secondary btn-icon-text">
                                    <i class="fa fa-eye btn-icon-prepend"></i>
                                    Usuários Ativos
                                </a>
                            </div>
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

                <!-- Tabela de Usuários Desativados -->
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mb-4" id="listagem-usuarios-desativados">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Última Atividade</th>
                                        <th>Data de Criação</th>
                                        <th>Data de Desativação</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($usuariosDesativados)): ?>
                                        <?php foreach ($usuariosDesativados as $usuario): ?>
                                            <tr>
                                                <td><?php echo esc($usuario->username) ?></td>
                                                <td><?php echo $usuario->last_active ? esc(date('d/m/Y H:i', strtotime($usuario->last_active))) : 'Nunca' ?></td>
                                                <td><?php echo esc(date('d/m/Y H:i', strtotime($usuario->created_at))) ?></td>
                                                <td><?php echo esc(date('d/m/Y H:i', strtotime($usuario->deleted_at))) ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <!-- Botão Reativar -->
                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Reativar usuário">
                                                            <button type="button" class="btn button-trans-success btn-icon me-1 btn-reativar-usuario d-flex align-items-center justify-content-center"
                                                                data-bs-toggle="modal" data-bs-target="#modal-reativar-usuario"
                                                                data-user-id="<?php echo $usuario->id ?>">
                                                                <i class="fa fa-user-plus"></i>
                                                            </button>
                                                        </span>

                                                        <!-- Botão Excluir Permanentemente -->
                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Excluir permanentemente">
                                                            <button type="button" class="btn button-trans-danger btn-icon me-1 btn-excluir-permanentemente d-flex align-items-center justify-content-center"
                                                                data-user-id="<?php echo $usuario->id ?>" data-bs-toggle="modal" data-bs-target="#modal-excluir-permanentemente">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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
                <p class="card-description text-end"><i class="fa fa-user-plus text-success me-2"></i>Reativar &nbsp; &nbsp; </p>
                <p class="card-description text-end"><i class="fa fa-trash text-danger me-2"></i>Excluir Permanentemente</p>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Inicializa a DataTables
        $('#listagem-usuarios-desativados').DataTable({
            // Define as entradas de quantidade de linhas visíveis na tabela
            lengthMenu: [
                [5, 15, 30, -1],
                [5, 15, 30, "Todos"],
            ],

            // Define as questões de tradução/idioma
            language: {
                search: "Pesquisar:",
                url: "<?php echo base_url('assets/js/traducao-dataTable/pt_br.json') ?>", // Caminho para o arquivo de tradução
                emptyTable: "Nenhum usuário desativado encontrado.", // Mensagem personalizada para tabela vazia
            },

            // Ativa ordenação
            ordering: true,

            // Define a coluna padrão de ordenação ao carregar a tabela
            order: [
                [0, 'asc'] // Ordena pela primeira coluna (Nome) em ordem ascendente
            ],

            // Desativa a ordenação na coluna de ações
            columnDefs: [{
                orderable: false,
                targets: 4 // Coluna de ações (índice 4)
            }]
        });

        // Ativa os tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();

        // Passa o ID do usuário para o modal de reativação
        $('.btn-reativar-usuario').on('click', function() {
            var userId = $(this).data('user-id');
            $('#reativar-user-id').val(userId);
        });

        // Passa o ID do usuário para o modal de exclusão permanente
        $('.btn-excluir-permanentemente').on('click', function() {
            var userId = $(this).data('user-id');
            $('#excluir-permanentemente-user-id').val(userId);
        });

        // Exibe mensagem de sucesso se o flashdata estiver com 'sucesso'
        <?php if (session()->getFlashdata('success')): ?>
            $.toast({
                heading: 'Sucesso',
                text: '<?php echo session()->getFlashdata('success'); ?>',
                showHideTransition: 'slide',
                icon: 'success',
                loaderBg: '#f96868',
                position: 'top-center'
            });
        <?php endif; ?>
    });
</script>