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

// Check if the "Insert Inmate" form is submitted
if (isset($_POST["insert_inmate"])) {
    $firstName = $_POST["inmate_first_name"];
    $lastName = $_POST["inmate_last_name"];
    $dateOfBirth = $_POST["inmate_date_of_birth"];
    $gender = $_POST["inmate_gender"];
    $address = $_POST["inmate_address"];
    $admissionDate = $_POST["inmate_admission_date"];
    $releaseDate = $_POST["inmate_release_date"];
    $crimeCommitted = $_POST["inmate_crime_committed"];
    $sentenceLength = $_POST["inmate_sentence_length"];
    $cellNumber = $_POST["inmate_cell_number"];

    // Prepare and execute the SQL statement to insert a new inmate record
    $sqlInsertInmate = "INSERT INTO Inmate (FirstName, LastName, DateOfBirth, Gender, Address, AdmissionDate, ReleaseDate, CrimeCommitted, SentenceLength, CellNumber)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmtInsertInmate = $conn->prepare($sqlInsertInmate);
    $stmtInsertInmate->bind_param("ssssssssis", $firstName, $lastName, $dateOfBirth, $gender, $address, $admissionDate, $releaseDate, $crimeCommitted, $sentenceLength, $cellNumber);

    if ($stmtInsertInmate->execute()) {
        echo "New inmate record added successfully.<br>";
    } else {
        echo "Error inserting inmate record: " . $stmtInsertInmate->error . "<br>";
    }
    $stmtInsertInmate->close();
}

// Check if the "Insert Guard" form is submitted
if (isset($_POST["insert_guard"])) {
    $staffID = $_POST["staff_id"];
    $block = $_POST["block"];

    // Prepare and execute the SQL statement to insert a new guard record
    $sqlInsertGuard = "INSERT INTO Guards (Staff_ID, Block) VALUES (?, ?)";
    
    $stmtInsertGuard = $conn->prepare($sqlInsertGuard);
    $stmtInsertGuard->bind_param("is", $staffID, $block);

    if ($stmtInsertGuard->execute()) {
        echo "New guard record added successfully.<br>";
    } else {
        echo "Error inserting guard record: " . $stmtInsertGuard->error . "<br>";
    }
    $stmtInsertGuard->close();
}

// Check if the "Insert Visitor" form is submitted
if (isset($_POST["insert_visitor"])) {
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $relationship = $_POST["relationship"];
    $visitingHours = $_POST["visiting_hours"];

    // Prepare and execute the SQL statement to insert a new visitor record
    $sqlInsertVisitor = "INSERT INTO Visitors (First_Name, Last_Name, DOB, Gender, Address, Relationship_to_Inmate, Visiting_Hours)
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmtInsertVisitor = $conn->prepare($sqlInsertVisitor);
    $stmtInsertVisitor->bind_param("sssssss", $firstName, $lastName, $dob, $gender, $address, $relationship, $visitingHours);

    if ($stmtInsertVisitor->execute()) {
        echo "New visitor record added successfully.<br>";
    } else {
        echo "Error inserting visitor record: " . $stmtInsertVisitor->error . "<br>";
    }
    $stmtInsertVisitor->close();
}

// Check if the "Insert Cells" form is submitted
if (isset($_POST["insert_cells"])) {
    $cell_number = $_POST["cell_number"];
    $cell_capacity = $_POST["cell_capacity"];
    $cell_type = $_POST["cell_type"];
    $cell_block = $_POST["cell_block"];

    // Prepare and execute the SQL statement to insert a new Cells record
    $sqlInsertCells = "INSERT INTO Cells (Cell_Number, Capacity, Cell_Type, Block)
                        VALUES (?, ?, ?, ?)";
    
    $stmtInsertCells = $conn->prepare($sqlInsertCells);
    $stmtInsertCells->bind_param("isss", $cell_number, $cell_capacity, $cell_type, $cell_block);

    if ($stmtInsertCells->execute()) {
        echo "New Cells record added successfully.<br>";
    } else {
        echo "Error inserting Cells record: " . $stmtInsertCells->error . "<br>";
    }
    $stmtInsertCells->close();
}


// Check if the "Insert Prison" form is submitted
if (isset($_POST["insert_prison"])) {
    $prison_facility_id = $_POST["facility_id"];
    $prison_facility_name = $_POST["facility_name"];
    $prison_location = $_POST["prison_location"];
    $prison_capacity = $_POST["prison_capacity"];
    $prison_occupancy = $_POST["prison_occupancy"];

    // Prepare and execute the SQL statement to insert a new Prison record
    $sqlInsertPrison = "INSERT INTO Prison (Facility_ID, Facility_Name, Location, Capacity, Occupancy)
                        VALUES (?, ?, ?, ?,?)";
    
    $stmtInsertPrison = $conn->prepare($sqlInsertPrison);
    $stmtInsertPrison->bind_param("issss", $prison_facility_id, $prison_facility_name, $prison_location, $prison_capacity,$prison_occupancy);

    if ($stmtInsertPrison->execute()) {
        echo "New Prison record added successfully.<br>";
    } else {
        echo "Error inserting Prison record: " . $stmtInsertPrison->error . "<br>";
    }
    $stmtInsertPrison->close();
}

