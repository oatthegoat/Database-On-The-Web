<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <title>Delete A Doctor</title>
</head>
<body>
<?php
  include 'connectOHIPdb.php';
?>
<h1>Delete A Doctor From OHIP's Database</h1>

<form action="delete.php" method="post">
<?php
  $licensenumber = $_POST["licensenumber"];
  echo '<input type = "hidden" name = "licensenumber" value = "' . $licensenumber .'" />';
  $query = 'SELECT firstName, lastName, name FROM doctors, hospitals WHERE "' . $licensenumber . '"=hospitals.licenseNumber';
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
  }
  $query3 = 'SELECT firstName, lastName, name FROM doctors, hospitals WHERE doctors.licenseNumber="' . $licensenumber . '"';
  $result3 = mysqli_query($connection,$query3);
  if (!$result3) {
    die("Databases query failed: " . mysqli_error($connection));
  }
  $row = mysqli_fetch_assoc($result3);

  if (mysqli_num_rows($result) != 0) {
    echo $row['firstName'] . " " . $row['lastName'] . " is the Head Doctor at " . $row['name'] . " and cannot be deleted from the database.";
    echo "<br>";
    die("Try again.");
  }

  $query1 = 'SELECT firstName, lastName FROM patients WHERE OHIPnumber IN (SELECT OHIPnumber FROM treats WHERE licenseNumber ="' . $licensenumber . '")';
  $result1 = mysqli_query($connection,$query1);
  if (!$result1) {
    die("Databases query failed: " . mysqli_error($connection));
  }

  if (mysqli_num_rows($result1)==0) {
    echo $row['firstName'] . " " . $row['lastName'] . " has been deleted from OHIP's database.";
    $query2 = 'DELETE FROM doctors WHERE licenseNumber="' . $licensenumber .'"';
    $result2 = mysqli_query($connection,$query2);
    if (!$result2) {
      die("Databases query failed" . mysqli_error($connection));
    }
    die("");
  }

  echo $row['firstName'] . " " . $row['lastName'] . " is currently treating these patients:";
  echo "<br>";
  echo "<ul>";
  while ($row1 = mysqli_fetch_assoc($result1)) {
    echo "<li>";
    echo $row1["firstName"] . " " . $row1['lastName'] ."</li>";
  }
  mysqli_free_result($result1);
  echo "</ul>";

  echo "Are you sure you want to delete them?";
  echo "<br>";
  mysqli_close($connection);
?>
<input type="radio" name="yesorno" value="yes" checked> Yes<br>
<input type="radio" name="yesorno" value="no"> No<br>
<br>
<input type="submit" value="Submit">
</form>
</body>
</html>
