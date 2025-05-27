<!-- incluir os componentes modais antes do restante do documento -->
<?php echo view('components/professor/modal-edit-prof'); ?>
<?php echo view('components/professor/modal-cad-prof'); ?>
<?php echo view('components/professor/modal-deletar-prof') ?>
<?php echo view('components/professor/modal-import-prof') ?>
<?php echo view('components/professor/modal-restricoes-prof') ?>

<!-- breadcumbs (mapa de navegação com base no local atual) -->
<div class="page-header">
    <h3 class="page-title">GERENCIAR PROFESSORES</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista Professores</li>
        </ol>
    </nav>
</div>
<!-- ações e filtros -->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ações</h4>
                <div class="row">
                    <div class="col-12 mb-4">
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal"
                            data-bs-target="#modal-cad-prof"><i class="fa fa-plus-circle btn-icon-prepend"></i>
                            Incluir Professor
                        </button>
                        &nbsp; &nbsp;
                        <span data-bs-toggle="tooltip" data-placement="top"
                            title="Importar lista de professores exportada através do SUAP">
                            <button class="btn btn-info btn-icon-text" data-bs-toggle="modal"
                                data-bs-target="#modal-import-prof"><i class="fa fa-upload btn-icon-prepend"></i> Importar Professores do SUAP</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mb-4" id="listagem-professor">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if (!empty($professores)): //verifica se a tabela tem dados
                                    ?>
                                        <?php foreach ($professores as $professor): //loop para percorrer todos os professores retornados do bd
                                        ?>
                                            <tr>
                                                <td><?php echo esc($professor['nome']); ?></td>
                                                <td><?php echo esc($professor['email']); ?></td>

                                                <!-- essa celula monta os botões de ação que acionam modais -->

                                                <td>
                                                    <div class="d-flex">
                                                        <!-- o elemento <span> é apenas para mostrar o tooltip -->
                                                        <span data-bs-toggle="tooltip" data-placement="top"
                                                            title="Atualizar dados do professor">
                                                            <!-- botão com estilo, ativação do modal, e dados formados para transmitir ao modal -->
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-success button-trans-success btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-edit-prof"
                                                                data-id="<?php echo esc($professor['id']); ?>"
                                                                data-nome="<?php echo esc($professor['nome']); ?>"
                                                                data-email="<?php echo esc($professor['email']); ?>">
                                                                <!-- icone do botão -->
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </span>

                                                        <!-- abaixo são repetidos os códigos acima para replicar os outros 2 botões -->

                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Gerenciar restrições de horário do professor">
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-info button-trans-info btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-restricoes-prof"
                                                                data-id="<?php echo esc($professor['id']); ?>"
                                                                data-nome="<?php echo esc($professor['nome']); ?>">
                                                                <i class="fa fa-clock-o"></i>
                                                            </button>
                                                        </span>

                                                        <span data-bs-toggle="tooltip" data-placement="top"
                                                            title="Excluir professor">
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-danger button-trans-danger btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-deletar-professor"
                                                                data-id="<?php echo esc($professor['id']); ?>"
                                                                data-nome="<?php echo esc($professor['nome']); ?>">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <!-- caso não haja professor cadastrado -->
                                        <tr>
                                            <td colspan="4">Nenhum professor cadastrado.</td>
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
            <div class="col-12 mt-4 d-flex justify-content-end">Legenda</div>
            <div class="col-12 mt-4 d-flex justify-content-end gap-3">
                <p class="card-description text-end"><i class="fa fa-edit text-success me-2"></i>Editar &nbsp; &nbsp; </p>
                <p class="card-description text-end"><i class="fa fa-clock-o text-info me-2"></i>Gerenciar Restrições &nbsp; &nbsp; </p>
                <p class="card-description text-end"><i class="fa fa-trash text-danger me-2"></i>Excluir</p>
            </div>
        </div>
    </div>
</div>

