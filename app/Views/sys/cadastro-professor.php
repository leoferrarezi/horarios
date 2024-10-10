<div class="page-header">
<h3 class="page-title">CADASTRO DE PROFESSOR</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Professores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro de Professor</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">INSIRA AS INFORMAÇÕES</h4>
                <p class="card-description">Informações Pessoais</p>
                <form id="cadastroProf" class="forms-sample"  method="post" action='<?php echo base_url('sys/professor/salvar')?>'>
                <?= csrf_field() ?> 
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nome Completo</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do professor">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Matrícula SIAPE</label>
                        <input type="text" class="form-control" id="siape" name="siape" placeholder="Digite o código do SIAPE">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">E-Mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email">
                    </div>
                
                    <button type="submit" class="btn btn-primary me-2">Salvar</button>
                    <button class="btn btn-dark">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>