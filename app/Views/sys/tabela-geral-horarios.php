<!-- incluir os componentes modais antes do restante do documento -->

<div class="page-header">
    <h3 class="page-title">TABELA GERAL DE HORÁRIOS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tabela Geral de Horários</li>
        </ol>
    </nav>
</div>

<!-- Filtro -->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Filtros</h4>
                <div class="row">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="curso">Curso</label>
                                <select class="js-example-basic-multiple" multiple="multiple" style="width:100%" id="curso">
                                    <option value="ADS">Análise e Desenvolvimento de Sistemas</option>
                                    <option value="ECA">Engenharia de Controle e Automação</option>
                                    <option value="FIS">Licenciatura em Física</option>
                                    <option value="INFO">Técnico em Informática</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="turma">Turma</label>
                                <select class="js-example-basic-multiple" multiple="multiple" style="width:100%" id="turma">
                                    <option value="1">1º período </option>
                                    <option value="2">2º período </option>
                                    <option value="3">3º período </option>
                                    <option value="4">4º período </option>
                                    <option value="5">1º A </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="turma">Professor</label>
                                <select class="js-example-basic-single" style="width:100%" id="professor">
                                    <option value="0">-</option>
                                    <option value="1">Professor Artur</option>
                                    <option value="2">Professora Berenice</option>
                                    <option value="3">Professor Carlos</option>
                                    <option value="4">Professor Daniel</option>
                                    <option value="5">Professora Elaine</option>
                                    <option value="6">Professor Francisca</option>
                                    <option value="7">Professor Glória</option>
                                    <option value="8">Professor Hugo</option>
                                    <option value="9">Professor Ilda</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="turma">Ambiente</label>
                                <select class="js-example-basic-single" style="width:100%" id="ambiente">
                                    <option value="0">-</option>
                                    <option value="1">Sala 101</option>
                                    <option value="2">Sala 102</option>
                                    <option value="3">Sala 103</option>
                                    <option value="4">Sala 104</option>
                                    <option value="5">Laboratório 1</option>
                                    <option value="6">Quadra A</option>
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
        </div>
    </div>
</div>

