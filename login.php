<?php
session_start();
$email = $_POST['email'];
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
if (isset($_POST['password'], $member['password'])) {
    $_SESSION['userid'] = $member['userid'];
    $_SESSION['nickname'] = $member['nickname'];
    $msg = 'ログインしました。';
    $link = '<a href="toppage.php">トップページへ</a>';
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login_form.php">戻る</a>';
}
?>
<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>