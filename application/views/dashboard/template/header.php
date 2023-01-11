  <?php
    if ($this->session->userdata("user_id")) { // verifica se existe alguma sessão iniciada pelo login e redireciona
      $data = array(
        "user_id" => $this->session->userdata("user_id") // pega o id da sessão do usuário
      );
    }
  ?>
  
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title><?= $page_title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Material Dashboard CSS -->
    <link rel="stylesheet" href="<?= base_url("assets/dashboard/css/material-dashboard.css"); ?>">
    <link href="<?= base_url("assets/dashboard/css/custom.css"); ?>" rel="stylesheet">
    <link href="<?= base_url("assets/dashboard/css/animations.css"); ?>" rel="stylesheet">

    <link href="<?= base_url("assets/dashboard/plugins/datepicker/dist/css/datepicker.min.css"); ?>" rel="stylesheet">

    <link href="<?= base_url("assets/dashboard/plugins/fullcalendar/packages/core/main.css"); ?>" rel="stylesheet">
    <link href="<?= base_url("assets/dashboard/plugins/fullcalendar/packages/daygrid/main.css"); ?>" rel="stylesheet">
    <link href="<?= base_url("assets/dashboard/plugins/fullcalendar/packages/list/main.css"); ?>" rel="stylesheet">

  </head>

  <body>

    <div class="wrapper ">
      <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo">
          <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            <!--<img class="w-50" src="<?= base_url("assets/dashboard/img/stechz-logo.png") ;?>" alt="">-->
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>
            <!--<li class="nav-item ">
              <a class="nav-link" href="./user.html">
                <i class="material-icons">person</i>
                <p>User Profile</p>
              </a>
            </li> 
            <li class="nav-item ">
              <a class="nav-link" href="<?= base_url('dashboard/config');?>">
                <i class="material-icons">settings</i>
                <p>Configurações</p>
              </a>
            </li>-->
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <a class="navbar-brand" href=""></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
              <ul class="navbar-nav">
               <!-- <li class="nav-item">
                  <a class="nav-link" href="#pablo">
                    <i class="material-icons">dashboard</i>
                    <p class="d-lg-none d-md-block">
                      Stats
                    </p>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">notifications</i>
                    <span class="notification">5</span>
                    <p class="d-lg-none d-md-block">
                      Some Actions
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Mike John responded to your email</a>
                    <a class="dropdown-item" href="#">You have 5 new tasks</a>
                    <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                    <a class="dropdown-item" href="#">Another Notification</a>
                    <a class="dropdown-item" href="#">Another One</a>
                  </div>
                </li> -->
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">
                      Account
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item">Perfil</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('dashboard/logout'); ?>">Sair</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->