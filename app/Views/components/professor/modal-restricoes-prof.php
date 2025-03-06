<?php
$diasSemana = [0 => 'Domingo', 1 => 'Segunda-feira', 2 => 'Terça-feira', 3 => 'Quarta-feira', 4 => 'Quinta-feira', 5 => 'Sexta-feira', 6 => 'Sábado'];
?>

<form id="cadastroHorarios" class="forms-sample" method="post" action='<?php echo base_url('sys/professor/horario/salvarRestricoes'); ?>'>

    <div class="modal fade" id="modal-restricoes-prof" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Restrições de Horário: <span id="professor-nome"></span></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>


                <div class="modal-body">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="nav-segunda-tab" data-bs-toggle="tab" data-bs-target="#nav-segunda" role="tab" aria-controls="nav-segunda" aria-selected="true" aria-current="page" href="#">Segunda</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link " id="nav-terca-tab" data-bs-toggle="tab" data-bs-target="#nav-terca" role="tab" aria-controls="nav-terca" aria-selected="true" aria-current="page" href="#">Terça</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link " id="nav-quarta-tab" data-bs-toggle="tab" data-bs-target="#nav-quarta" role="tab" aria-controls="nav-quarta" aria-selected="true" aria-current="page" href="#">Quarta</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link " id="nav-quinta-tab" data-bs-toggle="tab" data-bs-target="#nav-quinta" role="tab" aria-controls="nav-quinta" aria-selected="true" aria-current="page" href="#">Quinta</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link " id="nav-sexta-tab" data-bs-toggle="tab" data-bs-target="#nav-sexta" role="tab" aria-controls="nav-sexta" aria-selected="true" aria-current="page" href="#">Sexta</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link " id="nav-sabado-tab" data-bs-toggle="tab" data-bs-target="#nav-sabado" role="tab" aria-controls="nav-sabado" aria-selected="true" aria-current="page" href="#">Sábado</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link " id="nav-domingo-tab" data-bs-toggle="tab" data-bs-target="#nav-domingo" role="tab" aria-controls="nav-domingo" aria-selected="true" aria-current="page" href="#">Domingo</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" style="width: 90%; margin:auto" id="nav-segunda" role="tabpanel" aria-labelledby="nav-segunda-tab">
                            <h1 class="text-center">Horários de Segunda</h1>
                            <div class="responsive-table">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <h2>Manhã</h2>
                                            </th>
                                            <th class="text-center">
                                                <h2>Tarde</h2>
                                            </th>
                                            <th class="text-center">
                                                <h2>Noite</h2>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align: top;">
                                                <table class="table table-sm" valign="top">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Tempo de aula</th>
                                                            <th class="text-center">Preferência</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">
                                                                07:30-08:20
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-0" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-0" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-0" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                08:20-09:10
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-1" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-1" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-1" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                09:10-10:00
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-2" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-2" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-2" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                10:15-11:05
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-3" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-3" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-3" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                11:05-11:55
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-4" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-4" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-4" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                11:55-12:45
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-5" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-5" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-5" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Tempo de aula</th>
                                                            <th class="text-center">Preferência</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">
                                                                13:30-14:20
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-6" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-6" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-6" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                14:20-15:10
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-7" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-7" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-7" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                15:10-16:00
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-8" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-8" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-8" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                16:15-17:05
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-9" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-9" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-9" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                17:05-17:55
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-10" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-10" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-10" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                17:55-18:45
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-11" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-11" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-11" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Tempo de aula</th>
                                                            <th class="text-center">Preferência</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">
                                                                19:00-19:50
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-12" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-12" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-12" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                19:50-20:40
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-13" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-13" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-13" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                20:50-21:40
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-14" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-14" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-14" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                21:40-22:30
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-15" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-15" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-15" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" style="width: 90%; margin:auto" id="nav-terca" role="tabpanel" aria-labelledby="nav-terca-tab">
                            <h1 class="text-center">Horários de Terça</h1>
                            <div class="responsive-table">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <h2>Manhã</h2>
                                            </th>
                                            <th class="text-center">
                                                <h2>Tarde</h2>
                                            </th>
                                            <th class="text-center">
                                                <h2>Noite</h2>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align: top;">
                                                <table class="table table-sm" valign="top">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Tempo de aula</th>
                                                            <th class="text-center">Preferência</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">
                                                                07:30-08:20
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-0" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-0" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-0" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                08:20-09:10
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-1" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-1" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-1" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                09:10-10:00
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-2" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-2" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-2" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                10:15-11:05
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-3" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-3" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-3" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                11:05-11:55
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-4" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-4" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-4" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                11:55-12:45
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-5" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-5" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-5" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Tempo de aula</th>
                                                            <th class="text-center">Preferência</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">
                                                                13:30-14:20
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-6" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-6" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-6" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                14:20-15:10
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-7" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-7" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-7" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                15:10-16:00
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-8" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-8" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-8" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                16:15-17:05
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-9" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-9" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-9" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                17:05-17:55
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-10" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-10" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-10" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                17:55-18:45
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-11" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-11" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-11" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Tempo de aula</th>
                                                            <th class="text-center">Preferência</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">
                                                                19:00-19:50
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-12" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-12" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-12" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                19:50-20:40
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-13" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-13" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-13" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                20:50-21:40
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-14" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-14" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-14" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">
                                                                21:40-22:30
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="preferencia-15" id="preferencia_0_none" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary" for="preferencia_0_none"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-15" id="preferencia_0_pref" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success" for="preferencia_0_pref"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="preferencia-15" id="preferencia_0_rest" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger" for="preferencia_0_rest"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-quarta" role="tabpanel" aria-labelledby="nav-quarta-tab">
                            <h1 class="text-center">Horários de Quarta</h1>
                        </div>

                        <div class="tab-pane fade" id="nav-quinta" role="tabpanel" aria-labelledby="nav-quinta-tab">
                        <h1 class="text-center">Horários de Quinta</h1>
                        </div>

                        <div class="tab-pane fade" id="nav-sexta" role="tabpanel" aria-labelledby="nav-sexta-tab">
                        <h1 class="text-center">Horários de Sexta</h1>
                        </div>

                        <div class="tab-pane fade" id="nav-sabado" role="tabpanel" aria-labelledby="nav-sabado-tab">
                        <h1 class="text-center">Horários de Sábado</h1>
                        </div>

                        <div class="tab-pane fade" id="nav-domingo" role="tabpanel" aria-labelledby="nav-domingo-tab">
                        <h1 class="text-center">Horários de Domingo</h1>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary me-2">Salvar</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!--
