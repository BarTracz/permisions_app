<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdź, czy użytkownik jest zalogowany jako administrator
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Sprawdź, czy żądanie zostało przesłane za pomocą metody POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $new_role = $_POST['role'];

    // Zaktualizuj rolę użytkownika w bazie danych
    $sql = "UPDATE users SET role='$new_role' WHERE id=$user_id";
    if ($conn->query($sql) === TRUE) {
        echo "Role updated successfully.";
        header("Location: dashboard.php");
    } else {
        echo "Error updating role: " . $conn->error;
        header("Location: dashboard.php");
    }
} else {
    echo "Invalid request.";
}
?>