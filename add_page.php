<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie uprawnień dostępu
function checkPermission($requiredRole) {
    if ($_SESSION['role'] != $requiredRole) {
        die("Insufficient permissions");
    }
}

// Sprawdzenie czy użytkownik jest zalogowany
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

// Sprawdzenie uprawnień dostępu
checkPermission('admin' || 'writer');

// Dodawanie nowej strony
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO pages (title, content) VALUES ('$title', '$content')";
    $conn->query($sql);
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <a href="dashboard.php">Back to Dashboard</a>
    <title>Add New Page</title>
</head>
<body>
<h2>Add New Page</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" required><br>
    <label for="content">Content:</label><br>
    <textarea id="content" name="content" rows="4" cols="50" required></textarea><br>
    <button type="submit">Add Page</button>
</form>
<br>
</body>
</html>
