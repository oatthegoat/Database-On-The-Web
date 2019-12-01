<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <title>Delete A Doctor</title>
</head>
<body>
<?php
  include 'connectOHIPdb.php';
?>
<h1>Delete A Doctor From OHIP's Database</h1>

<?php
  $yesorno = $_POST["yesorno"];
  $licensenumber = $_POST["licensenumber"];
  $query = 'SELECT firstName, lastName FROM doctors WHERE licenseNumber="' . $licensenumber . '"';
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
  }
  $row = mysqli_fetch_assoc($result);
  echo $row['firstName'] . " " . $row['lastName'];
  if ($yesorno == "yes") {
    echo " has been deleted from OHIP's database.";
    $query1 = 'DELETE FROM treats WHERE licenseNumber="' . $licensenumber . '"';
    $result1 = mysqli_query($connection, $query1);
    if (!$result1) {
      die("Deletion failed: " . mysqli_error($connection));
    }
    $query2 = 'DELETE FROM doctors WHERE licenseNumber="' . $licensenumber . '"';
    $result2 = mysqli_query($connection, $query2);
    if (!$result2) {
      die("Deletion failed: " . mysqli_error($connection));
    }
  }
  if ($yesorno == "no") {
    echo " has not been deleted from OHIP's database.";
  }
  mysqli_close($connection);
  ?>
  </body>
  </html>
