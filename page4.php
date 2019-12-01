<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <title>Delete a Doctor</title>
</head>
<body>
<?php
include 'connectOHIPdb.php';
?>
<h1>Delete A Doctor From OHIP's Database</h1>
<form action="deletedoctor.php" method="post">
Choose A Doctor To Delete: <br>
<br>
<?php
  $query = "SELECT firstName, lastName, licenseNumber FROM doctors";
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="licensenumber" value="';
    echo $row["licenseNumber"];
    echo '" required>' . $row["firstName"] . " " . $row["lastName"] . "<br>";
  }
  mysqli_free_result($result);
?>
<br>
<input type="submit" value="Continue">
</form>
<?php
  mysqli_close($connection);
?>
</body>
</html>
