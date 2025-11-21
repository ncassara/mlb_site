<?php
session_start();
if ($_SESSION['role'] !== 'coach') {
    header("Location: login.php");
    exit;
}
?>
<h1>Welcome Coach!</h1>
<a href="add_player.php">Add Player</a><br>
<a href="add_game.php">Add Game</a><br>
<a href="view_team.php">View Your Team</a><br>
<a href="logout.php">Logout</a>
