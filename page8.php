<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <title>Manage Doctors</title>
</head>
<body>
<?php
include 'connectOHIPdb.php';
?>
<h1>Manage Which Doctors Treat A Patient</h1>
<form action="treating.php" method="post">
Choose a Patient: <br>
<?php
  $query = 'SELECT firstName, lastName, OHIPnumber FROM patients';
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
  }
  echo "<select name='ohipnumber'>";
  while($row = mysqli_fetch_array($result)) {
  echo "<option value='" . $row['OHIPnumber'] . "'>" . $row['lastName'] . ", " . $row['firstName'] . ": " . $row['OHIPnumber'] . "</option>";
  }
  echo "</select>";
?>
<br>
<br>Choose Action:<br>
<input type="radio" name="action" value="add" checked> Add a Doctor<br>
<input type="radio" name="action" value="remove"> Remove a Doctor<br>
</br>

<input type="submit" value="Next">
</form>
<?php
  mysqli_close($connection);
?>
</body>
</html>
