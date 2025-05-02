<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Application de gestion de la mutuelle des travailleurs de la BCB">
  <meta name="author" content="BOUDA Dolsom Ostwald Corneille">
  <title><?=$title?></title>
  <!-- Favicon -->
  <link href="./public/assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./public/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="./public/assets/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body>
  <!-- Sidenav -->
  <?php
    if($incorrectPassword){
      echo'<script type="text/javascript">alert("Mot de passe incorrect")</script>';
    }
    elseif ($blocked) {
      echo'<script type="text/javascript">alert("Compte bloqué, Contacter un administrateur")</script>';
    }
    elseif($notFound){
      echo '<script type="text/javascript">alert("Vous n\'etes pas encore membre officiel")</script>';
    }
  ?>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="">
        <img src="./public/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="">
                <img src="./public/assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Navigation -->
        <?php
            if(isset($_SESSION['status']) AND $_SESSION['status']=='administrateur'){
          ?>
          <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/GestAccueil/users">
              <i class="ni ni-tv-2 text-primary"></i> Utilisateurs
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/GestAccueil/tache">
              <i class="ni ni-tv-2 text-primary"></i> Taches
            </a>
          </li>
        </ul>
          <?php
            }
          ?>
          <?php
            if(isset($_SESSION['status']) AND $_SESSION['status']=='traiteur'){
          ?>
          <ul class="navbar-nav">

            <li class="nav-item">
              <a class="nav-link" href="/GestAccueil/tache">
                <i class="ni ni-tv-2 text-primary"></i> Taches
              </a>
            </li>
          </ul>
          <?php
            }
          ?>
          <?php
            if(isset($_SESSION['status']) AND $_SESSION['status']=='accueil'){
          ?>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/GestAccueil/">
                <i class="ni ni-tv-2 text-primary"></i> Accueil
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/GestAccueil/add">
                <i class="ni ni-tv-2 text-primary"></i> Ajouter
              </a>
            </li>
          </ul>
          <?php
            }
          ?>
        <!---<ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/GestAccueil/">
              <i class="ni ni-tv-2 text-primary"></i> Accueil
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/GestAccueil/add">
              <i class="ni ni-tv-2 text-primary"></i> Ajouter
            </a>
          </li>
        </ul>-->
        
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/GestAccueil/">Accueil</a>
        <h1 class="text-white ml-lg-6"><?=$title?></h1>
        

        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?=$_SESSION['nom']?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Bienvenue!</h6>
              </div>
              <div class="dropdown-divider"></div>
              <a href="deconnexion" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
 
    <?php
      include($page_content);
    ?>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-5">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2021 <a href="" class="font-weight-bold ml-1" target="_blank">BCB</a>
            </div>
          </div>
          <div class="col-xl-4">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.bcb.bf" class="nav-link" target="_blank">Banque Commerciale du Burkina</a>
              </li>
              <li class="nav-item">
                <a href="https://www.bcb.bf/presentation" class="nav-link" target="_blank">A Propos de Nous</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="./public/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="./public/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./public/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="./public/assets/js/argon.js?v=1.0.0"></script>
</body>

</html>