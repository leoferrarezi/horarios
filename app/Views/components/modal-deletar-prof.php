<div class="modal fade <?= $size ?? '' ?>" id="modal-deletar-professor" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Deletar Professor</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="deletarProfessor" method="post">
            <?= csrf_field() ?>
                <div class="modal-body">
                    <strong>O registro:</strong><br>
                    <table class="table mb-4">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Matrícula</th>
                                <th>Email</th>                                
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td id="Registro-id"></td>
                            <td id="Registro-nome"></td>
                            <td id="Registro-siape"></td>
                            <td id="Registro-email"></td>
                        <tr>
                        </tbody>
                    </table>
                    <strong>será apagado permanentemente!</strong>
                    <!-- <div class="alert alert-danger">
                        O registro: <br>
                        <span id="Registro-nome"></span><br>
                        <span id="Registro-nome"></span><br>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger me-2">Excluir</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>