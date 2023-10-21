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

// Process form data
$name = $_POST["name"];

// Process image upload
$image = $_FILES["image"]["name"];
$image_temp = $_FILES["image"]["tmp_name"];
$image_path = "uploads/" . $image;

move_uploaded_file($image_temp, $image_path);

// Store data in the database
$sql = "INSERT INTO form_data (name, image_path) VALUES ('$name', '$image_path')";

if ($conn->query($sql) === TRUE) {
    echo "Data submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
