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
    <!------------------------------------------------------------->
    <div class="col-md-12 grid-margin stretch-card">
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

                <form id="cadastroAmbientes" class="forms-sample" method="post" action='<?php echo base_url('sys/cadastro-ambientes/salvar') ?>'>
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Nome do ambiente</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Laboratorio1" value="<?php echo (isset($campos['nome'])) ? $campos['nome'] : "";  ?>">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Salvar</button>
                </form>
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
                                                    <form id="form-atualizar-ambiente" action="<?= base_url('sys/cadastro-ambientes/atualizar/' . $ambiente['id']); ?>" method="post">
                                                        <?= csrf_field(); ?> <!-- Token CSRF, importante se estiver habilitado -->
                                                        <button type="button" class="justify-content-center align-items-center d-flex btn btn-inverse-success button-trans-success btn-icon me-1"
                                                            onclick="atualizarNomeAmbiente('<?= $ambiente['id']; ?>', '<?= $ambiente['nome']; ?>')">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </form>

                                                    <form id="form-excluir-ambiente" action="<?= base_url('sys/cadastro-ambientes/deletar/' . $ambiente['id']); ?>" method="post">
                                                        <?= csrf_field(); ?> <!-- Token CSRF, importante se estiver habilitado -->
                                                        <button type="submit" class="justify-content-center align-items-center d-flex btn btn-inverse-danger button-trans-danger btn-icon me-1">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
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
                form.action = `<?= base_url('sys/cadastro-ambientes/atualizar/'); ?>${ambienteId}`;

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
        color:#fff;
        border: 1px solid gray;
    }
</style>