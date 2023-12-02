<?php
session_start();
$servername = "localhost";
$username = "metongwe1";
$password = "metongwe1";
$dbname = "metongwe1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Array of table names to drop
$tables_to_drop = ['Inmate', 'Visitors', 'Cells', 'Prison', 'Staff'];

// Disable foreign key checks
$conn->query('SET FOREIGN_KEY_CHECKS=0');

foreach ($tables_to_drop as $table_name) {
    $sql = "DROP TABLE IF EXISTS $table_name";

    if ($conn->query($sql) === TRUE) {
        echo "Table '$table_name' dropped successfully or does not exist.<br>";
    } else {
        echo "Error dropping table '$table_name': " . $conn->error;
    }
}

// Re-enable foreign key checks
$conn->query('SET FOREIGN_KEY_CHECKS=1');

// Close the database connection
$conn->close();
?>
