<div class="modal fade" id="modal-restricoes-prof" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Cadastrar Restrição de Horários: <span
                            id="professor-nome"></span></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="cadastroHorarios" class="forms-sample" method="post"
                  action='<?php echo base_url('sys/professor/horario/salvar'); ?>'>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th>Horários</th>
                                <th>Segunda-feira</th>
                                <th>Terça-feira</th>
                                <th>Quarta-feira</th>
                                <th>Quinta-feira</th>
                                <th>Sexta-feira</th>
                                <th>Sábado</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>07:30</td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario" id="btnhorario1"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario1"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario" id="btnhorario2"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario2"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario" id="btnhorario3"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario3"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario02" id="btnhorario021"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario021"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario02" id="btnhorario022"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario022"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario02" id="btnhorario023"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario023"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario03" id="btnhorario031"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario031"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario03" id="btnhorario032"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario032"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario03" id="btnhorario033"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario033"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario04" id="btnhorario041"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario041"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario04" id="btnhorario042"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario042"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario04" id="btnhorario043"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario043"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario05" id="btnhorario051"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario051"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario05" id="btnhorario052"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario052"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario05" id="btnhorario053"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario053"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario36" id="btnhorario361"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario361"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario36" id="btnhorario362"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario352"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario36" id="btnhorario363"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario363"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>08:20</td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario06" id="btnhorario061"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario061"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario06" id="btnhorario062"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario062"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario06" id="btnhorario063"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario063"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario07" id="btnhorario071"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario071"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario07" id="btnhorario072"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario072"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario07" id="btnhorario073"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario073"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario08" id="btnhorario081"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario081"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario08" id="btnhorario082"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario082"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario08" id="btnhorario083"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario083"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario09" id="btnhorario091"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario091"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario09" id="btnhorario092"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario092"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario09" id="btnhorario093"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario093"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario10" id="btnhorario101"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario101"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario10" id="btnhorario102"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario102"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario10" id="btnhorario103"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario103"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario35" id="btnhorario351"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario351"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario35" id="btnhorario352"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario352"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario35" id="btnhorario353"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario353"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>13:00</td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario11" id="btnhorario111"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario111"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario11" id="btnhorario112"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario112"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario11" id="btnhorario113"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario113"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario12" id="btnhorario121"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario121"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario12" id="btnhorario122"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario122"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario12" id="btnhorario123"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario123"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario13" id="btnhorario131"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario131"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario13" id="btnhorario132"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario132"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario13" id="btnhorario133"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario133"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario14" id="btnhorario141"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario141"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario14" id="btnhorario142"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario142"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario14" id="btnhorario143"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario143"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario15" id="btnhorario151"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario151"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario15" id="btnhorario152"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario152"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario15" id="btnhorario153"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario153"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario34" id="btnhorario341"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario341"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario34" id="btnhorario342"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario342"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario34" id="btnhorario343"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario343"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario16" id="btnhorario161"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario161"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario16" id="btnhorario162"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario162"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario16" id="btnhorario163"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario163"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario17" id="btnhorario171"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario171"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario17" id="btnhorario172"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario172"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario17" id="btnhorario173"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario173"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario18" id="btnhorario181"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario181"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario18" id="btnhorario182"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario182"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario18" id="btnhorario183"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario183"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario19" id="btnhorario191"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario191"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario19" id="btnhorario192"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario192"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario19" id="btnhorario193"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario193"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario20" id="btnhorario201"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario201"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario20" id="btnhorario202"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario202"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario20" id="btnhorario203"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario203"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario33" id="btnhorario331"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario331"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario33" id="btnhorario332"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario332"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario33" id="btnhorario333"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario333"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>19:00</td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario21"
                                               id="btnhoraario211" autocomplete="off">
                                        <label class="btn" for="btnhoraario211"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario21"
                                               id="btnhoraario212" autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhoraario212"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario21"
                                               id="btnhoraario213" autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhoraario213"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario22" id="btnhorario221"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario221"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario22" id="btnhorario222"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario222"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario22" id="btnhorario223"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario223"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario23" id="btnhorario231"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario231"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario23" id="btnhorario232"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario232"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario23" id="btnhorario233"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario233"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario24" id="btnhorario241"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario241"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario24" id="btnhorario242"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario242"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario24" id="btnhorario243"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario243"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario25" id="btnhorario251"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario251"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario25" id="btnhorario252"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario252"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario25" id="btnhorario253"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario253"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario32" id="btnhorario321"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario321"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario32" id="btnhorario322"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario322"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario32" id="btnhorario323"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario323"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                </td>
                            </tr>
                            <tr>
                                <td>21:00</td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario26" id="btnhorario261"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario261"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario26" id="btnhorario262"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario262"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario26" id="btnhorario263"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario263"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario27" id="btnhorario271"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario271"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario27" id="btnhorario272"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario272"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario27" id="btnhorario273"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario273"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario28" id="btnhorario281"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario281"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario28" id="btnhorario282"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario282"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario28" id="btnhorario283"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario283"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario29" id="btnhorario291"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario291"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario29" id="btnhorario292"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario292"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario29" id="btnhorario293"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario293"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario30" id="btnhorario301"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario301"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario30" id="btnhorario302"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario302"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario30" id="btnhorario303"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario303"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group"
                                         aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnhorario31" id="btnhorario311"
                                               autocomplete="off">
                                        <label class="btn" for="btnhorario311"><i class="fa fa-minus"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario31" id="btnhorario312"
                                               autocomplete="off">
                                        <label class="btn btn-outline-success" for="btnhorario312"><i
                                                    class="fa fa-check"></i></label>

                                        <input type="radio" class="btn-check" name="btnhorario31" id="btnhorario313"
                                               autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnhorario313"><i
                                                    class="fa fa-times"></i></label>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="card-description text-end"><i class="fa fa-minus me-4"></i>Sem Informação </p>
                    <p class="card-description text-end"><i class="fa fa-check text-success me-4"></i>Preferência</p>
                    <p class="card-description text-end"><i class="fa fa-times text-danger me-4"></i>Restrição
                        Justificada</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary me-2">Salvar</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>