<!DOCTYPE html>
<HTML>
	<head>
		<?php include('navbar.php'); ?>
		<link rel="stylesheet" type="text/css" href="css/defaultstylesheet.css">
		<meta charset="ISO-8859-1">
		<script src="scripts/sorttable.js"></script>
		<title>This Week!</title>
	</head>
	<body>
		<div id="content">
			<h1>This Week!</h1>
			<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				Query: <input type="search" name="query" value="<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>">
				<br>
				<input type="submit" value="Search" size="50">
			</form>

			<form id="editform" method="post" action="editpart.php"></form>

			<br>
			<br>

			<?php

			$dbname = '';
			$username = '';
			$password = '';
			$servername = '';

            // Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$query = "";

			if($_SERVER["REQUEST_METHOD"] == "GET") {
				if(isset($_GET["query"])) {
					$query = test_input($_GET["query"]);
				}

				$search = "SELECT Piece.Name AS PieceName, Part.ID, Instrument, Quantity, LastBorrowedBy, DateBorrowed, Status FROM Part INNER JOIN Piece ON Part.PieceID = Piece.ID WHERE DATEDIFF(CURDATE(), DateBorrowed) <= 7  AND (INSTR(Piece.Name, '" . $query . "') > 0 OR INSTR(Instrument, '" . $query ."') > 0 OR INSTR(Quantity, '" . $query . "') > 0 OR INSTR(LastBorrowedBy, '" . $query . "') > 0) ORDER BY DateBorrowed";

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
						<th></th>
					</tr>";


					while($row = $result->fetch_assoc()) {
						echo "
						<tr>
							<td>" . utf8_encode($row["PieceName"]) . "</td>
							<td>" . utf8_encode($row["Instrument"]) . "</td>
							<td>" . utf8_encode($row["Quantity"]) . "</td>
							<td>" . utf8_encode($row["LastBorrowedBy"]) . "</td>
							<td>" . utf8_encode($row["DateBorrowed"]) . "</td>
							<td> <button form=\"editform\" type=\"submit\" name=\"ID\" value=" . $row["ID"] . ">Edit</button></td>
						</tr>";
					}
					echo "</table>";
				} elseif ($query != "") {
					echo "0 results for " . $query;
				} else {
					echo "Looks like no one borrowed anything this week!";
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