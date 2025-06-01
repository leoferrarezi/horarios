<?php echo view('components/gerenciar-usuarios/modal-cad-user.php'); ?>
<?php echo view('components/gerenciar-usuarios/modal-alterar-grupo.php'); ?>
<?php echo view('components/gerenciar-usuarios/modal-confirmar-desativacao.php'); ?>
<?php echo view('components/gerenciar-usuarios/modal-resetar-senha.php'); ?>
<?php echo view('components/gerenciar-usuarios/modal-atualizar-usuario.php'); ?>

<div class="page-header">
    <h3 class="page-title">GERENCIAR USUÁRIOS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('/sys/home'); ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de Usuários</li>
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
                                <li> <i class="mdi mdi-alert-circle"></i><?php echo esc($erro); ?></li>
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
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ações</h4>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal"
                            data-bs-target="#modal-cad-user"><i class="fa fa-plus-circle btn-icon-prepend"></i>
                            Adicionar Usuário
                        </button>

                        <!-- Botão para redirecionar para a view de usuários inativos -->
                        <a href="<?php echo base_url('/sys/admin/usuarios-inativos') ?>" class="btn btn-secondary btn-icon-text">
                            <i class="fa fa-moon-o" aria-hidden="true"></i>
                            Usuários Inativos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- início da tabela -->
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
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
                                        <td><?php echo esc($usuario->username); ?></td>
                                        <td><?php echo esc($usuario->email); ?></td>
                                        <td>
                                            <?php if (!empty($usuario->grupos)): ?>
                                                <?php echo esc(implode(', ', $usuario->grupos)); ?>
                                            <?php else: ?>
                                                Nenhum grupo atribuído
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <!-- Botão Editar -->
                                                <span data-bs-toggle="tooltip" data-placement="top" title="Atualizar dados do usuário">
                                                    <button type="button" class="btn button-trans-success btn-icon me-1 btn-editar-usuario d-flex align-items-center justify-content-center"
                                                        data-bs-toggle="modal" data-bs-target="#modal-atualizar-usuario"
                                                        data-user-id="<?php echo $usuario->id; ?>" data-username="<?php echo esc($usuario->username); ?>"
                                                        data-email="<?php echo esc($usuario->email); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </span>

                                                <!-- Botão Resetar Senha -->
                                                <span data-bs-toggle="tooltip" data-placement="top" title="Resetar senha do usuário">
                                                    <button type="button" class="btn button-trans-warning btn-icon me-1 btn-reset-senha d-flex align-items-center justify-content-center"
                                                        data-user-id="<?php echo $usuario->id; ?>" data-bs-toggle="modal" data-bs-target="#modal-resetar-senha">
                                                        <i class="fa fa-key"></i>
                                                    </button>
                                                </span>

                                                <!-- Botão Desativar -->
                                                <span data-bs-toggle="tooltip" data-placement="top" title="Desativar usuário">
                                                    <button type="button" class="btn button-trans-danger btn-icon me-1 btn-desativar-usuario d-flex align-items-center justify-content-center"
                                                        data-user-id="<?php echo $usuario->id; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirmar-desativacao">
                                                        <i class="fa fa-user-times"></i>
                                                    </button>
                                                </span>

                                                <!-- Botão Alterar Grupo -->
                                                <span data-bs-toggle="tooltip" data-placement="top" title="Alterar grupo">
                                                    <button type="button" class="btn button-trans-info btn-icon me-1 d-flex align-items-center justify-content-center"
                                                        data-bs-toggle="modal" data-bs-target="#modal-alterar-grupo"
                                                        data-user-id="<?php echo $usuario->id; ?>"
                                                        data-grupo-atual="<?php echo !empty($usuario->grupos) ? esc($usuario->grupos[0]) : 'Nenhum'; ?>">
                                                        <i class="fa fa-users"></i>
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

