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
                <td><?= $user->id ?></td> <!-- Acessando como objeto -->
                <td><?= $user->username ?></td> <!-- Acessando como objeto -->
                <td><?= $user->email ?></td> <!-- Acessando como objeto -->
                <td>
                    <form action="/admin/assign-group" method="post">
                        <input type="hidden" name="user_id" value="<?= $user->id ?>"> <!-- Acessando como objeto -->
                        <select name="group_id">
                            <?php foreach ($groups as $group): ?>
                                <option value="<?= $group->id ?>"><?= $group->name ?></option> <!-- Acessando como objeto -->
                            <?php endforeach; ?>
                        </select>
                        <button type="submit">Atribuir Grupo</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>