<!-- daqui pra baixo é javascript -->
<script>
    //Para carregar a tradução dos itens da DataTable
    const dataTableLangUrl = "<?php echo base_url('assets/js/traducao-dataTable/pt_br.json'); ?>";

    //essa linha abaixo é para detectar que o documento foi completamente carregado e executar o código após isso
    $(document).ready(function() {

        $("#nome, #edit-nome").on("invalid", function() {
            this.setCustomValidity("Preencha o nome do professor!");
        });
        $("#nome, #edit-nome").on("input", function() {
            this.setCustomValidity("");
        });

        $("#email, #edit-email").on("invalid", function() {
            if(this.validity.typeMismatch) {
                this.setCustomValidity("Insira um e-mail válido!");
            } else {
                this.setCustomValidity("");
            }
        });
        $("#email, #edit-email").on("input", function() {
            if(this.validity.typeMismatch) {
                this.setCustomValidity("Insira um e-mail válido!");
            } else {
                this.setCustomValidity("");
            }
        });

        //Verificar se tem professores para então "transformar" a tabela em DataTable
        <?php if (!empty($professores)): ?>

            //Cria a DataTable
            $("#listagem-professor").DataTable({

                //Define as entradas de quantidade de linhas visíveis na tabela
                aLengthMenu: [
                    [-1, 10, 25, 50],
                    ["Todos", 10, 25, 50],
                ],

                //Define as questões de tradução/idioma
                language: {
                    search: "Pesquisar:",
                    url: dataTableLangUrl,
                },

                //Ativa ordenação
                ordering: true,
                //Diz que a coluna 1 (segunda/nome) deve ser o padrão de ordenação ao carregar a tabela
                order: [
                    [1, 'asc']
                ],
                //Desativa a ordenação por e-mail e por ações
                columns: [null, null, {
                    orderable: false
                }]
            });

            //programação do modal de Edição do professor
            //mais especificamente preenche os campos com os dados atuais
            //que vêm lá do código HTML do botão de editar
            $('#modal-edit-prof').on('show.bs.modal', function(event) {

                // Obter o DOM do botão que ativou o modal
                var button = $(event.relatedTarget);

                // Extrair as informações dos atributos data-*
                var nome = button.data('nome');
                var email = button.data('email');
                var id = button.data('id');

                // Formar o modal com os dados preenchidos
                var modal = $(this);
                modal.find('#edit-id').val(id);
                modal.find('#edit-nome').val(nome);
                modal.find('#edit-email').val(email);
            });

            //programação do modal de Edição do professor
            //mais especificamente preenche os campos com os dados atuais
            //que vêm lá do código HTML do botão de editar
            $('#modal-restricoes-prof').on('show.bs.modal', function(event) {

                // Obter o DOM do botão que ativou o modal
                var button = $(event.relatedTarget);

                // Extrair as informações dos atributos data-*
                var id = button.data('id');
                var nome = button.data('nome');

                // Formar o modal com os dados preenchidos
                var modal = $(this);
                modal.find('#professorID').val(id);
                modal.find('#professor-nome').html(nome);

                $.ajax({
                    url: '<?php echo base_url('/sys/professor/restricoes/'); ?>' + id, // Defina a rota correta                    
                    method: 'GET',
                    data: { id: id },
                    success: function(response)
                    {
                        Object.keys(response).forEach(function(dia)
                        {
                            Object.keys(response[dia]).forEach(function(periodo) 
                            {
                                response[dia][periodo].forEach(function(horario) 
                                {
                                    var tipo = horario.tipo;
                                    var idHorario = horario.id;

                                    // Atualiza os inputs na modal com base nos dados retornados
                                    $('#preferencia_' + dia.toLowerCase() + '_' + idHorario + '_none').prop('checked', tipo == 0);
                                    $('#preferencia_' + dia.toLowerCase() + '_' + idHorario + '_pref').prop('checked', tipo == 1);
                                    $('#preferencia_' + dia.toLowerCase() + '_' + idHorario + '_rest').prop('checked', tipo == 2);
                                });
                            });
                        });
                    },
                    error: function() 
                    {
                        alert('Erro ao buscar as restrições do professor. \n' + data);
                    }
                });
            });

            //Mesma abordagem do código acima, para o modal de excluir professor
            $('#modal-deletar-professor').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Botão que acionou o modal
                var professorID = button.data('id'); // Obtém o ID do professor
                var professorNome = button.data('nome');

                var modal = $(this);
                modal.find('#deletar-id').val(professorID);
                modal.find('#deletar-nome').text(professorNome);
            });

            //Ativa os tooltips dos botões
            $('[data-bs-toggle="tooltip"]').tooltip();

        <?php endif; ?>

        // Exibe mensagem de sucesso se o flashdata estiver com 'sucesso'
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


        // Exibe mensagem de erro se o flashdata estiver com 'erro'
        <?php if (session()->has('erros')): ?>
            <?php foreach (session('erros') as $erro): ?>
                $.toast({
                    heading: 'Erro',
                    text: '<?= esc($erro); ?>',
                    showHideTransition: 'fade',
                    icon: 'error',
                    loaderBg: '#dc3545',
                    position: 'top-center'
                });
            <?php endforeach; ?>
        <?php endif; ?>
    });
</script>


<!-- Exibe mensagem de Exceção -->
<?php if (session()->getFlashdata('erro')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $.toast({
                heading: 'Erro',
                text: "<?= esc(session()->getFlashdata('erro'), 'js'); ?>",
                showHideTransition: 'fade',
                icon: 'error',
                loaderBg: '#dc3545',
                position: 'top-center', 
                hideAfter: false
            });
        });
    </script>
<?php endif; ?>