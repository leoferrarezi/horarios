<div class="page-header">
    <h3 class="page-title">IMPORTAR CURSOS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('/sys/home')?>">Início</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('/sys/curso')?>">Crusos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Importar Cursos</li>
        </ol>
    </nav>
</div>

<?php if (!empty($cursos)): ?>
    <div class="card mt-4">
        <div class="card-body">
            <h4>Listando registros encontrados no arquivo</h4>
            <p>Selecione quais deseja importar, e confirme no botão ao final da listagem</p>
            <form action="<?= base_url('sys/curso/processarImportacao') ?>" method="post">
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
                                <th>Matriz Curricular</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cursos as $index => $curso): ?>
                                <tr>
                                    <td>
                                        <div class="form-check"                                            
                                            <?php echo (in_array(esc($curso['nome']), $cursosExistentes)) ? " data-bs-toggle='tooltip' data-placement='top' title='Este curso já está cadastrado' " : ""; ?>
                                            <?php echo ($curso['matrizExiste'] == 0 ) ? " data-bs-toggle='tooltip' data-placement='top' title='Esta matriz não existe no sistema, e assim não podemos importar este curso' " : ""; ?>
                                            >
                                            
                                            <label class="form-check-label">
                                                <input 
                                                    type="checkbox"
                                                    name="selecionados[]"
                                                    value="<?= htmlspecialchars(json_encode($curso), ENT_QUOTES, 'UTF-8') ?>"
                                                    class="form-check-input"
                                                    <?php echo (in_array(esc($curso['nome']), $cursosExistentes)) ? " disabled " : ""; ?>
                                                    <?php echo ($curso['matrizExiste'] == 0) ? " disabled " : ""; ?>
                                                >
                                            </label>
                                        </div>
                                    </td>
                                    <td><?= esc($curso['nome']) ?></td>
                                    <td><?= esc($curso['matriz']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-success mt-3">Importar Selecionados</button>
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