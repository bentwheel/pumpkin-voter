<!DOCTYPE html>
<html>
  <head>
    <title>Current Standings</title>
    <style>
        table.db-table          { border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
        table.db-table th       { background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
        table.db-table td       { padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
    </style>
  </head>
  <body>

<?php
    require __DIR__ . DIRECTORY_SEPARATOR . "config.php";
    

    $servername = DB_HOST;
    $username = DB_USER;
    $password = DB_PASSWORD;
    $dbname = DB_NAME;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    

// Report standings
    $sql = "select * from standings;";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<table cellpadding="0" cellspacing="0" class="db-table">';
            echo "<tr><th>Name</th><th>Costume</th><th>Votes</th></tr>";

            while($row = mysqli_fetch_array($result))
            {
            echo "<tr>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Description'] . "</td>";
            echo "<td>" . $row['Votes'] . "</td>";
            echo "</tr>";
            }
            echo "</table>";
        }
    } else {
        echo "No votes have been cast.";
    }
    $conn->close();
?>
</body>
</html>
