<div class="page-header">
    <h3 class="page-title">IMPORTAR DISCIPLINAS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('/sys/home')?>">Início</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('/sys/matriz')?>">Matrizes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Importar Disciplinas</li>
        </ol>
    </nav>
</div>

<?php if (!empty($disciplinas)): ?>
    <div class="card mt-4">
        <div class="card-body">
            <h4>Listando registros encontrados no arquivo</h4>
            <p>Selecione quais deseja importar, e confirme no botão ao final da listagem</p>
            <form action="<?= base_url('sys/matriz/processarImportacaoDisciplinas') ?>" method="post">
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
                                <th>Nome</th>
                                <th>Código</th>
                                <th>Período</th>
                                <th>CH</th>
                                <th>Max Tempos/Dia</th>                                
                                <th>Aberviatura</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($disciplinas as $index => $disciplina): ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" checked name="selecionados[]" class="form-check-input" value="<?= htmlspecialchars(json_encode($disciplina), ENT_QUOTES, 'UTF-8') ?>">
                                            </label>
                                        </div>
                                    </td>
                                    <td><?= esc($disciplina['nome']) ?></td>
                                    <td><?= esc($disciplina['codigo']) ?></td>
                                    <td><?= esc($disciplina['periodo']) ?></td>                                    
                                    <td><?= esc($disciplina['ch']) ?></td>
                                    <td><?= esc($disciplina['max_tempos_diarios']) ?></td>
                                    <td><?= esc($disciplina['abreviatura']) ?></td>
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
    $(document).ready(function(){
        document.getElementById('select-all').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('input[name="selecionados[]"]:not([disabled])');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });

        //Ativa os tooltips dos botões
        $('[data-bs-toggle="tooltip"]').tooltip();
    });    
</script>