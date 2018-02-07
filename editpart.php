<!DOCTYPE HTML>
<HTML>
	<head>
		<meta charset="utf-8">
		<?php include('navbar.php'); ?>
		<link rel="stylesheet" type="text/css" href="css/defaultstylesheet.css">
		<title>Edit a Part!</title>
	</head>
	<body>
		<div id="content">
			<h1>Edit a Part!</h1>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<table>
					<tr>
						<td>Instrument: </td>
						<td><input id="instrumentfield" type="text" name="instrument" list="instrumentlist" autofocus required></td>
					</tr>
					<tr>
						<td>Quantity: </td>
						<td><input id="quantityfield" type="number" name="quantity" required></td>
					</tr>
					<tr>
						<td>Status: </td>
						<td><input id="okfield" type="radio" name="status" value="0" checked>OK <input id="missingfield" type="radio" name="status" value="1">Missing <input id="lostfield" type="radio" name="status" value="2">Lost</td>
					</tr>
					<tr>
						<td>Last Borrowed By: </td>
						<td><input id="lastborrowedbyfield" type="text" name="lastborrowedby"></td>
					</tr>
					<tr>
						<td>Date Borrowed: </td>
						<td><input id="dateborrowedfield" type="date" name="dateborrowed" placeholder="YYYY-MM-DD" pattern="\d{4}-[0-1]\d-[0-3]\d" title="Please enter a valid date in YYYY-MM-DD format"></td>
					</tr>
					<input id="idfield" name="ID" type="text" hidden>
					<input id="pieceidfield" name="pieceid" type="text" hidden>
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
			$conn->set_charset("utf8");

			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// get id and pieceid
			$id = test_input($_POST["ID"]);
			echo "<p id=\"id\" hidden>" . $id . "</p>";

			$pieceid = $conn->query("SELECT PieceID FROM Part WHERE ID = " . $id)->fetch_row()[0];
			echo "<p id=\"pieceid\" hidden>" . $id . "</p>";

			// form handling
			$name = "";
			$category = "";
			$publisher = "";

			if(isset($_POST["submit"])) {
				// $id = test_input($_POST["ID"]);
				$instrument = test_input($_POST["instrument"]);
				$quantity = test_input($_POST["quantity"]);
				$status = test_input($_POST["status"]);
				$lastBorrowedBy = test_input($_POST["lastborrowedby"]);
				$dateborrowed = test_input($_POST["dateborrowed"]);

				$updatesql = "UPDATE Part SET Instrument = '" . $instrument . "', Quantity = " . $quantity . ", Status = " . $status . ", LastBorrowedBy = '" . $lastBorrowedBy . "', DateBorrowed = '" . $dateborrowed . "' WHERE ID = " . $id;

				if($conn->query($updatesql) === TRUE) {
					echo "Part updated successfully! Good job!";
				} else {
					echo "Oh great, an error: " . $updatesql . "<br>" . $conn->error;
				}
			}

			// fill in form with existing information
			$oldInstrument = $conn->query("SELECT Instrument FROM Part WHERE ID = " . $id)->fetch_row()[0];
			$oldQuantity = $conn->query("SELECT Quantity FROM Part WHERE ID = " . $id)->fetch_row()[0];
			$oldStatus = $conn->query("SELECT Status FROM Part WHERE ID = " . $id)->fetch_row()[0];
			$oldLastBorrowedBy = $conn->query("SELECT LastBorrowedBy FROM Part WHERE ID = " . $id)->fetch_row()[0];
			$oldDateBorrowed = $conn->query("SELECT DateBorrowed FROM Part WHERE ID = " . $id)->fetch_row()[0];

			echo "<p id=\"oldinstrument\" hidden>" . $oldInstrument . "</p>";
			echo "<p id=\"oldquantity\" hidden>" . $oldQuantity . "</p>";
			echo "<p id=\"oldstatus\" hidden>" . $oldStatus . "</p>";
			echo "<p id=\"oldlastborrowedby\" hidden>" . $oldLastBorrowedBy . "</p>";
			echo "<p id=\"olddateborrowed\" hidden>" . $oldDateBorrowed . "</p>";

			// get existing instruments
			$instrumentresult = $conn->query("SELECT Instrument FROM Part GROUP BY Instrument");
			echo "<datalist id=\"instrumentlist\">";
			while($row = $instrumentresult->fetch_assoc()) {
				echo "<option value=\"" . $row["Instrument"] . "\">" . $row["Instrument"] . "</option>";
			}
			echo "</datalist>";

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

			<script>
			// fill in form
			var id = document.getElementById("id").innerHTML;
			var idfield = document.getElementById("idfield");
			idfield.value = id;

			var pieceid = document.getElementById("pieceid").innerHTML;
			var pieceidfield = document.getElementById("pieceidfield");
			pieceidfield.value = pieceid;

			var instrument = document.getElementById("oldinstrument").innerHTML;
			var instrumentfield = document.getElementById("instrumentfield");
			instrumentfield.value = instrument;

			var quantity = document.getElementById("oldquantity").innerHTML;
			var quantityfield = document.getElementById("quantityfield");
			quantityfield.value = quantity;

			var status = document.getElementById("oldstatus").innerHTML;
			if (status == "1") {
				document.getElementById("missingfield").checked = true;
			} else if (status == "2") {
				document.getElementById("lostfield").checked = true;
			}

			var lastborrowedby = document.getElementById("oldlastborrowedby").innerHTML;
			var lastborrowedbyfield = document.getElementById("lastborrowedbyfield");
			lastborrowedbyfield.value = lastborrowedby;

			var dateborrowed = document.getElementById("olddateborrowed").innerHTML;
			var dateborrowedfield = document.getElementById("dateborrowedfield");
			dateborrowedfield.value = dateborrowed;
		</script>
	</div>
</body>
</HTML>