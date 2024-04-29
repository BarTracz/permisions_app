<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<h2>Dashboard</h2>
<p>Welcome, <?php echo $username; ?>!</p>
<?php if ($role == 'admin'): ?>
    <p><a href="add_page.php">Add New Page</a></p>
    <p><a href="manage_roles.php">Manage Roles</a></p>
<?php endif; ?>
<?php if ($role == 'writer'): ?>
    <p><a href="add_page.php">Add New Page</a></p>
<?php endif; ?>
<p><a href="logout.php">Logout</a></p>
</body>
</html>