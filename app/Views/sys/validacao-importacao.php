<div class="page-header">
    <h3 class="page-title">Validar importação de Professores</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Professores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Importar Professor</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">LISTA DE PROFESSORES</h4>
                </p>
                <div class="table-responsive">
                    <form id="valicaoImportacao" class="forms-sample" method="post" action="#">
                        <table class="table mb-4">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nome</th>
                                    <th>Matrícula do Siap</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                    </td>
                                    <td>João da Silva</td>
                                    <td>1234567</td>
                                    <td>joao@email.com</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                    </td>
                                    <td>Maria Joaquina</td>
                                    <td>7654321</td>
                                    <td>maria@email.com</td>
                                </tr>
                                <tr>
                                    <td class="py-4 text-muted">Matrícula já cadastrada</td>
                                    <td class="text-muted">Joana Souza</td>
                                    <td class="text-muted">7654321</td>
                                    <td class="text-muted">joana@email.com</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                    </td>
                                    <td>Gabriela Carioca</td>
                                    <td>7415263</td>
                                    <td>gabriela.carioca@gmail.com</td>
                                </tr>
                                <tr>
                                    <td class="py-4 text-muted">Matrícula já cadastrada</td>
                                    <td class="text-muted">Leandro Ferrarezzi</td>
                                    <td class="text-muted">9876541</td>
                                    <td class="text-muted">leo@gmail.com</td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary me-2">Importar</button>
                        <button class="btn btn-dark">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>