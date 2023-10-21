<?php
// Database connection parameters
$servername = "localhost";
$username = "kashyap";
$password = "";
$dbname = "myimage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT * FROM form_data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a list
    while ($row = $result->fetch_assoc()) {
        echo "<li><strong>Name:</strong> " . $row["name"] . " - <strong>Image:</strong> <img src='" . $row["image_path"] . "' alt='Image'></li>";
    }
} else {
    echo "No data found";
}

$conn->close();
?>
