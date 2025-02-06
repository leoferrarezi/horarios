<?php echo view('components/gerenciar-usuarios/modal-cad-user.php'); ?>

<div class="page-header">
    <h3 class="page-title">GERENCIAR USUÁRIOS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de Usuários</li>
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
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal"
                            data-bs-target="#modal-cad-user"><i class="fa fa-plus-circle btn-icon-prepend"></i>
                            Adicionar Usuário
                        </button>
                    </div>
                </div>

                <!-- Tabela de Usuários -->
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mb-4" id="listagem-usuarios">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Grupo</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($usuarios)): ?>
                                        <?php foreach ($usuarios as $usuario): ?>
                                            <tr>
                                                <td><?= esc($usuario->username) ?></td>
                                                <td><?= esc($usuario->email) ?></td>
                                                <td>
                                                    <?php if (!empty($usuario->grupos)): ?>
                                                        <?= esc(implode(', ', $usuario->grupos)) ?>
                                                    <?php else: ?>
                                                        Nenhum grupo atribuído
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <span data-bs-toggle="tooltip" data-placement="top"
                                                            title="Atualizar dados do usuário">
                                                            <button type="button" class="btn btn-inverse-success btn-icon me-1">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </span>

                                                        <span data-bs-toggle="tooltip" data-placement="top"
                                                            title="Resetar senha do usuário">
                                                            <button type="button" class="btn btn-inverse-warning btn-icon me-1">
                                                                <i class="fa fa-key"></i>
                                                            </button>
                                                        </span>

                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Excluir usuário">
                                                            <form action="<?= site_url('/sys/admin/excluir-usuario') ?>" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" name="user_id" value="<?= $usuario->id ?>">
                                                                <button type="submit" class="btn btn-inverse-danger btn-icon me-1">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </span>

                                                        <span data-bs-toggle="tooltip" data-placement="top"
                                                            title="Atribuir permissões ou grupo">
                                                            <button type="button" class="btn btn-inverse-info btn-icon me-1">
                                                                <i class="fa fa-users"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4">Nenhum usuário cadastrado.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Legendas no final -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <p class="card-description text-end"><i class="fa fa-edit text-success me-2"></i>Editar</p>
                        <p class="card-description text-end"><i class="fa fa-key text-warning me-2"></i>Resetar Senha</p>
                        <p class="card-description text-end"><i class="fa fa-trash text-danger me-2"></i>Excluir</p>
                        <p class="card-description text-end"><i class="fa fa-users text-info me-2"></i>Atribuir Permissões/Grupo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript para interatividade com os botões (sem modais) -->
    <script>
        $(document).ready(function() {
            // Ativa os tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
</div>