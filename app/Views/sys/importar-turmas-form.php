<div class="page-header">
    <h3 class="page-title">IMPORTAR TURMAS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('/sys/home')?>">Início</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('/sys/turma')?>">Turmas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Importar Turmas</li>
        </ol>
    </nav>
</div>

<?php if (!empty($turmas)): ?>
    <div class="card mt-4">
        <div class="card-body">
            <h4>Listando registros encontrados no arquivo</h4>
            <p>Selecione quais deseja importar, e confirme no botão ao final da listagem</p>
            <form action="<?= base_url('sys/turma/processarImportacao') ?>" method="post">
                <?= csrf_field() ?>
                <div class="table-responsive">
                    <table id="imported-data-table" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" id="select-all" class="form-check-input">
                                        </label>
                                    </div>
                                </th>
                                <th>Código</th>
                                <th>Sigla</th>
                                <th>Ano</th>
                                <th>Semestre</th>
                                <th>Curso</th>
                                <th>Período</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($turmas as $index => $turma): ?>
                                <tr>
                                    <td>
                                        <div class="form-check"                                            
                                            <?php 
                                            if($turma['no_curso'] == 0)
                                            {
                                                echo " data-bs-toggle='tooltip' data-placement='top' title='Curso inexistente no banco de dados. Impossível importar.'";
                                            }
                                            else if(strlen(trim($turma['sigla'])) < 2)
                                            {
                                                echo " data-bs-toggle='tooltip' data-placement='top' title='Sigla inválida, impossível importar.'";
                                            }
                                            ?>
                                            >
                                            <label class="form-check-label">
                                                <input type="checkbox" 
                                                    <?php echo ($turma['no_curso'] == 0 || strlen($turma['sigla']) < 2) ? "disabled" : "checked"; ?>
                                                    name="selecionados[]" 
                                                    class="form-check-input" 
                                                    value="<?= htmlspecialchars(json_encode($turma), ENT_QUOTES, 'UTF-8') ?>"
                                                >
                                            </label>
                                        </div>
                                    </td>
                                    <td><?= esc($turma['codigo']) ?></td>
                                    <td><?= esc($turma['sigla']) ?></td>
                                    <td><?= esc($turma['ano']) ?></td>                                    
                                    <td><?= esc($turma['semestre']) ?></td>
                                    <td><?= esc($turma['curso']) ?></td>
                                    <td><?= esc($turma['periodo']) ?>º</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-success mt-3">Importar Selecionadas</button>
            </form>
        </div>
    </div>
<?php endif; ?>

<script>
    $(document).ready(function()
    {
        document.getElementById('select-all').addEventListener('change', function() 
        {
            const checkboxes = document.querySelectorAll('input[name="selecionados[]"]:not([disabled])');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });

        //Ativa os tooltips dos botões
        $('[data-bs-toggle="tooltip"]').tooltip();
    });    
</script>