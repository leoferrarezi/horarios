<?php echo view('components/ambientes/modal-cad-ambientes'); ?>
<?php echo view('components/ambientes/modal-edit-ambientes'); ?>
<?php echo view('components/ambientes/modal-deletar-ambientes'); ?>

<?php echo view('components/grupo-ambientes/modal-cad-gp-ambientes'); ?>
<?php echo view('components/grupo-ambientes/modal-deletar-gp-ambientes'); ?>
<?php echo view('components/grupo-ambientes/modal-edit-gp-ambientes'); ?>
<?php echo view('components/grupo-ambientes/modal-add-ambientes'); ?>
<?php echo view('components/grupo-ambientes/modal-listar-ambientes'); ?>

<div class="page-header">
    <h3 class="page-title">GERENCIAMENTO DE AMBIENTES</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gerenciamento de Ambientes</li>
        </ol>
    </nav>
</div>

<div class="row">
    <!--------------------------- CADASTRO DE AMBIENTES ---------------------------------->
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">AMBIENTES</h4>
                <?php if (!empty($erros)): ?>
                    <?php foreach ($erros as $campo => $erro): ?>
                        <div class="alert alert-fill-danger" role="alert">
                            <i class="mdi mdi-alert-circle"></i> <?php echo esc($erro) ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="row">
                    <div class="col-12 mb-4">
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#modal-cad-ambiente"><i class="fa fa-plus-circle btn-icon-prepend"></i>Cadastrar Ambientes</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mb-4 custom-table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($ambientes)): ?>
                                        <?php foreach ($ambientes as $ambiente): ?>
                                            <tr>
                                                <td><?= esc($ambiente['nome']); ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Atualizar dados do ambiente">
                                                            <!-- botão com estilo, ativação do modal, e dados formados para transmitir ao modal -->
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-success button-trans-success btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-edit-ambientes-<?= $ambiente['id']; ?>"
                                                                data-id="<?php echo esc($ambiente['id']); ?>"
                                                                data-nome="<?php echo esc($ambiente['nome']); ?>">
                                                                <!-- icone do botão -->
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </span>

                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Excluir ambiente">
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-danger button-trans-danger btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-deletar-ambientes-<?= $ambiente['id']; ?>"
                                                                data-id="<?php echo esc($ambiente['id']); ?>"
                                                                data-nome="<?php echo esc($ambiente['nome']); ?>">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">Nenhum ambiente cadastrado.</td>
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

    <!------------------------- GRUPOS DE AMBIENTES ------------------------------------>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">GRUPO DE AMBIENTES</h4>
                <?php if (!empty($erros)): ?>
                    <?php foreach ($erros as $campo => $erro): ?>
                        <div class="alert alert-fill-danger" role="alert">
                            <i class="mdi mdi-alert-circle"></i> <?php echo esc($erro) ?>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="row">
                    <div class="col-12 mb-4">
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#modal-cad-gp-ambientes"><i class="fa fa-plus-circle btn-icon-prepend"></i>Criar Grupo de Ambientes</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mb-4 custom-table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($grupos)): ?>
                                        <?php foreach ($grupos as $grupo): ?>
                                            <tr>
                                                <td><?= esc($grupo['nome']); ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Atualizar dados do grupo">
                                                            <!-- botão com estilo, ativação do modal, e dados formados para transmitir ao modal -->
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-success button-trans-success btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-edit-gp-ambientes-<?= $grupo['id']; ?>"
                                                                data-id="<?php echo esc($grupo['id']); ?>"
                                                                data-nome="<?php echo esc($grupo['nome']); ?>">
                                                                <!-- icone do botão -->
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </span>

                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Adicionar ambientes ao grupo">
                                                            <!-- botão com estilo, ativação do modal, e dados formados para transmitir ao modal -->
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-primary button-trans-primary btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-add-ambientes-gp-<?= $grupo['id']; ?>"
                                                                data-id="<?php echo esc($grupo['id']); ?>"
                                                                data-nome="<?php echo esc($grupo['nome']); ?>">
                                                                <!-- icone do botão -->
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </span>

                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Remover ambientes do grupo">
                                                            <!-- botão com estilo, ativação do modal, e dados formados para transmitir ao modal -->
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-warning button-trans-warning btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-list-gp-ambientes-<?= $grupo['id']; ?>"
                                                                data-id="<?php echo esc($grupo['id']); ?>"
                                                                data-nome="<?php echo esc($grupo['nome']); ?>">
                                                                <!-- icone do botão -->
                                                                <i class="fa fa-list"></i>
                                                            </button>
                                                        </span>
                                                        <!-- abaixo são repetidos os códigos acima para replicar os outros 2 botões -->

                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Excluir Grupo">
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-danger button-trans-danger btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-deletar-gp-ambientes-<?= $grupo['id']; ?>"
                                                                data-id="<?php echo esc($grupo['id']); ?>"
                                                                data-nome="<?php echo esc($grupo['nome']); ?>">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">Nenhum grupo de ambientes cadastrado.</td>
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
            <div class="row-12 mt-4 d-flex justify-content-end gap-3">
                <p class="card-description text-end"><i class="fa fa-edit text-success me-2"></i>Editar &nbsp; &nbsp; </p>
                <p class="card-description text-end"><i class="fa fa-plus text-primary me-2"></i>Adicionar ambientes ao grupo &nbsp; &nbsp; </p>
                <p class="card-description text-end"><i class="fa fa-list text-warning me-2"></i>Listar ambientes do grupo &nbsp; &nbsp; </p>
                <p class="card-description text-end"><i class="fa fa-trash text-danger me-2"></i>Excluir</p>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
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

<style>
    .button-trans-primary {
        background-color: rgba(0, 136, 204, 0.2);
        transition: background-color 0.3s;
    }

    .button-trans-primary:hover {
        background-color: rgba(0, 136, 204, 1);
    }

    .button-trans-primary>i {
        color: #0088cc;
        /* Azul padrão */
        transition: color 0.3s;
    }

    .button-trans-primary:hover>i {
        color: #ffffff;
    }

    .button-trans-warning {
        background-color: rgba(255, 193, 7, 0.2);
        /* Amarelo translúcido */
        transition: background-color 0.3s;
    }

    .button-trans-warning:hover {
        background-color: rgba(255, 193, 7, 1);
        /* Amarelo sólido */
    }

    .button-trans-warning>i {
        color: #ffc107;
        /* Amarelo padrão Bootstrap */
        transition: color 0.3s;
    }

    .button-trans-warning:hover>i {
        color: #ffffff;
        /* Ícone branco no hover */
    }
</style>