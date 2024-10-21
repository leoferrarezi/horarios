<div class="page-header">
    <h3 class="page-title">CADASTRO DE DISCIPLINA</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Disciplinas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro de Disciplina</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">INSIRA AS INFORMAÇÕES</h4>
                <p class="card-description">Informações da Disciplina</p>
                <form id="cadastroDisciplina" class="forms-sample" method="post" action="#">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da disciplina">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Código</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Exemplos: TCN.0281 , INT.0031">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Carga Horária</label>
                        <input type="number" class="form-control" id="carga_horaria" name="carga_horaria" placeholder="Digite a carga horária">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tempos de Aula Diária</label>
                        <input type="number" class="form-control" id="maximo_tempo" name="maximo_tempo" placeholder="Digite o MÁXIMO de tempos de aula diária">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Período</label>
                        <input type="number" class="form-control" id="periodo" name="periodo" placeholder="Digite o período">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Sigla/Abreviatura</label>
                        <input type="text" readonly class="form-control" id="abreviatura" name="abreviatura">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Selecione o ambiente</label>
                        <select class="form-select form-select-lg" id="exampleFormControlSelect1">
                            <option>Selecione o ambiente</option>
                            <option>Laboratório</option>
                            <option>Sala de Aula</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Salvar</button>
                    <button class="btn btn-dark">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>