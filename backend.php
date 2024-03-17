<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_GET['action'] == 'register') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        $response = array("success" => true, "message" => "Registration successful");
    } else {
        $response = array("success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error);
    }
    echo json_encode($response);
}
if ($_GET['action'] == 'upload') {
    $description = $_POST['description'];
    $response = array("success" => true, "message" => "Media uploaded successfully");
    echo json_encode($response);
}
if ($_GET['action'] == 'loadMedia') {
    $media = ""; 
    $response = array("media" => $media);
    echo json_encode($response);
}

$conn->close();
?>
