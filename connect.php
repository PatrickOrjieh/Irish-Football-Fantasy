<?php
include('database.php');

// // Handle form submission
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     // Insert user into database
//     $stmt = $db->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
//     $stmt->execute([$email, $password]);
//     echo "registration successful........";
//     header("refresh:2;url=index.php");

// }

if(empty($_POST["team_name"])){
    die("Team name is required");
}

if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
}

if(strlen($_POST["password"]) < 8){
    die("Password must be at least 8 characters");
}

if(!(preg_match("/[a-z]/i", $_POST["password"]) && preg_match("/[0-9]/", $_POST["password"]))){
    die("Password must contain at least one letter and one number");
}

if($_POST["password"] != $_POST["password_confirmation"]){
    die("Password and password confirmation must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$stmt = $db->prepare("INSERT INTO users (team_name, email, password_hash) VALUES (?, ?, ?)");
$stmt->execute([$_POST["team_name"], $_POST["email"], $password_hash]);

if($stmt){
    echo "registration successful........";
    header("refresh:2;url=index.php");
}
else{
    if($stmt->errorCode() == 1062){
        die("Email already exists");
    }
    else{
        die("Error: " . $stmt->errorCode());
    }
}

// echo "registration successful........";
// header("refresh:2;url=index.php");
?>
