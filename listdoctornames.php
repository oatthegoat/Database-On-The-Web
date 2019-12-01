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
<h1>Filtered Search Results</h1>
<br>
<p>Select a doctor to see more information about them.</p>
<br>
<form action="doctorinfo.php" method="post">
<?php
   $sortby = $_POST["sortby"];
   $orderby = $_POST['orderby'];
   if ($sortby == "firstname" && $orderby == "ascending") {
     $query = "SELECT firstName, lastName, licenseNumber FROM doctors ORDER BY firstName ASC";
   }
   if ($sortby == "firstname" && $orderby == "descending") {
     $query = "SELECT firstName, lastName, licenseNumber FROM doctors ORDER BY firstName DESC";
   }
   if ($sortby == "lastname" && $orderby == "ascending") {
     $query = "SELECT firstName, lastName, licenseNumber FROM doctors ORDER BY lastName ASC";
   }
   if ($sortby == "lastname" && $orderby == "descending") {
     $query = "SELECT firstName, lastName, licenseNumber FROM doctors ORDER BY lastName DESC";
   }

   $result = mysqli_query($connection,$query);
   if (!$result) {
           die("Database query failed: " . mysqli_error($connection));
   }

   while ($row = mysqli_fetch_assoc($result)) {
     echo '<input type="radio" name="licensenumber" value="';
     echo $row["licenseNumber"];
     echo '" required>' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);

   mysqli_close($connection);
?>
<br>
<input type="submit" value="Get Information">
</form>
</body>
</html>
