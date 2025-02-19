<?php echo view('components/gerenciar-usuarios/modal-reativar-usuario.php'); ?>
<?php echo view('components/gerenciar-usuarios/modal-excluir-permanentemente.php'); ?>

<div class="page-header">
    <h3 class="page-title">GERENCIAR USUÁRIOS DESATIVADOS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de Usuários Desativados</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <!-- Mensagens de erro -->
                <?php if (session()->has('erros')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session('erros') as $erro): ?>
                                <li> <i class="mdi mdi-alert-circle"></i><?= $erro ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Mensagens de sucesso ou erro -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php elseif (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <!-- Botões de ação -->
                <div class="row">
                    <div class="col-12 mb-4">
                        <!-- Botão para redirecionar para a view de gerenciar usuários ativos -->
                        <a href="<?= base_url('/sys/admin/') ?>" class="btn btn-secondary btn-icon-text">
                            <i class="fa fa-eye btn-icon-prepend"></i>
                            Usuários Ativos
                        </a>
                    </div>
                </div>

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
                                                <td><?= esc($usuario->username) ?></td>
                                                <td><?= $usuario->last_active ? esc(date('d/m/Y H:i', strtotime($usuario->last_active))) : 'Nunca' ?></td>
                                                <td><?= esc(date('d/m/Y H:i', strtotime($usuario->created_at))) ?></td>
                                                <td><?= esc(date('d/m/Y H:i', strtotime($usuario->deleted_at))) ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <!-- Botão Reativar -->
                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Reativar usuário">
                                                            <button type="button" class="btn btn-inverse-success btn-icon me-1 btn-reativar-usuario d-flex align-items-center justify-content-center"
                                                                data-bs-toggle="modal" data-bs-target="#modal-reativar-usuario"
                                                                data-user-id="<?= $usuario->id ?>">
                                                                <i class="fa fa-user-plus"></i>
                                                            </button>
                                                        </span>

                                                        <!-- Botão Excluir Permanentemente -->
                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Excluir permanentemente">
                                                            <button type="button" class="btn btn-inverse-danger btn-icon me-1 btn-excluir-permanentemente d-flex align-items-center justify-content-center"
                                                                data-user-id="<?= $usuario->id ?>" data-bs-toggle="modal" data-bs-target="#modal-excluir-permanentemente">
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

                <!-- Legendas no final -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <p class="card-description text-end"><i class="fa fa-user-plus text-success me-2"></i>Reativar</p>
                        <p class="card-description text-end"><i class="fa fa-trash text-danger me-2"></i>Excluir Permanentemente</p>
                    </div>
                </div>
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
                url: "<?= base_url('assets/js/traducao-dataTable/pt_br.json') ?>", // Caminho para o arquivo de tradução
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
    });
</script>