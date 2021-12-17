
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>register-in</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<?php require 'header2.php' ?>
<main>
    <br>
    <form action="register-out.php" method="post">
        <h1>新規作成</h1>
        <p>ユーザーネーム</p>
<!--        名前の入力欄-->
        <input type="text" name="name" class="e" >
        <p>メールアドレス</p>
<!--        メールアドレス入力-->
        <input type="text" name="mail" class="e" id="login" >
        <p>パスワード</p>
<!--        パスワード入力欄-->
        <input type="password" name="pass" class="e">
        <p>確認ようパスワード</p>
<!--        確認用パスワード入力欄-->
        <input type="password" name="pass2" class="e">
        <br>
<!--        登録画面へ遷移-->
        <button type="submit">登録</button>
    </form>
</main>
</body>
</html>