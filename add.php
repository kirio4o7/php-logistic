<?php
$user = "kirikihira_logi";
$pass = "Kirio4o7";
$title = $_POST['title'];
$task = $_POST['task'];
$instock = $_POST['instock'];
$shipment = $_POST['shipment'];
$arrivals = (int) $_POST['arrivals'];
$arrival_unit = $_POST['arrival_unit'];
$reserve = (int) $_POST['reserve'];
$reserve_unit = $_POST['reserve_unit'];
$comment = $_POST['comment'];
$file = $_FILES['file']['name'];
$postcode = (int) $_POST['postcode'];
$prefecture = $_POST['prefecture'];
$city = $_POST['city'];
$address = $_POST['address'];
$building = $_POST['building'];
$phone = $_POST['phone'];
try {
    $dbh = new PDO('mysql:host=localhost;dbname=logistic;charset=utf8', $user,$pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO directed (title, task, instock, shipment, arrivals, arrival_unit, reserve, reserve_unit, comment, file, postcode, prefecture, city, address, building, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $title, PDO::PARAM_STR);
    $stmt->bindValue(2, $task, PDO::PARAM_STR);
    $stmt->bindValue(3, $instock, PDO::PARAM_STR);
    $stmt->bindValue(4, $shipment, PDO::PARAM_STR);
    $stmt->bindValue(5, $arrivals, PDO::PARAM_INT);
    $stmt->bindValue(6, $arrival_unit, PDO::PARAM_STR);
    $stmt->bindValue(7, $reserve, PDO::PARAM_INT);
    $stmt->bindValue(8, $reserve_unit, PDO::PARAM_STR);
    $stmt->bindValue(9, $comment, PDO::PARAM_STR);
    $stmt->bindValue(10, $file, PDO::PARAM_STR);
    $stmt->bindValue(11, $postcode, PDO::PARAM_INT);
    $stmt->bindValue(12, $prefecture, PDO::PARAM_STR);
    $stmt->bindValue(13, $city, PDO::PARAM_STR);
    $stmt->bindValue(14, $address, PDO::PARAM_STR);
    $stmt->bindValue(15, $building, PDO::PARAM_STR);
    $stmt->bindValue(16, $phone, PDO::PARAM_STR);
    $stmt->execute();
    $dbh = null;
    echo "登録が完了しました。<br>";
    echo "<a href='index.php'>トップページに戻る。</a>";
} catch (Exception $e) {
    echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}