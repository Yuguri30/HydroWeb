<?php

$hostname = "localhost";  // Specify your host here, usually localhost
$username = "root";     // Provide your username here
$password = "";       // Provide your password here
                      // If you left it empty, then keep it empty
$dbname = "hydroponics";     // Your database name

// Create connection
$conn = new mysqli($hostname, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully<br>";

// To protect MySQL injection (a type of cyber attack), we use prepared statements
// $sql = 'SELECT * FROM user_form WHERE id=?';   // The ? acts as a placeholder for the data to be inserted
// $stmt = $conn->prepare($sql);                // Prepare the statement
// $stmt->bind_param('i', $_GET['id']);        // Bind the parameter to the placeholder. i means integer
// $stmt->execute();                           // Execute the prepared statement

// $result = $stmt->get_result();              // Get the result set from the prepared statement
// while ($row = $result->fetch_assoc()) {     // Fetch each row from the result set as an associative array
//     echo $row['data']."<br>";             // Print out the value of 'data' column in each row
// }
// $stmt->close();                            // Close the prepared statement
// $conn->close();                           // Close the database connection


// $conn = mysqli_connect('localhost','root','','user_db');

?>