<div class="page-header">
    <h3 class="page-title">IMPORTAR PROFESSORES</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Professores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Importação de Professor</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">INSIRA O ARQUIVO IMPORTADO DO SUAP</h4>
                <p class="card-description"> Arquivos suportados: <code>.xls</code></p>
                <form id="uploadProfessor" enctype="multipart/form-data" class="forms-sample" method="post" action="#">
                    <div class="form-group">
                        <label>Enviar Arquivo</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12 d-flex align-items-center">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Enviar Arquivo">
                            <span class="input-group-append ms-2">
                                <button class="file-upload-browse btn btn-primary" type="button">Selecionar Arquivo</button>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Enviar</button>
                    <button class="btn btn-dark">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>