<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX</title>
    <script src="script.js" defer></script>
</head>
<body>
    <label for="Date_start">Оберіть дату для отримання даних про дохід:</label>
    <input type="date" name="Date_start" id="Date_start" value="2014-09-01" required>
    <input type="button" value="Отримати" onclick="get1()">
    <br><br>
    <table border="1" id="table1">
        <thead>
            <tr><th id="thead1"></th></tr>
        </thead>
        <tbody id="tbody1"></tbody>
    </table>
    <br>
    <label for="vendorsName">Оберіть виробника для отримання переліку автомобілів:</label>
    <select name="vendorsName" id="vendorsName">
        <?php
        include("connectToDB.php");
        try {
            $sqlSelect = "SELECT `Name` FROM `vendors`";
            foreach ($dbh->query($sqlSelect) as $row) {
                echo "<option value='$row[0]'>$row[0]</option>";
            }
        }
        catch (PDOException $ex) {
            echo $ex->GetMessage();
        }
        $dbh = null;
        ?>
    </select>
    <input type="button" value="Отримати" onclick="get2()">
    <br><br>
    <table border="1" id="table2">
        <thead>
            <tr><th id="thead2"></th></tr>
        </thead>
        <tbody id="tbody2"></tbody>
    </table>
    <br>
        <label for="date">Оберіть дату для отримання переліку вільних автомобілів:</label>
        <input type="date" name="date" id="date" value="2014-09-01" required>
        <input type="button" value="Отримати" onclick="get3()">
    <br><br>
    <table border="1" id="table3">
        <thead id="thead3"></thead>
        <tbody id="tbody3"></tbody>
    </table>
</body>
</html>