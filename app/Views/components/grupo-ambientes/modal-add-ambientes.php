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
                                        <option value="<?= esc($ambiente['id']) ?>"><?= esc($ambiente['nome']) ?></option>
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


<script src="<?= base_url('assets/vendors/select2/select2.min.js') ?>"></script>
<script src="<?= base_url('assets/js/select2.js') ?>"></script>
<script src="<?= base_url('assets/vendors/typeahead.js/typeahead.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/typeahead.js') ?>"></script>

<style>
    .select2-container--default .select2-selection--multiple {
        background-color: #2a3038;
    }

    .select2-container {
        z-index: 9999;
    }

    .select2-dropdown {
        z-index: 1050;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color: #ffffff;
        border: 0;
        border-radius: 3px;
        padding: 6px;
        font-size: 0.8rem;
        font-family: inherit;


    }
</style>