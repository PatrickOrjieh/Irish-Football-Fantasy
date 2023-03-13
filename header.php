<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['user_team_name'])) {
  $team_name = $_SESSION['user_team_name'];
}
?>
<div class="container-fluid fixed-top" style="position:sticky;">
  <div class="row align-items-center">
    <div class="col-12">
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
        <div class="container-fluid">
          <a class="navbar-brand d-inline-block nav-link disabled d-xl-none" href="">Club Logos</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerLogo" aria-controls="navbarTogglerLogo" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerLogo">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/1.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;&nbsp;<p class="d-inline-block d-lg-none">Athlone Town</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/2.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Bohemians</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/3.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Bray Wanderers</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/4.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Cobh Ramblers</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/5.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Cork City</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/6.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Derry City</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/7.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">DLR Waves FC</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/8.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Drogheda United</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/9.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Dundalk</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/10.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Finn Harps</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/11.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Galway United</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/12.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Kerry FC</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/13.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Longford Town</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/14.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Peamount United FC</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/15.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Shamrock Rovers</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/16.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Shelbourne</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/17.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Sligo Rovers</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/18.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">St. Patrick's Athletic</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/19.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Treaty United</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/20.png" alt="Logo" width="30" height="30  " class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">UCD AFC</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/21.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Waterford</p></a></li>
              <li class="nav-item"><a class="nav-link logo_image" href="#"><img src="./images/badges/22.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;<p class="d-inline-block d-lg-none">Wexford FC</p></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class="col-12">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="./index.php" style="color: white;">
            <img src="./images/logo.png" id="logo" alt="Logo" width="30" height="24" class="d-inline-block">
            Ireland Fantasy
          </a>
          <!-- <a class="navbar-brand d-inline-block nav-link disabled" href="">Navbar</a> -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" style="color: white;" href="./contact-us.php">Contact-Us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" style="color: white;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Translate
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <?php if (isset($_SESSION['user_id'])) : ?>
                  <a href="./playnow.php" type="button" class="btn btn-danger">PLAY NOW</a>
                <?php else : ?>
                  <!-- <button type="button" class="btn btn-primary">LOG IN</button> -->
                  <a href="#log" class="btn btn-primary">SIGN IN</a>
                <?php endif; ?>
              </li>
            </ul>
            <?php if (isset($_SESSION['user_id'])) : ?>
              <form action="logout.php" method="POST">
                <button type="submit" class="btn btn-danger">Logout</button>
              </form>
            <?php else : ?>
            <?php endif; ?>

            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn bg-info" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <div class="row align-items-center">
    <div class="col-12">
      <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="container-fluid d-flex justify-content-around">
          <div class="navbar-nav">
            <a class="nav-link check" href="#">Teams</a>
            <a class="nav-link check" href="#">League Table</a>
            <a class="nav-link check" href="#">Fixtures</a>
            <a class="nav-link check" href="#">Statistics</a>
            <a class="nav-link check" href="#">Players</a>
          </div>
        </div>
      </nav>

    </div>
  </div>

</div>