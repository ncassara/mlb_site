<?php
include 'config.php';

$result = $conn->query("SELECT * FROM Division LIMIT 5");
?>
<!DOCTYPE html>
<html>
<head>
    <title>MLB Site</title>
</head>
<body>
<h1>MLB Database Test Page</h1>

<ul>
<?php while ($row = $result->fetch_assoc()): ?>
    <li>
        <?php echo $row['Division_ID'] . " — " . $row['Division_Name'] . " (" . $row['Season_Year'] . ")"; ?>
    </li>
<?php endwhile; ?>
</ul>

</body>
</html>
