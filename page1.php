<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <title>Doctor Search</title>
</head>

<body>
<?php
include 'connectOHIPdb.php';
?>
<h1>Filter Your Search Results</h1>
<form action="listdoctornames.php" method="post">
        Sort by:<br>
        <input type="radio" name="sortby" value="firstname" checked> First Name<br>
        <input type="radio" name="sortby" value="lastname"> Last Name<br>
        </br>
        Order by:<br>
        <input type="radio" name="orderby" value="ascending" checked> Ascending<br>
        <input type="radio" name="orderby" value="descending"> Descending<br>
        </br>
<input type="submit" value="Get Search Results">
</form>
<?php
mysqli_close($connection);
?>
</body>
</html>
