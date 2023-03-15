<?php
require 'database.php';

// Set default values for search and filter parameters
$search = '';
$filter = '';

// Check if search and filter parameters are provided in the URL
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
}

// Prepare SQL query with optional search and filter conditions
$fixture_query = "SELECT * FROM team_table t, fixtures f WHERE t.team_id = f.home_team";
if ($search !== '') {
    $fixture_query .= " AND (t.team_name LIKE :search OR f.match_day LIKE :search)";
}
if ($filter !== '') {
    $fixture_query .= " AND f.fixture_date = :filter";
}
$fixture_query .= " ORDER BY f.match_day";

$fixture_stmt = $db->prepare($fixture_query);

// Bind search and filter parameters to query
if ($search !== '') {
    $search_param = '%' . $search . '%';
    $fixture_stmt->bindParam(':search', $search_param, PDO::PARAM_STR);
}
if ($filter !== '') {
    $fixture_stmt->bindParam(':filter', $filter, PDO::PARAM_STR);
}

$fixture_stmt->execute();
$fixtures = $fixture_stmt->fetchAll();
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
    <style>
        .team-logo {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .team-name {
            font-weight: bold;
        }

        .fixture-date {
            font-style: italic;
        }
    </style>
</head>

<body>
<?php require('header.php'); ?>
    <main class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 style="color: black;">Fixtures</h1>
                <form method="get">
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="search">Search by team name or match day:</label>
            <input type="text" class="form-control" name="search" id="search" value="<?php echo $search; ?>" onchange="this.form.submit();">
        </div>
        <div class="col-md-4 mb-3">
            <label for="filter">Filter by fixture date:</label>
            <input type="date" class="form-control" name="filter" id="filter" value="<?php echo $filter; ?>" onchange="this.form.submit();">
        </div>
    </div>
</form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Match Day</th>
                            <th>Home Team</th>
                            <th>Away Team</th>
                            <th>Fixture Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fixtures as $fixture) { ?>
                            <?php
                            $home_team_stmt = $db->prepare("SELECT * FROM team_table WHERE team_id = ?");
                            $home_team_stmt->execute([$fixture['home_team']]);
                            $home_team = $home_team_stmt->fetch();

                            $away_team_stmt = $db->prepare("SELECT * FROM team_table WHERE team_id = ?");
                            $away_team_stmt->execute([$fixture['away_team']]);
                            $away_team = $away_team_stmt->fetch();
                            ?>
                            <tr>
                                <td><?php echo $fixture['match_day']; ?></td>
                                <td>
                                    <img class="team-logo" src="<?php echo $home_team['logo']; ?>" alt="<?php echo $home_team['team_name']; ?> logo">
                                    <span class="team-name"><?php echo $home_team['team_name']; ?></span>
                                </td>
                                <td>
                                    <img class="team-logo" src="<?php echo $away_team['logo']; ?>" alt="<?php echo $away_team['team_name']; ?> logo">
                                    <span class="team-name"><?php echo $away_team['team_name']; ?></span>
                                </td>
                                <td class="fixture-date"><?php echo date('jS F Y', strtotime($fixture['fixture_date'])); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main><!-- /.container -->
    <div class="b-example-divider"></div>
    <?php require('footer.php'); ?>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>