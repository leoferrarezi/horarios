<!-- incluir os componentes modais antes do restante do documento -->
<?php echo view('components/disciplina/modal-edit-disciplina'); ?>
<?php echo view('components/disciplina/modal-cad-disciplina'); ?>
<?php echo view('components/disciplina/modal-deletar-disciplina') ?>


<div class="page-header">
    <h3 class="page-title">GERENCIAR DISCIPLINAS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista Disciplinas</li>
        </ol>
    </nav>
</div>

<!-- ações e filtros -->
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ações</h4>
                <div class="row">
                    <div class="col-12 mb-4">
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#modal-cad-disciplina"><i class="fa fa-plus-circle btn-icon-prepend"></i> Incluir Disciplina</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Filtros</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="curso">Matriz:</label>
                            <select class="js-example-basic-single" name="matriz" style="width:100%;" id="filtroMatriz">
                                <option value=""></option>
                                <?php foreach ($matrizes as $matriz): ?>
                                    <option value="<?php echo esc($matriz['nome']) ?>"><?php echo esc($matriz['nome']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
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
                            <table class="table table-sm" id="listagem-disciplina">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Matriz</th>
                                        <th>C.H.</th>
                                        <th>C.H. Dia</th>
                                        <th>Período</th>
                                        <th>Abreviatura</th>
                                        <th>Ambiente</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if (!empty($disciplinas)): //verifica se a tabela tem dados 
                                    ?>
                                        <?php foreach ($disciplinas as $disciplina): //loop para percorrer todos os professores retornados do bd 
                                        ?>
                                            <tr>
                                                <td><?php echo esc($disciplina['nome']); ?></td>
                                                <td><?php echo esc($disciplina['nome_matriz']); ?></td>
                                                <td><?php echo esc($disciplina['ch']); ?></td>
                                                <td><?php echo esc($disciplina['max_tempos_diarios']); ?></td>
                                                <td><?php echo ($disciplina['periodo'] == "0") ? "-" : esc($disciplina['periodo']) . "º"; ?></td>
                                                <td><?php echo esc($disciplina['abreviatura']); ?></td>
                                                <td><?php echo esc($disciplina['grupo_de_ambiente']); ?></td>

                                                <!-- essa celula monta os botões de ação que acionam modais -->

                                                <td>
                                                    <div class="d-flex">
                                                        <!-- o elemento <span> é apenas para mostrar o tooltip -->
                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Atualizar dados da disciplina">
                                                            <!-- botão com estilo, ativação do modal, e dados formados para transmitir ao modal -->
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-success button-trans-success btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-edit-disciplina"
                                                                data-id="<?php echo esc($disciplina['id']); ?>"
                                                                data-nome="<?php echo esc($disciplina['nome']); ?>"
                                                                data-codigo="<?php echo esc($disciplina['codigo']); ?>"
                                                                data-matriz_id="<?php echo esc($disciplina['matriz_id']); ?>"
                                                                data-ch="<?php echo esc($disciplina['ch']); ?>"
                                                                data-max-tempos-diarios="<?php echo esc($disciplina['max_tempos_diarios']); ?>"
                                                                data-periodo="<?php echo esc($disciplina['periodo']); ?>"
                                                                data-abreviatura="<?php echo esc($disciplina['abreviatura']); ?>"
                                                                data-grupo-ambiente-id="<?php echo esc($disciplina['grupo_de_ambientes_id']); ?>">

                                                                <!-- icone do botão -->
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </span>

                                                        <!-- abaixo são repetidos os códigos acima para replicar os outros 2 botões -->

                                                        <span data-bs-toggle="tooltip" data-placement="top" title="Excluir disciplina">
                                                            <button
                                                                type="button"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-danger button-trans-danger btn-icon me-1"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-deletar-disciplina"
                                                                data-id="<?php echo esc($disciplina['id']); ?>"
                                                                data-nome="<?php echo esc($disciplina['nome']); ?>">
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
                                            <td colspan="8">Nenhuma disciplina cadastrada.</td>
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



    //essa linha abaixo é para detectar que o documento foi completamente carregado e executar o código após isso
    $(document).ready(function() {

        $("#nome, #codigo, #cargaHoraria, #max_tempos_diarios, #periodo, #abreviatura, #edit-nome, #edit-codigo, #edit-cargaHoraria, #edit-max_tempos_diarios, #edit-periodo, #edit-abreviatura").on("input", function() {
            this.setCustomValidity("");
        });
        $("#nome, #edit-nome").on("invalid", function() {
            this.setCustomValidity("Preencha o nome da disciplina!");
        });
        $("#codigo, #edit-codigo").on("invalid", function() {
            this.setCustomValidity("Preencha o código da disciplina!");
        });
        $("#cargaHoraria, #edit-cargaHoraria").on("invalid", function() {
            this.setCustomValidity("Preencha a carga horária da disciplina!");
        });
        $("#max_tempos_diarios, #edit-max_tempos_diarios").on("invalid", function() {
            this.setCustomValidity("Preencha o tempo máximo diário da disciplina!");
        });
        $("#periodo, #edit-periodo").on("invalid", function() {
            this.setCustomValidity("Preencha o período da disciplina!");
        });
        $("#abreviatura, #edit-abreviatura").on("invalid", function() {
            this.setCustomValidity("Preencha a abreviatura da disciplina!");
        });

        //Verificar se tem disciplina para então "transformar" a tabela em DataTable
        <?php if (!empty($disciplinas)): ?>

            //Cria a DataTable
            var table = $("#listagem-disciplina").DataTable({

                //Define as entradas de quantidade de linhas visíveis na tabela
                aLengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Todos"],
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
                columns: [null, null, null, null, null, null, null, {
                    orderable: false
                }]
            });

            //programação do modal de Edição do curso
            //mais especificamente preenche os campos com os dados atuais
            //que vêm lá do código HTML do botão de editar
            $('#modal-edit-disciplina').on('show.bs.modal', function(event) {
                // Obter o DOM do botão que ativou o modal
                var button = $(event.relatedTarget);

                // Extrair as informações dos atributos data-* 
                var id = button.data('id');
                var nome = button.data('nome');
                var codigo = button.data('codigo');
                var matriz = button.data('matriz_id');
                var ch = button.data('ch');
                var max_tempos_diarios = button.data('max-tempos-diarios');
                var periodo = button.data('periodo');
                var abreviatura = button.data('abreviatura')
                var grupo_ambiente = button.data('grupo-ambiente-id');


                // Formar o modal com os dados preenchidos
                var modal = $(this);
                modal.find('#edit-id').val(id);
                modal.find('#edit-nome').val(nome);
                modal.find('#edit-codigo').val(codigo);
                modal.find('#edit-matriz').val(matriz);
                modal.find('#edit-cargaHoraria').val(ch);
                modal.find('#edit-max_tempos_diarios').val(max_tempos_diarios);
                modal.find('#edit-periodo').val(periodo);
                modal.find('#edit-abreviatura').val(abreviatura);
                modal.find('#edit-grupo_ambiente').val(grupo_ambiente);

            });

            //Mesma abordagem do código acima, para o modal de excluir professor
            $('#modal-deletar-disciplina').on('show.bs.modal', function(event) {
                // Button that triggered the modal
                var button = $(event.relatedTarget);

                // Extract info from data-* attributes
                var id = button.data('id');
                var nome = button.data('nome');

                var modal = $(this);
                modal.find('#deletar-id').val(id);
                modal.find('#deletar-nome').text(nome);
            });

            //Seleciona opção do filtro para a tabela
            $('#filtroMatriz').on('change', function() {
                var filtroSelecionado = $(this).val();
                table.columns(1).search(filtroSelecionado).draw();
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

<!--Referente ao select 2-->
<script>
    $(document).ready(function() {
        // Inicializar somente modal
        $('#modal-cad-disciplina .js-example-basic-single').select2({
            placeholder: "Selecione uma opção:",
            allowClear: true,
            width: '100%',
            dropdownParent: $('#modal-cad-disciplina')
        });

        // Para os outros .js-example-basic-single que estão na página principal:
        $('.js-example-basic-single').not('#modal-cad-disciplina .js-example-basic-single').select2({
            placeholder: "Selecione uma opção:",
            allowClear: true,
            width: '100%'
        });
    });
</script>