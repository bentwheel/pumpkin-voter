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
    
        
    // burn it all down!
    
    $sql = "delete from poll_master;";

    if ($conn->query($sql) === TRUE) {
        echo "Successfully cleared poll_master.";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $sql = "delete from upvotes;";

    if ($conn->query($sql) === TRUE) {
        echo "<br>Successfully cleared all votes. Reset DONE.";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