<div class="modal fade" id="modal-restricoes-prof" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Restrições de Horário: <span id="professor-nome"></span></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="cadastroHorarios" class="forms-sample" method="post"
                action='<?php echo base_url('sys/professor/horario/salvarRestricoes'); ?>'>
                <div class="modal-body">
                    <div class="accordion accordion-solid-header" id="accordion-4" role="tablist">
                        <div class="row">
                          <?php foreach ($horarios as $index => $horario): ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header" role="tab" id="<?php echo "heading-" . $index ?>">
                                        <h6 class="mb-0">
                                            <a data-bs-toggle="collapse" href="<?php echo "#collapse-" . $index ?>" aria-expanded="false"
                                                aria-controls="<?php echo "collapse-" . $index ?>" class="collapsed"> <?php echo $horario['nome']; ?> </a>
                                        </h6>
                                    </div>
                                    <div id="<?php echo "collapse-" . $index ?>" class="collapse" role="tabpanel" aria-labelledby="<?php echo "heading-" . $index ?>"
                                        data-bs-parent="#accordion-4">
                                        <div class="card-body">
                                            <div class="responsive-table">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Dia da Semana</th>
                                                            <th class="text-center">Tempo de aula</th>
                                                            <th class="text-center">Preferência</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php foreach ($horario['tempos_de_aula'] as $ta): ?>
                                                        <tr>
                                                            <td><?php echo $diasSemana[$ta['dia_semana']] ?></td>
                                                            <td class="text-center">
                                                              <?php echo // Formata hora e minuto de início para HH:mm
                                                                sprintf('%02d:%02d - %02d:%02d', esc($ta['hora_inicio']), esc($ta['minuto_inicio']), esc($ta['hora_fim']), esc($ta['minuto_fim']));
                                                                ?>
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <input type="radio" class="btn-check" name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                                    id="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>" autocomplete="off" value="0" checked>
                                                                <label class="btn btn-sm btn-outline-secondary"
                                                                    for="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"><i class="fa fa-minus"></i></label>

                                                                <input type="radio" class="btn-check" name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                                    id="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>" autocomplete="off" value="1">
                                                                <label class="btn btn-sm btn-outline-success"
                                                                    for="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"><i class="fa fa-check"></i></label>

                                                                <input type="radio" class="btn-check" name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                                    id="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>" autocomplete="off" value="2">
                                                                <label class="btn btn-sm btn-outline-danger"
                                                                    for="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"><i class="fa fa-times"></i></label>
                                                            </td>
                                                        </tr>
                                                      <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php endforeach; ?>

                        </div>
                    </div>

                    <p class="card-description text-end">
                        <i class="fa fa-minus text-secondary" style="margin-right: 5px; margin-left: 25px"></i>Sem
                        Informação
                        <i class="fa fa-check text-success" style="margin-right: 5px; margin-left: 25px"></i>Preferência
                        <i class="fa fa-times text-danger" style="margin-right: 5px; margin-left: 25px"></i>Restrição
                        Justificada
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary me-2">Salvar</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
                                                      -->