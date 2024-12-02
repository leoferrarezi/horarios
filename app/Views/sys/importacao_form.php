<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importação de Planilha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body>
<div class="card-body">
    <h4 class="card-title">Importação de Planilha</h4>
    <div class="card-description">
    <div class="row"></div>
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                            <h1>Importação de Planilha</h1>

                            <form action="<?=site_url('sys/importacao/importar')?>" method="post" enctype="multipart/form-data" class="mb-4">
                                <?=csrf_field()?>
                                <div class="mb-3">
                                    <label for="arquivo" class="form-label">Escolha o arquivo (XLS ou XLSX):</label>
                                    <input type="file" name="arquivo" id="arquivo" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Importar</button>
                            </form>

                            <?php if (isset($dados) && !empty($dados)): ?>
                                <h2>Dados Importados</h2>
                                <form id="tabela-dados" action="<?=site_url('sys/importacao/selecionar')?>" method="post">
                                    <?=csrf_field()?>
                                    <div class="table-responsive">
                                        <table id="importacao-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="selecionar-todos"></th>
                                                    <?php foreach ($dados[0] as $header): ?>
                                                        <th><?=esc($header)?></th>
                                                    <?php endforeach;?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach (array_slice($dados, 1) as $key => $row): ?>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="linhasSelecionadas[]" value="<?=$key?>">
                                                        </td>
                                                        <?php foreach ($row as $cell): ?>
                                                            <td><?=esc($cell)?></td>
                                                        <?php endforeach;?>
                                                    </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-3">Processar Selecionados</button>
                                </form>
                            <?php else: ?>
                                <p>Nenhum dado foi importado ainda. Faça o upload de uma planilha para visualizar os dados.</p>
                            <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../../assets/js/off-canvas.js"></script>
    <script src="../../../assets/js/hoverable-collapse.js"></script>
    <script src="../../../assets/js/misc.js"></script>
    <script src="../../../assets/js/settings.js"></script>
    <script src="../../../assets/js/todolist.js"></script>
    <script src="../../../assets/js/tabs.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            // Inicializa o DataTable
            $('#importacao-table').DataTable({
                paging: true,
                ordering: true,
                info: true,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                }
            });

            // Seleção de todos os checkboxes
            $('#selecionar-todos').on('change', function () {
                const isChecked = $(this).is(':checked');
                $('input[name="linhasSelecionadas[]"]').prop('checked', isChecked);
            });
        });
    </script>
</body>
</html>
