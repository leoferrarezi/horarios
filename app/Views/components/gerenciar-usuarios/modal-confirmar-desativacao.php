<div class="modal fade" id="modal-confirmar-desativacao" tabindex="-1" aria-labelledby="modal-confirmar-desativacao-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-confirmar-desativacao-label">Confirmar Desativação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <form id="form-desativar-usuario" action="<?= site_url('/sys/admin/desativar-usuario') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <p>Para desativar este usuário, digite sua senha de administrador:</p>
                    <input type="password" name="admin_password" class="form-control" placeholder="Digite sua senha" required>
                    <input type="hidden" name="user_id" id="desativar-user-id">
                </div>
                <div class="modal-footer" style="justify-content: flex-start; padding: 1rem;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Confirmar Desativação</button>
                </div>
            </form>
        </div>
    </div>
</div>