<?php
session_start();
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
        dbname=LAA1290607-smartphone;charst=UTF8',
    'LAA1290607', 'Pass2525');

$spl = $pdo->prepare('update d_cart set del_flag=1 where customer_code=? and design_code=?');
$spl->execute([$_SESSION['name'],$_POST['design']]);
$pdo=null;
echo '<META http-equiv="Refresh" content="0.01;URL=cart.php">';

?>

</body>
</html>
