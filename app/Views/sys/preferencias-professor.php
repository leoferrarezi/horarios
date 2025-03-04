<div class="page-header">
    <h3 class="page-title">GERENCIAR PREFERÊNCIAS</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/home') ?>">Início</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('/sys/professor/') ?>">Lista Professores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Preferências</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <!-- Nav Pills -->
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 border-end border-2">
                <ul class="nav gap-2 nav-pills flex-column" id="diaTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="segunda-tab" data-bs-toggle="pill" href="#segunda" role="tab"
                            aria-controls="segunda" aria-selected="true">Segunda-feira</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="terca-tab" data-bs-toggle="pill" href="#terca" role="tab"
                            aria-controls="terca" aria-selected="false">Terça-feira</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="quarta-tab" data-bs-toggle="pill" href="#quarta" role="tab"
                            aria-controls="quarta" aria-selected="false">Quarta-feira</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="quinta-tab" data-bs-toggle="pill" href="#quinta" role="tab"
                            aria-controls="quinta" aria-selected="false">Quinta-feira</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sexta-tab" data-bs-toggle="pill" href="#sexta" role="tab"
                            aria-controls="sexta" aria-selected="false">Sexta-feira</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sabado-tab" data-bs-toggle="pill" href="#sabado" role="tab"
                            aria-controls="sabado" aria-selected="false">Sábado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="domingo-tab" data-bs-toggle="pill" href="#domingo" role="tab"
                            aria-controls="domingo" aria-selected="false">Domingo</a>
                    </li>
                </ul>
            </div>

            <!-- Tab Content -->
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                <div class="tab-content" id="diaTabsContent">
                    <div class="tab-pane fade show active" id="segunda" role="tabpanel" aria-labelledby="segunda-tab">
                        <h4>Segunda-feira</h4>
                        <div class="responsive-table">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tempo de aula</th>
                                        <th class="text-center">Preferência</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($temposAula['Segunda-feira'] as $ta): ?>
                                    <tr>
                                        
                                        <td class="text-center">
                                            <?php echo $ta['inicio'] . " - " . $ta['fim'] ?>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"
                                                autocomplete="off" value="0" checked>
                                            <label class="btn btn-sm btn-outline-secondary"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"><i
                                                    class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"
                                                autocomplete="off" value="1">
                                            <label class="btn btn-sm btn-outline-success"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"><i
                                                    class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"
                                                autocomplete="off" value="2">
                                            <label class="btn btn-sm btn-outline-danger"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"><i
                                                    class="fa fa-times"></i></label>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="terca" role="tabpanel" aria-labelledby="terca-tab">
                        <h4>Terça-feira</h4>
                        <div class="responsive-table">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tempo de aula</th>
                                        <th class="text-center">Preferência</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($temposAula['Terça-feira'] as $ta): ?>
                                    <tr>
                                        
                                        <td class="text-center">
                                            <?php echo $ta['inicio'] . " - " . $ta['fim'] ?>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"
                                                autocomplete="off" value="0" checked>
                                            <label class="btn btn-sm btn-outline-secondary"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"><i
                                                    class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"
                                                autocomplete="off" value="1">
                                            <label class="btn btn-sm btn-outline-success"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"><i
                                                    class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"
                                                autocomplete="off" value="2">
                                            <label class="btn btn-sm btn-outline-danger"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"><i
                                                    class="fa fa-times"></i></label>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="quarta" role="tabpanel" aria-labelledby="quarta-tab">
                        <h4>Quarta-feira</h4>
                        <div class="responsive-table">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tempo de aula</th>
                                        <th class="text-center">Preferência</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($temposAula['Quarta-feira'] as $ta): ?>
                                    <tr>
                                        
                                        <td class="text-center">
                                            <?php echo $ta['inicio'] . " - " . $ta['fim'] ?>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"
                                                autocomplete="off" value="0" checked>
                                            <label class="btn btn-sm btn-outline-secondary"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"><i
                                                    class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"
                                                autocomplete="off" value="1">
                                            <label class="btn btn-sm btn-outline-success"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"><i
                                                    class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"
                                                autocomplete="off" value="2">
                                            <label class="btn btn-sm btn-outline-danger"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"><i
                                                    class="fa fa-times"></i></label>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="quinta" role="tabpanel" aria-labelledby="quinta-tab">
                        <h4>Quinta-feira</h4>
                        <div class="responsive-table">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tempo de aula</th>
                                        <th class="text-center">Preferência</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($temposAula['Quinta-feira'] as $ta): ?>
                                    <tr>
                                        
                                        <td class="text-center">
                                            <?php echo $ta['inicio'] . " - " . $ta['fim'] ?>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"
                                                autocomplete="off" value="0" checked>
                                            <label class="btn btn-sm btn-outline-secondary"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"><i
                                                    class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"
                                                autocomplete="off" value="1">
                                            <label class="btn btn-sm btn-outline-success"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"><i
                                                    class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"
                                                autocomplete="off" value="2">
                                            <label class="btn btn-sm btn-outline-danger"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"><i
                                                    class="fa fa-times"></i></label>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sexta" role="tabpanel" aria-labelledby="sexta-tab">
                        <h4>Sexta-feira</h4>
                        <div class="responsive-table">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tempo de aula</th>
                                        <th class="text-center">Preferência</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($temposAula['Sexta-feira'] as $ta): ?>
                                    <tr>
                                        
                                        <td class="text-center">
                                            <?php echo $ta['inicio'] . " - " . $ta['fim'] ?>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"
                                                autocomplete="off" value="0" checked>
                                            <label class="btn btn-sm btn-outline-secondary"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"><i
                                                    class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"
                                                autocomplete="off" value="1">
                                            <label class="btn btn-sm btn-outline-success"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"><i
                                                    class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"
                                                autocomplete="off" value="2">
                                            <label class="btn btn-sm btn-outline-danger"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"><i
                                                    class="fa fa-times"></i></label>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sabado" role="tabpanel" aria-labelledby="sabado-tab">
                        <h4>Sábado</h4>
                        <div class="responsive-table">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tempo de aula</th>
                                        <th class="text-center">Preferência</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($temposAula['Sábado'] as $ta): ?>
                                    <tr>
                                        
                                        <td class="text-center">
                                            <?php echo $ta['inicio'] . " - " . $ta['fim'] ?>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"
                                                autocomplete="off" value="0" checked>
                                            <label class="btn btn-sm btn-outline-secondary"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"><i
                                                    class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"
                                                autocomplete="off" value="1">
                                            <label class="btn btn-sm btn-outline-success"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"><i
                                                    class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"
                                                autocomplete="off" value="2">
                                            <label class="btn btn-sm btn-outline-danger"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"><i
                                                    class="fa fa-times"></i></label>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="domingo" role="tabpanel" aria-labelledby="domingo-tab">
                        <h4>Domingo</h4>
                        <div class="responsive-table">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tempo de aula</th>
                                        <th class="text-center">Preferência</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($temposAula['Domingo'] as $ta): ?>
                                    <tr>
                                        
                                        <td class="text-center">
                                            <?php echo $ta['inicio'] . " - " . $ta['fim'] ?>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"
                                                autocomplete="off" value="0" checked>
                                            <label class="btn btn-sm btn-outline-secondary"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_none"; ?>"><i
                                                    class="fa fa-minus"></i></label>

                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"
                                                autocomplete="off" value="1">
                                            <label class="btn btn-sm btn-outline-success"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_pref"; ?>"><i
                                                    class="fa fa-check"></i></label>

                                            <input type="radio" class="btn-check"
                                                name="<?php echo "preferencia-" . $ta['id']; ?>"
                                                id="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"
                                                autocomplete="off" value="2">
                                            <label class="btn btn-sm btn-outline-danger"
                                                for="<?php echo "preferencia_" . $ta['id'] . "_rest"; ?>"><i
                                                    class="fa fa-times"></i></label>
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
    </div>
</div>