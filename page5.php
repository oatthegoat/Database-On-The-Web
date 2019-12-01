<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="OHIPstylesheet.css">
  <title>Update The Name Of A Hospital</title>
</head>
<body>
<?php
include 'connectOHIPdb.php';
?>
<h1>Update a Hospital's Name</h1>
<form action="updatehospitalname.php" method="post">
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
<br>
New Name: <input type ="text" maxlength="20" name="newhospitalname" required><br>
<br>
<input type="submit" value="Update Name">
</form>
<?php
  mysqli_close($connection);
?>
</body>
</html>
