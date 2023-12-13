<?php
require 'connect.php'; 
if(isset($_GET['origin'])) {
    $origin = $_GET['origin'];
    $sqlSelect = "SELECT * FROM flights WHERE origin LIKE '%$origin%'";
    $resurl = $conn->query($sqlSelect);
    if ($resurl->num_rows > 0) {
        echo "<h2>" . "Các chuyến bay" . "</h2>";
    echo "<table>";
        echo "<tr>";
            echo "<th>" . "ID" . "</th>";
            echo "<th>" . "ORIGIN" . "</th>";
            echo "<th>" . "DESTINATION" . "</th>";
            echo "<th>" . "DURATION" . "</th>";
        echo "</tr>";
        echo "<tr>";
            for ($i=0; $i<$resurl->num_rows; $i++) {
                echo "<tr>";
                $row = $resurl->fetch_assoc();
                echo "<td>" . $row['id_flight'] . "</td>";
                echo "<td>" . $row['origin'] . "</td>";
                echo "<td>" . $row['destination'] . "</td>";
                echo "<td>" . $row['duration'] . "</td>";
                echo "</tr>";
            }
        echo "</tr>"; 
    echo "</table>"; 
    }
}

?>