// Check if the "Insert Staff" form is submitted
if (isset($_POST["insert_staff"])) {
    $firstName = $_POST["staff_first_name"];
    $lastName = $_POST["staff_last_name"];
    $dob = $_POST["staff_date_of_birth"];
    $gender = $_POST["staff_gender"];
    $address = $_POST["staff_address"];
    $position = $_POST["staff_position"];
    $salary = $_POST["staff_salary"];

    // Prepare and execute the SQL statement to insert a new staff record
    $sqlInsertStaff = "INSERT INTO Staff (First_Name, Last_Name, DOB, Gender, Address, Position, Salary)
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmtInsertStaff = $conn->prepare($sqlInsertStaff);
    $stmtInsertStaff->bind_param("ssssssi", $firstName, $lastName, $dob, $gender, $address, $position, $salary);

    if ($stmtInsertStaff->execute()) {
        echo "New staff record added successfully.<br>";
    } else {
        echo "Error inserting staff record: " . $stmtInsertStaff->error . "<br>";
    }
    $stmtInsertStaff->close();
}

// Check if the "visits" form is submitted
if (isset($_POST["visits"])) {
    $visit_inmate_ID = $_POST["visits_inmate_ID"];
    $visit_visitor_ID = $_POST["visits_visitor_ID"];
    $visit_hours_in = $_POST["visits_visiting_hours_in"];
    $visit_hours_out = $_POST["visits_visiting_hours_out"];
    

    // Prepare and execute the SQL statement to insert a new visits record
    $sqlInsertvisit = "INSERT INTO Visits (InmateID, Visitor_ID, Visiting_Hour_IN, Visiting_Hour_Out)
    VALUES (?, ?, ?, ?)";
    
    $stmtInsertvisit = $conn->prepare($sqlInsertvisit);
    $stmtInsertvisit->bind_param("iiss", $visit_inmate_ID, $visit_visitor_ID, $visit_hours_in,$visit_hours_out);

    if ($stmtInsertvisit->execute()) {
        echo "New visit record added successfully.<br>";
    } else {
        echo "Error inserting visit record: " . $stmtInsertvisit->error . "<br>";
    }
    $stmtInsertvisit->close();
}
// Check if the "altercation" form is submitted
if (isset($_POST["altercation"])) {
    $altercation_inmate_ID = $_POST["altercation_inmate_ID"];
    $altercation_guard_ID = $_POST["altercation_guard_ID"];
    $altercation_date = $_POST["altercation_date"];
    

    // Prepare and execute the SQL statement to insert a new altercation record
    $sqlInsertaltercation = "INSERT INTO Altercation (InmateID, Guard_ID, Date)
    VALUES (?, ?, ?)";
    
    $stmtInsertaltercation = $conn->prepare($sqlInsertaltercation);
    $stmtInsertaltercation->bind_param("iis", $altercation_inmate_ID, $altercation_guard_ID, $altercation_date);

    if ($stmtInsertaltercation->execute()) {
        echo "New Altercation record added successfully.<br>";
    } else {
        echo "Error inserting Altercation record: " . $stmtInsertaltercation->error . "<br>";
    }
    $stmtInsertaltercation->close();
}

