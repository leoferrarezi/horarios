<?php if (!empty($ambientes)): ?>
    <?php foreach ($ambientes as $ambiente): ?>
        <div class="modal fade" id="modal-edit-ambientes-<?= $ambiente['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-edit-label-<?= $ambiente['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-edit-ambientes-<?= $ambiente['id'] ?>">Editar Ambiente</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="editarGrupoAmbiente-<?= $ambiente['id'] ?>" method="post" action="<?= base_url('sys/cadastro-ambientes/atualizar-ambiente') ?>">
                        <div class="modal-body">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $ambiente['id'] ?>" />
                            <div class="form-group">
                                <label for="edit-nome-<?= $ambiente['id'] ?>">Nome</label>
                                <input type="text" class="form-control" id="edit-nome-<?= $ambiente['id'] ?>" name="nome" value="<?= esc($ambiente['nome']) ?>" placeholder="Digite o nome do ambiente" required>
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