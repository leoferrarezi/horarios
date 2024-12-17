<?php if (!empty($grupos)): ?>
    <?php foreach ($grupos as $grupo): ?>
        <div class="modal fade" id="modal-list-gp-ambientes-<?= $grupo['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-edit-label-<?= $grupo['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-edit-label-<?= $grupo['id'] ?>">Ambientes do Grupo: <?= esc($grupo['nome']) ?></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mb-4">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nome do Ambiente</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($grupo['ambientes'])): ?>
                                            <?php foreach ($grupo['ambientes'] as $ambiente): ?>
                                                <tr>
                                                    <td><?= esc($ambiente['id']); ?></td>
                                                    <td><?= esc($ambiente['nome']); ?></td>
                                                    <td>
                                                    <span data-bs-toggle="tooltip" data-placement="top" title="Remover ambiente do grupo">
                                                        <form action="<?= base_url('/sys/cadastro-ambientes/remover-ambientes-grupo') ?>" method="POST">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="grupo_id" value="<?= $grupo['id']; ?>">
                                                            <input type="hidden" name="ambiente_id" value="<?= $ambiente['id']; ?>">

                                                            <button
                                                                type="submit"
                                                                class="justify-content-center align-items-center d-flex btn btn-inverse-danger button-trans-danger btn-icon me-1" >
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                        </form>
                                                    </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="3">Nenhum ambiente associado a este grupo.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>