<?php
// Replace with your actual database credentials
$servername = "localhost";
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$dbname = "usersdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Redirect to a success page or perform additional actions upon successful login
        header("Location: success.php");
        $conn->close();
        exit();
    } else {
        // Redirect back to the login page with an error parameter
        header("Location: index.html?error=true");
        $conn->close();
        exit();
    }
}
?>
