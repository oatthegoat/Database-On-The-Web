<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <title>Doctor Information</title>
</head>
<body>
<?php
   include 'connectOHIPdb.php';
?>
<h1>Information About Selected Doctor</h1>
<?php
  $licensenumber = $_POST["licensenumber"];
  $query = 'SELECT doctors.licenseNumber, firstName, lastName, specialization, dateLicensed, doctors.hospitalCode, name FROM doctors, hospitals WHERE doctors.licenseNumber="'.$licensenumber.'"';
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
  }
  $row=mysqli_fetch_assoc($result);
  echo "<ul>";
  echo "<li>" . "License Number: " .$row["licenseNumber"] . "</li>";
  echo "<li>" . "First Name: " .$row["firstName"] . "</li>";
  echo "<li>" . "Last Name: " .$row["lastName"] . "</li>";
  echo "<li>" . "Specialization: " .$row["specialization"] . "</li>";
  echo "<li>" . "Date Licensed: " .$row["dateLicensed"] . "</li>";
  echo "<li>" . "Works At: " .$row["name"] . " Hospital" . "</li>";
  echo "</ul>";
  mysqli_close($connection);
?>
</body>
</html>
