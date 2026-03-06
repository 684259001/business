select0.php


<?php
require "connect.php";
$sql = "SELECT * FROM customer";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);
?>