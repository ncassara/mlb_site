<?php
session_start();
if ($_SESSION['role'] !== 'fan') {
    header("Location: login.php");
    exit;
}
?>
<h1>Welcome Fan!</h1>
<a href="view_players.php">View Players</a><br>
<a href="view_teams.php">View Teams</a><br>
<a href="logout.php">Logout</a>
