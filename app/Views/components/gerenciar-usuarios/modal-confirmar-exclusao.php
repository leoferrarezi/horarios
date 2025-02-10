<div class="modal fade" id="modal-confirmar-exclusao" tabindex="-1" aria-labelledby="modal-confirmar-exclusao-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-confirmar-exclusao-label">Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <form id="form-excluir-usuario" action="<?= site_url('/sys/admin/excluir-usuario') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <p>Para excluir este usuário, digite sua senha de administrador:</p>
                    <input type="password" name="admin_password" class="form-control" placeholder="Digite sua senha" required>
                    <input type="hidden" name="user_id" id="excluir-user-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
                </div>
            </form>
        </div>
    </div>
</div>