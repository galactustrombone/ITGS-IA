<!DOCTYPE html>
<HTML>
    <head>
        <?php include('navbar.php'); ?>
        <link rel="stylesheet" type="text/css" href="css/defaultstylesheet.css">
        <meta charset="ISO-8859-1">
        <script src="scripts/sorttable.js"></script>
        <script src="scripts/movesearchbar.js"></script>
        <title>Pieces!</title>
    </head>
    <body>
        <div id="content">
            <div id="searchbar">
                <h1>Pieces!</h1>
                <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    Search: <input type="search" name="query" value="<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>" size="50" autofocus>
                    <br>
                    <input type="submit" value="Search">
                </form>
            </div>

            <form id="editform" method="post" action="editpiece.php">
                <input id="editformid" name="ID" hidden>
            </form>
            <form id="partform" method="post" action="parts.php">
                <input id="partformid" name="pieceid" hidden>
            </form>

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
            // Check connection
            if($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $query = "";

            if($_SERVER["REQUEST_METHOD"] == "GET") {
                if(isset($_GET["query"])) {
                    $query = test_input($_GET["query"]);
                }

                $search = "SELECT Piece.ID, Piece.Name, Category, LastPerformed, Publisher.Name AS Publisher FROM Piece INNER JOIN Publisher ON Piece.PublisherID = Publisher.ID WHERE (Piece.ID = '" . $query . "' OR LastPerformed = '" . $query . "' OR INSTR(Piece.Name, '" . $query ."') > 0 OR INSTR(Piece.Category, '" . $query ."') > 0 OR INSTR(Publisher.Name, '" . $query ."') > 0) " . /* AND EXISTS(SELECT 1 FROM Part WHERE Piece.ID = Part.PieceID) */ "ORDER BY Piece.Name";

                $result = $conn->query($search);

                if($result->num_rows > 0) {
                // output data of each row
                    echo "<table id=\"piecetable\" class=\"sortable\">
                    <tr>
                        <th id=\"piecenameth\">Name</th>
                        <th id=\"categoryth\">Category</th>
                        <th id=\"publisherth\">Publisher</th>
                        <th id=\"lastperformedth\">Last Performed</th>
                        <th></th>
                        <th></th>
                    </tr>";


                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>" . utf8_encode($row["Name"]) . "</td>
                        <td>" . utf8_encode($row["Category"]) . "</td>
                        <td>" . utf8_encode($row["Publisher"]) . "</td>
                        <td>" . utf8_encode($row["LastPerformed"]) . "</td>
                        <td> <button onclick=\"editFormSubmit(" . $row["ID"] . ")\" form=\"editform\" type=\"submit\" name=\"ID\" value=" . $row["ID"] . ">Edit</button></td>
                        <td> <button onclick=\"partFormSubmit(" . $row["ID"] . ")\" form=\"partform\" type=\"submit\" name=\"pieceid\" value=" . $row["ID"] . ">Parts</button></td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results for " . $query;
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
        <script type="text/javascript">
            var editFormSubmit = function (id) {
                document.getElementById("editformid").value = id;
                document.getElementById("editform").submit();
            }

            var partFormSubmit = function (id) {
                document.getElementById("partformid").value = id;
                document.getElementById("partform").submit();
            }
        </script>
    </body>
</HTML>