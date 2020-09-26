<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<p>ログアウトしました。</p>
<a href="login_form.php">ログインはこちら</a><br>
<a href="signup.php">新規登録はこちら</a>