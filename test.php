<!--
Host: sql9.freesqldatabase.com
Database name: sql9150477
Database user: sql9150477
Database password: W4YPSq3Fnk
Port number: 3306
-->

<!DOCTYPE html>
<html>
<body>

	<?php
	$dbname = '';
	$username = '';
	$password = '';
	$servername = '';

// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT ID, Name, Publisher FROM Piece";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			echo "ID: " . $row["ID"]. " - Name: " . $row["Name"]. " " . $row["Publisher"]. "<br>";
		}
	} else {
		echo "0 results";
	}
	$conn->close();
	?>

</body>
</html>