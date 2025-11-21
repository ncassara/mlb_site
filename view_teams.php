<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include 'config.php';

$result = $conn->query("SELECT * FROM Teams ORDER BY Abbreviation");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Teams</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Teams</h1>

<table border="1" cellpadding="10">
<tr>
    <th>Abbrev</th>
    <th>Name</th>
    <th>Location</th>
    <th>Division</th>
    <th>Season</th>
</tr>

<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['Abbreviation'] ?></td>
    <td><?= $row['Team_Name'] ?></td>
    <td><?= $row['Location'] ?></td>
    <td><?= $row['Division_ID'] ?></td>
    <td><?= $row['Season_Year'] ?></td>
</tr>
<?php endwhile; ?>
</table>

<a href="<?= $_SESSION['role'] ?>_dashboard.php">Back</a>

</body>
</html>
