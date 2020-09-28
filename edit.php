<?php
$user = "baf996ddc765af";
$pass = "e503f039";
try {
    if (empty($_GET['id'])) throw new Exception('ID不正');
    $id = (int) $_GET['id'];
    $dbh = new PDO('mysql:host=us-cdbr-east-02.cleardb.com;dbname=heroku_e49a6621e69f98e;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM directed WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
} catch (Exception $e) {
    echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>入力フォーム</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <h1>指示書の編集</h1>
    <form method="post" action="update.php" enctype="multipart/form-data">
    <p><label>タイトル</label><br>
        <input type="text" class="form-title" name="title" value="<?php echo htmlspecialchars($result['title'], ENT_QUOTES, 'UTF-8'); ?>"></p>
    <p><label>タスク:</label>
    <input type="radio" class="form-radio" name="task" value="内職あり" <?php if ($result['task'] === "内職あり") echo "checked" ?>>内職あり
    <input type="radio" class="form-radio" name="task" value="出荷" <?php if ($result['task'] === "出荷") echo "checked" ?>>出荷
    <input type="radio" class="form-radio" name="task" value="保管" <?php if ($result['task'] === "保管") echo "checked" ?>>保管
    </p>
    <p><label>入荷予定日:</label>
    <input type="date" class="form-date" name="instock" value="<?php echo htmlspecialchars($result['instock'], ENT_QUOTES, 'UTF-8'); ?>"><br>
    <label>出荷予定日:</label>
    <input type="date" class="form-date" name="shipment" value="<?php echo htmlspecialchars($result['shipment'], ENT_QUOTES, 'UTF-8'); ?>"><br>
    <p><label>入荷数:</label>
    <input type="number" class="form-arrivals" min="1" max="100000" name="arrivals" value="<?php echo htmlspecialchars($result['arrivals'], ENT_QUOTES, 'UTF-8'); ?>">
    <select name="arrival_unit">
        <option value="個" <?php if ($result['arrival_unit'] === "個") echo "selected" ?>>個</option>
        <option value="枚" <?php if ($result['arrival_unit'] === "枚") echo "selected" ?>>枚</option>
        <option value="セット" <?php if ($result['arrival_unit'] === "セット") echo "selected" ?>>セット</option>
    </select><br>
    <label>予備数:</label>
    <input type="number" class="form-reserve" min="1" max="1000" name="reserve" value="<?php echo htmlspecialchars($result['reserve'], ENT_QUOTES, 'UTF-8'); ?>">
    <select name="reserve_unit">
        <option value="">--</option>
        <option value="個" <?php if ($result['reserve_unit'] === "個") echo "selected" ?>>個</option>
        <option value="枚" <?php if ($result['reserve_unit'] === "枚") echo "selected" ?>>枚</option>
        <option value="セット" <?php if ($result['reserve_unit'] === "セット") echo "selected" ?>>セット</option>
    </select></p>
    <p><label>コメント</label><br>
    <textarea name="comment" class="form-comment" cols="40" rows="4" maxlength="150"><?php echo htmlspecialchars($result['comment'], ENT_QUOTES, 'UTF-8'); ?></textarea></p>
    <p><label>送付先</label><br>
    <input type="number" class="form-post" name="postcode" placeholder="7桁の郵便番号を入力"value="<?php echo htmlspecialchars($result['postcode'], ENT_QUOTES, 'UTF-8'); ?>"><br>
    <input type="text" class="form-address" name="prefecture" placeholder="〇〇県" value="<?php echo htmlspecialchars($result['prefecture'], ENT_QUOTES, 'UTF-8'); ?>"><br>
    <input type="text" name="city" class="form-address" placeholder="〇〇市〇〇区" value="<?php echo htmlspecialchars($result['city'], ENT_QUOTES, 'UTF-8'); ?>">
    <br>
    <input type="text" name="address" class="form-address" placeholder="〇〇町123" value="<?php echo htmlspecialchars($result['address'], ENT_QUOTES, 'UTF-8'); ?>"><br>
    <input type="text" name="building" class="form-address" placeholder="〇〇ビル" value="<?php echo htmlspecialchars($result['building'], ENT_QUOTES, 'UTF-8'); ?>"><br>
    <input type="telephone" class="form-phone" name="phone" placeholder="電話番号" value="<?php echo htmlspecialchars($result['phone'], ENT_QUOTES, 'UTF-8'); ?>"></p>
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8'); ?>">
    <p><input type="submit" class="form-submit" value="確定"></p>
    </form>
    </body>
</html>