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
<?php require 'header.php';
$pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
        dbname=LAA1290607-smartphone;charst=UTF8',
    'LAA1290607', 'Pass2525');
$num = $_POST['num'];

if(isset($_POST['plus'])){
    $num=$num+1;
}else if(isset($_POST['minus'])){
    $num=$num-1;
    if($num<0){
        $num=0;
    }
}
$spl = $pdo->prepare('update d_cart set num=? where customer_code=? and design_code=?');
$spl->execute([$num,$_SESSION['user']['name'],$_SESSION['user']['design']]);
$pdo=null;
echo '<META http-equiv="Refresh" content="0.01;URL=cart.php">';

?>

</body>
</html>
