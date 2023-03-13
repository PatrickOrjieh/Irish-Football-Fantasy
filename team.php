<?php

include('database.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user_team_name'])) {
    $team_id = "DrM";
    $team_name = $_SESSION['user_team_name'];
}

if ($_POST) {
    $goalkeeper_id = $_POST['goalkeeper'];
    $manager_id = $_POST['manager'];
    $defender_ids = $_POST['defender'];
    $midfielder_ids = $_POST['midfielder'];
    $forward_ids = $_POST['forward'];

    $manager_stmt = $db->prepare("SELECT * FROM new_managers WHERE manager_id = :manager_id");
    $manager_stmt->bindParam(':manager_id', $manager_id);
    $manager_stmt->execute();
    $manager = $manager_stmt->fetch();

    // output the team by name
    echo $manager['manager_name'] . ' ';

    $goalkeeper_stmt = $db->prepare("SELECT * FROM new_players WHERE player_id = :goalkeeper_id");
    $goalkeeper_stmt->bindParam(':goalkeeper_id', $goalkeeper_id);
    $goalkeeper_stmt->execute();
    $goalkeeper = $goalkeeper_stmt->fetch();

    // output the team by name
    echo $goalkeeper['player_name'] . ' ';

    //to get the defender ids for all 4 defenders
    foreach ($defender_ids as $defender_id) {
        $defender_stmt = $db->prepare("SELECT * FROM new_players WHERE player_id = :defender_id");
        $defender_stmt->bindParam(':defender_id', $defender_id);
        $defender_stmt->execute();
        $defender = $defender_stmt->fetch();

        // output the team by name
        echo $defender['player_name'] . ' ';
    }

    //to get the midfielder ids for all 4 midfielders
    foreach ($midfielder_ids as $midfielder_id) {
        $midfielder_stmt = $db->prepare("SELECT * FROM new_players WHERE player_id = :midfielder_id");
        $midfielder_stmt->bindParam(':midfielder_id', $midfielder_id);
        $midfielder_stmt->execute();
        $midfielder = $midfielder_stmt->fetch();

        // output the team by name
        echo $midfielder['player_name'] . ' ';
    }

    //to get the forward ids for all 2 forwards
    foreach ($forward_ids as $forward_id) {
        $forward_stmt = $db->prepare("SELECT * FROM new_players WHERE player_id = :forward_id");
        $forward_stmt->bindParam(':forward_id', $forward_id);
        $forward_stmt->execute();
        $forward = $forward_stmt->fetch();

        // output the team by name
        echo $forward['player_name'] . ' ';
    }

    //check if the team name already exists in the database
    $team_stmt = $db->prepare("SELECT * FROM team_table WHERE team_name = :team_name");
    $team_stmt->bindParam(':team_name', $team_name);
    $team_stmt->execute();
    $team = $team_stmt->fetch();

    if ($team) {
        echo 'Team name already exists';
    } else {
        // to insert the team into the database
        $team_stmt = $db->prepare("INSERT INTO team_table (team_id, team_name, manager, stadium_name, capacity, city) VALUES (:team_id, :team_name, :manager, :stadium_name, :capacity, :city)");
        $team_stmt->bindParam(':team_id', $team_id);
        $team_stmt->bindParam(':team_name', $team_name);
        $team_stmt->bindParam(':manager', $manager['manager_name']);
        $team_stmt->bindParam(':stadium_name', $manager['stadium_name']);
        $team_stmt->bindParam(':capacity', $manager['capacity']);
        $team_stmt->bindParam(':city', $manager['city']);
        $team_stmt->execute();
    }

    // to insert the goalkeeper into the database
    $goalkeeper_stmt = $db->prepare("INSERT INTO players (player_id, team_id, player_name, shirt_no, position, dob) VALUES (:player_id, :team_id, :player_name, :shirt_no, :position, :dob)");
    $goalkeeper_stmt->bindParam(':player_id', $goalkeeper['player_id']);
    $goalkeeper_stmt->bindParam(':team_id', $team_id);
    $goalkeeper_stmt->bindParam(':player_name', $goalkeeper['player_name']);
    $goalkeeper_stmt->bindParam(':shirt_no', $goalkeeper['shirt_no']);
    $goalkeeper_stmt->bindParam(':position', $goalkeeper['position']);
    $goalkeeper_stmt->bindParam(':dob', $goalkeeper['dob']);
    $goalkeeper_stmt->execute();

    // to insert all 4 defenders into the database
    foreach ($defender_ids as $defender_id) {
        $defender_stmt = $db->prepare("SELECT * FROM new_players WHERE player_id = :defender_id");
        $defender_stmt->bindParam(':defender_id', $defender_id);
        $defender_stmt->execute();
        $defender = $defender_stmt->fetch();

        $defender_stmt = $db->prepare("INSERT INTO players (player_id, team_id, player_name, shirt_no, position, dob) VALUES (:player_id, :team_id, :player_name, :shirt_no, :position, :dob)");
        $defender_stmt->bindParam(':player_id', $defender['player_id']);
        $defender_stmt->bindParam(':team_id', $team_id);
        $defender_stmt->bindParam(':player_name', $defender['player_name']);
        $defender_stmt->bindParam(':shirt_no', $defender['shirt_no']);
        $defender_stmt->bindParam(':position', $defender['position']);
        $defender_stmt->bindParam(':dob', $defender['dob']);
        $defender_stmt->execute();
    }

    // to insert all 4 midfielders into the database
    foreach ($midfielder_ids as $midfielder_id) {
        $midfielder_stmt = $db->prepare("SELECT * FROM new_players WHERE player_id = :midfielder_id");
        $midfielder_stmt->bindParam(':midfielder_id', $midfielder_id);
        $midfielder_stmt->execute();
        $midfielder = $midfielder_stmt->fetch();

        $midfielder_stmt = $db->prepare("INSERT INTO players (player_id, team_id, player_name, shirt_no, position, dob) VALUES (:player_id, :team_id, :player_name, :shirt_no, :position, :dob)");
        $midfielder_stmt->bindParam(':player_id', $midfielder['player_id']);
        $midfielder_stmt->bindParam(':team_id', $team_id);
        $midfielder_stmt->bindParam(':player_name', $midfielder['player_name']);
        $midfielder_stmt->bindParam(':shirt_no', $midfielder['shirt_no']);
        $midfielder_stmt->bindParam(':position', $midfielder['position']);
        $midfielder_stmt->bindParam(':dob', $midfielder['dob']);
        $midfielder_stmt->execute();
    }

    // to insert all 2 forwards into the database
    foreach ($forward_ids as $forward_id) {
        $forward_stmt = $db->prepare("SELECT * FROM new_players WHERE player_id = :forward_id");
        $forward_stmt->bindParam(':forward_id', $forward_id);
        $forward_stmt->execute();
        $forward = $forward_stmt->fetch();

        $forward_stmt = $db->prepare("INSERT INTO players (player_id, team_id, player_name, shirt_no, position, dob) VALUES (:player_id, :team_id, :player_name, :shirt_no, :position, :dob)");
        $forward_stmt->bindParam(':player_id', $forward['player_id']);
        $forward_stmt->bindParam(':team_id', $team_id);
        $forward_stmt->bindParam(':player_name', $forward['player_name']);
        $forward_stmt->bindParam(':shirt_no', $forward['shirt_no']);
        $forward_stmt->bindParam(':position', $forward['position']);
        $forward_stmt->bindParam(':dob', $forward['dob']);
        $forward_stmt->execute();

    }

    //when successful, redirect to the team page
    if ($team_stmt && $goalkeeper_stmt && $defender_stmt && $midfielder_stmt && $forward_stmt) {
        header("refresh:2;url=game.php");
    } else {
        echo 'Error';
    }



}
