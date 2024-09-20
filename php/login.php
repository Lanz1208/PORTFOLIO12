<?php

$servername = "localhost";
$port = 3307; // Specify the port number
$database = "web_finance";
$username = "root";
$password = "Balbas120801";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$user = $_POST['Username']; // Correct array access
$pass = $_POST['passwordLog'];

$sql = $conn->prepare("SELECT password_acc FROM accounts WHERE username = ?");
if  ($sql === false){
    die("Prepare Failed: " . $conn->error);
}

$sql->bind_param("s", $user);
$sql->execute();
$sql->store_result();

if ($sql->num_rows === 0) {
    echo "Account is not registered";
    $sql->close();
    $conn->close();
    exit();
}

$sql->bind_result($hashed_pass);
$sql->fetch();
$sql->close();

if (password_verify($pass, $hashed_pass)) {
    // Redirect to main.html if login is successful
    header("Location: ../main.html");
    exit(); // Always exit after redirecting
} else {
    echo "Invalid Password";
}

$conn->close();

?>
