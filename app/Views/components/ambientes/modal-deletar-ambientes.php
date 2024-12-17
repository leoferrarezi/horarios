<?php if (!empty($ambientes)): ?>
    <?php foreach ($ambientes as $ambiente): ?>
        <div class="modal fade" id="modal-deletar-ambientes-<?= $ambiente['id'] ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Confirmação necessária</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <form id="deletarAmbiente-<?= $ambiente['id'] ?>" class="forms-sample" method="post" action="<?= base_url('sys/cadastro-ambientes/deletar-ambiente') ?>">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= $ambiente['id'] ?>" />
                        <div class="modal-body text-break">
                            <div class="card card-inverse-warning">
                                <div class="card-body" style="padding:5px">
                                    <p class="card-text">
                                        O ambiente pode estar vinculado a um grupo de ambientes, excluir o ambiente também excluirá a relação com todos os grupos em que o ambiente estaja vinculado!
                                    </p>
                                </div>
                            </div>
                            <br>

                            Confirma a exclusão do ambiente <strong><?= esc($ambiente['nome']) ?></strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger me-2">Excluir</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>