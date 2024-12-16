<?php if (!empty($grupos)): ?>
    <?php foreach ($grupos as $grupo): ?>
        <div class="modal fade" id="modal-deletar-gp-ambientes-<?= $grupo['id'] ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Confirmação necessária</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <form id="deletarGrupoAmbiente-<?= $grupo['id'] ?>" class="forms-sample" method="post" action="<?= base_url('sys/cadastro-ambientes/deletar-grupo-ambientes') ?>">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= $grupo['id'] ?>" />
                        <div class="modal-body text-break">
                            <div class="card card-inverse-warning">
                                <div class="card-body" style="padding:5px">
                                    <p class="card-text">
                                        O Grupo pode conter ambientes vinculados, excluir o grupo também excluirá a relação com todos os ambientes vinculados ao mesmo!
                                    </p>
                                </div>
                            </div>
                            <br>

                            Confirma a exclusão do Grupo <strong><?= esc($grupo['nome']) ?></strong>?
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