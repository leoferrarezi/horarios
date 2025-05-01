<div class="modal fade" id="modal-edit-aula" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Editar Aula</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="editarAula" class="forms-sample" method="post" action='<?php echo base_url('sys/aulas/atualizar'); ?>'>
                <div class="modal-body">

                    <?php echo csrf_field() ?>

                    <input type="hidden" id="edit-id" name="id" />

                    <div class="form-group">
                        <label for="curso">Curso</label>
                        <select class="form-select" id="cursoEdit" name="cursoEdit">
                            <?php foreach ($cursos as $curso): ?>
                                <option value="<?php echo esc($curso['id']) ?>"><?php echo esc($curso['nome']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Turma(s)</label>
                        <select class="form-select" id="turmaEdit" name="turma">
                            <!-- preenchido dinamicamente -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="disciplinaEdit">Disciplina</label>
                        <select class="form-select" id="disciplinaEdit" name="disciplina" style="width:100%;">
                            <!-- preenchido dinamicamente -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="professores">Professor(es)</label>
                        <select class="select2-professoresEdit" id="professoresEdit" name="professores[]" multiple="multiple" style="width:100%;" required>
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

    function updateSelectTurmasEdit() {
        $('#turmaEdit').empty();
        turmas.forEach(function(obj) {
            if (obj.curso == $("#cursoEdit option:selected").val()) {
                $("#turmaEdit").append($('<option>', {
                    value: obj.id,
                    text: obj.sigla
                }));
            }
        });
    }

    function getMatrizFromCursoEdit() {
        var matriz = -1;
        cursos.forEach(function(obj) {
            if(obj.id == $("#cursoEdit option:selected").val()) {
                matriz = obj.matriz;
            }
        });
        return matriz;
    }

    function updateSelectDisciplinasEdit() {
        let matriz = getMatrizFromCursoEdit();
        $('#disciplinaEdit').empty();
        disciplinas.forEach(function(obj) {
            if (obj.matriz == matriz) {
                $("#disciplinaEdit").append($('<option>', {
                    value: obj.id,
                    text: obj.nome
                }));
            }
        });
    }

    (function($) {
        'use strict';

        if ($(".select2-professoresEdit").length) {
            $(".select2-professoresEdit").select2({
                language: {
                    noResults:function(){
                        return"Nenhum resultado encontrado"
                    }
                },
                dropdownParent: $('#modal-edit-aula')
            });
        }

        if ($("#disciplinaEdit").length) {
            $("#disciplinaEdit").select2({
                language: {
                    noResults:function(){
                        return"Nenhum resultado encontrado"
                    }
                },
                dropdownParent: $('#modal-edit-aula')
            });
        }

        $("#cursoEdit").on("change", function() {
            updateSelectTurmasEdit();
            updateSelectDisciplinasEdit();
        });

    })(jQuery);
    
</script>