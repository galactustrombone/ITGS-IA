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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name">
        <br><br>
        Cheese: <input type="text" name="cheese">
        <br><br>
        <input type="submit" name="submit" value="Submit">  
    </form>

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

    $id = $conn->query("SELECT MAX(id) FROM sql9150477.PHPTestTable")->fetch_row () [0] + 1;
    $name = "";
    $cheese = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $cheese = test_input($_POST["cheese"]);

        $insertsql = "INSERT INTO sql9150477.PHPTestTable VALUES (" . $id . ", '" . $name . "', '" . $cheese . "');";

        if ($conn->query($insertsql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insertsql . "<br>" . $conn->error;
        }

    }

    echo "<br/><br/>";

    $querysql = "SELECT id, name, cheese FROM PHPTestTable";
    $result = $conn->query($querysql);

    if ($result->num_rows > 0) {
    // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Cheese: " . $row["cheese"]. "<br>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();

    function test_input($data) {
      $data = htmlspecialchars($data);
      return $data;
  }
  ?>
</body>
</html>