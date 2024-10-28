<div class="modal fade <?= $size ?? '' ?>" id="modal-cad-prof" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Cadastrar Professor</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form id="cadastrarProfessor" class="forms-sample" method="post" action='<?= $rota ?>'>
                <div class="modal-body">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nome Completo</label>
                        <input type="text" class="form-control" 
                            id="nome" name="nome" placeholder="Digite o nome do professor" 
                            value="<?= esc(old('nome'))?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Matrícula SIAPE</label>
                        <input type="text" class="form-control" 
                            id="siape" name="siape" placeholder="Digite o código do SIAPE"
                            value="<?= esc(old('siape'))  ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">E-Mail</label>
                        <input type="email" class="form-control" 
                            id="email" name="email" placeholder="Digite o email" 
                                value="<?= esc(old('email'))?>">
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