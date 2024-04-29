<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hashowanie hasła
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Sprawdzenie, czy użytkownik o podanej nazwie już istnieje
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        // Dodanie nowego użytkownika do bazy danych
        $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', 'user')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful. You can now login.";
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
