<!-- Modal de Cadastro de Usuário -->
<div class="modal fade" id="modal-cad-user" tabindex="-1" aria-labelledby="modal-cad-user-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-cad-user-label">Cadastrar Novo Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <!-- Formulário de Registro -->
                <form id="form-cad-user" action="<?= base_url('sys/admin/registrar-usuario') ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- Exibir Mensagens de Erro -->
                    <?php if (session('errors')): ?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <?php foreach (session('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Nome de Usuário -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Nome de Usuário</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>" required>
                    </div>

                    <!-- E-mail -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
                    </div>

                    <!-- Senha -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <!-- Confirmação de Senha -->
                    <div class="mb-3">
                        <label for="password_confirm" class="form-label">Confirmar Senha</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
                    </div>

                    <!-- Grupo -->
                    <div class="mb-3">
                        <label for="grupo" class="form-label">Grupo</label>
                        <select class="form-control" id="grupo" name="grupo">
                            <option value="admin" <?= old('grupo') == 'admin' ? 'selected' : '' ?>>Administrador</option>
                            <option value="user" <?= old('grupo') == 'user' || old('grupo') == '' ? 'selected' : '' ?>>Usuário</option>
                        </select>
                    </div>
                </form>
            </div>
            <!-- Rodapé do Modal com padding ajustado e alinhamento à esquerda -->
            <div class="modal-footer" style="justify-content: flex-start; padding: 1rem;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" form="form-cad-user">Salvar Usuário</button>
            </div>
        </div>
    </div>
</div>