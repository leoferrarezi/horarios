<?php if (!empty($grupos)): ?>
    <?php foreach ($grupos as $grupo): ?>
        <div class="modal fade" id="modal-edit-gp-ambientes-<?= $grupo['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-edit-label-<?= $grupo['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-edit-label-<?= $grupo['id'] ?>">Editar Grupo de Ambientes</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="editarGrupoAmbiente-<?= $grupo['id'] ?>" method="post" action="<?= base_url('sys/cadastro-ambientes/editar-grupo-ambientes') ?>">
                        <div class="modal-body">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $grupo['id'] ?>" />
                            <div class="form-group">
                                <label for="edit-nome-<?= $grupo['id'] ?>">Nome</label>
                                <input type="text" class="form-control" id="edit-nome-<?= $grupo['id'] ?>" name="nome" value="<?= esc($grupo['nome']) ?>" placeholder="Digite o nome do Grupo">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>