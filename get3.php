<?php
include("connectToDB.php");
$date = $_GET["date"];

try {
    $sqlSelect = "SELECT `Name`, `Release_date`, `Race`, `State(new,old)` AS `State`, `Price` FROM `cars` WHERE `ID_Cars` NOT IN (SELECT `FID_Car` FROM `rent` WHERE :date BETWEEN `Date_start` AND `Date_end`)";
    $stmt = $dbh->prepare($sqlSelect);
    $stmt->bindValue(":date", $date);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($res);
}
catch (PDOException $ex) {
    echo $ex->GetMessage();
}
$dbh = null;
?>