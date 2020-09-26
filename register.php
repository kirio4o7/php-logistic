<?php
$nickname = $_POST['nickname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$user = "kirikihira_logi";
$pass = "Kirio4o7";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=logistic;charset=utf8',$user, $pass);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

$sql = "SELECT * FROM users WHERE email = :email";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();
$member = $stmt->fetch();
if ($member['email'] === $email) {
    $msg = '同じメールアドレスが存在します。';
    $link = '<a href="signup.php">戻る</a>';
} else {
    $sql = "INSERT INTO users(nickname, email, password) VALUES (:nickname, :email, :password)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':nickname', $nickname);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);
    $stmt->execute();
    $msg = "新規登録が完了しました。";
    $link = '<a href="toppage.php">トップページ</a>';
}
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>
