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

  <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-12 col-sm-8 col-md-6 col-lg-4 mx-auto">
            <div class="card-body px-4 py-5">
              <!--Logo do Instituto Federal -->
              <div class="d-flex flex-column flex-md-row align-items-center justify-content-md-start mb-4">
                <img src="<?php echo base_url('assets/images/logo-ifro-mini.png'); ?>" alt="Instituto Federal" class="img-fluid mb-3 mb-md-0" style="width: 50px; margin-right: 20px;">
                <h3 class="mb-0 text-center">Gerenciador de Horários</h3>
              </div>

              <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger text-center" role="alert">
                  <?= session()->getFlashdata('error') ?>
                </div>
              <?php endif; ?>

              <form action="<?= url_to('login') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Email -->
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
                  <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
                </div>

                <!-- Password -->
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="current-password" placeholder="<?= lang('Auth.password') ?>" required>
                  <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
                </div>

                <!-- Remember Me e Captcha -->
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
                  <div class="form-check mb-3 mb-md-0">
                    <input type="checkbox" name="remember" class="form-check-input" id="rememberMe" <?php if (old('remember')): ?> checked<?php endif ?>>
                    <label class="form-check-label" for="rememberMe">
                      <?= lang('Auth.rememberMe') ?>
                    </label>
                  </div>
                  <div class="captcha-container">
                    <div class="g-recaptcha" data-sitekey="6LcEEXEqAAAAAMJ-gOE6cJbtVJwCHKd8raNKw29X" data-action="LOGIN"></div>
                  </div>
                </div>

                <!-- Botão de login -->
                <div class="text-center d-grid gap-2">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">ENTRAR</button>
                </div>

                <footer class="footer-login">
                  <div class="d-flex justify-content-center">
                    <span class="text-muted text-center">
                      © 2024 Gerenciador de Horários -
                      <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal-2">Calama Devs.</a>
                    </span>
                  </div>
                </footer>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title fade-in" id="exampleModalLabel-2">Sobre Calama Devs</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="fade-in" style="font-size: 14px; text-align: justify;">O Calama Devs é um grupo de desenvolvedores de software formado por alunos e professores do curso de Análise e Desenvolvimento de Sistemas do IFRO - Campus Calama, vinculado ao grupo de pesquisa GPMecatrônica.</p> <br>
                        <p class="fade-in" style="font-size: 13px; font-weight: bold;">MEMBROS DO GRUPO:</p> <br>
                        <p class="fade-in" style="font-size: 13px;">Prof. Leandro Ferrarezi Valiante</p>
                        <p class="fade-in" style="font-size: 13px;">Prof. Paulo Sérgio Tomé</p>
                        <p class="fade-in" style="font-size: 13px;">Prof. Willians de Paula Pereira</p> <br>
                        <p class="fade-in" style="font-size: 13px;">Igor Vinícius Medonça Barreto</p>
                        <p class="fade-in" style="font-size: 13px;">José Claion Martins de Sousa</p>
                        <p class="fade-in" style="font-size: 13px;">Luis Henrique Bergonzini Souza</p>
                        <p class="fade-in" style="font-size: 13px;">Luis Marcelo Fabrício Guimarães</p>
                        <p class="fade-in" style="font-size: 13px;">Poliana Carvalho Lima</p>
                        <p class="fade-in" style="font-size: 13px;">Paloma Carvalho Lima</p>
                        <p class="fade-in" style="font-size: 13px;">Sanmara Letícia Nunes de Souza</p>
                        <p class="fade-in" style="font-size: 13px;">Vitória Oliveira de Lima</p> <br>
                        <p class="fade-in" style="font-size: 13px; color: gray; text-decoration: line-through">Fernanda Coelho Nunes</p>
                        <p class="fade-in" style="font-size: 13px; color: gray; text-decoration: line-through">Maria Luiza Botelho Guimarães</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal Ends -->

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
  <script>
    function onSubmit(token) {
      document.getElementById("demo-form").submit();
    }
  </script>
  <script src="<?php echo base_url("assets/js/off-canvas.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/hoverable-collapse.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/misc.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/settings.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/todolist.js"); ?>"></script>

  <script>
    function onSubmit(token) {
      document.getElementById("demo-form").submit();
    }
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const modal = document.getElementById('exampleModal-2');

      //efeito de fade-in ao abrir a modal
      modal.addEventListener('show.bs.modal', function() {
        const fadeElements = modal.querySelectorAll('.fade-in');
        fadeElements.forEach(el => el.classList.add('fade-in'))
      });

      //remove o efeito fade-in ao fechar a modal
      modal.addEventListener('hidden.bs.modal', function() {
        const fadeElements = modal.querySelectorAll('.fade-in');
        fadeElements.forEach(el => el.classList.remove('fade-in'));
      });
    });
  </script>
  <!-- endinject -->
</body>

</html>