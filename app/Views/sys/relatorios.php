<div class="page-header">
  <h3 class="page-title">RELATÓRIOS</h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
      <li class="breadcrumb-item active" aria-current="page">Relatórios</li>
    </ol>
  </nav>
</div>

<!-- Painel Único de Filtros -->
<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Filtros</h4>

      <!-- Seleção do Tipo de Relatório -->
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="tipoRelatorio">Tipo de Relatório</label>
            <select class="form-control select2-single" id="tipoRelatorio" name="tipoRelatorio">
              <option value="">Selecione um tipo</option>
              <option value="curso">Relatório por Curso</option>
              <option value="professor">Relatório por Professor</option>
              <option value="ambiente">Relatório por Ambiente</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Filtros Dinâmicos -->
      <div id="filtrosDinamicos" class="mt-3">
        <!-- Os filtros serão carregados aqui dinamicamente -->
        <div class="alert alert-info mb-0">
          Selecione um tipo de relatório para exibir os filtros correspondentes
        </div>
      </div>

      <div class="form-group d-flex justify-content-end mt-3">
        <button type="button" id="btnLimpar" class="btn btn-secondary me-2">
          <i class="mdi mdi-filter-remove me-1"></i>Limpar Filtros
        </button>
        <button type="button" id="btnGerarVisualizacao" class="btn btn-primary">
          <i class="mdi mdi-eye-outline me-1"></i>Gerar Visualização
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Área de Resultados -->
<div class="col-md-12 grid-margin stretch-card" id="resultadosContainer" style="display: none;">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Resultados</h4>
        <button type="button" id="btnExportar" class="btn btn-success">
          <i class="mdi mdi-file-export me-1"></i>Exportar Horários
        </button>
      </div>

      <div class="table-responsive">
        <table class="table table-striped" id="tabelaResultados">
          <thead>
            <tr>
              <th>Curso</th>
              <th>Turma</th>
              <th>Disciplina</th>
              <th>Professor</th>
              <th>Ambiente</th>
              <th>Dia</th>
              <th>Hora Início</th>
              <th>Hora Fim</th>
            </tr>
          </thead>
          <tbody>
            <!-- Os resultados serão carregados aqui via AJAX -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Templates para os filtros (hidden) -->
