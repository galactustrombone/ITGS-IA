<!DOCTYPE HTML>
<HTML>
	<head>
		<?php include('navbar.php'); ?>
		<link rel="stylesheet" type="text/css" href="css/defaultstylesheet.css">
		<title>Edit a Piece!</title>
	</head>
	<body>
		<div id="content">
			<h1>Edit a Piece!</h1>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<table>
					<tr>
						<td>Name: </td>
						<td><input id="namefield" name="Name" type="text"></td>
					</tr>
					<tr>
						<td>Category: </td>
						<td><input id="categoryfield" name="Category" type="text" list="categories"></td>
					</tr>
					<tr>
						<td>Publisher: </td>
						<td><input id="publisherfield" name="Publisher" type="text" list="publishers"></td>
					</tr>
					<tr>
						<td>Last Performed: </td>
						<td><input id="lastperformedfield" name="LastPerformed" type="number" min="2000" max=<?php echo date("Y"); ?>></td>
					</tr>
					<input id="idfield" name="ID" type="text" hidden>
				</table>

				<input name="submit" type="submit" value="Change!">
			</form>

			<?php
			// connection stuff
			$dbname = '';
			$username = '';
			$password = '';
			$servername = '';

			$conn = new mysqli($servername, $username, $password, $dbname);

			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// get id
			$id = test_input($conn, $_POST["ID"]);
			echo "<p id=\"id\" hidden>" . $id . "</p>";
			
			// form handling
			$name = "";
			$category = "";
			$publisher = "";
			$lastPerformed = "";

			if(isset($_POST["submit"])) {
				$name = utf8_decode(test_input($conn, $_POST["Name"]));
				$category = utf8_decode(test_input($conn, $_POST["Category"]));
				$publisher = utf8_decode(test_input($conn, $_POST["Publisher"]));
				$lastPerformed = utf8_decode(test_input($conn, $_POST["LastPerformed"]));

				// if the publisher does not already exist, add it
				if($conn->query("SELECT COUNT(*) FROM Publisher WHERE Name = '" . $publisher . "'")->fetch_row()[0] == 0){
					$newpublisherid = $conn->query("SELECT MAX(ID) FROM Publisher")->fetch_row() [0] + 1;
					$addpublishersql = "INSERT INTO Publisher VALUES(" . $newpublisherid . ", '" . $publisher . "')";

					if ($conn->query($addpublishersql) == FALSE) {
						echo "Error adding new Publisher: " . $addpublishersql . "<br>" . $conn->error . "<br>";
					}
				}

				$updatesql = "UPDATE Piece SET Name = '" . $name . "', Category = '" . $category . "', PublisherID = (SELECT ID FROM Publisher WHERE Name = '" . $publisher . "'), LastPerformed = " . $lastPerformed . " WHERE ID = " . $id;

				if($conn->query($updatesql) === TRUE) {
					echo "Piece updated successfully! Good job!";
				} else {
					echo "Oh great, an error: " . $updatesql . "<br>" . $conn->error;
				}
			}
			
			// fill in form with existing information
			$oldname = $conn->query("SELECT Name FROM Piece WHERE ID=" . $id)->fetch_row()[0];
			$oldcategory = $conn->query("SELECT Category FROM Piece WHERE ID=" . $id)->fetch_row()[0];
			$oldpublisher = $conn->query("SELECT Name FROM Publisher WHERE ID = (SELECT PublisherID FROM Piece WHERE ID = " . $id . ")")->fetch_row()[0];
			$oldlastperformed = $conn->query("SELECT Name FROM Publisher WHERE ID = (SELECT PublisherID FROM Piece WHERE ID = " . $id . ")")->fetch_row()[0];
			$oldlastperformed = $conn->query("SELECT LastPerformed FROM Piece WHERE ID=" . $id)->fetch_row()[0];

			echo "<p id=\"oldname\" hidden>" . utf8_encode($oldname) . "</p>";
			echo "<p id=\"oldcategory\" hidden>" . utf8_encode($oldcategory) . "</p>";
			echo "<p id=\"oldpublisher\" hidden>" . utf8_encode($oldpublisher) . "</p>";
			echo "<p id=\"oldlastperformed\" hidden>" . utf8_encode($oldlastperformed) . "</p>";

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
			
			
			function test_input($conn, $data) {
				if (!isset($data)) {
					$data = "";
				}
				$data = htmlspecialchars($data);
				if(strpos(strtolower($data), "drop table") !== false) {
					$data = "Nice try :)";
				}
				return mysqli_real_escape_string($conn, $data);
			}
			?>

			<script>
				// fill in form
				var id = document.getElementById("id").innerHTML;
				var idfield = document.getElementById("idfield");
				idfield.value = id;

				var name = document.getElementById("oldname").innerHTML;
				var namefield = document.getElementById("namefield");
				namefield.value = name;

				var category = document.getElementById("oldcategory").innerHTML;
				var categoryfield = document.getElementById("categoryfield");
				categoryfield.value = category;

				var publisher = document.getElementById("oldpublisher").innerHTML;
				var publisherfield = document.getElementById("publisherfield");
				publisherfield.value = publisher;

				var lastperformed = document.getElementById("oldlastperformed").innerHTML;
				var lastperformedfield = document.getElementById("lastperformedfield");
				lastperformedfield.value = lastperformed;
			</script>
		</div>
	</body>
</HTML>