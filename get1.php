<?php
include("connectToDB.php");
$Date_start = $_GET["Date_start"];

try {
    $sqlSelect = "SELECT SUM(`Cost`) FROM `rent` WHERE `Date_start` = :Date_start";
    $stmt = $dbh->prepare($sqlSelect);
    $stmt->bindValue(":Date_start", $Date_start);
    $stmt->execute();
    $res = $stmt->fetchAll();
    foreach ($res as $row) {
        echo "<tr><td>$row[0]</td></tr>";
    }
}
catch (PDOException $ex) {
    echo $ex->GetMessage();
}
$dbh = null;
?>