// Check if the "works" form is submitted
if (isset($_POST["works"])) {
    $works_Facility_ID = $_POST["works_Facility_ID"];
    $works_Staff_ID = $_POST["works_Staff_ID"];
    
    

    // Prepare and execute the SQL statement to insert a new works record
    $sqlInsertWorks = "INSERT INTO Works (Facility_ID, Staff_ID)
    VALUES (?, ?)";
    
    $stmtInsertWorks = $conn->prepare($sqlInsertWorks);
    $stmtInsertWorks->bind_param("ii", $works_Facility_ID, $works_Staff_ID);

    if ($stmtInsertWorks->execute()) {
        echo "New Works record added successfully.<br>";
    } else {
        echo "Error inserting Works record: " . $stmtInsertWorks->error . "<br>";
    }
    $stmtInsertWorks->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Inmate, Guard, and Visitor</title>
</head>
<body>
    <h2>Insert Inmate</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>First Name:</label>
        <input type="text" name="inmate_first_name" required><br>

        <label>Last Name:</label>
        <input type="text" name="inmate_last_name" required><br>

        <label>Date of Birth:</label>
        <input type="date" name="inmate_date_of_birth" required><br>

        <label>Gender (M/F):</label>
        <input type="text" name="inmate_gender" required><br>

        <label>Address:</label>
        <input type="text" name="inmate_address" required><br>

        <label>Admission Date:</label>
        <input type="date" name="inmate_admission_date" required><br>

        <label>Release Date:</label>
        <input type="date" name="inmate_release_date" required><br>

        <label>Crime Committed:</label>
        <input type="text" name="inmate_crime_committed" required><br>

        <label>Sentence Length:</label>
        <input type="number" name="inmate_sentence_length" required><br>

        <label>Cell Number:</label>
        <input type="text" name="inmate_cell_number" required><br>

        <input type="submit" name="insert_inmate" value="Insert Inmate">
    </form>

    <h2>Insert Guard</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>Staff ID:</label>
        <input type="number" name="staff_id" required><br>

        <label>Block:</label>
        <input type="text" name="block" required><br>

        <input type="submit" name="insert_guard" value="Insert Guard">
    </form>

    <h2>Insert Visitor</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>First Name:</label>
        <input type="text" name="first_name" required><br>

<label>Last Name:</label>
<input type="text" name="last_name" required><br>

<label>Date of Birth:</label>
<input type="date" name="dob" required><br>

<label>Gender (M/F):</label>
<input type="text" name="gender" required><br>

<label>Address:</label>
<input type="text" name="address" required><br>

<label>Relationship to Inmate:</label>
<input type="text" name="relationship" required><br>

<label>Visiting Hours:</label>
<input type="text" name="visiting_hours" required><br>

<input type="submit" name="insert_visitor" value="Insert Visitor">
</form>

<h2>Insert Cells</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>Cell Number:</label>
        <input type="number" name="cell_number" required><br>

        <label>Capacity:</label>
        <input type="text" name="cell_capacity" required><br>

        <label>Cell Type:</label>
        <input type="text" name="cell_type" required><br>

        <label>Block:</label>
        <input type="text" name="cell_block" required><br>

        <input type="submit" name="insert_cells" value="Insert Cell">
    </form>


    <h2>Insert Prison</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label> Facility_ID:</label>
        <input type="number" name="facility_id" required><br>

        <label>Facility_Name:</label>
        <input type="text" name="facility_name" required><br>

        <label>Location:</label>
        <input type="text" name="prison_location" required><br>

        <label>Capacity:</label>
        <input type="number" name="prison_capacity" required><br>

        <label>Occupancy:</label>
        <input type="number" name="prison_occupancy" required><br>

        <input type="submit" name="insert_prison" value="Insert Cell">
    </form>
   
    <h2>Insert Staff</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>1 First Name:</label>
        <input type="text" name="staff_first_name" required><br>

        <label>Last Name:</label>
        <input type="text" name="staff_last_name" required><br>

        <label>Date Of birth:</label>
        <input type="date" name="staff_date_of_birth" required><br>

        <label>Gender (M/F):</label>
        <input type="text" name="staff_gender" required><br>

        <label>Address:</label>
        <input type="text" name="staff_address" required><br>

        <label>Position:</label>
        <input type="text" name="staff_position" required><br>

        <label>Salary:</label>
        <input type="number" name="staff_salary" required><br>

        <input type="submit" name="insert_staff" value="Insert Cell">
    </form>

    <h2>Visits</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>Inmate_ID:</label>
        <input type="text" name="visits_inmate_ID" required><br>

        <label>Visitor_ID:</label>
        <input type="text" name="visits_visitor_ID" required><br>

        <label>Visiting_Hours_In:</label>
        <input type="time" name="visits_visiting_hours_in" required><br>

        <label>Visiting_Hours_Out:</label>
        <input type="time" name="visits_visiting_hours_out" required><br>

    
        <input type="submit" name="visits" value="Insert Visit">
    </form>

    <h2>Altercation</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>Inmate_ID:</label>
        <input type="text" name="altercation_inmate_ID" required><br>

        <label>Guard_ID:</label>
        <input type="text" name="altercation_guard_ID" required><br>

        <label>Altercation_Date:</label>
        <input type="date" name="altercation_date" required><br>



    
        <input type="submit" name="altercation" value="Insert Altercation">
    </form>

    <h2>Works</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>Facility_ID:</label>
        <input type="text" name="works_Facility_ID" required><br>

        <label>Staff_ID:</label>
        <input type="text" name="works_Staff_ID" required><br>

    



    
        <input type="submit" name="works" value="Insert Works">
    </form>
</body>
</html>

