<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <title>Insert a Doctor</title>
</head>
<body>
<?php
include 'connectOHIPdb.php';
?>
<h1>Add a New Doctor to OHIP's Database</h1>
<form action="addnewdoctor.php" method="post">
Choose Hospital: <br>
<?php
  $query = "SELECT name, hospitalCode FROM hospitals";
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="hospitalcode" value="';
    echo $row["hospitalCode"];
    echo '" required>' . $row["hospitalCode"] . ": " . $row["name"] . "<br>";
  }
  mysqli_free_result($result);
?>
License Number: <input type ="text" maxlength="4" name="licensenumber"><br>
First Name: <input type ="text" maxlength="20" name="firstname"><br>
Last Name: <input type ="text" maxlength="20" name="lastname"><br>
Specialization: <input type ="text" maxlength="30" name="specialization"><br>
Date Licensed: <input type="date" name="datelicensed"><br>
<br>
<input type="submit" value="Add Doctor">
</form>
<?php
  mysqli_close($connection);
?>
</body>
</html>
