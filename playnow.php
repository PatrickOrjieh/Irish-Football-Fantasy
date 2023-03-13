<?php
include('database.php');

// Select goalkeepers
$queryGoalkeepers = 'SELECT * FROM new_players WHERE position = "Goalkeeper"';
$statement = $db->prepare($queryGoalkeepers);
$statement->execute();
$goalkeepers = $statement->fetchAll();
$statement->closeCursor();

// Select defenders
$queryDefenders = 'SELECT * FROM new_players WHERE position = "Defender"';
$statement = $db->prepare($queryDefenders);
$statement->execute();
$defenders = $statement->fetchAll();
$statement->closeCursor();

// Select midfielders
$queryMidfielders = 'SELECT * FROM new_players WHERE position = "Midfielder"';
$statement = $db->prepare($queryMidfielders);
$statement->execute();
$midfielders = $statement->fetchAll();
$statement->closeCursor();

// Select forwards
$queryForwards = 'SELECT * FROM new_players WHERE position = "Forward"';
$statement = $db->prepare($queryForwards);
$statement->execute();
$forwards = $statement->fetchAll();
$statement->closeCursor();

//select new managers
$queryManagers = 'SELECT * FROM new_managers';
$statement = $db->prepare($queryManagers);
$statement->execute();
$managers = $statement->fetchAll();
$statement->closeCursor();
?>
<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.80.0">
  <title>Fantasy Home Page</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- Custom styles for this template -->
  <link href="./myStyle.css" rel="stylesheet">
  <link href="./playnow.css" rel="stylesheet">
</head>

