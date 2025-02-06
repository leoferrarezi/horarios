<div class="page-header">
    <h3 class="page-title">ALTERAR SENHA</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Alterar Senha</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <!-- Mensagens de erro -->
                <?php if (session()->has('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session('errors') as $error): ?>
                                <li> <i class="mdi mdi-alert-circle"></i> <?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Formulário para alterar a senha -->
                <form action="<?= site_url('sys/alterar-senha') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Senha Atual</label>
                        <input type="password" name="current_password" id="current_password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label">Nova Senha</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirmar Nova Senha</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Alterar Senha</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Rodapé -->
<footer>
    <p>&copy; 2024 Seu Projeto. Todos os direitos reservados.</p>
</footer>

<!-- Scripts JS -->
<script src="path/to/your/scripts.js"></script> <!-- Substitua com o caminho correto -->