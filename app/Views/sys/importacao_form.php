<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Importar Planilha </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('sys/professor'); ?>">Professores</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Importar Planilha</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Selecione e Envie o Arquivo</h4>
                <form action="<?=base_url('sys/importacao/importar')?>" method="post" enctype="multipart/form-data">
                    <?=csrf_field()?>
                    <div class="form-group">
                        <label for="arquivo">Arquivo (XLS ou XLSX):</label>
                        <input type="file" name="arquivo" id="arquivo" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Enviar</button>
                </form>
            </div>
        </div>

        <?php if (!empty($professores)): ?>
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">Dados Importados</h4>
                    <form action="<?=base_url('sys/importacao/salvar')?>" method="post">
                        <?=csrf_field()?>
                        <div class="table-responsive">
                            <table id="imported-data-table" class="table">
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
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Importar Selecionados</button>
                    </form>
                </div>
            </div>
        <?php endif;?>
    </div>
</div>

<script>
    document.getElementById('select-all').addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('input[name="selecionados[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    // Inicializa o DataTable na tabela de dados importados
    document.addEventListener('DOMContentLoaded', function () {
        $('#imported-data-table').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
            },
            
        });
    });
</script>

<!-- Adicione os estilos e scripts do DataTables -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="//cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
