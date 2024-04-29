<!DOCTYPE html>
<html>
<head>
    <title>Login or Register</title>
</head>
<body>
<h2>Login</h2>
<form method="post" action="login.php">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>

<h2>Register</h2>
<form method="post" action="register.php">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
</form>
</body>
</html>