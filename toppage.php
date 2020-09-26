<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ロジスティック</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>登録情報の一覧</h1>
<a href="logout.php">ログアウト</a>
<a href="signup.php">新規登録</a><br>
<a href="form.html">指示書の新規登録</a>
<?php
$user = "kirikihira_logi";
$pass = "Kirio4o7";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=logistic;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM directed";
    $stmt = $dbh->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<table>\n";
    echo "<tr>\n";
    echo "<th>タイトル</th><th>入荷数量</th><th>出荷予定日</th><th>編集</th>\n";
    echo "</tr>\n";
    foreach ($result as $row) {
        echo "<tr>\n";
        echo "<td>" . htmlspecialchars($row['title'],ENT_QUOTES, 'UTF-8') . "</td>\n";
        echo "<td>" . htmlspecialchars($row['arrivals'] . $row['arrival_unit'],ENT_QUOTES, 'UTF-8') . "</td>\n";
        echo "<td>" . htmlspecialchars($row['shipment'],ENT_QUOTES, 'UTF-8') . "</td>\n";
        echo "<td>\n";
        echo "<a href=detail.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ">詳細</a>\n";
        echo "|<a href=edit.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ">変更</a>\n";
        echo "|<a href=delete.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ">削除</a>\n";
        echo "</td>\n";
        echo "</tr>\n";
    }
    echo "</table>\n";
    $dbh = null;
} catch (Exception $e) {
    echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<be>";
    die();
}
?>