<?php
$query = "SELECT firstName, lastName FROM doctors WHERE licenseNumber NOT IN (SELECT licenseNumber FROM treats)";
$result = mysqli_query($connection,$query);
if (!$result) {
	die("Database query failed: " . mysqli_error($connection));
}
if (mysqli_num_rows($result)==0) {
	die("Error: There are no doctors without any patients. Please try again");
}
echo "<ul>";
while($row = mysqli_fetch_assoc($result)) {
	echo "<li>";
	echo $row["firstName"] . " " . $row["lastName"] . "</li>";
}
mysqli_free_result($result);
echo "</ul>";
mysqli_close($connection);
?>
