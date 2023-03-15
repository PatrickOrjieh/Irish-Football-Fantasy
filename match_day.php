<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_team_name'])) {
    $team_name = $_SESSION['user_team_name'];
    $user_id = $_SESSION['user_id'];
}

require('database.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_team_name'])) {
    $team_name = $_SESSION['user_team_name'];
}

require('database.php');

$user_team_id = "DrM";

//to get the match fixture for DrM , 
//first get the last match played by DrM from the session variable
$get_match_id_stmt = $db->prepare("SELECT last_match FROM users WHERE id = :user_id");
$get_match_id_stmt->bindParam(':user_id', $_SESSION['user_id']);
$get_match_id_stmt->execute();
$game_id = $get_match_id_stmt->fetch();

$match_id = $game_id['last_match'];

$match_stmt = $db->prepare("SELECT * FROM fixtures WHERE match_day = :match_id AND (home_team = :team_id OR away_team = :team_id)");
$match_stmt->bindParam(':match_id', $match_id);
$match_stmt->bindParam(':team_id', $user_team_id);
$match_stmt->execute();
$match = $match_stmt->fetch();

//now output the match fixture
// echo $match['home_team'] . ' ';
// echo $match['away_team'] . ' ';
// echo $match['fixture_date'] . ' ';
// echo $match['match_desc'] . ' ';

//now get the team names for the home and away teams
$home_team_stmt = $db->prepare("SELECT * FROM team_table WHERE team_id = :home_team_id");
$home_team_stmt->bindParam(':home_team_id', $match['home_team']);
$home_team_stmt->execute();
$home_team = $home_team_stmt->fetch();

$away_team_stmt = $db->prepare("SELECT * FROM team_table WHERE team_id = :away_team_id");
$away_team_stmt->bindParam(':away_team_id', $match['away_team']);
$away_team_stmt->execute();
$away_team = $away_team_stmt->fetch();

//incfreament the match id by 1 and update the last_match in the user table with the user_id in the session variable
// Increment the match_id and update the last_match played by the user
$match_id = $match_id + 1;
//update the user_last_match in the session variable
$user_id = $_SESSION['user_id'];
$update_stmt = $db->prepare("UPDATE users SET last_match = :match_id WHERE id = :user_id");
$update_stmt->bindParam(':match_id', $match_id);
$update_stmt->bindParam(':user_id', $user_id);
$update_stmt->execute();

//redirect the page after the match has been played to the index page after 5 seconds
header("refresh:95;url=index.php");

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
    <link href="./match_day.css" rel="stylesheet">
</head>

<body>
    <main class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 col-md-4 text-center">
                <p class="team-name"><?php echo $home_team['team_name']; ?></p>
                <img class="logo" src="<?php echo $home_team['logo']; ?>" alt="logo" style="width: 200px; height: 200px;">
            </div>
            <div class="col-12 col-md-4 text-center">
                <div class="timer vs-section">
                    <p><span class="seconds">00</span>'</p>
                </div>

                <div class="scoreboard d-flex justify-content-between">
                    <div class="home-score d-flex justify-content-center align-items-center" style="background-color: white; width: 3rem; height: 3rem;">
                        <span class="score" style="font-size: 1.8rem;">0</span>
                    </div>
                    <div class="away-score d-flex justify-content-center align-items-center" style="background-color: white; width: 3rem; height: 3rem;">
                        <span class="score" style="font-size: 1.8rem;">0</span>
                    </div>
                </div>

                <p class="stadium-name"><?php echo $home_team['stadium_name']; ?></p>
                <p class="capacity"><?php echo $home_team['capacity']; ?></p>
            </div>

            <div class="col-12 col-md-4 text-center">
                <p class="team-name"><?php echo $away_team['team_name']; ?></p>
                <img class="logo" src="<?php echo $away_team['logo']; ?>" alt="logo" style="width: 200px; height: 200px;">
            </div>
        </div>
    </main><!-- /.container -->
    <div class="b-example-divider"></div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        var seconds = 0;
        var timer = setInterval(function() {
            seconds++;
            if (seconds < 10) {
                document.querySelector('.seconds').textContent = '0' + seconds;
            } else {
                document.querySelector('.seconds').textContent = seconds;
            }
            if (seconds == 90) {
                clearInterval(timer);
            }
        }, 1000);
    </script>
    <script>
        // Get the home and away score elements
        const homeScoreElement = document.querySelector('.home-score .score');
        const awayScoreElement = document.querySelector('.away-score .score');

        // Function to update the scores
        function updateHomeScores() {
            var sec = parseInt(document.querySelector('.seconds').innerHTML);
            //once the timer reaches 90 seconds, stop updating the scores
            if (sec == 90) {
                return;
            }
            // Get the current scores
            const homeScore = parseInt(homeScoreElement.textContent);
            const randomScore1 = Math.floor(Math.random() * 2);
            // Update the scores
            homeScoreElement.textContent = homeScore + randomScore1;
            // Wait a random amount of time (between 3 and 30 seconds) before updating the scores again
            const timeToNextUpdate = Math.floor(Math.random() * 30000) + 3000;
            setTimeout(updateHomeScores, timeToNextUpdate);
        }

        function updateAwayScores() {
            var sec = parseInt(document.querySelector('.seconds').innerHTML);
            //once the timer reaches 90 seconds, stop updating the scores
            if (sec == 90) {
                return;
            }
            const awayScore = parseInt(awayScoreElement.textContent);
            const randomScore2 = Math.floor(Math.random() * 2);
            awayScoreElement.textContent = awayScore + randomScore2;
            const timeToNextUpdate = Math.floor(Math.random() * 30000) + 3000;
            setTimeout(updateAwayScores, timeToNextUpdate);
        }

        // Start updating the scores
        updateHomeScores();
        updateAwayScores();
    </script>
</body>

</html>