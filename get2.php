<?php
header('Content-Type: text/xml');
include("connectToDB.php");
$vendorsName = $_GET["vendorsName"];

try {
    $sqlSelect = "SELECT `cars`.`Name` FROM `cars` INNER JOIN `vendors` ON `FID_Vendors` = `ID_Vendors` WHERE `vendors`.`Name` = :vendorsName";
    $stmt = $dbh->prepare($sqlSelect);
    $stmt->bindValue(":vendorsName", $vendorsName);
    $stmt->execute();
    $res = $stmt->fetchAll();
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "<data>";
    foreach ($res as $row) {
        echo "<row><carName>$row[0]</carName></row>";
    }
    echo "</data>";
}
catch (PDOException $ex) {
    echo $ex->GetMessage();
}
$dbh = null;
?>