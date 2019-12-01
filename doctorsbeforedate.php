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
<h1>Doctors Licensed Before Date Selected</h1>
<?php
   $doctordate = $_POST["doctordate"];
   $query = 'SELECT firstName, lastName, specialization, dateLicensed FROM doctors WHERE dateLicensed <"'.$doctordate.'"';
   $result = mysqli_query($connection, $query);
   if (!$result) {
     die("Database query failed: " . mysqli_error($connection));
   }
   if (mysqli_num_rows($result)==0) {
     echo "<p>" . "Error: There are no doctors who were licensed before the date you selected. Please try again." . "</p>";   
   }
   echo "<ul>";
   while ($row = mysqli_fetch_assoc($result)) {
     echo "<li>";
     echo $row["firstName"] . " " . $row[lastName] . ", " . $row[specialization] . " since " . $row[dateLicensed] ."</li>";
   }
   mysqli_free_result($result);
   echo "</ul>";
   mysqli_close($connection);
?>
</body>
</html>
