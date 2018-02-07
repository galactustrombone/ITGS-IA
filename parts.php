<!DOCTYPE HTML>
<HTML>
	<head>
		<?php include('navbar.php'); ?>
		<link rel="stylesheet" type="text/css" href="css/defaultstylesheet.css">
		<script src="scripts/sorttable.js"></script>
		<title id="title">Manage Parts for [insert piece name]!</title>
	</head>
	<body>
		<div id="content">
			<h1 id="h1">Manage Parts for [insert piece name]!</h1>

			<form id="editform" method="post" action="editpart.php"></form>
			<form id="deleteform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"></form>

			<form id="addform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"></form>

			<table class="sortable" id=\"parttable\" class=\"sortable\">
				<tr>
					<th>Instrument</th>
					<th>Quantity</th>
					<th>Status</th>
					<th>Last Borrowed By</th>
					<th>Date Borrowed</th>
					<th></th>
					<th></th>
				</tr>

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

				// get piece id
				$pieceid = test_input($_POST["pieceid"]);
				echo "<input name = \"pieceid\" type=\"hidden\" value=" . $pieceid . " form=\"addform\">";
				echo "<input name = \"pieceid\" type=\"hidden\" value=" . $pieceid . " form=\"deleteform\">";
				$piecename = $conn->query("SELECT Name FROM Piece WHERE ID = " . $pieceid)->fetch_row()[0];
				echo "<p id=\"piecename\" hidden>" . $piecename . "</p>";

				// add form handling
				$id = $conn->query("SELECT MAX(ID) FROM Part")->fetch_row()[0] + 1;
				$instrument = "";
				$quantity = 0;
				$status = 0;
				$lastBorrowedBy = "";

				if (isset($_POST["submit"])) {
					$instrument = test_input($_POST["instrument"]);
					$quantity = test_input($_POST["quantity"]);
					$status = test_input($_POST["status"]);
					$lastborrowedby = test_input($_POST["lastborrowedby"]);
					$dateborrowed = test_input($_POST["dateborrowed"]);

					$addpart = "INSERT INTO Part VALUES(" . $id . ", " . $pieceid . ", '" . $instrument . "', " . $quantity . ", " . $status . ", '" . $lastborrowedby . "', '" . $dateborrowed . "')";

					if ($conn->query($addpart) == FALSE) {
						echo "Error adding new Part: " . $addpart . "<br>" . $conn->error . "<br>";
					}
				}

				// delete form handling
				if (isset($_POST["delete"])) {
					$partid = test_input($_POST["delete"]);

					$deletepart = "DELETE FROM Part WHERE ID = " . $partid;

					if ($conn->query($deletepart) == FALSE) {
						echo "Error deleting Part: " . $deletepart . "<br>" . $conn->error . "<br>";
					}
				}

				$partquery = "SELECT * FROM Part WHERE PieceID = " . $pieceid;

				$result = $conn->query($partquery);

				while($row = $result->fetch_assoc()) {
					$status = "OK";
					if ($row["Status"] == "1") {
						$status = "Missing";
					} elseif ($row["Status"] == "2") {
						$status = "Lost";
					}

					echo "<tr>
					<td>" . htmlspecialchars($row["Instrument"], ENT_NOQUOTES, "utf-8") . "</td>
					<td>" . htmlspecialchars($row["Quantity"], ENT_NOQUOTES, "utf-8") . "</td>
					<td>" . htmlspecialchars($status, ENT_NOQUOTES, "utf-8") . "</td>
					<td>" . htmlspecialchars($row["LastBorrowedBy"], ENT_NOQUOTES, "utf-8") . "</td>
					<td>" . htmlspecialchars($row["DateBorrowed"], ENT_NOQUOTES, "utf-8") . "</td>
					<td> <button form=\"editform\" type=\"submit\" name=\"ID\" value=" . $row["ID"] . ">Edit</button></td>
					<td> <button form=\"deleteform\" type=\"submit\" name=\"delete\" value=" . $row["ID"] . " onclick=\"return confirmDelete()\">Delete</button></td></tr>";
				}

				// get existing instruments
				$instrumentresult = $conn->query("SELECT Instrument FROM Part GROUP BY Instrument");
				echo "<datalist id=\"instrumentlist\">";
				while($row = $instrumentresult->fetch_assoc()) {
					echo "<option value=\"" . $row["Instrument"] . "\">" . $row["Instrument"] . "</option>";
				}
				echo "</datalist>";

				// check for hooligans
				function test_input($data) {
					if (!isset($data)) {
						$data = "";
					}
					// $data = htmlspecialchars($data);
					if(strpos(strtolower($data), "drop table") !== false) {
						$data = "Nice try :)";
					}
					return $data;
				}
				?>

				<tfoot>
					<tr>
						<td><input type="text" name="instrument" list="instrumentlist" form="addform" style="width: 90%;" autofocus required></td>
						<td><input type="number" name="quantity" form="addform" required min=0></td>
						<td><input type="radio" name="status" value="0" form="addform" checked>OK <input type="radio" name="status" value="1" form="addform">Missing <input type="radio" name="status" value="2" form="addform">Lost</td>
						<td><input type="text" name="lastborrowedby" form="addform"></td>
						<td><input type="date" name="dateborrowed" placeholder="YYYY-MM-DD" pattern="\d{4}-[0-1]\d-[0-3]\d" title="Please enter a valid date in YYYY-MM-DD format" form="addform"></td>
						<td></td>
						<td></td>
					</tr>
				</tfoot>
			</table>
			<input type="submit" name="submit" value="Add Part" form="addform" onclick="return checkDate()">

			<script>
				// edit title and header
				var piecename = document.getElementById("piecename").innerHTML;
				document.getElementById("h1").innerHTML = "Parts for " + piecename;
				document.getElementById("title").innerHTML = "Parts for " + piecename;

				document.getElementById("p").onclick = "alert('hi')";

				function confirmDelete() {
					if (confirm("Are you sure?")) {
						document.getElementById("deleteform").submit();
						return true;
					} else {
						return false;
					}
				}
			</script>
		</div>
	</body>
</HTML>