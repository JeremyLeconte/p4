<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand">Blog de Jean Forteroche</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">Accueil</a>
          </li>
          <?php if (array_key_exists("isLoggedIn",$_SESSION) && $_SESSION["isLoggedIn"]==true) { ?>
            <li class="nav-item">
              <a class="nav-link" href="./index.php?page=InterfaceAdmin">Administration</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./index.php?page=logOut">se déconnecter</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="./index.php?page=identification">Login</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>