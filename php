<?php
// Database connection settings
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";  // Your MySQL password
$dbname = "student_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Variables to store form input
$firstname = $lastname = $middlename = $age = $address = $course = $section = "";

// Form submission check
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect form data
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $middlename = htmlspecialchars($_POST['middlename']);
    $age = (int)$_POST['age'];
    $address = htmlspecialchars($_POST['address']);
    $course = htmlspecialchars($_POST['course']);
    $section = htmlspecialchars($_POST['section']);

    // SQL query to insert data into the database
    $sql = "INSERT INTO students (firstname, lastname, middlename, age, address, course, section)
            VALUES ('$firstname', '$lastname', '$middlename', '$age', '$address', '$course', '$section')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>