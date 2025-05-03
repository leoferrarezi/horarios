<div class="page-header">
  <h3 class="page-title">RELATÓRIOS</h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
      <li class="breadcrumb-item active" aria-current="page">Relatórios</li>
    </ol>
  </nav>
</div>
<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Cursos</h4>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="curso">Informe o curso</label>
            <select class="js-example-basic-multiple" multiple="multiple" style="width:100%;" id="filtroCurso">
              <option value="ADS">Analise e Desenvolvimento de Sistemas</option>
              <option value="EC">Engenharia Cívil</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="curso">Informe a turma</label>
            <select class="js-example-basic-multiple" multiple="multiple" style="width:100%;" id="filtroTurma">
              <option value="1">Turma 1</option>
              <option value="2">Turma 2</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group d-flex mb-2">
        <button type="submit" class="btn btn-primary"><i class="mdi mdi mdi-filter me-1"></i>Filtrar</button>
        <button type="submit" class="btn btn-primary ms-2"><i class="mdi mdi mdi-filter-remove me-1"></i>Limpar Filtro</button>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Professores</h4>
        <div class="col-md-12">
          <div class="form-group">
            <label for="professor">Informe o professor</label>
            <select class="js-example-basic-multiple" multiple="multiple" style="width:100%;" id="filtroProfessor">
              <option value="Cleyton Pereira dos Santos">Cleyton Pereira dos Santos</option>
              <option value="Leandro Ferrarezi Valiante">Leandro Ferrarezi Valiante</option>
              <option value="Sabrina Maria Rodrigues Feliciano da Silva">Sabrina Maria Rodrigues Feliciano da Silva</option>
              <option value="Wiilians de Paula Pereira">Willians de Paula Pereira</option>
            </select>
          </div>
        </div>
        <div class="form-group d-flex mb-2">
          <button type="submit" class="btn btn-primary"><i class="mdi mdi mdi-filter me-1"></i>Filtrar</button>
          <button type="submit" class="btn btn-primary ms-2"><i class="mdi mdi mdi-filter-remove me-1"></i>Limpar Filtro</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ambientes</h4>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="ambientes">Ambientes</label>
              <select class="js-example-basic-multiple" multiple="multiple" style="width:100%;" id="filtroAmbientes">
                <option value="Laboratório de Informática 129">Laboratório de Informática 129</option>
                <option value="Laboratório de Informática 232">Laboratório de Informática 232</option>
                <option value="Sala 1">Sala 1</option>
                <option value="Sala 30">Sala 30</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="grupo">Grupo de Ambientes</label>
              <select class="js-example-basic-multiple" multiple="multiple" style="width:100%;" id="filtroGrupo">
                <option value="Laboratórios de Informática 40 alunos">Laboratórios de Informática 40 alunos</option>
                <option value="Salas reduzidas">Salas reduzidas</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group d-flex mb-2">
          <button type="submit" class="btn btn-primary"><i class="mdi mdi mdi-filter me-1"></i>Filtrar</button>
          <button type="submit" class="btn btn-primary ms-2"><i class="mdi mdi mdi-filter-remove me-1"></i>Limpar Filtro</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Referente select2 do filtro -->
<script>
  (function($) {
    'use strict';
    if ($(".js-example-basic-multiple").length) {
      $(".js-example-basic-multiple").select2();
    }
  })(jQuery);
</script>