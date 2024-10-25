<div class="page-header">
    <h3 class="page-title">LISTAGEM DE PROFESSORES</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys')?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Professores</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <!-- condição para exibir a mensagem de sucesso ao cadastrar um novo professor -->
                <?php if(isset($_GET['cadastrado'])): ?>
                    <div class="row">
                        <div class="alert alert-fill-success" role="alert">
                            <i class="mdi mdi-alert-circle"></i> Professor cadastrado com sucesso.
                        </div>
                    </div>
                <?php endif ?>
                <!------------------------------------------------------------->

                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">LISTA DE PROFESSORES</h4>
                    </div>
                    <div class="col-6 text-end">
                        <a class="btn btn-primary me-2 btn-icon-text" href="<?php echo base_url("/sys/professor/cadastro"); ?>">
                            <i class="fa fa-plus btn-icon-prepend"></i>Cadastrar Novo</a>
                        <a class="btn btn-success btn-icon-text">
                            <i class="fa fa-upload btn-icon-prepend"></i> Importar Professores
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mb-4">
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
                                    <tr>
                                        <td>1</td>
                                        <td>João</td>
                                        <td>1234567</td>
                                        <td>joao@gmail.com</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-success btn-icon me-1"> <i class="fa fa-edit"></i></a>
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-info btn-icon me-1">
                                                    <i class="fa fa-clock-o"></i>
                                                </a>
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-danger btn-icon me-1"> <i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Maria</td>
                                        <td>7654321</td>
                                        <td>maria@gmail.com</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-success btn-icon me-1"> <i class="fa fa-edit"></i></a>
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-info btn-icon me-1">
                                                    <i class="fa fa-clock-o"></i>
                                                </a>
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-danger btn-icon me-1"> <i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Igor</td>
                                        <td>7485961</td>
                                        <td>igor@gmail.com</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-success btn-icon me-1"> <i class="fa fa-edit"></i></a>
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-info btn-icon me-1">
                                                    <i class="fa fa-clock-o"></i>
                                                </a>
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-danger btn-icon me-1"> <i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Matheus</td>
                                        <td>9685741</td>
                                        <td>matheus@gmail.com</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-success btn-icon me-1"> <i class="fa fa-edit"></i></a>
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-info btn-icon me-1">
                                                    <i class="fa fa-clock-o"></i>
                                                </a>
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-danger btn-icon me-1"> <i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Lucas</td>
                                        <td>3579514</td>
                                        <td>lucas@gmail.com</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-success btn-icon me-1"> <i class="fa fa-edit"></i></a>
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-info btn-icon me-1">
                                                    <i class="fa fa-clock-o"></i>
                                                </a>
                                                <a class="justify-content-center align-items-center d-flex btn btn-inverse-danger btn-icon me-1"> <i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-start">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-6">
                        <p class="card-description text-end"><i class="fa fa-edit text-success me-4"></i>Editar</p>
                        <p class="card-description text-end"><i class="fa fa-clock-o text-info me-4"></i>Gerenciar horários</p>
                        <p class="card-description text-end"><i class="fa fa-trash text-danger me-4"></i>Excluir</p>
                    </div>
                </div>
            </div>
        </div>
    </div>