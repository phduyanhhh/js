<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="findFlight.js"></script>
</head>
<body>
    <p>Nhập chuyến bay cần tìm:</p>
    <!-- <input type="text" name='findFlght' id='find_flight'> -->
    <input type="text" id="find_flight" list="myList">
    <datalist id="myList">
        <?php
        require 'connect.php';
        $sqlOption = "SELECT * FROM `flights` GROUP BY origin";
        $resurlSqlOption = $conn->query($sqlOption);
        if($resurlSqlOption->num_rows>0){
            for($i=0;$resurlSqlOption->num_rows>$i;$i++){
                $row = $resurlSqlOption->fetch_assoc();
                $origin = $row['origin'];
                echo "<option value='$origin'>";
            }
        }
        ?>
    </datalist>
    <div id=print_flight>Chưa chọn</div>
</body>
</html>


