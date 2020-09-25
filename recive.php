<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ロジスティック</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
    //print_r($_POST);
    echo htmlspecialchars($_POST['title'],ENT_QUOTES, 'UTF-8');
    echo "<br>";
    echo htmlspecialchars($_POST['task'],ENT_QUOTES, 'UTF-8');
    echo "<br>";
    echo htmlspecialchars($_POST['instock'],ENT_QUOTES, 'UTF-8');
    echo "<br>";
    echo htmlspecialchars($_POST['shipment'],ENT_QUOTES, 'UTF-8');
    echo "<br>";
    if (is_numeric($_POST['arrivals'])) {
        echo number_format($_POST['arrivals']);
    }
    echo htmlspecialchars($_POST['unit'],ENT_QUOTES, 'UTF-8');
    echo "<br>";
    if (is_numeric($_POST['reserve'])) {
        echo number_format($_POST['reserve']);
    }
    echo htmlspecialchars($_POST['unit'],ENT_QUOTES, 'UTF-8');
    echo "<br>";
    echo nl2br(htmlspecialchars($_POST['comment'],ENT_QUOTES, 'UTF-8'));
    echo "<br>";
    echo '<p><img src="', $file, '"></p>';
    echo "<br>";
    echo htmlspecialchars($_POST['postcode'],ENT_QUOTES, 'UTF-8');
    echo "<br>";
    echo htmlspecialchars($_POST['prefecture'],ENT_QUOTES, 'UTF-8');
    echo "<br>";
    echo htmlspecialchars($_POST['city'],ENT_QUOTES, 'UTF-8');
    echo "<br>";
    echo htmlspecialchars($_POST['address'],ENT_QUOTES, 'UTF-8');
    echo "<br>";
    echo htmlspecialchars($_POST['building'],ENT_QUOTES, 'UTF-8');
?>
    </body>
</html>