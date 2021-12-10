<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>editAddress</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php
$pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
dbname=LAA1290607-smartphone;charst=UTF8',
    'LAA1290607',
    'Pass2525');
$address = $_POST['address'];
$sql = $pdo->prepare('UPDATE m_customers SET address=? WHERE customer_code=?');
$sql->execute([$address,$_SESSION['name']]);

$pdo=null;
?>
<META http-equiv="Refresh" content="0.001;URL=mypage.php">
</body>
</html>