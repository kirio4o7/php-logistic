<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ロジスティック</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>指示書の詳細表示</h1>
<a href="toppage.php">トップページへ戻る</a>
<?php
$user = "kirikihira_logi";
$pass = "Kirio4o7";
try {
    if (empty($_GET['id'])) throw new Exception('ID不正');
    $id = (int) $_GET['id'];
    $dbh = new PDO('mysql:host=localhost;dbname=logistic;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM directed WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<table>";
    echo "<th>タイトル</th>";
    echo "<td>" . htmlspecialchars($result['title'], ENT_QUOTES,'UTF-8') . "</td>";
    echo "<tr>";
    echo "<th>タスク</th>";
    echo "<td>" . htmlspecialchars($result['task'], ENT_QUOTES,'UTF-8') . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>入荷予定日</th>";
    echo "<td>" . htmlspecialchars($result['instock'], ENT_QUOTES,'UTF-8') . "</td><br>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>出荷予定日</th>";
    echo "<td>" . htmlspecialchars($result['shipment'], ENT_QUOTES,'UTF-8') . "</td><br>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>入荷数</th>";
    echo "<td>" . htmlspecialchars($result['arrivals'] . $result['arrival_unit'],ENT_QUOTES, 'UTF-8') . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>予備数</th>";
    echo "<td>" . htmlspecialchars($result['reserve'] . $result['reserve_unit'],ENT_QUOTES, 'UTF-8') . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>コメント</th>";
    echo "<td>" . nl2br(htmlspecialchars($result['comment'], ENT_QUOTES,'UTF-8')) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>送付先</th>";
    echo "<td>" . "〒",$result['postcode'],"<br>" . $result['prefecture'] . $result['city'] . $result['address'],"<br>" . $result['building'],"<br>" . $result['phone'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>イメージ表示</th>";
    echo '<td><img src="', $file, '"></td>';
    echo "</tr>";
    echo "</table>";
    $dbh = null;
} catch (Exception $e) {
    echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br";
    die();
}