<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>IFRO Calama - Sistemas - by Calama Devs</title>

  <link rel="stylesheet" href="<?php echo base_url("assets/vendors/mdi/css/materialdesignicons.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/vendors/css/vendor.bundle.base.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/vendors/font-awesome/css/font-awesome.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/modern-vertical/style.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/vendors/jquery-toast-plugin/jquery.toast.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css"); ?>">

  <link rel="shortcut icon" href="<?php echo base_url("assets/images/logo-ifro-mini.png"); ?>" />

  <!-- plugins:js -->
  <script src="<?php echo base_url("assets/vendors/js/vendor.bundle.base.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendors/jquery-validation/jquery.validate.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendors/jquery-toast-plugin/jquery.toast.min.js"); ?>"></script>
  <!-- endinject -->
</head>

<body>
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <img src="<?php echo base_url("assets/images/logo-ifro.png"); ?>" class="sidebar-brand brand-logo" alt="logo" />
        <img src="<?php echo base_url("assets/images/logo-ifro-mini.png"); ?>" class="sidebar-brand brand-logo-mini" alt="logo" />
      </div>
      <ul class="nav">
      <li class="nav-item menu-items">
          <a class="nav-link" href="<?php echo base_url("/sys/home")?>" style="margin-top:20px;">
            <span class="menu-icon">
              <i class="mdi mdi-home"></i>
            </span>
            <span class="menu-title">Página inicial</span>
          </a>
        </li>

        <li class="nav-item menu-items">
          <a class="nav-link" href="<?php echo base_url('sys/relatorios'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Relatórios</span>
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
          <a class="nav-link" href="<?php echo base_url('sys/cadastro-cursos'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-school"></i>
            </span>
            <span class="menu-title">Cursos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('sys/cadastro-disciplinas'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-book-open-variant"></i>
            </span>
            <span class="menu-title">Disciplinas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('sys/matriz-curricular'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-notebook-check"></i>
            </span>
            <span class="menu-title">Matriz Curricular</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('sys/cadastro-turmas'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-account-group"></i>
            </span>
            <span class="menu-title">Turmas</span>
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
          <a class="nav-link" href="<?php echo base_url('sys/cadastro-aulas'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-human-male-board"></i>
            </span>
            <span class="menu-title">Aulas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('sys/cadastro-horarios-de-aula'); ?>">
            <span class="menu-icon">
              <i class="mdi mdi-clock-time-eight"></i>
            </span>
            <span class="menu-title">Horários de Aula</span>
          </a>
        </li>
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
            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                <div class="navbar-profile">
                  <img class="img-xs rounded-circle" src="<?php echo base_url("assets/images/faces/face15.jpg"); ?>" alt="">
                  <p class="mb-0 d-none d-sm-block navbar-profile-name">Henry Klein</p>
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
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="https://ifrocalama.com/" target="_blank">Calama Devs</a>.</span>
            <span class="text-muted float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
     </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- Plugin js for this page -->
  <script src="<?php echo base_url("assets/vendors/progressbar.js/progressbar.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendors/jvectormap/jquery-jvectormap.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"); ?>"></script>
  <!-- End plugin js for this page -->

  <!-- Plugin js for this page -->
  <script src="<?php echo base_url("assets/vendors/datatables.net/jquery.dataTables.js"); ?>"></script>
  <script src="<?php echo base_url("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"); ?>"></script>
  <!-- End plugin js for this page -->

  <!-- inject:js -->
  <script src="<?php echo base_url("assets/js/off-canvas.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/hoverable-collapse.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/misc.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/settings.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/todolist.js"); ?>"></script>
  <!-- endinject -->

  <!-- Custom js for this page -->
  <script src="<?php echo base_url("assets/js/dashboard.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/form-validation.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/validacoes/cadastro-professor.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/validacoes/edicao-professor.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/validacoes/cadastro-disciplina.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/validacoes/cadastro-cursos.js"); ?>"></script>
  <!-- End custom js for this page -->
</body>

</html>