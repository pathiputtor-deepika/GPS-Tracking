<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
    text-align: center;
}

.user-details {
    margin-top: 20px;
}

.user-details p {
    margin-bottom: 10px;
    padding: 10px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
    transition: background-color 0.3s ease; /* Add a smooth transition effect */
}

.user-details p:hover {
    background-color: #e9e9e9; /* Change background color on hover */
}

.user-details p:nth-child(odd) {
    background-color: #f5f5f5; /* Alternate background color for odd rows */
}

.user-details p:last-child {
    margin-bottom: 0; /* Remove bottom margin from the last paragraph */
}

.user-details p strong {
    color: #333; /* Set strong text color to dark */
}

.user-details p em {
    font-style: italic; /* Set italic style for emphasis */
}

    </style>
</head>
<body>
    <div class="container">
        <h1>User Details</h1>
        <div class="user-details">
<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "gpstracking"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user details from the database
$sql = "SELECT username, latitude, longitude FROM userlocations";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<p>Username: " . $row["username"]. " - Latitude: " . $row["latitude"]. " - Longitude: " . $row["longitude"]. "</p>";
    }
} else {
    echo "<p>No results found</p>";
}

// Close the database connection
$conn->close();
?>
</div>
</div>
</body>
</html>