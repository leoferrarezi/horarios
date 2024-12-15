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
                                                        <button type="button" class="justify-content-center align-items-center d-flex btn btn-inverse-info button-trans-info btn-icon me-1" data-bs-toggle="modal" data-bs-target="#horarioModal<?= esc($professor['id']); ?>" onclick="setProfessorId(<?= $professor['id']; ?>)">
                                                            <i class="fa fa-clock-o"></i>
                                                        </button>
                                                        <button onclick="openDeleteModal(<?= $professor['id']; ?>, '<?= base_url('sys/professor/') ?>', '<?= base_url('sys/professor/deletar/') ?>')"
                                                            class="justify-content-center align-items-center d-flex btn btn-inverse-danger button-trans-danger btn-icon me-1">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        <!-- Modal para Gerenciar Horários -->
    <div class="modal fade" id="horarioModal<?= esc($professor['id']); ?>" tabindex="-1" aria-labelledby="horarioModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="horarioModalLabel">GERENCIAR RESTRIÇÕES DE HORÁRIOS: <?= esc($professor['nome']); ?></h5>       
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="table-responsive">
                    <form id="cadastroHorarios" class="forms-sample" method="post" action="#">
                        <table class="table mb-4">
                            <thead>
                                <tr>
                                    <th>Horários</th>
                                    <th>Segunda-feira</th>
                                    <th>Terça-feira</th>
                                    <th>Quarta-feira</th>
                                    <th>Quinta-feira</th>
                                    <th>Sexta-feira</th>
                                    <th>Sábado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>07:30</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario" id="<?= esc($professor['id']); ?>btnhorario1" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario1"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario" id="<?= esc($professor['id']); ?>btnhorario2" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario2"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario" id="<?= esc($professor['id']); ?>btnhorario3" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario3"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario02" id="<?= esc($professor['id']); ?>btnhorario021" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario021"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario02" id="<?= esc($professor['id']); ?>btnhorario022" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario022"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario02" id="<?= esc($professor['id']); ?>btnhorario023" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario023"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario03" id="<?= esc($professor['id']); ?>btnhorario031" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario031"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario03" id="<?= esc($professor['id']); ?>btnhorario032" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario032"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario03" id="<?= esc($professor['id']); ?>btnhorario033" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario033"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario04" id="<?= esc($professor['id']); ?>btnhorario041" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario041"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario04" id="<?= esc($professor['id']); ?>btnhorario042" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario042"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario04" id="<?= esc($professor['id']); ?>btnhorario043" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario043"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario05" id="<?= esc($professor['id']); ?>btnhorario051" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario051"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario05" id="<?= esc($professor['id']); ?>btnhorario052" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario052"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario05" id="<?= esc($professor['id']); ?>btnhorario053" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario053"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario36" id="<?= esc($professor['id']); ?>btnhorario361" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario361"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario36" id="<?= esc($professor['id']); ?>btnhorario362" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario352"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario36" id="<?= esc($professor['id']); ?>btnhorario363" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario363"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>08:20</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario06" id="<?= esc($professor['id']); ?>btnhorario061" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario061"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario06" id="<?= esc($professor['id']); ?>btnhorario062" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario062"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario06" id="<?= esc($professor['id']); ?>btnhorario063" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario063"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario07" id="<?= esc($professor['id']); ?>btnhorario071" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario071"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario07" id="<?= esc($professor['id']); ?>btnhorario072" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario072"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario07" id="<?= esc($professor['id']); ?>btnhorario073" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario073"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario08" id="<?= esc($professor['id']); ?>btnhorario081" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario081"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario08" id="<?= esc($professor['id']); ?>btnhorario082" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario082"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario08" id="<?= esc($professor['id']); ?>btnhorario083" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario083"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario09" id="<?= esc($professor['id']); ?>btnhorario091" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario091"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario09" id="<?= esc($professor['id']); ?>btnhorario092" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario092"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario09" id="<?= esc($professor['id']); ?>btnhorario093" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario093"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario10" id="<?= esc($professor['id']); ?>btnhorario101" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario101"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario10" id="<?= esc($professor['id']); ?>btnhorario102" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario102"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario10" id="<?= esc($professor['id']); ?>btnhorario103" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario103"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario35" id="<?= esc($professor['id']); ?>btnhorario351" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario351"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario35" id="<?= esc($professor['id']); ?>btnhorario352" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario352"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario35" id="<?= esc($professor['id']); ?>btnhorario353" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario353"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>13:00</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario11" id="<?= esc($professor['id']); ?>btnhorario111" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario111"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario11" id="<?= esc($professor['id']); ?>btnhorario112" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario112"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario11" id="<?= esc($professor['id']); ?>btnhorario113" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario113"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario12" id="<?= esc($professor['id']); ?>btnhorario121" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario121"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario12" id="<?= esc($professor['id']); ?>btnhorario122" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario122"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario12" id="<?= esc($professor['id']); ?>btnhorario123" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario123"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario13" id="<?= esc($professor['id']); ?>btnhorario131" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario131"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario13" id="<?= esc($professor['id']); ?>btnhorario132" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario132"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario13" id="<?= esc($professor['id']); ?>btnhorario133" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario133"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario14" id="<?= esc($professor['id']); ?>btnhorario141" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario141"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario14" id="<?= esc($professor['id']); ?>btnhorario142" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario142"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario14" id="<?= esc($professor['id']); ?>btnhorario143" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario143"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario15" id="<?= esc($professor['id']); ?>btnhorario151" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario151"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario15" id="<?= esc($professor['id']); ?>btnhorario152" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario152"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario15" id="<?= esc($professor['id']); ?>btnhorario153" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario153"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario34" id="<?= esc($professor['id']); ?>btnhorario341" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario341"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario34" id="<?= esc($professor['id']); ?>btnhorario342" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario342"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario34" id="<?= esc($professor['id']); ?>btnhorario343" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario343"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>15:00</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario16" id="<?= esc($professor['id']); ?>btnhorario161" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario161"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario16" id="<?= esc($professor['id']); ?>btnhorario162" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario162"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario16" id="<?= esc($professor['id']); ?>btnhorario163" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario163"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario17" id="<?= esc($professor['id']); ?>btnhorario171" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario171"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario17" id="<?= esc($professor['id']); ?>btnhorario172" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario172"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario17" id="<?= esc($professor['id']); ?>btnhorario173" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario173"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario18" id="<?= esc($professor['id']); ?>btnhorario181" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario181"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario18" id="<?= esc($professor['id']); ?>btnhorario182" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario182"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario18" id="<?= esc($professor['id']); ?>btnhorario183" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario183"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario19" id="<?= esc($professor['id']); ?>btnhorario191" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario191"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario19" id="<?= esc($professor['id']); ?>btnhorario192" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario192"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario19" id="<?= esc($professor['id']); ?>btnhorario193" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario193"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario20" id="<?= esc($professor['id']); ?>btnhorario201" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario201"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario20" id="<?= esc($professor['id']); ?>btnhorario202" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario202"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario20" id="<?= esc($professor['id']); ?>btnhorario203" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario203"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario33" id="<?= esc($professor['id']); ?>btnhorario331" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario331"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario33" id="<?= esc($professor['id']); ?>btnhorario332" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario332"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario33" id="<?= esc($professor['id']); ?>btnhorario333" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario333"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>19:00</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario21" id="btnhoraario211" autocomplete="off">
                                            <label class="btn" for="btnhoraario211"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario21" id="btnhoraario212" autocomplete="off">
                                            <label class="btn btn-outline-success" for="btnhoraario212"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario21" id="btnhoraario213" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="btnhoraario213"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario22" id="<?= esc($professor['id']); ?>btnhorario221" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario221"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario22" id="<?= esc($professor['id']); ?>btnhorario222" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario222"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario22" id="<?= esc($professor['id']); ?>btnhorario223" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario223"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario23" id="<?= esc($professor['id']); ?>btnhorario231" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario231"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario23" id="<?= esc($professor['id']); ?>btnhorario232" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario232"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario23" id="<?= esc($professor['id']); ?>btnhorario233" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario233"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario24" id="<?= esc($professor['id']); ?>btnhorario241" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario241"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario24" id="<?= esc($professor['id']); ?>btnhorario242" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario242"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario24" id="<?= esc($professor['id']); ?>btnhorario243" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario243"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario25" id="<?= esc($professor['id']); ?>btnhorario251" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario251"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario25" id="<?= esc($professor['id']); ?>btnhorario252" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario252"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario25" id="<?= esc($professor['id']); ?>btnhorario253" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario253"><i class="fa fa-times"></i></label>
                                        </div>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario32" id="<?= esc($professor['id']); ?>btnhorario321" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario321"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario32" id="<?= esc($professor['id']); ?>btnhorario322" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario322"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario32" id="<?= esc($professor['id']); ?>btnhorario323" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario323"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>21:00</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario26" id="<?= esc($professor['id']); ?>btnhorario261" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario261"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario26" id="<?= esc($professor['id']); ?>btnhorario262" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario262"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario26" id="<?= esc($professor['id']); ?>btnhorario263" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario263"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario27" id="<?= esc($professor['id']); ?>btnhorario271" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario271"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario27" id="<?= esc($professor['id']); ?>btnhorario272" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario272"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario27" id="<?= esc($professor['id']); ?>btnhorario273" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario273"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario28" id="<?= esc($professor['id']); ?>btnhorario281" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario281"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario28" id="<?= esc($professor['id']); ?>btnhorario282" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario282"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario28" id="<?= esc($professor['id']); ?>btnhorario283" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario283"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario29" id="<?= esc($professor['id']); ?>btnhorario291" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario291"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario29" id="<?= esc($professor['id']); ?>btnhorario292" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario292"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario29" id="<?= esc($professor['id']); ?>btnhorario293" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario293"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario30" id="<?= esc($professor['id']); ?>btnhorario301" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario301"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario30" id="<?= esc($professor['id']); ?>btnhorario302" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario302"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario30" id="<?= esc($professor['id']); ?>btnhorario303" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario303"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnhorario31" id="<?= esc($professor['id']); ?>btnhorario311" autocomplete="off">
                                            <label class="btn" for="<?= esc($professor['id']); ?>btnhorario311"><i class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario31" id="<?= esc($professor['id']); ?>btnhorario312" autocomplete="off">
                                            <label class="btn btn-outline-success" for="<?= esc($professor['id']); ?>btnhorario312"><i class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check" name="btnhorario31" id="<?= esc($professor['id']); ?>btnhorario313" autocomplete="off">
                                            <label class="btn btn-outline-danger" for="<?= esc($professor['id']); ?>btnhorario313"><i class="fa fa-times"></i></label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary me-2">Salvar</button>
                        <button class="btn btn-dark">Cancelar</button>
                    </form>
                </div>
                <p class="card-description text-end"><i class="fa fa-minus me-4"></i>Sem Informação </p> 
                <p class="card-description text-end"><i class="fa fa-check text-success me-4"></i>Preferência</p> 
                <p class="card-description text-end"><i class="fa fa-times text-danger me-4"></i>Restrição Justificada</p>
                </div>
            </div>
        </div>
    </div>
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
    <script>
        let professorId = null;
        function setProfessorId(id) {
            professorId = id;
        }
    </script>
    
    <?= view('components/modal-cad-prof', ['rota' => base_url('sys/professor/salvar')]) ?>
    <?= view('components/modal-edit-prof') ?>
    <?= view('components/modal-deletar-prof') ?>
    <script src="<?= base_url('assets/js/modais/abrir-edicao.js') ?>"></script>
    <script src="<?= base_url('assets/js/modais/modal-deletar.js') ?>"></script>
