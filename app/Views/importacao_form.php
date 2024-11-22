<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importação de Planilha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
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
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <?php foreach ($dados[0] as $header): ?>
                            <th><?=esc($header)?></th>
                        <?php endforeach;?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (array_slice($dados, 1) as $row): ?>
                        <tr>
                            <?php foreach ($row as $cell): ?>
                                <td><?=esc($cell)?></td>
                            <?php endforeach;?>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum dado foi importado ainda. Faça o upload de uma planilha para visualizar os dados.</p>
        <?php endif;?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
