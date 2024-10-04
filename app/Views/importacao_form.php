<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importação de Planilha</title>
</head>
<body>
    <h1>Importar Planilha</h1>
    <form action="<?= site_url('sys/importacao/importar') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?> 
        <input type="file" name="arquivo" required>
        <button type="submit">Importar</button>
    </form>
</body>
</html>
