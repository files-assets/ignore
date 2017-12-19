<nav class="navbar navbar-expand-lg sys-navbar">
  <div class="container">
    <a class="navbar-brand" href="<?php echo BASE_URL; ?>">
      <img src="<?php echo EMPTY_GIF; ?>" alt="<?php echo NAME; ?>"><?php echo BRAND_NAME; ?>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sys-navbar" aria-expanded="false">
      <span class="navbar-toggler-icon fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse sys-navbar-inner" id="sys-navbar">
      <?php
        if ($template_type_name === 'panel') {
          require 'panel-navbar.php';
        } else {
          require 'portal-navbar.php';
        }
      ?>
    </div>
  </div>
</nav>
