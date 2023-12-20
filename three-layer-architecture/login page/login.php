<?php
$servername = "localhost";
$username = "gnivanov21";
$password = "passpass123";
$dbname = "my_website_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: success.php");
        $conn->close();
        exit();
    } else {
        header("Location: index.php?error=true");
        $conn->close();
        exit();
    }
}
?>
