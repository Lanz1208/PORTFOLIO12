<?php
// Database configuration
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
$email = $_POST['Email'];
$pass = $_POST['passwordReg'];

// Hash the password
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

// Prepare and execute the SQL query
$sql = $conn->prepare("INSERT INTO accounts (username, email, password_acc) VALUES (?, ?, ?)");
if ($sql === false) {
    die("Prepare failed: " . $conn->error);
}

$sql->bind_param("sss", $user, $email, $hashed_pass);

if ($sql->execute()) {
    echo "Registration Successful";
} else {
    echo "Registration Failed: " . $sql->error;
}

// Close the connection
$sql->close();
$conn->close();
?>
