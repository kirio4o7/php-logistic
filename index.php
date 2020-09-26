<?php
session_start();
$username = $_SESSION['nickname'];
if (isset($_SESSION['userid'])) {
    $msg = 'こんにちは' . htmlspecialchars($username, \ENT_QUOTES, 'UTF-8') . 'さん';
    $link = '<a href="toppage.php">トップページへ</a>';
    $link1 = '<a href="signup.php">新規登録</a>';
} else {
    $msg = 'ログインしていません。';
    $link = '<a href="login.php">ログイン</a>';
    $link1 = '<a href="signup.php">新規登録</a>';
}
?>
<h1><?php echo $msg; ?></h1>
<?php echo $link; ?><br>
<?php echo $link1; ?>