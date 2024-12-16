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

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Fitrar por:</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                            <h6 class="dropdown-header">Settings</h6>
                            <a class="dropdown-item" href="#">Curso</a>
                            <a class="dropdown-item" href="#">Matéria</a>
                            <a class="dropdown-item" href="#">Professor</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Ambiente</a>
                        </div>
                    </div>
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>Horário</th>
                                <th>Segunda-Feira</th>
                                <th>Terça-Feira</th>
                                <th>Quarta-Feira</th>
                                <th>Quinta-Feira</th>
                                <th>Sexta-Feira</th>
                                <th>Sábado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>19:00 - 19:50</td>
                            <td data-course="curso1" data-subject="Matemática">Matemática - Prof. A</td>
                            <td data-course="curso1" data-subject="Lógica de Programação">Lógica de Programação - Prof. B
                                <label class="badge badge-pill badge-warning" title="Bloqueado">&#128274</label>
                            </td>
                            <td data-course="curso1" data-subject="Banco de Dados">Banco de Dados - Prof. C</td>
                            <td data-course="curso1" data-subject="Org de Computadores">Org de Computadores - Prof. E
                                <label class="badge badge-pill badge-danger" title="Conflito de Horário"> &#128365 </label>
                            </td>
                            <td data-course="curso1" data-subject="Estatística" data-prof="Prof.E">Estatística - Prof.F </data>
                            </td>
                            <td data-course="curso1" data-subject="Reposição">REPOSIÇÃO</data>
                            </td>
                            </tr>
                            <tr>
                                <td>19:50 - 20:40</td>
                                <td data-course="curso1" data-subject="Matemática">Matemática - Prof. A</td>
                                <td data-course="curso1" data-subject="Lógica de Programação">Lógica de Programação - Prof. B
                                    <label class="badge badge-pill badge-warning" title="Bloqueado">&#128274;</label>
                                </td>
                                <td data-course="curso1" data-subject="Banco de Dados">Banco de Dados - Prof. C</td>
                                <td data-course="curso1" data-subject="Org de Computadores">Org de Computadores - Prof. E
                                    <label class="badge badge-pill badge-danger" title="Conflito de Horário"> &#128365 </label>
                                </td>
                                <td data-course="curso1" data-subject="Estatística">Estatística- Prof. F</td>
                                <td data-course="curso1" data-subject="Reposição">REPOSIÇÃO</td>
                            </tr>
                            <tr>
                                <td>20:50 - 21:40</td>
                                <td data-course="curso1" data-subject="Matemática">Matemática - Prof. A</td>
                                <td data-course="curso1" data-subject="Comunicação">Comunicação - Prof. D</td>
                                <td data-course="curso1" data-subject="Banco de Dados">Banco de Dados - Prof. C</td>
                                <td data-course="curso1" data-subject="Org de Computadores">Org de Computadores - Prof. E
                                    <label class="badge badge-pill badge-danger" title="Conflito de Horário"> &#128365 </label>
                                </td>
                                <td data-course="curso1" data-subject="Lógica de Programação">Lógica de Programação - Prof. B</td>
                                <td data-course="curso1" data-subject="Reposição">REPOSIÇÃO</td>
                            </tr>
                            <tr>
                                <td>21:40 - 22:30</td>
                                <td data-course="curso1" data-subject="Matemática">Matemática - Prof. A</td>
                                <td data-course="curso1" data-subject="Comunicação">Comunicação- Prof. D</td>
                                <td data-course="curso1" data-subject="Banco de Dados">Banco de Dados - Prof. C</td>
                                <td data-course="curso1" data-subject="Org de Computadores">Org de Computadores - Prof. E
                                    <label class="badge badge-pill badge-danger" title="Conflito de Horário"> &#128365 </label>
                                </td>
                                <td data-course="curso1" data-subject="Lógica de Programação">Lógica de Programação - Prof. B</td>
                                <td data-course="curso1" data-subject="Reposição">REPOSIÇÃO</td>
                            </tr>
                            <!-- adicionar mais linhas de horários -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Fitrar por:</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                            <h6 class="dropdown-header">Settings</h6>
                            <a class="dropdown-item" href="#">Curso</a>
                            <a class="dropdown-item" href="#">Matéria</a>
                            <a class="dropdown-item" href="#">Professor</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Ambiente</a>
                        </div>
                    </div>
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>Horário</th>
                                <th>Segunda-Feira</th>
                                <th>Terça-Feira</th>
                                <th>Quarta-Feira</th>
                                <th>Quinta-Feira</th>
                                <th>Sexta-Feira</th>
                                <th>Sábado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>19:00 - 19:50</td>
                                <td data-course="curso2" data-subject="Eng de Software">Eng de Software - Prof. B</td>
                                <td data-course="curso2" data-subject="Estatística">Estatística II - Prof.F </data>
                                </td>
                                <td data-course="curso2" data-subject="Tópicos Especiais I">Tópicos Especiais - Prof. F</td>
                                <td data-course="curso2" data-subject="Banco de Dados II">Banco de Dados II - Prof. C
                                    <label class="badge badge-pill badge-warning" title="Bloqueado">&#128274</label>
                                </td>
                                <td data-course="curso2" data-subject="LIVRE">LIVRE</data>
                                </td>
                                <td data-course="curso2" data-subject="Reposição">REPOSIÇÃO</data>
                                </td>
                            </tr>
                            <tr>
                                <td>19:50 - 20:40</td>
                                <td data-course="curso2" data-subject="Matemática">Eng de Software - Prof. B</td>
                                <td data-course="curso2" data-subject="Estatística">Estatística II - Prof.F </data>
                                </td>
                                <td data-course="curso2" data-subject="Tópicos Especiais I">Tópicos Especiais - Prof. F</td>
                                <td data-course="curso2" data-subject="Banco de Dados II">Banco de Dados II - Prof. C
                                    <label class="badge badge-pill badge-warning" title="Bloqueado">&#128274</label>
                                </td>
                                <td data-course="curso2" data-subject="Livre">LIVRE</td>
                                <td data-course="curso2" data-subject="Reposição">REPOSIÇÃO</td>
                            </tr>
                            <tr>
                                <td>20:50 - 21:40</td>
                                <td data-course="curso2" data-subject="Matemática">Eng de Software - Prof. B</td>
                                <td data-course="curso2" data-subject="Lógica de Programação II">Lógica de Programação II - Prof. B
                                </td>
                                <td data-course="curso2" data-subject="Tópicos Especiais I">Tópicos Especiais - Prof. F</td>
                                <td data-course="curso2" data-subject="Banco de Dados II">Banco de Dados II - Prof. C
                                    <label class="badge badge-pill badge-warning" title="Bloqueado">&#128274</label>
                                </td>
                                <td data-course="curso2" data-subject="Metodologia Científica">Metodologia Científica - Prof. Z</td>
                                <td data-course="curso2" data-subject="Reposição">REPOSIÇÃO</td>
                            </tr>
                            <tr>
                                <td>21:40 - 22:30</td>
                                <td data-course="curso2" data-subject="Matemática">Eng de Software - Prof. B</td>
                                <td data-course="curso2" data-subject="Lógica de Programação II">Lógica de Programação II - Prof. B
                                </td>
                                <td data-course="curso2" data-subject="Tópicos Especiais I">Tópicos Especiais - Prof. F</td>
                                <td data-course="curso2" data-subject="Banco de Dados II">Banco de Dados II - Prof. C
                                    <label class="badge badge-pill badge-warning" title="Bloqueado">&#128274</label>
                                </td>
                                <td data-course="curso2" data-subject="Metodologia Científica">Metodologia Científica - Prof. Z</td>
                                <td data-course="curso2" data-subject="Reposição">REPOSIÇÃO</td>
                            </tr>
                            <!-- adicionar mais linhas de horários -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Fitrar por:</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                            <h6 class="dropdown-header">Settings</h6>
                            <a class="dropdown-item" href="#">Curso</a>
                            <a class="dropdown-item" href="#">Matéria</a>
                            <a class="dropdown-item" href="#">Professor</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Ambiente</a>
                        </div>
                    </div>
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>Horário</th>
                                <th>Segunda-Feira</th>
                                <th>Terça-Feira</th>
                                <th>Quarta-Feira</th>
                                <th>Quinta-Feira</th>
                                <th>Sexta-Feira</th>
                                <th>Sábado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>19:00 - 19:50</td>
                                <td data-course="curso3" data-subject="Prog Web">Programação I - Prof. E
                                    <label class="badge badge-pill badge-warning" title="Bloqueado">&#128274</label>
                                </td>
                                <td data-course="curso3" data-subject="VAGO">VAGO
                                </td>
                                <td data-course="curso3" data-subject="Projeto I">Projeto Cintífico I - Prof. Z</td>
                                <td data-course="curso3" data-subject="Org de Computadores II">Org de Computadores II- Prof. E
                                    <label class="badge badge-pill badge-danger" title="Conflito de Horário"> &#128365 </label>
                                </td>
                                <td data-course="curso3" data-subject="Optativa I">Matéria Optativa I- Prof. X</td>
                                <td data-course="curso3" data-subject="Reposição">REPOSIÇÃO</data>
                                </td>
                            </tr>
                            <tr>
                                <td>19:50 - 20:40</td>
                                <td data-course="curso3" data-subject="Prog Web">Programação I - Prof. E
                                    <label class="badge badge-pill badge-warning" title="Bloqueado">&#128274</label>
                                </td>
                                <td data-course="curso3" data-subject="VAGO">VAGO</td>
                                <td data-course="curso3" data-subject="Projeto I">Projeto Científico I - Prof. Z</td>
                                <td data-course="curso3" data-subject="Org de Computadores II">Org de Computadores II- Prof. E
                                    <label class="badge badge-pill badge-danger" title="Conflito de Horário"> &#128365 </label>
                                </td>
                                <td data-course="curso3" data-subject="Optativa I">Matéria Optativa I- Prof. X</td>
                                <td data-course="curso3" data-subject="Reposição">REPOSIÇÃO</td>
                            </tr>
                            <tr>
                                <td>20:50 - 21:40</td>
                                <td data-course="curso3" data-subject="Prog Web">Programação I - Prof. E
                                    <label class="badge badge-pill badge-warning" title="Bloqueado">&#128274</label>
                                </td>
                                <td data-course="curso3" data-subject="Tópicos Especiais II">Tópicos Especiais II - Prof. F</td>
                                <td data-course="curso3" data-subject="VAGO">VAGO</td>
                                <td data-course="curso3" data-subject="Org de Computadores II">Org de Computadores II- Prof. E
                                    <label class="badge badge-pill badge-danger" title="Conflito de Horário"> &#128365 </label>
                                </td>
                                <td data-course="curso3" data-subject="VAGO">VAGO</td>
                                <td data-course="curso3" data-subject="Reposição">REPOSIÇÃO</td>
                            </tr>
                            <tr>
                                <td>21:40 - 22:30</td>
                                <td data-course="curso3" data-subject="Prog Web">Programação I - Prof. E
                                    <label class="badge badge-pill badge-warning" title="Bloqueado">&#128274</label>
                                </td>
                                <td data-course="curso3" data-subject="Tópicos Especiais II">Tópicos Especiais II- Prof. F</td>
                                <td data-course="curso3" data-subject="VAGO">VAGO</td>
                                <td data-course="curso3" data-subject="Org de ComputadoresII">Org de Computadores II- Prof. E
                                    <label class="badge badge-pill badge-danger" title="Conflito de Horário"> &#128365 </label>
                                </td>
                                <td data-course="curso3" data-subject="VAGO">VAGO</td>
                                <td data-course="curso3" data-subject="Reposição">REPOSIÇÃO</td>
                            </tr>
                            <!-- adicionar mais linhas de horários -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function($) {
        'use strict';
        $(function() {
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