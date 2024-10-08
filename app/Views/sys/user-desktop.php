<!DOCTYPE html>
<lang="pt-BR">
<!-- CABEÇALHO -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ÁREA DE TRABALHO</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../../assets/vendors/jquery-toast-plugin/jquery.toast.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../../assets/css/classic-horizontal/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tela Inicial</a></li>
                <li class="breadcrumb-item active" aria-current="page">Área de Trabalho do Usuário</li>
            </ol>
        </nav>
    </head>
   
<!-- BODY -->
<body>
    <div class="container-scroller">
        <!-- Menu superior -->
        <div class="horizontal-menu">

        </div>
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="page-header">
                <h3 class="page-title"> ÁREA DE TRABALHO DO USUÁRIO </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">ÁREA DE TRABALHO</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ÁREA DE TRABALHO</li>
                    </ol>
                </nav>
                </div>
                <div class = "row">
                    <!-- NOTIFICAÇÕES -->
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">NOTIFICAÇÕES</h4>
                                <p class="card-description"> Add class <code>.alert-fill-*</code> with <code>.alert</code>
                                </p>
                                <div class="alert alert-fill-primary" role="alert">
                                    <i class="mdi mdi-alert-circle"></i> There! This is a primary alert.
                                </div>
                                <div class="alert alert-fill-success" role="alert">
                                    <i class="mdi mdi-alert-circle"></i> Well done! You successfully read this important alert message.
                                </div>
                                <div class="alert alert-fill-info" role="alert">
                                    <i class="mdi mdi-alert-circle"></i> Heads up! This alert needs your attention, but it's not super important.
                                </div>
                                <div class="alert alert-fill-warning" role="alert">
                                    <i class="mdi mdi-alert-circle"></i> Warning! Better check yourself, you're not looking too good.
                                </div>
                                <div class="alert alert-fill-danger" role="alert">
                                    <i class="mdi mdi-alert-circle"></i> Oh snap! Change a few things up and try submitting again.
                                </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <!-- FIM DAS NOTIFICAÇÕES -->
                    
                    <!-- QUADRO DE HORÁRIOS -->
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">QUADRO DE AULAS</h4>
                            <p class="card-description">Aulas agendadas para a data de hoje</p>
                            <p class="card-description">Add class <code>.nav-tabs-vertical</code> to <code>.nav</code> and <code>.tab-content-vertical</code> to <code>.tab-content</code>
                            </p>
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <!-- MENU LATERAL DA TABELA - SELEÇÃO DO NÍVEL -->
                                    <ul class="nav nav-tabs nav-tabs-vertical" role="tablist">
                                        <li class="nav-item">
                                        <a class="nav-link active" id="integrado" data-bs-toggle="tab" href="#integrado" role="tab" aria-controls="integrado" aria-selected="true"> Integrado <i class="mdi mdi-home-outline text-info ms-2"></i>
                                        </a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" id="subsequente" data-bs-toggle="tab" href="#subsequente" role="tab" aria-controls="subsequente" aria-selected="false"> Subsequente <i class="mdi mdi-account-outline text-danger ms-2"></i>
                                        </a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" id="graduação" data-bs-toggle="tab" href="#graduação" role="tab" aria-controls="graduação" aria-selected="false"> Graduação <i class="mdi mdi-email-outline text-success ms-2"></i>
                                        </a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" id="outros" data-bs-toggle="tab" href="#outros" role="tab" aria-controls="outros" aria-selected="false"> Outros <i class="mdi mdi-email-outline text-success ms-2"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>

                                        <!-- MENU SUPERIOR DA TABELA - SELEÇÃO DA TURMA - MÉDIO INTEGRADO -->
                                        <div class="col-12 col-sm-8">
                                        <div class="tab-content tab-content-vertical">
                                            <div class="tab-pane fade show active" id="integrado" role="tabpanel" aria-labelledby="integrado-tab">
                                            <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="md01" data-bs-toggle="tab" href="#md01" role="tab" aria-controls="md01" aria-selected="true">MÉDIO - 01</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="md02" data-bs-toggle="tab" href="#md02" role="tab" aria-controls="md02" aria-selected="false">MÉDIO - 02</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="md03" data-bs-toggle="tab" href="#md03" role="tab" aria-controls="md03" aria-selected="false">MÉDIO - 03</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="mdothers" data-bs-toggle="tab" href="#mdothers" role="tab" aria-controls="mdothers" aria-selected="false">...</a>
                                            </li>
                                            </ul>
                                            <div class="tab-content">
                                            <div class="tab-pane fade show active" id="md01" role="tabpanel" aria-labelledby="md01-tab">
                                                <div class="media d-block d-sm-flex">
                                                <img class="me-3 w-25 rounded" src="../../../assets/images/samples/300x300/13.jpg" alt="sample image">
                                                <div class="media-body mt-4 mt-sm-0">
                                                    <h4 class="mt-0">ENSINO MÉDIO - TURMA 01</h4>
                                                    <p> COLOCAR AQUI O QUADRO DE AULAS DO DIA</p>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="md02" role="tabpanel" aria-labelledby="md02-tab">
                                                <div class="media d-block d-sm-flex">
                                                <img class="me-3 w-25 rounded" src="../../../assets/images/faces/face12.jpg" alt="sample image">
                                                <div class="media-body mt-4 mt-sm-0">
                                                    <h4 class="mt-0">ENSINO MÉDIO - TURMA 02</h4>
                                                    <p> COLOCAR AQUI O QUADRO DE AULAS DO DIA </p>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="md03" role="tabpanel" aria-labelledby="md03-tab">
                                                <div class="media d-block d-sm-flex">
                                                <img class="me-3 w-25 rounded" src="../../../assets/images/faces/face12.jpg" alt="sample image">
                                                <div class="media-body mt-4 mt-sm-0">
                                                    <h4 class="mt-0">ENSINO MÉDIO - TURMA 03</h4>
                                                    <p> COLOCAR AQUI O QUADRO DE AULAS DO DIA </p>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="mothers" role="tabpanel" aria-labelledby="mothers-tab">
                                                <h4>Selecione o curso desejado: </h4>
                                                <p> COLOCAR AQUI A OPÇÃO DE EXPANSÃO DOS OUTROS CURSOS. </p>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                        <!-- MENU SUPERIOR DA TABELA - SELEÇÃO DA TURMA - MÉDIO INTEGRADO -->

                                        <!-- MENU SUPERIOR DA TABELA - SELEÇÃO DA TURMA - MÉDIO SUBSEQUENTE -->
                                        <div class="col-12 col-sm-8">
                                            <div class="tab-content tab-content-vertical">
                                                    <div class="tab-pane fade show active" id="subsequente" role="tabpanel" aria-labelledby="subsequente-tab">
                                                    <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="md01" data-bs-toggle="tab" href="#md01" role="tab" aria-controls="md01" aria-selected="true">MÉDIO - 01</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="md02" data-bs-toggle="tab" href="#md02" role="tab" aria-controls="md02" aria-selected="false">MÉDIO - 02</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="md03" data-bs-toggle="tab" href="#md03" role="tab" aria-controls="md03" aria-selected="false">MÉDIO - 03</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="mdothers" data-bs-toggle="tab" href="#mdothers" role="tab" aria-controls="mdothers" aria-selected="false">...</a>
                                                    </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                    <div class="tab-pane fade show active" id="md01" role="tabpanel" aria-labelledby="md01-tab">
                                                        <div class="media d-block d-sm-flex">
                                                        <img class="me-3 w-25 rounded" src="../../../assets/images/samples/300x300/13.jpg" alt="sample image">
                                                        <div class="media-body mt-4 mt-sm-0">
                                                            <h4 class="mt-0">ENSINO MÉDIO - TURMA 01</h4>
                                                            <p> COLOCAR AQUI O QUADRO DE AULAS DO DIA</p>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="md02" role="tabpanel" aria-labelledby="md02-tab">
                                                        <div class="media d-block d-sm-flex">
                                                        <img class="me-3 w-25 rounded" src="../../../assets/images/faces/face12.jpg" alt="sample image">
                                                        <div class="media-body mt-4 mt-sm-0">
                                                            <h4 class="mt-0">ENSINO MÉDIO - TURMA 02</h4>
                                                            <p> COLOCAR AQUI O QUADRO DE AULAS DO DIA </p>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="md03" role="tabpanel" aria-labelledby="md03-tab">
                                                        <div class="media d-block d-sm-flex">
                                                        <img class="me-3 w-25 rounded" src="../../../assets/images/faces/face12.jpg" alt="sample image">
                                                        <div class="media-body mt-4 mt-sm-0">
                                                            <h4 class="mt-0">ENSINO MÉDIO - TURMA 03</h4>
                                                            <p> COLOCAR AQUI O QUADRO DE AULAS DO DIA </p>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="mdothers" role="tabpanel" aria-labelledby="mdothers-tab">
                                                        <h4>Selecione o curso desejado: </h4>
                                                        <p> COLOCAR AQUI A OPÇÃO DE EXPANSÃO DOS OUTROS CURSOS. </p>
                                                    </div>
                                            </div>
                                        </div>    
                                                </div>               
                                    
                                        </div>
                                        <!-- FIM MENU SUPERIOR DA TABELA - SELEÇÃO DA TURMA - MÉDIO SUBSEQUENTE -->
                                        
                                        <!-- MENU SUPERIOR DA TABELA - SELEÇÃO DA TURMA - GRADUAÇÃO -->
                                        <div class="col-12 col-sm-8">
                                            <div class="tab-content tab-content-vertical">
                                                <div class="tab-pane fade show active" id="graduacao" role="tabpanel" aria-labelledby="graduacao-tab">
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li class="nav-item">
                                                        <a class="nav-link active" id="ads02" data-bs-toggle="tab" href="#ADS02" role="tab" aria-controls="ADS02" aria-selected="true">ADS - 02</a>
                                                        </li>
                                                        <li class="nav-item">
                                                        <a class="nav-link" id="ads04" data-bs-toggle="tab" href="#ADS04" role="tab" aria-controls="ADS04" aria-selected="false">ADS - 04</a>
                                                        </li>
                                                        <li class="nav-item">
                                                        <a class="nav-link" id="ads06" data-bs-toggle="tab" href="#ADS06" role="tab" aria-controls="ADS06" aria-selected="false">ADS - 06</a>
                                                        </li>
                                                        <li class="nav-item">
                                                        <a class="nav-link" id="others" data-bs-toggle="tab" href="#others" role="tab" aria-controls="others" aria-selected="false">...</a>
                                                        </li>
                                                    </ul>
                                                        <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="ADS02" role="tabpanel" aria-labelledby="ADS02-tab">
                                                            <div class="media d-block d-sm-flex">
                                                            <img class="me-3 w-25 rounded" src="../../../assets/images/samples/300x300/13.jpg" alt="sample image">
                                                            <div class="media-body mt-4 mt-sm-0">
                                                                <h4 class="mt-0">Análise e Desenvolvimento de Sistemas - 02° Período</h4>
                                                                <p> COLOCAR AQUI O QUADRO DE AULAS DO DIA</p>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="ADS04" role="tabpanel" aria-labelledby="ADS04-tab">
                                                            <div class="media d-block d-sm-flex">
                                                            <img class="me-3 w-25 rounded" src="../../../assets/images/faces/face12.jpg" alt="sample image">
                                                            <div class="media-body mt-4 mt-sm-0">
                                                                <h4 class="mt-0">Análise e Desenvolvimento de Sistemas - 04° Período</h4>
                                                                <p> COLOCAR AQUI O QUADRO DE AULAS DO DIA </p>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="ADS06" role="tabpanel" aria-labelledby="ADS06-tab">
                                                            <div class="media d-block d-sm-flex">
                                                            <img class="me-3 w-25 rounded" src="../../../assets/images/faces/face12.jpg" alt="sample image">
                                                            <div class="media-body mt-4 mt-sm-0">
                                                                <h4 class="mt-0">Análise e Desenvolvimento de Sistemas - 06° Período</h4>
                                                                <p> COLOCAR AQUI O QUADRO DE AULAS DO DIA </p>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="others" role="tabpanel" aria-labelledby="others-tab">
                                                            <h4>Selecione o curso desejado: </h4>
                                                            <p> COLOCAR AQUI A OPÇÃO DE EXPANSÃO DOS OUTROS CURSOS. </p>
                                                        </div>
                                                        </div>
                                                </div>    
                                            </div>               
                                        </div>
                                        <!-- FIM MENU SUPERIOR DA TABELA - SELEÇÃO DA TURMA - GRADUAÇÃO -->
                                    

                                    </div>
                                    </div>
                                </div>
                    </div>
                    <!-- FIM QUADRO DE HORÁRIOS -->
                </div>                    
            </div>
        </div>
    <!-- FIM CONTEINERS -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../../assets/js/off-canvas.js"></script>
    <script src="../../../assets/js/hoverable-collapse.js"></script>
    <script src="../../../assets/js/misc.js"></script>
    <script src="../../../assets/js/settings.js"></script>
    <script src="../../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../../assets/js/tabs.js"></script>
    <!-- End custom js for this page -->
    </body> 
<!-- FIM DO BODY -->
<footer class="footer container">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.ifro.edu.br" target="_blank">CalamaDevs</a>. All rights reserved.</span>
                <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                </div>
    </footer>
    </html>