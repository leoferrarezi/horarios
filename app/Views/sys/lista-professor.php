<div class="page-header">
    <h3 class="page-title">LISTAGEM DE PROFESSORES</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista Professores</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <!-- Exibe mensagem de sucesso se o flashdata estiver com 'sucesso' -->
                <?php if (session()->getFlashdata('sucesso')): ?>
                    <div class="row">
                        <div class="alert alert-fill-success" role="alert">
                            <i class="mdi mdi-alert-circle"></i> <?php echo session()->getFlashdata('sucesso'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <!------------------------------------------------------------->
                <?php if (session()->has('erros')) : ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session('erros') as $erro) : ?>
                                <li> <i class="mdi mdi-alert-circle"></i><?= esc($erro) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-12 mb-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal-cad-prof">Cadastrar Novo</button>
                        <a class="btn btn-success btn-icon-text">
                            <i class="fa fa-upload btn-icon-prepend"></i> Importar Professores
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mb-4" id="listagem-professor">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Matrícula</th>
                                        <th>Email</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($professores)): ?>
                                        <?php foreach ($professores as $professor): ?>
                                            <tr>
                                                <td><?= esc($professor['id']); ?></td>
                                                <td><?= esc($professor['nome']); ?></td>
                                                <td><?= esc($professor['siape']); ?></td>
                                                <td><?= esc($professor['email']); ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button onclick="openEditModal(<?= $professor['id']; ?>, '<?= base_url('sys/professor/') ?>', '<?= base_url('sys/professor/atualizar/') ?>')"
                                                            class="justify-content-center align-items-center d-flex btn btn-inverse-success button-trans-success btn-icon me-1">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <a class="justify-content-center align-items-center d-flex btn btn-inverse-info button-trans-info btn-icon me-1" href="<?php echo base_url('professor/horarios/' . $professor['id']); ?>">
                                                            <i class="fa fa-clock-o"></i>
                                                        </a>
                                                        <button onclick="openDeleteModal(<?= $professor['id']; ?>, '<?= base_url('sys/professor/') ?>', '<?= base_url('sys/professor/deletar/') ?>')"
                                                            class="justify-content-center align-items-center d-flex btn btn-inverse-danger button-trans-danger btn-icon me-1">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        <!-- <a class="justify-content-center align-items-center d-flex btn btn-inverse-danger btn-icon me-1" href="<?php echo base_url('professor/excluir/' . $professor['id']); ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">Nenhum professor cadastrado.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-4">
                        <p class="card-description text-end"><i class="fa fa-edit text-success me-2"></i>Editar</p>
                        <p class="card-description text-end"><i class="fa fa-clock-o text-info me-2"></i>Gerenciar Restrições</p>
                        <p class="card-description text-end"><i class="fa fa-trash text-danger me-2"></i>Excluir</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= view('components/modal-cad-prof', ['rota' => base_url('sys/professor/salvar')]) ?>
    <?= view('components/modal-edit-prof') ?>;
    <?= view('components/modal-deletar-prof') ?>;
    <script src="<?= base_url('assets/js/modais/abrir-edicao.js') ?>"></script>
    <script src="<?= base_url('assets/js/modais/modal-deletar.js') ?>"></script>