<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'config.php';

$result = $conn->query("
    SELECT Player_ID, Fname, Lname, Team_abb, Is_Pitcher, Position
    FROM Players
    ORDER BY Lname ASC
");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Players</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>All Players</h1>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Team</th>
    <th>Pitcher?</th>
    <th>Position</th>
</tr>

<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['Player_ID'] ?></td>
    <td><?= $row['Fname'] . " " . $row['Lname'] ?></td>
    <td><?= $row['Team_abb'] ?></td>
    <td><?= $row['Is_Pitcher'] ? 'Yes' : 'No' ?></td>
    <td><?= $row['Position'] ?></td>
</tr>
<?php endwhile; ?>
</table>

<a href="<?= $_SESSION['role'] ?>_dashboard.php">Back</a>

</body>
</html>
