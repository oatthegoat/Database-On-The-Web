<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <title>Doctors Treating A Patient</title>
</head>
<body>
<?php
   include 'connectOHIPdb.php';
?>
<h1>Doctors who are treating this patient:</h1>
<?php
   $ohipnumber = $_POST["ohipnumber"];
   $query = 'SELECT firstName, lastName FROM patients WHERE OHIPnumber = "'.$ohipnumber.'"';
   $result = mysqli_query($connection, $query);
   if (!$result) {
        die("Database query failed: " . mysqli_error($connection));
   }
   if (mysqli_num_rows($result)==0) {
	die("Error: A patient with that OHIP number does not exist in the database. Please try again.");
   }
   $row = mysqli_fetch_assoc($result);
   echo $row["firstName"] . " " . $row["lastName"] . " is treated by: ". "<br>";
   $query = 'SELECT DISTINCT doctors.firstName, doctors.lastName FROM doctors, treats WHERE doctors.licenseNumber IN (SELECT treats.licenseNumber FROM treats WHERE treats.OHIPnumber = "'.$ohipnumber.'")';
   $result = mysqli_query($connection, $query);
   if (!$result) {
        die("Database query failed: " . mysqli_error($connection));
   }
   if (mysqli_num_rows($result)==0) {
	die("No doctors have been assigned to treat this patient.");
   }
   echo "<ul>";
   while ($row = mysqli_fetch_assoc($result)) {
     echo "<li>";
     echo $row["firstName"] . " " . $row["lastName"] ."</li>";
   }
   mysqli_free_result($result);
   echo "</ul>";
   mysqli_close($connection);
?>
</body>
</html>
