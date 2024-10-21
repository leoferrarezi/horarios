<div class="page-header">
    <h3 class="page-title">CADASTRO DE CURSOS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Cursos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro de Curso</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">INSIRA AS INFORMAÇÕES</h4>
                <p class="card-description">Informações Cadastrais</p>
                <?php if (!empty($erros)): ?>
                    <?php foreach ($erros as $campo => $erro): ?>
                        <div class="alert alert-fill-danger" role="alert">
                            <i class="mdi mdi-alert-circle"></i> <?php echo esc($erro) ?>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>

                <form id="cadastroCursos" class="forms-sample" method="post" action='<?php echo base_url('sys/cursos/salvar') ?>'>
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Nome do Curso</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do curso" value="<?php echo (isset($campos['cursos'])) ? $campos['cursos'] : "";  ?>">
                    </div>
                    <div class="form-group">
                        <a class="btn btn-success btn-icon-text">
                            <i class="fa fa-upload btn-icon-prepend"></i> Importar Curso
                        </a>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Salvar</button>
                    <!--<button class="btn btn-dark">Cancelar</button>-->
                </form>
            </div>
        </div>
    </div>
</div>