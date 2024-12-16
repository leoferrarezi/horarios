<div class="modal fade" id="modal-restricoes-prof" tabindex="-1" aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
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
                                   <div class="table-responsive">
                                          <table class="table mb-4">
                                                 <thead>
                                                        <tr>
                                                               <th>Horário</th>
                                                               <th>Segunda</th>
                                                               <th>Terça</th>
                                                               <th>Quarta</th>
                                                               <th>Quinta</th>
                                                               <th>Sexta</th>
                                                               <th>Sábado</th>
                                                        </tr>
                                                 </thead>
                                                 <tbody>
                                                        <tr>
                                                               <td>07:30</td>
                                                               <?php for ($i = 1; $i < 7; $i++) : ?>
                                                                      <td>
                                                                             <div class="btn-group btn-group-sm" role="group">
                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h1" id="d<?= $i ?>_h1_none" autocomplete="off" value="0" checked>
                                                                                    <label class="btn btn-sm btn-outline-secondary" for="d<?= $i ?>_h1_none"><i class="fa fa-minus"></i></label>

                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h1" id="d<?= $i ?>_h1_pref" autocomplete="off" value="1">
                                                                                    <label class="btn btn-sm btn-outline-success" for="d<?= $i ?>_h1_pref"><i class="fa fa-check"></i></label>

                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h1" id="d<?= $i ?>_h1_rest" autocomplete="off" value="2">
                                                                                    <label class="btn btn-sm btn-outline-danger" for="d<?= $i ?>_h1_rest"><i class="fa fa-times"></i></label>
                                                                             </div>
                                                                      </td>
                                                               <?php endfor; ?>
                                                        </tr>
                                                        <tr>
                                                               <td>10:15</td>
                                                               <?php for ($i = 1; $i < 7; $i++) : ?>
                                                                      <td>
                                                                             <div class="btn-group btn-group-sm" role="group">
                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h2" id="d<?= $i ?>_h2_none" autocomplete="off" value="0" checked>
                                                                                    <label class="btn btn-sm btn-outline-secondary" for="d<?= $i ?>_h2_none"><i class="fa fa-minus"></i></label>

                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h2" id="d<?= $i ?>_h2_pref" autocomplete="off" value="1">
                                                                                    <label class="btn btn-sm btn-outline-success" for="d<?= $i ?>_h2_pref"><i class="fa fa-check"></i></label>

                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h2" id="d<?= $i ?>_h2_rest" autocomplete="off" value="2">
                                                                                    <label class="btn btn-sm btn-outline-danger" for="d<?= $i ?>_h2_rest"><i class="fa fa-times"></i></label>
                                                                             </div>
                                                                      </td>
                                                               <?php endfor; ?>
                                                        </tr>
                                                        <tr>
                                                               <td>13:30</td>
                                                               <?php for ($i = 1; $i < 7; $i++) : ?>
                                                                      <td>
                                                                             <div class="btn-group btn-group-sm" role="group">
                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h3" id="d<?= $i ?>_h3_none" autocomplete="off" value="0" checked>
                                                                                    <label class="btn btn-sm btn-outline-secondary" for="d<?= $i ?>_h3_none"><i class="fa fa-minus"></i></label>

                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h3" id="d<?= $i ?>_h3_pref" autocomplete="off" value="1">
                                                                                    <label class="btn btn-sm btn-outline-success" for="d<?= $i ?>_h3_pref"><i class="fa fa-check"></i></label>

                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h3" id="d<?= $i ?>_h3_rest" autocomplete="off" value="2">
                                                                                    <label class="btn btn-sm btn-outline-danger" for="d<?= $i ?>_h3_rest"><i class="fa fa-times"></i></label>
                                                                             </div>
                                                                      </td>
                                                               <?php endfor; ?>
                                                        </tr>
                                                        <tr>
                                                               <td>16:15</td>
                                                               <?php for ($i = 1; $i < 7; $i++) : ?>
                                                                      <td>
                                                                             <div class="btn-group btn-group-sm" role="group">
                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h4" id="d<?= $i ?>_h4_none" autocomplete="off" value="0" checked>
                                                                                    <label class="btn btn-sm btn-outline-secondary" for="d<?= $i ?>_h4_none"><i class="fa fa-minus"></i></label>

                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h4" id="d<?= $i ?>_h4_pref" autocomplete="off" value="1">
                                                                                    <label class="btn btn-sm btn-outline-success" for="d<?= $i ?>_h4_pref"><i class="fa fa-check"></i></label>

                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h4" id="d<?= $i ?>_h4_rest" autocomplete="off" value="2">
                                                                                    <label class="btn btn-sm btn-outline-danger" for="d<?= $i ?>_h4_rest"><i class="fa fa-times"></i></label>
                                                                             </div>
                                                                      </td>
                                                               <?php endfor; ?>
                                                        </tr>
                                                        <tr>
                                                               <td>19:00</td>
                                                               <?php for ($i = 1; $i < 7; $i++) : ?>
                                                                      <td>
                                                                             <div class="btn-group btn-group-sm" role="group">
                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h5" id="d<?= $i ?>_h5_none" autocomplete="off" value="0" checked>
                                                                                    <label class="btn btn-sm btn-outline-secondary" for="d<?= $i ?>_h5_none"><i class="fa fa-minus"></i></label>

                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h5" id="d<?= $i ?>_h5_pref" autocomplete="off" value="1">
                                                                                    <label class="btn btn-sm btn-outline-success" for="d<?= $i ?>_h5_pref"><i class="fa fa-check"></i></label>

                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h5" id="d<?= $i ?>_h5_rest" autocomplete="off" value="2">
                                                                                    <label class="btn btn-sm btn-outline-danger" for="d<?= $i ?>_h5_rest"><i class="fa fa-times"></i></label>
                                                                             </div>
                                                                      </td>
                                                               <?php endfor; ?>
                                                        </tr>
                                                        <tr>
                                                               <td>20:50</td>
                                                               <?php for ($i = 1; $i < 7; $i++) : ?>
                                                                      <td>
                                                                             <div class="btn-group btn-group-sm" role="group">
                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h6" id="d<?= $i ?>_h6_none" autocomplete="off" value="0" checked>
                                                                                    <label class="btn btn-sm btn-outline-secondary" for="d<?= $i ?>_h6_none"><i class="fa fa-minus"></i></label>

                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h6" id="d<?= $i ?>_h6_pref" autocomplete="off" value="1">
                                                                                    <label class="btn btn-sm btn-outline-success" for="d<?= $i ?>_h6_pref"><i class="fa fa-check"></i></label>

                                                                                    <input type="radio" class="btn-check" name="d<?= $i ?>_h6" id="d<?= $i ?>_h6_rest" autocomplete="off" value="2">
                                                                                    <label class="btn btn-sm btn-outline-danger" for="d<?= $i ?>_h6_rest"><i class="fa fa-times"></i></label>
                                                                             </div>
                                                                      </td>
                                                               <?php endfor; ?>
                                                        </tr>
                                                 </tbody>
                                          </table>
                                   </div>
                                   <p class="card-description text-end">
                                          <i class="fa fa-minus text-secondary" style="margin-right: 5px; margin-left: 25px"></i>Sem Informação
                                          <i class="fa fa-check text-success" style="margin-right: 5px; margin-left: 25px"></i>Preferência
                                          <i class="fa fa-times text-danger" style="margin-right: 5px; margin-left: 25px"></i>Restrição Justificada
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