<!-- Tabela da Manhã-->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="accordion accordion-solid-header" id="accordion-4" role="tablist">
                    <div class="card">
                        <div class="card-header" role="tab" id="heading-10">
                            <h4 class="mb-0">
                                <a data-bs-toggle="collapse" href="#collapse-10" aria-expanded="true" aria-controls="collapse-10"><i class="mdi mdi mdi-menu-down me-1"></i> Horários da Manhã (Ténico em Informática 1º A)</a>
                            </h4>
                        </div>
                        <div id="collapse-10" class="collapse show" role="tabpanel" aria-labelledby="heading-10" data-bs-parent="#accordion-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="tabela-horarios-manha" class="table mb-4">

                                                <!-- Cabeçalho da Tabela -->
                                                <thead>
                                                    <tr>
                                                        <th>Horário</th>
                                                        <th data-diadasemana="Segunda">Segunda-Feira</th>
                                                        <th data-diadasemana="Terça">Terça-Feira</th>
                                                        <th data-diadasemana="Quarta">Quarta-Feira</th>
                                                        <th data-diadasemana="Quinta">Quinta-Feira</th>
                                                        <th data-diadasemana="Sexta">Sexta-Feira</th>
                                                        <th data-diadasemana="Sábado">Sábado</th>
                                                    </tr>
                                                </thead>

                                                <!-- Corpo da Tabela -->
                                                <tbody>
                                                    <tr>
                                                        <td>07:30 - 08:20</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="Matemática" data-professor="Artur" data-ambiente="Sala 101">
                                                            <div><span data-label="disciplina">Matemática</span></div>
                                                            <div>Professor(a):<span data-label="professor">Artur</span></div>
                                                            <div><span data-label="ambiente">Sala 101</span></div>
                                                            <div>
                                                                <span class="badge badge-pill badge-warning" title="Bloqueado"><i class="mdi mdi mdi-lock me-1"></i> Bloqueado</span>
                                                            </div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="Matemática" data-professor="Artur" data-ambiente="Sala 101">
                                                            <div><span data-label="disciplina">Matemática</span></div>
                                                            <div>Professor(a): <span data-label="professor">Artur</span></div>
                                                            <div><span data-label="ambiente">Sala 101</span></div>
                                                            <div>
                                                                <span class="badge badge-pill badge-danger" title="Conflito de Horário"><i class="mdi mdi mdi-alert me-1"></i> Conflito de Horário</span>
                                                            </div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="Língua Portuguesa" data-professor="Elaine" data-ambiente="Sala 101">
                                                            <div><span data-label="disciplina"></span>Língua Portuguesa</div>
                                                            <div>Professora(a): <span data-label="professor"></span>Elaine</div>
                                                            <div><span data-label="ambiente"></span> Sala 101</div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="Geografia" data-professor="Francisca" data-ambiente="Sala 102">
                                                            <div><span data-label="disciplina">Geografia</span></div>
                                                            <div>Professora(a): <span data-label="professor"></span>Francisca</div>
                                                            <div><span data-label="ambiente">Sala 102</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>08:20 - 09:10</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="Matemática" data-professor="Artur" data-ambiente="Sala 101">
                                                            <div><span data-label="disciplina">Matemática</span></div>
                                                            <div>Professor(a):<span data-label="professor">Artur</span></div>
                                                            <div><span data-label="ambiente">Sala 101</span></div>
                                                            <div><span class="badge badge-pill badge-warning" title="Bloqueado"><i class="mdi mdi mdi-lock me-1"></i> Bloqueado</span>
                                                            </div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="Matemática" data-professor="Artur" data-ambiente="Sala 101">
                                                            <div><span data-label="disciplina">Matemática</span></div>
                                                            <div>Professor(a): <span data-label="professor">Artur</span></div>
                                                            <div><span data-label="ambiente">Sala 101</span></div>
                                                            <div>
                                                                <span class="badge badge-pill badge-danger" title="Conflito de Horário"><i class="mdi mdi mdi-alert me-1"></i> Conflito de Horário</span>
                                                            </div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="Língua Portuguesa" data-professor="Elaine" data-ambiente="Sala 101">
                                                            <div><span data-label="disciplina"></span>Língua Portuguesa</div>
                                                            <div>Professor(a): <span data-label="professor"></span>Elaine</div>
                                                            <div><span data-label="ambiente"></span> Sala 101</div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="Geografia" data-professor="Francisca" data-ambiente="Sala 102">
                                                            <div><span data-label="disciplina">Geografia</span></div>
                                                            <div>Professor(a): <span data-label="professor"></span>Francisca</div>
                                                            <div><span data-label="ambiente">Sala 102</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>09:10 - 10:00</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="Língua Portuguesa" data-professor="Elaine" data-ambiente="Sala 101">
                                                            <div><span data-label="disciplina"></span>Língua Portuguesa</div>
                                                            <div>Professor(a): <span data-label="professor"></span>Elaine</div>
                                                            <div><span data-label="ambiente"></span> Sala 101</div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>10:15 - 11:05</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>11:05 - 11:55</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="Educação Física" data-professor="Hugo" data-ambiente="Quadra A">
                                                            <div><span data-label="disciplina">Educação Física</span></div>
                                                            <div>Professor(a)<span data-label="professor">Hugo</span></div>
                                                            <div><span data-label="ambiente">Quadra A</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>11:55 - 12:45</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="Educação Física" data-professor="Hugo" data-ambiente="Quadra A">
                                                            <div><span data-label="disciplina">Educação Física</span></div>
                                                            <div>Professor(a)<span data-label="professor">Hugo</span></div>
                                                            <div><span data-label="ambiente">Quadra A</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="form-group d-flex">
                                                <button type="submit" class="btn btn-success btn-sm ms-2" onclick="showSwal('warning-message-and-cancel')"><i class="mdi mdi mdi mdi-floppy me-1"></i>Salvar</button>
                                                <button type="submit" class="btn btn-primary ms-2"><i class="mdi mdi mdi-close me-1"></i>Limpar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabela da Tarde-->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="accordion accordion-solid-header" id="accordion-4" role="tablist">
                    <div class="card">
                        <div class="card-header" role="tab" id="heading-11">
                            <h4 class="mb-0">
                                <a data-bs-toggle="collapse" href="#collapse-11" aria-expanded="true" aria-controls="collapse-11"><i class="mdi mdi mdi-menu-down me-1"></i> Horários da Tarde (Ténico em Informática 1º A)</a>
                            </h4>
                        </div>
                        <div id="collapse-11" class="collapse show" role="tabpanel" aria-labelledby="heading-10" data-bs-parent="#accordion-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="tabela-horarios-tarde" class="table mb-4">

                                                <!-- Cabeçalho da Tabela -->
                                                <thead>
                                                    <tr>
                                                        <th>Horário</th>
                                                        <th data-diadasemana="Segunda">Segunda-Feira</th>
                                                        <th data-diadasemana="Terça">Terça-Feira</th>
                                                        <th data-diadasemana="Quarta">Quarta-Feira</th>
                                                        <th data-diadasemana="Quinta">Quinta-Feira</th>
                                                        <th data-diadasemana="Sexta">Sexta-Feira</th>
                                                        <th data-diadasemana="Sábado">Sábado</th>
                                                    </tr>
                                                </thead>

                                                <!-- Corpo da Tabela -->
                                                <tbody>
                                                    <tr>
                                                        <td>13:30 - 14:20</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="Informática Básica" data-professor="Ilda" data-ambiente="Laboratório 1">
                                                            <div><span data-label="disciplina">Informática Básica</span></div>
                                                            <div>Professor(a):<span data-label="professor"> Ilda</span></div>
                                                            <div><span data-label="ambiente">Laboratório 1</span></div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="Lógica de Programação" data-professor="Glória" data-ambiente="Laboratório 1">
                                                            <div><span data-label="disciplina">Lógica de Programação</span></div>
                                                            <div>Professor(a):<span data-label="professor"> Glória</span></div>
                                                            <div><span data-label="ambiente">Laboratório 1</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>14:20 - 15:10</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="Informática Básica" data-professor="Ilda" data-ambiente="Laboratório 1">
                                                            <div><span data-label="disciplina">Informática Básica</span></div>
                                                            <div>Professor(a):<span data-label="professor"> Ilda</span></div>
                                                            <div><span data-label="ambiente">Laboratório 1</span></div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="Lógica de Programação" data-professor="Glória" data-ambiente="Laboratório 1">
                                                            <div><span data-label="disciplina">Lógica de Programação</span></div>
                                                            <div>Professor(a):<span data-label="professor"> Glória</span></div>
                                                            <div><span data-label="ambiente">Laboratório 1</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>15:10 - 16:00</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="Lógica de Programação" data-professor="Glória" data-ambiente="Laboratório 1">
                                                            <div><span data-label="disciplina">Lógica de Programação</span></div>
                                                            <div>Professor(a):<span data-label="professor"> Glória</span></div>
                                                            <div><span data-label="ambiente">Laboratório 1</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>16:15 - 17:05</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="Lógica de Programação" data-professor="Glória" data-ambiente="Laboratório 1">
                                                            <div><span data-label="disciplina">Lógica de Programação</span></div>
                                                            <div>Professor(a):<span data-label="professor"> Glória</span></div>
                                                            <div><span data-label="ambiente">Laboratório 1</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>17:05 - 17:55</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>17:55 - 18:45</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="form-group d-flex">
                                                <button type="submit" class="btn btn-success btn-sm ms-2" onclick="showSwal('warning-message-and-cancel')"><i class="mdi mdi mdi mdi-floppy me-1"></i>Salvar</button>
                                                <button type="submit" class="btn btn-primary ms-2"><i class="mdi mdi mdi-close me-1"></i>Limpar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabela da Noite-->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="accordion accordion-solid-header" id="accordion-4" role="tablist">
                    <div class="card">
                        <div class="card-header" role="tab" id="heading-12">
                            <h4 class="mb-0">
                                <a data-bs-toggle="collapse" href="#collapse-12" aria-expanded="true" aria-controls="collapse-12"><i class="mdi mdi mdi-menu-down me-1"></i> Horários da Noite (Ténico em Informática 1º A)</a>
                            </h4>
                        </div>
                        <div id="collapse-12" class="collapse show" role="tabpanel" aria-labelledby="heading-12" data-bs-parent="#accordion-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="tabela-horarios-noite" class="table mb-4">

                                                <!-- Cabeçalho da Tabela -->
                                                <thead>
                                                    <tr>
                                                        <th>Horário</th>
                                                        <th data-diadasemana="Segunda">Segunda-Feira</th>
                                                        <th data-diadasemana="Terça">Terça-Feira</th>
                                                        <th data-diadasemana="Quarta">Quarta-Feira</th>
                                                        <th data-diadasemana="Quinta">Quinta-Feira</th>
                                                        <th data-diadasemana="Sexta">Sexta-Feira</th>
                                                        <th data-diadasemana="Sábado">Sábado</th>
                                                    </tr>
                                                </thead>

                                                <!-- Corpo da Tabela -->
                                                <tbody>
                                                    <tr>
                                                        <td>19:00 - 19:50</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>19:50 - 20:40</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>20:50 - 21:40</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>21:40 - 22:30</td>
                                                        <!-- Segunda-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Terça-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quarta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Quinta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sexta-->
                                                        <td data-disciplina="#" data-professor="#" data-ambiente="#">
                                                            <div><span data-label="disciplina">-</span></div>
                                                            <div><span data-label="professor">-</span></div>
                                                            <div><span data-label="ambiente">-</span></div>
                                                        </td>
                                                        <!-- Sábado-->
                                                        <td data-disciplina="Reposição">REPOSIÇÃO</data>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="form-group d-flex">
                                                <button type="submit" class="btn btn-success btn-sm ms-2" onclick="showSwal('warning-message-and-cancel')"><i class="mdi mdi mdi mdi-floppy me-1"></i>Salvar</button>
                                                <button type="submit" class="btn btn-primary ms-2"><i class="mdi mdi mdi-close me-1"></i>Limpar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabela da Disciplinas Pendentes -->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Disciplinas Pendentes
                </h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table mb-4">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Disciplina</th>
                                        <th>Professor</th>
                                        <th>Tempos/Quantidades</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td data-disciplina="Matemática">
                                            <div><span data-label="disciplina">Matemática</span></div>
                                        </td>
                                        <td data-prof="Artur">
                                            <div><span data-label="professor">Artur</span></div>
                                        </td>
                                        <td data-qtd="Quantidade">
                                            <div><span data-label="quantidade">2</span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td data-disciplina="Filosofia">
                                            <div><span data-label="disciplina">Filosofia</span></div>
                                        </td>
                                        <td data-prof="Berenice">
                                            <div><span data-label="professor">Berenice</span></div>
                                        </td>
                                        <td data-qtd="Quantidade">
                                            <div><span data-label="quantidade">2</span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td data-disciplina="Artes">
                                            <div><span data-label="disciplina">Artes</span></div>
                                        </td>
                                        <td data-prof="Carlos">
                                            <div><span data-label="professor">Carlos</span></div>
                                        </td>
                                        <td data-qtd="Quantidade">
                                            <div><span data-label="quantidade">2</span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td data-disciplina="Inglês">
                                            <div><span data-label="disciplina">Inglês</span></div>
                                        </td>
                                        <td data-prof="Daniel">
                                            <div><span data-label="professor">Daniel</span></div>
                                        </td>
                                        <td data-qtd="Quantidade">
                                            <div><span data-label="quantidade">2</span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td data-disciplina="Biologia">
                                            <div><span data-label="disciplina">Biologia</span></div>
                                        </td>
                                        <td data-prof="Janaína">
                                            <div><span data-label="professor">Janaína</span></div>
                                        </td>
                                        <td data-qtd="Quantidade">
                                            <div><span data-label="quantidade">2</span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td data-disciplina="Física">
                                            <div><span data-label="disciplina">Física</span></div>
                                        </td>
                                        <td data-prof="Kelvin">
                                            <div><span data-label="professor">Kelvin</span></div>
                                        </td>
                                        <td data-qtd="Quantidade">
                                            <div><span data-label="quantidade">2</span></div>
                                        </td>
                                    </tr>
                                    <!-- adicionar mais linhas de disciplinas -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Referente select2 do filtro -->
<script>
    (function($) {
        'use strict';
        if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
        }
        if ($(".js-example-basic-multiple").length) {
            $(".js-example-basic-multiple").select2();
        }
    })(jQuery);
</script>

<!-- Referente a customização da datatable em Disciplinas Pendentes -->
<script>
    (function($) {
        'use strict';
        $(function() {
            $('#order-listing').DataTable({
                "aLengthMenu": [
                    [5, 10, 15, -1],
                    [5, 10, 15, "All"]
                ],
                "iDisplayLength": 10,
                "language": {
                    search: ""
                }
            });
            $('#order-listing').each(function() {
                var datatable = $(this);
                // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                search_input.attr('placeholder', 'Search');
                search_input.removeClass('form-control-sm');
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.removeClass('form-control-sm');
            });
        });
    })(jQuery);
</script>