<div style="display:none;">
  <!-- Template para Filtro de Curso -->
  <div id="templateCurso">
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="filtroCurso">Curso</label>
          <select class="form-control select2-multiple" multiple id="filtroCurso" name="cursos[]">
            <option disabled>Selecione um ou mais cursos</option>
            <?php foreach ($cursos as $curso): ?>
              <option value="<?= $curso['id'] ?>"><?= $curso['nome'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="form-group">
          <label for="filtroTurma">Turma</label>
          <select class="form-control select2-multiple" multiple id="filtroTurma" name="turmas[]" disabled>
            <option disabled>Selecione um curso primeiro</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <!-- Template para Filtro de Professor -->
  <div id="templateProfessor">
    <div class="row">
      <div class="col-md-12 mb-3">
        <div class="form-group">
          <label for="filtroProfessor">Professor(a)</label>
          <select class="form-control select2-multiple" multiple id="filtroProfessor" name="professores[]">
            <option disabled>Selecione um ou mais professores</option>
            <?php foreach ($professores as $professor): ?>
              <option value="<?= $professor['id'] ?>"><?= $professor['nome'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>
  </div>

  <!-- Template para Filtro de Ambiente -->
  <div id="templateAmbiente">
    <div class="row">
      <div class="col-md-12 mb-3">
        <div class="form-group">
          <label for="filtroAmbiente">Ambiente</label>
          <select class="form-control select2-multiple" multiple id="filtroAmbiente" name="ambientes[]">
            <option disabled>Selecione um ou mais ambientes</option>
            <?php foreach ($ambientes as $ambiente): ?>
              <option value="<?= $ambiente['id'] ?>"><?= $ambiente['nome'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    // Configurações CSRF
    var csrfName = '<?= csrf_token() ?>';
    var csrfHash = '<?= csrf_hash() ?>';

    // Configura o cabeçalho CSRF para todas as requisições AJAX
    $.ajaxSetup({
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        [csrfName]: csrfHash
      }
    });

    // Inicializa os selects
    $(".select2-single").select2({
      placeholder: "Selecione uma opção",
      allowClear: true,
      width: '100%',
    });

    // Evento quando o tipo de relatório é alterado
    $('#tipoRelatorio').on('change', function() {
      var tipo = $(this).val();
      var filtrosContainer = $('#filtrosDinamicos');

      // Limpa os filtros atuais
      filtrosContainer.empty();

      // Carrega os filtros correspondentes
      switch (tipo) {
        case 'curso':
          filtrosContainer.html($('#templateCurso').html());
          break;
        case 'professor':
          filtrosContainer.html($('#templateProfessor').html());
          break;
        case 'ambiente':
          filtrosContainer.html($('#templateAmbiente').html());
          break;
        default:
          filtrosContainer.html('<div class="alert alert-info mb-0">Selecione um tipo de relatório para exibir os filtros correspondentes</div>');
          return;
      }

      setTimeout(function() {
        // Inicializa os selects múltiplos
        filtrosContainer.find('.select2-multiple').select2({
          placeholder: "Selecione uma ou mais opções",
          allowClear: true,
          width: '100%'
        });

        // Configura eventos para os filtros de curso
        if (tipo === 'curso') {
          filtrosContainer.find('#filtroCurso').on('change', function() {
            var cursos = $(this).val();
            var turmaSelect = filtrosContainer.find('#filtroTurma');

            if (cursos && cursos.length > 0) {
              turmaSelect.prop('disabled', false);
              carregarTurmasPorCurso(cursos);
            } else {
              turmaSelect.prop('disabled', true)
                .val(null)
                .trigger('change');
            }
          });
        }
      }, 50);
    });

    // Função para carregar turmas por curso
    function carregarTurmasPorCurso(cursos) {
      var turmaSelect = $('#filtroTurma');
      turmaSelect.empty().append('<option value="">Carregando...</option>').trigger('change');

      $.ajax({
        url: '<?= base_url('sys/relatorios/getTurmasByCurso') ?>',
        type: 'POST',
        data: {
          cursos: cursos,
          [csrfName]: csrfHash
        },
        dataType: 'json',
        success: function(response) {
          turmaSelect.empty();
          if (response && response.length > 0) {
            turmaSelect.append('<option disabled>Selecione uma ou mais turmas</option>');
            $.each(response, function(index, item) {
              turmaSelect.append(new Option(item.text, item.id));
            });
          } else {
            turmaSelect.append('<option disabled>Nenhuma turma disponível</option>');
          }
          turmaSelect.trigger('change');
        },
        error: function(xhr, status, error) {
          console.error('Erro ao carregar turmas:', error);
          turmaSelect.empty().append('<option disabled>Erro ao carregar turmas</option>').trigger('change');
        }
      });
    }

    // Botão Gerar Visualização
    $('#btnGerarVisualizacao').on('click', function() {
      var tipo = $('#tipoRelatorio').val();

      if (!tipo) {
        // Alerta estilo do sistema
        $.toast({
          heading: 'Atenção',
          text: 'Selecione um tipo de relatório primeiro',
          showHideTransition: 'slide',
          icon: 'warning',
          loaderBg: '#f96868',
          position: 'top-center'
        });
        return;
      }

      var dados = {
        tipo: tipo,
        [csrfName]: csrfHash
      };

      // Adiciona os filtros específicos
      switch (tipo) {
        case 'curso':
          dados.cursos = $('#filtroCurso').val();
          dados.turmas = $('#filtroTurma').val();
          break;
        case 'professor':
          dados.professores = $('#filtroProfessor').val();
          break;
        case 'ambiente':
          dados.ambientes = $('#filtroAmbiente').val();
          break;
      }

      // Verifica se pelo menos um filtro está preenchido
      var filtroPreenchido = false;
      for (var key in dados) {
        if (key !== 'tipo' && key !== csrfName && dados[key] && dados[key].length > 0) {
          filtroPreenchido = true;
          break;
        }
      }

      if (!filtroPreenchido) {
        $.toast({
          heading: 'Atenção',
          text: 'Selecione pelo menos um filtro para gerar o relatório',
          showHideTransition: 'slide',
          icon: 'warning',
          loaderBg: '#f96868',
          position: 'top-center'
        });
        return;
      }

      // Mostra o loading no estilo do sistema
      var loading = $.toast({
        heading: 'Carregando dados...',
        text: 'Por favor aguarde',
        showHideTransition: 'fade',
        icon: 'info',
        hideAfter: false,
        position: 'top-center',
        bgColor: '#191c24'
      });

      // Faz a requisição AJAX para carregar os dados
      $.ajax({
        url: '<?= base_url('sys/relatorios/filtrar') ?>',
        type: 'POST',
        data: dados,
        dataType: 'json',
        success: function(response) {
          // Fecha o loading
          $.toast().reset('all');

          if (response.success && response.data && response.data.length > 0) {
            // Preenche a tabela com os resultados
            var tbody = $('#tabelaResultados tbody');
            tbody.empty();

            $.each(response.data, function(index, item) {
              var row = $('<tr>');
              row.append($('<td>').text(item.curso || ''));
              row.append($('<td>').text(item.turma || ''));
              row.append($('<td>').text(item.disciplina || ''));
              row.append($('<td>').text(item.professor || ''));
              row.append($('<td>').text(item.ambiente || ''));
              row.append($('<td>').text(getDiaSemana(item.dia_semana)));
              row.append($('<td>').text(item.hora_inicio || ''));
              row.append($('<td>').text(item.hora_fim || ''));

              tbody.append(row);
            });

            // Mostra a área de resultados
            $('#resultadosContainer').show();
          } else {
            // Alerta de nenhum resultado no estilo do sistema
            $.toast({
              heading: 'Nenhum resultado',
              text: 'Não foram encontrados registros com os filtros selecionados',
              showHideTransition: 'slide',
              icon: 'info',
              loaderBg: '#46c35f',
              position: 'top-center'
            });
            $('#resultadosContainer').hide();
          }
        },
        error: function(xhr, status, error) {
          // Fecha o loading
          $.toast().reset('all');

          // Alerta de erro no estilo do sistema
          $.toast({
            heading: 'Erro',
            text: 'Ocorreu um erro ao carregar os dados. Por favor, tente novamente.',
            showHideTransition: 'slide',
            icon: 'error',
            loaderBg: '#f96868',
            position: 'top-center'
          });
          console.error('Erro ao carregar dados:', error);
        }
      });
    });

    // Função para converter número do dia da semana para nome
    function getDiaSemana(dia) {
      var dias = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'];
      return dias[dia] || dia;
    }

    // Botão Exportar (sem funcionalidade por enquanto)
    $('#btnExportar').on('click', function() {
      alert("🚧 ATENÇÃO 🚧\n\nÁrea em construção!\n\nNossos programadores estão trabalhando duro (ou pelo menos é o que dizem)...");
    });

    // Botão Limpar
    $('#btnLimpar').on('click', function() {
      // Limpa todos os selects
      $('.select2-single, .select2-multiple').val(null).trigger('change');

      // Reseta o tipo de relatório
      $('#tipoRelatorio').val('').trigger('change');

      // Reseta os filtros dinâmicos
      $('#filtrosDinamicos').html('<div class="alert alert-info mb-0">Selecione um tipo de relatório para exibir os filtros correspondentes</div>');

      // Esconde a área de resultados
      $('#resultadosContainer').hide();
    });
  });
</script>