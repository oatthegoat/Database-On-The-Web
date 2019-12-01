<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <title>Search Doctors Treating A Patient</title>
</head>
<body>
<?php
include 'connectOHIPdb.php';
?>
<h1>Enter the OHIP number of a specific patient to see which doctors are treating them</h1>
<form action="doctorlookup.php" method="post">
<br>
OHIP Number: <input type ="text" maxlength="9" name="ohipnumber" required><br>
<br>
<input type="submit" value="Search">
</form>
<?php
  mysqli_close($connection);
?>
</body>
</html>
