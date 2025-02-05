<?= $this->extend('templates/admin_template') ?>

<?= $this->section('content') ?>
<h1>Gerenciar Usuários</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->username ?></td>
                <td><?= $user->email ?></td>
                <td>
                    <form action="/admin/assign-group" method="post">
                        <input type="hidden" name="user_id" value="<?= $user->id ?>">
                        <select name="group_id">
                            <?php foreach ($groups as $group): ?>
                                <option value="<?= $group->id ?>"><?= $group->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit">Atribuir Grupo</button>
                    </form>
                    <form action="/admin/remove-group" method="post">
                        <input type="hidden" name="user_id" value="<?= $user->id ?>">
                        <select name="group_id">
                            <?php foreach ($groups as $group): ?>
                                <option value="<?= $group->id ?>"><?= $group->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit">Remover Grupo</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>