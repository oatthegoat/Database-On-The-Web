<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <meta charset="utf-8">
  <title>New Doctor</title>
</head>
<body>
<?php
   include 'connectOHIPdb.php';
?>
<h1>Doctors</h1>
<?php
   $licensenumber = $_POST["licensenumber"];
   $firstname = $_POST["firstname"];
   $lastname = $_POST["lastname"];
   $specialization = $_POST["specialization"];
   $datelicensed = $_POST["datelicensed"];
   $hospitalcode = $_POST["hospitalcode"];
   
   $query = 'SELECT * FROM doctors WHERE licenseNumber = "'.$licensenumber.'"';
   $result = mysqli_query($connection, $query);
   if (mysqli_num_rows($result)!=0) {
	die("Error: A doctor with that license number already exists in the database. Please try again.");
   }
   $query = 'INSERT INTO doctors values("' . $licensenumber . '","' . $firstname . '","' . $lastname . '","' . $specialization . '","' . $datelicensed . '","' . $hospitalcode . '")';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed - " . mysqli_error($connection));
    }
   echo "Your doctor was added.";
   mysqli_close($connection);
?>
</body>
</html>
