<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng thông tin chuyến bay</title>
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

    <!-- <script>
        function search_flight(){
            const origin =document.querySelector('#origin').value
            fetch(`1.printfilght.php?origin=${ origin }`).
            then(response=>response.text()).then(response=>
            document.querySelector('#ket_qua_tim_kiem').innerHTML=response);
        }
        document.addEventListener('DOMContentLoaded', function(){
            document.querySelector('#origin').onkeyup = search_flight;      
        });
    </script> -->
</head>
<body>
    <form method="get">
        <h1>Search Flight</h1>
        <input type="text" list="origin" name="origin">
        <datalist id="origin">
            <?php
                require 'connect.php';
                mysqli_set_charset($conn, 'UTF8');
                $sql = "SELECT * FROM flights GROUP BY origin   ";
                $result = $conn->query($sql);
                for ($i=0; $i<$result->num_rows; $i++)
                {
                    $row = $result->fetch_assoc();
                    echo "<option> $row[origin] </option>";
                }
                $conn->close();
            ?>
        </datalist>
    </form>
    <?php
    if (isset($_GET['origin'])){
    $origin = $_GET['origin'];
    require 'connect.php';
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT * FROM flights WHERE origin = '$origin'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        echo "<table>"; 
            echo "<caption><b>Bảng thông tin chuyến bay</b></caption>";
            {
                $tieuDe = array('ID', 'Origin', 'Destination', 'Duration');
                echo"<tr id='tieu_de'>";
                for($i = 0 ; $i <4; $i += 1) {
                    echo "<td>$tieuDe[$i]</td>";
                }
                echo "</tr>";
                for ($i=0; $i<$result->num_rows; $i++){
                $row = $result->fetch_assoc();
                echo"<tr>";
                    echo "<td>$row[id]</td>";
                    echo "<td>$row[origin]</td>";
                    echo "<td>$row[destination]</td>";
                    echo "<td>$row[duration]</td>";
                echo "</tr>";
                }
            }
        echo "</table>"; 
    }
    else{
        echo "NO flight in database";
    }
    $conn->close();
}
    ?>
</body>
</html>