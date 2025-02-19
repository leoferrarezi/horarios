<div class="modal fade" id="modal-reativar-usuario" tabindex="-1" aria-labelledby="modal-reativar-usuario-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-reativar-usuario-label">Reativar Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <form id="form-reativar-usuario" action="<?= site_url('/sys/admin/reativar-usuario') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <p>Para reativar este usuário, digite sua senha de administrador:</p>
                    <input type="password" name="admin_password" class="form-control" placeholder="Digite sua senha" required>
                    <input type="hidden" name="user_id" id="reativar-user-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Confirmar Reativação</button>
                </div>
            </form>
        </div>
    </div>
</div>