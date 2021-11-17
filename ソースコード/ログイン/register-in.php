
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>register-in</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<main>
    <form action="register-out.php" method="post">
        <h1>新規作成</h1>
        <dd>User name:</dd>
<!--        名前の入力欄-->
        <input type="text" name="name" class="e" value="">
        <dd>E-mail:</dd>
<!--        メールアドレス入力-->
        <input type="text" name="mail" class="e" id="login" value="">
        <dd>Password:</dd>
<!--        パスワード入力欄-->
        <input type="password" name="pass" class="e">
        <dd>Password:</dd>
<!--        確認用パスワード入力欄-->
        <input type="password" name="pass2" class="e">
        <br>
<!--        登録画面へ遷移-->
        <button type="submit">Verify</button>
    </form>
</main>
</body>
</html>