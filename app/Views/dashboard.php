<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>IFRO Calama - Sistemas - by Calama Devs</title>

  <link rel="stylesheet" href="<?php echo base_url("assets/vendors/mdi/css/materialdesignicons.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/vendors/css/vendor.bundle.base.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/vendors/select2/select2.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/modern-vertical/style.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/vendors/font-awesome/css/font-awesome.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/vendors/jquery-toast-plugin/jquery.toast.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css"); ?>">

  <link rel="shortcut icon" href="<?php echo base_url("assets/images/logo-ifro-mini.png"); ?>" />

  <script src="<?php echo base_url("assets/vendors/js/vendor.bundle.base.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendors/jquery-validation/jquery.validate.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendors/jquery-toast-plugin/jquery.toast.min.js"); ?>"></script>

  <script src="<?php echo base_url("assets/vendors/select2/select2.min.js"); ?>"></script>
  <script src="<?php echo base_url('assets/vendors/typeahead.js/typeahead.bundle.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/typeahead.js') ?>"></script>



  <style>
    /*Estilização para tabelas menores*/
    .button-trans-success,
    .button-trans-danger {
      margin: 0;
    }

    .d-flex .btn-icon {
      margin-right: 0.3rem;
      width: 2rem;
      height: 2rem;
      ;
    }

    .table td,
    .table th {
      line-height: 1.2;
      height: auto;
      padding: 0.3rem 0.5rem;
    }

    /*Estilização para select2*/
    .select2-container {
      z-index: 9999;
    }

    .select2-dropdown {
      z-index: 1050;
    }

    .select2-search {
      z-index: 1060;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a href="<?php echo base_url("/sys/home") ?>">
        <img src="<?php echo base_url("assets/images/logo-ifro.png"); ?>" class="sidebar-brand brand-logo" alt="logo" />
        <img src="<?php echo base_url("assets/images/logo-ifro-mini.png"); ?>" class="sidebar-brand brand-logo-mini" alt="logo" />
        </a>
      </div>
      <ul class="nav">
        <li class="nav-item menu-items">
          <a class="nav-link" href="<?php echo base_url("/sys/home") ?>" style="margin-top:20px;">
            <span class="menu-icon">
              <i class="mdi mdi-home"></i>
            </span>
            <span class="menu-title">Página inicial</span>
          </a>
        </li>

        <li class="nav-item nav-category">
          <span class="nav-link">Gestão de Horários</span>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('sys/versao'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-multicast"></i>
            </span>
            <span class="menu-title">Versões de Horários</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="">
            <span class="menu-icon">
              <i class="mdi mdi-clock-time-eight"></i>
            </span>
            <span class="menu-title">Horários de Aula</span>
          </a>
        </li>        

        <li class="nav-item nav-category">
          <span class="nav-link">Cadastros</span>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('sys/professor'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-account"></i>
            </span>
            <span class="menu-title">Professores</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('sys/matriz'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-notebook-check"></i>
            </span>
            <span class="menu-title">Matriz Curricular</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('sys/disciplina'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-book-open-variant"></i>
            </span>
            <span class="menu-title">Disciplinas</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('sys/curso'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-school"></i>
            </span>
            <span class="menu-title">Cursos</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('sys/turma'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-account-group"></i>
            </span>
            <span class="menu-title">Turmas</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('sys/horario'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-calendar-cursor-outline"></i>
            </span>
            <span class="menu-title">Grade de Horários</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('sys/tempoAula'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-chair-school"></i>
            </span>
            <span class="menu-title">Tempos de Aula</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('sys/cadastro-ambientes'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-cast-education"></i>
            </span>
            <span class="menu-title">Ambientes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('sys/aulas'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-human-male-board"></i>
            </span>
            <span class="menu-title">Aulas</span>
          </a>
        </li>

        <li class="nav-item nav-category">
          <span class="nav-link">Relatórios</span>
        </li>

        <li class="nav-item menu-items">
          <a class="nav-link" href="<?php echo base_url('sys/relatorios'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Em construção...</span>
          </a>
        </li>

        <?php if (auth()->user()->inGroup('admin')): ?>
          <li class="nav-item nav-category">
            <span class="nav-link">Gestão de Usuários</span>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('sys/admin'); ?>">
              <span class="menu-icon">
                <i class="mdi mdi-account-cog"></i>
              </span>
              <span class="menu-title">Usuários do Sistema</span>
            </a>
          </li>
        <?php endif; ?>

      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="<?php echo base_url("assets/images/logo-ifro-mini.png"); ?>" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <!--
            <li class="nav-item dropdown border-left">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email"></i>
                <span class="count bg-success"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="<?php echo base_url("assets/images/faces/face4.jpg"); ?>" alt="image" class="rounded-circle profile-pic">
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                    <p class="text-muted mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="<?php echo base_url("assets/images/faces/face2.jpg"); ?>" alt="image" class="rounded-circle profile-pic">
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                    <p class="text-muted mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="<?php echo base_url("assets/images/faces/face3.jpg"); ?>" alt="image" class="rounded-circle profile-pic">
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                    <p class="text-muted mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0 text-center">4 new messages</p>
              </div>
            </li>
            <li class="nav-item dropdown border-left">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <i class="mdi mdi-bell"></i>
                <span class="count bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Event today</p>
                    <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-cog text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Settings</p>
                    <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-link-variant text-warning"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Launch Admin</p>
                    <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0 text-center">See all notifications</p>
              </div>
            </li>
-->
            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                <div class="navbar-profile">
                  <!--<img class="img-xs rounded-circle" src="<?php echo base_url("assets/images/faces/face15.jpg"); ?>" alt="">-->
                  <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo auth()->user()->username; ?></p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                <h6 class="p-3 mb-0">Perfil</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-cog text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Configurações</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item" href="<?php echo base_url('logout'); ?>">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Sair</p>
                  </div>
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <?php echo $content; ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="javascript: void()">Calama Devs</a>.</span>
            <span class="text-muted float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Feito a mão e com <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <script src="<?php echo base_url("assets/vendors/chart.js/chart.umd.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendors/progressbar.js/progressbar.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendors/jvectormap/jquery-jvectormap.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendors/datatables.net/jquery.dataTables.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"); ?>"></script>

  <script src="<?php echo base_url("assets/js/off-canvas.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/hoverable-collapse.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/misc.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/settings.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/todolist.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/tabs.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/file-upload.js"); ?>"></script>

  <script src="<?php echo base_url("assets/js/dashboard.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/form-validation.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/validacoes/cadastro-professor.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/validacoes/edicao-professor.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/validacoes/cadastro-disciplina.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/validacoes/cadastro-cursos.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/dashboards/dashboards.js"); ?>"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>