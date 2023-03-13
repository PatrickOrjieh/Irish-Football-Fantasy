<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['user_team_name'])) {
  $team_name = $_SESSION['user_team_name'];
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
  <!-- <link href="./myStyle.css" rel="stylesheet"> -->
</head>

<body>
  <main class="container-fluid">
   <div class="row" style="background-image: url('./images/pitch1.jpg'); width: 100%; height: 90%;background-position: center; background-size:cover; background-repeat:no-repeat; position:relative;">
    <div class="col-12 col-md-4 text-center">
    <p><?php echo $team_name; ?> FC</p>
    <img src="./images/logo.png" style="width: 450px; height:400px;" class="img-fluid img-thumbnail" alt="...">
    </div>
    <div class="col-12 col-md-4">
        
    </div>
    <div class="col-12 col-md-4">
        
    </div>
   </div>
  </main><!-- /.container -->
  <div class="b-example-divider"></div>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>