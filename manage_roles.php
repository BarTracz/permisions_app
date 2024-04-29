<!DOCTYPE html>
<html>
<head>
    <p><a href="dashboard.php">Back to dashboard</a></p>
    <title>Manage Roles</title>
</head>
<body>
<h2>Manage Roles</h2>
<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdź, czy użytkownik jest zalogowany jako administrator
if ($_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Pobierz listę użytkowników i ich role z bazy danych
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Wyświetl listę użytkowników i możliwość zmiany ich ról
if ($result->num_rows > 0) {
    echo "<table><tr><th>Username</th><th>Role</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>";
        echo "<form method='post' action='update_role.php'>";
        echo "<input type='hidden' name='user_id' value='" . $row["id"] . "'>";
        echo "<select name='role'>";
        echo "<option value='admin'" . ($row["role"] == "admin" ? " selected" : "") . ">Admin</option>";
        echo "<option value='user'" . ($row["role"] == "user" ? " selected" : "") . ">User</option>";
        echo "<option value='writer'" . ($row["role"] == "writer" ? " selected" : "") . ">Writer</option>";
        echo "</select>";
        echo "<button type='submit'>Save</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No users found.";
}
?>
</body>
</html>