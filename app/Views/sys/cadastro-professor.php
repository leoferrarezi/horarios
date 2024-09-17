<div class="page-header">
    <h3 class="page-title">Professores</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Professores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro de Professores</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cadastro de Professores</h4>
                <p class="card-description">Informações Pessoais</p>
                <form id="cadastroProfessor" class="forms-sample"  method="post" action="#">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nome Completo</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Matrícula SIAPE</label>
                        <input type="text" class="form-control" id="siape" name="siape" placeholder="Digite seu código SIAPE">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">E-Mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
                    </div>
                
                    <button type="submit" class="btn btn-primary me-2">Salvar</button>
                    <button class="btn btn-dark">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>