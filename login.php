<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $db_pass, $role);
    $stmt->fetch();

    if ($stmt->num_rows == 1 && $password === $db_pass) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['role'] = $role;

        // Redirect by role
        if ($role === "fan") header("Location: fan_dashboard.php");
        if ($role === "coach") header("Location: coach_dashboard.php");
        if ($role === "admin") header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>

<h2>Login</h2>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST">
    Username: <br>
    <input type="text" name="username" required><br><br>

    Password: <br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Log In</button>
</form>

</body>
</html>