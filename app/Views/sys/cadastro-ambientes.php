<?php echo view('components/ambientes/modal-cad-ambientes'); ?>
<?php echo view('components/ambientes/modal-edit-ambientes'); ?>
<?php echo view('components/ambientes/modal-deletar-ambientes'); ?>

<?php echo view('components/grupo-ambientes/modal-cad-gp-ambientes'); ?>
<?php echo view('components/grupo-ambientes/modal-deletar-gp-ambientes'); ?>
<?php echo view('components/grupo-ambientes/modal-edit-gp-ambientes'); ?>
<?php echo view('components/grupo-ambientes/modal-add-ambientes'); ?>
<?php echo view('components/grupo-ambientes/modal-listar-ambientes'); ?>

<div class="page-header">
    <h3 class="page-title">CADASTRO DE AMBIENTES E GRUPOS DE AMBIENTES</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item"><a href="#">Ambientes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro de ambientes</li>
        </ol>
    </nav>
</div>

<div class="row">
    <!-- Exibe mensagem de sucesso se o flashdata estiver com 'sucesso' -->
    <?php if (session()->getFlashdata('sucesso')): ?>
        <div class="row">
            <div class="alert alert-fill-success" role="alert">
                <i class="mdi mdi-alert-circle"></i> <?php echo session()->getFlashdata('sucesso'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('erro')): ?>
        <div class="row">
            <div class="alert alert-danger" role="alert">
                <i class="mdi mdi-alert-circle"></i> <?php echo session()->getFlashdata('erro'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->has('erros')) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session('erros') as $erro) : ?>
                    <li> <i class="mdi mdi-alert-circle"></i><?= esc($erro) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>
    <!--------------------------- CADASTRO DE AMBIENTES ---------------------------------->
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">AMBIENTE - INSIRA AS INFORMAÇÕES</h4>
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

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($ambientes)): ?>
                                    <?php foreach ($ambientes as $ambiente): ?>
                                        <tr>
                                            <td><?= esc($ambiente['id']); ?></td>
                                            <td><?= esc($ambiente['nome']); ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <span data-bs-toggle="tooltip" data-placement="top" title="Atualizar dados do grupo">
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


                                                    <span data-bs-toggle="tooltip" data-placement="top" title="Excluir Grupo">
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

    <!------------------------- GRUPOS DE AMBIENTES ------------------------------------>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">GRUPO DE AMBIENTES - INSIRA AS INFORMAÇÕES</h4>
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
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($grupos)): ?>
                                        <?php foreach ($grupos as $grupo): ?>
                                            <tr>
                                                <td><?= esc($grupo['id']); ?></td>
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
                                                                class="justify-content-center align-items-center d-flex btn btn-primary btn-icon me-1"
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
                                                                class="justify-content-center align-items-center d-flex btn btn-warning btn-icon me-1"
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

    <script src="sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/vendors/js/vendor.bundle.base.js') ?>"></script>
    <script src="<?= base_url('assets/js/off-canvas.js') ?>"></script>
    <script src="<?= base_url('assets/js/data-table.js') ?>"></script>

    <!-- script para interação com os alertas -->
    <script>
        //alert de confirmação de exclusão do ambiente
        document.getElementById('form-excluir-ambiente').addEventListener('submit', function(ev) {
            ev.preventDefault(); //Impede o envio automatico do form

            Swal.fire({
                title: "Excluir ambiente?",
                text: "Esta ação não pode ser desfeita",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Sim, excluir!",
                customClass: {
                    popup: 'custom-swal-popup'
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Submete o formulário se confirmado
                }
            })
        })

        //atualizar o nome do ambiente
        function atualizarNomeAmbiente(ambienteId, nomeAtual) {
            Swal.fire({
                icon: 'question',
                title: 'Atualizar nome do ambiente',
                text: 'Insira o novo nome para o ambiente:',
                input: 'text',
                inputPlaceholder: 'Digite o novo nome do ambiente',
                inputValue: nomeAtual,
                showCancelButton: true,
                confirmButtonText: 'Atualizar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                customClass: {
                    popup: 'custom-swal-popup'
                },
                preConfirm: (novoNome) => {
                    if (!novoNome.trim()) {
                        Swal.showValidationMessage('O nome do ambiente não pode estar vazio.');
                        return false;
                    }
                    return novoNome.trim();
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Cria um formulário e o envia 
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `<?= base_url('sys/cadastro-ambientes/atualizar-ambiente/'); ?>${ambienteId}`;

                    // Token CSRF
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '<?= csrf_token(); ?>';
                    csrfInput.value = '<?= csrf_hash(); ?>';
                    form.appendChild(csrfInput);

                    // Novo nome
                    const nomeInput = document.createElement('input');
                    nomeInput.type = 'hidden';
                    nomeInput.name = 'nome';
                    nomeInput.value = result.value;
                    form.appendChild(nomeInput);

                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>

    <!-- CSS dos alerts -->
    <style>
        .custom-swal-popup {
            height: 400px;
            background-color: #000;
            color: #fff;
            border: 1px solid gray;
        }
    </style>