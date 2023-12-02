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
    
    //Creates students database if not already existing
    $sql = "CREATE TABLE IF NOT EXISTS Inmate (
        InmateID INT AUTO_INCREMENT PRIMARY KEY,
        FirstName VARCHAR(50),
        LastName VARCHAR(50),
        DateOfBirth DATE,
        Gender CHAR(1),
        Address VARCHAR(100),
        AdmissionDate DATE,
        ReleaseDate DATE,
        CrimeCommitted VARCHAR(255),
        SentenceLength INT,
        CellNumber VARCHAR(10)
    )";

    


    if ($conn->query($sql) === TRUE) {
        echo "Table 'Inmate' created successfully or already exists.<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }




    $sql2 = "CREATE TABLE IF NOT EXISTS Guards (
        Guard_ID int NOT NULL AUTO_INCREMENT
 PRIMARY KEY,
        Staff_ID INT,
        Block CHAR(1)    
    )";

    if ($conn->query($sql2) === TRUE) {
        echo "Table 'Guards' created successfully or already exists.<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }




    $sql3 = "CREATE TABLE IF NOT EXISTS Visitors (
       Visitor_ID INT AUTO_INCREMENT PRIMARY KEY,
        First_Name VARCHAR(50),
        Last_Name VARCHAR(50),
        DOB DATE,
        Gender CHAR(1),
        Address VARCHAR(100),
        Relationship_to_Inmate VARCHAR(100),
        Visiting_Hours VARCHAR(50) 
    
    )";
    

    if ($conn->query($sql3) === TRUE) {
        echo "Table 'Visitors' created successfully or already exists.<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }




    $sql4 = "CREATE TABLE IF NOT EXISTS Cells (
        Cell_Number VARCHAR(10) PRIMARY KEY,
        Capacity INT,
        Cell_Type VARCHAR(20),
        Block VARCHAR(20)    
    )";

    if ($conn->query($sql4) === TRUE) {
        echo "Table 'Cells' created successfully or already exists.<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }




    $sql5 = "CREATE TABLE IF NOT EXISTS Prison (
        Facility_ID INT AUTO_INCREMENT PRIMARY KEY,
        Facility_Name VARCHAR(100),
        Location VARCHAR(100),
        Capacity INT,
        Occupancy INT    
    )";

    if ($conn->query($sql5) === TRUE) {
        echo "Table 'Prison' created successfully or already exists.<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }




    $sql6 = "CREATE TABLE IF NOT EXISTS Staff (
        Staff_ID INT AUTO_INCREMENT PRIMARY KEY,
        First_Name VARCHAR(50),
        Last_Name VARCHAR(50),
        DOB DATE,
        Gender CHAR(1),
        Address VARCHAR(100),
        Position VARCHAR(100),
        Salary INT   
    )";

    if ($conn->query($sql6) === TRUE) {
        echo "Table 'Staff' created successfully or already exists.<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }


//RELATIONSHIPS Below

 

    $sql8 = "CREATE TABLE IF NOT EXISTS Visits (
        InmateID INT,
        Visitor_ID INT,
        Visiting_Hour_IN TIME,
        Visiting_Hour_Out TIME
          
    )";

    if ($conn->query($sql8) === TRUE) {
        echo "Table 'Visits' created successfully or already exists.<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }




    $sql9 = "CREATE TABLE IF NOT EXISTS Altercation (
        InmateID INT,
        Guard_ID INT,
        Date DATE
           
    )";

    if ($conn->query($sql9) === TRUE) {
        echo "Table 'Altercation' created successfully or already exists.<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }




    $sql10 = "CREATE TABLE IF NOT EXISTS Works (
        Facility_ID INT,
        Staff_ID INT   
    )";

    if ($conn->query($sql10) === TRUE) {
        echo "Table 'Works' created successfully or already exists.<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Insert a sample row into the Inmate table
$sql11 = "INSERT INTO Inmate (InmateID,FirstName, LastName, DateOfBirth, Gender, Address, AdmissionDate, ReleaseDate, CrimeCommitted, SentenceLength, CellNumber)
VALUES ('1','John', 'Doe', '1980-01-01', 'M', '123 Main St', '2023-01-01', '2023-07-01', 'Robbery', 7, 'A1')";
if ($conn->query($sql11) === TRUE) {
    echo "Sample row inserted into 'Inmate' table.<br>";
} else {
    echo "Error inserting sample row into 'Inmate' table: " . $conn->error;
    echo "<br>";
}

// Insert a sample row into the Guards table
$sql12 = "INSERT INTO Guards (Guard_ID,Staff_ID, Block) VALUES (1,1, 'A')";

if ($conn->query($sql12) === TRUE) {
    echo "Sample row inserted into 'Guards' table.<br>";
} else {
    echo "Error inserting sample row into 'Guards' table: " . $conn->error;
    echo "<br>";
}

// Insert a sample row into the Visitors table
$sql13 = "INSERT INTO Visitors (Visitor_ID,First_Name, Last_Name, DOB, Gender, Address, Relationship_to_Inmate, Visiting_Hours) VALUES ('1','John', 'Doe', '1990-01-01', 'M', '123 Main St', 'Friend', '10:00 AM')";

if ($conn->query($sql13) === TRUE) {
    echo "Sample row inserted into 'Visitors' table.<br>";
} else {
    echo "Error inserting sample row into 'Visitors' table: " . $conn->error;
    echo "<br>";
}

// Insert a sample row into the Cells table
$sql14 = "INSERT INTO Cells (Cell_Number,Capacity, Cell_Type, Block) VALUES ('1','4', 'Bunk', 'A')";

if ($conn->query($sql14) === TRUE) {
    echo "Sample row inserted into 'Cells' table.<br>";
} else {
    echo "Error inserting sample row into 'Cells' table: " . $conn->error;
    echo "<br>";
}

// Insert a sample row into the Prison table
$sql15 = "INSERT INTO Prison (Facility_ID,Facility_Name, Location, Capacity, Occupancy) VALUES ('1','Test', 'East Quadrant', '1000', '251')";

if ($conn->query($sql15) === TRUE) {
    echo "Sample row inserted into 'Prison' table.<br>";
} else {
    echo "Error inserting sample row into 'Prison' table: " . $conn->error;
    echo "<br>";
}

// Insert a sample row into the Staff table
$sql16 = "INSERT INTO Staff (First_name, Last_Name, DOB, Gender, Address, Position, Salary) VALUES ('John', 'Doe', '2023-01-01', 'M', '123 Real Address', 'Cook', '52000')";

if ($conn->query($sql16) === TRUE) {
    echo "Sample row inserted into 'Staff' table.<br>";
} else {
    echo "Error inserting sample row into 'Staff' table: " . $conn->error;
    echo "<br>";
}






