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
<h1>Doctors</h1>
<form action ="managedoctors.php" method="post">
<?php
  $action = $_POST["action"];
  $ohipnumber = $_POST['ohipnumber'];
  echo '<input type = "hidden" name = "ohipnumber" value = "'.$ohipnumber.'" />';
  if ($action == "add") {
    echo '<input type = "hidden" name = "action" value = "add" />';
    echo "These are the doctors in the database who are not currently treating the patient you selected.";
    echo "<br>";
    echo "Assign one of these doctors to treat the patient you selected:";
    echo "<br>";
    $query = "SELECT firstName, lastName, licenseNumber FROM doctors WHERE doctors.licenseNumber NOT IN (SELECT treats.licenseNumber FROM treats WHERE OHIPnumber ='". $ohipnumber ."')";
  }
  if ($action == "remove") {
    echo '<input type = "hidden" name = "action" value = "remove" />';
    echo "These are the doctors in the database who are currently treating the patient you selected.";
    echo "<br>";
    echo "Stop one of these doctors from treating the patient you selected:";
    echo "<br>";
    $query = "SELECT firstName, lastName, licenseNumber FROM doctors WHERE doctors.licenseNumber IN (SELECT treats.licenseNumber FROM treats WHERE OHIPnumber ='". $ohipnumber ."')";
  }
  $result = mysqli_query($connection, $query);
  if (!$result) {
          die("Database query failed: " . mysqli_error($connection));
  }
  echo "<br>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="doctor" value="';
    echo $row["licenseNumber"];
    echo '" required>'.$row["firstName"] . " " . $row["lastName"] . "<br>";
  }
  mysqli_free_result($result);
?>
<br>
<input type="submit" value="Confirm">
</form>

<?php
  mysqli_close($connection);
?>
</body>
</html>
