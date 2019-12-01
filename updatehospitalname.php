<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <title>New Hospital Name</title>
</head>
<body>
<?php
   include 'connectOHIPdb.php';
?>
<h1>Updated Hospital Name</h1>
<?php
   $hospitalcode = $_POST["hospitalcode"];
   $newhospitalname = $_POST["newhospitalname"];

   $query = 'UPDATE hospitals SET name="'.$newhospitalname.'" WHERE hospitalCode="'.$hospitalcode.'"';
   if (!mysqli_query($connection, $query)) {
        die("Error: update failed - " . mysqli_error($connection));
    }
   echo "Hospital name was updated.";
   mysqli_close($connection);
?>
</body>
</html>
