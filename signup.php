<h1>新規ユーザー登録</h1>
<form action="register.php" method="post">
<div>
    <label>ニックネーム:</label>
    <input type="text" name="nickname" require>
</div>
<div>
    <label>メールアドレス:</label>
    <input type="text" name="email" required>
</div>
<div>
    <label>パスワード</label>
    <input type="password" name="password" required>
</div>
<input type="submit" value="新規登録">
</form>
<p>すでに登録すみの方は<a href="login_form.php">こちら</a></p>