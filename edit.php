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
    </head>
<body>
    指示書の投稿<br>
    <form method="post" action="update.php" enctype="multipart/form-data">
    タイトル:<input type="text" name="title" value="<?php echo htmlspecialchars($result['title'], ENT_QUOTES, 'UTF-8'); ?>"><br>
    タスク:
    <p><input type="radio" name="task" value="内職あり" <?php if ($result['task'] === "内職あり") echo "checked" ?>>内職あり
    <input type="radio" name="task" value="出荷" <?php if ($result['task'] === "出荷") echo "checked" ?>>出荷
    <input type="radio" name="task" value="保管" <?php if ($result['task'] === "保管") echo "checked" ?>>保管
    </p>
    入荷予定日:
    <input type="date" name="instock" value="<?php echo htmlspecialchars($result['instock'], ENT_QUOTES, 'UTF-8'); ?>"><br>
    出荷予定日:
    <input type="date" name="shipment" value="<?php echo htmlspecialchars($result['shipment'], ENT_QUOTES, 'UTF-8'); ?>"><br>
    <p>入荷数:
    <input type="number" min="1" max="100000" name="arrivals" value="<?php echo htmlspecialchars($result['arrivals'], ENT_QUOTES, 'UTF-8'); ?>">
    <select name="arrival_unit">
        <option value="個" <?php if ($result['arrival_unit'] === "個") echo "selected" ?>>個</option>
        <option value="枚" <?php if ($result['arrival_unit'] === "枚") echo "selected" ?>>枚</option>
        <option value="セット" <?php if ($result['arrival_unit'] === "セット") echo "selected" ?>>セット</option>
    </select><br>
    予備数:
    <input type="number" min="1" max="1000" name="reserve" value="<?php echo htmlspecialchars($result['reserve'], ENT_QUOTES, 'UTF-8'); ?>">
    <select name="reserve_unit">
        <option value="">--</option>
        <option value="個" <?php if ($result['reserve_unit'] === "個") echo "selected" ?>>個</option>
        <option value="枚" <?php if ($result['reserve_unit'] === "枚") echo "selected" ?>>枚</option>
        <option value="セット" <?php if ($result['reserve_unit'] === "セット") echo "selected" ?>>セット</option>
    </select></p>
    <p>コメント:
    <textarea name="comment" cols="40" rows="4" maxlength="150"><?php echo htmlspecialchars($result['comment'], ENT_QUOTES, 'UTF-8'); ?></textarea></p>
    イメージ:
    <input type="file" name="file" value="<?php echo htmlspecialchars($result['file'], ENT_QUOTES, 'UTF-8'); ?>">
    <br>
    <p>送付先:<br>
    〒<input type="number" name="postcode" placeholder="7桁の郵便番号を入力"value="<?php echo htmlspecialchars($result['postcode'], ENT_QUOTES, 'UTF-8'); ?>"><br>
    <input type="text" name="prefecture" placeholder="〇〇県" value="<?php echo htmlspecialchars($result['prefecture'], ENT_QUOTES, 'UTF-8'); ?>"><br>
    <input type="text" name="city" placeholder="〇〇市〇〇区" value="<?php echo htmlspecialchars($result['city'], ENT_QUOTES, 'UTF-8'); ?>">
    <br>
    <input type="text" name="address" placeholder="〇〇町123" value="<?php echo htmlspecialchars($result['address'], ENT_QUOTES, 'UTF-8'); ?>"><br>
    <input type="text" name="building" placeholder="〇〇ビル" value="<?php echo htmlspecialchars($result['building'], ENT_QUOTES, 'UTF-8'); ?>"><br>
    <input type="telephone" name="phone" placeholder="電話番号" value="<?php echo htmlspecialchars($result['phone'], ENT_QUOTES, 'UTF-8'); ?>"></p>
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8'); ?>">
    <p><input type="submit" value="確定"></p>
    </form>
    </body>
</html>