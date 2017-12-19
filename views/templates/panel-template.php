<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <?php if (isset($page_title) && !empty($page_title)): ?>
    <title><?php echo $page_title . ' &middot; ' . NAME; ?></title>
  <?php else: ?>
    <title><?php echo NAME; ?></title>
  <?php endif; ?>

  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/default.ico" />

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/vendor/fonts/fontawesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/index.css" />

  <script src="<?php echo BASE_URL; ?>/assets/vendor/js/jquery-popper-bs.min.js"></script>
  <script src="<?php echo BASE_URL; ?>/assets/js/index.js"></script>
</head>
<body id="painel-tpl">
  <?php if ($u->isLogged()): ?>
    <?php require 'utils/header.php'; ?>

    <main class="sys-main-content">
      <div class="sys-main-content-inner container">
        <?php require 'utils/pre-content.php'; ?>

        <?php $this->renderInTemplate($name, $data); ?>
      </div>
    </main>

    <?php require 'utils/footer.php'; ?>
  <?php else: ?>
    <div class="alert alert-danger m-5" role="alert">
      <h4 class="alert-heading">Acesso Negado</h6>
      <p>
        Você não possui acesso ou permissão de visualização para esta página. <br />
        Por favor, faça o <a href="<?php echo BASE_URL; ?>/conta/entrar/" class="alert-link">login</a> para visualizar.
      </p>
      <hr />
      <p>
        Você será redirecionado à página de login em <strong id="timer-tt">5</strong> <span id="label-tt">segundos</span>.
      </p>
    </div>

    <script>
      (function () {
        'use strict';

        var timer = document.getElementById('timer-tt');
        var label = document.getElementById('label-tt');

        setInterval(function () {
          var number = parseInt(timer.innerText);
          if (isNaN(number)) {
            number = 3;
          }

          if (number === 2) {
            label.innerText = 'segundo';
          }

          if (number === 1) {
            window.location.href = '<?php echo BASE_URL; ?>/conta/entrar/';
          }

          timer.innerText = number - 1;
        }, 1000);
      }());
    </script>
  <?php endif; ?>
</body>
</html>
