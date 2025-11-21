<?php
session_start();
if ($_SESSION['role'] !== 'coach') {
    header("Location: login.php");
    exit;
}
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $team = $_POST['team'];
    $is_pitcher = $_POST['is_pitcher'];
    $position = $_POST['position'];

    $stmt = $conn->prepare(
        "INSERT INTO Players (Fname, Lname, Team_abb, Is_Pitcher, Position)
         VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("sssds", $fname, $lname, $team, $is_pitcher, $position);
    $stmt->execute();

    echo "<p>Player added successfully!</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Player</title>
</head>
<body>

<h1>Add New Player</h1>

<form method="POST">
    First Name: <br><input type="text" name="fname" required><br><br>
    Last Name: <br><input type="text" name="lname" required><br><br>
    Team Abbreviation: <br><input type="text" name="team" required><br><br>
    Is Pitcher (1/0): <br><input type="number" name="is_pitcher" min="0" max="1"><br><br>
    Position: <br><input type="text" name="position"><br><br>

    <button type="submit">Submit</button>
</form>

<a href="coach_dashboard.php">Back</a>

</body>
</html>