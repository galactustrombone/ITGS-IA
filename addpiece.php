<!DOCTYPE HTML>
<HTML>
	<head>
		<?php include('navbar.php'); ?>
		<link rel="stylesheet" type="text/css" href="css/defaultstylesheet.css">
		<title>Add a Piece!</title>
	</head>
	<body>
		<div id="content">
			<h1>Add a Piece</h1>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<table>
					<tr>
						<td>Name: </td>
						<td><input name="Name" type="text" required></td>
					</tr>
					<tr>
						<td>Category: </td>
						<td><input name="Category" type="text" list="categories"></td>
					</tr>
					<tr>
						<td>Publisher: </td>
						<td><input name="Publisher" type="text" list="publishers"></td>
					</tr>
					<tr>
						<td>Last Performed: </td>
						<td><input name="LastPerformed" type="number" min="2000" max=<?php echo date("Y"); ?> value=<?php echo date("Y"); ?>></td>
					</tr>
				</table>
				<input type="submit" value="Add!">
			</form>

			<?php

			$dbname = '';
			$username = '';
			$password = '';
			$servername = '';

			$conn = new mysqli($servername, $username, $password, $dbname);

    		// check connection
			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// get existing categories
			$categoryresult = $conn->query("SELECT Category FROM Piece GROUP BY Category");
			echo "<datalist id=\"categories\">";
			while($row = $categoryresult->fetch_assoc()) {
				echo "<option value=\"" . $row["Category"] . "\">" . $row["Category"] . "</option>";
			}
			echo "</datalist>";

			// get existing publishers
			$publisherresult = $conn->query("SELECT Name FROM Publisher");
			echo "<datalist id=\"publishers\">";
			while($row = $publisherresult->fetch_assoc()) {
				echo "<option value=\"" . $row["Name"] . "\">" . $row["Name"] . "</option>";
			}
			echo "</datalist>";

			// form handling
			$id = $conn->query("SELECT MAX(ID) FROM Piece")->fetch_row()[0] + 1;
			$name = "";
			$category = "";
			$publisher = "";

			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$name = test_input($_POST["Name"]);
				$category = test_input($_POST["Category"]);
				$publisher = test_input($_POST["Publisher"]);
				$lastPerformed = test_input($_POST["LastPerformed"]);

				// if the publisher does not already exist, add it
				if($conn->query("SELECT COUNT(*) FROM Publisher WHERE Name = '" . $publisher . "'")->fetch_row()[0] == 0){
					$newpublisherid = $conn->query("SELECT MAX(ID) FROM Publisher")->fetch_row() [0] + 1;

					$addpublishersql = "INSERT INTO Publisher VALUES(" . $newpublisherid . ", '" . $publisher . "')";

					if ($conn->query($addpublishersql) == FALSE) {
						echo "Error adding new Publisher: " . $addpublishersql . "<br>" . $conn->error . "<br>";
					}
				}

				// insert the piece
				$insertsql = "INSERT INTO Piece VALUES(" . $id . ", '" . $name . "', '" . $category . "',(SELECT ID FROM Publisher WHERE Name = '" . $publisher . "'), " . $lastPerformed . ");";

				if($conn->query($insertsql) === TRUE) {
					echo "Piece added successfully! Good job!";
				} else {
					echo "Oh great, an error: " . $insertsql . "<br>" . $conn->error;
				}
			}

			// check for hooligans
			function test_input($data) {
				if (!isset($data)) {
					$data = "";
				}
				$data = htmlspecialchars($data);
				if(strpos(strtolower($data), "drop table") !== false) {
					$data = "Nice try :)";
				}
				return $data;
			}
			?>
		</div>
	</body>
</HTML>