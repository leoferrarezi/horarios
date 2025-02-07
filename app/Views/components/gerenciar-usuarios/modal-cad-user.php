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
                        <input type="text" class="form-control" id="grupo_atual" name="grupo_atual" readonly>
                    </div>

                    <!-- Novo Grupo -->
                    <div class="mb-3">
                        <label for="novo_grupo" class="form-label">Novo Grupo</label>
                        <select class="form-control" id="novo_grupo" name="novo_grupo">
                            <option value="admin">Administrador</option>
                            <option value="user">Usuário</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script para preencher o modal corretamente -->
<script>
    $(document).ready(function() {
        // Ativa os tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();

        // Passa o ID do usuário e o grupo atual para o modal
        $('#modal-alterar-grupo').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Botão que acionou o modal
            var userId = button.data('user-id'); // Pega o ID do usuário no botão
            var userGroup = button.closest('tr').find('td:nth-child(3)').text().trim(); // Pega o grupo da tabela

            $(this).find('input[name="user_id"]').val(userId);
            $(this).find('input[name="grupo_atual"]').val(userGroup);
        });
    });
</script>