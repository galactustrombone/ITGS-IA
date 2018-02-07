<!DOCTYPE html>
<HTML>
	<head>
		<?php include('navbar.php'); ?>
		<link rel="stylesheet" type="text/css" href="css/defaultstylesheet.css">
		<meta charset="utf-8">
		<script src="scripts/sorttable.js"></script>
		<script src="scripts/movesearchbar.js"></script>
		<title>All Parts!</title>
	</head>
	<body>
		<div id="content">
			<div id="searchbar">
				<h1>All Parts!</h1>
				<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					Search: <input type="search" name="query" value="<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>" size="50">
					<br>
					<input type="submit" value="Search" size="50">
				</form>
			</div>

			<form id="editform" method="post" action="editpart.php"></form>

			<div id="gap">
                <h1></h1>
                <br>
                <br>
                <br>
            </div>

			<br><br><br><br>

			<?php

			$dbname = '';
			$username = '';
			$password = '';
			$servername = '';

            // Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			$conn->set_charset("utf8");
            // Check connection
			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$query = "";

			if($_SERVER["REQUEST_METHOD"] == "GET") {
				if(isset($_GET["query"])) {
					$query = test_input($_GET["query"]);
				}

				$search = "SELECT Piece.Name AS PieceName, Part.ID, Instrument, Quantity, LastBorrowedBy, DateBorrowed, Status FROM Part INNER JOIN Piece ON Part.PieceID = Piece.ID WHERE INSTR(Piece.Name, '" . $query . "') > 0 OR INSTR(Instrument, '" . $query ."') > 0 OR INSTR(Quantity, '" . $query . "') > 0 OR INSTR(LastBorrowedBy, '" . $query . "') > 0 ORDER BY PieceName";

				$result = $conn->query($search);

				if($result->num_rows > 0) {
                // output data of each row
					echo "<table id=\"piecetable\" class=\"sortable\">
					<tr>
						<th id=\"piecenameth\">Piece Name</th>
						<th id=\"instrumentth\">Instrument</th>
						<th id=\"quantityth\">Quantity</th>
						<th id=\"lastborrowedbyth\">Last Borrowed By</th>
						<th id=\"dateborrowedth\">Date Borrowed</th>
						<th id=\"dateborrowedth\">Status</th>
						<th></th>
					</tr>";


					while($row = $result->fetch_assoc()) {
						$status = "OK";
						if ($row["Status"] == "1") {
							$status = "Missing";
						} elseif ($row["Status"] == "2") {
							$status = "Lost";
						}
						echo "
						<tr>
							<td>" . htmlspecialchars($row["PieceName"]) . "</td>
							<td>" . htmlspecialchars($row["Instrument"]) . "</td>
							<td>" . htmlspecialchars($row["Quantity"]) . "</td>
							<td>" . htmlspecialchars($row["LastBorrowedBy"]) . "</td>
							<td>" . htmlspecialchars($row["DateBorrowed"]) . "</td>
							<td>" . htmlspecialchars($status) . "</td>
							<td> <button form=\"editform\" type=\"submit\" name=\"ID\" value=" . $row["ID"] . ">Edit</button></td>
						</tr>";
					}
					echo "</table>";
				} elseif ($query != "") {
					echo "0 results for " . $query;
				} else {
					echo "<p>No parts! Try refreshing. If there still aren't any parts, something has probably gone horribly wrong. Try emailing Rikin about the problem.</p>";
				}
			}

			echo "<br/><br/>";

			$conn->close();

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