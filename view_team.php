<?php
session_start();
if ($_SESSION['role'] !== 'coach') {
    header("Location: login.php");
    exit;
}

include 'config.php';

// TEMP – set the coach team manually (later we can link coaches to teams)
$coach_team = "NYM";

$stmt = $conn->prepare("SELECT Player_ID, Fname, Lname, Is_Pitcher, Position FROM Players WHERE Team_abb = ?");
$stmt->bind_param("s", $coach_team);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Team</title>
</head>
<body>

<h1>Your Team: <?= $coach_team ?></h1>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Pitcher?</th>
    <th>Position</th>
</tr>

<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['Player_ID'] ?></td>
    <td><?= $row['Fname'] . " " . $row['Lname'] ?></td>
    <td><?= $row['Is_Pitcher'] ? "Yes" : "No" ?></td>
    <td><?= $row['Position'] ?></td>
</tr>
<?php endwhile; ?>

</table>

<a href="coach_dashboard.php">Back</a>

</body>
</html>
