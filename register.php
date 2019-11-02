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
    
    // Harvest form inputs
    $id = $_POST["ID"];
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    
    if(!isset($id) || trim($id) == '' || !isset($name) || trim($name) == '' || !isset($desc) || trim($desc) == '')
    {
        echo "All entries required. Please go back and try again!";
        exit(1);
    }
    
    // OK great, register the new contesetant
    $sql = "INSERT INTO `poll_master` (`ID`, `name`, `desc`) VALUES (".$id.", '".$name."', '".$desc."');";
    

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully. <br><br><a href=\"./index.html\">Back to Main Menu</a>";
    }
    elseif($conn->errno == 1062) {
        echo "This contestant code has already been assigned. Please go back and use a different code!";
        echo "<br><br><a href=\"./index.html\">Back to Main Menu</a>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<br><br><a href=\"./index.html\">Back to Main Menu</a>";
    }

    $conn->close();
?>