<!-- Legendas no final -->
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 mt-4 d-flex justify-content-end">Legenda</div>
            <div class="col-12 mt-4 d-flex justify-content-end gap-3">
                <p class="card-description text-end"><i class="fa fa-edit text-success me-2"></i>Editar &nbsp; &nbsp; </p>
                <p class="card-description text-end"><i class="fa fa-key text-warning me-2"></i>Resetar Senha &nbsp; &nbsp; </p>
                <p class="card-description text-end"><i class="fa fa-user-times text-danger me-2"></i>Desativar &nbsp; &nbsp; </p>
                <p class="card-description text-end"><i class="fa fa-users text-info me-2"></i>Alterar grupo</p>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Inicializa a DataTables
        
        $('#listagem-usuarios').DataTable({
            // Define as entradas de quantidade de linhas visíveis na tabela
            lengthMenu: [
                [5, 15, 30, -1],
                [5, 15, 30, "Todos"],
            ],

            // Define as questões de tradução/idioma
            language: {
                search: "Pesquisar:",
                url: "<?php echo base_url('assets/js/traducao-dataTable/pt_br.json'); ?>", // Caminho para o arquivo de tradução
                emptyTable: "Nenhum usuário cadastrado.", // Mensagem personalizada para tabela vazia
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
                targets: 3 // Coluna de ações (índice 3)
            }]
        });

        // Ativa os tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();

        // Passa o ID e o Grupo Atual do usuário para o modal de alteração de grupo
        $('#modal-alterar-grupo').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Botão que acionou o modal
            var userId = button.data('user-id'); // Captura o ID do usuário
            var grupoAtual = button.data('grupo-atual'); // Captura o grupo atual

            // Preenche os campos no modal
            $(this).find('input[name="user_id"]').val(userId);
            $(this).find('input[name="grupo_atual"]').val(grupoAtual);
        });

        // Passa o ID e o nome do usuário para o modal de desativação
        $('.btn-desativar-usuario').on('click', function() {
            var userId = $(this).data('user-id');
            var username = $(this).closest('tr').find('td:first').text(); // Captura o nome do usuário

            $('#desativar-user-id').val(userId);
            $('#nome-usuario-desativacao').text(username); // Exibe o nome no modal
        });

        // Passa o ID do usuário para o modal de resetar senha
        $(".btn-reset-senha").click(function() {
            let userId = $(this).data("user-id");

            // Armazena o ID do usuário no botão de confirmação
            $("#btn-confirmar-resetar").data("user-id", userId);
        });

        // Quando o botão de confirmação for clicado
        $("#btn-confirmar-resetar").click(function() {
            let userId = $(this).data("user-id");

            // Criar um formulário dinamicamente
            let form = $('<form>', {
                action: "<?php echo base_url('sys/admin/resetar-senha'); ?>",
                method: "post"
            }).append(
                $('<input>', {
                    type: "hidden",
                    name: "user_id",
                    value: userId
                }),
                $('<input>', {
                    type: "hidden",
                    name: "<?php echo csrf_token(); ?>",
                    value: "<?php echo csrf_hash(); ?>"
                })
            );

            // Enviar o formulário
            $('body').append(form);
            form.submit();
        });

        // AJAX para atualizar o usuário
        $("#updateUserForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: "<?php echo base_url('update-user'); ?>",
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    alert(response.message);
                    if (response.status === "success") {
                        location.reload();
                    }
                },
                error: function() {
                    alert("Ocorreu um erro ao tentar atualizar os dados.");
                }
            });
        });

        // Passa o ID, username e email do usuário para o modal de atualização de usuário
        $('#modal-atualizar-usuario').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Botão que acionou o modal
            var userId = button.data('user-id');
            var username = button.data('username');
            var email = button.data('email');

            // Define os valores no modal
            $(this).find('input[name="user_id"]').val(userId);
            $(this).find('input[name="username"]').val(username);
            $(this).find('input[name="email"]').val(email);
        });

        // Exibe mensagem de sucesso se o flashdata estiver com 'sucesso'
        <?php if (session()->getFlashdata('success')) : ?>
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