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
unset($_SESSION['user']);
session_destroy();
echo '<META http-equiv="Refresh" content="0.1;URL=index.php">';
?>
</body>
</head>
</html>
