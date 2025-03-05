<div class="page-header">
    <h3 class="page-title">RELATÓRIOS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Relatórios</li>
        </ol>
    </nav>
</div>
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Cursos</h4>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="curso">Selecione o curso</label>
              <select class="form-select filtro" id="filtroCurso">
                <option value="">-</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Turmas</h4>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="curso">Selecione a turma</label>
              <select class="form-select filtro" id="filtroTurma">
                <option value="">-</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Professores</h4>
          <form class="form-inline">
            <label class="sr-only" for="inlineFormInputName2">Name</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Informe aqui o nome do professor">
            <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
            <div class="input-group mb-2 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text">@</div>
              </div>
              <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="E-mail">
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Disciplinas</h4>
          <p class="card-description"> Lembre-se de selecionar as demais opções de acordo com os critérios desejados para gerar o relatório. </p>
          <div class="form-group row">
            <div class="col">
              <div id="the-basics">
                <input class="typeahead" type="text" placeholder="Informe aqui o nome da disciplina">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Ambientes</h4>
            <p class="card-description"> Lembre-se de selecionar as demais opções de acordo com os critérios desejados para gerar o relatório. </p>
            <div class="form-group row">
              <div class="col">
                <div id="the-basics">
                  <input class="typeahead" type="text" placeholder="Informe aqui o ambiente">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Grade de horários</h4>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="curso">Selecione a grade</label>
                    <select class="form-select filtro" id="filtroCurso">
                      <option value="">-</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>