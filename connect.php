<?php
    $servername = "localhost:3366";
    $database = "flights";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
//  else {
//     echo "Connected successfully";
// }
?>
