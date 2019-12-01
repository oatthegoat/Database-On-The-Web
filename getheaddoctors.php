<?php
$query = "SELECT hospitals.name, doctors.firstName, doctors.lastName, hospitals.dateStarted FROM hospitals, doctors WHERE doctors.licenseNumber=hospitals.licenseNumber ORDER BY hospitals.name";
$result = mysqli_query($connection,$query);
if (!$result) {
	die("Database query failed: " . mysqli_error($connection));
}
echo "<ul>";
while ($row = mysqli_fetch_assoc($result)) {
	echo "<li>";
	echo "Head doctor of " . $row["name"] . " since " . $row["dateStarted"] . ": " . $row["firstName"] . " " . $row["lastName"] . "</li>";
}
mysqli_free_result($result);
echo "</ul>";
mysqli_close($connection);
?>
