<div class="modal fade" id="modal-excluir-permanentemente" tabindex="-1" aria-labelledby="modal-excluir-permanentemente-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-excluir-permanentemente-label">Excluir Permanentemente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <form id="form-excluir-permanentemente" action="<?= site_url('/sys/admin/excluir-permanentemente') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <p>Para excluir permanentemente este usuário, digite sua senha de administrador:</p>
                    <input type="password" name="admin_password" class="form-control" placeholder="Digite sua senha" required>
                    <input type="hidden" name="user_id" id="excluir-permanentemente-user-id">
                </div>
                <!-- Ajuste no .modal-footer -->
                <div class="modal-footer" style="justify-content: flex-start; padding: 1rem;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
                </div>
            </form>
        </div>
    </div>
</div>