<?= $this->section('content') ?>
<h1>Gerenciar Usuários</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($users) && is_array($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= is_object($user) ? $user->id : (isset($user['id']) ? $user['id'] : 'N/A') ?></td>
                    <td><?= is_object($user) ? $user->username : (isset($user['username']) ? $user['username'] : 'N/A') ?></td>
                    <td><?= is_object($user) ? $user->email : (isset($user['email']) ? $user['email'] : 'N/A') ?></td>
                    <td>
                        <!-- Botão para abrir o modal de atribuir grupo -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-assign-group-<?= is_object($user) ? $user->id : (isset($user['id']) ? $user['id'] : '') ?>">
                            Atribuir Grupo
                        </button>

                        <!-- Botão para abrir o modal de remover grupo -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-remove-group-<?= is_object($user) ? $user->id : (isset($user['id']) ? $user['id'] : '') ?>">
                            Remover Grupo
                        </button>
                    </td>
                </tr>

                <!-- Modal para atribuir grupo -->
                <div class="modal fade" id="modal-assign-group-<?= is_object($user) ? $user->id : (isset($user['id']) ? $user['id'] : '') ?>" tabindex="-1" aria-labelledby="modalAssignGroupLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAssignGroupLabel">Atribuir Grupo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/admin/assign-group" method="post">
                                <div class="modal-body">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="user_id" value="<?= is_object($user) ? $user->id : (isset($user['id']) ? $user['id'] : '') ?>">
                                    <div class="form-group">
                                        <label for="group_id">Selecione um Grupo</label>
                                        <select class="form-select" name="group_id" required>
                                            <?php if (!empty($groups) && is_array($groups)): ?>
                                                <?php foreach ($groups as $group): ?>
                                                    <option value="<?= is_object($group) ? $group->id : (isset($group['id']) ? $group['id'] : '') ?>">
                                                        <?= is_object($group) ? $group->name : (isset($group['name']) ? $group['name'] : 'Grupo sem nome') ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <option disabled>Nenhum grupo disponível</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Atribuir</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal para remover grupo -->
                <div class="modal fade" id="modal-remove-group-<?= is_object($user) ? $user->id : (isset($user['id']) ? $user['id'] : '') ?>" tabindex="-1" aria-labelledby="modalRemoveGroupLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalRemoveGroupLabel">Remover Grupo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/admin/remove-group" method="post">
                                <div class="modal-body">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="user_id" value="<?= is_object($user) ? $user->id : (isset($user['id']) ? $user['id'] : '') ?>">
                                    <div class="form-group">
                                        <label for="group_id">Selecione um Grupo</label>
                                        <select class="form-select" name="group_id" required>
                                            <?php if (!empty($groups) && is_array($groups)): ?>
                                                <?php foreach ($groups as $group): ?>
                                                    <option value="<?= is_object($group) ? $group->id : (isset($group['id']) ? $group['id'] : '') ?>">
                                                        <?= is_object($group) ? $group->name : (isset($group['name']) ? $group['name'] : 'Grupo sem nome') ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <option disabled>Nenhum grupo disponível</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Remover</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Nenhum usuário encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>