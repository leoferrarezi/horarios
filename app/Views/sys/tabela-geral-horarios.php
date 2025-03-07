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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="curso">Curso</label>
                                <select required="required" class="form-select" name="curso" id="Curso">
                                    <option selected>-</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="turma">Turma</label>
                                <select required="required" class="form-select" name="turma" id="turma">
                                    <option selected>-</option>
                                    <option value="1">Turma A</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="turma">Professor</label>
                                <select required="required" class="form-select" name="professor" id="professor">
                                    <option selected>-</option>
                                    <option value="1">Professor A</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="turma">Disciplinas</label>
                                <select required="required" class="form-select" name="disciplina" id="disciplina">
                                    <option selected>-</option>
                                    <option value="1">Matéria</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="turma">Ambiente</label>
                                <select required="required" class="form-select" name="ambiente" id="ambiente">
                                    <option selected>-</option>
                                    <option value="1">Sala A</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <button type="submit" class="btn btn-primary ms-3"><i class="mdi mdi mdi-filter me-1"></i>Filtrar</button>
                            <button type="submit" class="btn btn-primary ms-2"><i class="mdi mdi mdi-filter-remove me-1"></i>Limpar Filtro</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tabela de Pesquisa -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table mb-4">
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
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>19:50 - 20:40</td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>20:50 - 21:40</td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>21:40 - 22:30</td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                        <td data-course="curso1" data-subject=""> -
                                        </td>
                                    </tr>
                                    <!-- adicionar mais linhas de horários -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tabela de Organização -->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table mb-4">
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

    (function($) {
        showSwal = function(type) {
            'use strict';
            if (type === 'warning-message-and-cancel') {
                swal({
                    title: 'Tem certeza?',
                    text: "Verifique antes de salvar!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3f51b5',
                    cancelButtonColor: '#ff4081',
                    confirmButtonText: 'Great ',
                    buttons: {
                        cancel: {
                            text: "Cancel",
                            value: null,
                            visible: true,
                            className: "btn btn-danger",
                            closeModal: true,
                        },
                        confirm: {
                            text: "OK",
                            value: true,
                            visible: true,
                            className: "btn btn-primary",
                            closeModal: true
                        }
                    }
                })

            }
        }

    })(jQuery);
</script>