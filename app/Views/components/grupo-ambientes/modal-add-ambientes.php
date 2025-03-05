<?php if (!empty($grupos)): ?>
    <?php foreach ($grupos as $grupo): ?>
        <div class="modal fade" id="modal-add-ambientes-gp-<?= $grupo['id'] ?>" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Adicionar Ambientes ao Grupo: <?= esc($grupo['nome']) ?></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="addAmbientesGrupo-<?= $grupo['id'] ?>" class="forms-sample" method="post" action='<?php echo base_url('sys/cadastro-ambientes/adicionar-ambientes-grupo'); ?>'>
                        <div class="modal-body">
                            <?php echo csrf_field(); ?>
                            <!-- ID do grupo sendo passado para o formulário -->
                            <input type="hidden" name="idGrupo" value="<?= $grupo['id']; ?>">

                            <div class="form-group">
                                <label>Selecione os Ambientes</label>
                                <select class="js-example-basic-multiple" name="ambientes[]" multiple="multiple" style="width:100%;">
                                    <?php foreach ($ambientes as $ambiente): ?>
                                        <?php
                                        $isAssigned = in_array($ambiente['id'], array_column($grupo['ambientes'], 'id'));
                                        ?>
                                        <option value="<?= esc($ambiente['id']) ?>" <?= $isAssigned ? 'selected' : '' ?>>
                                            <?= esc($ambiente['nome']) ?>
                                        </option>
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
    <?php endforeach; ?>
<?php endif; ?>


<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();

        $(form[id ^= "addAmbientesGrupo-"]).on('submit', function(e) {
            const selectElement = $(this).find('select[name="ambientes[]"]');

            const selectedOptions = selectElement.select2('data');

            selectedOptions.forEach(function(option) {
                const optionElement = selectElement.find('option[value="' + option.id + '"]');
                optionElement.removeAttr('selected');
            });
        });
    });
</script>