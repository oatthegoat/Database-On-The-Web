<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <title>Doctors Licensed Before A Given Date</title>
</head>
<body>
<?php
include 'connectOHIPdb.php';
?>
<h1>Look for Doctors Licensed Before a Given Date</h1>
<form action="doctorsbeforedate.php" method="post">
Choose Date: 
<input type ="date" name="doctordate" required><br>
<br>
<input type="submit" value="Search">
</form>
<?php
  mysqli_close($connection);
?>
</body>
</html>

