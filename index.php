<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['user_team_name'])) {
  $team_name = $_SESSION['user_team_name'];
}
require('database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve email and password from form
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Validate email and password
  if (empty($email)) {
    $error = "Email is required";
  } else if (empty($password)) {
    $error = "Password is required";
  } else {
    // Check if email and password match a user in the database
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
      // Check if password matches
      if (password_verify($password, $user['password_hash'])) {
        // Log user in
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_team_name'] = $user['team_name'];
        echo "login successful........";
        header("refresh:2;url=index.php");
      } else {
        $error = "Invalid email or password";
      }
    } else {
      $error = "Invalid email or password";
    }
  }

  // Check if email and password match a user in the database
  // ...

  // If a user is found, log them in and redirect to homepage
  // ...
}
?>

<!doctype html>
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
</head>

<body>
  <?php require('header.php'); ?>
  <main class="container-fluid">
    <?php if (isset($_SESSION['user_id'])) : ?>
      <div class="container mb-2 bg-dark">
        <div class="row">
          <div class="col-12 col-lg-5 text-center">
            <img src="./images/enter.png" style="width: 450px; height:400px;" class="img-fluid img-thumbnail" alt="...">
          </div>
          <div class="col-12 col-lg-7">
            <div class="card text-center bg-dark" style="width: 30rem;">
              <img src="./images/welcome.png" class="card-img-top mx-auto" alt="..." style="width: 200px; height:250px;" >
              <div class="card-body">
                <p class="card-text">Welcome Manager to the club</p>
                <p class="card-text" style="font-weight: bolder; font-size: 2.8em;"><?php echo $team_name; ?>!!!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php else : ?>
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./images/kk3.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./images/caro5.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./images/error3.png" class="d-block w-100" alt="...">
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['user_id'])) : ?>
    <?php else : ?>
      <div class="container sign mt-5 mb-3">
        <div class="row">
          <div class="col-12">
            <?php if (isset($error)) : ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
              </div>
            <?php endif; ?>
            <form id="log" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
              <div class="form-group row">
                <h2 class="col-12 col-lg-1 mb-3" style="color: #212529; font-size: 17px; font-weight: bolder;">Sign In</h2>
                <label for="email" class="col-4 col-lg-1 mb-3 col-form-label">Email</label>
                <div class="col-8 col-lg-3">
                  <input type="text" class="form-control input-decoration" id="email" name="email" placeholder="Email">
                </div>
                <label for="password" class="col-4 mb-3 col-lg-1 col-form-label">Password</label>
                <div class="col-8 col-lg-3">
                  <input type="password" class="form-control input-decoration" id="password" name="password" placeholder="Password">
                </div>
                <div class="offset-4 offset-lg-0 col-8 col-lg-3">
                  <button type="submit" class="btn bg-info">Sign In</button>
                  &nbsp;
                  <a href="" style="text-decoration: none;">Forgot Password?</a>
                </div>
              </div>
            </form>
          </div>
          <div class="row mt-5 mb-4">
            <div class="col text-center position-relative">
              <hr style="border-top: 1px solid black; width: 100%; margin: auto;">
              <span class="bg-white px-3 position-absolute" style="color:#212529;top: -12px; left: 50%; transform: translateX(-50%);">Or login with</span>
            </div>
          </div>
          <div class="row" style="flex-wrap: wrap;">
            <div class="col text-center">
              <a href="" class="btn btn-primary btn-lg mt-1" style="background-color: #3b5998; border-color: #3b5998;"><i class="fa fa-facebook"></i> Facebook</a>

              <a href="" class="btn btn-primary btn-lg mt-1" style="background-color: #dd4b39; border-color: #dd4b39;"><i class="fa fa-google"></i> Google</a>

              <a href="" class="btn btn-primary btn-lg mt-1" style="background-color: #0077b5; border-color: #0077b5;"><i class="fa fa-linkedin"></i> LinkedIn</a>

              <a href="" class="btn btn-primary btn-lg mt-1" style="background-color: #1da1f2; border-color: #1da1f2;"><i class="fa fa-twitter"></i> Twitter</a>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['user_id'])) : ?>

    <?php else : ?>
      <div class="container mt-4 mb-4">
        <div class="row align-items-center" style="background-color: #212529;">
          <div class="col-12 col-sm-3 text-center mb-2 p-3" style="font-weight: bold; font-size:20px;">
            <img src="./images/logo.png" style="border-radius: 50%; height:2rem; width: 2rem;" alt=""> Fantasy
          </div>
          <div class="col-12 col-sm-6 mb-2 p-3">
            <h4 style="color: #0dcaf0;">Ready to Play Irish Premier Fantasy</h4>
            <p>With over 9 million players, Fantasy Premier League is the biggest Fantasy
              Football game in the world. <span style="font-weight: bold;">It’s FREE to play and you can win great prizes!</span> </p>
          </div>
          <div class="col-12 col-sm-3 mb-2 text-center d-grid gap-2  mx-auto">
            <a href="signUp.php" target="_self" class="btn bg-info p-2" style="font-size: small; font-weight: bold;">Sign Up Now</a>
          </div>
        </div>
      </div>
    <?php endif; ?>


    <div class="container" style="color:#212529;">
      <div class="row row-content align-items-center">
        <div class="col-12 col-sm-4 order-sm-last col-md-3 text-center">
          <h3>Meet our Creator</h3>
        </div>
        <div class="col col-sm order-sm-first col-md">
          <div class="media">
            <img src="./images/me.jpg" alt="alberto" class="d-flex mr-3 img-thumbnail align-self-center">
            <div class="media-body">
              <h2 class="mt-0">Patrick Orjieh</h2>
              <h4>Executive Chief</h4>
              <p class="d-none d-sm-block">Patrick Orjieh, the renowned award-winning developer, has been making waves in the tech world with his cutting-edge innovations, inspiring countless others to follow in his footsteps. His relentless pursuit of excellence and unwavering passion for coding has led him to create some of the most remarkable software applications in the industry, earning him numerous accolades and recognition from his peers. Whether it's building complex algorithms or designing intuitive user interfaces, Patrick always goes above and beyond to deliver exceptional results, cementing his status as a true visionary in the world of technology.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main><!-- /.container -->
  <div class="b-example-divider"></div>
  <?php require('footer.php'); ?>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>