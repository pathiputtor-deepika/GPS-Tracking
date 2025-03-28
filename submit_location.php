<?php
    // Database connection parameters
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gpstracking";

    // Retrieve form data
    $username = $_POST['username'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the database using prepared statements
    $sql = "INSERT INTO userlocations (username, latitude, longitude) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the SQL statement
    $stmt->bind_param("sdd", $username, $latitude, $longitude);
    if ($stmt->execute()) {
        // Provide confirmation message to the user
        echo "Location saved successfully!";
    } else {
        // If insertion fails, provide an error message
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
?>
