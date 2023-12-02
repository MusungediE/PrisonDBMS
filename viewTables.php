<?php
session_start();
$servername = "localhost";
$username = "metongwe1";
$password = "metongwe1";
$dbname = "metongwe1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to display table data
function displayTable($tableName, $conn) {
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>$tableName Table</h2>";
        echo "<table border='1'>
            <tr>";
        while ($fieldinfo = $result->fetch_field()) {
            echo "<th>$fieldinfo->name</th>";
        }
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results in $tableName table.";
    }
}

// List of table names
$tables = ["Inmate", "Guards", "Visitors", "Cells", "Prison", "Staff", "Visits", "Altercation", "Works"];

// Display the navigation bar
echo "<div style='background-color: #f2f2f2; padding: 10px;'>";

foreach ($tables as $table) {
    // Create a link for each table
    echo "<a href='?table=$table'>$table</a> | ";
}

echo "</div>";

// Check if a specific table is requested
if (isset($_GET['table']) && in_array($_GET['table'], $tables)) {
    $selectedTable = $_GET['table'];
    displayTable($selectedTable, $conn);
}

$conn->close();
?>
