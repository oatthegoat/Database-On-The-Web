<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <title>Doctors</title>
</head>
<body>
<?php
  include 'connectOHIPdb.php';
?>
<h1>Manage Doctors</h1>
<?php
  $action = $_POST["action"];
  $doctor = $_POST["doctor"];
  $ohipnumber = $_POST["ohipnumber"];

  $query = 'SELECT doctors.firstName AS dfname, doctors.lastName AS dlname, doctors.licenseNumber, patients.firstName AS pfname, patients.lastName AS plname, patients.OHIPnumber FROM doctors, patients WHERE doctors.licenseNumber="' . $doctor .'" AND patients.OHIPnumber="' . $ohipnumber . '"';
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
  }
  $row = mysqli_fetch_assoc($result);
  echo "Table updated. ";

  if ($action == "add") {
    $query1 = 'INSERT INTO treats VALUES ("' . $ohipnumber . '","' . $doctor .'")';
    if (!mysqli_query($connection, $query1)) {
         die("Error: update failed - " . mysqli_error($connection));
     }
     echo $row['dfname'] . " " . $row[dlname] . " is now treating " . $row[pfname] . " " . $row[plname] . "." . "<br>";
  }
  if ($action == "remove") {
    $query1 = 'DELETE FROM treats WHERE licenseNumber="' . $doctor .'" AND OHIPnumber="' . $ohipnumber . '"';
    if (!mysqli_query($connection, $query1)) {
         die("Error: update failed - " . mysqli_error($connection));
     }
     echo $row['dfname'] . " " . $row['dlname'] . " is no longer treating " . $row['pfname'] . " " . $row['plname'] . "." . "<br>";
  }

  mysqli_close($connection);
?>
</body>
</html>
