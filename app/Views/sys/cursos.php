<!-- incluir os componentes modais antes do restante do documento -->
<?php echo view('components/curso/modal-edit-curso'); ?>
<?php echo view('components/curso/modal-cad-curso'); ?>
<?php echo view('components/curso/modal-deletar-curso') ?>
<?php echo view('components/curso/modal-import-curso') ?>

<div class="page-header">
    <h3 class="page-title">GERENCIAR CURSOS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista Cursos</li>
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
                                <li> <i class="mdi mdi-alert-circle"></i><?= esc($erro) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ações</h4>
                <div class="row">
                    <div class="col-12 mb-4">
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#modal-cad-curso"><i class="fa fa-plus-circle btn-icon-prepend"></i> Incluir Curso</button>
                        <button class="btn btn-info btn-icon-text" data-bs-toggle="modal"
                            data-bs-target="#modal-import-curso"><i class="fa fa-upload btn-icon-prepend"></i> Importar Cursos do SUAP</button>
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
                            <table class="table mb-4" id="listagem-curso">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Matriz</th>
                                        <th>Regime</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($cursos)): ?>
                                        <?php foreach ($cursos as $curso): ?>
                                            <tr>
                                                <td><?php echo esc($curso['nome']); ?></td>
                                                <td><?php echo esc($curso['nome_matriz']); ?></td>
                                                <td><?php echo ($curso['regime'] == 1) ? "Anual" : "Semestral"; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <!-- o elemento <span> é apenas para mostrar o tooltip -->
                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Atualizar dados do curso">
                                                            <!-- botão com estilo, ativação do modal, e dados formados para transmitir ao modal -->
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-success button-trans-success btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-edit-curso"
                                                                data-id="<?php echo esc($curso['id']); ?>"
                                                                data-nome="<?php echo esc($curso['nome']); ?>"
                                                                data-matriz_id="<?php echo esc($curso['matriz_id']); ?>"
                                                                data-regime="<?php echo esc($curso['regime']); ?>">
                                                                <!-- icone do botão -->
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </span>

                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Excluir curso">
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-danger button-trans-danger btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-deletar-curso"
                                                                data-id="<?php echo esc($curso['id']); ?>"
                                                                data-nome="<?php echo esc($curso['nome']); ?>">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </span>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <!-- caso não haja curso cadastrado -->
                                        <tr>
                                            <td colspan="4">Nenhum curso cadastrado.</td>
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
                <p class="card-description text-end"><i class="fa fa-trash text-danger me-2"></i>Excluir</p>
            </div>
        </div>
    </div>
</div>

<!-- daqui pra baixo é javascript -->
<script>
    //Para carregar a tradução dos itens da DataTable
    const dataTableLangUrl = "<?php echo base_url('assets/js/traducao-dataTable/pt_br.json'); ?>";

    // Função para inicializar o Select2
    function initSelect2(selectId, modalId) {
        const selectElement = document.getElementById(selectId);

        // Inicializa o Select2 e aplica o dropdownParent no modal
        $(selectElement).select2({
            dropdownParent: $(modalId) // Faz o dropdown renderizar dentro do modal
        });
    }

    //essa linha abaixo é para detectar que o documento foi completamente carregado e executar o código após isso
    $(document).ready(function() {

        $("#nome, #edit-nome").on("input", function() {
            this.setCustomValidity("");
        });
        $("#nome, #edit-nome").on("invalid", function() {
            this.setCustomValidity("Preencha o nome do curso!");
        });

        $("#Select2Matriz").on("invalid", function() {
            this.setCustomValidity("Selecione uma matriz!");
        });
        $("#Select2Matriz").on("change", function() {
            this.setCustomValidity("");
        });

        $("#edit-matriz").on("invalid", function() {
            this.setCustomValidity("Selecione uma matriz!");
        });
        $("#edit-matriz").on("change", function() {
            this.setCustomValidity("");
        });

        initSelect2('Select2Matriz', '#modal-cad-curso');
        initSelect2('edit-matriz', '#modal-edit-curso');

        $('#modal-cad-curso').on('show.bs.modal', function(event) {
            // Destrói a instância atual do Select2 e reinicializa
            $('#Select2Matriz').select2('destroy');
            initSelect2('Select2Matriz', '#modal-cad-curso'); // Reinicia o Select2 após o modal ser mostrado
        });

        //Verificar se tem curso para então "transformar" a tabela em DataTable
        <?php if (!empty($curso)): ?>

            //Cria a DataTable
            $("#listagem-curso").DataTable({

                //Define as entradas de quantidade de linhas visíveis na tabela
                aLengthMenu: [
                    [-1, 5, 15, 30],
                    ["Todos", 5, 15, 30],
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
                //Desativa a ordenação por ações
                columns: [null, null, null, {
                    orderable: false
                }]
            });

            //programação do modal de Edição do curso
            //mais especificamente preenche os campos com os dados atuais
            //que vêm lá do código HTML do botão de editar
            $('#modal-edit-curso').on('show.bs.modal', function(event) {
                // Obter o DOM do botão que ativou o modal
                var button = $(event.relatedTarget);

                // Extrair as informações dos atributos data-* 
                var nome = button.data('nome');
                var matriz = button.data('matriz_id');
                var regime = button.data('regime');
                var id = button.data('id');

                // Formar o modal com os dados preenchidos
                var modal = $(this);
                modal.find('#edit-id').val(id);
                modal.find('#edit-nome').val(nome);
                // Definir o valor no select antes de reiniciar o Select2
                modal.find('#edit-matriz').val(matriz); // Atualiza a seleção do select
                modal.find('input[name="regime"][value="' + regime + '"]').prop('checked', true);

                //reinicia o select2
                $('#edit-matriz').select2('destroy');
                initSelect2('edit-matriz', '#modal-edit-curso');
            });

            //Mesma abordagem do código acima, para o modal de excluir professor
            $('#modal-deletar-curso').on('show.bs.modal', function(event) {
                // Button that triggered the modal
                var button = $(event.relatedTarget);

                // Extract info from data-* attributes
                var nome = button.data('nome');
                var id = button.data('id');

                var modal = $(this);
                modal.find('#deletar-id').val(id);
                modal.find('#deletar-nome').text(nome);
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