<body>
  <audio id="myAudio" src="./song/UEFA-Champions-League-Theme-Song-On-Screen.mp3"></audio>
    <script>
      var audio = document.getElementById("myAudio");
      audio.play();
    </script>
  <script>
    function validateForm() {
      // Get the selected options
      const goalkeeper = document.querySelector('input[name="goalkeeper"]:checked');
      const manager = document.querySelectorAll('input[name="manager"]:checked');
      // const defenders = document.querySelectorAll('input[name="defender"]:checked');
      // const midfielders = document.querySelectorAll('input[name="midfielder"]:checked');
      // const forwards = document.querySelectorAll('input[name="forward"]:checked');
      //retriving the selected defenders from the database
      const defenders = document.querySelectorAll('input[name="defender"]:checked');
      const midfielders = document.querySelectorAll('input[name="midfielder"]:checked');
      const forwards = document.querySelectorAll('input[name="forward"]:checked');

      // Check that at least one goalkeeper is selected
      if (!goalkeeper) {
        alert("Please select a goalkeeper");
        return false;
      }

      // Check that exactly one manager is selected
      if (managers.length !== 1) {
        alert("Please select exactly one manager");
        return false;
      }

      // Check that four defenders are selected
      if (defenders.length !== 4) {
        alert("Please select four defenders");
        return false;
      }

      // Check that four midfielders are selected
      if (midfielders.length !== 4) {
        alert("Please select four midfielders");
        return false;
      }

      // Check that two forwards are selected
      if (forwards.length !== 2) {
        alert("Please select two forwards");
        return false;
      }

      // All checks passed
      return true;
    }
  </script>
  <main class="container-fluid my-4" style="color:black">
    <h1 class="text-center mb-5" style="color: white;">Play Now</h1>
    <form action="team.php" method="POST" onsubmit="return validateForm()">
      <div class="row p-2">
        <div class="col-6 col-lg-4 text-center">
          <div class="card border-primary" style="background-color: #0A192F;">
            <div class="card-header" style="background-color: #FFFFFF;">
              <img src="./images/logo.png" class="img-fluid" alt="">
              <h4 class="mt-2" style="font-family: sans-serif; color:#3b5998;">Rules for Ireland Premier Fantasy</h4>
            </div>
            <div class="card-body" style="background-color: #FFFFFF;">
              <ul class="list-unstyled" style="font-family: sans-serif;">
                <li>One Goalkeeper Must be Selected</li>
                <li>4 defenders Must be selected</li>
                <li>4 Midfielders must be selected</li>
                <li>2 Forwards must be selected</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-6 col-lg-7 order-first">
          <img src="./images/chec4.png" class="img-fluid" alt="..." style="object-fit: cover; width: 100%;">
        </div>

      </div>

      <div class="b-example-divider"></div>
      <!--  Managers -->
      <!-- taking the manager data from the database and making up in a carousel -->
      <div class="row align-items-center">
        <div class="col-12 col-lg-4">
          <h1 class="text-center" style="color: white;">Select Your Manager</h1>
        </div>
        <div class="col-12 col-lg-8">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <?php foreach ($managers as $index => $manager) : ?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>" aria-current="<?= $index === 0 ? 'true' : 'false' ?>" aria-label="Slide <?= $index ?>"></button>
              <?php endforeach; ?>
            </div>
            <div class="carousel-inner">
              <?php foreach ($managers as $index => $manager) : ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                  <div class="text-center mt-5">
                    <div class="card mb-3 d-inline-block">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="<?= $manager['manager_pic'] ?>" class="img-fluid rounded-start" alt="<?= $manager['manager_name'] ?>">
                        </div>
                        <div class="col-md-8 align-self-center">
                          <div class="card-body">
                            <h5 class="card-title"><?= $manager['manager_name'] ?></h5>
                            <p class="card-text"><?= $manager['stadium_name'] ?>, <?= $manager['city'] ?></p>
                            <p class="card-text">Capacity: <?= $manager['capacity'] ?></p>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="manager" id="manager<?= $index ?>" value="<?= $manager['manager_id'] ?>">
                              <label class="form-check-label" style="color: #FFFFFF;" for="manager<?= $index ?>">
                                Select <?= $manager['manager_name'] ?>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </div>
            <div class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </div>
          </div>
        </div>
      </div>

      <div class="b-example-divider"></div>
      <!-- Goalkeepers -->
      <fieldset>
        <legend>Goalkeepers</legend>
        <div class="row">
          <?php foreach ($goalkeepers as $goalkeeper) { ?>
            <div class="col-3 mb-3">
              <div class="card">
                <img src="<?= $goalkeeper['image_url'] ?>" class="card-img-top" alt="<?= $goalkeeper['player_name'] ?>">
                <div class="card-body">
                  <h5 class="card-title"><?= $goalkeeper['player_name'] ?></h5>
                  <p class="card-text">Shirt No: <?= $goalkeeper['shirt_no'] ?></p>
                  <p class="card-subtitle">Position: <?= $goalkeeper['position'] ?></p>
                  <p class="card-text">
                    <i class="fa fa-star"></i>5
                    <i class="fa fa-user"></i>Pato
                  </p>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="goalkeeper" value="<?= $goalkeeper['player_id'] ?>">
                    <label class="form-check-label">Select</label>
                  </div>
                  <div class="card-footer">
                    <i class="fa fa-globe"></i> Spanish
                    <small>Barcelona</small>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </fieldset>

      <div class="b-example-divider"></div>
      <!-- Defenders -->
      <fieldset>
        <legend>Defenders</legend>
        <div class="row">
          <?php foreach ($defenders as $defender) { ?>
            <div class="col-3 mb-3">
              <div class="card">
                <img src="<?= $defender['image_url'] ?>" class="card-img-top" alt="<?= $defender['player_name'] ?>">
                <div class="card-body">
                  <h5 class="card-title"><?= $defender['player_name'] ?></h5>
                  <p class="card-text">Shirt No: <?= $defender['shirt_no'] ?></p>
                  <p class="card-text">Position: <?= $defender['position'] ?></p>
                  <p class="card-text">
                    <i class="fa fa-star"></i>5
                    <i class="fa fa-user"></i>Pato
                  </p>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="defender[]" value="<?= $defender['player_id'] ?>">
                    <label class="form-check-label">Select</label>
                  </div>
                  <div class="card-footer">
                    <i class="fa fa-globe"></i> Spanish
                    <small>Barcelona</small>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </fieldset>

      <div class="b-example-divider"></div>
      <!-- Midfielders -->
      <fieldset>
        <legend>Midfielders</legend>
        <div class="row">
          <?php foreach ($midfielders as $midfielder) { ?>
            <div class="col-3 mb-3">
              <div class="card">
                <img src="<?= $midfielder['image_url'] ?>" class="card-img-top" alt="<?= $midfielder['player_name'] ?>">
                <div class="card-body">
                  <h5 class="card-title"><?= $midfielder['player_name'] ?></h5>
                  <p class="card-text">Shirt No: <?= $midfielder['shirt_no'] ?></p>
                  <p class="card-text">Position: <?= $midfielder['position'] ?></p>
                  <p class="card-text">
                    <i class="fa fa-star"></i>5
                    <i class="fa fa-user"></i>Pato
                  </p>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="midfielder[]" value="<?= $midfielder['player_id'] ?>">
                    <label class="form-check-label">Select</label>
                  </div>
                  <div class="card-footer">
                    <i class="fa fa-globe"></i> Spanish
                    <small>Barcelona</small>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </fieldset>

      <div class="b-example-divider"></div>
      <!-- Forwards -->
      <fieldset>
        <legend>Forwards</legend>
        <div class="row">
          <?php foreach ($forwards as $forward) { ?>
            <div class="col-3 mb-3">
              <div class="card">
                <img src="<?= $forward['image_url'] ?>" class="card-img-top" alt="<?= $forward['player_name'] ?>">
                <div class="card-body">
                  <h5 class="card-title"><?= $forward['player_name'] ?></h5>
                  <p class="card-text">Shirt No: <?= $forward['shirt_no'] ?></p>
                  <p class="card-text">Position: <?= $forward['position'] ?></p>
                  <p class="card-text">
                    <i class="fa fa-star"></i>5
                    <i class="fa fa-user"></i>Pato
                  </p>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="forward[]" value="<?= $forward['player_id'] ?>">
                    <label class="form-check-label">Select</label>
                  </div>
                  <div class="card-footer">
                    <i class="fa fa-globe"></i> Spanish
                    <small>Barcelona</small>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </fieldset>

      <div class="b-example-divider"></div>
      <div class="text-center my-3">
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <input type="submit" class="btn btn-primary" value="Submit">
      </div>
    </form>
  </main><!-- /.container -->
  <div class="b-example-divider"></div>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>