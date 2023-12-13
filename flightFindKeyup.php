<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse:collapse ;
            font-family: arial;
            width: 60%;
        }
        td, th{
            border:1px solid gray;
            text-align: center;
            padding: 10px;
        }
        #tieu_de{
            text-align: center;
            background-color: #4f81bd;
            color: white;
        }
        tr:nth-child(odd){
            background-color: #dce6f1;
        }
        /* tr:nth-child(even){
            background-color: red;
        } */
    </style>
</head>
<body>
<?php
require 'connect.php'; 
if(isset($_GET['origin'])) {
    $origin = $_GET['origin'];
    $sqlSelect = "SELECT * FROM flights WHERE origin LIKE '%$origin%'";
    $resurl = $conn->query($sqlSelect);
    if ($resurl->num_rows > 0) {
        echo "<h2>" . "Các chuyến bay" . "</h2>";
    echo "<table>";
        echo "<tr id='tieu_de'>";
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
</body>
</html>
