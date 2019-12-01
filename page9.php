<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <title>Doctors Without Any Patients</title>
</head>
<body>
<?php
include 'connectOHIPdb.php';
?>
<h1>Doctors Who Have No Patients</h1>
<?php
include 'getdoctorswopatients.php';
?>
</body>
</html>
