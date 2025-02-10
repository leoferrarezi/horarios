<!-- Modal de Atualização de Usuário -->
<div class="modal fade" id="modal-atualizar-usuario" tabindex="-1" aria-labelledby="modal-atualizar-usuario-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-atualizar-usuario-label">Atualizar Dados do Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <!-- Formulário para Atualizar Usuário -->
                <form action="<?= base_url('sys/admin/atualizar-usuario') ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- ID do Usuário (Oculto) -->
                    <input type="hidden" id="user_id" name="user_id">

                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Nome de Usuário</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <!-- Senha do Administrador (Para validar antes de permitir alteração) -->
                    <div class="mb-3">
                        <label for="admin_password" class="form-label">Senha do Administrador</label>
                        <input type="password" class="form-control" id="admin_password" name="admin_password" required>
                    </div>

                    <div class="mb-3">
                        <!-- Botão de Cancelar -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>