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
    
    // Harvest GET inputs from QR code
    $id = (int)$_GET["ID"];
    
    if(!isset($id) || trim($id) == '')
    {
       echo "Error in QR scan; vote not cast.";
    }
    
        
    // Check that ID is actually registered
    $sql_check = "SELECT * from `poll_master` WHERE ID = ".$id.";";
    
    if($results = $conn->query($sql_check)) {
        if ($results->num_rows == 0) {
            echo "Sticker not registered. Vote not cast.";
            exit(1);
        }
    }
    else {
        echo "Error: " . $sql_check . "<br>" . $conn->error;
    }
    
    // If no error and voter is registered, cast the vote
    
    $sql = "INSERT INTO `upvotes` (`ID`, `votes`) VALUES (".$id.", 1);";

    if ($conn->query($sql) === TRUE) {
        echo "Upvoted!";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
