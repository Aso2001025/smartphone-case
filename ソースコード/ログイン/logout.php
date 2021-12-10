<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>ログアウト</title>
    <body>
<h1>ログアウトしました</h1>

<?php
//ログアウト処理
unset($_SESSION['user']);
session_destroy();
//トップページへ遷移
echo '<META http-equiv="Refresh" content="0.01;URL=toppage.php">';
?>
</body>
</head>
</html>
