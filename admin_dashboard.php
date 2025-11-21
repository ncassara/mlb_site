<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>
<h1>Welcome Admin!</h1>
<a href="manage_users.php">Manage Users</a><br>
<a href="edit_players.php">Edit Players</a><br>
<a href="edit_games.php">Edit Games</a><br>
<a href="logout.php">Logout</a>
