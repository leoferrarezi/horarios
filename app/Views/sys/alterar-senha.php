<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
    <!-- Inclua seu CSS aqui -->
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Substitua com o caminho correto -->
</head>

<body>
    <main>
        <h1>Alterar Senha</h1>

        <?php if (session()->has('errors')): ?>
            <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>

        <!-- Formulário para alterar a senha -->
        <form action="<?= site_url('sys/alterar-senha') ?>" method="post">
            <?= csrf_field() ?>

            <div>
                <label for="current_password">Senha Atual</label>
                <input type="password" name="current_password" id="current_password" required>
            </div>

            <div>
                <label for="new_password">Nova Senha</label>
                <input type="password" name="new_password" id="new_password" required>
            </div>

            <div>
                <label for="confirm_password">Confirmar Nova Senha</label>
                <input type="password" name="confirm_password" id="confirm_password" required>
            </div>

            <button type="submit">Alterar Senha</button>
        </form>
    </main>

    <footer>
        <!-- Rodapé -->
        <p>&copy; 2024 Seu Projeto. Todos os direitos reservados.</p>
    </footer>

    <!-- Inclua seus scripts JS aqui -->
    <script src="path/to/your/scripts.js"></script> <!-- Substitua com o caminho correto -->
</body>

</html>