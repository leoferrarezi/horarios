<div class="modal fade" id="modal-cad-aula" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Cadastrar Aula</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="cadastrarAula" class="forms-sample" method="post" action='<?php echo base_url('sys/aulas/salvar'); ?>'>
                <div class="modal-body">
                    <?php echo csrf_field() ?>

                    <div class="form-group">
                        <label for="curso">Curso</label>
                        <select class="form-select" id="curso" name="curso">
                            <?php foreach ($cursos as $curso): ?>
                                <option value="<?php echo esc($curso['id']) ?>"><?php echo esc($curso['nome']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Turma(s)</label>
                        <select class="select2-turmas" name="turmas[]" multiple="multiple" style="width:100%;">
                            <!-- preenchido dinamicamente -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="disciplina">Disciplina</label>
                        <select class="form-select" id="disciplina" name="disciplina">
                            <!-- preenchido dinamicamente -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="professores">Professor(es)</label>
                        <select class="select2-professores" name="professores[]" multiple="multiple" style="width:100%;">
                            <?php foreach ($professores as $professor): ?>
                                <option value="<?= esc($professor['id']) ?>"><?= esc($professor['nome']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary me-2">Salvar</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let cursos = [
        <?php foreach ($cursos as $curso): ?>
            {
                "id": "<?php echo $curso['id'] ?>","nome": "<?php echo $curso['nome'] ?>","matriz": "<?php echo $curso['matriz_id'] ?>"
            },
        <?php endforeach; ?>
    ];

    let turmas = [
        <?php foreach ($turmas as $turma): ?>
            {
                "id": "<?php echo $turma['id'] ?>","sigla": "<?php echo $turma['sigla'] ?>","curso": "<?php echo $turma['curso_id'] ?>"
            },
        <?php endforeach; ?>
    ];

    let disciplinas = [
        <?php foreach ($disciplinas as $disciplina): ?>
            {
                "id": "<?php echo $disciplina['id'] ?>", "nome": "<?php echo $disciplina['nome'] ?>", "matriz": "<?php echo $disciplina['matriz_id'] ?>"
            },
        <?php endforeach; ?>
    ];    

    function updateSelectTurmas() {
        $('.select2-turmas').empty();
        turmas.forEach(function(obj) {
            if (obj.curso == $("#curso option:selected").val()) {
                $(".select2-turmas").append($('<option>', {
                    value: obj.id,
                    text: obj.sigla
                }));
            }
        });
    }

    function getMatrizFromCurso() {
        var matriz = -1;
        cursos.forEach(function(obj) {
            if(obj.id == $("#curso option:selected").val()) {
                matriz = obj.matriz;
            }
        });
        return matriz;
    }

    function updateSelectDisciplinas() {
        let matriz = getMatrizFromCurso();
        $('#disciplina').empty();
        disciplinas.forEach(function(obj) {
            if (obj.matriz == matriz) {
                $("#disciplina").append($('<option>', {
                    value: obj.id,
                    text: obj.nome
                }));
            }
        });
    }

    (function($) {
        'use strict';

        updateSelectTurmas();
        updateSelectDisciplinas();

        if ($(".select2-turmas").length) {
            $(".select2-turmas").select2({
                language: {
                    noResults:function(){
                        return"Nenhum resultado encontrado"
                    }
                }
            });
        }

        if ($(".select2-professores").length)
            $(".select2-professores").select2();

        $("#curso").on("change", function() {
            updateSelectTurmas();
            updateSelectDisciplinas();
        });

    })(jQuery);
</script>