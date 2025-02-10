<!-- Modal de Alteração de Grupo -->
<div class="modal fade" id="modal-alterar-grupo" tabindex="-1" aria-labelledby="modal-alterar-grupo-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-alterar-grupo-label">Alterar Grupo do Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <!-- Formulário para Alterar Grupo -->
                <form action="<?= base_url('sys/admin/alterar-grupo') ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- ID do Usuário (Oculto) -->
                    <input type="hidden" id="user_id" name="user_id">

                    <!-- Grupo Atual -->
                    <div class="mb-3">
                        <label for="grupo_atual" class="form-label">Grupo Atual</label>
                        <input type="text" class="form-control text-muted" id="grupo_atual" name="grupo_atual" readonly>
                    </div>

                    <!-- Novo Grupo -->
                    <div class="mb-3">
                        <label for="novo_grupo" class="form-label">Novo Grupo</label>
                        <select class="form-control text-white" id="novo_grupo" name="novo_grupo">
                            <option value="admin">Administrador (admin)</option>
                            <option value="user">Usuário (user)</option>
                        </select>
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