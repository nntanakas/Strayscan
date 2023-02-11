<?php

if (empty($_POST["name"])) {
    die('<script type="text/javascript">alert("Name is required");location.replace("signup.html")</script>');
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die('<script type="text/javascript">alert("Valid email is required");location.replace("signup.html")</script>');

}

if (strlen($_POST["password"]) < 8) {
     die('<script type="text/javascript">alert("Password must be at least 8 characters");location.replace("signup.html")</script>');
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die('<script type="text/javascript">alert("Password must contain at least one letter");location.replace("signup.html")</script>');
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die('<script type="text/javascript">alert("Password must contain at least one number");location.replace("signup.html")</script>');
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die('<script type="text/javascript">alert("Passwords must match");location.replace("signup.html")</script>');

}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash);
                  
if ($stmt->execute()) {

    header("Location: signup-success.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}








