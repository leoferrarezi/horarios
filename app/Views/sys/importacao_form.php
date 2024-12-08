<div class="container">
    <h3>Importar Planilha</h3>
    <form action="<?=base_url('sys/importacao/importar')?>" method="post" enctype="multipart/form-data">
    <?=csrf_field()?>
        <div class="form-group">
            <label for="arquivo">Selecione o arquivo (XLS ou XLSX):</label>
            <input type="file" name="arquivo" id="arquivo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Enviar</button>
    </form>

    <?php if (!empty($professores)): ?>
        <hr>
        <h4>Dados Importados</h4>
        <form action="<?=base_url('sys/importacao/salvar')?>" method="post">
        <?=csrf_field()?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>Nome</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($professores as $index => $professor): ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="selecionados[]" value="<?=htmlspecialchars(json_encode($professor), ENT_QUOTES, 'UTF-8')?>">
                            </td>
                            <td><?=esc($professor['nome'])?></td>
                            <td><?=esc($professor['email'])?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Importar Selecionados</button>
        </form>
    <?php endif;?>
</div>

<script>
    document.getElementById('select-all').addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('input[name="selecionados[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });
</script>
