<div class="page-header">
    <!-- Exibe mensagem de sucesso se o flashdata estiver com 'sucesso' -->
    <?php if (session()->getFlashdata('sucesso')): ?>
        <div class="row">
            <div class="alert alert-fill-success" role="alert">
                <i class="mdi mdi-alert-circle"></i> <?php echo session()->getFlashdata('sucesso'); ?>
            </div>
        </div>
    <?php endif; ?>
    <!------------------------------------------------------------->
    <h3 class="page-title"> LISTAGEM DE PROFESSOR </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Professores</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <div class="col-6">
            <a class="btn btn-primary mb-4 me-2 btn-icon-text" href="<?php echo base_url("/sys/professor/cadastro"); ?>">
                <i class="fa fa-plus btn-icon-prepend"></i>Cadastrar Novo</a>
            <a class="btn btn-success mb-4 btn-icon-text">
                <i class="fa fa-upload btn-icon-prepend"></i> Importar Professores
            </a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="listagem-professor" class="table">
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
                                        <td><?php echo $professor['id']; ?></td>
                                        <td><?php echo $professor['nome']; ?></td>
                                        <td><?php echo $professor['siape']; ?></td>
                                        <td><?php echo $professor['email']; ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-success btn-icon me-1" href="<?php echo base_url('professor/editar/' . $professor['id']); ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-info btn-icon me-1" href="<?php echo base_url('professor/horarios/' . $professor['id']); ?>">
                                                    <i class="fa fa-clock-o"></i>
                                                </a>
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-danger btn-icon me-1" href="<?php echo base_url('professor/excluir/' . $professor['id']); ?>">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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
            <div class="col-12 mt-5">
                <p class="card-description text-end"><i class="fa fa-edit text-success me-2"></i>Editar</p>
                <p class="card-description text-end"><i class="fa fa-clock-o text-info me-2"></i>Gerenciar Restrições</p>
                <p class="card-description text-end"><i class="fa fa-trash text-danger me-2"></i>Excluir</p>
            </div>
        </div>
    </div>
</div>