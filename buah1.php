<?php
$host = "localhost"; // Your database host
$username = "root"; // Your database username
$password = ""; // Your database password
$database = "data"; // Your database name

// Create a connection
$connection = new mysqli($host, $username, $password, $database);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


$query = "SELECT * FROM buah";
$result = $connection->query($query);


if ($result->num_rows > 0) {
    // Store results in an array
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }


    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "No data found";
}

// Close the connection
$connection->close();
?>
