<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IFRO Calama</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url("assets/vendors/mdi/css/materialdesignicons.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/vendors/css/vendor.bundle.base.css"); ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/modern-vertical/style.css"); ?>">
    <!-- End layout styles -->
    <!--<link rel="shortcut icon" href="<?php echo base_url("assets/images/favicon.png"); ?>" />-->
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-12 col-sm-8 col-md-6 col-lg-4 mx-auto">
              <div class="card-body px-4 py-5">
                <!--Logo do Instituto Federal -->
                <div class="d-flex flex-column flex-md-row align-items-center mb-4">
                  <img src="<?php echo base_url('assets/images/logo-ifro.png'); ?>" alt="Instituto Federal" class="img-fluid mb-3 mb-md-0" style="width: 150px; margin-right: 25px;">
                  <h3 class="mb-0 text-center text-md-start">Gerenciador de Horários</h3>
                </div>
                <form>
                  <div class="form-group">
                    <label>Usuário ou e-mail:</label>
                    <input type="text" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Senha:</label>
                    <input type="text" class="form-control p_input">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Manter conectado </label>
                    </div>
                    <a href="#" class="forgot-pass">Esqueci minha senha</a>
                  </div>
                  <div class="text-center d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">ENTRAR</button>
                  </div>
                  <!--<div class="d-flex">
                    <button class="btn btn-facebook me-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>-->
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo base_url("assets/vendors/js/vendor.bundle.base.js"); ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url("assets/js/off-canvas.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/hoverable-collapse.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/misc.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/settings.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/todolist.js"); ?>"></script>
    <!-- endinject -->
  </body>
</html>
